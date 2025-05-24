<?php
include('header-ar.php');
$hospital_name = "المؤسسة العمومية الاستشفائية الصبحة";
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $hospital_name; ?> - المؤسسة العمومية الاستشفائية الصبحة</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/index.js"></script>
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

        .stats-section {
            background-color: #f9f9f9;
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            opacity: 0.05;
            z-index: 0;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 50px;
            position: relative;
            z-index: 1;
        }

        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border-bottom: 4px solid transparent;
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-bottom: 4px solid #007bff;
        }

        .stat-icon {
            font-size: 36px;
            color: #007bff;
            margin-bottom: 15px;
        }

        .stat-number {
            font-size: 48px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
            line-height: 1;
        }

        .stat-title {
            font-size: 18px;
            font-weight: 600;
            color: #007bff;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-description {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .stat-card {
                padding: 20px;
            }

            .stat-number {
                font-size: 36px;
            }

            .stat-title {
                font-size: 16px;
            }
        }

        /* Animation de surbrillance pour les titres de section */
        @keyframes highlightText {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .highlight-animation .section-title h2 {
            background: linear-gradient(90deg, #007bff, #00c6ff, #0072ff);
            background-size: 200% auto;
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            animation: highlightText 5s ease infinite;
            display: inline-block;
        }

        .reveal-content {
            transition: all 0.8s ease;
        }

        .modern-services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }

        .modern-service-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .modern-service-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 15px 35px rgba(0, 123, 255, 0.15);
        }

        .service-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .service-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s;
        }

        .modern-service-card:hover .service-image img {
            transform: scale(1.1);
        }

        .service-overlay {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 123, 255, 0.1) 0%, rgba(0, 49, 102, 0.7) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.7;
            transition: opacity 0.4s ease;
        }

        .modern-service-card:hover .service-overlay {
            opacity: 1;
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            transform: translateY(20px);
            opacity: 0;
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .modern-service-card:hover .service-icon {
            transform: translateY(0);
            opacity: 1;
        }

        .service-icon i {
            font-size: 28px;
            color: #007bff;
        }

        .service-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .service-content h3 {
            color: #333;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            padding-bottom: 15px;
        }

        .service-content h3::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 50px;
            height: 3px;
            background: #007bff;
            transition: width 0.3s ease;
        }

        .modern-service-card:hover .service-content h3::after {
            width: 100px;
        }

        .service-content p {
            color: #666;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .service-btn {
            display: inline-flex;
            align-items: center;
            color: #007bff;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-top: auto;
            font-size: 15px;
        }

        .service-btn i {
            margin-right: 8px;
            transition: transform 0.3s ease;
        }

        .service-btn:hover {
            color: #0056b3;
        }

        .service-btn:hover i {
            transform: translateX(-5px);
        }

        @media (max-width: 992px) {
            .modern-services-grid {
                grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            }
        }

        @media (max-width: 768px) {
            .modern-services-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 20px;
            }

            .service-image {
                height: 180px;
            }

            .service-content {
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .modern-services-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .service-image {
                height: 200px;
            }
        }

        .modern-about-container {
            display: grid;
            grid-template-columns: 6fr 5fr;
            gap: 50px;
            margin-top: 50px;
        }

        .about-image-container {
            position: relative;
            height: 520px;
        }

        .about-image {
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .main-image {
            height: 400px;
            width: 100%;
        }

        .main-about-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .about-image:hover .main-about-img {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 123, 255, 0.1), rgba(0, 49, 102, 0.3));
            transition: all 0.3s ease;
        }

        .about-image:hover .image-overlay {
            background: linear-gradient(to bottom, rgba(0, 123, 255, 0.05), rgba(0, 49, 102, 0.15));
        }

        .experience-badge {
            position: absolute;
            left: -20px;
            top: 40px;
            width: 120px;
            height: 120px;
            background: #007bff;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: 0 10px 25px rgba(0, 123, 255, 0.3);
            z-index: 10;
            animation: pulse 2.5s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.7);
            }

            70% {
                box-shadow: 0 0 0 15px rgba(0, 123, 255, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
            }
        }

        .experience-badge .years {
            font-size: 36px;
            font-weight: 700;
            line-height: 1;
        }

        .experience-badge .text {
            font-size: 12px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
            line-height: 1.2;
            margin-top: 5px;
        }

        .floating-image {
            position: absolute;
            width: 170px;
            height: 170px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transition: all 0.5s ease;
        }

        .floating-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .floating-image:hover {
            transform: translateY(-10px);
        }

        .floating-image:hover img {
            transform: scale(1.1);
        }

        .floating-1 {
            bottom: 0;
            right: 30px;
        }

        .floating-2 {
            bottom: 90px;
            left: 10px;
        }

        .about-content {
            display: flex;
            flex-direction: column;
        }

        .about-tag {
            display: inline-block;
            background: rgba(0, 123, 255, 0.1);
            color: #007bff;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .about-heading {
            font-size: 32px;
            font-weight: 700;
            color: #333;
            margin-bottom: 25px;
            line-height: 1.3;
            position: relative;
            padding-bottom: 15px;
        }

        .about-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 70px;
            height: 3px;
            background: #007bff;
        }

        .about-description p {
            color: #555;
            line-height: 1.8;
            margin-bottom: 25px;
            font-size: 16px;
        }

        .about-features {
            margin: 30px 0;
        }

        .feature-item {
            display: flex;
            margin-bottom: 25px;
            transition: transform 0.3s ease;
        }

        .feature-item:hover {
            transform: translateX(-10px);
        }

        .feature-icon {
            min-width: 50px;
            height: 50px;
            background: rgba(0, 123, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 15px;
            color: #007bff;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .feature-item:hover .feature-icon {
            background: #007bff;
            color: white;
        }

        .feature-content h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .feature-content p {
            font-size: 15px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .about-stats {
            display: flex;
            justify-content: space-between;
            margin: 30px 0;
            padding: 25px 0;
            border-top: 1px solid rgba(0, 0, 0, 0.07);
            border-bottom: 1px solid rgba(0, 0, 0, 0.07);
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }

        .stat-value i {
            font-size: 22px;
            color: #007bff;
            margin-right: 8px;
        }

        .stat-label {
            font-size: 14px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .about-cta {
            display: inline-flex;
            align-items: center;
            background: #007bff;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            font-weight: 600;
            margin-top: 10px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
            align-self: start;
        }

        .about-cta i {
            margin-right: 10px;
            transition: transform 0.3s ease;
        }

        .about-cta:hover {
            background: #0056b3;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 123, 255, 0.4);
        }

        .about-cta:hover i {
            transform: translateX(-5px);
        }

        @media (max-width: 992px) {
            .modern-about-container {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .about-image-container {
                height: 450px;
            }

            .floating-1 {
                right: 50px;
            }

            .floating-2 {
                left: 50px;
            }
        }

        @media (max-width: 768px) {
            .about-image-container {
                height: 400px;
            }

            .main-image {
                height: 300px;
            }

            .floating-image {
                width: 140px;
                height: 140px;
            }

            .floating-1 {
                right: 30px;
            }

            .floating-2 {
                left: 30px;
                bottom: 60px;
            }

            .experience-badge {
                width: 100px;
                height: 100px;
            }

            .experience-badge .years {
                font-size: 28px;
            }

            .experience-badge .text {
                font-size: 10px;
            }

            .about-heading {
                font-size: 28px;
            }

            .about-stats {
                flex-wrap: wrap;
                gap: 20px;
            }

            .stat-item {
                flex: 1 0 30%;
            }
        }

        @media (max-width: 576px) {
            .about-image-container {
                height: 380px;
            }

            .main-image {
                height: 250px;
            }

            .floating-image {
                width: 110px;
                height: 110px;
            }

            .floating-1 {
                right: 20px;
                bottom: 20px;
            }

            .floating-2 {
                left: 20px;
                bottom: 80px;
            }

            .feature-item {
                margin-bottom: 20px;
            }

            .feature-icon {
                min-width: 40px;
                height: 40px;
                font-size: 16px;
            }

            .stat-value {
                font-size: 24px;
            }

            .stat-label {
                font-size: 12px;
            }
        }

        html,
        body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }

        @media (max-width: 992px) {
            .contact-form-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {

            .contact-form,
            .contact-info-card {
                padding: 30px 20px;
            }
        }

        /* Adjustments for Arabic text */
        h1,
        h2,
        h3 {
            font-family: 'Amiri', serif;
        }

        p,
        li,
        span {
            font-family: 'Cairo', sans-serif;
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section class="hero-slider" id="accueil">
        <div class="slide active">
            <div class="slide-bg" style="background-image: url('img/1.jpg');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h2>مرحباً بكم في <?php echo $hospital_name; ?></h2>
                <p>مؤسسة عمومية استشفائية في خدمة صحة المواطنين مع فريق طبي مؤهل ومتفاني.</p>
                <a href="#about" class="btn btn-primary">حول مؤسستنا</a>
            </div>
        </div>
        <div class="slide">
            <div class="slide-bg" style="background-image: url('img/2.jpg');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h2>المعدات والأجهزة الطبية</h2>
                <p>مؤسستنا مجهزة بمعدات طبية تمكن من ضمان رعاية صحية عالية الجودة تتماشى مع المعايير الوطنية للصحة.</p>
                <a href="#services" class="btn btn-primary">خدماتنا الطبية</a>
            </div>
        </div>
        <div class="slide">
            <div class="slide-bg" style="background-image: url('img/3.jpg');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h2>طاقم طبي وشبه طبي مؤهل</h2>
                <p>أطباؤنا المختصون والعامون وطاقمنا شبه الطبي يعملون بتناغم لضمان رعاية مثلى للمرضى.</p>
            </div>
        </div>
        <div class="slide">
            <div class="slide-bg" style="background-image: url('img/4.jpg');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h2>خدمة الطوارئ 24/24 ساعة</h2>
                <p>خدمة الطوارئ الطبية لدينا تعمل جميع أيام الأسبوع للاستجابة لاحتياجات سكان منطقتنا.</p>
            </div>
        </div>
        <div class="slide">
            <div class="slide-bg" style="background-image: url('img/5.jpg');"></div>
            <div class="slide-overlay"></div>
            <div class="slide-content">
                <h2>في خدمة الصحة العمومية</h2>
                <p>المؤسسة العمومية الاستشفائية ملتزمة بتنفيذ البرامج الوطنية للصحة وتساهم بفعالية في تحسين صحة مجتمعنا.
                </p>
                <a href="#contact" class="btn btn-primary">اتصل بنا</a>
            </div>
        </div>

        <div class="slider-arrows">
            <div class="arrow prev">
                <i class="fas fa-chevron-right"></i>
            </div>
            <div class="arrow next">
                <i class="fas fa-chevron-left"></i>
            </div>
        </div>

        <div class="slider-controls">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>

        <div class="slide-counter">
            <span class="slide-counter-current">1</span>
            <span class="slide-counter-divider"></span>
            <span class="slide-counter-total">5</span>
        </div>

        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section highlight-animation" id="about" data-aos="fade-up">
        <div class="container">
            <div class="section-title" data-aos="fade-down" data-aos-delay="100">
                <h2>من نحن؟</h2>
            </div>

            <div class="modern-about-container">
                <!-- Contenu à propos -->
                <div class="about-content" data-aos="fade-right" data-aos-delay="300">
                    <div class="about-tag">المؤسسة العمومية الاستشفائية الصبحة منذ 1985</div>
                    <h3 class="about-heading">مؤسسة مرجعية في خدمة صحتكم</h3>

                    <div class="about-description">
                        <p>
                            المؤسسة العمومية الاستشفائية الصبحة ذات 188 سرير تهتم بتقديم رعاية طبية عالية الجودة
                            لجميع المواطنين. بفضل التزامها المستمر بالتميز الطبي ورفاهية المرضى
                            فرضت مؤسستنا نفسها كمؤسسة مرجعية في المنطقة.
                        </p>
                        <p>
                            تضمن المؤسسة العمومية الاستشفائية الصبحة التغطية الصحية لسكان يقدر عددهم بـ 400,000 نسمة،
                            موزعين على تسع (09) بلديات: بوقادير، الصبحة، وادي سلي، تاوقريت، الظهرة، عين مران،
                            الهرانفة، أولاد بن عبد القادر والحجاج.
                        </p>

                        <div class="about-features">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <div class="feature-content">
                                    <h4>مهمتنا</h4>
                                    <p>تقديم رعاية طبية جيدة ومتاحة للجميع مع وضع المريض في مركز اهتماماتنا.</p>
                                </div>
                            </div>

                            <div class="feature-item">
                                <div class="feature-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <div class="feature-content">
                                    <h4>قيمنا</h4>
                                    <p>احترام الكرامة الإنسانية، التميز المهني، العدالة في الوصول للرعاية، والابتكار
                                        المستمر.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image principale avec effet -->
                <div class="about-image-container" data-aos="fade-left" data-aos-delay="200">
                    <div class="about-image main-image">
                        <img src="img/1.jpg" alt="المؤسسة العمومية الاستشفائية الصبحة" class="main-about-img">
                        <div class="image-overlay"></div>
                        <div class="experience-badge">
                            <span class="years">40</span>
                            <span class="text">سنة<br>خبرة</span>
                        </div>
                    </div>
                    <!-- Petites images flottantes -->
                    <div class="floating-image floating-1">
                        <img src="img/2.jpg" alt="فريقنا">
                        <div class="image-overlay"></div>
                    </div>
                    <div class="floating-image floating-2">
                        <img src="img/3.jpg" alt="المعدات">
                        <div class="image-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Chiffres Clés -->
    <section class="section highlight-animation" id="chiffres-cles" data-aos="fade-up">
        <div class="container">
            <div class="section-title">
                <h2>الأرقام الأساسية</h2>
                <p>المؤسسة العمومية الاستشفائية الصبحة في أرقام</p>
            </div>

            <div class="stats-container">
                <div class="stat-card" data-aos="flip-left" data-aos-delay="100" data-aos-duration="800">
                    <div class="stat-icon">
                        <i class="fas fa-bed"></i>
                    </div>
                    <div class="stat-number" data-count="188">0</div>
                    <div class="stat-title">سرير</div>
                    <div class="stat-description">سعة الاستقبال لجميع أنواع الرعاية</div>
                </div>

                <div class="stat-card" data-aos="flip-left" data-aos-delay="200" data-aos-duration="800">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number" data-count="622">0</div>
                    <div class="stat-title">موظف</div>
                    <div class="stat-description">إجمالي موظفي المؤسسة</div>
                </div>

                <div class="stat-card" data-aos="flip-left" data-aos-delay="300" data-aos-duration="800">
                    <div class="stat-icon">
                        <i class="fas fa-procedures"></i>
                    </div>
                    <div class="stat-number" data-count="7">0</div>
                    <div class="stat-title">أقسام</div>
                    <div class="stat-description">عدد أقسام الاستشفاء</div>
                </div>

                <div class="stat-card" data-aos="flip-left" data-aos-delay="600" data-aos-duration="800">
                    <div class="stat-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="stat-number" data-count="40">0</div>
                    <div class="stat-title">سنة خبرة</div>
                    <div class="stat-description">في خدمتكم منذ 1985</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section highlight-animation" id="services" data-aos="fade-up">
        <div class="container">
            <div class="section-title" data-aos="fade-down" data-aos-delay="100">
                <h2>خدماتنا</h2>
            </div>
            <div class="modern-services-grid">
                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-image">
                        <img src="img/services/umc.jpg" alt="الطوارئ الطبية الجراحية">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-truck"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>الإستعجالات الطبية والجراحية</h3>
                        <p>خدمة الإستعجالات متاحة 24/24 ساعة و 7/7 أيام لجميع أنواع الحالات الطبية.</p>
                        <a href="urgences-ar.php" class="service-btn"><i class="fas fa-arrow-left"></i> اعرف المزيد</a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="150">
                    <div class="service-image">
                        <img src="img/services/med-interne.jpg" alt="الطب الباطني">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-stethoscope"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>الطب الداخلي</h3>
                        <p>تشخيص وعلاج الأمراض الباطنية المعقدة للبالغين.</p>
                        <a href="med-interne-ar.php" class="service-btn"><i class="fas fa-arrow-left"></i> اعرف
                            المزيد</a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-image">
                        <img src="img/services/chirurgie.jpg" alt="الجراحة العامة">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-procedures"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>الجراحة العامة</h3>
                        <p>التدخلات الجراحية من قبل فريق من الجراحين المؤهلين تأهيلاً عالياً.</p>
                        <a href="chirurgie-ar.php" class="service-btn"><i class="fas fa-arrow-left"></i> اعرف المزيد</a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="250">
                    <div class="service-image">
                        <img src="img/services/pediatrie.jpg" alt="طب الأطفال">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-child"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>طب الأطفال</h3>
                        <p>رعاية طبية متخصصة للرضع والأطفال والمراهقين.</p>
                        <a href="pediatrie-ar.php" class="service-btn"><i class="fas fa-arrow-left"></i> اعرف المزيد</a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-image">
                        <img src="img/services/maternite.jpg" alt="قسم الولادة">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-baby"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>الأمومة</h3>
                        <p>مرافقة شاملة من الحمل إلى الولادة بكل أمان.</p>
                        <a href="maternite-ar.php" class="service-btn"><i class="fas fa-arrow-left"></i> اعرف المزيد</a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="350">
                    <div class="service-image">
                        <img src="img/services/dialyse.jpg" alt="الغسيل الكلوي">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-tint"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>الغسيل الكلوي</h3>
                        <p>علاج الفشل الكلوي المزمن بالغسيل الكلوي عالي الجودة.</p>
                        <a href="dialyse-ar.php" class="service-btn"><i class="fas fa-arrow-left"></i> اعرف المزيد</a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-image">
                        <img src="img/services/pneumologie.jpg" alt="أمراض الرئة والسل">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-lungs"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>الأمراض الصدرية</h3>
                        <p>رعاية متخصصة لأمراض الجهاز التنفسي.</p>
                        <a href="pneumo-ar.php" class="service-btn"><i class="fas fa-arrow-left"></i> اعرف المزيد</a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="450">
                    <div class="service-image">
                        <img src="img/services/radiologie.jpg" alt="الأشعة">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-x-ray"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>وحدة الأشعة</h3>
                        <p>معدات التصوير الطبي الحديثة للتشخيص الدقيق.</p>
                        <a href="radio-ar.php" class="service-btn"><i class="fas fa-arrow-left"></i> اعرف المزيد</a>
                    </div>
                </div>

                <div class="modern-service-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-image">
                        <img src="img/services/labo.jpg" alt="المختبر">
                        <div class="service-overlay">
                            <div class="service-icon">
                                <i class="fas fa-vials"></i>
                            </div>
                        </div>
                    </div>
                    <div class="service-content">
                        <h3>مخبر التحاليل</h3>
                        <p>التحاليل البيولوجية والطبية الدقيقة بمعدات حديثة.</p>
                        <a href="labo-ar.php" class="service-btn"><i class="fas fa-arrow-left"></i> اعرف المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="section highlight-animation" id="contact" data-aos="fade-up">
        <div class="container">
            <div class="section-title" data-aos="fade-down" data-aos-delay="100">
                <h2>اتصل بنا</h2>
            </div>
            <div class="contact-form-container">
                <div class="contact-info-card" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100">
                    <h3>معلومات الاتصال</h3>
                    <div class="contact-info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>العنوان</h4>
                            <p>بلدية الصبحة ولاية الشلف، الجزائر</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>الهاتف</h4>
                            <p>97 91 71 27 213+</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>البريد الإلكتروني</h4>
                            <p>contact.ephsobha@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <h4>ساعات العمل</h4>
                            <p>الإدارة: الأحد-الخميس، 8:00-16:30</p>
                            <p>الإستعجالات: 24/7</p>
                        </div>
                    </div>
                </div>
                <div class="contact-form" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                    <h3>أرسل لنا رسالة</h3>
                    <form action="process_contact.php" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="اسمك الكامل" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="بريدك الإلكتروني"
                                required>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" name="phone" placeholder="رقم هاتفك">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="subject" required>
                                <option value="" selected disabled>اختر الخدمة</option>
                                <option value="Info">طلب معلومات</option>
                                <option value="Reclamation">شكوى</option>
                                <option value="Autre">أخرى</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="رسالتك" required></textarea>
                        </div>
                        <!-- Token CSRF pour la sécurité -->
                        <input type="hidden" name="csrf_token" value="<?php echo md5(uniqid(mt_rand(), true)); ?>">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> إرسال</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Carte -->
    <section class="section highlight-animation" id="carte" data-aos="fade-up">
        <div class="container">
            <div class="section-title" data-aos="fade-down" data-aos-delay="100">
                <h2>لزيارتنا</h2>
            </div>
            <div style="height: 400px; width: 100%; border-radius: 5px; overflow: hidden; margin-bottom: 20px;"
                data-aos="zoom-in" data-aos-delay="200">
                <div id="map" style="height: 100%; width: 100%;"></div>
            </div>
            <div style="text-align: center; margin-top: 20px;">
                <p><strong>العنوان:</strong> بلدية الصبحة ولاية الشلف، الجزائر</p>
                <p><strong>الإحداثيات:</strong> 36.10538, 1.10444</p>
            </div>
        </div>
    </section>

    <!-- Bouton de retour en haut -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>

</html>
<?php include('footer-ar.php'); ?>