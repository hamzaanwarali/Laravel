
@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">إضافة مكافأة جديدة</h1>

    <form action="{{ route('admin.rewards.store') }}" method="POST">
        @csrf
        
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="mb-4">
                <label for="name" class="block mb-2">اسم المكافأة</label>
                <input type="text" name="name" id="name" 
                       class="form-input w-full" required>
            </div>
            
            <div class="mb-4">
                <label for="required_points" class="block mb-2">النقاط المطلوبة</label>
                <input type="number" name="required_points" id="required_points" 
                       class="form-input w-full" required min="1">
            </div>
            
            <div class="mb-4">
                <label for="stock" class="block mb-2">الكمية المتاحة </label>
               <input type="number" name="stock" id="stock" 
                       class="form-input w-full" required>
            </div>
            
            <div class="flex space-x-4">
                <button type="submit" class="btn btn-primary">
                    حفظ المكافأة
                </button>
                <a href="{{ route('admin.rewards.index') }}" class="btn btn-secondary">
                    رجوع
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
