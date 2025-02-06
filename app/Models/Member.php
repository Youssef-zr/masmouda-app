<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Member extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $table = "members";
    protected $fillable = [
        "name",
        "phone",
        "email",
        "adress",
        "rib_number",
        "bank_name",
        "cin_number",
        "role_id",
        "month",
        "amount",
        "permissions",
        "political_party",
        "status"
    ];

    protected $casts = ['permissions' => 'array'];
    protected $appends = ['formated-rib-number', 'crypted-id',];


    // Register the media collections for the model
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection("cin_image")
            ->useDisk("public")
            ->singleFile();
    }

    // Define the conversions for this model's media.
    // public function registerMediaConversions(Media $media = null): void
    // {
    //     // Register to create a main image with decreased quality value
    //     $this->addMediaConversion("main_image")
    //         ->quality(75)
    //         ->performOnCollections("cin_image");

    //     // Resize to create a thumbnail and optimize the image
    //     $this->addMediaConversion("thumb")
    //         ->width(200)
    //         ->height(300)
    //         ->quality(75)
    //         ->performOnCollections("cin_image");


    //     // Resize to create a thumbnail and optimize the image
    //     $this->addMediaConversion("optimized")
    //         ->width(600)
    //         ->height(842)
    //         ->quality(75)
    //         ->performOnCollections("cin_image");
    // }

    // explode role permissions
    public function getRolePermissionsAttribute()
    {
        $permissions = $this->permissions;

        if ($permissions) {

            $permissions = array_map(function ($text) {
                $parts = explode('|', $text);
                return [
                    'fr' => trim($parts[0] ?? ''),  // French part
                    'ar' => trim($parts[1] ?? ''),   // Arabic part
                ];
            }, $permissions);
        }

        return $permissions;
    }

    // formted rib number
    public function getFormatedRibNumberAttribute()
    {
        $rib_number = $this->rib_number;

        $formated = '';
        if ($rib_number) {
            $formated .= substr($rib_number, 0, 3) . ' ';
            $formated .= substr($rib_number, 4, 3) . ' ';
            $formated .= substr($rib_number, 6, 14) . ' ';
            $formated .= substr($rib_number, offset: 22);
        }

        return $formated;
    }

    // crypt the id to be used in the route params
    public function getCryptedIdAttribute()
    {
        $id = $this->id;
        $encryptedId = Crypt::encryptString($id);

        return $encryptedId;
    }

    // scope active
    public function scopeActive(Builder $query, $status)
    {
        return $query->where('status', $status);
    }


    /**
     * Get the role that owns the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(RMember::class);
    }
}
