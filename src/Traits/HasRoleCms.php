<?php

namespace RoleCms\Traits;

trait HasRoleCms {

    public function role() {
        return $this->belongsTo('RoleCms\Models\Roles', 'roles_id');
    }

    public function abilities() {
        return $this->hasMany('RoleCms\Models\Abilities', 'roles_id', 'roles_id');
    }

    public function isSuperAdmin() {
        return in_array($this->user->roles_id, config('rolecms.super_admin_roles'));
    }

    public function is($role = '') {
        return in_array($this->role->name, explode('|', $role));
    }

    public function hasAccess($action) {

        if (config('rolecms.check_super_admin')) {
            if ($this->isSuperAdmin()) {
                return true;
            }
        }

        return (bool) $this->abilities->where('action', $action)->count();
    }

}
