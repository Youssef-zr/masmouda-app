<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Committee extends Model
{
    use HasFactory;
    protected $fillable = ["name_ar",'name_fr','description_ar',"description_fr"];
    protected $table = 'committees';


    /**
     * Get all of the members for the Committee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members(): HasMany
    {
        return $this->hasMany(related: Member::class);
    }
}
