@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between">
                <h3>كروت النقاط</h3>
                <a href="{{ route('admin.cards.create') }}" class="btn btn-light">
                    إضافة كروت جديدة
                </a>
            </div>
        </div>

        <div class="card-body">
            <!-- فلترة بسيطة -->
            <form method="GET" class="mb-3">
                <input type="text" name="search" placeholder="ابحث برمز الكرت" class="form-control">
            </form>

            <!-- جدول الكروت -->
            <form id="bulk-form" method="POST" action="{{ route('admin.cards.bulk-delete') }}">
                @csrf
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>الرمز</th>
                            <th>النقاط</th>
                            <th>الحالة</th>
                            <th>تاريخ الانتهاء</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cards as $card)
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="{{ $card->id }}"></td>
                            <td>{{ $card->code }}</td>
                            <td>{{ $card->points }}</td>
                            <td>
                                @if($card->is_used)
                                    <span class="badge bg-success">مستخدم</span>
                                @else
                                    <span class="badge bg-secondary">غير مستخدم</span>
                                @endif
                            </td>
                            <td>{{ $card->expires_at }}</td>
                            <td>
                                <a href="{{ route('admin.cards.print', $card->id) }}" 
                                   class="btn btn-sm btn-info" target="_blank">
                                    طباعة
                                </a>
                                <a href="{{ route('admin.cards.edit', $card->id) }}" 
                                   class="btn btn-sm btn-warning">
                                    تعديل
                                </a>
                                <button type="button" class="btn btn-sm btn-danger delete-btn" 
                                        data-id="{{ $card->id }}">
                                    حذف
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-danger">حذف المحدد</button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // اختيار/إلغاء الكل
    document.getElementById('select-all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('input[name="ids[]"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    // تأكيد الحذف
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            if (confirm('هل أنت متأكد من الحذف؟')) {
                fetch(`/admin/cards/${this.dataset.id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(() => window.location.reload());
            }
        });
    });
});
</script>
@endsection
