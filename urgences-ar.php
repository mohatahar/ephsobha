<?php
include('header-ar.php');

$hospital_name = "المؤسسة العمومية الإستشفائية الصبحة";
$tagline = "في خدمة صحتكم";
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قسم الطوارئ - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- Google Fonts for Arabic -->
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
            font-family: 'Cairo', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services/umc.jpg');
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
            text-align: right;
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
        }

        .guidelines-list {
            list-style-type: none;
            padding-right: 0;
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
        }

        /* Service des urgences spécifique */
        .emergency-hours {
            background-color: #ffecec;
            border-right: 4px solid var(--danger-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .emergency-hours h3 {
            color: var(--danger-color);
            margin-bottom: 15px;
        }

        .emergency-hours p {
            margin-bottom: 10px;
        }
        
        .emergency-card {
            background-color: #e7f5ff;
            border-right: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .emergency-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .service-icon {
            font-size: 3rem;
            color: var(--danger-color);
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
            margin: 5px;
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
            
            .service-list {
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

        /* Adaptation des listes pour l'arabe */
        .special-notice ul {
            margin-top: 10px;
            margin-right: 20px;
            list-style-type: disc;
        }

        .special-notice li {
            margin-bottom: 5px;
        }

        /* Numbered list for Arabic */
        .guidelines-list li[data-aos*="fade-left"] {
            flex-direction: row-reverse;
        }

        .guidelines-list li i.fa-1::before { content: "١"; }
        .guidelines-list li i.fa-2::before { content: "٢"; }
        .guidelines-list li i.fa-3::before { content: "٣"; }
        .guidelines-list li i.fa-4::before { content: "٤"; }
        .guidelines-list li i.fa-5::before { content: "٥"; }
        .guidelines-list li i.fa-6::before { content: "٦"; }

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
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">مصلحة الإستعجالات الطبية والجراحية</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">رعاية طارئة عالية الجودة متاحة على مدار 24 ساعة طوال أيام الأسبوع في المؤسسة العمومية الاستشفائية الصبحة</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>مصلحة الإستعجالات الطبية والجراحية</h3>
                <p>تؤمن مصلحة الإستعجالات الطبية والجراحية في المؤسسة العمومية الاستشفائية الصبحة الرعاية الفورية للمرضى الذين يحتاجون إلى عناية استعجالية. فريقنا الطبي وشبه الطبي المؤهل تأهيلاً عالياً متاح على مدار 24 ساعة طوال أيام الأسبوع للاستجابة لجميع حالات الإستعجالات بسرعة وكفاءة ومهنية. مهمتنا هي تقديم رعاية عالية الجودة في أسرع وقت ممكن للمرضى في حالات الإستعجالات.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-ambulance"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="emergency-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> الجاهزية</h3>
                <p><strong>ساعات العمل:</strong> مصلحة الإستعجالات الطبية والجراحية لدينا مفتوحة على مدار 24 ساعة طوال أيام الأسبوع، بما في ذلك أيام العطل.</p>
                <p><strong>الفريق الطبي:</strong> فريق كامل يتكون من أطباء عامين وممرضين متخصصين ومساعدي تمريض موجود باستمرار لضمان الرعاية المثلى.</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">خدمات مصلحة الإستعجالات الطبية والجراحية لدينا</h2>
                <p>تقدم مصلحة الإستعجالات الطبية والجراحية في المؤسسة العمومية الاستشفائية الصبحة مجموعة واسعة من الرعاية للاستجابة لجميع حالات الإستعجالات:</p>
                
                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-heartbeat"></i>
                        <h4>الإستعجالات الطبية</h4>
                        <p>رعاية الحالات الطبية الحادة (آلام الصدر، ضيق التنفس، ...إلخ)</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-bone"></i>
                        <h4>إستعجالات الإصابات</h4>
                        <p>علاج الإصابات والكسور والالتواءات وإصابات الصدمات الأخرى</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-stethoscope"></i>
                        <h4>الفحوصات التكميلية</h4>
                        <p>الأشعة والتحاليل المخبرية متاحة في حالات الإستعجالات</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-user-md"></i>
                        <h4>الاستشارات المتخصصة</h4>
                        <p>وصول سريع إلى الأطباء المتخصصين المناوبين حسب الحاجة</p>
                    </div>
                </div>
            </section>

            <section class="emergency-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-procedures"></i> مسار المريض في مصلحة الإستعجالات الطبية والجراحية</h3>
                <ol class="guidelines-list">
                    <li data-aos="fade-right" data-aos-delay="100"><i class="fas fa-1"></i> <strong>الاستقبال والتسجيل</strong>: الرعاية الإدارية السريعة</li>
                    <li data-aos="fade-right" data-aos-delay="150"><i class="fas fa-2"></i> <strong>الفرز</strong>: تقييم الخطورة من قبل طبيب الفرز لتحديد أولوية الرعاية</li>
                    <li data-aos="fade-right" data-aos-delay="200"><i class="fas fa-3"></i> <strong>الاستشارة الطبية</strong>: فحص من قبل طبيب عام</li>
                    <li data-aos="fade-right" data-aos-delay="250"><i class="fas fa-4"></i> <strong>الفحوصات التكميلية</strong>: إذا لزم الأمر (التحاليل، الأشعة، ...إلخ)</li>
                    <li data-aos="fade-right" data-aos-delay="300"><i class="fas fa-5"></i> <strong>الرعاية والعلاج</strong>: تقديم الرعاية المناسبة</li>
                    <li data-aos="fade-right" data-aos-delay="350"><i class="fas fa-6"></i> <strong>التوجيه</strong>: العودة إلى المنزل، الإدخال إلى المستشفى أو النقل حسب حالة المريض</li>
                </ol>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">المعدات والبنية التحتية</h2>
                
                <p>مصلحة الإستعجالات الطبية والجراحية لدينا مجهزة بأحدث المعدات الطبية لضمان الرعاية المثلى للمرضى:</p>
                
                <ul class="guidelines-list">
                    <li data-aos="fade-right" data-aos-delay="100"><i class="fas fa-check-circle"></i> غرفة الإنعاش للإستعجالات الحيوية</li>
                    <li data-aos="fade-right" data-aos-delay="150"><i class="fas fa-check-circle"></i> غرف استشارة فردية لاحترام خصوصية المرضى</li>
                    <li data-aos="fade-right" data-aos-delay="200"><i class="fas fa-check-circle"></i> غرفة الرعاية والجراحة الصغيرة</li>
                    <li data-aos="fade-right" data-aos-delay="250"><i class="fas fa-check-circle"></i> معدات مراقبة القلب والتنفس</li>
                    <li data-aos="fade-right" data-aos-delay="300"><i class="fas fa-check-circle"></i> وصول مباشر إلى خدمات التصوير ومخبر التحاليل</li>
                    <li data-aos="fade-right" data-aos-delay="350"><i class="fas fa-check-circle"></i> وحدة مراقبة قصيرة المدى لمراقبة تطور المرضى</li>
                </ul>
            </section>
            
            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>متى تذهب إلى الإستعجالات؟</h3>
                <p>خدمات الإستعجالات مصممة لعلاج الحالات الطبية الخطيرة التي تهدد الحياة أو الأطراف. إليك بعض الحالات التي تبرر زيارة مصلحة الإستعجالات الطبية والجراحية:</p>
                <ul>
                    <li>صعوبات تنفس شديدة</li>
                    <li>ألم شديد في الصدر</li>
                    <li>إصابة في الرأس مع فقدان الوعي</li>
                    <li>كسور مفتوحة أو تشوهات واضحة</li>
                    <li>نزيف غزير لا يمكن السيطرة عليه</li>
                    <li>حروق واسعة أو عميقة</li>
                    <li>أعراض السكتة الدماغية (شلل الوجه، ضعف في الأطراف، اضطرابات في الكلام)</li>
                </ul>
            </div>

            <section class="emergency-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-info-circle"></i> نصائح عملية</h3>
                <p>لتسهيل رعايتك في مصلحة الإستعجالات الطبية والجراحية:</p>
                <ul class="guidelines-list">
                    <li data-aos="zoom-in" data-aos-delay="100"><i class="fas fa-check-circle"></i> أحضر بطاقة الهوية وبطاقة التأمين الصحي</li>
                    <li data-aos="zoom-in" data-aos-delay="150"><i class="fas fa-check-circle"></i> احمل قائمة بأدويتك المعتادة</li>
                    <li data-aos="zoom-in" data-aos-delay="200"><i class="fas fa-check-circle"></i> أبلغ عن أي حساسية معروفة</li>
                    <li data-aos="zoom-in" data-aos-delay="250"><i class="fas fa-check-circle"></i> إذا أمكن، تعال مع مرافق</li>
                </ul>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3>إستعجالات طبية؟</h3>
                <p class="mt-3">لأي سؤال آخر حول مصلحة الإستعجالات الطبية والجراحية لدينا:</p>
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