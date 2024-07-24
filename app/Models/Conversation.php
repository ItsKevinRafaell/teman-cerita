<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeInactiveFor($query, $hours){
        return $query->where('status', 1)
                       ->where('last_activity_at', '<', now()->subHours($hours));
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
