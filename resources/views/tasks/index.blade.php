
<?php /* 

use App\Models\Task;

$tasks =Task::all();
*/
?>

@extends('layouts.app')

@section('content')
<h2 class="mb-4"><i class="fas fa-tasks text-success"></i> قائمة المهام</h2>

<div class="card">
    <div class="card-body">
        <div class="task-list">
            @for($i=1; $i<=5; $i++)
            <div class="task-item p-3 border-bottom d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-1">المهمة رقم {{$i}}</h5>
                    <small class="text-muted">اكتمال هذه المهمة يعطيك 50 نقطة</small>
                </div>
                <button class="btn btn-sm btn-success ripple"><i class="fas fa-check"></i> إكمال</button>
            </div>
            @endfor
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="space-y-4">
    <h2 class="text-2xl font-bold">المهام المتاحة</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach($tasks as $task)
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-bold">{{ $task->name }}</h3>
            <p>النقاط: {{ $task->points }}</p>
            <form method="POST" action="{{ route('tasks.complete', $task) }}" class="mt-2">
                @csrf
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                    إكمال المهمة
                </button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection
