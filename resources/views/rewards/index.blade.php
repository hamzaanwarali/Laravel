
@extends('layouts.app')

@section('content')
<h2 class="mb-4"><i class="fas fa-gift text-warning"></i> قائمة المكافآت</h2>

<div class="row">
     @foreach($rewards as $reward)
        
        @if ($reward->stock >0 && $reward->is_active = true)
    <div class="col-md-4 mb-4">
        <div class="card reward-card h-100">
            
        <img src="https://via.placeholder.com/300x200.webp?text=Reward" class="card-img-top" alt="..." loading="lazy">
        
        <div class="card-body">
                <h5 class="card-title"> {{ $reward->name }} </h5>
                <p class="text-muted">{{ $reward->points_required }} النقاط المطلوبة</p>
                <form method="GET" action="{{ route('rewards.redeem-form', $reward) }}">
                @csrf
                <button class="btn btn-warning w-100 ripple" type="submit" >
                    استبدال النقاط
                </button>
            </form>
            </div>
        </div>
    </div>
@endif        
@endforeach</div>
@endsection
