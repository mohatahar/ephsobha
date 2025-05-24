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
    <title>مخبر التحاليل الطبية - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- Google Fonts Arabic -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
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
            font-family: 'Tajawal', sans-serif;
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/services/labo.jpg');
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
            background-color: #e6f7ff;
            border-right: 4px solid var(--secondary-color);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        /* Service de laboratoire spécifique */
        .lab-hours {
            background-color: #ebf9f2;
            border-right: 4px solid var(--success-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .lab-hours h3 {
            color: var(--success-color);
            margin-bottom: 15px;
        }

        .lab-hours p {
            margin-bottom: 10px;
        }
        
        .lab-card {
            background-color: #e7f5ff;
            border-right: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .lab-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .service-icon {
            font-size: 3rem;
            color: var(--success-color);
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

        /* Table styles for analysis types */
        .analysis-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .analysis-table th,
        .analysis-table td {
            padding: 12px 15px;
            text-align: right;
            border-bottom: 1px solid #ddd;
        }

        .analysis-table th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 500;
        }

        .analysis-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .analysis-table tr:hover {
            background-color: #e9ecef;
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

        .btn-success {
            background-color: var(--success-color);
            color: white;
        }

        .btn-success:hover {
            background-color: #146c43;
        }

        /* FAQ section */
        .faq-section {
            margin: 40px 0;
        }

        .faq-item {
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .faq-question {
            background-color: #f8f9fa;
            padding: 15px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }

        .faq-question:hover {
            background-color: #e9ecef;
        }

        .faq-question::after {
            content: '\f078';
            font-family: 'Font Awesome 5 Free';
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-question::after {
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

        /* Numbered list styles for Arabic */
        .guidelines-list.numbered {
            counter-reset: item;
        }

        .guidelines-list.numbered li {
            counter-increment: item;
            position: relative;
        }

        .guidelines-list.numbered li::before {
            content: counter(item, arabic-indic);
            background-color: var(--primary-color);
            color: white;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            font-weight: bold;
            margin-left: 10px;
            flex-shrink: 0;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }
            
            .service-list {
                grid-template-columns: 1fr;
            }

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

        /* Fix for Arabic text and icons alignment */
        .special-notice ul {
            margin-top: 10px;
            margin-right: 20px;
        }

        .mt-3 {
            margin-top: 1rem;
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
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">مخبر التحاليل الطبية</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">مخبر مخصص للتحاليل الطبية في خدمة التشخيص</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>مخبر التحاليل الطبية</h3>
                <p>يعتبر مخبر التحاليل الطبية بمستشفى الصبحة خدمة أساسية للتشخيص ومتابعة المرضى. مجهز بوسائل تقنية ويديره فريق من الفنيين المؤهلين تأهيلاً عالياً، يضمن مخبرنا إجراء تحاليل موثوقة ودقيقة في أقصر وقت ممكن. نحرص على تقديم نتائج عالية الجودة تساهم بفعالية في رحلة رعاية المرضى.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-flask"></i>
            </div>

            <!-- أوقات العمل والتوفر -->
            <section class="lab-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> أوقات العمل</h3>
                <p><strong>خدمة الإستعجالات:</strong> متوفرة على مدار 24 ساعة و7 أيام في الأسبوع للتحاليل العاجلة</p>
                <p><strong>استلام النتائج:</strong> في استقبال المخبر أو عبر الشبكة الداخلية من خلال الملف الإلكتروني للمريض</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">خدمات التحاليل لدينا</h2>
                <p>يقوم مخبرنا بإجراء مجموعة واسعة من التحاليل الطبية لتلبية الاحتياجات التشخيصية لمرضانا:</p>
                
                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-tint"></i>
                        <h4>أمراض الدم</h4>
                        <p>تعداد الدم الكامل، سرعة الترسيب، فصائل الدم، تخثر الدم</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-vial"></i>
                        <h4>الكيمياء الحيوية</h4>
                        <p>السكر في الدم، الدهون، وظائف الكلى والكبد، الأملاح</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-viruses"></i>
                        <h4>علم المناعة</h4>
                        <p>الأمصال المعدية، دلائل الأورام، المناعة الذاتية</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-bacteria"></i>
                        <h4>علم الأحياء الدقيقة</h4>
                        <p>زراعة البكتيريا، اختبار الحساسية، البحث عن الطفيليات</p>
                    </div>

                    <div class="service-item" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-dna"></i>
                        <h4>البيولوجيا الجزيئية</h4>
                        <p>تفاعل البلمرة المتسلسل، البحث عن مسببات الأمراض المحددة</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="350">
                        <i class="fas fa-pump-medical"></i>
                        <h4>علم الهرمونات</h4>
                        <p>الغدة الدرقية، الخصوبة، الكورتيزول، الهرمونات الجنسية</p>
                    </div>
                </div>
            </section>

            <section class="lab-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-clipboard-list"></i> أنواع التحاليل المطلوبة بكثرة</h3>
                <table class="analysis-table">
                    <thead>
                        <tr>
                            <th>نوع التحليل</th>
                            <th>الوصف</th>
                            <th>مدة ظهور النتيجة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-aos="fade-right" data-aos-delay="100">
                            <td>فحص الدم الشامل</td>
                            <td>تعداد الدم، السكر، الكرياتين، وظائف الكبد</td>
                            <td>نفس اليوم</td>
                        </tr>
                        <tr data-aos="fade-right" data-aos-delay="150">
                            <td>فحص الدهون</td>
                            <td>الكوليسترول الكلي، الجيد، السيء، الدهون الثلاثية</td>
                            <td>24 ساعة</td>
                        </tr>
                        <tr data-aos="fade-right" data-aos-delay="200">
                            <td>تخثر الدم</td>
                            <td>زمن البروثرومبين، زمن الثرومبوبلاستين، الفيبرينوجين</td>
                            <td>نفس اليوم</td>
                        </tr>
                        <tr data-aos="fade-right" data-aos-delay="250">
                            <td>البروتين التفاعلي</td>
                            <td>دلالة الالتهاب في الجسم</td>
                            <td>نفس اليوم</td>
                        </tr>
                        <tr data-aos="fade-right" data-aos-delay="300">
                            <td>الأمصال</td>
                            <td>التهاب الكبد، الإيدز، الحصبة الألمانية، داء المقوسات</td>
                            <td>48-72 ساعة</td>
                        </tr>
                        <tr data-aos="fade-right" data-aos-delay="350">
                            <td>فحص البول</td>
                            <td>الفحص الخلوي البكتيري للبول</td>
                            <td>48 ساعة</td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">معداتنا</h2>
                
                <p>مخبرنا مجهز بأجهزة تضمن تحاليل سريعة وموثوقة:</p>
                
                <ul class="guidelines-list">
                    <li data-aos="fade-right" data-aos-delay="100"><i class="fas fa-check-circle"></i> أجهزة تحليل الدم الآلية متعددة المعايير</li>
                    <li data-aos="fade-right" data-aos-delay="150"><i class="fas fa-check-circle"></i> محللات الكيمياء الحيوية عالية الإنتاجية</li>
                    <li data-aos="fade-right" data-aos-delay="200"><i class="fas fa-check-circle"></i> أنظمة التحليل المناعي بالتألق الكيميائي</li>
                    <li data-aos="fade-right" data-aos-delay="250"><i class="fas fa-check-circle"></i> معدات البيولوجيا الجزيئية (تفاعل البلمرة في الوقت الفعلي)</li>
                    <li data-aos="fade-right" data-aos-delay="300"><i class="fas fa-check-circle"></i> مجاهر ضوئية عالية الدقة</li>
                    <li data-aos="fade-right" data-aos-delay="350"><i class="fas fa-check-circle"></i> نظام معلوماتي لإدارة المخبر لمتابعة مثلى للتحاليل</li>
                </ul>
            </section>
            
            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>تحضيرات خاصة لبعض التحاليل</h3>
                <p>تتطلب بعض التحاليل تحضيراً خاصاً لضمان نتائج موثوقة:</p>
                <ul style="margin-top: 10px; margin-right: 20px;">
                    <li>السكر: يجب الصيام لمدة 8 ساعات على الأقل</li>
                    <li>فحص الدهون: يجب الصيام لمدة 12 ساعة</li>
                    <li>عينات البول: اتباع التعليمات المحددة المقدمة من المخبر</li>
                    <li>اختبارات تحمل الجلوكوز: احترام النظام الغذائي الطبيعي في الأيام السابقة للاختبار</li>
                    <li>قياس الهرمونات: بعضها يتطلب أخذ عينات في أوقات محددة</li>
                </ul>
                <p style="margin-top: 10px;">لأي سؤال حول التحضير لتحليل معين، لا تتردد في الاتصال بفريقنا.</p>
            </div>

            <section class="lab-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-procedures"></i> مسار المريض في المخبر</h3>
                <ol class="guidelines-list numbered">
                    <li data-aos="fade-right" data-aos-delay="100"><strong>الاستقبال والتسجيل:</strong> تقديم الوصفة الطبية والإجراءات الإدارية</li>
                    <li data-aos="fade-right" data-aos-delay="150"><strong>أخذ العينة:</strong> يتم بواسطة موظفين مؤهلين مع احترام قواعد النظافة والراحة</li>
                    <li data-aos="fade-right" data-aos-delay="200"><strong>التحليل:</strong> معالجة العينات بواسطة فريقنا التقني</li>
                    <li data-aos="fade-right" data-aos-delay="250"><strong>التصديق البيولوجي:</strong> مراقبة وتفسير النتائج بواسطة طبيب أحياء</li>
                    <li data-aos="fade-right" data-aos-delay="300"><strong>تسليم النتائج:</strong> في الموقع أو على الملف الإلكتروني للمريض</li>
                </ol>
            </section>

            <section class="faq-section" data-aos="fade-up" data-aos-delay="350">
                <h2 class="section-title">الأسئلة الشائعة</h2>
                
                <div class="faq-item">
                    <div class="faq-question">هل يجب حجز موعد لأخذ عينة دم؟</div>
                    <div class="faq-answer">
                        <p>لا، يتم أخذ عينات الدم بدون موعد من الأحد إلى الخميس من الساعة 8:00 إلى 11:00. ينصح بالحضور مبكراً لتجنب أوقات الانتظار.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">كيف أحصل على نتائج تحاليلي؟</div>
                    <div class="faq-answer">
                        <p>يمكنك استلام نتائجك مباشرة من استقبال المخبر بإظهار إيصالك. كما يمكن إرسالها مباشرة لطبيبك المعالج أو الاطلاع عليها عبر الشبكة الداخلية من خلال منصة الملف الإلكتروني للمريض.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">ما هي المدة للحصول على نتائجي؟</div>
                    <div class="faq-answer">
                        <p>تختلف المدة حسب نوع التحليل:</p>
                        <ul>
                            <li>التحاليل العادية: 24 ساعة</li>
                            <li>التحاليل المتخصصة: 48 إلى 72 ساعة</li>
                            <li>التحاليل العاجلة: النتائج متوفرة خلال ساعات</li>
                        </ul>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">هل يجب أن أحضر شيئاً عند قدومي للمخبر؟</div>
                    <div class="faq-answer">
                        <p>لزيارتك للمخبر، يرجى إحضار:</p>
                        <ul>
                            <li>الوصفة الطبية</li>
                            <li>بطاقة الهوية</li>
                            <li>بطاقة التأمين الصحي</li>
                            <li>أي وثيقة طبية ذات صلة (نتائج تحاليل سابقة، دفتر الصحة، إلخ)</li>
                        </ul>
                    </div>
                </div>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3 class="mt-3">لأي سؤال آخر حول خدمة المخبر لدينا:</h3>
                <a href="index.php#contact" class="btn btn-primary" data-aos="fade-up" data-aos-delay="250">اتصل بنا</a>
            </div>
        </div>
    </div>
    <!-- زر العودة للأعلى -->
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
        // Scripts pour les fonctionnalités interactives
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