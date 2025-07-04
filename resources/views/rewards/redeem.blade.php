@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">تأكيد استبدال النقاط</h4>
        </div>
        <div class="card-body">
            <div class="alert alert-info">
                <strong>تنبيه:</strong> سيتم خصم {{ $reward->points_required }} نقطة من رصيدك
            </div>

            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>المكافأة:</h5>
                    <p>{{ $reward->name }}</p>
                </div>
                <div class="col-md-6">
                    <h5>رقم الهاتف:</h5>
                    <p>{{ auth()->user()->phone }}</p>
                </div>
            </div>

            <form action="{{ route('rewards.redeem', $reward) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg">
                    تأكيد الطلب
                </button>
                <a href="{{ route('rewards.index') }}" class="btn btn-outline-secondary btn-lg">
                    إلغاء
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
