<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'نظام إدارة المهام')</title>
    <meta name="description" content="@yield('description', 'نظام متطور لإدارة المهام والمكافآت مع دعم كامل للغة العربية')">
    <meta name="keywords" content="@yield('keywords', 'مهام, مكافآت, إدارة, نظام, عربي')">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('title', 'نظام إدارة المهام')">
    <meta property="og:description" content="@yield('description', 'نظام متطور لإدارة المهام والمكافآت')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/logo.png') }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
    
    <!-- Preload Critical Resources -->
    <link rel="preload" href="{{ asset('css/app.min.css') }}" as="style">
    <link rel="preload" href="{{ asset('js/app.min.js') }}" as="script">
    
    <!-- CSS -->
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="@yield('body-class')" data-theme="{{ session('theme', 'light') }}">
    <!-- Loading Spinner -->
    <div id="loading-spinner" class="loading-spinner">
        <div class="spinner"></div>
        <p>جاري التحميل...</p>
    </div>

    <!-- Header -->
    @include('layouts.header')

    <!-- Main Content -->
    <main class="main-content">
            @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Notification Container -->
    <div id="notification-container" class="notification-container"></div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.min.js') }}" defer></script>
    
    @stack('scripts')
    
    <!-- Hide Loading Spinner -->
    <script>
        window.addEventListener('load', function() {
            const spinner = document.getElementById('loading-spinner');
            if (spinner) {
                spinner.style.opacity = '0';
                setTimeout(function() {
                    spinner.style.display = 'none';
                }, 300);
            }
        });
    </script>
</body>
</html>

