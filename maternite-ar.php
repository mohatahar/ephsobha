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
    <title>مصلحة الأمومة - <?php echo $hospital_name; ?></title>
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
            --maternity-color: #ff77b9;
            --maternity-light: #ffe0f0;
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
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('img/services/maternite.jpg');
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
            color: var(--maternity-color);
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--maternity-color);
        }

        .info-card {
            background-color: #f8f9fa;
            border-right: 4px solid var(--maternity-color);
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 5px;
        }

        .info-card h3 {
            color: var(--maternity-color);
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
            color: var(--maternity-color);
            margin-left: 10px;
            font-size: 1.2rem;
        }

        .special-notice {
            background-color: var(--maternity-light);
            border-right: 4px solid var(--maternity-color);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: var(--maternity-color);
            margin-bottom: 10px;
        }

        /* Maternité spécifique */
        .maternity-hours {
            background-color: var(--maternity-light);
            border-right: 4px solid var(--maternity-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .maternity-hours h3 {
            color: var(--maternity-color);
            margin-bottom: 15px;
        }

        .maternity-hours p {
            margin-bottom: 10px;
        }

        .maternity-card {
            background-color: #e7f5ff;
            border-right: 4px solid var(--maternity-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .maternity-card h3 {
            color: var(--maternity-color);
            margin-bottom: 15px;
        }

        .service-icon {
            font-size: 3rem;
            color: var(--maternity-color);
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
            color: var(--maternity-color);
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .service-item h4 {
            color: var(--dark-color);
            margin-bottom: 10px;
        }

        /* Timeline */
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 0;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 4px;
            background-color: var(--maternity-color);
            top: 0;
            bottom: 0;
            right: 50%;
            margin-right: -2px;
        }

        .timeline-container {
            padding: 10px 40px;
            position: relative;
            background-color: inherit;
            width: 50%;
        }

        .timeline-container::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            left: -10px;
            background-color: white;
            border: 4px solid var(--maternity-color);
            top: 15px;
            border-radius: 50%;
            z-index: 1;
        }

        .left {
            right: 0;
        }

        .right {
            right: 50%;
        }

        .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid var(--maternity-light);
            border-width: 10px 10px 10px 0;
            border-color: transparent var(--maternity-light) transparent transparent;
        }

        .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid var(--maternity-light);
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent var(--maternity-light);
        }

        .right::after {
            right: -10px;
        }

        .timeline-content {
            padding: 20px;
            background-color: var(--maternity-light);
            position: relative;
            border-radius: 6px;
        }

        .timeline-content h3 {
            color: var(--maternity-color);
            margin-bottom: 10px;
        }

        /* Gallery */
        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin: 30px 0;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            height: 200px;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        /* Testimonials */
        .testimonial {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            position: relative;
        }

        .testimonial::before {
            content: '\201D';
            font-size: 4rem;
            position: absolute;
            right: 10px;
            top: -20px;
            color: var(--maternity-color);
            opacity: 0.3;
        }

        .testimonial-content {
            font-style: italic;
            margin-bottom: 15px;
        }

        .testimonial-author {
            font-weight: bold;
            text-align: left;
        }

        /* Call to action */
        .cta-section {
            text-align: center;
            margin: 40px 0;
            padding: 30px;
            background-color: var(--maternity-light);
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
            margin: 10px 5px;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #005d91;
        }

        .btn-maternity {
            background-color: var(--maternity-color);
            color: white;
        }

        .btn-maternity:hover {
            background-color: #e15da1;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }

            .service-list,
            .gallery {
                grid-template-columns: 1fr;
            }

            .timeline::after {
                right: 31px;
            }

            .timeline-container {
                width: 100%;
                padding-right: 70px;
                padding-left: 25px;
            }

            .timeline-container::before {
                right: 60px;
                border: medium solid var(--maternity-light);
                border-width: 10px 0 10px 10px;
                border-color: transparent transparent transparent var(--maternity-light);
            }

            .left::after,
            .right::after {
                right: 21px;
            }

            .right {
                right: 0%;
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

        /* Accordion FAQ */
        .faq-item {
            margin-bottom: 15px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            background-color: var(--maternity-light);
            color: var(--dark-color);
            padding: 15px 20px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }

        .faq-question::after {
            content: '\f078';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question::after {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0;
            max-height: 0;
            overflow: hidden;
            background-color: white;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }

        .faq-item.active .faq-answer {
            padding: 15px 20px;
            max-height: 500px;
        }

        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.2rem;
            }

            .gallery {
                grid-template-columns: repeat(2, 1fr);
            }

            .team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 576px) {
            .page-title {
                padding: 80px 20px;
            }

            .page-title p {
                font-size: 1.1rem;
            }

            .gallery {
                grid-template-columns: 1fr;
            }

            .team-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">مصلحة الأمومة</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">مرافقة شخصية ورعاية عالية الجودة للأم
                والطفل في المؤسسة العمومية الاستشفائية الصبحة</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>مصلحة الأمومة</h3>
                <p>تقدم مصلحة الأمومة في المؤسسة العمومية الاستشفائية الصبحة مرافقة شاملة للأمهات المستقبليات، من الحمل
                    إلى الولادة والرعاية ما بعد الولادة. فريقنا متعدد التخصصات من طبيبات وقابلات ذوي الخبرة مكرس لتقديم
                    أفضل الخدمات في بيئة دافئة وآمنة ومتعاطفة. مهمتنا هي جعل هذه المرحلة من حياتك هادئة وممتعة قدر
                    الإمكان، مع ضمان الأمان الأمثل للأم والطفل.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-baby"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="maternity-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> الجاهزية</h3>
                <p><strong>أوقات الاستشارات:</strong> من الأحد إلى الخميس من الساعة 8:00 إلى 16:00</p>
                <p><strong>خدمة الولادة:</strong> متوفرة 24 ساعة/24 و 7 أيام/7، مع فريق كامل للمناوبات</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">خدماتنا للأمومة</h2>
                <p>تقدم مصلحة الأمومة في المؤسسة العمومية الاستشفائية الصبحة رعاية شاملة قبل وأثناء وبعد الولادة:</p>

                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-user-md"></i>
                        <h4>المتابعة قبل الولادة</h4>
                        <p>استشارات منتظمة، فحوصات بالموجات فوق الصوتية، فحوصات مخبرية والتحضير للولادة</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-heartbeat"></i>
                        <h4>الولادة</h4>
                        <p>رعاية الولادات الطبيعية والقيصرية في ظروف أمان مثلى</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-baby-carriage"></i>
                        <h4>المتابعة بعد الولادة</h4>
                        <p>رعاية الأم والوليد، دعم الرضاعة الطبيعية ونصائح للعناية الأولية</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-stethoscope"></i>
                        <h4>الرعاية المتخصصة</h4>
                        <p>حالات الحمل عالية الخطورة، الولادات المبكرة والرعاية لحديثي الولادة</p>
                    </div>
                </div>
            </section>

            <section data-aos="fade-up" data-aos-delay="450">
                <h2 class="section-title">ما يجب إحضاره إلى مصلحة الأمومة</h2>

                <div class="maternity-card">
                    <h3><i class="fas fa-suitcase"></i> حقيبة الولادة</h3>

                    <div class="service-list">
                        <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                            <i class="fas fa-female"></i>
                            <h4>للأم</h4>
                            <ul>
                                <li>ملابس مريحة وفضفاضة</li>
                                <li>قمصان نوم مفتوحة من الأمام (للرضاعة)</li>
                                <li>ملابس داخلية مناسبة</li>
                                <li>أدوات العناية الشخصية</li>
                                <li>فوط صحية خاصة بما بعد الولادة</li>
                            </ul>
                        </div>

                        <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                            <i class="fas fa-baby"></i>
                            <h4>للطفل</h4>
                            <ul>
                                <li>6-5 ملابس داخلية وبيجامات</li>
                                <li>قبعات، جوارب، قفازات</li>
                                <li>بطانيات</li>
                                <li>حفاضات لحديثي الولادة</li>
                                <li>منتجات العناية بالطفل</li>
                                <li>طقم أول للخروج</li>
                            </ul>
                        </div>

                        <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                            <i class="fas fa-clipboard-list"></i>
                            <h4>الوثائق المهمة</h4>
                            <ul>
                                <li>بطاقة الهوية</li>
                                <li>الدفتر الصحي</li>
                                <li>نتائج الفحوصات الحديثة</li>
                                <li>فصيلة الدم</li>
                                <li>الدفتر العائلي</li>
                                <li>أوراق التأمين الصحي</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">مسار الولادة</h2>

                <div class="timeline">
                    <div class="timeline-container left" data-aos="fade-right" data-aos-delay="100">
                        <div class="timeline-content">
                            <h3>الثلث الأول</h3>
                            <p>أول استشارة قبل الولادة، فحص بالموجات فوق الصوتية لتحديد التاريخ، فحوصات الدم ونصائح
                                غذائية</p>
                        </div>
                    </div>

                    <div class="timeline-container right" data-aos="fade-left" data-aos-delay="150">
                        <div class="timeline-content">
                            <h3>الثلث الثاني</h3>
                            <p>متابعة منتظمة، فحص بالموجات فوق الصوتية للتشكل، فحص سكري الحمل والتحضير للولادة</p>
                        </div>
                    </div>

                    <div class="timeline-container left" data-aos="fade-right" data-aos-delay="200">
                        <div class="timeline-content">
                            <h3>الثلث الثالث</h3>
                            <p>استشارات متقاربة، فحص بالموجات فوق الصوتية للنمو، تحضير خطة الولادة وزيارة غرف الولادة
                            </p>
                        </div>
                    </div>

                    <div class="timeline-container right" data-aos="fade-left" data-aos-delay="250">
                        <div class="timeline-content">
                            <h3>الولادة</h3>
                            <p>الاستقبال في غرفة الولادة، رعاية من فريق النوبة، ولادة مع احترام رغباتك والأمان</p>
                        </div>
                    </div>

                    <div class="timeline-container left" data-aos="fade-right" data-aos-delay="300">
                        <div class="timeline-content">
                            <h3>الإقامة في قسم الولادة</h3>
                            <p>رعاية ما بعد الولادة، مرافقة الرضاعة الطبيعية، العناية الأولى بالطفل ونصائح شخصية</p>
                        </div>
                    </div>

                    <div class="timeline-container right" data-aos="fade-left" data-aos-delay="350">
                        <div class="timeline-content">
                            <h3>العودة إلى المنزل</h3>
                            <p>استشارة ما بعد الولادة، متابعة طب الأطفال للوليد ونصائح للأسابيع الأولى</p>
                        </div>
                    </div>
                </div>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">مرافقنا</h2>

                <p>تتوفر مصلحة الأمومة في المؤسسة العمومية الاستشفائية الصبحة على بنية تحتية حديثة لضمان راحة وأمان
                    المريضات:</p>

                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="100"><i class="fas fa-check-circle"></i> غرف ولادة مجهزة
                    </li>
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> وحدة حديثي الولادة
                        لرعاية الأطفال حديثي الولادة</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> غرف مريحة (فردية
                        ومزدوجة) مع مساحة للمرافق</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i> قاعة التحضير
                        للولادة</li>
                    <li data-aos="fade-left" data-aos-delay="350"><i class="fas fa-check-circle"></i> مساحة الرضاعة
                        والعناية بحديثي الولادة</li>
                </ul>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">منهجيتنا</h2>

                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-heart"></i>
                        <h4>الرفق</h4>
                        <p>نعطي أهمية كبيرة للإنصات واحترام رغباتك لتعيش هذه التجربة في أفضل الظروف</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-shield-alt"></i>
                        <h4>الأمان</h4>
                        <p>فريقنا الطبي ذو الخبرة يضمن مراقبة مستمرة وتدخل سريع عند الحاجة</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-users"></i>
                        <h4>المرافقة</h4>
                        <p>مهنيون في خدمتك لإرشادك قبل وأثناء وبعد الولادة</p>
                    </div>
                </div>
            </section>

            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>التحضير للولادة</h3>
                <p>تقدم المؤسسة العمومية الاستشفائية الصبحة جلسات التحضير للولادة تحت إشراف قابلاتنا ذوات الخبرة. هذه
                    الجلسات ستساعدك على:</p>
                <ul style="margin-top: 10px; margin-right: 20px;">
                    <li>فهم المراحل المختلفة للولادة</li>
                    <li>تعلم تقنيات التنفس والاسترخاء</li>
                    <li>التعرف على المكان والفريق</li>
                    <li>إعداد مشروع الولادة الخاص بك</li>
                    <li>الحصول على نصائح للرضاعة الطبيعية والعناية الأولى بحديثي الولادة</li>
                </ul>
            </div>

            <section data-aos="fade-up" data-aos-delay="350">
                <h2 class="section-title">شهادات</h2>

                <div class="testimonial" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-content">
                        ولدت ابنتي الصغيرة في المؤسسة العمومية الاستشفائية الصبحة وأريد أن أشكر كل الفريق على مهنيتهم
                        ولطفهم. لقد عرفوا كيف يطمئنونني ويرافقونني طوال هذه المغامرة. أحتفظ بذكرى رائعة من إقامتي في مصلحة
                        الأمومة.
                    </div>
                    <div class="testimonial-author">السيدة سميرة ب.</div>
                </div>

                <div class="testimonial" data-aos="fade-up" data-aos-delay="150">
                    <div class="testimonial-content">
                        كأب، فوجئت بسرور بأن أكون مشاركاً في العملية. الفريق الطبي أرشدنا، أنا وزوجتي، بكل عطف. المرافق
                        حديثة والموظفون مهتمون جداً. ولد ابننا في ظروف ممتازة.
                    </div>
                    <div class="testimonial-author">السيد كريم ل.</div>
                </div>

                <div class="testimonial" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-content">
                        رغم حمل عالي الخطورة، تمت متابعتي بشكل مثالي من قبل فريق الولادة. يقظتهم وخبرتهم مكنتاني من
                        إنجاب توأم بصحة جيدة. أنا ممتنة إلى ما لا نهاية للرعاية عالية الجودة التي تلقيتها.
                    </div>
                    <div class="testimonial-author">السيدة نعيمة ت.</div>
                </div>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">الأسئلة الشائعة</h2>

                <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="faq-question">متى يجب أن أتوجه إلى مصلحة الأمومة</div>
                    <div class="faq-answer">
                        <p>يجب أن تتوجهي إلى مصلحة الأمومة في الحالات التالية:</p>
                        <ul>
                            <li>انقباضات منتظمة ومؤلمة (كل 5 دقائق لأكثر من ساعة)</li>
                            <li>نزول الماء</li>
                            <li>نزيف</li>
                            <li>انخفاض مهم في حركات الطفل</li>
                            <li>حمى تفوق 38 درجة مئوية</li>
                            <li>آلام بطنية شديدة</li>
                        </ul>
                        <p>في حالة الشك، لا تترددي في الاتصال بالمصلحة للحصول على المشورة.</p>
                    </div>
                </div>

                <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="faq-question">ما هي مدة الإقامة المتوسطة في مصلحة الأمومة؟</div>
                    <div class="faq-answer">
                        <p>تختلف مدة الإقامة المتوسطة في مصلحة الأمومة حسب نوع الولادة:</p>
                        <ul>
                            <li>للولادة الطبيعية بدون مضاعفات: 48 إلى 72 ساعة</li>
                            <li>للولادة القيصرية: 4 إلى 5 أيام</li>
                        </ul>
                        <p>يمكن تعديل هذه المدة حسب حالتك الصحية وحالة طفلك.</p>
                    </div>
                </div>

                <div class="faq-item" data-aos="fade-up" data-aos-delay="250">
                    <div class="faq-question">هل يمكنني أن أكون مرافقة أثناء الولادة؟</div>
                    <div class="faq-answer">
                        <p>نعم، نسمح بحضور مرافق من اختيارك (عادة والد الطفل أو قريب) أثناء الولادة الطبيعية، إلا في
                            حالة وجود مانع طبي. بالنسبة للولادات القيصرية المبرمجة، يعتمد هذا على الظروف الطبية وسيتم
                            مناقشته مع الفريق الطبي.</p>
                    </div>
                </div>

                <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="faq-question">كيف تتم الرضاعة في مصلحة الأمومة؟</div>
                    <div class="faq-answer">
                        <p>فريقنا مدرب لمرافقتك في الرضاعة الطبيعية إذا كنت ترغبين في ذلك. ستنصحك القابلات والممرضات
                            المتخصصات حول الوضعيات، وتيرة الرضعات وستجبن على جميع أسئلتك. إذا اخترت الرضاعة الاصطناعية،
                            سنرشدك أيضاً في تحضير الرضاعات.</p>
                    </div>
                </div>
            </section>

            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3 class="mt-3">لأي سؤال آخر حول مصلحة الأمومة لدينا:</h3>
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

        // Script pour l'accordéon FAQ
        const faqQuestions = document.querySelectorAll('.faq-question');

        faqQuestions.forEach(question => {
            question.addEventListener('click', function () {
                // Toggle la classe active sur l'élément parent
                const faqItem = this.parentElement;
                faqItem.classList.toggle('active');
            });
        });
    </script>
</body>

</html>
<?php include('footer-ar.php'); ?>