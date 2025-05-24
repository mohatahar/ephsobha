<!-- Footer -->
<footer dir="rtl">
    <div class="container">
        <div class="footer-content">
            <div class="footer-column">
                <h3>المؤسسة العمومية الاستشفائية الصبحة</h3>
                <p>مؤسسة عمومية استشفائية مكرسة لتقديم رعاية طبية عالية الجودة لجميع المواطنين.</p>
                <div class="social-links">
                    <a href="https://www.facebook.com/ephsobha.sante" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </div>
            </div>
            <div class="footer-column">
                <h3>روابط سريعة</h3>
                <ul class="footer-links">
                    <li><a href="index-ar.php">الرئيسية</a></li>
                    <li><a href="services-ar.php">خدماتنا</a></li>
                    <li><a href="about-ar.php">من نحن</a></li>
                    <li><a href="recrutement-ar.php">التوظيف</a></li>
                    <li><a href="contact-ar.php">اتصل بنا</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>الخدمات</h3>
                <ul class="footer-links">
                    <li><a href="urgences-ar.php">الإستعجالات الطبية والجراحية</a></li>
                    <li><a href="med-interne-ar.php">الطب الداخلي</a></li>
                    <li><a href="chirurgie-ar.php">الجراحة العامة</a></li>
                    <li><a href="pediatrie-ar.php">طب الأطفال</a></li>
                    <li><a href="maternite-ar.php">الأمومة</a></li>
                    <li><a href="dialyse-ar.php">غسيل الكلى</a></li>
                    <li><a href="pneumo-ar.php">الأمراض الصدرية</a></li>
                    <li><a href="radio-ar.php">الأشعة</a></li>
                    <li><a href="labo-ar.php">مخبر التحاليل الطبية</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>معلومات</h3>
                <ul class="footer-links">
                    <li><a href="charte-ar.php">ميثاق المريض</a></li>
                    <li><a href="visite-ar.php">أوقات الزيارة</a></li>
                    <li><a href="actualites-ar.php">الأخبار</a></li>
                    <li><a href="annuaire-ar.php">الدليل</a></li>
                    <li><a href="faq-ar.php">الأسئلة الشائعة</a></li>
                    <li><a href="confidentialite-ar.php">سياسة الخصوصية</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> المؤسسة العمومية الإستشفائية الصبحة . جميع الحقوق محفوظة.</p>
            </div>
            <div class="developer-info">
                <p>التصميم والتطوير: <a href="https://tahardjebbar.onrender.com" target="_blank"
                        rel="noopener">طاهر جبار محمد <i class="fas fa-code"></i></a></p>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer-bottom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .copyright p,
    .developer-info p {
        margin: 0;
        font-size: 0.9em;
    }

    .developer-info a {
        font-weight: 500;
        color: #4a8eff;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }

    .developer-info a:hover {
        color: #ffffff;
        transform: translateY(-1px);
    }

    .developer-info i {
        margin-right: 5px; /* تم تغيير margin-left إلى margin-right للعربية */
        font-size: 0.9em;
        color: inherit;
    }

    /* تعديلات خاصة باللغة العربية */
    footer[dir="rtl"] {
        text-align: right;
    }

    footer[dir="rtl"] .footer-content {
        direction: rtl;
    }

    footer[dir="rtl"] .footer-links {
        text-align: right;
    }

    footer[dir="rtl"] .social-links {
        justify-content: flex-start;
    }

    /* خط أزرق تحت العناوين */
    .footer-column h3 {
        position: relative;
        padding-bottom: 15px;
        margin-bottom: 20px;
    }

    .footer-column h3::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0; /* للعربية نبدأ من اليمين */
        width: 50px;
        height: 3px;
        background: linear-gradient(45deg, #4a8eff, #00d4ff);
        border-radius: 2px;
    }

    /* للغات اليسار إلى اليمين */
    footer:not([dir="rtl"]) .footer-column h3::after {
        left: 0;
        right: auto;
    }

    /* Responsive adjustment */
    @media (max-width: 768px) {
        .footer-bottom {
            flex-direction: column;
            gap: 10px;
            text-align: center;
        }
    }
</style>

<script>
    // قائمة الهاتف المحمول
    document.querySelector('.mobile-menu-btn').addEventListener('click', function () {
        document.querySelector('.nav-menu').classList.toggle('active');
    });

    // التمرير السلس للروابط المرجعية
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });

            // إغلاق قائمة الهاتف المحمول بعد النقر
            document.querySelector('.nav-menu').classList.remove('active');
        });
    });
</script>
<script>
    // زر عائم للمساعد الذكي
    document.addEventListener('DOMContentLoaded', function () {
        // إنشاء الزر العائم
        const floatingButton = document.createElement('div');
        floatingButton.className = 'ia-floating-button';
        floatingButton.innerHTML = `
        <i class="fas fa-robot"></i>
        <span class="ia-floating-tooltip">مساعدك الطبي الذكي</span>
    `;

        // إخفاء الزر في البداية
        floatingButton.style.opacity = '0';
        floatingButton.style.visibility = 'hidden';
        floatingButton.style.transition = 'opacity 0.3s, visibility 0.3s';

        // إضافة إلى body
        document.body.appendChild(floatingButton);

        // تحديد عتبة التمرير (بالبكسل) التي يظهر عندها الزر
        const scrollThreshold = 300;

        // دالة للتحكم في عرض الزر عند التمرير
        function handleScroll() {
            if (window.scrollY > scrollThreshold) {
                floatingButton.style.opacity = '1';
                floatingButton.style.visibility = 'visible';

                // إضافة تأثير النبض عند ظهور الزر
                if (!floatingButton.style.animation) {
                    floatingButton.style.animation = 'pulse 2s infinite';
                }
            } else {
                floatingButton.style.opacity = '0';
                floatingButton.style.visibility = 'hidden';
            }
        }

        // فحص موضع التمرير عند التحميل
        handleScroll();

        // إضافة مستمع حدث التمرير
        window.addEventListener('scroll', handleScroll);

        // إضافة حدث النقر
        floatingButton.addEventListener('click', function () {
            // إعادة التوجيه إلى صفحة المساعد الذكي
            window.location.href = 'assistant-ar.php';
        });
    });
</script>
</body>

</html>