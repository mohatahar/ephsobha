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
    <title>مصلحة طب الأطفال - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;400;600;700&display=swap" rel="stylesheet">
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
            --pediatric-color: #FF9AA2; /* لون خاص بطب الأطفال */
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

        /* عنوان الصفحة */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('img/services/pediatrie.jpg');
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
            border-right: 4px solid var(--pediatric-color);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: #0066cc;
            margin-bottom: 10px;
        }

        /* خاص بطب الأطفال */
        .pediatric-hours {
            background-color: #fff0f5;
            border-right: 4px solid var(--pediatric-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .pediatric-hours h3 {
            color: #e83e8c;
            margin-bottom: 15px;
        }

        .pediatric-hours p {
            margin-bottom: 10px;
        }
        
        .pediatric-card {
            background-color: #f0f9ff;
            border-right: 4px solid var(--primary-color);
            padding: 20px;
            margin: 30px 0;
            border-radius: 5px;
        }

        .pediatric-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .service-icon {
            font-size: 3rem;
            color: var(--pediatric-color);
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
            color: var(--primary-color);
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .service-item h4 {
            color: var(--dark-color);
            margin-bottom: 10px;
        }

        /* دعوة للعمل */
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

        .btn-pediatric {
            background-color: var(--pediatric-color);
            color: white;
        }

        .btn-pediatric:hover {
            background-color: #ff7c86;
        }

        /* تصميم متجاوب */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }
            
            .service-list, .team-grid {
                grid-template-columns: 1fr;
            }
        }

        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        /* التأكد من عدم تجاوز المحتوى على الهواتف المحمولة */
        html,
        body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }

        /* نمط زر العودة إلى الأعلى */
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

        /* أنماط الأسئلة الشائعة */
        .faq-container {
            margin: 40px 0;
        }

        .faq-item {
            margin-bottom: 15px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            background-color: #f0f9ff;
            padding: 15px 20px;
            cursor: pointer;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-question:hover {
            background-color: #e1f5fe;
        }

        .faq-answer {
            padding: 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out, padding 0.3s ease;
            background-color: #fff;
        }

        .faq-answer-content {
            padding: 20px;
        }

        .faq-item.active .faq-answer {
            max-height: 500px;
            padding: 20px;
        }

        .faq-item i {
            transition: transform 0.3s;
        }

        .faq-item.active i {
            transform: rotate(180deg);
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

        /* تحسينات خاصة باللغة العربية */
        .special-notice ul, 
        .pediatric-card ul,
        .faq-answer-content ul,
        .faq-answer-content ol {
            margin-right: 20px;
            margin-top: 10px;
        }

        .faq-answer-content ol li,
        .special-notice ul li {
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <!-- قسم عنوان الصفحة -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">مصلحة طب الأطفال</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">رعاية طبية متخصصة ومتميزة للأطفال في المؤسسة العمومية الاستشفائية الصبحة</p>
        </div>
    </section>

    <!-- محتوى الصفحة -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>مصلحة طب الأطفال</h3>
                <p>مصلحة طب الأطفال في المؤسسة العمومية الاستشفائية الصبحة مخصصة لصحة ورفاهية الرضع والأطفال والمراهقين حتى سن 16 عاماً. فريقنا متعدد التخصصات من أطباء الأطفال والطاقم الطبي المتخصص يقدم رعاية شاملة ومخصصة في بيئة دافئة ومناسبة للاحتياجات الخاصة للمرضى الصغار. مهمتنا هي ضمان رعاية عالية الجودة مع الحفاظ على بيئة مطمئنة للأطفال وعائلاتهم.</p>
            </div>

            <div class="service-icon" data-aos="zoom-in" data-aos-delay="200">
                <i class="fas fa-baby"></i>
            </div>

            <!-- أوقات العمل والتوفر -->
            <section class="pediatric-hours" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="far fa-clock"></i> الاستشارات والزيارات</h3>
                <p><strong>الاستشفاء:</strong> المصلحة مفتوحة على مدار 24 ساعة و7 أيام في الأسبوع للأطفال الذين يحتاجون إلى مراقبة طبية</p>
                <p><strong>زيارة المرضى:</strong> يومياً من الساعة 13:30 إلى 15:00 (يمكن لأحد الوالدين البقاء مع الطفل خارج أوقات الزيارة)</p>
            </section>

            <section data-aos="fade-up" data-aos-delay="300">
                <h2 class="section-title">خدماتنا في مصلحة طب الأطفال</h2>
                <p>تقدم مصلحة طب الأطفال في المؤسسة العمومية الاستشفائية الصبحة مجموعة شاملة من الرعاية الطبية للأطفال:</p>
                
                <div class="service-list">
                    <div class="service-item" data-aos="fade-up" data-aos-delay="100">
                        <i class="fas fa-stethoscope"></i>
                        <h4>طب الأطفال العام</h4>
                        <p>الرعاية الطبية الوقائية والعلاجية لجميع الأمراض الشائعة في الطفولة</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="150">
                        <i class="fas fa-lungs"></i>
                        <h4>طب الرئة للأطفال</h4>
                        <p>علاج أمراض الجهاز التنفسي عند الأطفال (الربو، التهاب القصيبات، ...إلخ)</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="200">
                        <i class="fas fa-heartbeat"></i>
                        <h4>طب القلب للأطفال</h4>
                        <p>تشخيص ومتابعة أمراض القلب الخلقية والمكتسبة</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="250">
                        <i class="fas fa-weight"></i>
                        <h4>متابعة النمو</h4>
                        <p>مراقبة نمو وتطور الأطفال</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="300">
                        <i class="fas fa-syringe"></i>
                        <h4>التطعيمات</h4>
                        <p>إعطاء ومتابعة جدول التطعيمات</p>
                    </div>
                    
                    <div class="service-item" data-aos="fade-up" data-aos-delay="350">
                        <i class="fas fa-utensils"></i>
                        <h4>التغذية للأطفال</h4>
                        <p>نصائح غذائية مناسبة لكل عمر</p>
                    </div>
                </div>
            </section>

            <section class="pediatric-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-hospital-user"></i> نهجنا في الرعاية</h3>
                <p>في المؤسسة العمومية الاستشفائية الصبحة، نتبع نهجاً شاملاً في رعاية الأطفال:</p>
                <ul class="guidelines-list">
                    <li data-aos="fade-right" data-aos-delay="100"><i class="fas fa-check-circle"></i> <strong>رعاية محورها الأسرة</strong>: إشراك الوالدين في جميع القرارات المتعلقة بصحة طفلهم</li>
                    <li data-aos="fade-right" data-aos-delay="150"><i class="fas fa-check-circle"></i> <strong>بيئة مناسبة للأطفال</strong>: مساحات ملونة وممتعة لتقليل القلق</li>
                    <li data-aos="fade-right" data-aos-delay="200"><i class="fas fa-check-circle"></i> <strong>فريق متعدد التخصصات</strong>: تعاون بين أطباء الأطفال، الممرضين المتخصصين، علماء النفس وغيرهم من المختصين</li>
                    <li data-aos="fade-right" data-aos-delay="250"><i class="fas fa-check-circle"></i> <strong>التثقيف العلاجي</strong>: تدريب الوالدين والأطفال على إدارة الأمراض المزمنة</li>
                </ul>
            </section>

            <section data-aos="fade-up" data-aos-delay="400">
                <h2 class="section-title">المعدات والبنية التحتية</h2>
                
                <p>تتوفر مصلحة طب الأطفال لدينا على معدات مناسبة للاحتياجات الخاصة للأطفال:</p>
                
                <ul class="guidelines-list">
                    <li data-aos="fade-right" data-aos-delay="100"><i class="fas fa-check-circle"></i> غرف استشفاء مناسبة للأعمار المختلفة</li>
                    <li data-aos="fade-right" data-aos-delay="200"><i class="fas fa-check-circle"></i> معدات مراقبة خاصة بالأطفال</li>
                    <li data-aos="fade-right" data-aos-delay="250"><i class="fas fa-check-circle"></i> معدات الإنعاش للمواليد والأطفال</li>
                    <li data-aos="fade-right" data-aos-delay="300"><i class="fas fa-check-circle"></i> وحدة مراقبة مستمرة للحالات التي تتطلب يقظة متزايدة</li>
                </ul>
            </section>
            
            <div class="special-notice" data-aos="flip-up" data-aos-delay="250">
                <h3>متى تستشير طبيب الأطفال؟</h3>
                <p>بعض العلامات التي يجب أن تدفعك لاستشارة طبيب الأطفال بسرعة:</p>
                <ul style="margin-top: 10px; margin-right: 20px;">
                    <li>حمى عالية أو مستمرة (أكثر من 38.5 درجة مئوية)</li>
                    <li>الجفاف (قلة البول، جفاف الفم، عدم وجود دموع)</li>
                    <li>صعوبات في التنفس</li>
                    <li>تغيرات مهمة في سلوك الطفل</li>
                    <li>آلام بطنية شديدة أو مستمرة</li>
                    <li>طفح جلدي كبير</li>
                    <li>رفض الشرب أو الأكل لأكثر من 24 ساعة</li>
                </ul>
            </div>

            <!-- قسم الأسئلة الشائعة -->
            <section class="faq-container" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title">الأسئلة الشائعة</h2>
                
                <div class="faq-item">
                    <div class="faq-question">
                        كيف أحضر طفلي للاستشفاء؟ <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>لتحضير طفلك للاستشفاء:</p>
                            <ul>
                                <li>اشرح له ببساطة لماذا يجب أن يذهب إلى المستشفى</li>
                                <li>أحضر لعبته أو دميته المفضلة</li>
                                <li>حضر ملابس مريحة</li>
                                <li>ابق هادئاً ومطمئناً</li>
                                <li>لا تتردد في طرح جميع أسئلتك على الطاقم الطبي</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        هل يمكنني البقاء مع طفلي أثناء الاستشفاء؟ <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>نعم، يمكن لأحد الوالدين البقاء مع الطفل على مدار 24 ساعة. هذا الحضور مهم لرفاهية وشفاء طفلك.</p>
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        كيف تتم الاستشارة الطبية للأطفال؟ <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>الاستشارة الطبية النموذجية للأطفال تشمل:</p>
                            <ol>
                                <li>مقابلة مع الوالدين حول التاريخ الطبي والمخاوف الحالية</li>
                                <li>فحص جسدي شامل للطفل</li>
                                <li>التحقق من معايير النمو (الوزن، الطول، محيط الرأس)</li>
                                <li>مناقشة التطور النفسي الحركي</li>
                                <li>توصيات وإذا لزم الأمر، وصف علاجات أو فحوصات إضافية</li>
                            </ol>
                        </div>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        ما هي الوثائق التي يجب إحضارها للاستشارة؟ <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <div class="faq-answer-content">
                            <p>للاستشارة الطبية للأطفال، يرجى إحضار:</p>
                            <ul>
                                <li>الدفتر الصحي الخاص بالطفل</li>
                                <li>بطاقة الهوية أو شهادة الميلاد</li>
                                <li>وثائق التأمين الصحي</li>
                                <li>نتائج الفحوصات الطبية السابقة</li>
                                <li>قائمة الأدوية التي يتناولها طفلك حالياً</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="pediatric-card" data-aos="fade-up" data-aos-delay="300">
                <h3><i class="fas fa-info-circle"></i> نصائح الوقاية</h3>
                <p>للحفاظ على صحة طفلك:</p>
                <ul class="guidelines-list">
                    <li data-aos="zoom-in" data-aos-delay="100"><i class="fas fa-check-circle"></i> احترام جدول التطعيمات</li>
                    <li data-aos="zoom-in" data-aos-delay="150"><i class="fas fa-check-circle"></i> الحرص على تغذية متوازنة ومناسبة لعمره</li>
                    <li data-aos="zoom-in" data-aos-delay="200"><i class="fas fa-check-circle"></i> التأكد من نومه الكافي</li>
                    <li data-aos="zoom-in" data-aos-delay="250"><i class="fas fa-check-circle"></i> تشجيع النشاط البدني المنتظم</li>
                    <li data-aos="zoom-in" data-aos-delay="300"><i class="fas fa-check-circle"></i> تحديد وقت الشاشات</li>
                </ul>
            </section>
            
            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3 class="mt-3">لأي سؤال آخر بخصوص مصلحة طب الأطفال:</h3>
                <a href="index.php#contact" class="btn btn-primary" data-aos="fade-up" data-aos-delay="250">اتصل بنا</a>
            </div>
        </div>
    </div>
    <!-- زر العودة إلى الأعلى -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>
    
    <!-- jQuery (لتبسيط التفاعل) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script>
        // سكريبت زر العودة إلى الأعلى
        document.addEventListener('DOMContentLoaded', function () {
            const backToTopButton = document.getElementById('back-to-top');

            // وظيفة لإظهار أو إخفاء الزر حسب التمرير
            function toggleBackToTopButton() {
                if (window.scrollY > 300) {
                    backToTopButton.classList.add('visible');
                } else {
                    backToTopButton.classList.remove('visible');
                }
            }

            // إضافة مستمع حدث للتمرير
            window.addEventListener('scroll', toggleBackToTopButton);

            // إضافة تأثير التمرير السلس عند النقر على الزر
            backToTopButton.addEventListener('click', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
            
            // سكريبت الأكورديون للأسئلة الشائعة
            const faqQuestions = document.querySelectorAll('.faq-question');
            
            faqQuestions.forEach(question => {
                question.addEventListener('click', function() {
                    // تبديل الفئة النشطة على العنصر الأب
                    const faqItem = this.parentElement;
                    faqItem.classList.toggle('active');
                });
            });
        });
    </script>
    
    <!-- AOS JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // تهيئة AOS
        AOS.init({
            once: false,       // يمكن تكرار الرسوم المتحركة
            mirror: false,     // الرسوم المتحركة تحدث مرة واحدة فقط
            offset: 120,       // الإزاحة (بالبكسل) من نقطة التشغيل الأصلية
            easing: 'ease-out-back' // نوع تأثير الرسوم المتحركة
        });
    </script>
</body>
</html>

<?php include('footer-ar.php'); ?>