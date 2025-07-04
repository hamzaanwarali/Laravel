<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen">
        


    
        <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-header">{{ auth()->user()->unreadNotifications->count() }} إشعار جديد</span>
        <div class="dropdown-divider"></div>
        
        @foreach(auth()->user()->unreadNotifications->take(5) as $notification)
        <a href="{{ $notification->data['link'] }}" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> {{ $notification->data['message'] }}
            <span class="float-right text-muted text-sm">{{ $notification->created_at->diffForHumans() }}</span>
        </a>
        <div class="dropdown-divider"></div>
        @endforeach
        
        <a href="{{ route('admin.requests.index') }}" class="dropdown-item dropdown-footer">عرض جميع الإشعارات</a>
    </div>
</li>




        
        <main class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
