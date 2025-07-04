@extends('layouts.app')

@section('content')
<div class="container">
    <div class="alert alert-success">
        تم استلام طلبك بنجاح! تفاصيل الطلب:
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $reward->name }}</h5>
            <p class="card-text">
                <strong>النقاط المستخدمة:</strong> {{ $reward->points_required }}<br>
                <strong>رقم الهاتف:</strong> {{ auth()->user()->phone }}<br>
                <strong>حالة الطلب:</strong> قيد المراجعة
            </p>
            <a href="{{ route('rewards.index') }}" class="btn btn-primary">
                العودة لقائمة المكافآت
            </a>
        </div>
    </div>
</div>
@endsection
