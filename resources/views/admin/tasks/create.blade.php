@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">إضافة مهمة جديدة</h1>

    <form action="{{ route('admin.tasks.store') }}" method="POST">
        @csrf
        
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="mb-4">
                <label for="name" class="block mb-2">العنوان</label>
                <input type="text" name="name" id="name" 
                       class="form-input w-full" required>
            </div>
            
            <div class="mb-4">
                <label for="points" class="block mb-2">النقاط</label>
                <input type="number" name="points" id="points" 
                       class="form-input w-full" required min="1">
            </div>
            
            <div class="mb-4">
                <label for="description" class="block mb-2">الوصف (اختياري)</label>
                <textarea name="description" id="description" 
                          class="form-textarea w-full"></textarea>
            </div>
            
            <div class="flex space-x-4">
                <button type="submit" class="btn btn-primary">
                    حفظ المهمة
                </button>
                <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">
                    رجوع
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
