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
    <title>ميثاق المريض - المؤسسة العمومية الإستشفائية الصبحة</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/charte.jpg');
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

        .section-title {
            color: var(--primary-color);
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--accent-color);
            font-family: 'Amiri', serif;
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
            font-family: 'Amiri', serif;
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
            background-color: #fff3cd;
            border-right: 4px solid var(--warning-color);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: #856404;
            margin-bottom: 10px;
            font-family: 'Amiri', serif;
        }

        /* Accès rapide aux sections */
        .quick-links {
            background-color: #e7f5ff;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 30px;
        }

        .quick-links h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-family: 'Amiri', serif;
        }

        .quick-links ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .quick-links li a {
            display: block;
            padding: 8px 15px;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .quick-links li a:hover {
            background-color: #005d91;
            transform: translateY(-2px);
        }

        /* Cards pour les sections */
        .charte-section {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 40px;
            border-top: 4px solid var(--primary-color);
        }

        .charte-section h2 {
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
            font-family: 'Amiri', serif;
        }

        .right-box {
            background-color: #e7f5ff;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        .right-box h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
            font-family: 'Amiri', serif;
        }

        /* Styles pour les listes numérotées */
        .numbered-list {
            list-style-type: none;
            counter-reset: item;
            padding-right: 0;
        }

        .numbered-list li {
            counter-increment: item;
            margin-bottom: 15px;
            padding-right: 35px;
            position: relative;
        }

        .numbered-list li::before {
            content: counter(item);
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
            font-size: 14px;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            right: 0;
            top: 0;
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

            .quick-links ul {
                flex-direction: column;
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
            left: 20px;
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

        /* Adjustments for Arabic text */
        h1, h2, h3 {
            font-family: 'Amiri', serif;
        }

        p, li, span {
            font-family: 'Cairo', sans-serif;
        }

        .guidelines-list ul {
            padding-right: 20px;
        }

        /* Fix for nested lists */
        .guidelines-list li ul {
            margin-top: 5px;
            padding-right: 20px;
        }

        .guidelines-list li ul li {
            border-bottom: none;
            padding: 2px 0;
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">ميثاق المريض</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">دليل شامل للمريض: الحقوق، الوصول، الإقامة والخروج من المؤسسة العمومية الاستشفائية الصبحة</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>مرحباً بكم في المؤسسة العمومية الاستشفائية الصبحة</h3>
                <p>يهدف هذا الميثاق إلى إعلامكم بحقوقكم وتوجيهكم طوال مسار العلاج في مؤسستنا. فريقنا مُكَرَّس بالكامل لرفاهيتكم وشفائكم. ستصاحبكم هذه الوثيقة من وصولكم وحتى خروجكم من المستشفى.</p>
            </div>

            <!-- Accès rapide aux sections -->
            <section class="quick-links" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="fas fa-link"></i> الوصول السريع</h3>
                <ul>
                    <li><a href="#guide">دليل المريض</a></li>
                    <li><a href="#droits">حقوق المريض</a></li>
                    <li><a href="#arrivee">وصولكم</a></li>
                    <li><a href="#sejour">إقامتكم</a></li>
                    <li><a href="#sortie">خروجكم</a></li>
                    <li><a href="#devoirs">واجباتكم</a></li>
                </ul>
            </section>

            <!-- Section Guide du Malade -->
            <section id="guide" class="charte-section" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title"><i class="fas fa-book"></i> دليل المريض</h2>

                <div class="info-card" data-aos="fade-up" data-aos-delay="150">
                    <h3>سيدتي، آنستي، سيدي،</h3>
                    <p>للرعاية التي تتطلبها حالتكم الصحية، نرحب بكم في المؤسسة العمومية الاستشفائية الصبحة. يوفر لكم هذا الدليل معلومات حول شروط القبول والإقامة والخروج ويجيب على الأسئلة التي تطرحونها. يمكن تقديم أي معلومات إضافية بناءً على طلبكم.</p>
                    <p>من أجل تلبية توقعاتكم بشكل أفضل، نقترح عليكم إرسال تقييماتكم وملاحظاتكم واقتراحاتكم التي تودون تقديمها، باستخدام استبيان الخروج أو عبر البريد الإلكتروني. نؤكد لكم انتباهنا الدقيق.</p>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="200">عمل المؤسسة</h3>
                <p data-aos="fade-up" data-aos-delay="250">تؤمن مناوبات الإستعجالات من قبل أطبائنا على مستوى المؤسسة العمومية الاستشفائية الصبحة.</p>

                <div class="right-box" data-aos="fade-right" data-aos-delay="300">
                    <h3>أوقات العمل</h3>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-building"></i> <strong>الإدارة:</strong> من الأحد إلى الخميس
                            <ul>
                                <li>12:00-08:00</li>
                                <li>16:30-13:00</li>
                            </ul>
                        </li>
                        <li><i class="fas fa-door-open"></i> <strong>مكتب القبول:</strong> 24 ساعة/24، 7 أيام/7</li>
                        <li><i class="fas fa-stethoscope"></i> <strong>الفحوصات الخارجية:</strong> من الأحد إلى الخميس
                            <ul>
                                <li>12:00-08:00</li>
                                <li>16:30-13:00</li>
                            </ul>
                        </li>
                        <li><i class="fas fa-x-ray"></i> <strong>الأشعة:</strong> 24 ساعة/24، 7 أيام/7</li>
                        <li><i class="fas fa-flask"></i> <strong>مخبر التحاليل الطبية:</strong> 24 ساعة/24 للمرضى في الإستعجالات والمرضى في حالة الإستشفاء</li>
                    </ul>
                </div>

                <div class="right-box" data-aos="fade-right" data-aos-delay="350">
                    <h3>المناوبات الليلية</h3>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-moon"></i> <strong>أيام العمل:</strong> من 16:00 مساءا حتى 08:00 صباحا في اليوم التالي</li>
                        <li><i class="fas fa-calendar-alt"></i> <strong>نهاية الأسبوع والأعياد:</strong> 08:00-20:00، من 20:00 حتى 08:00 في اليوم التالي</li>
                    </ul>
                </div>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="400">
                    <h3>الزيارات</h3>
                    <p>الزيارات اليومية، من 13:30 إلى 15:00 (باستثناء الزيارات المحظورة من قبل الطبيب المعالج).</p>
                    <p><strong>منع دخول القُصَّر أقل من 14 سنة.</strong></p>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="450">شروط القبول</h3>
                <p data-aos="fade-up" data-aos-delay="500">يتم القبول في المستشفى إثر:</p>
                <ul class="numbered-list">
                    <li data-aos="fade-right" data-aos-delay="550">
                        <strong>القبول عبر الإستعجالات</strong><br>
                        إعداد طلب قبول من قبل طبيب مصلحة الإستعجالات.
                    </li>
                    <li data-aos="fade-right" data-aos-delay="600">
                        <strong>القبول المبرمج</strong><br>
                        عن طريق موعد تم الحصول عليه مسبقاً خلال استشارة خارجية.
                    </li>
                    <li data-aos="fade-right" data-aos-delay="650">
                        <strong>مصلحة الأمومة</strong><br>
                        الدفتر العائلي إجباري لمصلحة الأمومة.
                    </li>
                </ul>

                <p data-aos="fade-up" data-aos-delay="700">يسجل موظف مكتب القبول عملية الدخول ويعد نشرة قبول تحمل اسم المصلحة وورقة نقل، يتم تسليمهما من قبل الأهل إلى المراقب الطبي للمصلحة حيث سيتم استشفاء المريض.</p>

                <p data-aos="fade-up" data-aos-delay="750"><strong>الوثائق المطلوبة:</strong> هوية المريض مع بطاقة التأمين أو بطاقة المعوز.</p>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="800">
                    <h3>توصيات مهمة للمرافقين</h3>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-user-friends"></i> يجب ألا تتعب الزيارات أو تزعج المرضى المجاورين في أي حال من الأحوال.</li>
                        <li><i class="fas fa-bed"></i> عدم الجلوس على أسرة المرضى.</li>
                        <li><i class="fas fa-broom"></i> المحافظة على نظافة المكان.</li>
                    </ul>
                </div>
            </section>

            <!-- Section Droits du Patient -->
            <section id="droits" class="charte-section" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title"><i class="fas fa-gavel"></i> حقوق المريض</h2>

                <div class="right-box" data-aos="fade-right" data-aos-delay="200">
                    <h3>المبادئ العامة</h3>
                    <p>لكل شخص الحق في حماية صحته والعلاج الذي تتطلبه حالته الصحية، في جميع مراحل الحياة.</p>
                    <p>خدمات المؤسسة العمومية الاستشفائية الصبحة متاحة لجميع السكان. تعمل في أفضل الظروف الممكنة وتضمن:</p>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-shield-alt"></i> الحقوق الأساسية وسلامة الأشخاص الذين يلجؤون إلى خدماتها</li>
                        <li><i class="fas fa-user-shield"></i> احترام الكرامة الإنسانية</li>
                        <li><i class="fas fa-hand-sparkles"></i> احترام قواعد النظافة المحددة بالتشريع والقوانين المعمول بها</li>
                        <li><i class="fas fa-user-md"></i> الكرامة المهنية والاستقلالية العلمية لجميع الموظفين</li>
                    </ul>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="250">احترام كرامة وخصوصية المريض</h3>
                <ul class="numbered-list">
                    <li data-aos="fade-right" data-aos-delay="300">
                        <strong>حماية الحياة الخاصة</strong><br>
                        حماية الحياة الخاصة للمريض مضمونة. الطابع السري لبيانات المريض مضمون بالقانون. السر يغطي جميع المعلومات المتعلقة بالشخص، التي وصلت إلى علم المهني الصحي.
                    </li>
                    <li data-aos="fade-right" data-aos-delay="350">
                        <strong>السر الطبي</strong><br>
                        يغطي أيضاً الملف الطبي والمجال الخاص للمريض. جميع فريق الرعاية وكذلك أي موظف آخر في المؤسسة ملزم بالتزام السر الطبي والمهني.
                    </li>
                    <li data-aos="fade-right" data-aos-delay="400">
                        <strong>استثناءات السر الطبي</strong><br>
                        يمكن رفع السر الطبي للقُصَّر وعديمي الأهلية بطلب من العائلة أي: الزوج، الأب، الأم، الطفل أو الأطفال، الإخوة، الأخوات أو الوصي. يمكن أيضاً رفع السر الطبي من قبل السلطة القضائية.
                    </li>
                </ul>

                <h3 data-aos="fade-up" data-aos-delay="450">الحق في قبول أو رفض العلاج</h3>
                <ul class="numbered-list">
                    <li data-aos="fade-right" data-aos-delay="500">
                        <strong>قبول أو رفض العلاج</strong><br>
                        للمريض المنوم في المؤسسة الحق في قبول أو رفض أي خدمة تشخيص أو علاج أو مراقبة. في حالة عدم الأهلية الكاملة أو الجزئية، بموجب القانون أو الواقع، يمارس هذا الحق الممثل القانوني أو السلطة المختصة.
                    </li>
                    <li data-aos="fade-right" data-aos-delay="550">
                        <strong>مشاركة المريض</strong><br>
                        يسعى المرضى للمساهمة في حسن سير العلاج، خاصة باتباع الوصفات التي قبلوها وتزويد المهنيين الصحيين بأكمل المعلومات عن صحتهم.
                    </li>
                </ul>

                <h3 data-aos="fade-up" data-aos-delay="600">الحق في المعلومات</h3>
                <ul class="numbered-list">
                    <li data-aos="fade-right" data-aos-delay="650">
                        <strong>المعلومات حول الحالة الصحية</strong><br>
                        لكل مريض في حالة استشفاء في المؤسسة الحق، إلا في حالة الإستعجالات أو عدم الأهلية أو الاستحالة، في أن يُعلَم عن حالته الصحية، والرعاية التي يحتاجها والمخاطر التي يتعرض لها، وذلك لاتخاذ القرارات بنفسه و/أو المشاركة في القرارات التي قد تكون لها عواقب على صحته.
                    </li>
                    <li data-aos="fade-right" data-aos-delay="700">
                        <strong>حالة القُصَّر والبالغين تحت الوصاية</strong><br>
                        تُمارس حقوق القُصَّر والبالغين تحت الوصاية، حسب الحالات، من قبل الوالدين أو الوصي.
                    </li>
                </ul>

                <h3 data-aos="fade-up" data-aos-delay="750">موافقة المريض</h3>
                <ul class="numbered-list">
                    <li data-aos="fade-right" data-aos-delay="800">
                        <strong>الموافقة الحرة والمستنيرة</strong><br>
                        لا يمكن ممارسة أي عمل طبي، أي علاج دون الموافقة الحرة والمستنيرة للمريض. يمكن سحب هذه الموافقة في أي وقت. يجب على الطبيب احترام إرادة الشخص، بعد إعلامه بعواقب خياراته.
                    </li>
                    <li data-aos="fade-right" data-aos-delay="850">
                        <strong>القُصَّر والبالغون تحت الوصاية</strong><br>
                        يجب البحث منهجياً عن موافقة القاصر أو البالغ تحت الوصاية إذا كان قادراً على التعبير عن إرادته والمشاركة في القرار.
                    </li>
                    <li data-aos="fade-right" data-aos-delay="900">
                        <strong>حالة الإستعجالات</strong><br>
                        ومع ذلك، في حالة الإستعجالات أو المرض المعدي وفي حالة تهديد حياة المريض بشكل خطير، يجب على مقدم الخدمة تقديم الرعاية وعند الحاجة تجاوز الموافقة.
                    </li>
                </ul>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="950">
                    <h3>حق المريض في الطعن</h3>
                    <p>كل مريض وكذلك أي شخص مخول لتمثيله يمكنه في حالة انتهاك الحقوق الاتصال بلجنة التوفيق والوساطة أو تقديم شكوى لدى الإدارة العامة للمؤسسة.</p>
                </div>
            </section>

            <!-- Section Votre Arrivée (VERSION ARABE COMPLÈTE) -->
            <section id="arrivee" class="charte-section" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title"><i class="fas fa-hospital-user"></i> وصولكم</h2>

                <div class="right-box" data-aos="fade-right" data-aos-delay="200">
                    <h3>الإجراءات عند الدخول</h3>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-check-circle"></i> قرار القبول يُتخذ من قبل طبيب المؤسسة العمومية الاستشفائية أو من قبل السلطة الإدارية/القضائية بناءً على طلب وبعد استشارة طبية</li>
                        <li><i class="fas fa-check-circle"></i> مكتب الدخول يدير جميع الإجراءات المتعلقة بإقامة المريض</li>
                        <li><i class="fas fa-check-circle"></i> طلب الاستشفاء يُحرر من قبل مصلحة الاستشفاء على النموذج المقدم من المؤسسة العمومية الاستشفائية</li>
                        <li><i class="fas fa-check-circle"></i> نشرة القبول تُسلم للمريض أو للوالدين من قبل مكتب الدخول عند تقديم نموذج الطلب</li>
                    </ul>
                </div>

                <div class="info-card" data-aos="fade-up" data-aos-delay="250">
                    <h3>الوثائق الضرورية</h3>
                    <p>لتسهيل عملية قبولكم، يرجى إحضار الوثائق التالية:</p>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-id-card"></i> وثيقة الهوية (بطاقة الهوية الوطنية، جواز السفر)</li>
                        <li><i class="fas fa-file"></i> بطاقة الضمان الاجتماعي (بطاقة الشفاء)، الصندوق الوطني للضمان الاجتماعي، صندوق الضمان الاجتماعي للعمال غير الأجراء أو الصندوق الوطني للتقاعد أو بطاقة الانتماء لخدمات التضامن الوطني</li>
                        <li><i class="fas fa-notes-medical"></i> نموذج طلب الاستشفاء (إن وجد)</li>
                        <li><i class="fas fa-file-prescription"></i> الوصفات الطبية والعلاجات الجارية</li>
                        <li><i class="fas fa-file-medical-alt"></i> نتائج الفحوصات الحديثة (التحاليل، الأشعة، ...إلخ)</li>
                    </ul>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="300">إجراء القبول الكامل</h3>
                <ul class="numbered-list">
                    <li data-aos="fade-left" data-aos-delay="350">
                        <strong>المعلومات الإدارية</strong><br>
                        نشرة القبول المُسلمة يجب أن تكون مصحوبة إجبارياً ببطاقة النقل وملخص الخروج السريري وملخص الخروج المعياري. المعلومات الإدارية الواردة في بطاقة النقل تُنسخ من قبل موظفي مكتب الدخول.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="400">
                        <strong>جهات الاتصال في الطوارئ</strong><br>
                        يجب على المتقدم، مريض أو والد المريض، إبلاغ المسؤول بأسماء وأرقام هواتف وعناوين الأشخاص المراد الاتصال بهم في حالة الطوارئ.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="450">
                        <strong>متابعة الأعمال الطبية</strong><br>
                        كل مقدم خدمة، طبي أو شبه طبي مُخوَّل، يسجل كل عمل يقوم به في المصلحة. ملء بطاقة النقل تحت مسؤولية المراقب الطبي لمصلحة الاستشفاء.
                    </li>
                </ul>

                <h3 data-aos="fade-up" data-aos-delay="500">طرق القبول</h3>
                <ol class="numbered-list">
                    <li data-aos="fade-left" data-aos-delay="550">
                        <strong>طلب القبول بناءً على طلب طبيب معالج خارج المؤسسة العمومية الاستشفائية</strong><br>
                        طلبات القبول الصادرة من طبيب معالج خارج المؤسسة العمومية الاستشفائية تُعالج على مستوى مصلحة الإستعجالات الطبية والجراحية. طبيب وحدة الفحص، بعد استشارة الطبيب الرئيس أو رئيس وحدة الاستشفاء، يوجه المريض إلى السكرتارية الطبية للمصلحة لإعداد وثائق الاستشفاء.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="600">
                        <strong>القبول بعد فحص في المصلحة</strong><br>
                        طبيب وحدة الفحص، بعد استشارة الطبيب الرئيس أو رئيس وحدة الاستشفاء، يوجه المريض إلى السكرتارية الطبية للمصلحة لإعداد وثائق الاستشفاء.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="650">
                        <strong>القبول المبرمج</strong><br>
                        تُسلم أو تُرسل دعوة للمريض، بعد موافقة رئيس المصلحة. يتوجه المريض إلى السكرتارية الطبية للمصلحة لإعداد وثائق الاستشفاء.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="700">
                        <strong>القبول بعد نقل من مصلحة أخرى</strong><br>
                        عندما يرى طبيب المؤسسة العمومية الاستشفائية أن حالة مريض في مصلحته تتطلب عناية من اختصاص آخر، يطلب رأي المصلحة المستقبلة. تبدأ الإجراءات الإدارية للنقل بين المصالح لدى مكتب الدخول بمجرد إعطاء الموافقة المكتوبة من المصلحة المستقبلة.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="750">
                        <strong>القبول بعد نقل من مؤسسة علاج أخرى</strong><br>
                        القبول في إطار الإخلاءات يخضع للقواعد الواردة في قسم الإخلاء.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="800">
                        <strong>قبول مرافق المريض</strong><br>
                        قبول مرافق المريض يُقرر من قبل الطبيب المعالج في المؤسسة العمومية الاستشفائية.
                    </li>
                </ol>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="850">
                    <h3>إذا وصلتم في حالة استعجالية</h3>
                    <p>لن تؤخر أي إجراءات دخولكم. في أسرع وقت ممكن، من المهم تسوية ملفكم، إما من قبل أحد أفراد محيطكم أو من قبلكم شخصياً.</p>
                </div>
            </section>

            <!-- Section Votre Séjour (VERSION ARABE COMPLÈTE) -->
            <section id="sejour" class="charte-section" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title"><i class="fas fa-bed"></i> إقامتكم</h2>
                <h3 data-aos="fade-up" data-aos-delay="200">فرق للاعتناء بكم</h3>
                <p data-aos="fade-up" data-aos-delay="250">طوال فترة إقامتكم، ستلتقون بمختلف المهنيين الصحيين. لمعرفتهم بشكل أفضل، إليكم مهامهم.</p>

                <div class="right-box" data-aos="fade-right" data-aos-delay="300">
                    <h3>الفريق الطبي</h3>
                    <p>يُوضع تحت مسؤولية طبيب رئيس مصلحة، يساعده أطباء أخصائيون وأطباء عامون. أحد أعضاء هذا الفريق سيعتني بكم بشكل خاص. سيعطيكم جميع المعلومات حول حالتكم الصحية أو حول الفحوصات والعلاجات الموصوفة. يمكنه استقبال عائلتكم بموعد.</p>
                </div>

                <div class="right-box" data-aos="fade-right" data-aos-delay="350">
                    <h3>الفريق شبه الطبي</h3>
                    <p>يتكون بشكل خاص من منسق، إطارات شبه طبية، ممرضين، مساعدي تمريض وعمال الخدمات الاستشفائية.</p>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-user-nurse"></i> <strong>إطار الصحة</strong> ينسق العناية المقدمة لكم. هو تحت تصرفكم لتلقي طلباتكم أو ملاحظاتكم.</li>
                        <li><i class="fas fa-stethoscope"></i> <strong>الممرض</strong> يقدم لكم العناية التي تتطلبها حالتكم الصحية ويطبق الوصفات الطبية.</li>
                        <li><i class="fas fa-hands-helping"></i> <strong>مساعد التمريض</strong> يساعد الممرض، يضمن نظافة غرفتكم ويسهر على راحتكم.</li>
                        <li><i class="fas fa-broom"></i> <strong>عامل الخدمات الاستشفائية</strong> ينجز صيانة المصالح.</li>
                    </ul>
                    <p>يمكنكم التعرف على جميع أعضاء الفريق المعالج بفضل الشارة التي يُذكر عليها اسمهم ووظيفتهم.</p>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="400">مهنيون آخرون</h3>
                <p data-aos="fade-up" data-aos-delay="450">مهنيو صحة آخرون يتعاونون أيضاً في العناية:</p>
                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="500"><i class="fas fa-utensils"></i> أخصائيوا التغذية</li>
                    <li data-aos="fade-left" data-aos-delay="550"><i class="fas fa-user-nurse"></i> ممرضون متخصصون</li>
                    <li data-aos="fade-left" data-aos-delay="600"><i class="fas fa-hand"></i> أخصائيوا العلاج الطبيعي</li>
                    <li data-aos="fade-left" data-aos-delay="650"><i class="fas fa-x-ray"></i> تقنيوا الأشعة الطبية</li>
                    <li data-aos="fade-left" data-aos-delay="700"><i class="fas fa-comments"></i> أخصائيوا النطق</li>
                    <li data-aos="fade-left" data-aos-delay="750"><i class="fas fa-brain"></i> أخصائيون نفسيون</li>
                    <li data-aos="fade-left" data-aos-delay="800"><i class="fas fa-flask"></i> المخبريون</li>
                </ul>

                <p data-aos="fade-up" data-aos-delay="850">مهنيون إداريون وتقنيون آخرون (كهربائيون، سباكون، بستانيون، طباخون...) يعملون أيضاً من أجل راحتكم.</p>

                <div class="info-card" data-aos="fade-up" data-aos-delay="900">
                    <h3>مكافحة العدوى المكتسبة في المستشفى</h3>
                    <p>العدوى المكتسبة في المستشفى هي عدوى يمكن اكتسابها أثناء الاستشفاء، ولكن تكرارها قليل لحسن الحظ. الوقاية من هذه العدوى هي انشغال جميع الأشخاص العاملين في المستشفى.</p>
                    <p>لجنة مكافحة العدوى المكتسبة في المستشفى والفريق التشغيلي للنظافة يطوران وينسقان الأعمال الهادفة إلى منع حدوث مثل هذه العدوى. إذا كنتم تريدون معلومات أكثر حول هذا الموضوع، لا تترددوا في التحدث مع طبيبكم أو الإطار الممرض للمصلحة.</p>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="950">الحياة اليومية في المصلحة</h3>

                <div class="right-box" data-aos="fade-right" data-aos-delay="1000">
                    <h3>الملابس والغسيل</h3>
                    <p>احرصوا لإقامتكم على ملابس مريحة (بيجاما، رداء، نعال منزلية، ...) بالإضافة إلى لوازم النظافة: منشفة وقفاز، صابون، فرشاة أسنان ومعجون أسنان.</p>
                    <p>غسيل السرير والطاولة مُوفر ومُنظف من قبل المستشفى.</p>
                    <p><strong>قدر الإمكان، لا تحضروا أشياء ثمينة.</strong></p>
                </div>

                <div class="right-box" data-aos="fade-right" data-aos-delay="1050">
                    <h3>النظافة</h3>
                    <p>دورة المياه جزء لا يتجزأ من عناية النظافة.</p>
                    <p>إذا كانت حالتكم الصحية تسمح، يمكنكم الذهاب لدورة المياه لوحدكم. في حالة الحاجة، سيقدم لكم الفريق المعالج المساعدة.</p>
                </div>

                <div class="right-box" data-aos="fade-right" data-aos-delay="1100">
                    <h3>الوجبات</h3>
                    <p>القوائم المُعدة من قبل فريق متعدد التخصصات تحترم التوصيات الغذائية. وجباتكم مُحضرة داخل المستشفى نفسه، مضمونة الجودة والنظافة الغذائية.</p>
                    <p>يمكنكم اختيار قائمتكم بمساعدة مساعد التمريض للمصلحة. حسب حالتكم الصحية والوصفات الطبية، يمكن وضع نظام غذائي شخصي.</p>
                    <p>مواعيد الوجبات عادة:</p>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-coffee"></i> الفطور: حوالي الساعة 8</li>
                        <li><i class="fas fa-hamburger"></i> الغداء: حوالي الساعة 12</li>
                        <li><i class="fas fa-utensils"></i> العشاء: حوالي الساعة 18:30</li>
                    </ul>
                </div>

                <div class="right-box" data-aos="fade-right" data-aos-delay="1150">
                    <h3>الأجهزة الاصطناعية</h3>
                    <p>ارتداء الأجهزة الاصطناعية (نظارات، عدسات، طقم أسنان أو سماعة...) يجب الإشارة إليه للفريق المعالج. فكروا في توفير المنتجات الضرورية لصيانتها. لتجنب مخاطر الفقدان، رتبوها بعناية.</p>
                </div>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="1200">
                    <h3>النظام والأمان</h3>
                    <p>من أجل راحة وأمان الجميع، يُطلب منكم:</p>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-smoking-ban"></i> عدم التدخين داخل المستشفى</li>
                        <li><i class="fas fa-volume-mute"></i> عدم إزعاج راحة المرضى الآخرين، نهاراً وليلاً</li>
                    </ul>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="1250">الاسترخاء والتسلية</h3>
                <p data-aos="fade-up" data-aos-delay="1300">يمكنكم إحضار جهاز الراديو الخاص بكم (السماعات موصى بها). من الممكن أيضاً التزود بجهاز تلفزيون في بعض المصالح.</p>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="1350">
                    <h3>الزيارات</h3>
                    <p>الزيارات مسموحة يومياً بين الساعة 13:30 و 15:00. لمزيد من المعلومات، اطلعوا على <a href="visite-ar.php">صفحتنا المخصصة للزيارات</a>.</p>
                </div>
            </section>

            <!-- Section Votre Sortie (VERSION ARABE COMPLÈTE) -->
            <section id="sortie" class="charte-section" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title"><i class="fas fa-door-open"></i> خروجكم</h2>

                <div class="right-box" data-aos="fade-right" data-aos-delay="200">
                    <h3>قرار الخروج</h3>
                    <p>يمكن أن يُقرر خروجكم من قبل طبيبكم المعالج أو من قبل أحد الوالدين ضد الرأي الطبي. الطبيب يوقع على الخروج في نشرة القبول وبطاقة النقل، ثم يُسلم الملف الإداري والطبي لمكتب القبول.</p>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="250">إجراء الخروج</h3>
                <ol class="numbered-list">
                    <li data-aos="fade-left" data-aos-delay="300">
                        <strong>المرور بمكتب الدخول</strong><br>
                        يجب أن تتوجهوا إلى شباك الخزينة حيث ستستردون ملفكم الطبي، بعد دفع مصاريف الاستشفاء. إذا كنتم معفيين من الدفع، يجب أن تقدموا بطاقة مُبررة (بطاقة المعوز أو المريض المزمن).
                    </li>
                    <li data-aos="fade-left" data-aos-delay="350">
                        <strong>الانتهاء الإداري</strong><br>
                        بطاقة النقل ستُنقل بعد ذلك إلى مكتب القبول حيث سيُسجل خروجكم الإداري.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="400">
                        <strong>الوثائق المتاحة</strong><br>
                        يمكنكم طلب شهادة حضور أثناء استشفائكم وشهادة إقامة عند خروجكم من المستشفى.
                    </li>
                </ol>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="450">
                    <h3>الخروج ضد الرأي الطبي</h3>
                    <p>إذا قررتم مغادرة المؤسسة ضد الرأي الطبي، يجب أن توقعوا على إبراء ذمة يُعفي المؤسسة والطبيب من أي مسؤولية حول العواقب التي يمكن أن تنتج عن هذا القرار.</p>
                </div>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="500">
                    <h3>في حالة الوفاة</h3>
                    <p>في حالة الوفاة في المستشفى، يُنقل الملف إلى مكتب القبول مع تقرير الوفاة. يمكن لأقارب المتوفى استرداد الوثائق التالية: تقرير الوفاة، شهادة عدم العدوى وإعلان الوفاة من مكتب القبول.</p>
                    <p>هذه الوثائق يجب تسليمها لبلدية الصبحة التي ستعلن الوفاة وتُسلم شهادة الوفاة، مما يسمح بسحب تصريح نقل الجثمان على مستوى بلدية الصبحة.</p>
                    <p>في حالة وفاة شخص من ولاية أخرى، يجب على الأقارب التنقل إلى مقر ولاية الشلف لاسترداد تصريح نقل الجثمان.</p>
                </div>
            </section>

            <!-- Section Vos Devoirs (VERSION ARABE COMPLÈTE) -->
            <section id="devoirs" class="charte-section" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title"><i class="fas fa-balance-scale"></i> واجباتكم</h2>

                <p data-aos="fade-up" data-aos-delay="150">كمريض، لديكم أيضاً واجبات تجاه المؤسسة والموظفين المعالجين والمرضى الآخرين:</p>

                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> احترام الموظفين المعالجين والإداريين والتقنيين</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> احترام المرضى الآخرين وهدوئهم</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i> احترام المكان والمعدات الموضوعة تحت تصرفكم</li>
                    <li data-aos="fade-left" data-aos-delay="350"><i class="fas fa-check-circle"></i> تقديم جميع المعلومات الضرورية للاعتناء بكم</li>
                    <li data-aos="fade-left" data-aos-delay="400"><i class="fas fa-check-circle"></i> اتباع الوصفات والعلاجات والتعليمات الطبية</li>
                    <li data-aos="fade-left" data-aos-delay="450"><i class="fas fa-check-circle"></i> احترام منع التدخين في حرم المؤسسة</li>
                    <li data-aos="fade-left" data-aos-delay="500"><i class="fas fa-check-circle"></i> تقليل الضوضاء واحترام ساعات الزيارة</li>
                </ul>
            </section>

            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3>رأيكم يهمنا</h3>
                <p>من أجل تحسين جودة خدماتنا باستمرار، لا تترددوا في إعلامنا بملاحظاتكم واقتراحاتكم.</p>
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