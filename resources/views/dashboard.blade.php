
@extends('layouts.app')

@section('content')
<!-- بطاقة النقاط -->
   
<div class="row">
    

    <!-- بطاقة المهام 
    <div class="col-md-4">
        <div class="card p-3">
            <h3><i class="fas fa-tasks text-success"></i> مهامك</h3>
            <div class="progress mt-2">
                <div class="progress-bar bg-success" style="width: 75%">75%</div>
            </div>
            <p class="mt-2">3/4 مهام مكتملة</p>
        </div>
    </div>
    -->
    
     <!-- بطاقة ادخال كرت     -->
    <div class="col-md-4">
        <div class="card p-3">
            <h3><i class="fas fa-credit-card"></i> ادخال كرت : </h3>
            <a href="{{ route('cards.redeem') }}">  <button class="btn btn-warning ripple">  اضغط هنا .. !  </button> 
        </a>

        </div>
    </div>
 

    <!-- بطاقة المكافآت -->
    <div class="col-md-4">
        <div class="card p-3">
            <h3><i class="fas fa-gift text-warning"></i> مكافآت</h3>
            
           <a href="{{ route('rewards.index') }}">
             <button class="btn btn-warning ripple">استبدال النقاط </button>
            </a>
            </div>
    </div>
</div>
@endsection

