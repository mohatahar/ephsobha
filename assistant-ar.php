<?php
require_once 'header-ar.php';
?>

<main class="ia-assistant-page">
    <div class="container">
        <section class="page-header">
            <h2><i class="fas fa-robot"></i> المساعد الطبي الذكي</h2>
            <p class="subtitle">أداة لمساعدتك على فهم أعراضك ومخاوفك الصحية بشكل أفضل</p>
        </section>

        <section class="ia-info">
            <div class="info-card">
                <div class="card-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="card-content">
                    <h3>مهم</h3>
                    <p>هذا المساعد الذكي مصمم فقط لتقديم معلومات عامة ولا يحل محل الاستشارة الطبية بأي حال من الأحوال.
                        في حالة الطوارئ أو الأعراض الخطيرة، يرجى الاتصال بطبيب فوراً أو التوجه إلى مصلحة الإستعجالات.
                    </p>
                </div>
            </div>
        </section>

        <div class="ia-interface">
            <div class="chat-container">
                <div class="chat-messages" id="chatMessages">
                    <div class="message bot">
                        <div class="message-avatar">
                            <i class="fas fa-robot"></i>
                        </div>
                        <div class="message-content">
                            <p>مرحباً، أنا المساعد الذكي لـ <?php echo $hospital_name; ?>. يمكنني مساعدتك في فهم الأعراض
                                أو الحالات الطبية. ماذا يمكنني أن أفعل لك اليوم؟</p>
                            <p class="disclaimer">تذكير: أنا أقدم معلومات عامة فقط ولا أستبدل رأي الطبيب.</p>
                        </div>
                    </div>
                </div>

                <div class="chat-input">
                    <form id="chatForm">
                        <textarea id="userInput" placeholder="اوصف أعراضك أو اطرح سؤالاً..." required></textarea>
                        <button type="submit" id="sendBtn">
                            <i class="fas fa-paper-plane"></i> إرسال
                        </button>
                    </form>
                </div>
            </div>

            <div class="ia-sidebar">
                <div class="sidebar-section">
                    <h3>اقتراحات سريعة</h3>
                    <div class="quick-suggestions">
                        <button class="suggestion-btn" data-question="ما هي الأعراض الشائعة للإنفلونزا؟">أعراض
                            الإنفلونزا</button>
                        <button class="suggestion-btn" data-question="كيف يمكن الوقاية من أمراض القلب؟">الوقاية من أمراض
                            القلب</button>
                        <button class="suggestion-btn" data-question="متى يجب استشارة الطبيب للصداع؟">استشارة الطبيب
                            للصداع</button>
                        <button class="suggestion-btn" data-question="ما هي أعراض السكري؟">أعراض السكري</button>
                        <button class="suggestion-btn" data-question="ماذا أفعل في حالة الحمى العالية؟">التعامل مع
                            الحمى</button>
                        <button class="suggestion-btn" data-question="كيف أتعرف على رد الفعل التحسسي؟">التعرف على
                            الحساسية</button>
                    </div>
                </div>

                <div class="sidebar-section emergency-section">
                    <h3>خدمات الإستعجالات</h3>
                    <button class="emergency-btn" id="emergencyBtn">
                        <i class="fas fa-exclamation-triangle"></i> حالة استعجالية؟
                    </button>
                </div>

                <div class="sidebar-section">
                    <h3>مصادر مفيدة</h3>
                    <ul class="resources-list">
                        <li><a href="services.php"><i class="fas fa-clinic-medical"></i> خدماتنا الطبية</a></li>
                        <li><a href="contact.php"><i class="fas fa-calendar-check"></i> حجز موعد</a></li>
                        <li><a href="charte.php"><i class="fas fa-file-medical"></i> ميثاق المريض</a></li>
                        <li><a href="faq.php"><i class="fas fa-question-circle"></i> الأسئلة الشائعة</a></li>
                    </ul>
                </div>

                <div class="sidebar-section">
                    <h3>حدود المساعد</h3>
                    <p>هذا المساعد لا يستطيع:</p>
                    <ul class="limitations-list">
                        <li>تشخيص الأمراض</li>
                        <li>وصف الأدوية</li>
                        <li>استبدال الاستشارة الطبية</li>
                        <li>التعامل مع حالات الإستعجالات</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- نافذة منبثقة لحالات الطوارئ -->
        <div id="emergencyModal" class="modal">
            <div class="modal-content">
                <span class="close-modal">&times;</span>
                <h3><i class="fas fa-exclamation-triangle"></i> حالة استعجالية</h3>
                <div class="emergency-info">
                    <p>إذا كنت تعاني من أي من الأعراض التالية، يرجى الاتصال فوراً بخدمات الإستعجالات:</p>
                    <ul>
                        <li>صعوبات تنفس شديدة</li>
                        <li>ألم شديد في الصدر</li>
                        <li>فقدان الوعي</li>
                        <li>نزيف غزير لا يمكن السيطرة عليه</li>
                        <li>عجز عصبي مفاجئ (شلل، اضطرابات في الكلام)</li>
                        <li>حروق شديدة أو واسعة</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
    :root {
        --primary-color: #2c7bb6;
        --primary-light: #e6f7ff;
        --primary-dark: #1c5a87;
        --secondary-color: #3d5a80;
        --accent-color: #ee6c4d;
        --warning-color: #f4a261;
        --danger-color: #e76f51;
        --success-color: #2a9d8f;
        --light-gray: #f8f9fa;
        --med-gray: #e9ecef;
        --dark-gray: #6c757d;
        --text-color: #333;
        --shadow-sm: 0 2px 5px rgba(0, 0, 0, 0.1);
        --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.1);
        --shadow-lg: 0 8px 20px rgba(0, 0, 0, 0.15);
        --border-radius-sm: 5px;
        --border-radius-md: 10px;
        --border-radius-lg: 15px;
        --border-radius-xl: 25px;
    }

    /* إضافة دعم النص العربي */
    body {
        direction: rtl;
        text-align: right;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif, 'Arabic UI Text', 'Traditional Arabic';
    }

    .ia-assistant-page {
        padding: 40px 0;
        min-height: 80vh;
        color: var(--text-color);
    }

    .page-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .page-header h2 {
        color: var(--primary-color);
        margin-bottom: 10px;
        font-size: 2.5rem;
        font-weight: 700;
    }

    .page-header .subtitle {
        color: var(--secondary-color);
        font-size: 1.2rem;
    }

    .ia-info {
        margin-bottom: 30px;
    }

    .info-card {
        background-color: var(--light-gray);
        border-right: 5px solid var(--primary-color);
        border-left: none;
        border-radius: var(--border-radius-sm);
        padding: 20px;
        display: flex;
        align-items: flex-start;
        box-shadow: var(--shadow-sm);
    }

    .card-icon {
        font-size: 30px;
        color: var(--primary-color);
        margin-left: 20px;
        margin-right: 0;
    }

    .card-content h3 {
        margin-top: 0;
        color: var(--primary-color);
        font-weight: 600;
    }

    .ia-interface {
        display: flex;
        gap: 30px;
        flex-direction: row-reverse;
    }

    .chat-container {
        flex: 1;
        display: flex;
        flex-direction: column;
        height: 600px;
        background-color: white;
        border-radius: var(--border-radius-md);
        box-shadow: var(--shadow-md);
        overflow: hidden;
    }

    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 20px;
    }

    .message {
        display: flex;
        margin-bottom: 20px;
        opacity: 0;
        transform: translateY(20px);
        animation: messageIn 0.3s ease forwards;
    }

    .message-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 15px;
        margin-right: 0;
        flex-shrink: 0;
    }

    .user .message-avatar {
        background-color: var(--secondary-color);
    }

    .message-content {
        background-color: var(--light-gray);
        padding: 15px;
        border-radius: var(--border-radius-lg);
        border-top-right-radius: 0;
        max-width: 80%;
        box-shadow: var(--shadow-sm);
    }

    .user .message-content {
        background-color: var(--primary-light);
        border-top-right-radius: var(--border-radius-lg);
        border-top-left-radius: 0;
    }

    .message-content p {
        margin: 0;
        line-height: 1.5;
    }

    .message-content .disclaimer {
        font-size: 0.8rem;
        color: var(--dark-gray);
        margin-top: 8px;
        font-style: italic;
    }

    .chat-input {
        padding: 15px;
        border-top: 1px solid var(--med-gray);
        background-color: white;
    }

    #chatForm {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    #userInput {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--med-gray);
        border-radius: var(--border-radius-md);
        font-size: 16px;
        outline: none;
        transition: border-color 0.3s;
        resize: none;
        min-height: 60px;
        font-family: inherit;
        text-align: right;
        direction: rtl;
    }

    #userInput:focus {
        border-color: var(--primary-color);
    }

    #sendBtn {
        align-self: flex-start;
        padding: 10px 20px;
        border-radius: var(--border-radius-xl);
        background-color: var(--primary-color);
        color: white;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    #sendBtn:hover {
        background-color: var(--primary-dark);
    }

    .ia-sidebar {
        width: 320px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .sidebar-section {
        background-color: white;
        border-radius: var(--border-radius-md);
        padding: 20px;
        box-shadow: var(--shadow-md);
    }

    .sidebar-section h3 {
        color: var(--primary-color);
        margin-top: 0;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid var(--med-gray);
        font-weight: 600;
    }

    .quick-suggestions {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .suggestion-btn {
        padding: 10px 15px;
        background-color: var(--light-gray);
        border: 1px solid var(--med-gray);
        border-radius: var(--border-radius-xl);
        cursor: pointer;
        transition: all 0.3s;
        text-align: right;
        font-weight: 500;
    }

    .suggestion-btn:hover {
        background-color: var(--primary-light);
        border-color: var(--primary-color);
        transform: translateY(-2px);
    }

    .emergency-section {
        border-right: 4px solid var(--danger-color);
        border-left: none;
    }

    .emergency-btn {
        margin-top: 15px;
        padding: 12px;
        background-color: var(--danger-color);
        color: white;
        border: none;
        border-radius: var(--border-radius-md);
        width: 100%;
        cursor: pointer;
        transition: background-color 0.3s;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .emergency-btn:hover {
        background-color: #d45a41;
    }

    .resources-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .resources-list li {
        margin-bottom: 12px;
    }

    .resources-list a {
        color: var(--secondary-color);
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 8px 12px;
        border-radius: var(--border-radius-md);
        transition: background-color 0.3s;
    }

    .resources-list a:hover {
        background-color: var(--light-gray);
        color: var(--primary-color);
    }

    .resources-list i {
        margin-left: 10px;
        margin-right: 0;
        color: var(--primary-color);
    }

    .limitations-list {
        padding-right: 20px;
        padding-left: 0;
        margin: 10px 0 0;
        color: var(--dark-gray);
    }

    .limitations-list li {
        margin-bottom: 8px;
    }

    /* نافذة منبثقة لحالات الطوارئ */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow: auto;
    }

    .modal-content {
        background-color: white;
        margin: 10% auto;
        padding: 25px;
        border-radius: var(--border-radius-md);
        box-shadow: var(--shadow-lg);
        max-width: 600px;
        position: relative;
        direction: rtl;
        text-align: right;
    }

    .close-modal {
        position: absolute;
        top: 15px;
        left: 20px;
        font-size: 28px;
        cursor: pointer;
        color: var(--dark-gray);
    }

    .emergency-info p {
        font-size: 1.1rem;
        margin-bottom: 15px;
    }

    .emergency-info ul {
        margin-bottom: 25px;
        padding-right: 20px;
        padding-left: 0;
    }

    .emergency-info ul li {
        margin-bottom: 8px;
        color: var(--danger-color);
        font-weight: 500;
    }

    .emergency-contacts {
        display: flex;
        gap: 20px;
        margin-bottom: 25px;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background-color: var(--light-gray);
        border-radius: var(--border-radius-md);
        flex: 1;
    }

    .contact-item i {
        font-size: 24px;
        color: var(--danger-color);
    }

    .contact-item h4 {
        margin: 0 0 5px 0;
        font-size: 1rem;
    }

    .contact-item p {
        margin: 0;
        font-weight: 700;
        font-size: 1.1rem;
    }

    .call-now-btn {
        background-color: var(--danger-color);
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: var(--border-radius-md);
        font-size: 1.1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .call-now-btn:hover {
        background-color: #d45a41;
    }

    .modal h3 {
        color: var(--danger-color);
        margin-top: 0;
        margin-bottom: 20px;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .modal h3 i {
        font-size: 1.8rem;
    }

    /* رسوم متحركة لدخول الرسائل */
    @keyframes messageIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* نمط شريط التمرير */
    .chat-messages::-webkit-scrollbar {
        width: 6px;
    }

    .chat-messages::-webkit-scrollbar-track {
        background: var(--light-gray);
    }

    .chat-messages::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 3px;
    }

    .chat-messages::-webkit-scrollbar-thumb:hover {
        background: #a1a1a1;
    }

    /* مؤشر الكتابة */
    .typing-indicator {
        display: flex;
        padding: 15px;
        border-radius: var(--border-radius-lg);
        background-color: var(--light-gray);
        margin-bottom: 20px;
        width: fit-content;
    }

    .typing-indicator span {
        height: 8px;
        width: 8px;
        background-color: var(--primary-color);
        border-radius: 50%;
        display: inline-block;
        margin: 0 2px;
        opacity: 0.4;
    }

    .typing-indicator span:nth-child(1) {
        animation: typingAnimation 1s infinite 0s;
    }

    .typing-indicator span:nth-child(2) {
        animation: typingAnimation 1s infinite 0.2s;
    }

    .typing-indicator span:nth-child(3) {
        animation: typingAnimation 1s infinite 0.4s;
    }

    @keyframes typingAnimation {
        0% {
            opacity: 0.4;
            transform: scale(1);
        }

        50% {
            opacity: 1;
            transform: scale(1.2);
        }

        100% {
            opacity: 0.4;
            transform: scale(1);
        }
    }

    /* تصميم متجاوب */
    @media (max-width: 992px) {
        .ia-interface {
            flex-direction: column;
        }

        .ia-sidebar {
            width: 100%;
        }

        .chat-container {
            height: 500px;
        }

        .emergency-contacts {
            flex-direction: column;
            gap: 10px;
        }
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 20px;
        }

        .info-card {
            flex-direction: column;
        }

        .card-icon {
            margin-bottom: 15px;
        }

        .modal-content {
            margin: 5% 15px;
            padding: 20px;
        }
    }

    @media (max-width: 576px) {
        .page-header h2 {
            font-size: 2rem;
        }

        .chat-container {
            height: 400px;
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

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('chatForm');
    const input = document.getElementById('userInput');
    const messages = document.getElementById('chatMessages');
    const suggestions = document.querySelectorAll('.suggestion-btn');
    const emergencyBtn = document.getElementById('emergencyBtn');
    const emergencyModal = document.getElementById('emergencyModal');
    const closeModal = document.querySelector('.close-modal');
    const callBtn = document.getElementById('callNowBtn');

    // تعديل تلقائي لارتفاع النص
    input.addEventListener('input', function () {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    });

    // قاعدة البيانات الطبية المضغوطة
    const medDB = {
        conditions: {
            flu: {
                k: ['انفلونزا', 'زكام', 'حمى', 'آلام', 'برد', 'إنفلونزا', 'نزلة برد'],
                s: ['حمى عالية مفاجئة (38°+)', 'آلام الجسم والعضلات', 'تعب شديد', 'صداع شديد', 'سعال جاف', 'احتقان الأنف', 'ألم الحلق', 'قشعريرة'],
                r: ['الراحة التامة', 'شرب السوائل بكثرة', 'باراسيتامول للحمى', 'تجنب الاتصال مع الآخرين', 'استنشاق البخار', 'الغرغرة بالماء المالح'],
                w: ['استمرار الحمى +5 أيام', 'صعوبة التنفس', 'سعال بدم', 'علامات الجفاف', 'تفاقم الأعراض']
            },
            heart: {
                k: ['قلب', 'قلبي', 'جلطة', 'ضغط دم', 'صدر', 'ألم صدر', 'نبضات'],
                p: ['نظام غذائي متوازن', 'نشاط بدني منتظم', 'الإقلاع عن التدخين', 'إدارة التوتر', 'مراقبة ضغط الدم', 'وزن صحي'],
                w: ['ألم أو ضغط في الصدر', 'ألم ينتشر للفك/الذراع', 'ضيق التنفس', 'تعب شديد', 'خفقان القلب', 'دوخة مع تعرق بارد'],
                u: true
            },
            headache: {
                k: ['رأس', 'صداع', 'شقيقة', 'ألم رأس'],
                t: ['صداع التوتر', 'الشقيقة', 'الصداع العنقودي', 'الصداع الثانوي'],
                r: ['الراحة في مكان مظلم', 'شرب الماء', 'كمادات باردة', 'مسكنات', 'تجنب الضوضاء', 'تدليك الرقبة'],
                w: ['صداع مفاجئ وعنيف', 'صداع مع حمى وتيبس الرقبة', 'صداع بعد إصابة', 'اضطرابات الرؤية']
            },
            diabetes: {
                k: ['سكري', 'سكر', 'جلوكوز', 'عطش', 'تبول'],
                s: ['عطش مفرط', 'كثرة التبول', 'جوع شديد', 'فقدان وزن', 'تعب', 'ضبابية الرؤية', 'بطء شفاء الجروح'],
                m: ['مراقبة السكر', 'نظام غذائي مناسب', 'نشاط بدني', 'تناول الأدوية بانتظام', 'فحص القدمين', 'فحوصات دورية']
            },
            allergy: {
                k: ['حساسية', 'حساسي', 'تحسس', 'طفح', 'حكة', 'تورم', 'شرى'],
                s: ['طفح جلدي', 'حكة', 'تورم الشفاه/الحلق', 'احتقان أنفي', 'عيون حمراء', 'صعوبة التنفس', 'غثيان'],
                t: ['تجنب المسببات', 'مضادات الهيستامين', 'بخاخات الأنف', 'كريمات مهدئة'],
                e: ['صعوبة شديدة في التنفس', 'تورم سريع في الوجه', 'انخفاض ضغط الدم', 'فقدان الوعي'],
                u: true
            }
        },
        symptoms: {
            chest: {
                k: ['صدر', 'قفص صدري', 'ضلوع', 'ضغط صدر', 'وجع صدر'],
                c: ['مشاكل قلبية', 'مشاكل رئوية', 'مشاكل هضمية', 'مشاكل عضلية', 'القلق'],
                s: ['ألم شديد مفاجئ', 'ألم ينتشر للذراع', 'ضيق التنفس', 'غثيان وتعرق', 'دوخة'],
                a: ['التوقف عن النشاط', 'فك الملابس الضيقة', 'التنفس ببطء', 'طلب المساعدة الطبية'],
                u: true
            },
            breathing: {
                k: ['تنفس', 'نفس', 'هواء', 'خنقة', 'لهاث', 'ضيق نفس'],
                c: ['الربو', 'التهاب رئوي', 'جلطة رئوية', 'فشل القلب', 'القلق', 'رد فعل تحسسي'],
                s: ['عدم القدرة على التحدث', 'زرقة الشفاه', 'تنفس سريع جداً', 'ارتباك', 'ألم الصدر'],
                a: ['الجلوس مستقيماً', 'فتح النوافذ', 'فك الملابس', 'التنفس ببطء', 'استخدام بخاخ الربو'],
                u: true
            },
            stomach: {
                k: ['بطن', 'معدة', 'مغص', 'أمعاء', 'هضم', 'وجع بطن'],
                c: ['التهاب المعدة', 'التهاب الزائدة', 'حصوات', 'القولون العصبي', 'قرحة المعدة'],
                s: ['ألم شديد مفاجئ', 'حمى عالية', 'قيء دموي', 'براز أسود', 'بطن صلب'],
                r: ['راحة هضمية', 'شرب السوائل', 'تجنب الألبان', 'كمادات دافئة']
            },
            dizziness: {
                k: ['دوخة', 'دوار', 'عدم توازن', 'إغماء', 'دوران'],
                c: ['انخفاض ضغط الدم', 'مشاكل الأذن', 'انخفاض السكر', 'الجفاف', 'الأنيميا'],
                s: ['دوخة مع ألم الصدر', 'صعوبة الكلام', 'ضعف أحد الجانبين', 'صداع شديد', 'فقدان الرؤية'],
                a: ['الجلوس فوراً', 'رفع الأرجل', 'تجنب الحركة السريعة', 'شرب الماء', 'التنفس ببطء']
            }
        }
    };

    // وظائف مساعدة
    function addMsg(text, isUser = false) {
        const div = document.createElement('div');
        div.className = `message ${isUser ? 'user' : 'bot'}`;
        
        const avatar = document.createElement('div');
        avatar.className = 'message-avatar';
        avatar.innerHTML = `<i class="fas fa-${isUser ? 'user' : 'robot'}"></i>`;
        
        const content = document.createElement('div');
        content.className = 'message-content';
        
        if (!isUser) {
            text = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
            if (text.includes('<br>-')) {
                const parts = text.split('<br>-');
                text = parts.shift() + '<ul style="margin-top:10px;padding-right:20px;">' +
                       parts.map(item => `<li style="margin-bottom:5px;">${item.trim()}</li>`).join('') + '</ul>';
            }
        }
        
        const p = document.createElement('p');
        p.innerHTML = text;
        content.appendChild(p);
        
        if (!isUser) {
            const disclaimer = document.createElement('p');
            disclaimer.className = 'disclaimer';
            disclaimer.textContent = 'تذكير: معلومات عامة فقط، لا تستبدل استشارة الطبيب.';
            content.appendChild(disclaimer);
        }
        
        div.append(avatar, content);
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
    }

    function addTyping() {
        const div = document.createElement('div');
        div.className = 'message bot typing-message';
        div.innerHTML = `
            <div class="message-avatar"><i class="fas fa-robot"></i></div>
            <div class="typing-indicator"><span></span><span></span><span></span></div>
        `;
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
        return div;
    }

    function processQuery(query) {
        query = query.toLowerCase();
        
        // فحص الطوارئ
        const emergencyWords = ['طارئ', 'خطير', 'عاجل', 'إسعاف', 'موت', 'فاقد الوعي', 'لا يتنفس', 'نزيف شديد'];
        if (emergencyWords.some(w => query.includes(w))) {
            return {
                response: `**حالة طارئة محتملة.**<br><br>اتصل فوراً بالطوارئ على <strong>+213 27 71 91 97</strong> أو توجه لأقرب مستشفى.`,
                emergency: true
            };
        }

        // البحث في قاعدة البيانات
        for (const [cat, items] of Object.entries(medDB)) {
            for (const [key, data] of Object.entries(items)) {
                if (data.k.some(k => query.includes(k))) {
                    let response = `**بخصوص ${getArabicName(key)}:**<br><br>`;
                    
                    if (data.s) response += formatList('الأعراض:', data.s);
                    if (data.r) response += formatList('التوصيات:', data.r);
                    if (data.p) response += formatList('الوقاية:', data.p);
                    if (data.t && key === 'headache') response += formatList('الأنواع:', data.t);
                    if (data.t && key === 'allergy') response += formatList('العلاج:', data.t);
                    if (data.m) response += formatList('الإدارة:', data.m);
                    if (data.c) response += formatList('الأسباب المحتملة:', data.c);
                    if (data.a) response += formatList('الإجراءات الفورية:', data.a);
                    if (data.w) response += formatList('متى تستشير الطبيب:', data.w);
                    if (data.e) response += formatList('⚠️ علامات الطوارئ:', data.e);
                    
                    return { response, emergency: data.u || false };
                }
            }
        }

        return {
            response: `لم أستطع تحديد سؤالك بدقة.<br><br>يمكنك السؤال عن: الإنفلونزا، أمراض القلب، الصداع، السكري، الحساسية، آلام الصدر، صعوبة التنفس، آلام البطن، أو الدوخة.`,
            emergency: false
        };
    }

    function formatList(title, items) {
        return `**${title}**<br>` + items.map(item => `- ${item}`).join('<br>') + '<br><br>';
    }

    function getArabicName(key) {
        const names = {
            flu: 'الإنفلونزا', heart: 'أمراض القلب', headache: 'الصداع',
            diabetes: 'السكري', allergy: 'الحساسية', chest: 'ألم الصدر',
            breathing: 'صعوبة التنفس', stomach: 'ألم البطن', dizziness: 'الدوخة'
        };
        return names[key] || key;
    }

    // معالجة الأحداث
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const msg = input.value.trim();
        if (!msg) return;

        addMsg(msg, true);
        input.value = '';
        input.style.height = 'auto';

        const typing = addTyping();
        setTimeout(() => {
            typing.remove();
            const result = processQuery(msg);
            addMsg(result.response);
            if (result.emergency) {
                setTimeout(() => emergencyModal.style.display = 'block', 1000);
            }
        }, 1500);
    });

    suggestions.forEach(btn => {
        btn.addEventListener('click', function () {
            input.value = this.getAttribute('data-question');
            input.focus();
            input.dispatchEvent(new Event('input', { bubbles: true }));
        });
    });

    emergencyBtn.addEventListener('click', () => {
        emergencyModal.style.display = 'block';
    });

    closeModal.addEventListener('click', () => {
        emergencyModal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
        if (e.target === emergencyModal) {
            emergencyModal.style.display = 'none';
        }
    });

    callBtn.addEventListener('click', () => {
        alert('إعادة توجيه للمكالمة...\nفي الحالة الحقيقية، سيتم الاتصال بالطوارئ.');
    });
});
</script>

<?php
require_once 'footer-ar.php';
?>