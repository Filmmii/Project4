<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    use HasFactory;

    protected $primaryKey = "task_id";
    public $timestamps = true; // ถ้าคุณต้องการใช้ timestamps
    protected $table = "task";

    protected $fillable = [
        'task_id',
        'project_id',
        'assigned_to',
        'task_name',
        'description',
        'status',
        'start_date',
        'end_date'
    ];

    // Define the relationship to Project
    public function project()
{
    return $this->belongsTo(ProjectModel::class, 'project_id', 'project_id');
}
    

    public function report()
    {
        return $this->belongsTo(ReportModel::class, 'report_id', 'report_id'); // เชื่อมกับ ReportModel
    }
}