



@extends('layouts.app')

@section('content')
<div class="row">
    <!-- بطاقة النقاط -->
    <div class="col-md-4">
        <div class="card bg-primary text-white p-3 text-center">
            <h3><i class="fas fa-coins"></i> رصيدك</h3>
            <h2 class="display-4">1,250</h2>
            <p>نقطة</p>
        </div>
    </div>

    <!-- بطاقة المهام -->
    <div class="col-md-4">
        <div class="card p-3">
            <h3><i class="fas fa-tasks text-success"></i> مهامك</h3>
            <div class="progress mt-2">
                <div class="progress-bar bg-success" style="width: 75%">75%</div>
            </div>
            <p class="mt-2">3/4 مهام مكتملة</p>
        </div>
    </div>

    <!-- بطاقة المكافآت -->
    <div class="col-md-4">
        <div class="card p-3">
            <h3><i class="fas fa-gift text-warning"></i> مكافآت</h3>
            <p>لديك 2 مكافآت متاحة</p>
            <button class="btn btn-warning ripple">استبدال النقاط</button>
        </div>
    </div>
</div>
@endsection

