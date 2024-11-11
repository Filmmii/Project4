<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationsModel extends Model
{
    protected $table = "notifications";
    protected $fillable = [
        'notification_id',
        'member_id',
        'content',
        'is_read',
        'timestamp'
        ];
}
