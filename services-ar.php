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
    <title>خدماتنا - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
                * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Cairo', 'Amiri', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.8;
            direction: rtl;
            text-align: right;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Page Title */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services.jpg');
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
            font-family: 'Amiri', serif;
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

        /* Section Styling */
        .section {
            padding: 0px 0;
        }

        .bg-light {
            background-color: #f8f9fa;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: #2a5a86;
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background-color: #4caf50;
            bottom: 0;
            right: 50%;
            transform: translateX(50%);
        }

        .section-title p {
            font-size: 1.2rem;
            color: #666;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }

        .service-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            text-align: center;
            border-top: 5px solid #4caf50;
            display: flex;
            flex-direction: column;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .service-img {
            height: 180px;
            width: 100%;
            overflow: hidden;
        }

        .service-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .service-card:hover .service-img img {
            transform: scale(1.1);
        }

        .service-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .service-card i {
            font-size: 2.5rem;
            color: #4caf50;
            margin-bottom: 15px;
            display: inline-block;
            position: relative;
            z-index: 1;
        }

        .service-card i::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 60px;
            background-color: rgba(76, 175, 80, 0.1);
            border-radius: 50%;
            top: 50%;
            right: 50%;
            transform: translate(50%, -50%);
            z-index: -1;
        }

        .service-card h3 {
            color: #2a5a86;
            font-size: 1.5rem;
            margin-bottom: 15px;
            position: relative;
            font-weight: 600;
        }

        .service-card p {
            color: #666;
            margin-bottom: 20px;
        }

        .service-details {
            list-style: none;
            padding: 0;
            text-align: right;
            border-top: 1px dashed #e0e0e0;
            padding-top: 15px;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .service-details li {
            padding: 8px 0;
            position: relative;
            padding-right: 25px;
            color: #555;
        }

        .service-details li::before {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: #4caf50;
            position: absolute;
            right: 0;
            top: 10px;
            font-size: 0.9rem;
        }

        /* Bouton en savoir plus */
        .btn-more {
            background-color: #2a5a86;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-block;
            margin-top: auto;
        }

        .btn-more:hover {
            background-color: #1d4061;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-more i {
            margin-right: 8px;
            font-size: 0.9rem;
            color: white;
            transform: scaleX(-1);
        }

        /* Call to Action */
        .cta-section {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('img/4.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            text-align: center;
            padding: 80px 20px;
            margin-top: 60px;
        }

        .cta-section h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .cta-section p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
        }

        .btn-primary {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            border-radius: 30px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover {
            background-color: #3d8b40;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .btn-primary i {
            margin-right: 8px;
            transform: scaleX(-1);
        }

        /* Feature Cards */
        .feature-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-bottom: 60px;
        }

        .feature-card {
            text-align: center;
            padding: 40px 30px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            background: white;
            transition: all 0.3s;
            overflow: hidden;
            position: relative;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0.1;
            z-index: 0;
            transition: opacity 0.3s;
        }

        .feature-card:hover::before {
            opacity: 0.15;
        }

        .feature-card:nth-child(1)::before {
            background-image: url('img/specialists.jpg');
        }

        .feature-card:nth-child(2)::before {
            background-image: url('img/24service.jpg');
        }

        .feature-card:nth-child(3)::before {
            background-image: url('img/equipment.jpg');
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-card i,
        .feature-card h3,
        .feature-card p {
            position: relative;
            z-index: 1;
        }

        .feature-card i {
            font-size: 3rem;
            color: #4caf50;
            margin-bottom: 20px;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            color: #2a5a86;
            margin-bottom: 15px;
        }

        .feature-card p {
            color: #666;
        }

        /* Facility Gallery */
        .facility-gallery {
            margin: 60px 0;
        }

        .gallery-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .gallery-title h2 {
            font-size: 2.5rem;
            color: #2a5a86;
            margin-bottom: 15px;
        }

        .gallery-title p {
            color: #666;
            max-width: 800px;
            margin: 0 auto;
        }

        .gallery-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            height: 250px;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-caption {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px;
            transform: translateY(100%);
            transition: transform 0.3s;
        }

        .gallery-item:hover .gallery-caption {
            transform: translateY(0);
        }

        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            left: 30px;
            width: 50px;
            height: 50px;
            background-color: #4caf50;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
        }

        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            background-color: #3d8b40;
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 991px) {
            .feature-cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .gallery-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.2rem;
            }

            .page-title p {
                font-size: 1.1rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .back-to-top {
                left: 20px;
                bottom: 20px;
            }
        }

        @media (max-width: 576px) {
            .feature-cards {
                grid-template-columns: 1fr;
            }

            .gallery-container {
                grid-template-columns: 1fr;
            }
        }

               /* Adjustments for Arabic text */
        h1, h2, h3 {
            font-family: 'Amiri', serif;
        }

        p, li, span {
            font-family: 'Cairo', sans-serif;
        } 
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">خدماتنا</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">رعاية طبية متميزة لجميع أفراد المجتمع</p>
        </div>
    </section>

    <!-- Features Section -->
    <div class="container">
        <div class="feature-cards">
            <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                <i class="fas fa-user-md"></i>
                <h3>أطباء متخصصون مؤهلون</h3>
                <p>فريق طبي ذو خبرة عالية وأطباء متخصصون معترف بهم في مجالاتهم.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-clock"></i>
                <h3>خدمة على مدار 24 ساعة</h3>
                <p>خدمات إستعجالية متاحة ليلاً ونهاراً لتلبية جميع احتياجاتكم الطبية.</p>
            </div>
            <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                <i class="fas fa-building"></i>
                <h3>المعدات الطبية</h3>
                <p>معدات طبية حديثة تضمن تشخيصاً دقيقاً وعلاجات فعالة.</p>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <section class="section" id="services">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>الخدمات الطبية</h2>
                <p>نقدم مجموعة شاملة من الخدمات الطبية لتلبية جميع احتياجاتكم الصحية، مع فريق من المهنيين المتفانين ومعدات حديثة.</p>
            </div>

            <div class="services-grid">
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/umc.jpg" alt="خدمة الطوارئ">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-truck"></i>
                        <h3>الإستعجالات الطبية والجراحية</h3>
                        <p>خدمة الإستعجالات متاحة على مدار 24 ساعة و7 أيام في الأسبوع لجميع أنواع الحالات الطبية.</p>
                        <ul class="service-details">
                            <li>رعاية فورية للحالات الإستعجالية المهددة للحياة</li>
                            <li>فريق طبي متاح باستمرار</li>
                        </ul>
                        <a href="urgences-ar.php" class="btn-more"><i class="fas fa-arrow-right"></i> معرفة المزيد</a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/med-interne.jpg" alt="الطب الباطني">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-stethoscope"></i>
                        <h3>الطب الداخلي</h3>
                        <p>تشخيص وعلاج الأمراض الداخلية المعقدة للبالغين.</p>
                        <ul class="service-details">
                            <li>رعاية الأمراض المزمنة</li>
                            <li>تشخيص شامل وشخصي</li>
                            <li>متابعة منتظمة للمرضى</li>
                        </ul>
                        <a href="med-interne-ar.php" class="btn-more"><i class="fas fa-arrow-right"></i> معرفة المزيد</a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/chirurgie.jpg" alt="الجراحة العامة">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-procedures"></i>
                        <h3>الجراحة العامة</h3>
                        <p>تدخلات جراحية من قبل فريق من الجراحين وأطباء الرضوض المؤهلين.</p>
                        <ul class="service-details">
                            <li>الجراحة العامة</li>
                            <li>طب الرضوض</li>
                        </ul>
                        <a href="chirurgie-ar.php" class="btn-more"><i class="fas fa-arrow-right"></i> معرفة المزيد</a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/pediatrie.jpg" alt="قسم الأطفال">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-child"></i>
                        <h3>طب الأطفال</h3>
                        <p>رعاية طبية متخصصة للرضع والأطفال والمراهقين.</p>
                        <ul class="service-details">
                            <li>متابعة النمو والتطور</li>
                            <li>التطعيمات</li>
                            <li>علاج أمراض الطفولة</li>
                        </ul>
                        <a href="pediatrie-ar.php" class="btn-more"><i class="fas fa-arrow-right"></i> معرفة المزيد</a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/maternite.jpg" alt="قسم الولادة">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-baby"></i>
                        <h3>الأمومة</h3>
                        <p>مرافقة الحمل إلى الولادة من قبل القابلات والأطباء العامين، في بيئة آمنة.</p>
                        <ul class="service-details">
                            <li>متابعة ما قبل الولادة من قبل القابلات والأطباء العامين</li>
                            <li>ولادة بمساعدة فريق متمرس</li>
                            <li>رعاية ما بعد الولادة ونصائح شخصية</li>
                        </ul>
                        <a href="maternite-ar.php" class="btn-more"><i class="fas fa-arrow-right"></i> معرفة المزيد</a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/dialyse.jpg" alt="قسم غسيل الكلى">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-tint"></i>
                        <h3>غسيل الكلى</h3>
                        <p>علاج الفشل الكلوي المزمن بغسيل الكلى عالي الجودة.</p>
                        <ul class="service-details">
                            <li>معدات حديثة لغسيل الكلى</li>
                            <li>متابعة من أطباء الكلى</li>
                            <li>رعاية شخصية متخصصة</li>
                        </ul>
                        <a href="dialyse-ar.php" class="btn-more"><i class="fas fa-arrow-right"></i> معرفة المزيد</a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/pneumologie.jpg" alt="قسم أمراض الرئة">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-lungs"></i>
                        <h3>الأمراض الصدرية</h3>
                        <p>رعاية متخصصة لأمراض الجهاز التنفسي.</p>
                        <ul class="service-details">
                            <li>تشخيص وعلاج أمراض الجهاز التنفسي</li>
                            <li>متابعة مرضى السل</li>
                            <li>اختبارات وظائف الرئة</li>
                        </ul>
                        <a href="pneumo-ar.php" class="btn-more"><i class="fas fa-arrow-right"></i> معرفة المزيد</a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/radiologie.jpg" alt="قسم الأشعة">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-x-ray"></i>
                        <h3>وحدة الأشعة</h3>
                        <p>وحدة تصوير طبي مجهزة لتوفير تشخيص موثوق بفضل التقنيات المناسبة.</p>
                        <ul class="service-details">
                            <li>الأشعة السينية التقليدية</li>
                            <li>الموجات فوق الصوتية</li>
                        </ul>
                        <a href="radio-ar.php" class="btn-more"><i class="fas fa-arrow-right"></i> معرفة المزيد</a>
                    </div>
                </div>
                <div class="service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-img">
                        <img src="img/services/labo.jpg" alt="مختبر التحاليل">
                    </div>
                    <div class="service-content">
                        <i class="fas fa-vials"></i>
                        <h3>مخبر التحاليل الطبية</h3>
                        <p>تحاليل بيولوجية وطبية دقيقة.</p>
                        <ul class="service-details">
                            <li>تحاليل الدم</li>
                            <li>اختبارات الكيمياء الحيوية</li>
                            <li>نتائج سريعة وموثوقة</li>
                        </ul>
                        <a href="labo-ar.php" class="btn-more"><i class="fas fa-arrow-right"></i> معرفة المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facility Gallery Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="gallery-title" data-aos="fade-up">
                <h2>مرافقنا</h2>
                <p>اكتشف مرافقنا الطبية المصممة لتوفير أفضل بيئة رعاية ممكنة</p>
            </div>
            <div class="gallery-container" data-aos="fade-up">
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/1.jpg" alt="استقبال المستشفى">
                    <div class="gallery-caption">مدخل المستشفى</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/salle.jpg" alt="غرفة الاستشارة">
                    <div class="gallery-caption">قاعة الفحص</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/bloc.jpg" alt="غرفة العمليات">
                    <div class="gallery-caption">قاعة العمليات</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/chambre.jpg" alt="غرفة المريض">
                    <div class="gallery-caption">غرفة المريض</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/laboratoire.jpg" alt="المختبر">
                    <div class="gallery-caption">مخبر التحاليل الطبية</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/radio.jpg" alt="غرفة الأشعة">
                    <div class="gallery-caption">معدات الأشعة</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/urgences.jpg" alt="قسم الطوارئ">
                    <div class="gallery-caption">مدخل الإستعجالات</div>
                </div>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <img src="img/services/5.jpg" alt="خارج المستشفى">
                    <div class="gallery-caption">واجهة المستشفى</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section" data-aos="fade-up">
        <div class="container">
            <h2>هل تحتاج إلى موعد طبي؟</h2>
            <p>فريقنا مستعد لاستقبالكم وتقديم أفضل الرعاية الممكنة. اتصلوا بنا اليوم لحجز موعد مع أطبائنا المتخصصين.</p>
            <a href="contact-ar.php" class="btn btn-primary"><i class="fas fa-arrow-right"></i> حجز موعد</a>
        </div>
    </section>

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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Script pour les images de la galerie
            const galleryItems = document.querySelectorAll('.gallery-item');

            galleryItems.forEach(item => {
                item.addEventListener('mouseenter', function () {
                    this.querySelector('.gallery-caption').style.transform = 'translateY(0)';
                });

                item.addEventListener('mouseleave', function () {
                    this.querySelector('.gallery-caption').style.transform = 'translateY(100%)';
                });
            });
        });
    </script>

    <!-- AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialisation de AOS
        AOS.init({
            once: false,
            mirror: false,        // Animation se produit une seule fois
            offset: 120,        // Décalage (en px) depuis le point de déclenchement original
            easing: 'ease-out-back' // Type d'effet d'animation
        });
    </script>
</body>

</html>

<?php include('footer-ar.php'); ?>