<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // عرض جميع المهام
    public function index()
    {
        $tasks = Task::latest()->paginate(10);
        return view('admin.tasks.index', compact('tasks'));
    }

    // عرض نموذج إنشاء مهمة
    public function create()
    {
        return view('admin.tasks.create');
    }

    // حفظ المهمة الجديدة
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'points' => 'required|integer|min:1'
        ]);

        Task::create($request->all());

        return redirect()->route('admin.tasks.index')
            ->with('success', 'تمت إضافة المهمة بنجاح');
    }

    // عرض نموذج التعديل
    public function edit(Task $task)
    {
        return view('admin.tasks.edit', compact('task'));
    }

    // تحديث المهمة
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'points' => 'required|integer|min:1'
        ]);

        $task->update($request->all());

        return redirect()->route('admin.tasks.index')
            ->with('success', 'تم تحديث المهمة بنجاح');
    }

    // حذف المهمة
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('admin.tasks.index')
            ->with('success', 'تم حذف المهمة بنجاح');
    }
}
