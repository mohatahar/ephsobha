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
    <title>مصلحة الأمراض الصدرية - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- Google Fonts for Arabic -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet">
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services/pneumologie.jpg');
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
            font-weight: 700;
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
            background-color: #e7f5ff;
            border-right: 4px solid var(--primary-color);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
            font-weight: 600;
        }

        /* Service de pneumologie spécifique */
        .department-hours {
            background-color: #e7f5ff;
            border-right: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .department-hours h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-weight: 600;
        }

        .department-hours p {
            margin-bottom: 10px;
        }

        .service-card {
            background-color: #e7f5ff;
            border-right: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .service-card h3 {
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

        /* Pathologies fréquentes */
        .pathologies-section {
            margin: 30px 0;
        }

        .pathologies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .pathology-card {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .pathology-card h4 {
            color: var(--primary-color);
            margin-bottom: 10px;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 10px;
            font-weight: 600;
        }

        .pathology-card ul {
            list-style-type: none;
            padding-right: 0;
        }

        .pathology-card li {
            padding: 5px 0;
            position: relative;
            padding-right: 20px;
        }

        .pathology-card li::before {
            content: "•";
            color: var(--primary-color);
            position: absolute;
            right: 0;
            font-weight: bold;
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

        .btn-secondary {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-secondary:hover {
            background-color: #3bb0cc;
        }

        /* FAQ Section */
        .faq-section {
            margin: 40px 0;
        }

        .faq-item {
            margin-bottom: 15px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            background-color: #f8f9fa;
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .faq-question h4 {
            margin: 0;
            font-weight: 600;
            color: var(--primary-color);
        }

        .faq-question i {
            transition: transform 0.3s ease;
        }

        .faq-answer {
            background-color: white;
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }

        .faq-item.active .faq-question {
            background-color: var(--primary-color);
        }

        .faq-item.active .faq-question h4 {
            color: white;
        }

        .faq-item.active .faq-question i {
            transform: rotate(180deg);
            color: white;
        }

        .faq-item.active .faq-answer {
            padding: 20px;
            max-height: 1000px;
        }

        .faq-answer ul,
        .faq-answer ol {
            padding-right: 20px;
            margin: 10px 0;
        }

        .faq-answer li {
            margin: 5px 0;
        }

        /* Special notice lists */
        .special-notice ul {
            list-style-type: none;
            padding-right: 20px;
        }

        .special-notice li {
            position: relative;
            padding: 5px 0;
            padding-right: 20px;
        }

        .special-notice li::before {
            content: "•";
            color: var(--primary-color);
            position: absolute;
            right: 0;
            font-weight: bold;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }

            .service-list,
            .pathologies-grid,
            .team-grid {
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

        .mt-3 {
            margin-top: 1rem;
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">مصلحة الأمراض الصدرية</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">رعاية متخصصة لأمراض الجهاز التنفسي
                والرئتين في المؤسسة الاستشفائية العمومية الصبحة</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>مصلحة الأمراض الصدرية</h3>
                <p>تختص مصلحة الأمراض الصدرية في المؤسسة الاستشفائية العمومية الصبحة في تشخيص وعلاج ومتابعة أمراض
                    الجهاز التنفسي والرئتين، بما في ذلك مرض السل. يقدم فريقنا الطبي المؤهل رعاية شاملة ومخصصة لكل مريض.
                    مهمتنا هي تحسين جودة حياة المرضى الذين يعانون من أمراض الجهاز التنفسي المزمنة والحادة.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-lungs"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="department-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> أوقات العمل والاستشارات</h3>
                <p><strong>الاستشفاء:</strong> المصلحة مفتوحة 24 ساعة طوال أيام الأسبوع للمرضى في حالة الإستشفاء</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">خدماتنا المتخصصة</h2>
                <p>تقدم مصلحة الأمراض الصدرية في المؤسسة الاستشفائية العمومية الصبحة مجموعة واسعة من الخدمات لتشخيص
                    وعلاج أمراض الجهاز التنفسي:</p>

                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-stethoscope"></i>
                        <h4>الاستشارات المتخصصة</h4>
                        <p>تشخيص ومتابعة أمراض الجهاز التنفسي الحادة والمزمنة</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-procedures"></i>
                        <h4>الاستشفاء</h4>
                        <p>رعاية المرضى الذين يحتاجون إلى مراقبة أو رعاية مستمرة</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-microscope"></i>
                        <h4>طب السل</h4>
                        <p>تشخيص وعلاج متخصص لمرض السل ومتابعة المرضى</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-wind"></i>
                        <h4>الفحوصات الوظيفية</h4>
                        <p>قياس التنفس، قياس الحجم الصدري، اختبار الانتشار، اختبار الجهد...</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-bed"></i>
                        <h4>تخطيط النوم</h4>
                        <p>دراسة النوم وتشخيص اضطرابات التنفس الليلية</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="350">
                        <i class="fas fa-lungs-virus"></i>
                        <h4>تنظير القصبات</h4>
                        <p>الفحص البصري للشجرة القصبية والأخذ المستهدف للعينات</p>
                    </div>
                </div>
            </section>

            <section class="pathologies-section" data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">الأمراض التي نعالجها</h2>

                <div class="pathologies-grid">
                    <div class="pathology-card" data-aos="fade-up" data-aos-delay="100">
                        <h4><i class="fas fa-virus"></i> الأمراض المعدية</h4>
                        <ul>
                            <li>السل الرئوي وخارج الرئوي</li>
                            <li>الالتهابات الرئوية البكتيرية والفيروسية</li>
                            <li>التهابات الجهاز التنفسي المزمنة</li>
                            <li>التهاب الجنبة المعدي</li>
                        </ul>
                    </div>

                    <div class="pathology-card" data-aos="fade-up" data-aos-delay="150">
                        <h4><i class="fas fa-wind"></i> أمراض الانسداد</h4>
                        <ul>
                            <li>الربو القصبي</li>
                            <li>مرض الانسداد الرئوي المزمن (BPCO)</li>
                            <li>توسع القصبات (DDB)</li>
                            <li>انتفاخ الرئة</li>
                        </ul>
                    </div>

                    <div class="pathology-card" data-aos="fade-up" data-aos-delay="250">
                        <h4><i class="fas fa-lungs"></i> أمراض النسيج الخلالي</h4>
                        <ul>
                            <li>تليف الرئتين</li>
                            <li>الساركويد</li>
                            <li>أمراض الرئة في الأمراض الروماتيزمية</li>
                            <li>التهاب الرئة الدوائي</li>
                        </ul>
                    </div>

                    <div class="pathology-card" data-aos="fade-up" data-aos-delay="300">
                        <h4><i class="fas fa-bed"></i> اضطرابات التنفس أثناء النوم</h4>
                        <ul>
                            <li>متلازمة انقطاع التنفس النومي</li>
                            <li>نقص التهوية الليلي</li>
                            <li>فرط النوم</li>
                        </ul>
                    </div>

                    <div class="pathology-card" data-aos="fade-up" data-aos-delay="350">
                        <h4><i class="fas fa-heart"></i> أمراض القلب والرئة</h4>
                        <ul>
                            <li>ارتفاع ضغط الدم الرئوي</li>
                            <li>الانصمام الرئوي</li>
                            <li>قصور القلب الأيمن</li>
                            <li>قلب رئوي مزمن</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="service-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-clipboard-list"></i> المعدات والفحوصات المتاحة</h3>
                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i> <strong>الفحوصات
                            الوظيفية التنفسية:</strong> قياس دقيق لوظيفة الرئة</li>
                    <li data-aos="fade-left" data-aos-delay="150"><i class="fas fa-check-circle"></i> <strong>تنظير
                            القصبات:</strong> رؤية داخل القصبات وأخذ العينات</li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> <strong>غازات
                            الدم:</strong> تقييم الأكسجة والتوازن الحمضي القاعدي</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> <strong>اختبار
                            المشي لمدة 6 دقائق:</strong> تقييم القدرة على بذل الجهد</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i> <strong>تخطيط
                            النوم:</strong> دراسة شاملة للنوم</li>
                    <li data-aos="fade-left" data-aos-delay="350"><i class="fas fa-check-circle"></i> <strong>العلاج
                            بالأكسجين:</strong> علاج بالأكسجين للمرضى الذين يعانون من قصور تنفسي</li>
                </ul>
            </section>

            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>متى يجب استشارة طبيب الأمراض الصدرية؟</h3>
                <p>يُنصح باستشارة طبيب الأمراض الصدرية في الحالات التالية:</p>
                <ul style="margin-top: 10px;">
                    <li>سعال مستمر لأكثر من 3 أسابيع</li>
                    <li>ضيق تنفس غير مبرر عند الجهد أو الراحة</li>
                    <li>آلام صدرية متكررة</li>
                    <li>بلغم غير طبيعي (دم، لون غير عادي)</li>
                    <li>التهابات تنفسية متكررة</li>
                    <li>شخير شديد وشك في انقطاع التنفس النومي</li>
                    <li>متابعة أمراض الجهاز التنفسي المزمنة (الربو، مرض الانسداد الرئوي المزمن)</li>
                </ul>
            </div>

            <section class="faq-section" data-aos="fade-up" data-aos-delay="450">
                <h2 class="section-title">أسئلة شائعة</h2>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>كيف أستعد لفحص وظائف الرئة؟</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>للاستعداد لفحص وظائف الرئة (EFR)، يُنصح بـ:</p>
                        <ul>
                            <li>تجنب التدخين قبل الفحص بـ 24 ساعة على الأقل</li>
                            <li>تجنب الوجبات الدسمة قبل الاختبار</li>
                            <li>ارتداء ملابس مريحة وغير ضيقة</li>
                            <li>إبلاغ الطبيب بأدوية موسعات القصبات التي تتناولها</li>
                        </ul>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>ما الفرق بين طب الأمراض الصدرية وطب السل؟</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>طب الأمراض الصدرية هو التخصص الطبي الذي يعتني بجميع أمراض الجهاز التنفسي. طب السل هو تخصص
                            فرعي من طب الأمراض الصدرية يكرس نفسه خاصة لدراسة وتشخيص وعلاج السل الرئوي وخارج الرئوي. في
                            مصلحتنا، نجمع بين هاتين الخبرتين لتقديم رعاية شاملة.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>كم تستغرق فترة الاستشفاء في مصلحة الأمراض الصدرية؟</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>تختلف مدة الاستشفاء بشكل كبير حسب المرض وحالة المريض. بالنسبة لالتهاب الرئة الحاد البسيط، قد
                            يستغرق الاستشفاء من 3 إلى 7 أيام. بالنسبة للأمراض الأكثر تعقيداً مثل تفاقم مرض الانسداد
                            الرئوي المزمن أو السل أو الفحص الشامل، قد يمتد الاستشفاء من أسبوع إلى 3 أسابيع. سيعلمك
                            الطبيب بالمدة المتوقعة عند دخولك.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-question">
                        <h4>كيف يتم إجراء فحص تنظير القصبات؟</h4>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>تنظير القصبات هو فحص يسمح برؤية داخل القصبات باستخدام أنبوب مرن مزود بكاميرا. إليك كيفية
                            إجرائه:</p>
                        <ol>
                            <li>يجب أن تكون صائماً لمدة 6 ساعات على الأقل</li>
                            <li>سيتم تخدير الحلق والأنف موضعياً</li>
                            <li>قد يُعطى مهدئ خفيف لمساعدتك على الاسترخاء</li>
                            <li>سيدخل الطبيب المنظار بلطف عبر الأنف أو الفم</li>
                            <li>يستغرق الفحص عادة ما بين 15 إلى 30 دقيقة</li>
                            <li>يمكن أخذ عينات (خزعات، غسيل قصبي سنخي) إذا لزم الأمر</li>
                        </ol>
                        <p>بعد الفحص، ستبقى تحت المراقبة لحوالي ساعة إلى ساعتين. يُنصح بعدم الأكل أو الشرب لبضع ساعات
                            حتى يزول التخدير الموضعي تماماً.</p>
                    </div>
                </div>
            </section>

            <section class="service-card" data-aos="fade-up" data-aos-delay="350">
                <h3><i class="fas fa-info-circle"></i> نصائح للمرضى المصابين بأمراض الجهاز التنفسي</h3>
                <ul class="guidelines-list">
                    <li data-aos="zoom-in" data-aos-delay="100"><i class="fas fa-check-circle"></i> اتبع بدقة العلاج
                        الموصوف من قبل طبيبك</li>
                    <li data-aos="zoom-in" data-aos-delay="150"><i class="fas fa-check-circle"></i> توقف عن التدخين
                        وتجنب البيئات المليئة بالدخان</li>
                    <li data-aos="zoom-in" data-aos-delay="200"><i class="fas fa-check-circle"></i> حافظ على نشاط بدني
                        منتظم مناسب لحالتك</li>
                    <li data-aos="zoom-in" data-aos-delay="250"><i class="fas fa-check-circle"></i> اتبع نظاماً غذائياً
                        متوازناً غنياً بالفواكه والخضروات</li>
                    <li data-aos="zoom-in" data-aos-delay="300"><i class="fas fa-check-circle"></i> راقب جودة الهواء
                        الداخلي في منزلك</li>
                    <li data-aos="zoom-in" data-aos-delay="350"><i class="fas fa-check-circle"></i> مارس بانتظام تمارين
                        التنفس الموصى بها</li>
                    <li data-aos="zoom-in" data-aos-delay="400"><i class="fas fa-check-circle"></i> احصل على لقاحات
                        الإنفلونزا والمكورات الرئوية</li>
                </ul>
            </section>

            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3 class="mt-3">لأي سؤال آخر حول مصلحتنا:</h3>
                <a href="index.php#contact" class="btn btn-secondary" data-aos="fade-up" data-aos-delay="250">اتصل
                    بنا</a>
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
        // Script pour le bouton de retour en haut et l'accordéon FAQ
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