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
    <title>حولنا - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/1.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            text-align: center;
            padding: 135px 20px;
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
            padding: 60px 0;
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
            font-weight: 700;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background-color: #4caf50;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .section-title p {
            font-size: 1.2rem;
            color: #666;
            line-height: 1.8;
        }

        /* About Section */
        .about-text h2 {
            color: #2a5a86;
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 1.8rem;
            position: relative;
            padding-right: 15px;
            font-weight: 600;
        }

        .about-text h2::before {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background-color: #4caf50;
            border-radius: 2px;
        }

        .about-text h3 {
            color: #2a5a86;
            margin-top: 30px;
            margin-bottom: 20px;
            font-size: 1.6rem;
            font-weight: 600;
        }

        .about-text p {
            margin-bottom: 20px;
            font-size: 1.1rem;
            color: #555;
            line-height: 2;
        }

        .about-text ul {
            padding-right: 20px;
            margin-bottom: 30px;
        }

        .about-text ul li {
            margin-bottom: 10px;
            position: relative;
            padding-right: 25px;
        }

        .about-text ul li::before {
            content: '\f00c';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: #4caf50;
            position: absolute;
            right: 0;
        }

        /* Timeline */
        .timeline {
            position: relative;
            max-width: 1200px;
            margin: 50px auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: #e0e0e0;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }

        .timeline-item:nth-child(odd) {
            right: 0;
        }

        .timeline-item:nth-child(even) {
            right: 50%;
        }

        .timeline-content {
            padding: 20px 30px;
            background-color: white;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            border-radius: 6px;
            position: relative;
        }

        .timeline-content h3 {
            color: #2a5a86;
            font-size: 1.5rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .timeline-content p {
            color: #666;
            line-height: 1.8;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 25px;
            height: 25px;
            background-color: white;
            border: 4px solid #4caf50;
            border-radius: 50%;
            top: 15px;
            z-index: 1;
        }

        .timeline-item:nth-child(odd)::after {
            left: -17px;
        }

        .timeline-item:nth-child(even)::after {
            right: -17px;
        }

        /* Facilities Section */
        .bg-light {
            background-color: #f8f9fa;
        }

        .facilities-gallery {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
        }

        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        .gallery-item p {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            margin: 0;
            padding: 10px;
            text-align: center;
            font-weight: 500;
        }

        /* Team Section */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .team-member {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            text-align: center;
        }

        .team-member:hover {
            transform: translateY(-10px);
        }

        .member-photo {
            height: 250px;
            overflow: hidden;
        }

        .member-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .team-member:hover .member-photo img {
            transform: scale(1.1);
        }

        .team-member h3 {
            color: #2a5a86;
            margin: 20px 0 5px;
            font-size: 1.3rem;
            font-weight: 600;
        }

        .member-position {
            color: #4caf50;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .team-member p {
            padding: 0 20px 20px;
            color: #666;
            line-height: 1.6;
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
            font-weight: 700;
        }

        .cta-section p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            line-height: 1.8;
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
        }

        /* Values Cards */
        .values-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
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
            color: #4caf50;
            margin-bottom: 20px;
        }

        .value-card h3 {
            color: #2a5a86;
            margin-bottom: 15px;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .value-card p {
            color: #666;
            line-height: 1.8;
        }

        /* Facility List */
        .facility-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .facility-item {
            display: flex;
            align-items: center;
            background: white;
            padding: 15px 20px;
            border-radius: 6px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .facility-item i {
            font-size: 1.8rem;
            color: #4caf50;
            margin-left: 15px;
        }

        .facility-item span {
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .timeline::after {
                right: 31px;
                left: auto;
            }

            .timeline-item {
                width: 100%;
                padding-right: 70px;
                padding-left: 25px;
            }

            .timeline-item:nth-child(even) {
                right: 0;
            }

            .timeline-item:nth-child(odd)::after,
            .timeline-item:nth-child(even)::after {
                right: 18px;
                left: auto;
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

            .facilities-gallery {
                grid-template-columns: 1fr;
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

        /* Réinitialisation de base pour assurer la compatibilité mobile */
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

        /* Style pour les titres en arabe */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Amiri', serif;
        }

        /* Ajustements RTL */
        .container {
            padding-right: 15px;
            padding-left: 15px;
        }

        .row {
            margin-right: -15px;
            margin-left: -15px;
        }

        .col-md-6,
        .col-md-12 {
            padding-right: 15px;
            padding-left: 15px;
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">من نحن</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">اكتشفوا تاريخنا ومهمتنا وقيمنا التي تجعل
                من المؤسسة العمومية الاستشفائية الصبحة مؤسسة استشفائية مرجعية</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="section" id="about">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>تاريخنا</h2>
                <p>رؤية في خدمة الصحة المجتمعية</p>
            </div>
            <div class="about-text" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <p>افتتحت المؤسسة العمومية الاستشفائية الصبحة أبوابها في عام 1985 بمهمة تلبية الاحتياجات الطبية
                    المتزايدة
                    لسكان المنطقة. منذ ذلك الحين، قمنا بتحسين مرافقنا وتوسيع خدماتنا باستمرار لنصبح مؤسسة مرجعية في مجال
                    الرعاية الصحية.</p>
            </div>

            <!-- Timeline -->
            <div class="timeline">
                <div class="timeline-item" data-aos="fade-right" data-aos-duration="1000">
                    <div class="timeline-content">
                        <h3>1985</h3>
                        <p>تأسيس المؤسسة العمومية الاستشفائية الصبحة لتلبية الاحتياجات الطبية للمنطقة</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                    <div class="timeline-content">
                        <h3>2010</h3>
                        <p>افتتاح وحدة تصفية الدم</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
                    <div class="timeline-content">
                        <h3>2019</h3>
                        <p>تحديث مصلحة الإستعجالات الطبية والجراحية</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="600">
                    <div class="timeline-content">
                        <h3>2024</h3>
                        <p>تحديث مصلحتي الأمومة والطب الداخلي</p>
                    </div>
                </div>
                <div class="timeline-item" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="800">
                    <div class="timeline-content">
                        <h3>2025</h3>
                        <p>تحديث قاعة العمليات</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>مهمتنا</h2>
                <p>رعاية صحية عالية الجودة ومتاحة للجميع</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="about-text" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <p>تتمثل مهمة المؤسسة العمومية الاستشفائية الصبحة في تقديم رعاية صحية عالية الجودة ومتاحة لجميع
                            المواطنين. أصبحت مستشفانا مؤسسة مرجعية في المنطقة بفضل التزامنا بالتميز الطبي ورفاهية
                            المرضى.</p>

                        <h2 data-aos="fade-right" data-aos-duration="800">قيمنا</h2>
                        <p data-aos="fade-right" data-aos-duration="800" data-aos-delay="100">يسترشد عملنا اليومي بقيم
                            أساسية تضع المريض في محور اهتماماتنا:</p>
                    </div>
                </div>
            </div>

            <!-- Values Cards -->
            <div class="values-container">
                <div class="value-card" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="100">
                    <i class="fas fa-heart"></i>
                    <h3>احترام الكرامة الإنسانية</h3>
                    <p>معاملة كل مريض بالاحترام والرحمة، مع مراعاة احتياجاته الجسدية والعاطفية والروحية.</p>
                </div>
                <div class="value-card" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="200">
                    <i class="fas fa-award"></i>
                    <h3>التميز المهني</h3>
                    <p>الحفاظ على أعلى معايير الممارسة الطبية من خلال التدريب المستمر واعتماد أفضل الممارسات.</p>
                </div>
                <div class="value-card" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="300">
                    <i class="fas fa-balance-scale"></i>
                    <h3>المساواة في الوصول للرعاية</h3>
                    <p>ضمان حصول جميع المرضى على الرعاية اللازمة بغض النظر عن وضعهم الاجتماعي أو الاقتصادي.</p>
                </div>
                <div class="value-card" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="400">
                    <i class="fas fa-lightbulb"></i>
                    <h3>الابتكار المستمر</h3>
                    <p>البحث المستمر عن تحسين ممارساتنا الطبية وخدماتنا لتقديم رعاية متطورة.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>مرافقنا</h2>
                <p>بيئة حديثة للرعاية المثلى</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="about-text" data-aos="fade-right" data-aos-duration="1000">
                        <p>تتوفر المؤسسة العمومية الاستشفائية الصبحة على معدات طبية حديثة، و188 سرير للاستشفاء، وقاعة
                            عمليات، ومصلحة استعجالات مفتوحة 24 ساعة على مدار الأسبوع. تمتد مؤسستنا على مساحة 15,000 متر
                            مربع
                            ويمكن الوصول إليها بسهولة عبر وسائل النقل العام.</p>

                        <h3 data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">مرافقنا الرئيسية:</h3>

                        <div class="facility-list">
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                                <i class="fas fa-bed"></i>
                                <span>188 سرير للاستشفاء</span>
                            </div>
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150">
                                <i class="fas fa-building"></i>
                                <span>قاعة عمليات مجهزة</span>
                            </div>
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                                <i class="fas fa-truck"></i>
                                <span>مصلحة الإستعجالات 24/24</span>
                            </div>
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="250">
                                <i class="fas fa-flask"></i>
                                <span>مخبر التحاليل الطبية</span>
                            </div>
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
                                <i class="fas fa-x-ray"></i>
                                <span>وحدة التصوير الطبي</span>
                            </div>
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="350">
                                <i class="fas fa-heartbeat"></i>
                                <span>وحدة تصفية الدم</span>
                            </div>
                            <div class="facility-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
                                <i class="fas fa-pills"></i>
                                <span>الصيدلية الاستشفائية</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="facilities-gallery">
                        <div class="gallery-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="100">
                            <img src="img/services/bloc.jpg" alt="قاعة العمليات">
                            <p>قاعة العمليات</p>
                        </div>
                        <div class="gallery-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                            <img src="img/services/chambre.jpg" alt="غرفة المريض">
                            <p>غرفة المريض</p>
                        </div>
                        <div class="gallery-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="300">
                            <img src="img/services/laboratoire.jpg" alt="المختبر">
                            <p>مخبر التحاليل الطبية</p>
                        </div>
                        <div class="gallery-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="400">
                            <img src="img/services/urgence.jpg" alt="قسم الطوارئ">
                            <p>مصلحة الإستعجالات الطبية والجراحية</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="section bg-light">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="1000">
                <h2>فريقنا الطبي</h2>
                <p>مختصون مكرسون لصحتكم</p>
            </div>
            <div class="team-grid">
                <div class="team-member" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="member-photo">
                        <img src="img/DR.jpg" alt="د. محمد لوكيل">
                    </div>
                    <h3>د. محمد لوكيل</h3>
                    <p class="member-position">طبيب رئيس مصلحة الجراحة العامة</p>
                    <p>جراح مع أكثر من 30 سنة من الخبرة.</p>
                </div>
                <div class="team-member" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="member-photo">
                        <img src="img/DR.jpg" alt="د. عيسى محمد سبع">
                    </div>
                    <h3>د. عيسى محمد سبع</h3>
                    <p class="member-position">طبيب رئيس مصلحة طب الأطفال</p>
                    <p> طبيب أطفال مع أكثر من 30 سنة من الخبرة.</p>
                </div>
                <div class="team-member" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <div class="member-photo">
                        <img src="img/DR.jpg" alt="د. لعزرق بلقاسم">
                    </div>
                    <h3>د. لزرق بلقاسم</h3>
                    <p class="member-position">طبيب رئيس مصلحة الطب الداخلي</p>
                    <p>طبيب عام رئيس مع أكثر من 30 سنة من الخبرة.</p>
                </div>
                <div class="team-member" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="member-photo">
                        <img src="img/DR.jpg" alt="د. كمال جلولي">
                    </div>
                    <h3>د. كمال جلولي</h3>
                    <p class="member-position">طبيب رئيس مخبر التحليل الطبية</p>
                    <p>ممارس متخصص رئيسي في الكيمياء الحيوية.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container">
            <h2 data-aos="fade-down" data-aos-duration="1000">احجزوا موعداً مع أطبائنا المتخصصين</h2>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">فريقنا الطبي مستعد لتقديم أفضل الرعاية
                لصحتكم.</p>
            <a href="contact-ar.php" class="btn btn-primary" data-aos="zoom-in" data-aos-duration="800"
                data-aos-delay="400"><i class="fas fa-arrow-left"></i> اتصلوا بنا</a>
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