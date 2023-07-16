<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user',
        'to_user',
        'type',
        'post_id',
    ];

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user');
    }

    public function notificationType()
    {
        return $this->belongsTo(NotificationType::class, 'notification_type_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
