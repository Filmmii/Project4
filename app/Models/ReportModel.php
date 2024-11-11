<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportModel extends Model
{
    protected $table = "report";
    protected $primaryKey = "report_id"; // กำหนด primary key เป็น report_id
    public $incrementing = false; // กรณีที่ primary key ไม่ใช่ auto-increment
    protected $fillable = [
        'report_id',
        'content',
        'create_at',
        'project_id'
    ];
    // public function tasks()
    // {
    //     return $this->hasMany(TaskModel::class, 'report_id', 'report_id'); // เชื่อมต่อกับ TaskModel
    // }
    public function project()
    {
    return $this->belongsTo(ProjectModel::class, 'project_id', 'project_id'); // เชื่อมต่อกับ ProjectModel
}
public function tasks()
{
    return $this->hasMany(TaskModel::class, 'report_id', 'report_id');
}
    
}