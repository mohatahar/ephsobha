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
    <title>مصلحة الجراحة العامة - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- Google Fonts للعربية -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services/chirurgie.jpg');
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
            font-size: 2rem;
            font-weight: 600;
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
            font-size: 1.5rem;
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
            border-left: none;
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
        }

        /* Service de chirurgie spécifique */
        .surgery-hours {
            background-color: #e7f5ff;
            border-right: 4px solid var(--primary-color);
            border-left: none;
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .surgery-hours h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-weight: 600;
        }

        .surgery-hours p {
            margin-bottom: 10px;
        }
        
        .surgery-card {
            background-color: #e7f5ff;
            border-right: 4px solid var(--primary-color);
            border-left: none;
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .surgery-card h3 {
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

        /* Images des équipements */
        .equipment-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .equipment-item {
            background-color: #f8f9fa;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            text-align: center;
        }

        .equipment-item:hover {
            transform: translateY(-5px);
        }

        .equipment-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .equipment-info {
            padding: 15px;
        }

        .equipment-info h4 {
            color: var(--primary-color);
            margin-bottom: 10px;
            font-weight: 600;
        }

        /* Call to action */
        .cta-section {
            text-align: center;
            margin: 40px 0;
            padding: 30px;
            background-color: #e9ecef;
            border-radius: 10px;
        }

        .cta-section h3 {
            font-weight: 600;
            margin-bottom: 15px;
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
            margin: 10px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #005d91;
        }

        .btn-success {
            background-color: var(--success-color);
            color: white;
        }

        .btn-success:hover {
            background-color: #146c43;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }
            
            .service-list, .team-cards, .equipment-gallery {
                grid-template-columns: 1fr;
            }

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

        /* Ajustements pour les numéros dans les listes ordonnées */
        .guidelines-list ol {
            counter-reset: item;
            padding-right: 0;
        }

        .guidelines-list ol > li {
            display: block;
            margin-bottom: 0.5em;
            margin-right: 2em;
        }

        .guidelines-list ol > li:before {
            content: counter(item, decimal) ".";
            counter-increment: item;
            font-weight: bold;
            color: var(--primary-color);
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">مصلحة الجراحة العامة</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">رعاية جراحية عالية الجودة مع فريق من ذوي الخبرة في المؤسسة العمومية الإستشفائية الصبحة</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>مصلحة الجراحة العامة</h3>
                <p>تقدم مصلحة الجراحة العامة في المؤسسة العمومية الاستشفائية الصبحة مجموعة كاملة من التدخلات الجراحية لعلاج مختلف الأمراض. يعمل فريقنا من الجراحين ذوي الخبرة وأطباء التخدير والممرضين والفنيين بتعاون وثيق لضمان رعاية جراحية آمنة وعالية الجودة. نحن ملتزمون بتقديم علاج شخصي وفعال لكل مريض، باستخدام أحدث التقنيات والأقل تدخلا ممكناً.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-user-md"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="surgery-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> المواعيد والاستشارات</h3>
                <p><strong>العمليات المبرمجة:</strong> من الأحد إلى الخميس حسب البرنامج المحدد</p>
                <p><strong>الإستعجالات الجراحية:</strong> متوفرة على مدار 24 ساعة و7 أيام في الأسبوع بالتنسيق مع مصلحة الإستعجالات الطبية والجراحية</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">تخصصاتنا الجراحية</h2>
                <p>تتولى مصلحة الجراحة العامة في المؤسسة العمومية الاستشفائية الصبحة مجموعة واسعة من التدخلات:</p>
                
                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-stomach"></i>
                        <h4>جراحة الجهاز الهضمي</h4>
                        <p>علاج أمراض الجهاز الهضمي (المرارة، الزائدة الدودية، الفتق، ...إلخ)</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-weight"></i>
                        <h4>الجراحة الحشوية</h4>
                        <p>التدخلات على الأعضاء البطنية (الكبد، الطحال، البنكرياس، الأمعاء)</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-procedures"></i>
                        <h4>جراحة الغدد الصماء</h4>
                        <p>علاج أمراض الغدة الدرقية والغدد الكظرية</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-syringe"></i>
                        <h4>الجراحة طفيفة التوغل</h4>
                        <p>التدخلات بتقنيات طفيفة التوغل لتقليل الندوب وتسريع الشفاء</p>
                    </div>
                </div>
            </section>

            <section class="surgery-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-clipboard-list"></i> مسار المريض الجراحي</h3>
                <ol class="guidelines-list">
                    <li data-aos="fade-right" data-aos-delay="100"><i class="fas fa-1"></i> <strong>الاستشارة قبل العملية:</strong> الفحص السريري والتقييم وتخطيط التدخل</li>
                    <li data-aos="fade-right" data-aos-delay="150"><i class="fas fa-2"></i> <strong>الفحوصات قبل العملية:</strong> الفحوصات الدموية والإشعاعية وتقييم التخدير</li>
                    <li data-aos="fade-right" data-aos-delay="200"><i class="fas fa-3"></i> <strong>الاستشفاء:</strong> الدخول إلى مصلحتنا في اليوم السابق أو يوم التدخل</li>
                    <li data-aos="fade-right" data-aos-delay="250"><i class="fas fa-4"></i> <strong>التدخل الجراحي:</strong> يتم في غرف العمليات المجهزة بأحدث التقنيات</li>
                    <li data-aos="fade-right" data-aos-delay="300"><i class="fas fa-5"></i> <strong>المتابعة بعد العملية:</strong> المراقبة والرعاية المناسبة حتى الشفاء</li>
                    <li data-aos="fade-right" data-aos-delay="350"><i class="fas fa-6"></i> <strong>الخروج والمتابعة:</strong> تعليمات مفصلة للرعاية في المنزل واستشارات متابعة مبرمجة</li>
                </ol>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">المعدات والتقنيات</h2>
                
                <p>مصلحتنا مجهزة بمعدات حديثة لضمان تدخلات آمنة وفعالة:</p>
                
                <ul class="guidelines-list">
                    <li data-aos="fade-right" data-aos-delay="100"><i class="fas fa-check-circle"></i> غرف عمليات وفق المعايير الدولية مع إضاءة LED ونظام تهوية متقدم</li>
                    <li data-aos="fade-right" data-aos-delay="150"><i class="fas fa-check-circle"></i> معدات منظارية وتنظيرية من آخر جيل</li>
                    <li data-aos="fade-right" data-aos-delay="200"><i class="fas fa-check-circle"></i> مواد التخدير والمراقبة عالية الأداء</li>
                    <li data-aos="fade-right" data-aos-delay="250"><i class="fas fa-check-circle"></i> أدوات جراحية متخصصة لكل نوع من التدخل</li>
                    <li data-aos="fade-right" data-aos-delay="300"><i class="fas fa-check-circle"></i> معدات التصوير أثناء العملية للحصول على دقة مثلى</li>
                </ul>
                
                <div class="equipment-gallery">
                    <div class="equipment-item" data-aos="zoom-in" data-aos-delay="100">
                        <div class="equipment-info">
                            <h4>غرفة عمليات حديثة</h4>
                            <p>مجهزة لجميع أنواع التدخلات الجراحية</p>
                        </div>
                    </div>
                    
                    <div class="equipment-item" data-aos="zoom-in" data-aos-delay="150">
                        <div class="equipment-info">
                            <h4>معدات تنظيرية</h4>
                            <p>للتدخلات طفيفة التوغل التي تقلل الندوب</p>
                        </div>
                    </div>
                    
                    <div class="equipment-item" data-aos="zoom-in" data-aos-delay="200">
                        <div class="equipment-info">
                            <h4>غرفة الإنعاش</h4>
                            <p>مراقبة فورية بعد العملية مع معدات متطورة</p>
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>الرعاية بعد العملية</h3>
                <p>المتابعة بعد العملية مرحلة أساسية في العملية الجراحية. فريقنا يضمن متابعة منتظمة وشخصية لكل مريض:</p>
                <ul style="margin-top: 10px; margin-right: 20px;">
                    <li>العناية بالجروح ومراقبة الشفاء</li>
                    <li>إدارة الألم بعد العملية</li>
                    <li>الكشف والرعاية المبكرة للمضاعفات</li>
                    <li>نصائح غذائية مناسبة لكل تدخل</li>
                    <li>برنامج إعادة التأهيل المبكر (ERAS) لبعض التدخلات</li>
                    <li>استشارات متابعة مبرمجة</li>
                </ul>
            </div>

            <section class="surgery-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-info-circle"></i> كيفية التحضير لتدخلكم</h3>
                <p>لتحسين رعايتكم الجراحية:</p>
                <ul class="guidelines-list">
                    <li data-aos="zoom-in" data-aos-delay="100"><i class="fas fa-check-circle"></i> اتبعوا بدقة تعليمات الصيام قبل العملية</li>
                    <li data-aos="zoom-in" data-aos-delay="150"><i class="fas fa-check-circle"></i> أعلموا جراحكم بأي علاج جاري</li>
                    <li data-aos="zoom-in" data-aos-delay="200"><i class="fas fa-check-circle"></i> أشيروا إلى أي تاريخ للحساسية</li>
                    <li data-aos="zoom-in" data-aos-delay="250"><i class="fas fa-check-circle"></i> خططوا لمرافق لخروجكم</li>
                    <li data-aos="zoom-in" data-aos-delay="300"><i class="fas fa-check-circle"></i> أحضروا فحوصاتكم الطبية الحديثة</li>
                </ul>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3 class="mt-3">لأي سؤال حول خدماتنا الجراحية:</h3>
                <a href="index.php#contact" class="btn btn-success" data-aos="fade-up" data-aos-delay="250">اتصلوا بنا</a>
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