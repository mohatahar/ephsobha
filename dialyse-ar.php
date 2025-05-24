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
    <title>مصلحة غسيل الكلى - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- خط عربي -->
    <link
        href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Cairo:wght@300;400;600;700&display=swap"
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
            font-family: 'Cairo', 'Amiri', Arial, sans-serif;
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services/dialyse.jpg');
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
            font-family: 'Amiri', serif;
            font-size: 2rem;
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
            font-family: 'Amiri', serif;
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
            background-color: #e3f2fd;
            border-right: 4px solid var(--primary-color);
            border-left: none;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
            font-family: 'Amiri', serif;
        }

        /* Service de dialyse spécifique */
        .dialysis-hours {
            background-color: #e7f5ff;
            border-right: 4px solid var(--primary-color);
            border-left: none;
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .dialysis-hours h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-family: 'Amiri', serif;
        }

        .dialysis-hours p {
            margin-bottom: 10px;
        }

        .dialysis-card {
            background-color: #e7f5ff;
            border-right: 4px solid var(--primary-color);
            border-left: none;
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .dialysis-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-family: 'Amiri', serif;
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
            font-family: 'Amiri', serif;
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

        .btn-info {
            background-color: var(--accent-color);
            color: white;
        }

        .btn-info:hover {
            background-color: #0096c7;
        }

        /* Tableau des séances */
        .session-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .session-table th,
        .session-table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .session-table th {
            background-color: var(--primary-color);
            color: white;
            font-family: 'Amiri', serif;
        }

        .session-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .session-table tr:hover {
            background-color: #e9ecef;
        }

        /* Statistiques */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .stat-item {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .stat-item .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin: 10px 0;
        }

        .stat-item .stat-label {
            color: var(--dark-color);
            font-size: 1rem;
            font-family: 'Amiri', serif;
        }

        /* FAQ Accordion */
        .faq-container {
            margin: 30px 0;
        }

        .faq-item {
            margin-bottom: 10px;
            border-radius: 5px;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        .faq-question {
            padding: 15px;
            background-color: #f8f9fa;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
            color: var(--primary-color);
            font-family: 'Amiri', serif;
        }

        .faq-question:after {
            content: '\f107';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question:after {
            transform: rotate(180deg);
        }

        .faq-answer {
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }

        .faq-item.active .faq-answer {
            padding: 15px;
            max-height: 500px;
        }

        .faq-answer ul {
            margin-right: 20px;
            margin-top: 10px;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }

            .service-list,
            .stats-row {
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

        /* Numérotation arabe */
        .arabic-number {
            font-family: 'Cairo', sans-serif;
        }

        /* Ajustements pour les listes numérotées */
        ol {
            padding-right: 20px;
            padding-left: 0;
        }

        ul {
            padding-right: 20px;
            padding-left: 0;
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

        /* Ajustements spécifiques pour l'arabe */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Amiri', serif;
        }

        p,
        li,
        td,
        th {
            font-family: 'Cairo', sans-serif;
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
            <h1 data-aos="fade-down" data-aos-duration="1000">مصلحة غسيل الكلى</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">رعاية متخصصة للمرضى المصابين بالفشل
                الكلوي في المؤسسة العمومية الاستشفائية الصبحة</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>مصلحة غسيل الكلى</h3>
                <p>تقدم مصلحة غسيل الكلى في المؤسسة العمومية الاستشفائية الصبحة علاجات بديلة للكلى للمرضى الذين يعانون
                    من الفشل الكلوي المزمن أو الحاد. يضمن فريقنا الطبي وشبه الطبي عالي التخصص رعاية شاملة ومخصصة في بيئة
                    آمنة ومريحة. نحن ملتزمون بتقديم رعاية عالية الجودة تحسن من جودة حياة مرضانا مع الحرص على رفاهيتهم
                    الجسدية والنفسية.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-filter"></i>
            </div>

            <!-- Horaires et disponibilité -->
            <section class="dialysis-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> تنظيم الحصص</h3>
                <p><strong>أوقات العمل:</strong> تعمل مصلحة غسيل الكلى لدينا من السبت إلى الخميس، مع ثلاث حصص يومية
                    لاستيعاب جميع مرضانا.</p>
                <p><strong>الفريق الطبي:</strong> يتكون فريقنا من أطباء أمراض الكلى، وأطباء عامين، وممرضين، وطاقم دعم،
                    جميعهم مكرسون لتقديم أفضل الرعاية.</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">مصلحة غسيل الكلى لدينا</h2>

                <div class="stats-row" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-item">
                        <i class="fas fa-hospital-user"></i>
                        <div class="stat-number arabic-number">14</div>
                        <div class="stat-label">أجهزة غسيل الكلى</div>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-procedures"></i>
                        <div class="stat-number arabic-number">70+</div>
                        <div class="stat-label">مريض متابع</div>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-calendar-check"></i>
                        <div class="stat-number arabic-number">3</div>
                        <div class="stat-label">حصص يومية</div>
                    </div>
                </div>

                <p>تقدم مصلحة غسيل الكلى لدينا:</p>

                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-filter"></i>
                        <h4>غسيل الكلى التقليدي</h4>
                        <p>العلاج القياسي لغسيل الكلى بمعدل ثلاث حصص أسبوعياً لمدة 4 ساعات</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-heartbeat"></i>
                        <h4>غسيل الكلى الطارئ</h4>
                        <p>التعامل مع الحالات الطارئة بالتعاون مع مصلحة الإستعجالات لدينا</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-user-md"></i>
                        <h4>المتابعة النفرولوجية</h4>
                        <p>استشارات منتظمة مع أطباء أمراض الكلى لتكييف علاجك</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-hand-holding-medical"></i>
                        <h4>التثقيف العلاجي</h4>
                        <p>مرافقة شخصية للعيش بشكل أفضل مع أمراض الكلى</p>
                    </div>
                </div>
            </section>

            <section data-aos="fade-up" data-aos-delay="350">
                <h2 class="section-title">آلية عمل جلسات غسيل الكلى</h2>

                <table class="session-table" data-aos="fade-up" data-aos-delay="100">
                    <thead>
                        <tr>
                            <th>الحصة</th>
                            <th>التوقيت</th>
                            <th>الأيام</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>حصة الصباح</td>
                            <td>07:00 - 11:00</td>
                            <td>من السبت إلى الخميس</td>
                        </tr>
                        <tr>
                            <td>حصة بعد الظهر</td>
                            <td>12:00 - 16:00</td>
                            <td>من السبت إلى الخميس</td>
                        </tr>
                        <tr>
                            <td>حصة المساء</td>
                            <td>17:00 - 21:00</td>
                            <td>من السبت إلى الخميس</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section class="dialysis-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-procedures"></i> سير حصة غسيل الكلى</h3>
                <ol class="guidelines-list">
                    <li data-aos="fade-right" data-aos-delay="100"><i class="fas fa-1"></i> <strong>الاستقبال
                            والتحضير</strong>: قياس العلامات الحيوية (الضغط، الوزن، درجة الحرارة)</li>
                    <li data-aos="fade-right" data-aos-delay="150"><i class="fas fa-2"></i> <strong>التجهيز</strong>:
                        وضع مريح في سرير مخصص</li>
                    <li data-aos="fade-right" data-aos-delay="200"><i class="fas fa-3"></i> <strong>التوصيل</strong>:
                        الربط بجهاز غسيل الكلى عبر المدخل الوعائي (الناسور الشرياني الوريدي أو القسطرة)</li>
                    <li data-aos="fade-right" data-aos-delay="250"><i class="fas fa-4"></i> <strong>الحصة</strong>:
                        العلاج لمدة حوالي 4 ساعات مع مراقبة مستمرة</li>
                    <li data-aos="fade-right" data-aos-delay="300"><i class="fas fa-5"></i> <strong>فصل
                            الاتصال</strong>: انتهاء الحصة وضغط نقاط الوخز</li>
                    <li data-aos="fade-right" data-aos-delay="350"><i class="fas fa-6"></i> <strong>المراقبة بعد غسيل
                            الكلى</strong>: فحص العلامات الحيوية والإذن بالخروج</li>
                </ol>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">المعدات والتجهيزات</h2>

                <p>مصلحتنا مجهزة بتقنيات حديثة لضمان علاجات آمنة وفعالة:</p>

                <ul class="guidelines-list">
                    <li data-aos="fade-right" data-aos-delay="100"><i class="fas fa-check-circle"></i> أجهزة غسيل الكلى
                        من آخر جيل</li>
                    <li data-aos="fade-right" data-aos-delay="150"><i class="fas fa-check-circle"></i> نظام معالجة
                        المياه بالتناضح العكسي</li>
                    <li data-aos="fade-right" data-aos-delay="250"><i class="fas fa-check-circle"></i> أجهزة مراقبة
                        العلامات الحيوية</li>
                    <li data-aos="fade-right" data-aos-delay="350"><i class="fas fa-check-circle"></i> تلفزيون لجعل
                        الجلسات أكثر متعة</li>
                </ul>
            </section>

            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>ما يجب معرفته عن غسيل الكلى</h3>
                <p>غسيل الكلى هو علاج يحل محل جزئياً وظيفة الكلى المعطلة. يسمح بـ:</p>
                <ul style="margin-top: 10px; margin-right: 20px;">
                    <li>إزالة الفضلات والماء الزائد من الدم</li>
                    <li>الحفاظ على توازن الأملاح في الجسم</li>
                    <li>التحكم في ضغط الدم</li>
                    <li>تحسين جودة حياة الأشخاص المصابين بالفشل الكلوي</li>
                </ul>
            </div>

            <section data-aos="fade-up" data-aos-delay="350">
                <h2 class="section-title">الأسئلة المتكررة</h2>

                <div class="faq-container">
                    <div class="faq-item" data-aos="fade-up" data-aos-delay="100">
                        <div class="faq-question">كيف تتم الاستشارة الأولى؟</div>
                        <div class="faq-answer">
                            <p>أثناء استشارتك الأولى، سيقوم طبيب أمراض الكلى لدينا بإجراء فحص شامل، ودراسة ملفك الطبي
                                ونتائج تحاليلك. سيشرح لك بالتفصيل العلاج بغسيل الكلى، ويجيب على جميع أسئلتك ويضع معك خطة
                                رعاية شخصية.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="150">
                        <div class="faq-question">ماذا يجب أن أحضر لكل حصة غسيل كلى؟</div>
                        <div class="faq-answer">
                            <p>لكل حصة، نوصيك بإحضار:</p>
                            <ul>
                                <li>بطاقة الهوية وبطاقة التأمين الصحي</li>
                                <li>القائمة المحدثة لأدويتك</li>
                                <li>كتاب أو جهاز لوحي أو أي تسلية أخرى لمدة الحصة</li>
                                <li>وجبة خفيفة إذا لزم الأمر (مع احترام التوصيات الغذائية)</li>
                                <li>ملابس مريحة بأكمام سهلة الرفع</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="200">
                        <div class="faq-question">ما هي القيود الغذائية التي يجب اتباعها؟</div>
                        <div class="faq-answer">
                            <p>يجب على المرضى الذين يخضعون لغسيل الكلى عموماً مراقبة استهلاكهم من:</p>
                            <ul>
                                <li>البوتاسيوم (تحديد الموز، البطاطس، الطماطم)</li>
                                <li>الفوسفور (تحديد منتجات الألبان، بعض اللحوم)</li>
                                <li>الصوديوم (تحديد الملح)</li>
                                <li>السوائل (حسب التوصيات الشخصية)</li>
                            </ul>
                            <p>سيوفر لك اختصاصي التغذية لدينا نظاماً غذائياً شخصياً مناسباً لاحتياجاتك المحددة.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-aos="fade-up" data-aos-delay="250">
                        <div class="faq-question">هل من الممكن السفر أثناء غسيل الكلى؟</div>
                        <div class="faq-answer">
                            <p>نعم، من الممكن تماماً السفر أثناء غسيل الكلى. يمكن لمصلحتنا مساعدتك في تنظيم حصص غسيل
                                الكلى في مكان وجهتك. من المهم التخطيط مسبقاً (مثالياً 2-3 أشهر قبل) للتأكد من توفر مركز
                                استقبال. سنقدم جميع الوثائق الطبية اللازمة لضمان استمرارية رعايتك.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="dialysis-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-info-circle"></i> نصائح لمرضانا</h3>
                <p>لتحسين فعالية علاجك وتحسين جودة حياتك:</p>
                <ul class="guidelines-list">
                    <li data-aos="zoom-in" data-aos-delay="100"><i class="fas fa-check-circle"></i> اتبع التوصيات
                        الغذائية بدقة</li>
                    <li data-aos="zoom-in" data-aos-delay="150"><i class="fas fa-check-circle"></i> تناول أدويتك كما هو
                        موصوف</li>
                    <li data-aos="zoom-in" data-aos-delay="200"><i class="fas fa-check-circle"></i> احافظ على المدخل
                        الوعائي (تجنب سحب الدم، قياس الضغط والمجوهرات الضيقة على الذراع المعنية)</li>
                    <li data-aos="zoom-in" data-aos-delay="250"><i class="fas fa-check-circle"></i> حافظ على نشاط بدني
                        مناسب لحالتك</li>
                    <li data-aos="zoom-in" data-aos-delay="300"><i class="fas fa-check-circle"></i> لا تتردد في التحدث
                        عن مخاوفك مع فريقنا</li>
                </ul>
            </section>

            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3>هل تحتاج معلومات إضافية؟</h3>
                <p>فريقنا تحت تصرفكم للإجابة على جميع أسئلتكم حول مصلحة غسيل الكلى لدينا</p>
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
                    // Basculer l'état actif de l'item cliqué
                    item.classList.toggle('active');
                });
            });
        });
    </script>

</body>

</html>

<?php include('footer-ar.php'); ?>