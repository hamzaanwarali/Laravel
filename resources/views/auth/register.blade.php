<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
              
        <!--  Phone -->
<div class="form-group row">
    <label for="phone" class="col-md-4 col-form-label text-md-right">رقم الهاتف</label>

    <div class="col-md-6">
        <input id="phone" type="tel" 
               class="form-control @error('phone') is-invalid @enderror" 
               name="phone" 
               value="{{ old('phone') }}" 
               required
               title = "يجب أن يبدأ الرقم بـ 71 أو 77 أو 73 أو 78 أو 70 "
               placeholder="مثال: 777123456">

        @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('كلمة المرور')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('هل لديك حساب سابق?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('التسجيل') }}
            </x-primary-button>
        </div>
    </form>
    
    <script>
document.getElementById('phone').addEventListener('input', function(e) {
    // إزالة أي أحرف غير رقمية
    this.value = this.value.replace(/[^0-9]/g, '');
    
    // التحقق من الصيغة أثناء الكتابة
    if (this.value.length > 0 && !/^(71|73|77|78)/.test(this.value)) {
        this.setCustomValidity('يجب أن يبدأ الرقم بـ 71 أو 73 أو 77 أو 78');
    } else {
        this.setCustomValidity('');
    }
});
</script>

</x-guest-layout>
