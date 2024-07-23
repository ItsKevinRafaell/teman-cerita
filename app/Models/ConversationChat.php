<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationChat extends Model
{
    use HasFactory;
    protected $table = 'conversations';
    protected $guarded = [];

    public function scopeInactiveFor($query, $minutes)
    {
        return $query->where('status', 'active')
                       ->where('last_activity_at', '<', now()->subMinutes($minutes));
    }
}
