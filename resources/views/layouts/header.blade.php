
<html dir="rtl" lang=ar>

<header class="header">

    <div class="col-md-4">
        <div class="card bg-primary text-white p-3 text-center">
             <a  class="navbar-brand">
                    @if (auth()->user())
                        
                       <div class="hero-stats">
                        <div class="hero-stat">
                            <span class="hero-stat-label">إجمالي النقاط : </span>
                        <span class="hero-stat-number points-counter" data-target="{{auth()->user()->points()->sum('amount');}} " data-duration="2000">0</span>

                        </div>
            <span> 
                
            نقطة 
        <i class="fas fa-coins"></i> </span>
                        
@endif
            </a>
        </div>
    </div>

    <div class="container">
        <nav class="navbar">
            <!-- Brand Logo -->
            <a href="{{ route('dashboard') }}" class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" alt="شعار الموقع" width="40" height="40">
                <span>نظام المهام</span>
            </a>

            <!-- Mobile Menu Toggle -->
            <button class="navbar-toggle" type="button" aria-label="فتح القائمة">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Navigation Menu -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>لوحة التحكم</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('cards.redeem') }}" class="nav-link">
                        <i class="fas fa-credit-card"></i>
                        <span>الكروت</span>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="fas fa-tasks"></i>
                        <span>المهام</span>
                    </a>
                </li>
                
                <li class="nav-item">
                <a href="{{ route('rewards.index') }}" class="nav-link">
                            <i class="fas fa-gift"></i>
                        <span>المكافآت</span>
                    </a>
                </li>
                
                                                    
                        <li class="dropdown-divider"></li>
                        
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="dropdown-form">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>تسجيل الخروج</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>

                <!-- Theme Switcher 
                <li class="nav-item">
                    <button class="nav-link theme-switcher" type="button" aria-label="تغيير المظهر">
                        <i class="fas fa-moon"></i>
                    </button>
                </li>
-->

                <!-- Notifications 
                <li class="nav-item">
                    <a href="#" class="nav-link notifications-toggle" data-toggle="notifications">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </a>
                    
                    <div class="notifications-dropdown">
                        <div class="notifications-header">
                            <h4>الإشعارات</h4>
                            <button class="mark-all-read">تحديد الكل كمقروء</button>
                        </div>
                        
                        <div class="notifications-list">
                            <div class="notification-item unread">
                                <div class="notification-icon">
                                    <i class="fas fa-check-circle text-success"></i>
                                </div>
                                <div class="notification-content">
                                    <p>تم إكمال مهمة "مراجعة التقرير الشهري"</p>
                                    <small>منذ 5 دقائق</small>
                                </div>
                            </div>
                            
                            <div class="notification-item unread">
                                <div class="notification-icon">
                                    <i class="fas fa-gift text-primary"></i>
                                </div>
                                <div class="notification-content">
                                    <p>حصلت على مكافأة جديدة: 50 نقطة</p>
                                    <small>منذ ساعة</small>
                                </div>
                            </div>
                            
                            <div class="notification-item">
                                <div class="notification-icon">
                                    <i class="fas fa-exclamation-triangle text-warning"></i>
                                </div>
                                <div class="notification-content">
                                    <p>مهمة "إعداد العرض التقديمي" تنتهي غداً</p>
                                    <small>منذ 3 ساعات</small>
                                </div>
                            </div>
                        </div>
                        -->
                        </div>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</header>

<!-- Breadcrumb -->
@if(isset($breadcrumbs) && count($breadcrumbs) > 0)
<nav class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i>
                    <span>الرئيسية</span>
                </a>
            </li>
            
            @foreach($breadcrumbs as $breadcrumb)
                @if($loop->last)
                    <li class="breadcrumb-item active">{{ $breadcrumb['title'] }}</li>
                @else
                    <li class="breadcrumb-item">
                        <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a>
                    </li>
                @endif
            @endforeach
        </ol>
    </div>
</nav>
@endif

</html>