
@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">قائمة المكافآت</h1>
        <a href="{{ route('admin.rewards.create') }}" class="btn btn-primary">
            + إضافة مكافأة جديدة
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
                    <th class="px-6 py-3 text-right">الاسم</th>
                    <th class="px-6 py-3 text-right">النقاط المطلوبة</th>
                    <th class="px-6 py-3 text-right">الكمية المتاحة</th>
                    <th class="px-6 py-3 text-right">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rewards as $reward)
                <tr class="border-t">
                    <td class="px-6 py-4">{{ $reward->id }}</td>
                    <td class="px-6 py-4">{{ $reward->name }}</td>
                    <td class="px-6 py-4">{{ $reward->required_points }}</td>
                    <td class="px-6 py-4">{{ $reward->stock }}</td>

                    <td class="px-6 py-4 space-x-2">
                        <a href="{{ route('admin.rewards.edit', $reward->id) }}" 
                           class="text-blue-600 hover:text-blue-900">
                           ✏️ تعديل
                        </a>
                        <form action="{{ route('admin.rewards.destroy', $reward->id) }}" 
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
        {{ $rewards->links() }}
    </div>
</div>
@endsection
