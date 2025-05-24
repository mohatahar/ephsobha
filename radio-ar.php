<?php
include('header-ar.php');
// Configuration de base
$hospital_name = "المؤسسة العمومية الاستشفائية الصبحة";
$tagline = "في خدمة صحتكم";
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>وحدة الأشعة</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- Google Fonts Arabic -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #0077b6;
            --secondary-color: #48cae4;
            --accent-color: #00b4d8;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --success-color: #198754;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Cairo', 'Segoe UI', Tahoma, Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.8;
            direction: rtl;
            text-align: right;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Page Title */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services/radio.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            text-align: center;
            padding: 120px 20px;
            position: relative;
            margin-bottom: 60px;
        }

        .page-title h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            position: relative;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .page-title p {
            font-size: 1.4rem;
            max-width: 700px;
            margin: 0 auto;
            font-weight: 300;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 50px;
            background: linear-gradient(to bottom right, transparent 49%, white 50%);
        }

        .page-content {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-bottom: 50px;
        }

        .section {
            padding: 0px 0;
        }

        .section-title {
            color: var(--primary-color);
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--accent-color);
            font-weight: 600;
        }

        .info-card {
            background-color: #f8f9fa;
            border-right: 4px solid var(--primary-color);
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 5px;
        }

        .info-card h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
            font-weight: 600;
        }

        .guidelines-list {
            list-style-type: none;
            padding-right: 0;
            padding-left: 0;
        }

        .guidelines-list li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .guidelines-list li i {
            color: var(--primary-color);
            margin-left: 10px;
            margin-right: 0;
            font-size: 1.2rem;
        }

        .special-notice {
            background-color: #fff3cd;
            border-right: 4px solid var(--warning-color);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: #856404;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .special-notice ul {
            margin-right: 20px;
            margin-left: 0;
        }

        /* Service de radiologie spécifique */
        .radiology-hours {
            background-color: #e3f2fd;
            border-right: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .radiology-hours h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-weight: 600;
        }

        .radiology-hours p {
            margin-bottom: 10px;
        }
        
        .radiology-card {
            background-color: #e7f5ff;
            border-right: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .radiology-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-weight: 600;
        }

        .service-icon {
            font-size: 3rem;
            color: var(--primary-color);
            text-align: center;
            margin: 20px 0;
        }

        .service-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .service-item {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
        }

        .service-item:hover {
            transform: translateY(-5px);
        }

        .service-item i {
            color: var(--primary-color);
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .service-item h4 {
            color: var(--dark-color);
            margin-bottom: 10px;
            font-weight: 600;
        }

        /* Examen gallery */
        .exam-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .exam-item {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .exam-item:hover {
            transform: translateY(-5px);
        }

        .exam-image {
            height: 180px;
            background-color: #e6e6e6;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .exam-image i {
            font-size: 3rem;
            color: var(--primary-color);
        }

        .exam-content {
            padding: 15px;
            text-align: center;
        }

        .exam-content h4 {
            color: var(--primary-color);
            margin-bottom: 10px;
            font-weight: 600;
        }

        /* FAQ Section */
        .faq-section {
            margin: 40px 0;
        }

        .faq-item {
            margin-bottom: 15px;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            background-color: #f0f7ff;
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            color: var(--primary-color);
            transition: all 0.3s ease;
        }

        .faq-question:hover {
            background-color: #e1eefd;
        }

        .faq-question i {
            transition: transform 0.3s ease;
        }

        .faq-answer {
            background-color: white;
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
        }

        .faq-item.active .faq-answer {
            padding: 15px 20px;
            max-height: 300px;
        }

        /* Call to action */
        .cta-section {
            text-align: center;
            margin: 40px 0;
            padding: 30px;
            background-color: #e9ecef;
            border-radius: 10px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #005d91;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }
            
            .service-list, .exam-gallery {
                grid-template-columns: 1fr;
            }
        }

        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        /* Assurer que le contenu ne déborde pas sur mobile */
        html,
        body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }

        /* Style pour le bouton de retour en haut */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background-color: var(--primary-color);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            opacity: 0;
            transition: opacity 0.3s, transform 0.3s;
            transform: translateY(20px);
            z-index: 999;
        }

        .back-to-top.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .back-to-top i {
            font-size: 1.5rem;
        }

        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 576px) {
            .page-title {
                padding: 80px 20px;
            }

            .page-title p {
                font-size: 1.1rem;
            }
        }

        /* Custom Arabic numerals for ordered list */
        .arabic-list {
            counter-reset: arabic-counter;
        }

        .arabic-list li {
            counter-increment: arabic-counter;
            position: relative;
        }

        .arabic-list li::before {
            content: counter(arabic-counter, arabic-indic) ".";
            color: var(--primary-color);
            font-weight: bold;
            margin-left: 10px;
        }

        /* Fix for icon positioning in RTL */
        .fa-1::before { content: "١"; }
        .fa-2::before { content: "٢"; }
        .fa-3::before { content: "٣"; }
        .fa-4::before { content: "٤"; }

        /* Enhanced typography for Arabic */
        h1, h2, h3, h4, h5, h6 {
            font-weight: 600;
            line-height: 1.4;
        }

        p, li {
            line-height: 1.8;
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">وحدة الأشعة</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">فحوصات أشعة تقليدية عالية الجودة للحصول على تشخيص دقيق</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>وحدة الأشعة</h3>
                <p>تتميز وحدة الأشعة في المؤسسة العمومية الاستشفائية الصبحة بتجهيزها بأجهزة رقمية حديثة تمكن من إجراء صور عالية الجودة. يضمن فريقنا من التقنيين ذوي الخبرة إجراء فحوصات دقيقة وسريعة، وهي ضرورية للتشخيص والرعاية العلاجية للمرضى.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-x-ray"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="radiology-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i>أوقات العمل</h3>
                <p><strong>الفحوصات الإستعجالية:</strong> الخدمة متوفرة على مدار 24 ساعة للحالات الطبية الإستعجالية</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">أجهزتنا ومعداتنا</h2>
                <p>تضم وحدة الأشعة في المؤسسة العمومية الاستشفائية الصبحة معدات رقمية تسمح بالحصول على صور عالية الدقة مع تقليل التعرض للإشعاع:</p>
                
                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-x-ray"></i>
                        <h4>التصوير الشعاعي الرقمي</h4>
                        <p>تقنية متطورة للحصول على صور دقيقة مع أقل كمية إشعاع</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-laptop-medical"></i>
                        <h4>نظام الأرشفة PACS</h4>
                        <p>أرشفة رقمية واستشارة الصور للوصول السريع للنتائج</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-print"></i>
                        <h4>نظام الطباعة</h4>
                        <p>إنتاج صور على دعائم فيزيائية بجودة تشخيصية</p>
                    </div>
                </div>
            </section>

            <section class="radiology-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-clipboard-list"></i> أنواع الفحوصات الشعاعية المتوفرة</h3>
                
                <div class="exam-gallery">
                    <div class="exam-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="exam-image">
                            <i class="fas fa-lungs"></i>
                        </div>
                        <div class="exam-content">
                            <h4>أشعة الصدر</h4>
                            <p>فحص الرئتين والقلب وهياكل الصدر</p>
                        </div>
                    </div>
                    
                    <div class="exam-item" data-aos="fade-up" data-aos-delay="150">
                        <div class="exam-image">
                            <i class="fas fa-bone"></i>
                        </div>
                        <div class="exam-content">
                            <h4>أشعة العظام</h4>
                            <p>تشخيص الكسور والتهاب المفاصل وأمراض العظام</p>
                        </div>
                    </div>
                    
                    <div class="exam-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="exam-image">
                            <i class="fas fa-joint"></i>
                        </div>
                        <div class="exam-content">
                            <h4>أشعة المفاصل</h4>
                            <p>تقييم المفاصل وتشخيص أمراض المفاصل</p>
                        </div>
                    </div>
                    
                    <div class="exam-item" data-aos="fade-up" data-aos-delay="250">
                        <div class="exam-image">
                            <i class="fas fa-stomach"></i>
                        </div>
                        <div class="exam-content">
                            <h4>أشعة البطن</h4>
                            <p>فحص أعضاء البطن لاكتشاف التشوهات</p>
                        </div>
                    </div>
                    
                    <div class="exam-item" data-aos="fade-up" data-aos-delay="300">
                        <div class="exam-image">
                            <i class="fas fa-tooth"></i>
                        </div>
                        <div class="exam-content">
                            <h4>أشعة الجمجمة والجيوب الأنفية</h4>
                            <p>فحص الهياكل العظمية للرأس والجيوب الأنفية</p>
                        </div>
                    </div>
                </div>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">مستخدمي الوحدة</h2>
                
                <p>تتكون وحدة الأشعة من مهنيين مؤهلين:</p>
                
                <ul class="guidelines-list">
                    <li data-aos="fade-right" data-aos-delay="150"><i class="fas fa-user-nurse"></i> <strong>تقنيو الأشعة:</strong> فنيون مدربون على إجراء الفحوصات الشعاعية</li>
                </ul>
            </section>
            
            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>التحضير لفحوصات الأشعة</h3>
                <p>معظم فحوصات الأشعة التقليدية لا تتطلب تحضيراً خاصاً. إليك بعض التوصيات العامة:</p>
                <ul style="margin-top: 10px; margin-right: 20px;">
                    <li>إحضار صور الأشعة السابقة للمقارنة</li>
                    <li>خلع المجوهرات والساعات والأشياء المعدنية من المنطقة المراد فحصها</li>
                    <li>إبلاغ الطاقم الطبي في حالة الحمل أو الاشتباه في الحمل</li>
                    <li>ارتداء ملابس مريحة بدون عناصر معدنية</li>
                </ul>
            </div>

            <!-- Section FAQ -->
            <section class="faq-section" data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">الأسئلة الشائعة</h2>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="faq-question">
                        <span>هل فحوصات الأشعة مؤلمة؟</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>فحوصات الأشعة التقليدية غير مؤلمة تماماً. يجب على المريض فقط البقاء ثابتاً لبضع ثوان أثناء أخذ الصورة.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="150">
                    <div class="faq-question">
                        <span>كم من الوقت يستغرق الحصول على النتائج؟</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>النتائج متوفرة فوراً ويمكن إرسالها بدون تأخير إلى الطبيب المعالج.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="faq-question">
                        <span>هل تشكل فحوصات الأشعة مخاطر؟</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>تستخدم فحوصات الأشعة التقليدية الإشعاع المؤين بجرعات محكومة وتُوصف فقط عندما تكون الفائدة المتوقعة أكبر من المخاطر المحتملة. تطبق وحدتنا مبدأ ALARA (أقل ما يمكن تحقيقه بشكل معقول) لتقليل التعرض للإشعاع مع ضمان صور بجودة تشخيصية.</p>
                    </div>
                </div>
                
                <div class="faq-item" data-aos="fade-up" data-aos-delay="250">
                    <div class="faq-question">
                        <span>هل يمكنني أن أكون مصحوباً أثناء الفحص؟</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>بالنسبة لمعظم الفحوصات، يجب على المرافقين الانتظار في غرفة الانتظار. للمرضى القُصّر أو الأشخاص الذين يحتاجون مساعدة، يمكن السماح لمرافق واحد مع مراعاة تدابير الحماية من الإشعاع اللازمة.</p>
                    </div>
                </div>
            </section>

            <section class="radiology-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-info-circle"></i> مسار المريض في وحدة الأشعة</h3>
                <ol class="guidelines-list arabic-list">
                    <li data-aos="zoom-in" data-aos-delay="100"><i class="fa-1"></i> <strong>حجز موعد:</strong> بوصفة طبية</li>
                    <li data-aos="zoom-in" data-aos-delay="150"><i class="fa-2"></i> <strong>الاستقبال والتسجيل:</strong> التحقق من الوثائق الإدارية والطبية</li>
                    <li data-aos="zoom-in" data-aos-delay="200"><i class="fa-3"></i> <strong>إجراء الفحص:</strong> من قبل تقني الأشعة</li>
                    <li data-aos="zoom-in" data-aos-delay="300"><i class="fa-4"></i> <strong>تسليم النتائج:</strong> النتائج تُرسل مباشرة إلى الملف الإلكتروني للمريض</li>
                </ol>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3 class="mt-3">لأي سؤال آخر حول وحدة الأشعة لدينا:</h3>
                <a href="#contact" class="btn btn-primary" data-aos="fade-up" data-aos-delay="250">اتصل بنا</a>
            </div>
        </div>
    </div>
    
    <!-- Bouton de retour en haut -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>
    
    <!-- AOS JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialisation de AOS
        AOS.init({
            once: false,
            mirror: false,
            offset: 120,
            easing: 'ease-out-back'
        });

        // Script pour le bouton de retour en haut et accordéon FAQ
        document.addEventListener('DOMContentLoaded', function () {
            const backToTopButton = document.getElementById('back-to-top');

            // Fonction pour afficher ou masquer le bouton en fonction du défilement
            function toggleBackToTopButton() {
                if (window.scrollY > 300) {
                    backToTopButton.classList.add('visible');
                } else {
                    backToTopButton.classList.remove('visible');
                }
            }

            // Ajout d'un effet de défilement fluide lors du clic sur le bouton
            backToTopButton.addEventListener('click', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // Écoute de l'événement de défilement
            window.addEventListener('scroll', toggleBackToTopButton);

            // Script pour l'accordéon FAQ
            const faqItems = document.querySelectorAll('.faq-item');
            
            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                
                question.addEventListener('click', () => {
                    // Fermer tous les autres items ouverts
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item && otherItem.classList.contains('active')) {
                            otherItem.classList.remove('active');
                        }
                    });
                    
                    // Basculer l'état actif de l'item cliqué
                    item.classList.toggle('active');
                });
            });
        });
    </script>
</body>
</html>

<?php include('footer-ar.php'); ?>