<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Point extends Model
{
    protected $fillable = ['user_id', 'amount', 'source'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    


}

