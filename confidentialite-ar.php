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
    <title>سياسة الخصوصية - EPH SOBHA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Ajout de la bibliothèque AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* إعدادات اللغة العربية */
        body {
            font-family: 'Arial', 'Tahoma', sans-serif;
            direction: rtl;
            text-align: right;
        }

        /* Page Title */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/confident.jpg');
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

        .section {
            padding: 0px 0;
        }
        
        /* تحسين أنماط الأقسام */
        .privacy-section {
            padding: 25px;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            background-color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-align: right;
        }

        .privacy-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .privacy-section h3 {
            color: #0056b3;
            margin-bottom: 15px;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
            text-align: right;
        }

        .privacy-section ul {
            text-align: right;
            padding-right: 20px;
        }

        .privacy-section li {
            margin-bottom: 8px;
            line-height: 1.6;
        }

        .contact-details {
            padding: 15px;
            background-color: #f8f9fa;
            border-right: 4px solid #0056b3;
            border-left: none;
            border-radius: 4px;
            text-align: right;
        }

        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        /* التأكد من عدم تجاوز المحتوى على الهاتف المحمول */
        html,
        body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100%;
        }

        /* تحسين النصوص العربية */
        p, li {
            line-height: 1.8;
            font-size: 16px;
        }

        strong {
            font-weight: bold;
        }

        /* تحسين الاستجابة للشاشات الصغيرة */
        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.2rem;
            }
            
            .privacy-section {
                padding: 20px;
            }
        }

        @media (max-width: 576px) {
            .page-title {
                padding: 80px 20px;
            }

            .page-title p {
                font-size: 1.1rem;
            }
            
            .privacy-section {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- عنوان الصفحة -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">سياسة الخصوصية</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">اكتشف كيف تقوم المؤسسة العمومية الإستشفائية الصبحة بجمع واستخدام وحماية بياناتك الشخصية</p>
        </div>
    </section>

    <!-- قسم سياسة الخصوصية -->
    <section class="section" id="politique-confidentialite">
        <div class="container">
            <div class="privacy-content">
                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800">
                    <h3>مقدمة</h3>
                    <p>تلتزم المؤسسة العمومية الاستشفائية الصبحة بحماية خصوصية البيانات الشخصية لمرضاها وزوار موقعها الإلكتروني. توضح سياسة الخصوصية هذه كيفية جمع واستخدام ومشاركة وحماية معلوماتك الشخصية وفقاً للتشريع الجزائري لحماية البيانات.</p>
                    <p>باستخدام موقعنا الإلكتروني أو الاستفادة من خدماتنا، فإنك توافق على الممارسات الموضحة في سياسة الخصوصية هذه.</p>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <h3>المعلومات التي نجمعها</h3>
                    <p>قد نجمع الأنواع التالية من المعلومات:</p>
                    <ul>
                        <li><strong>معلومات التعريف الشخصية</strong>: الاسم، اللقب، العنوان البريدي، عنوان البريد الإلكتروني، رقم الهاتف.</li>
                        <li><strong>المعلومات الطبية</strong>: التاريخ الطبي، التشخيصات، العلاجات، نتائج التحاليل وغيرها من المعلومات المتعلقة بصحتك اللازمة لرعايتك.</li>
                        <li><strong>معلومات التصفح</strong>: عنوان IP، نوع المتصفح، الصفحات المزارة، تاريخ ووقت الزيارات، وبيانات تقنية أخرى يتم جمعها تلقائياً أثناء تصفحك لموقعنا.</li>
                        <li><strong>معلومات نموذج الاتصال</strong>: البيانات التي تقدمها لنا عند ملء نموذج الاتصال الخاص بنا.</li>
                    </ul>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <h3>كيف نستخدم معلوماتك</h3>
                    <p>نستخدم المعلومات المجمعة من أجل:</p>
                    <ul>
                        <li>ضمان رعايتك الطبية والإدارية.</li>
                        <li>الرد على استفساراتك.</li>
                        <li>تحسين خدماتنا وتجربة المستخدم على موقعنا الإلكتروني.</li>
                        <li>إرسال معلومات مهمة إليك بخصوص خدماتنا والتغييرات على شروطنا وسياساتنا.</li>
                        <li>الامتثال للالتزامات القانونية والتنظيمية.</li>
                    </ul>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <h3>مشاركة المعلومات</h3>
                    <p>لا نبيع أو نتبادل أو ننقل معلوماتك الشخصية إلى أطراف ثالثة دون موافقتك، باستثناء الحالات التالية:</p>
                    <ul>
                        <li><strong>الطاقم الطبي</strong>: قد تتم مشاركة معلوماتك مع المهنيين الصحيين المشاركين في رعايتك.</li>
                        <li><strong>مقدمو الخدمات</strong>: قد نستعين بشركات خارجية لمساعدتنا في تشغيل موقعنا أو إدارة أنشطتنا أو تقديم خدمات لك. هذه الشركات لديها وصول فقط للمعلومات الشخصية اللازمة لأداء مهامها وتتعهد بعدم الكشف عنها أو استخدامها لأغراض أخرى.</li>
                        <li><strong>الامتثال القانوني</strong>: قد نكشف عن معلوماتك الشخصية إذا كان القانون يتطلب ذلك أو استجابة لطلبات مشروعة من السلطات العامة.</li>
                    </ul>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <h3>أمان البيانات</h3>
                    <p>نطبق تدابير أمنية تقنية وتنظيمية مناسبة لحماية معلوماتك الشخصية من الفقدان والوصول غير المصرح به والكشف والتعديل والتدمير. ومع ذلك، لا توجد طريقة نقل عبر الإنترنت أو تخزين إلكتروني آمنة بنسبة 100%، ولا يمكننا ضمان الأمان المطلق.</p>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800">
                    <h3>الاحتفاظ بالبيانات</h3>
                    <p>نحتفظ بمعلوماتك الشخصية طالما كان ذلك ضرورياً لتحقيق الأهداف التي جُمعت من أجلها، وفقاً لالتزاماتنا القانونية والتنظيمية، خاصة فيما يتعلق بالملفات الطبية.</p>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <h3>الكوكيز والتقنيات المماثلة</h3>
                    <p>يستخدم موقعنا الإلكتروني الكوكيز والتقنيات المماثلة لتحسين تجربة التصفح الخاصة بك. تتيح لنا هذه التقنيات التعرف على متصفحك وجمع معلومات مثل عنوان IP الخاص بك والصفحات التي تزورها والوقت المقضي في هذه الصفحات والروابط التي تنقر عليها.</p>
                    <p>يمكنك تكوين متصفحك لرفض جميع الكوكيز أو للتنبيه عند إرسال كوكي. ومع ذلك، قد لا تعمل بعض ميزات الموقع بشكل صحيح إذا قمت بتعطيل الكوكيز.</p>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
                    <h3>حقوقك</h3>
                    <p>وفقاً للتشريع المعمول به، لديك الحقوق التالية فيما يتعلق ببياناتك الشخصية:</p>
                    <ul>
                        <li>الحق في الوصول إلى بياناتك الشخصية.</li>
                        <li>الحق في تصحيح البيانات غير الصحيحة.</li>
                        <li>الحق في محو بياناتك في ظروف معينة.</li>
                        <li>الحق في تقييد المعالجة في ظروف معينة.</li>
                        <li>الحق في الاعتراض على المعالجة لأسباب تتعلق بوضعك الخاص.</li>
                        <li>الحق في قابلية نقل بياناتك في ظروف معينة.</li>
                    </ul>
                    <p>لممارسة هذه الحقوق، يرجى الاتصال بنا على العنوان المقدم أدناه.</p>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800">
                    <h3>تعديلات على سياسة الخصوصية الخاصة بنا</h3>
                    <p>قد نعدل سياسة الخصوصية هذه من وقت لآخر. سيتم الإشارة إلى تاريخ آخر تحديث في أسفل هذه الصفحة. نشجعك على مراجعة هذه السياسة بانتظام للبقاء على اطلاع على كيفية حمايتنا لمعلوماتك.</p>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100">
                    <h3>الاتصال</h3>
                    <p>إذا كان لديك أسئلة حول سياسة الخصوصية هذه أو ممارساتنا في مجال حماية البيانات، يرجى الاتصال بنا:</p>
                    <div class="contact-details" data-aos="zoom-in" data-aos-duration="600" data-aos-delay="300">
                        <p><strong>المؤسسة العمومية الإستشفائية الصبحة</strong><br>
                            بلدية الصبحة، ولاية الشلف، الجزائر<br>
                            الهاتف: 97 91 71 27 213+<br>
                            البريد الإلكتروني: contact.ephsobha@gmail.com</p>
                    </div>
                </div>

                <div class="privacy-section" data-aos="fade-up" data-aos-duration="800">
                    <h3>تاريخ آخر تحديث</h3>
                    <p>تم تحديث سياسة الخصوصية هذه في 24 ماي 2025.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- زر العودة إلى الأعلى -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>
    
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

            // إضافة تأثير التمرير السلس عند النقر على الزر
            backToTopButton.addEventListener('click', function () {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // الاستماع لحدث التمرير لإظهار/إخفاء الزر
            window.addEventListener('scroll', toggleBackToTopButton);

            // فحص موضع التمرير عند تحميل الصفحة
            toggleBackToTopButton();
        });
    </script>

    <!-- إضافة سكريبت AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // تهيئة مكتبة AOS
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                once: false,
                mirror: false,        // الحركة تحدث مرة واحدة فقط
                offset: 120,        // الإزاحة (بالبكسل) من نقطة التفعيل الأصلية
                easing: 'ease-out-back' // نوع تأثير الحركة
            });
        });
    </script>
</body>

</html>

<?php include('footer-ar.php'); ?>