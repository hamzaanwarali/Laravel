<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>موقع بونص نقاط ومكافآت</title>
    
    <!-- CSS -->
    <link href="css/app.min.css" rel="stylesheet">
    
    <!-- FontAwesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        .test-section {
            margin-bottom: 3rem;
            padding: 2rem;
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
        }
        
        .test-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--border-color);
        }
        
        .component-demo {
            margin-bottom: 2rem;
        }
        
        .demo-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
            color: var(--text-color);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        
        <div class="container">
            <nav class="navbar">
                <a href="#" class="navbar-brand">
                    <img src="images/logo.png" alt="شعار الموقع" width="40" height="40">
                    <span>نظام المهام</span>
                </a>

                <div class="component-demo">
                   
                    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <a href ="{{route('login')}}" > 
                        <button class="btn btn-secondary">
                            <i class="fas fa-check"></i>
                            الدخول 
                        </button>
                        </a>
                             <a href ="{{route('register')}}" > 
                        <button class="btn btn-outline">
                            <i class="fas fa-edit"></i>
                           التسجيل
                        </button>
                            </a>
                    </div>
                </div>
                <button class="navbar-toggle" type="button">
                    <i class="fas fa-bars"></i>
                </button>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('dashboard')}}" class="nav-link active">
                            <i class="fas fa-tachometer-alt"></i>
                            <span> لوحة التحكم</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-tasks"></i>
                            <span>المهام</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('rewards.index')}}" class="nav-link">
                            <i class="fas fa-gift"></i>
                            <span>المكافآت</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <!-- Hero Section -->
            <div class="dashboard-hero">
                <div class="hero-content">
                    <h1 class="hero-title">اختبار قالب Laravel 12</h1>
                    <p class="hero-subtitle">عرض جميع المكونات والميزات المتاحة</p>
                    
                    <div class="hero-stats">
                        <div class="hero-stat">
                            <span class="hero-stat-number points-counter" data-target="1250" data-duration="2000">0</span>
                            <span class="hero-stat-label">إجمالي النقاط</span>
                        </div>
                        <div class="hero-stat">
                            <span class="hero-stat-number points-counter" data-target="156" data-duration="1500">0</span>
                            <span class="hero-stat-label">مهام مكتملة</span>
                        </div>
                        <div class="hero-stat">
                            <span class="hero-stat-number points-counter" data-target="23" data-duration="1000">0</span>
                            <span class="hero-stat-label">مهام نشطة</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Buttons Test -->
            <div class="test-section">
                <h2 class="test-title">
                    <i class="fas fa-mouse-pointer"></i>
                    اختبار الأزرار والتأثيرات
                </h2>
                
                <div class="component-demo">
                    <div class="demo-label">أزرار مختلفة:</div>
                    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <button class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            زر أساسي
                        </button>
                        <button class="btn btn-secondary">
                            <i class="fas fa-check"></i>
                            زر ثانوي
                        </button>
                        <button class="btn btn-outline">
                            <i class="fas fa-edit"></i>
                            زر محدد
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cards Test -->
            <div class="test-section">
                <h2 class="test-title">
                    <i class="fas fa-layer-group"></i>
                    اختبار البطاقات والإحصائيات
                </h2>
                
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <span class="stat-number points-counter" data-target="23" data-duration="1000">0</span>
                        <div class="stat-label">إجمالي المهام</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>+12% من الأسبوع الماضي</span>
                        </div>
                    </div>
                    
                    <div class="stat-card secondary">
                        <div class="stat-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <span class="stat-number points-counter" data-target="18" data-duration="1200">0</span>
                        <div class="stat-label">مهام مكتملة</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up"></i>
                            <span>+8% من الأسبوع الماضي</span>
                        </div>
                    </div>
                    
                    <div class="stat-card warning">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <span class="stat-number points-counter" data-target="5" data-duration="800">0</span>
                        <div class="stat-label">مهام معلقة</div>
                        <div class="stat-change negative">
                            <i class="fas fa-arrow-down"></i>
                            <span>-3% من الأسبوع الماضي</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Progress Bars Test -->
            <div class="test-section">
                <h2 class="test-title">
                    <i class="fas fa-chart-bar"></i>
                    اختبار أشرطة التقدم
                </h2>
                
                <div class="component-demo">
                    <div class="demo-label">تقدم المشاريع:</div>
                    
                    <div class="progress-item">
                        <div class="progress-header">
                            <span class="progress-label">مشروع التطوير الجديد</span>
                            <span class="progress-percentage">75%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" data-width="75%"></div>
                        </div>
                    </div>
                    
                    <div class="progress-item">
                        <div class="progress-header">
                            <span class="progress-label">تحديث الموقع الإلكتروني</span>
                            <span class="progress-percentage">45%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" data-width="45%"></div>
                        </div>
                    </div>
                    
                    <div class="progress-item">
                        <div class="progress-header">
                            <span class="progress-label">حملة التسويق الرقمي</span>
                            <span class="progress-percentage">90%</span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" data-width="90%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Test -->
            <div class="test-section">
                <h2 class="test-title">
                    <i class="fas fa-table"></i>
                    اختبار الجداول القابلة للترتيب
                </h2>
                
                <div class="component-demo">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="50">
                                    <input type="checkbox" id="select-all">
                                </th>
                                <th class="sortable" data-sort="title">عنوان المهمة</th>
                                <th class="sortable" data-sort="priority">الأولوية</th>
                                <th class="sortable" data-sort="status">الحالة</th>
                                <th class="sortable" data-sort="points">النقاط</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox" class="task-checkbox" data-points="10">
                                </td>
                                <td>
                                    <div class="task-title">مراجعة التقرير الشهري</div>
                                    <div class="task-description">مراجعة وتحليل البيانات المالية</div>
                                </td>
                                <td>
                                    <span class="task-priority high">عالية</span>
                                </td>
                                <td>
                                    <span class="task-status pending">معلقة</span>
                                </td>
                                <td>
                                    <span class="task-points">
                                        <i class="fas fa-star"></i>
                                        10
                                    </span>
                                </td>
                            </tr>
                            
                            <tr class="completed">
                                <td>
                                    <input type="checkbox" class="task-checkbox" data-points="15" checked>
                                </td>
                                <td>
                                    <div class="task-title">إعداد العرض التقديمي</div>
                                    <div class="task-description">تحضير عرض للاجتماع القادم</div>
                                </td>
                                <td>
                                    <span class="task-priority medium">متوسطة</span>
                                </td>
                                <td>
                                    <span class="task-status completed">مكتملة</span>
                                </td>
                                <td>
                                    <span class="task-points">
                                        <i class="fas fa-star"></i>
                                        15
                                    </span>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="task-checkbox" data-points="5">
                                </td>
                                <td>
                                    <div class="task-title">الرد على الإيميلات</div>
                                    <div class="task-description">الرد على الرسائل المعلقة</div>
                                </td>
                                <td>
                                    <span class="task-priority low">منخفضة</span>
                                </td>
                                <td>
                                    <span class="task-status in-progress">قيد التنفيذ</span>
                                </td>
                                <td>
                                    <span class="task-points">
                                        <i class="fas fa-star"></i>
                                        5
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Forms Test -->
            <div class="test-section">
                <h2 class="test-title">
                    <i class="fas fa-edit"></i>
                    اختبار النماذج والتحقق
                </h2>
                
                <div class="component-demo">
                    <form data-validate>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="test-name" class="form-label">الاسم</label>
                                <input type="text" id="test-name" name="name" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="test-email" class="form-label">البريد الإلكتروني</label>
                                <input type="email" id="test-email" name="email" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="test-message" class="form-label">الرسالة</label>
                            <textarea id="test-message" name="message" class="form-control" rows="4" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                            إرسال
                        </button>
                    </form>
                </div>
            </div>

            <!-- Notifications Test -->
            <div class="test-section">
                <h2 class="test-title">
                    <i class="fas fa-bell"></i>
                    اختبار الإشعارات
                </h2>
                
                <div class="component-demo">
                    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <button class="btn btn-primary" onclick="showNotification('success')">
                            إشعار نجاح
                        </button>
                        <button class="btn btn-secondary" onclick="showNotification('info')">
                            إشعار معلومات
                        </button>
                        <button class="btn btn-outline" onclick="showNotification('warning')">
                            إشعار تحذير
                        </button>
                        <button class="btn btn-outline" onclick="showNotification('error')">
                            إشعار خطأ
                        </button>
                    </div>
                </div>
            </div>

            <!-- Animation Test -->
            <div class="test-section">
                <h2 class="test-title">
                    <i class="fas fa-magic"></i>
                    اختبار الرسوم المتحركة
                </h2>
                
                <div class="component-demo">
                    <div style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center;">
                        <button class="btn btn-primary" onclick="testShakeAnimation()">
                            اختبار الاهتزاز
                        </button>
                        
                        <div class="points-counter" data-target="500" style="font-size: 2rem; color: var(--secondary-color);">
                            0
                        </div>
                        
                        <button class="btn btn-secondary" onclick="testCounterAnimation()">
                            اختبار العداد
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>قالب Laravel 12</h3>
                    <p>قالب متطور لإدارة المهام مع دعم كامل للعربية</p>
                </div>
                
                <div class="footer-section">
                    <h3>روابط سريعة</h3>
                    <ul class="footer-links">
                        <li><a href="#">الرئيسية</a></li>
                        <li><a href="#">المهام</a></li>
                        <li><a href="#">المكافآت</a></li>
                        <li><a href="#">المساعدة</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <div class="copyright">
                        <p>&copy; 2024 قالب Laravel 12. جميع الحقوق محفوظة.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="js/app.min.js"></script>
    
    <script>
        // Test functions
        function showNotification(type) {
            const messages = {
                success: 'تم تنفيذ العملية بنجاح!',
                info: 'معلومات مفيدة للمستخدم',
                warning: 'تحذير: يرجى الانتباه',
                error: 'حدث خطأ أثناء العملية'
            };
            
            if (window.LaravelTemplate && window.LaravelTemplate.Notifications) {
                window.LaravelTemplate.Notifications.show(messages[type], type);
            } else {
                alert(messages[type]);
            }
        }
        
        function testShakeAnimation() {
            const button = event.target;
            button.classList.add('shake');
            setTimeout(() => {
                button.classList.remove('shake');
            }, 500);
        }
        
        function testCounterAnimation() {
            const counter = document.querySelector('.points-counter');
            const currentValue = parseInt(counter.textContent);
            const newValue = currentValue + Math.floor(Math.random() * 100) + 50;
            
            if (window.LaravelTemplate && window.LaravelTemplate.PointsCounter) {
                window.LaravelTemplate.PointsCounter.updateCounter(counter, newValue);
            } else {
                counter.textContent = newValue;
            }
        }
        
        // Initialize test page
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Test page loaded successfully!');
            console.log('Laravel Template JS:', window.LaravelTemplate ? 'Loaded' : 'Not loaded');
            
            // Test progress bars after a delay
            setTimeout(function() {
                const progressBars = document.querySelectorAll('.progress-bar');
                progressBars.forEach(function(bar) {
                    const width = bar.getAttribute('data-width');
                    if (width) {
                        bar.style.width = width;
                    }
                });
            }, 1000);
        });
    </script>
</body>
</html>

