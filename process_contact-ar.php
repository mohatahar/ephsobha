<?php
// Configuration
$admin_email = "contact.ephsobha@gmail.com"; // البريد الإلكتروني للمسؤول الذي سيستقبل الرسائل
$hospital_name = "المؤسسة العمومية الاستشفائية الصبحة";
$tagline = "في خدمة صحتكم";
$site_url = "https://ephsobha.onrender.com"; // رابط موقعكم
$send_confirmation = true; // خيار لتفعيل/إلغاء إرسال رسالة التأكيد

// تهيئة متغيرات الخطأ والنجاح
$error = "";
$success = "";

// التحقق من عرض الصفحة بعد إعادة التوجيه الناجحة
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    $success = true;
    $confirmation_sent = isset($_GET['confirmation']) && $_GET['confirmation'] == 'sent';
}

// التحقق من إرسال النموذج
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استقبال وتنظيف بيانات النموذج باستخدام طرق آمنة
    // استبدال FILTER_SANITIZE_STRING (المهجور) بـ htmlspecialchars
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8') : '';
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone']), ENT_QUOTES, 'UTF-8') : '';
    $subject = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject']), ENT_QUOTES, 'UTF-8') : '';
    $message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message']), ENT_QUOTES, 'UTF-8') : '';
    
    // استقبال خيار التأكيد (إذا كان موجوداً في النموذج)
    if (isset($_POST['send_confirmation'])) {
        $send_confirmation = filter_var($_POST['send_confirmation'], FILTER_VALIDATE_BOOLEAN);
    }
    
    // التحقق من البيانات
    if (empty($name)) {
        $error .= "الاسم مطلوب.<br>";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= "عنوان بريد إلكتروني صحيح مطلوب.<br>";
    }   
    
    if (empty($message)) {
        $error .= "الرسالة مطلوبة.<br>";
    }
    
    // إذا لم توجد أخطاء، إرسال الرسالة
    if (empty($error)) {
        // تحديد مؤشر خطأ البريد الإلكتروني افتراضياً
        $email_error = false;
        $email_sent = false;

        // الخيار الأول: استخدام PHPMailer (مُوصى به)
        // التحقق من تثبيت PHPMailer
        if (file_exists('vendor/autoload.php')) {
            require 'vendor/autoload.php';
            
            try {
                $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                
                // تكوين الخادم
                $mail->isSMTP();                                      // استخدام SMTP
                $mail->Host       = 'smtp.gmail.com';                 // خادم SMTP (غيّر حسب مزود الخدمة)
                $mail->SMTPAuth   = true;                             // تفعيل مصادقة SMTP
                $mail->Username   = 'contact.ephsobha@gmail.com';     // اسم مستخدم SMTP
                $mail->Password   = 'ljjf slnz avad ovnd';            // كلمة مرور SMTP (استخدم كلمة مرور التطبيق)
                $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS; // TLS أو SSL
                $mail->Port       = 465;                              // منفذ SMTP (465 لـ SSL، 587 لـ TLS)
                $mail->CharSet    = 'UTF-8';                          // تحديد ترميز الأحرف
                
                // تكوين محسن مضاد للرسائل المزعجة
                $mail->XMailer = ' ';                                 // إزالة تعريف المرسل
                $mail->Encoding = 'base64';                           // ترميز base64 لتجنب بعض المرشحات
                
                // المستقبلون
                $mail->setFrom('contact.ephsobha@gmail.com', $hospital_name); // المرسل المؤسسي، وليس بريد الزائر
                $mail->addAddress($admin_email);                      // إضافة مستقبل
                $mail->addReplyTo($email, $name);                     // عنوان الرد -> بريد الزائر
                
                // المحتوى
                $mail->isHTML(true);
                $subject_text = $subject;
                $mail->Subject = "[رسالة من الموقع] $subject_text";
                
                // نص الرسالة في HTML
                $htmlContent = "<h2>رسالة تواصل جديدة</h2>";
                $htmlContent .= "<p><strong>الاسم:</strong> $name</p>";
                $htmlContent .= "<p><strong>البريد الإلكتروني:</strong> $email</p>";
                if (!empty($phone)) {
                    $htmlContent .= "<p><strong>الهاتف:</strong> $phone</p>";
                }
                $htmlContent .= "<p><strong>الموضوع:</strong> $subject_text</p>";
                $htmlContent .= "<p><strong>الرسالة:</strong><br>" . nl2br($message) . "</p>";
                $htmlContent .= "<p>--<br>تم إرسال هذه الرسالة من نموذج التواصل في الموقع $site_url</p>";
                
                // نسخة نص بديلة
                $textContent = "الاسم: $name\n";
                $textContent .= "البريد الإلكتروني: $email\n";
                if (!empty($phone)) {
                    $textContent .= "الهاتف: $phone\n";
                }
                $textContent .= "الموضوع: $subject_text\n";
                $textContent .= "\nالرسالة:\n$message";
                $textContent .= "\n\n--\nتم إرسال هذه الرسالة من نموذج التواصل في الموقع $site_url";
                
                $mail->Body    = $htmlContent;
                $mail->AltBody = $textContent;
                
                $mail->send();
                // تم إرسال البريد بنجاح
                $email_sent = true;
                
                // نرسل بريد التأكيد فقط إذا كان الخيار مفعلاً
                if ($email_sent && $send_confirmation) {
                    $confirmationMail = new PHPMailer\PHPMailer\PHPMailer(true);
                    
                    // تكوين الخادم (نفس التكوين السابق)
                    $confirmationMail->isSMTP();
                    $confirmationMail->Host       = 'smtp.gmail.com';
                    $confirmationMail->SMTPAuth   = true;
                    $confirmationMail->Username   = 'contact.ephsobha@gmail.com';
                    $confirmationMail->Password   = 'ljjf slnz avad ovnd';
                    $confirmationMail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
                    $confirmationMail->Port       = 465;
                    $confirmationMail->CharSet    = 'UTF-8';
                    $confirmationMail->XMailer    = ' ';
                    $confirmationMail->Encoding   = 'base64';
                    
                    // المستقبلون (هذه المرة، نرسل للعميل)
                    $confirmationMail->setFrom('contact.ephsobha@gmail.com', 'مستشفى سوبحة العمومي');
                    $confirmationMail->addAddress($email, $name);
                    
                    // محتوى التأكيد
                    $confirmationMail->isHTML(true);
                    $confirmationMail->Subject = "تأكيد استلام رسالتك";
                    
                    // رسالة التأكيد في HTML أبسط
                    $confirmationHtml = "
                    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px; direction: rtl;'>
                        <h2 style='color: #333;'>تأكيد الاستلام</h2>
                        
                        <p>مرحباً <strong>$name</strong>،</p>
                        
                        <p>لقد استلمنا رسالتك بخصوص \"<strong>$subject_text</strong>\". سيتواصل معك فريقنا في أقرب وقت ممكن.</p>
                        
                        <p>ملخص:</p>
                        <ul>
                            <li><strong>الموضوع:</strong> $subject_text</li>
                            <li><strong>الرسالة:</strong> " . substr($message, 0, 100) . (strlen($message) > 100 ? "..." : "") . "</li>
                        </ul>
                        
                        <p>مع أطيب التحيات،<br>
                        <strong>$hospital_name</strong><br>
                        $tagline<br>
                        $site_url</p>
                    </div>";
                    
                    // نسخة نص بديلة
                    $confirmationText = "تأكيد الاستلام\n\n";
                    $confirmationText .= "مرحباً $name،\n\n";
                    $confirmationText .= "لقد استلمنا رسالتك بخصوص \"$subject_text\". سيتواصل معك فريقنا في أقرب وقت ممكن.\n\n";
                    $confirmationText .= "ملخص:\n";
                    $confirmationText .= "- الموضوع: $subject_text\n";
                    $confirmationText .= "- الرسالة: " . substr($message, 0, 100) . (strlen($message) > 100 ? "..." : "") . "\n\n";
                    $confirmationText .= "مع أطيب التحيات،\n";
                    $confirmationText .= "$hospital_name\n";
                    $confirmationText .= "$tagline\n";
                    $confirmationText .= "$site_url";
                    
                    $confirmationMail->Body    = $confirmationHtml;
                    $confirmationMail->AltBody = $confirmationText;
                    
                    $confirmationMail->send();
                    $confirmation_sent = true;
                }
            } catch (Exception $e) {
                // تسجيل الخطأ
                error_log("خطأ في إرسال البريد الإلكتروني: " . $mail->ErrorInfo);
                $email_error = true;
            }
        } else {
            // الخيار الثاني: استخدام mail() مع مزيد من التحكم في الأخطاء
            $to = $admin_email;
            $subject_text = $subject;
            $subject_email = "[رسالة من الموقع] $subject_text";
            
            // لتنسيق أفضل للبريد الإلكتروني
            $email_content = "<!DOCTYPE html>
            <html dir='rtl'>
            <head>
                <meta charset='UTF-8'>
                <title>رسالة تواصل جديدة</title>
            </head>
            <body>
                <h2>رسالة تواصل جديدة</h2>
                <p><strong>الاسم:</strong> $name</p>
                <p><strong>البريد الإلكتروني:</strong> $email</p>";
            
            if (!empty($phone)) {
                $email_content .= "<p><strong>الهاتف:</strong> $phone</p>";
            }
            
            $email_content .= "<p><strong>الموضوع:</strong> $subject_text</p>
                <p><strong>الرسالة:</strong><br>" . nl2br($message) . "</p>
                <p>--<br>تم إرسال هذه الرسالة من نموذج التواصل في الموقع $site_url</p>
            </body>
            </html>";
            
            // رؤوس لبريد HTML
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $headers .= "From: $hospital_name <contact.ephsobha@gmail.com>\r\n"; // استخدم عنوان المستشفى
            $headers .= "Reply-To: $email\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();
            
            // محاولة إرسال البريد دون إخفاء الأخطاء
            $email_sent = mail($to, $subject_email, $email_content, $headers);
            
            if (!$email_sent) {
                $email_error = true;
                // تسجيل الخطأ
                error_log("فشل في إرسال البريد عبر mail() - تحقق من تكوين خادمك.");
            }
            
            // إذا تم إرسال البريد بنجاح وخيار التأكيد مفعل
            if ($email_sent && $send_confirmation) {
                // تحضير بريد التأكيد
                $confirmation_to = $email;
                $confirmation_subject = "تأكيد استلام رسالتك";
                
                // رسالة التأكيد في HTML أبسط
                $confirmation_content = "<!DOCTYPE html>
                <html dir='rtl'>
                <head>
                    <meta charset='UTF-8'>
                    <title>تأكيد الاستلام</title>
                </head>
                <body>
                    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; padding: 20px;'>
                        <h2 style='color: #333;'>تأكيد الاستلام</h2>
                        
                        <p>مرحباً <strong>$name</strong>،</p>
                        
                        <p>لقد استلمنا رسالتك بخصوص \"<strong>$subject_text</strong>\". سيتواصل معك فريقنا في أقرب وقت ممكن.</p>
                        
                        <p>ملخص:</p>
                        <ul>
                            <li><strong>الموضوع:</strong> $subject_text</li>
                            <li><strong>الرسالة:</strong> " . substr($message, 0, 100) . (strlen($message) > 100 ? "..." : "") . "</li>
                        </ul>
                        
                        <p>مع أطيب التحيات،<br>
                        <strong>$hospital_name</strong><br>
                        $tagline<br>
                        $site_url</p>
                    </div>
                </body>
                </html>";
                
                // رؤوس لبريد التأكيد
                $confirmation_headers = "MIME-Version: 1.0\r\n";
                $confirmation_headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $confirmation_headers .= "From: $hospital_name <contact.ephsobha@gmail.com>\r\n";
                $confirmation_headers .= "X-Mailer: PHP/" . phpversion();
                
                // إرسال بريد التأكيد
                mail($confirmation_to, $confirmation_subject, $confirmation_content, $confirmation_headers);
                $confirmation_sent = true;
            }
        }

        // إذا تم إرسال البريد بنجاح
        if ($email_sent) {
            // إعادة التوجيه لتجنب الإرسالات المتعددة
            // تأكد من عدم إرسال أي محتوى قبل هذا السطر
            header("Location: process_contact-ar.php?status=success" . ($send_confirmation && $confirmation_sent ? "&confirmation=sent" : ""));
            exit;
        } else {
            $error = 'خطأ في إرسال رسالتك. يرجى المحاولة مرة أخرى.';
        }
    }
}

