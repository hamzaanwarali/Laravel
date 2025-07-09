<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <!-- Company Info -->
            <div class="footer-section">
                <h3>نظام إدارة المهام</h3>
                <p>نظام متطور لإدارة المهام والمكافآت والحصول على النقاط واستبدالها .</p>
                
                <div class="social-links">
                    <a href="#" class="social-link" aria-label="فيسبوك">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="تويتر">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="لينكد إن">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="social-link" aria-label="إنستغرام">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="footer-section">
                <h3>روابط سريعة</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('dashboard') }}">لوحة التحكم</a></li>
                    <li><a href="{{ route('dashboard') }}">المهام</a></li>
                    <li><a href="{{ route('rewards.index')}}">المكافآت</a></li>
                    <li><a href="{{ route('dashboard') }}">الملف الشخصي</a></li>
                </ul>
            </div>

            

            <!-- Contact Info -->
            <div class="footer-section">
                <h3>معلومات المساعدة والتواصل</h3>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>للتواصل معنا عبر الواتساب </span>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+967733481503</span>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>اليمن - تعز </span>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-clock"></i>
                        <span>على مدار 24ساعة </span>
                    </div>
                </div>

                <!-- Newsletter Subscription -->
                
                
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <div class="copyright">
                    <p>&copy; {{ date('Y') }} xXxGHxXx. جميع الحقوق محفوظة.</p>
                </div>
                
                <div class="footer-bottom-links">
                
                </div>
                
                <div class="language-switcher">
                    <select name="language" class="form-control" onchange="changeLanguage(this.value)">
                        <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected' : '' }}>العربية</option>
                        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button class="back-to-top" onclick="scrollToTop()" aria-label="العودة إلى الأعلى">
        <i class="fas fa-chevron-up"></i>
    </button>
</footer>

<!-- Additional Footer Styles -->
<style>
.footer {
    background: var(--text-color);
    color: var(--white);
    padding: 3rem 0 1rem;
    margin-top: 3rem;
}

.footer-content {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
}

.footer-section h3 {
    color: var(--white);
    margin-bottom: 1rem;
    font-size: 1.25rem;
}

.footer-section h4 {
    color: var(--white);
    margin-bottom: 0.75rem;
    font-size: 1rem;
}

.footer-section p {
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: 1rem;
}

.footer-links {
    list-style: none;
    padding: 0;
}

.footer-links li {
    margin-bottom: 0.5rem;
}

.footer-links a {
    color: var(--text-light);
    text-decoration: none;
    transition: var(--transition);
}

.footer-links a:hover {
    color: var(--white);
    padding-right: 0.5rem;
}

.social-links {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
}

.social-link {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    background: var(--primary-color);
    color: var(--white);
    border-radius: 50%;
    text-decoration: none;
    transition: var(--transition);
}

.social-link:hover {
    background: var(--secondary-color);
    transform: translateY(-2px);
}

.contact-info {
    margin-bottom: 1.5rem;
}

.contact-item {
    display: flex;
    align-items: center;
    margin-bottom: 0.75rem;
    color: var(--text-light);
}

.contact-item i {
    width: 20px;
    margin-left: 0.75rem;
    color: var(--primary-color);
}

.newsletter-form {
    margin-top: 1rem;
}

.input-group {
    display: flex;
    border-radius: var(--border-radius);
    overflow: hidden;
}

.input-group .form-control {
    flex: 1;
    border: none;
    border-radius: 0;
}

.input-group .btn {
    border-radius: 0;
    white-space: nowrap;
}

.footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 1rem;
}

.footer-bottom-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.footer-bottom-links {
    display: flex;
    gap: 1.5rem;
}

.footer-bottom-links a {
    color: var(--text-light);
    text-decoration: none;
    font-size: 0.875rem;
}

.footer-bottom-links a:hover {
    color: var(--white);
}

.language-switcher select {
    background: transparent;
    border: 1px solid var(--text-light);
    color: var(--white);
    padding: 0.25rem 0.5rem;
    border-radius: var(--border-radius);
}

.back-to-top {
    position: fixed;
    bottom: 2rem;
    left: 2rem;
    width: 50px;
    height: 50px;
    background: var(--primary-color);
    color: var(--white);
    border: none;
    border-radius: 50%;
    cursor: pointer;
    opacity: 0;
    visibility: hidden;
    transition: var(--transition);
    z-index: 1000;
}

.back-to-top.show {
    opacity: 1;
    visibility: visible;
}

.back-to-top:hover {
    background: var(--secondary-color);
    transform: translateY(-2px);
}

@media (max-width: 768px) {
    .footer-content {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .footer-bottom-content {
        flex-direction: column;
        text-align: center;
    }
    
    .footer-bottom-links {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .social-links {
        justify-content: center;
    }
    
    .back-to-top {
        bottom: 1rem;
        left: 1rem;
        width: 45px;
        height: 45px;
    }
}
</style>

<!-- Footer Scripts -->
<script>
// Back to top functionality
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Show/hide back to top button
window.addEventListener('scroll', function() {
    const backToTop = document.querySelector('.back-to-top');
    if (window.pageYOffset > 300) {
        backToTop.classList.add('show');
    } else {
        backToTop.classList.remove('show');
    }
});

// Language switcher
function changeLanguage(language) {
}

// Newsletter form submission
document.querySelector('.newsletter-form')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const email = this.querySelector('input[name="email"]').value;
    
    // Here you would typically send an AJAX request
    // For now, we'll just show a notification
    if (window.LaravelTemplate && window.LaravelTemplate.Notifications) {
        window.LaravelTemplate.Notifications.show('تم الاشتراك بنجاح في النشرة الإخبارية!', 'success');
        this.reset();
    }
});
</script>

