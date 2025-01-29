<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Crypt;


class Member extends Model
{
    use HasFactory;
    protected $table = "members";
    protected $fillable = ['name', 'email', 'phone', 'role_id', 'permissions', 'rib_number', 'bank_name', 'cin_number', "adress", 'month', 'amount'];
    protected $casts = ['permissions' => 'array'];
    protected $appends = ['formated-rib-number', 'crypted-id',];



    // explode role permissions
    public function getRolePermissionsAttribute()
    {
        $values = $this->permissions;

        $permissions = array_map(function ($text) {
            $parts = explode('|', $text);
            return [
                'fr' => trim($parts[0] ?? ''),  // French part
                'ar' => trim($parts[1] ?? ''),   // Arabic part
            ];
        }, $values);

        return $permissions;
    }

    // formted rib number
    public function getFormatedRibNumberAttribute()
    {
        $rib_number = $this->rib_number;

        $formated = '';
        if ($rib_number) {
            $formated .= substr($rib_number, 0, 3) . ' ';
            $formated .= substr($rib_number, 4, 3) . ' < ';
            $formated .= substr($rib_number, 6, 14) . ' > ';
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


    /**
     * Get the role that owns the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(RMember::class);
    }

    /**
     * Get the commitee that owns the Member
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function committee(): BelongsTo
    {
        return $this->belongsTo(related: Committee::class);
    }
}
