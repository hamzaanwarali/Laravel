<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrepaidCard extends Model
{
    /** @use HasFactory<\Database\Factories\PrepaidCardFactory> */
    use HasFactory;
    
    protected $fillable = [
    'code', 'points', 'expires_at', 'created_by' , 'is_used'
];

protected $dates = ['expires_at', 'used_at'];

public function creator()
{
    return $this->belongsTo(User::class, 'created_by');
}

public function user()
{
    return $this->belongsTo(User::class, 'used_by');
}

public function isExpired()
{
    return $this->expires_at < now();
}


}
