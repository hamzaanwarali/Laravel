@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('cards.redeem.submit') }}">
    @csrf
    <div class="alert alert-danger">
        
        <label for="code">أدخل رمز الكرت:</label>
        <input type="text" name="code" id="code" required 
               class="form-control" placeholder="XXX-XXXX-XXX">
    </div>
    <button type="submit" class="btn btn-primary">استبدال الكرت</button>
</form>
@endsection