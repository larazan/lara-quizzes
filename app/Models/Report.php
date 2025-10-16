<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason',
        'message',
        'user_id',
        'guest_token',
        'status',
        'reviewed_by',
        'reviewed_at'
    ];
  
    protected $casts = ['reviewed_at'=>'datetime'];

    public function reportable() { 
        return $this->morphTo(); 
    }
  
    public function reporter() { 
        return $this->belongsTo(User::class,'user_id'); 
    }

    public function reviewer() { 
        return $this->belongsTo(User::class,'reviewed_by'); 
    }
}
