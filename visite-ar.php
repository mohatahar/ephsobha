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
    <title>أوقات الزيارة - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/visites.jpeg');
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

        /* Heures de visite section */
        .visiting-hours {
            background-color: #e7f5ff;
            border-right: 4px solid var(--primary-color);
            border-left: none;
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .visiting-hours h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .visiting-hours p {
            margin-bottom: 10px;
        }

        .visiting-hours strong {
            font-weight: 600;
            color: var(--dark-color);
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
            right: 20px;
            right: auto;
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

        /* Polices arabes */
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap');
        
        body, h1, h2, h3, h4, h5, h6, p, span, div {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body>
        <!-- Page Title Section -->
        <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">أوقات الزيارة</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">تعرف على مواعيد الزيارة والتعليمات الواجب احترامها في المؤسسة العمومية الاستشفائية الصبحة</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>معلومة مهمة</h3>
                <p>تم وضع تنظيم الزيارات لتجنب إزعاج أنشطة العلاج وحسن سير العمل في الأقسام المعنية. كما يهدف إلى منع أي سبب للإزعاج أو عدم الراحة أو خطر العدوى للمرضى المنومين. نحن ندرك أهمية الدعم العائلي والصداقة أثناء دخول المريض المستشفى ونطلب من جميع الزوار احترام مواعيدنا وتوجيهاتنا بدقة.</p>
            </div>

            <!-- Horaires de visite officiels -->
            <section class="visiting-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> مواعيد الزيارة</h3>
                <p><strong>المواعيد العادية:</strong> الزيارات مسموحة يوميا بين الساعة 13:30 و 15:00.</p>
                <p><strong>الزيارات الاستثنائية:</strong> تخضع للحصول على ترخيص موقع من طرف مدير المؤسسة أو أحد نوابه المخولين .</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">تعليمات للزوار</h2>
                <p>لضمان سلامة ورفاهية جميع مرضانا، نطلب من جميع الزوار احترام التعليمات الصارمة المعمول بها في أي مستشفى:</p>
                
                <ul class="guidelines-list">
                    <li data-aos="fade-right" data-aos-delay="250"><i class="fas fa-check-circle"></i> احترام هدوء المرضى الآخرين</li>
                    <li data-aos="fade-right" data-aos-delay="300"><i class="fas fa-check-circle"></i> زائرين كحد أقصى في نفس الوقت لكل مريض</li>
                    <li data-aos="fade-right" data-aos-delay="350"><i class="fas fa-check-circle"></i> منع إحضار الأطفال أقل من 15 سنة (إلا بترخيص خاص)</li>
                    <li data-aos="fade-right" data-aos-delay="400"><i class="fas fa-check-circle"></i> لا تزر مريضا إذا كنت مريضا (برد، أنفلونزا، ...إلخ)</li>
                    <li data-aos="fade-right" data-aos-delay="450"><i class="fas fa-check-circle"></i> منع مطلق للجلوس على أسرة المرضى</li>
                    <li data-aos="fade-right" data-aos-delay="500"><i class="fas fa-check-circle"></i> إطفاء أو وضع الأجهزة الإلكترونية في الوضع الصامت</li>
                    <li data-aos="fade-right" data-aos-delay="550"><i class="fas fa-check-circle"></i> منع مطلق للتدخين داخل حرم المستشفى</li>
                </ul>
                
                <p class="mt-3">هذه التعليمات معلقة أيضا على مستوى كل قسم. نشكركم على احترامها من أجل رفاهية جميع المرضى.</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">الاستثناءات والحالات الخاصة</h2>
                
                <p>في بعض الحالات، يمكن وضع ترتيبات خاصة للزيارات خارج الساعات العادية. هذه الاستثناءات تمنح عادة في الحالات التالية:</p>
                
                <ul class="guidelines-list">
                    <li data-aos="zoom-in" data-aos-delay="100"><i class="fas fa-info-circle"></i> المرضى في الإحتضار</li>
                    <li data-aos="zoom-in" data-aos-delay="150"><i class="fas fa-info-circle"></i> الحالات العائلية الاستثنائية</li>
                    <li data-aos="zoom-in" data-aos-delay="200"><i class="fas fa-info-circle"></i> المرافقة الضرورية للمرضى الضعفاء</li>
                </ul>
                
                <p>لطلب ترخيص خاص، يرجى الاتصال برئيس القسم المعني أو إدارة المؤسسة.</p>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                    <h3>ملاحظة مهمة</h3>
                    <p>في حالة وباء موسمي أو وضع صحي استثنائي، يمكن تعديل أو تقييد ساعات الزيارة. يرجى دائما التحقق من المعلومات الحالية قبل زيارتكم بالاتصال بمركز الاستقبال .</p>
                </div>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3>لديكم أسئلة أخرى؟</h3>
                <p>فريق الاستقبال لدينا متاح لمساعدتكم والإجابة على جميع استفساراتكم.</p>
                <a href="index-ar.php#contact" class="btn btn-primary" data-aos="fade-up" data-aos-delay="200">اتصلوا بنا</a>
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