// انقل تضمين الرأس بعد منطق إعادة التوجيه
// لتجنب أخطاء "headers already sent"
include('header-ar.php');
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>معالجة الرسالة - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            line-height: 1.6;
            color: #333;
            overflow-x: hidden;
            direction: rtl;
            text-align: right;
        }

        /* عنوان الصفحة */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/contact.jpg');
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
            background: linear-gradient(to bottom left, transparent 49%, white 50%);
        }

        /* تنسيق القسم */
        .section {
            padding: 80px 0;
            position: relative;
            overflow: hidden;
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
            transition: width 0.5s ease;
        }

        .message-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            padding: 50px;
            margin: 20px auto;
            text-align: center;
            max-width: 800px;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .message-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }

        .message-icon {
            font-size: 5rem;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }

        .message-card:hover .message-icon {
            transform: scale(1.1);
        }

        .success-icon {
            color: #4caf50;
        }

        .error-icon {
            color: #f44336;
        }

        .message-title {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #2a5a86;
            font-weight: 600;
        }

        .message-text {
            margin-bottom: 30px;
            font-size: 1.1rem;
            color: #666;
            line-height: 1.8;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            font-weight: 500;
        }

        .btn:hover {
            background-color: #3d8b40;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }

        .btn i {
            margin-right: 8px;
        }

        /* حركة لظهور العناصر */
        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .fade-up.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* التجاوب */
        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 2.5rem;
            }
            
            .page-title p {
                font-size: 1.1rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .message-card {
                padding: 30px;
            }
            
            .message-icon {
                font-size: 4rem;
            }
            
            .message-title {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 576px) {
            .message-card {
                padding: 30px 20px;
            }
        }
        
        /* تنسيق زر العودة للأعلى */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #4caf50;
            color: white;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            background-color: #3d8b40;
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }

        /* تحسينات RTL */
        [dir="rtl"] .btn i {
            margin-right: 8px;
            margin-left: 0;
        }

        [dir="rtl"] .page-title::after {
            background: linear-gradient(to bottom right, transparent 49%, white 50%);
        }
    </style>
