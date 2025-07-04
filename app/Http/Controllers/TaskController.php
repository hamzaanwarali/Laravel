<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function complete(Task $task)
    {
        // التأكد من أن المستخدم مسجل دخول
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // منع المستخدم من إكمال المهمة أكثر من مرة
        $alreadyCompleted = auth()->user()->points()
            ->where('source', 'task:'.$task->id) 
            ->exists();
            
        if ($alreadyCompleted) {
            return back()->with('error', 'لقد أكملت هذه المهمة مسبقاً');
        }

        // إضافة النقاط
        auth()->user()->points()->create([
            'amount' => $task->points,
            'source' => 'task:'.$task->id
        ]);
        
        return back()->with('success', 'تم إضافة ' . $task->points . ' نقطة إلى رصيدك!');
    }
}
