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
    <title>التوظيف - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <style>
        * {
            font-family: 'Cairo', 'Amiri', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* عنوان الصفحة */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/recrutement.jpg');
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

        /* تنسيق الأقسام */
        .section {
            padding: 0px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 0px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--primary-color);
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background-color: var(--secondary-color);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .section-title p {
            font-size: 1.2rem;
            color: #666;
        }

        /* مقدمة الوظائف */
        .careers-intro {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
            padding: 40px;
            margin-bottom: 40px;
            text-align: center;
        }

        .careers-intro h3 {
            color: var(--primary-color);
            margin-bottom: 20px;
            font-size: 1.8rem;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }

        .careers-intro h3::after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: var(--secondary-color);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .careers-intro p {
            margin-bottom: 15px;
            line-height: 1.7;
            font-size: 1.1rem;
            color: #555;
        }

        /* بطاقات القيم */
        .values-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmin(280px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .value-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .value-card:hover {
            transform: translateY(-10px);
        }

        .value-card i {
            font-size: 3rem;
            color: var(--secondary-color);
            margin-bottom: 20px;
        }

        .value-card h4 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .value-card p {
            color: #666;
        }

        /* قسم الوظائف */
        .bg-light {
            background-color: #f8f9fa;
        }

        .job-openings-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .job-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 30px;
            border-right: 5px solid var(--primary-color);
            transition: transform 0.3s ease;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .job-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 1.4rem;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
            font-size: 0.95rem;
            color: #6c757d;
            direction: rtl;
        }

        .job-meta div {
            margin-left: 20px;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }

        .job-meta i {
            margin-left: 5px;
            color: var(--accent-color);
        }

        .job-description {
            margin-bottom: 20px;
            line-height: 1.7;
        }

        .job-requirements {
            margin-bottom: 20px;
        }

        .job-requirements h4 {
            color: var(--dark-color);
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .job-requirements ul {
            list-style-type: none;
            padding-right: 5px;
        }

        .job-requirements ul li {
            position: relative;
            padding-right: 25px;
            margin-bottom: 8px;
        }

        .job-requirements ul li::before {
            content: "\f00c";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            right: 0;
            color: var(--success-color);
        }

        .job-application {
            border-top: 1px solid #e9ecef;
            padding-top: 20px;
        }

        .job-application h4 {
            color: var(--dark-color);
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .no-openings {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 50px 40px;
            text-align: center;
        }

        .no-openings i {
            font-size: 4rem;
            color: #6c757d;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .no-openings h3 {
            color: var(--dark-color);
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .no-openings p {
            max-width: 600px;
            margin: 0 auto;
            font-size: 1.1rem;
            color: #555;
        }

        /* صندوق الاتصال */
        .contact-box {
            background: linear-gradient(145deg, var(--primary-color), #1a4874);
            color: white;
            border-radius: 10px;
            padding: 60px 40px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .contact-box::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            z-index: 0;
        }

        .contact-box h3 {
            font-size: 2rem;
            margin-bottom: 20px;
            position: relative;
        }

        .contact-box p {
            margin-bottom: 30px;
            font-size: 1.1rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .contact-info-list {
            max-width: 500px;
            margin: 30px auto;
            list-style-type: none;
        }

        .contact-info-list li {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .contact-info-list i {
            margin-left: 15px;
            font-size: 1.3rem;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* دعوة للعمل */
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

        .btn {
            display: inline-block;
            padding: 12px 30px;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #3d8b40;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .animate-fade-in,
        .animate-delay-1,
        .animate-delay-2,
        .animate-delay-3,
        .animate-delay-4 {
            animation: none !important;
            opacity: 1;
        }

        /* التصميم الدائري لعملية التوظيف */
        .circle-process-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            max-width: 1200px;
            margin: 50px auto 30px;
            position: relative;
        }

        /* خط الربط بين الدوائر */
        .circle-process-container::before {
            content: '';
            position: absolute;
            top: 80px;
            left: 50%;
            width: 70%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transform: translateX(-50%);
            z-index: 1;
        }

        .circle-process-item {
            flex: 1;
            min-width: 220px;
            max-width: 280px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            z-index: 2;
        }

        /* الدائرة الخارجية */
        .circle-outer {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            background: linear-gradient(145deg, #f0f0f0, #ffffff);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
            position: relative;
            transition: all 0.4s ease;
        }

        .circle-process-item:hover .circle-outer {
            transform: scale(1.05);
            box-shadow: 0 12px 30px rgba(var(--primary-color-rgb), 0.2);
        }

        /* الدائرة الداخلية */
        .circle-inner {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease;
        }

        .circle-process-item:hover .circle-inner {
            background: linear-gradient(145deg, var(--primary-color), var(--secondary-color));
        }

        /* رقم الخطوة */
        .circle-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-color);
            transition: all 0.4s ease;
        }

        .circle-process-item:hover .circle-number {
            color: white;
        }

        /* المحتوى النصي */
        .circle-content {
            padding: 0 15px;
        }

        .circle-content h4 {
            color: var(--primary-color);
            margin-bottom: 12px;
            font-size: 1.3rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .circle-process-item:hover .circle-content h4 {
            transform: translateY(-5px);
        }

        .circle-content p {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        /* التصميم المتجاوب */
        @media (max-width: 991px) {
            .process-step:not(:last-child) .step-number::after {
                display: none;
            }

            .circle-process-container::before {
                display: none;
            }

            .circle-process-container {
                flex-direction: column;
                align-items: center;
                gap: 50px;
            }

            .circle-process-item {
                width: 100%;
                max-width: 350px;
            }

            /* إضافة خط عمودي بين العناصر */
            .circle-process-item:not(:last-child)::after {
                content: '';
                position: absolute;
                width: 3px;
                height: 40px;
                background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
                bottom: -45px;
                left: 50%;
                transform: translateX(-50%);
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

            .process-container {
                flex-direction: column;
                align-items: center;
            }

            .process-step {
                width: 100%;
                max-width: 300px;
            }
        }

        @media (max-width: 576px) {
            .page-title {
                padding: 80px 20px;
            }

            .page-title p {
                font-size: 1.1rem;
            }

            .circle-outer {
                width: 140px;
                height: 140px;
            }

            .circle-inner {
                width: 100px;
                height: 100px;
            }

            .circle-number {
                font-size: 2.5rem;
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
    <!-- قسم عنوان الصفحة -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">انضم إلى فريقنا</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">طور مسيرتك المهنية داخل مؤسسة استشفائية
                ملتزمة بالتميز في الرعاية الصحية</p>
        </div>
    </section>

    <!-- المقدمة -->
    <section class="section">
        <div class="container">
            <div class="careers-intro" data-aos="fade-up" data-aos-duration="1000">
                <h3>المستشفى يوظف، انضم إلينا!</h3>
                <p>توفر المؤسسة العمومية الاستشفائية الصبحة بيئة عمل محفزة حيث يساهم كل مهني مباشرة في رفاهية وصحة
                    مجتمعنا. العمل معنا يعني الانضمام إلى فريق متعدد التخصصات ملتزم بالتميز في الرعاية الطبية.</p>
                <p>نقوم بتوظيف المهنيين المؤهلين والمتحمسين بانتظام في مختلف المجالات الطبية وشبه الطبية والفنية
                    والإدارية. يتم نشر المناصب المتاحة على هذه الصفحة عند توفر الفرص.</p>
            </div>
        </div>
    </section>

    <!-- قيمنا -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>قيمنا</h2>
                <p>المبادئ التي توجه ممارستنا اليومية</p>
            </div>
            <div class="values-container">
                <div class="value-card" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="100">
                    <i class="fas fa-heart"></i>
                    <h4>الرحمة</h4>
                    <p>نضع الإنسانية في قلب كل تفاعل مع مرضانا وبين الزملاء.</p>
                </div>
                <div class="value-card" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
                    <i class="fas fa-medal"></i>
                    <h4>التميز</h4>
                    <p>نسعى للتميز في جميع خدماتنا ونشجع التطوير المهني المستمر.</p>
                </div>
                <div class="value-card" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
                    <i class="fas fa-hands-helping"></i>
                    <h4>العمل الجماعي</h4>
                    <p>التعاون والاحترام المتبادل ضروريان لتقديم رعاية صحية عالية الجودة.</p>
                </div>
                <div class="value-card" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="400">
                    <i class="fas fa-balance-scale"></i>
                    <h4>النزاهة</h4>
                    <p>نتصرف بصدق وأخلاق وشفافية في جميع أعمالنا.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- دعوة للعمل -->
    <section class="cta-section" data-aos="fade" data-aos-duration="1500">
        <div class="container">
            <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">طور إمكاناتك معنا</h2>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">اندمج في بيئة مناسبة للتطور المهني مع
                فريق ملتزم برفاهية المرضى.</p>
            <a href="#opportunites" class="btn btn-primary" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="300">اطلع على الفرص المتاحة <i class="fas fa-arrow-down"></i></a>
        </div>
    </section>

    <!-- المناصب المفتوحة -->
    <section id="opportunites" class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>الفرص المهنية</h2>
                <p>استكشف المناصب المتاحة وانضم إلى فريقنا</p>
            </div>

            <div class="job-openings-container">
                <!-- المناصب المفتوحة - حاليا لا توجد -->
                <div class="no-openings" data-aos="fade-up" data-aos-duration="1000">
                    <i class="fas fa-briefcase"></i>
                    <h3>لا توجد مناصب شاغرة حاليا</h3>
                    <p>نحن لا نوظف في الوقت الحالي، لكننا ندعوكم للرجوع إلى هذه الصفحة بانتظام للاطلاع على الفرص
                        المستقبلية.</p>
                </div>

                <!-- مثال على منصب (لتفعيله عند التوظيف) -->
                <div class="job-card" style="display: none;" data-aos="fade-up" data-aos-duration="1000">
                    <h3>طبيب مختص في الأشعة</h3>
                    <div class="job-meta">
                        <div><i class="fas fa-map-marker-alt"></i> م ع ا سوبحة، الشلف</div>
                        <div><i class="fas fa-clock"></i> دوام كامل</div>
                        <div><i class="fas fa-calendar"></i> آخر أجل: 30 مايو 2025</div>
                        <div><i class="fas fa-tag"></i> المرجع: MED-RAD-2025-04</div>
                    </div>
                    <div class="job-description">
                        <p>تبحث المؤسسة العمومية الاستشفائية سوبحة عن طبيب(ة) مختص في الأشعة للانضمام إلى فريقنا الطبي.
                            سيكون المرشح المختار مسؤولاً عن إجراء وتفسير فحوصات التصوير الطبي للمساعدة في تشخيص ومتابعة
                            المرضى.</p>
                    </div>
                    <div class="job-requirements">
                        <h4>المؤهلات والمهارات المطلوبة:</h4>
                        <ul>
                            <li>شهادة الطب المتخصص في الأشعة</li>
                            <li>خبرة لا تقل عن 3 سنوات في الأشعة التشخيصية</li>
                            <li>إتقان تقنيات التصوير الطبي (الأشعة السينية، الموجات فوق الصوتية، الماسح الضوئي)</li>
                            <li>القدرة على العمل في فريق متعدد التخصصات</li>
                            <li>مهارات ممتازة في التواصل والعلاقات الشخصية</li>
                        </ul>
                    </div>
                    <div class="job-application">
                        <h4>كيفية التقديم:</h4>
                        <p>المرشحون المهتمون مدعوون لتقديم سيرتهم الذاتية ورسالة التحفيز ونسخ من الشهادات مع المرجع
                            "MED-RAD-2025-04" عبر:</p>
                        <ul>
                            <li>البريد الإلكتروني: recrutement@ephsobha.dz</li>
                            <li>البريد: قسم الموارد البشرية، م ع ا سوبحة، بلدية سوبحة، ولاية الشلف، الجزائر</li>
                            <li>الإيداع المباشر في مكتب الموارد البشرية بـ م ع ا سوبحة</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- عملية التوظيف -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>عملية التوظيف لدينا</h2>
                <p>مسار شفاف ومنظم</p>
            </div>

            <div class="circle-process-container">
                <!-- الخطوة 1 -->
                <div class="circle-process-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="100">
                    <div class="circle-outer">
                        <div class="circle-inner">
                            <div class="circle-number">1</div>
                        </div>
                    </div>
                    <div class="circle-content">
                        <h4>إعلان المنصب</h4>
                        <p>يتم نشر المناصب الشاغرة على هذه الصفحة وعبر الإعلانات في المستشفى.</p>
                    </div>
                </div>

                <!-- الخطوة 2 -->
                <div class="circle-process-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="200">
                    <div class="circle-outer">
                        <div class="circle-inner">
                            <div class="circle-number">2</div>
                        </div>
                    </div>
                    <div class="circle-content">
                        <h4>تقديم الطلبات</h4>
                        <p>يجب على المرشحين تقديم ملفهم الكامل وفقاً للطرق المحددة في الإعلان.</p>
                    </div>
                </div>

                <!-- الخطوة 3 -->
                <div class="circle-process-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="300">
                    <div class="circle-outer">
                        <div class="circle-inner">
                            <div class="circle-number">3</div>
                        </div>
                    </div>
                    <div class="circle-content">
                        <h4>الانتقاء والمقابلات</h4>
                        <p>بعد الانتقاء الأولي للملفات، يتم استدعاء المرشحين المختارين لإجراء مقابلة.</p>
                    </div>
                </div>

                <!-- الخطوة 4 -->
                <div class="circle-process-item" data-aos="zoom-in" data-aos-duration="800" data-aos-delay="400">
                    <div class="circle-outer">
                        <div class="circle-inner">
                            <div class="circle-number">4</div>
                        </div>
                    </div>
                    <div class="circle-content">
                        <h4>القرار والإدماج</h4>
                        <p>يتم إعلام المرشحين المختارين ومرافقتهم في عملية الإدماج.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- مزايا العمل معنا -->
    <section class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>لماذا تنضم إلينا؟</h2>
                <p>مزايا تصنع الفارق</p>
            </div>
            <div class="values-container">
                <div class="value-card" data-aos="flip-up" data-aos-duration="800" data-aos-delay="100">
                    <i class="fas fa-graduation-cap"></i>
                    <h4>التكوين المستمر</h4>
                    <p>نشجع التطوير المهني من خلال برامج التكوين المستمر.</p>
                </div>
                <div class="value-card" data-aos="flip-up" data-aos-duration="800" data-aos-delay="200">
                    <i class="fas fa-users"></i>
                    <h4>بيئة تعاونية</h4>
                    <p>اعمل في فريق متعدد التخصصات يشجع تبادل المعرفة والمساعدة المتبادلة.</p>
                </div>
                <div class="value-card" data-aos="flip-up" data-aos-duration="800" data-aos-delay="300">
                    <i class="fas fa-cogs"></i>
                    <h4>معدات حديثة</h4>
                    <p>استفد من التقنيات والمعدات الطبية المتطورة لتحسين ممارستك.</p>
                </div>
                <div class="value-card" data-aos="flip-up" data-aos-duration="800" data-aos-delay="400">
                    <i class="fas fa-chart-line"></i>
                    <h4>تطور المسيرة المهنية</h4>
                    <p>استفد من فرص الترقي والتخصص داخل مؤسستنا.</p>
                </div>
            </div>
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

    <!-- Script pour initialiser AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialisation de la bibliothèque AOS
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                easing: 'ease-out-back',
                once: false,
                mirror: false,
                offset: 120
            });
        });
    </script>
</body>

</html>
<?php include('footer-ar.php'); ?>