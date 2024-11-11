<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamModel extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'team_id';
    protected $table = "team";
    
    protected $fillable = [
        'team_id',
        'project_id',
        'team_name',
        'timestamp'
    ];

    // Define many-to-many relationship with MemberModel
   
    public function members()
{
    return $this->belongsToMany(MemberModel::class, 'team_member', 'team_id', 'member_id');
}

}