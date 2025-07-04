@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">إنشاء كروت نقاط جديدة</h2>
    
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.cards.store') }}" method="POST">
                @csrf
                
                <!-- عدد النقاط -->
                <div class="form-group row">
                    <label for="points" class="col-md-3 col-form-label text-md-right">
                        عدد النقاط في كل كرت:
                    </label>
                    <div class="col-md-6">
                        <input type="number" 
                               id="points" 
                               name="points" 
                               class="form-control @error('points') is-invalid @enderror" 
                               min="1" 
                               max="1000" 
                               required>
                        
                        @error('points')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <!-- عدد الكروت -->
                <div class="form-group row">
                    <label for="count" class="col-md-3 col-form-label text-md-right">
                        عدد الكروت المراد إنشاؤها:
                    </label>
                    <div class="col-md-6">
                        <input type="number" 
                               id="count" 
                               name="count" 
                               class="form-control @error('count') is-invalid @enderror" 
                               min="1" 
                               max="100" 
                               required>
                        
                        @error('count')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <!-- تاريخ الانتهاء -->
                <div class="form-group row">
                    <label for="expires_at" class="col-md-3 col-form-label text-md-right">
                        تاريخ الانتهاء:
                    </label>
                    <div class="col-md-6">
                        <input type="date" 
                               id="expires_at" 
                               name="expires_at" 
                               class="form-control @error('expires_at') is-invalid @enderror" 
                               min="{{ date('Y-m-d', strtotime('+1 day')) }}" 
                               required>
                        
                        @error('expires_at')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <!-- زر الإرسال -->
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-plus-circle"></i> إنشاء الكروت
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card {
        border-radius: 10px;
    }
    .form-control {
        height: 45px;
    }
</style>
@endsection
