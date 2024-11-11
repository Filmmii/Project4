<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_has_RoleModel extends Model
{
    protected $table = "member_has_role";
    protected $fillable = [
        'member_id',
        'role_id',
        'project_id'
        
    ];
}
