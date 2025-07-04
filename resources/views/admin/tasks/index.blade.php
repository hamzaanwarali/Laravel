@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">قائمة المهام</h1>
        <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary">
            + إضافة مهمة جديدة
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-right">#</th>
                    <th class="px-6 py-3 text-right">العنوان</th>
                    <th class="px-6 py-3 text-right">النقاط</th>
                    <th class="px-6 py-3 text-right">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr class="border-t">
                    <td class="px-6 py-4">{{ $task->id }}</td>
                    <td class="px-6 py-4">{{ $task->name }}</td>
                    <td class="px-6 py-4">{{ $task->points }}</td>
                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('admin.tasks.edit', $task->id) }}" 
                           class="text-blue-600 hover:text-blue-900">
                           ✏️ تعديل
                        </a>
                        <form action="{{ route('admin.tasks.destroy', $task->id) }}" 
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900"
                                    onclick="return confirm('هل أنت متأكد؟')">
                                🗑️ حذف
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $tasks->links() }}
    </div>
</div>
@endsection
