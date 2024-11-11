<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    protected $primaryKey = 'role_id'; // ระบุ primary key ที่ใช้
    public $timestamps = false; // ปิดการใช้ timestamp
    protected $table = "role";
    protected $fillable = [
        'role_id',
        'role_name'
    ];
}
