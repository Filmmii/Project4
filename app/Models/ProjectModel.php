<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModel extends Model
{
    use HasFactory;

    protected $primaryKey = "project_id";
    public $timestamps = false;
    protected $table = "project";

    protected $fillable = [
        'project_id',
        'project_name',
        'objective',
        'budget',
        'start_date',
        'end_date'
    ];
// Define the relationship to TaskModel
// โมเดล ProjectModel
// ProjectModel.php
// public function tasks()
// {
//     return $this->hasMany(TaskModel::class, 'project_id', 'project_id');
// }
public function tasks()
{
    return $this->hasMany(TaskModel::class, 'project_id', 'project_id');
}

}