<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RMember extends Model
{
    use HasFactory;
    protected $table = "role_members";
    protected $fillable = ["name_ar", "name_fr", "permissions", "salary"];

    /**
     * Get all of the members for the RMember
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members(): HasMany
    {
        return $this->hasMany(related: Member::class, foreignKey: 'role_id', localKey: 'id');
    }
}
