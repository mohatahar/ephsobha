<?php
include('header-ar.php');
// Configuration de base
$hospital_name = "المؤسسة العمومية الإستشفائية الصبحة";
$tagline = "في خدمة صحتكم";
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قسم الطب الداخلي - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- Google Fonts Arabic -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@400;700&display=swap" rel="stylesheet">
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
            font-family: 'Noto Sans Arabic', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services/med-interne.jpg');
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
            text-transform: uppercase;
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
        }

        .info-card {
            background-color: #f8f9fa;
            border-right: 4px solid var(--primary-color);
            border-left: none;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 5px;
        }

        .info-card h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
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
            border-left: none;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: #856404;
            margin-bottom: 10px;
        }

        .special-notice ul {
            margin-top: 10px;
            margin-right: 20px;
        }

        /* Service spécifique */
        .service-hours {
            background-color: #e7f5ff;
            border-right: 4px solid var(--primary-color);
            border-left: none;
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .service-hours h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .service-hours p {
            margin-bottom: 10px;
        }
        
        .service-card {
            background-color: #e7f5ff;
            border-right: 4px solid var(--primary-color);
            border-left: none;
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .service-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
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

        .btn-danger {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }
            
            .service-list, .team-grid {
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

        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.2rem;
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

        /* Corrections RTL pour les listes ordonnées */
        ol.guidelines-list {
            counter-reset: arabic-counter;
        }

        ol.guidelines-list li {
            counter-increment: arabic-counter;
            position: relative;
        }

        ol.guidelines-list li:before {
            content: counter(arabic-counter, arabic-indic);
            position: absolute;
            right: -30px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.2rem;
        }

        /* Ajustement pour les icônes dans les listes ordonnées */
        ol.guidelines-list li i.fas {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">مصلحة الطب الداخلي</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">تشخيص وعلاج الأمراض المعقدة في المؤسسة العمومية الإستشفائية الصبحة   </p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>مصلحة الطب الداخلي</h3>
                <p>مصلحة الطب الداخلي في المؤسسة العمومية الإستشفائية الصبحة هي مصلحة متعددة التخصصات مخصصة لتشخيص وعلاج الأمراض المعقدة والمتعددة الأنظمة. يقدم فريقنا من أطباء مؤهلين نهجاً شاملاً ومتكاملاً للصحة، مع مراعاة جميع الجوانب الطبية للمريض لوضع تشخيص دقيق واقتراح رعاية شخصية.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-heartbeat"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="service-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> الجاهزية</h3>
                <p><strong>الإستشفاء:</strong> المصلحة مفتوحة 24 ساعة يومياً و7 أيام في الأسبوع للمرضى في حالة الإستشفاء</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">تخصصاتنا في الطب الداخلي</h2>
                <p>تتولى مصلحة الطب الداخلي في المؤسسة العمومية الإستشفائية الصبحة رعاية مجموعة كبيرة من الأمراض:</p>
                
                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-lungs"></i>
                        <h4>أمراض الجهاز التنفسي</h4>
                        <p>الربو، انسداد الرئة المزمن، أمراض الرئة، التهابات الجهاز التنفسي المزمنة</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-heart"></i>
                        <h4>أمراض القلب والأوعية الدموية</h4>
                        <p>ارتفاع ضغط الدم، قصور القلب، تصلب الشرايين</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-brain"></i>
                        <h4>الأمراض العصبية</h4>
                        <p>الصداع المزمن، اعتلال الأعصاب، اضطرابات التنكس العصبي</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-tint"></i>
                        <h4>أمراض المناعة الذاتية</h4>
                        <p>الذئبة الحمراء، التهاب المفاصل الروماتويدي، تصلب الجلد، الأمراض الالتهابية</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-disease"></i>
                        <h4>الغدد الصماء</h4>
                        <p>السكري، اضطرابات الغدة الدرقية، أمراض الغدة الكظرية</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="350">
                        <i class="fas fa-diagnoses"></i>
                        <h4>التشخيصات المعقدة</h4>
                        <p>الحمى مجهولة السبب، الأعراض متعددة الأنظمة</p>
                    </div>
                </div>
            </section>

            <section class="service-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-procedures"></i> نهجنا في الرعاية</h3>
                <p>يتميز الطب الداخلي بنهجه الشمولي للمريض. أطباؤنا مدربون على:</p>
                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i> <strong>وضع تشخيص شامل</strong> من خلال دمج جميع الأعراض ونتائج الفحوصات</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-check-circle"></i> <strong>تنسيق الرعاية</strong> بين مختلف التخصصات الطبية</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> <strong>متابعة الأمراض المزمنة</strong> برؤية شاملة للمريض</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> <strong>تخصيص العلاجات</strong> وفقاً للملف الخاص لكل مريض</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i> <strong>الوقاية من المضاعفات</strong> المرتبطة بالأمراض المتعددة</li>
                </ul>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">المعدات والتقنيات</h2>
                
                <p>تتوفر مصلحة الطب الداخلي لدينا على معدات حديثة لضمان تشخيص دقيق ورعاية مثلى:</p>
                
                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i> تخطيط صدى القلب والموجات فوق الصوتية البطنية عند سرير المريض</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-check-circle"></i> معدات فحص وظائف الجهاز التنفسي</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> وصول سريع لخدمات التصوير الطبي</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> مخبر التحاليل الطبية</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i> مراقبة مستمرة للمرضى الذين يعانون من أمراض غير مستقرة</li>
                </ul>
            </section>          
            
            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>متى تستشير في مصلحة الطب الداخلي</h3>
                <p>الاستشارة في مصلحة الطب الداخلي مناسبة بشكل خاص في الحالات التالية:</p>
                <ul>
                    <li>أعراض متعددة وغير مفسرة</li>
                    <li>أمراض مزمنة معقدة أو أمراض متعددة</li>
                    <li>حمى مطولة بدون سبب واضح</li>
                    <li>الاشتباه في مرض مناعي ذاتي أو التهابي</li>
                    <li>متابعة أمراض متعددة تتطلب تنسيق الرعاية</li>
                    <li>صعوبات تشخيصية بعد استشارات متخصصة</li>
                </ul>
            </div>

            <section class="service-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-clipboard-list"></i> مسار المريض في مصلحة الطب الداخلي</h3>
                <ol class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><strong>الاستشارة الأولية</strong>: التاريخ المرضي الكامل والفحص السريري الشامل</li>
                    <li data-aos="fade-left" data-aos-delay="150"><strong>الفحوصات التكميلية</strong>: التحاليل البيولوجية، التصوير الطبي حسب الحاجة</li>
                    <li data-aos="fade-left" data-aos-delay="200"><strong>التشخيص الشامل</strong>: التفسير الشامل للنتائج</li>
                    <li data-aos="fade-left" data-aos-delay="250"><strong>خطة العلاج</strong>: اقتراح علاجي شخصي</li>
                    <li data-aos="fade-left" data-aos-delay="300"><strong>المتابعة المنتظمة</strong>: تكييف العلاج حسب التطور</li>
                    <li data-aos="fade-left" data-aos-delay="350"><strong>تنسيق الرعاية</strong>: التواصل مع متخصصين آخرين إذا لزم الأمر</li>
                </ol>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3>تحتاج إلى استشارة في الطب الداخلي؟</h3>
                <p class="mt-3">لأي سؤال آخر:</p>
                <a href="index.php#contact" class="btn btn-primary" data-aos="fade-up" data-aos-delay="250">اتصل بنا</a>
            </div>
        </div>
    </div>
    <!-- Bouton de retour en haut -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>
    <script>
        // Script pour le bouton de retour en haut
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

            // Écouter l'événement de défilement pour afficher/masquer le bouton
            window.addEventListener('scroll', toggleBackToTopButton);

            // Vérifier la position de défilement au chargement de la page
            toggleBackToTopButton();
        });
    </script>
    <!-- AOS JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialisation de AOS
        AOS.init({
            once: false,       // Animation peut se répéter
            mirror: false,     // Animation se produit une seule fois
            offset: 120,       // Décalage (en px) depuis le point de déclenchement original
            easing: 'ease-out-back' // Type d'effet d'animation
        });
    </script>
</body>
</html>

<?php include('footer-ar.php'); ?>