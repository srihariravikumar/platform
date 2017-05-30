<?php namespace BookStack;

/**
 * DocTub - Online Documentation/Wiki Platform.
 * Copyright (c) 2017-present, DocTub, Inc. All rights reserved.
 *
 * This source code is licensed under the BSD 3-Clause "New" or "Revised" License
 * found in the LICENSE file in the root directory of this source tree. An additional
 * grant of patent rights can be found in the PATENTS file in the same directory.
 *
 */

class Role extends Model
{

    protected $fillable = ['display_name', 'description'];

    /**
     * The roles that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get all related JointPermissions.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jointPermissions()
    {
        return $this->hasMany(JointPermission::class);
    }

    /**
     * The RolePermissions that belong to the role.
     */
    public function permissions()
    {
        return $this->belongsToMany(RolePermission::class, 'permission_role', 'role_id', 'permission_id');
    }

    /**
     * Check if this role has a permission.
     * @param $permissionName
     * @return bool
     */
    public function hasPermission($permissionName)
    {
        $permissions = $this->getRelationValue('permissions');
        foreach ($permissions as $permission) {
            if ($permission->getRawAttribute('name') === $permissionName) return true;
        }
        return false;
    }

    /**
     * Add a permission to this role.
     * @param RolePermission $permission
     */
    public function attachPermission(RolePermission $permission)
    {
        $this->permissions()->attach($permission->id);
    }

    /**
     * Detach a single permission from this role.
     * @param RolePermission $permission
     */
    public function detachPermission(RolePermission $permission)
    {
        $this->permissions()->detach($permission->id);
    }

    /**
     * Get the role object for the specified role.
     * @param $roleName
     * @return Role
     */
    public static function getRole($roleName)
    {
        return static::where('name', '=', $roleName)->first();
    }

    /**
     * Get the role object for the specified system role.
     * @param $roleName
     * @return Role
     */
    public static function getSystemRole($roleName)
    {
        return static::where('system_name', '=', $roleName)->first();
    }

    /**
     * Get all visible roles
     * @return mixed
     */
    public static function visible()
    {
        return static::where('hidden', '=', false)->orderBy('name')->get();
    }

}
