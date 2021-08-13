<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    // نقش تعداد زیادی می تواند دسترسی داشته باشد
    public function permissions()
    {
        // N to N
        return $this->belongsToMany(Permission::class, 'permission_role');
    }


    /**
     * @param Permission $permission
     * @return bool
     */

    // چک می کند که آیا این رول خاص، یک دسترسی خاص را دارد یا خیر
    public function hasPermission($permission)
    {
        $permission = Permission::query()->where('title', $permission)
            ->firstOrFail();

        return $this->permissions()
            ->where('id', $permission->id)
            ->exists();
    }

}
