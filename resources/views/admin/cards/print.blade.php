@extends('layouts.admin')

@section('content')

@foreach($cards as $card)
<div style="border: 1px solid #000; padding: 15px; margin: 10px; text-align: center;">
    <h3>نظام المكافآت</h3>
    <p>رمز الكرت: <strong>{{ $card->code }}</strong></p>
    <p>قيمة الكرت: <strong>{{ $card->points }} نقطة</strong></p>
    <p>صالح حتى: <strong>{{ $card->expires_at }}</strong></p>
    <small>مسح الكود عند الاستخدام</small>
</div>
@endforeach

<script>
    window.onload = function() {
        window.print();
        setTimeout(function() {
            window.close();
        }, 1000);
    }
</script>


@endsection