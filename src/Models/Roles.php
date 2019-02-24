<?php

namespace RoleCms\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model {

    protected $fillable = ['id', 'name', 'premissions'];
    protected $table = 'roles';

    public function abilities() {
        return $this->hasMany('Abilities', 'roles_id', 'id');
    }

}
