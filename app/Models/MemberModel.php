<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Extend Authenticatable instead of Model
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class MemberModel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'member_id';
    protected $table = "member";
    
    protected $fillable = [
        'member_id',
        'member_firstname',
        'member_lastname',
        'email',
        'password',
        'phone',
        'timestamp'

    ];

    // Hide the password and remember_token fields from array and JSON outputs
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationship with TeamModel
    public function teams()
{
    return $this->belongsToMany(TeamModel::class, 'team_member', 'member_id', 'team_id');
}


    // Mutator to ensure the password is always hashed when set
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}