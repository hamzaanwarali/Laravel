
<table class="table">
    <thead>
        <tr>
            <th>المستخدم</th>
            <th>المكافأة</th>
            <th>رقم الهاتف</th>
            <th>النقاط</th>
            <th>الحالة</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($requests as $request)
        <tr>
            <td>{{ $request->user->name }}</td>
            <td>{{ $request->reward->name }}</td>
            <td>{{ $request->phone }}</td>
            <td>{{ $request->reward->points_required }}</td>
            <td>
                <span class="badge bg-{{ $request->status == 'approved' ? 'success' : ($request->status == 'rejected' ? 'danger' : 'warning') }}">
                    {{ $request->status }}
                </span>
            </td>
            <td>
                <form action="{{ route('admin.requests.update', $request) }}" method="POST">
                    @csrf @method('PUT')
                    <select name="status" class="form-select">
                        <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>قيد المراجعة</option>
                        <option value="approved" {{ $request->status == 'approved' ? 'selected' : '' }}>مقبول</option>
                        <option value="rejected" {{ $request->status == 'rejected' ? 'selected' : '' }}>مرفوض</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-primary mt-2">حفظ</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