</head>

<body>
    <!-- قسم عنوان الصفحة -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">معالجة الرسالة</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">شكراً لتواصلكم معنا</p>
        </div>
    </section>

    <!-- قسم نتيجة الرسالة -->
    <section class="section">
        <div class="container">
            <div class="section-title" data-aos="fade-up" data-aos-duration="800">
                <h2>حالة رسالتك</h2>
                <p>نشكركم على الاهتمام الذي تبدونه لمؤسستنا</p>
            </div>
            
            <?php if ($success): ?>
                <div class="message-card" data-aos="fade-up" data-aos-duration="1000">
                    <div class="message-icon success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h2 class="message-title">تم إرسال الرسالة!</h2>
                    <p class="message-text">تم إرسال رسالتك بنجاح. سنتواصل معك قريباً.</p>
                    <?php if (isset($confirmation_sent) && $confirmation_sent): ?>
                    <p class="message-text">تم إرسال رسالة تأكيد إلى عنوان البريد الإلكتروني المحدد. إذا لم تجدها في صندوق الوارد، يرجى التحقق من مجلد الرسائل المزعجة.</p>
                    <?php endif; ?>
                    <a href="index-ar.php" class="btn"><i class="fas fa-home"></i> العودة للرئيسية</a>
                </div>
            <?php elseif (!empty($error)): ?>
                <div class="message-card" data-aos="fade-up" data-aos-duration="1000">
                    <div class="message-icon error-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <h2 class="message-title">خطأ</h2>
                    <p class="message-text"><?php echo $error; ?></p>
                    <a href="javascript:history.back()" class="btn"><i class="fas fa-arrow-right"></i> العودة للنموذج</a>
                </div>
            <?php else: ?>
                <div class="message-card" data-aos="fade-up" data-aos-duration="1000">
                    <div class="message-icon error-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h2 class="message-title">وصول غير صحيح</h2>
                    <p class="message-text">لقد وصلت إلى هذه الصفحة مباشرة. يرجى استخدام نموذج التواصل لإرسال رسالة إلينا.</p>
                    <a href="contact-ar.php#contact" class="btn"><i class="fas fa-paper-plane"></i> الذهاب لنموذج التواصل</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Bouton de retour en haut -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <!-- Script AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialiser AOS
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                once: false,
                mirror: false,
                offset: 120,
                easing: 'ease-out-back'
            });

            // Ajout d'effet de parallaxe au défilement
            window.addEventListener('scroll', function() {
                const scrolled = window.scrollY;
                const parallaxElements = document.querySelectorAll('.page-title');
                
                parallaxElements.forEach(element => {
                    const speed = 0.5;
                    element.style.backgroundPositionY = -(scrolled * speed) + 'px';
                });
            });
            
            // Script pour le bouton de retour en haut
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
        
        // Rafraîchir AOS lors du redimensionnement de la fenêtre
        window.addEventListener('resize', function() {
            AOS.refresh();
        });
    </script>
</body>

</html>

<?php include('footer-ar.php'); ?>