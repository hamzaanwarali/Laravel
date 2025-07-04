<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Point;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'points',
        'is_active',
        'max_completions'
    ];

    // علاقة مع النقاط (للتتبع)
    
    // دالة مساعدة للتحقق من إمكانية الإكمال
    public function canBeCompletedBy($user)
    {
        if (!$this->is_active) return false;
        
        if ($this->max_completions) {
            $completedCount = $user->points()->count();
                
            return $completedCount < $this->max_completions;
        }
        
        return true;
    }
}
