@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">تعديل المهمة</h1>

    <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="mb-4">
                <label for="name" class="block mb-2">العنوان</label>
                <input type="text" name="name" id="name" 
                       value="{{ old('name', $task->name) }}"
                       class="form-input w-full" required>
            </div>
            
            <div class="mb-4">
                <label for="points" class="block mb-2">النقاط</label>
                <input type="number" name="points" id="points" 
                       value="{{ old('points', $task->points) }}"
                       class="form-input w-full" required min="1">
            </div>
            
            <div class="mb-4">
                <label for="description" class="block mb-2">الوصف</label>
                <textarea name="description" id="description" 
                          class="form-textarea w-full">{{ old('description', $task->description) }}</textarea>
            </div>
            
            <div class="flex space-x-4">
                <button type="submit" class="btn btn-primary">
                    تحديث المهمة
                </button>
                <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">
                    رجوع
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
