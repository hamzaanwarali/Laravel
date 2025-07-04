@extends('layouts.admin')
     @section('content')
         <h1>لوحة التحكم</h1>

        <a href="{{ route('admin.rewards.index') }}" class="btn btn-success">
    <i class="fas fa-plus"> </i> عرض المكافآت الموجودة
</a>


 <a href="{{ route('admin.cards.index') }}" class="btn btn-success">
    <i class="fas fa-plus"> </i> عرض الكروت الموجودة
</a>

     @endsection
