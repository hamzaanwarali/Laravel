@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-warning">
            <h3>تعديل كرت: {{ $card->code }}</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.cards.update', $card->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label>عدد النقاط</label>
                    <input type="number" name="points" value="{{ $card->points }}" 
                           class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label>تاريخ الانتهاء</label>
                    <input type="date" name="expires_at" 
                           value="{{ $card->expires_at }}" 
                           class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                <a href="{{ route('admin.cards.index') }}" class="btn btn-secondary">إلغاء</a>
            </form>
        </div>
    </div>
</div>
@endsection
