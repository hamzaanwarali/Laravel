<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Point;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reward extends Model

{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'points_required',
        'stock',
        'image',
        'is_active'
    ];
    
public function requests()
{
    return $this->hasMany(RewardRequest::class);
}

}