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
    <title>الأسئلة الشائعة - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Intégration de la bibliothèque AOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Arabic Font Support */
        body {
            font-family: 'Segoe UI', 'Tahoma', 'Arial', sans-serif;
            direction: rtl;
            text-align: right;
        }

        /* Page Title */
        .page-title {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/faq.jpeg');
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

        /* Styles spécifiques pour la page FAQ */
        .faq-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        .faq-item {
            margin-bottom: 25px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 20px;
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 5px;
            transition: all 0.3s ease;
            direction: rtl;
        }

        .faq-question:hover {
            background-color: #e9ecef;
        }

        .faq-question h3 {
            margin: 0;
            font-size: 1.1rem;
            color: #1a5276;
            text-align: right;
            flex: 1;
        }

        .faq-answer {
            display: none;
            padding: 15px;
            line-height: 1.8;
            text-align: right;
            direction: rtl;
        }

        .faq-answer.show {
            display: block;
            animation: fadeIn 0.5s ease-in-out;
        }

        .faq-toggle {
            font-size: 1.2rem;
            color: #1a5276;
            transition: transform 0.3s ease;
            order: -1;
            margin-left: 15px;
        }

        .faq-question.active .faq-toggle {
            transform: rotate(180deg);
        }

        .faq-categories {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
            justify-content: center;
        }

        .faq-category {
            padding: 8px 15px;
            background-color: #e9ecef;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .faq-category:hover,
        .faq-category.active {
            background-color: #1a5276;
            color: white;
        }

        .faq-search {
            width: 100%;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin-bottom: 30px;
            font-size: 1rem;
            text-align: right;
            direction: rtl;
        }

        .faq-intro {
            text-align: center;
            margin-bottom: 30px;
        }

        .faq-intro h2 {
            color: #1a5276;
            margin-bottom: 10px;
        }

        .faq-intro p {
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }

        .faq-contact {
            text-align: center;
            margin-top: 50px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        /* RTL specific adjustments */
        .faq-answer ul {
            text-align: right;
            padding-right: 20px;
            padding-left: 0;
        }

        .faq-answer li {
            margin-bottom: 8px;
        }

        .btn {
            font-family: inherit;
        }

        /* Icon adjustments for RTL */
        .fas.fa-phone,
        .fas.fa-envelope {
            margin-left: 8px;
            margin-right: 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Animation supplémentaire pour le titre */
        .highlight-text {
            position: relative;
            display: inline-block;
        }

        .highlight-text::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 3px;
            bottom: -5px;
            left: 0;
            background-color: #fff;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.5s ease-out;
        }

        .highlight-text.active::after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        @media (max-width: 768px) {
            .faq-categories {
                flex-direction: column;
                gap: 5px;
            }

            .faq-category {
                text-align: center;
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
    </style>
</head>

<body>
    <!-- Page Title -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">الأسئلة الشائعة</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">اعثر على إجابات للأسئلة الأكثر شيوعاً حول خدماتنا وإجراءاتنا وسياساتنا</p>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="section" id="faq">
        <div class="container">
            <div class="faq-container">
                <!-- Barre de recherche -->
                <input type="text" class="faq-search" id="faqSearch" placeholder="البحث عن سؤال..."
                    data-aos="fade-in" data-aos-duration="800">

                <!-- Catégories de FAQ -->
                <div class="faq-categories" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">
                    <div class="faq-category active" data-category="all">جميع الأسئلة</div>
                    <div class="faq-category" data-category="admission">الدخول والإقامة</div>
                    <div class="faq-category" data-category="services">الخدمات والرعاية</div>
                    <div class="faq-category" data-category="visites">الزيارات والمرافقة</div>
                    <div class="faq-category" data-category="administratif">الإجراءات الإدارية</div>
                </div>

                <!-- Liste des questions -->
                <div class="faq-list">
                    <!-- Admission & Séjour -->
                    <div class="faq-item" data-category="admission" data-aos="fade-up" data-aos-delay="100"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>كيف تتم عملية الدخول إلى المؤسسة العمومية الإستشفائية الصبحة ؟</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>للدخول المبرمج، يرجى التوجه إلى مكتب الدخول مع الوثائق التالية:</p>
                            <ul>
                                <li>بطاقة الهوية الوطنية</li>
                                <li>بطاقة الشفاء (الضمان الاجتماعي) أو تأمين آخر</li>
                            </ul>
                            <p>مكتب الدخول مفتوح 24 ساعة طوال أيام الأسبوع.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-category="admission" data-aos="fade-up" data-aos-delay="200"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>ما هي الأشياء التي يجب أن أحضرها عند دخول المستشفى؟</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>لراحتكم أثناء المكوث في المستشفى، ننصح بإحضار:</p>
                            <ul>
                                <li>ملابس النوم</li>
                                <li>نعال وجوارب</li>
                                <li>أدوات النظافة الشخصية (صابون، فرشاة أسنان، معجون أسنان، ...إلخ)</li>
                                <li>النظارات، أجهزة السمع أو أطقم الأسنان إذا لزم الأمر</li>
                                <li>أدويتكم المعتادة في عبواتها الأصلية</li>
                            </ul>
                            <p>ننصحكم بعدم إحضار أشياء ثمينة أو مبالغ كبيرة من المال. لا يمكن للمستشفى تحمل المسؤولية في حالة الفقدان أو السرقة.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-category="admission" data-aos="fade-up" data-aos-delay="300"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>ما هي مواعيد الوجبات في المستشفى؟</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>يتم تقديم الوجبات في المواعيد التالية:</p>
                            <ul>
                                <li>الإفطار: 7:00 - 8:00</li>
                                <li>الغداء: 12:00 - 13:00</li>
                                <li>العشاء: 18:00 - 19:00</li>
                            </ul>
                            <p>يمكن وصف نظام غذائي خاص حسب حالتكم الصحية. لا تترددوا في إبلاغ الطاقم الطبي بأي حساسية أو عدم تحمل غذائي.</p>
                        </div>
                    </div>

                    <!-- Services & Soins -->
                    <div class="faq-item" data-category="services" data-aos="fade-up" data-aos-delay="150"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>ما هي الخدمات المتوفرة في حالات الطوارئ؟</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>قسم الطوارئ لدينا مفتوح 24 ساعة طوال أيام الأسبوع لجميع أنواع الطوارئ الطبية والجراحية. يتوفر على:</p>
                            <ul>
                                <li>استقبال وفرز فوري من قبل طبيب</li>
                                <li>فرق طبية وشبه طبية متاحة باستمرار</li>
                                <li>غرف مراقبة والعناية المركزة</li>
                                <li>وصول سريع لخدمات التصوير والمخبر</li>
                            </ul>
                        </div>
                    </div>

                    <div class="faq-item" data-category="services" data-aos="fade-up" data-aos-delay="250"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>كيف يعمل قسم غسيل الكلى؟</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>يقدم مركز غسيل الكلى لدينا علاج بديل للكلى للمرضى الذين يعانون من قصور مزمن في الكلى. يعمل القسم بمعدل ثلاث حصص يومية:</p>
                            <ul>
                                <li>7:00 - 11:00</li>
                                <li>12:00 - 16:00</li>
                                <li>17:00 - 21:00</li>
                            </ul>
                            <p>للمرضى المنتظمين، يتم وضع جدول شخصي حسب الاحتياجات الطبية، عادة بمعدل ثلاث حصص أسبوعياً. الوصول للخدمة بوصفة طبية وبعد تقييم من أطباء الكلى لدينا.</p>
                        </div>
                    </div>

                    <!-- Visites & Accompagnement -->
                    <div class="faq-item" data-category="visites" data-aos="fade-up" data-aos-delay="200"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>ما هي مواعيد الزيارة؟</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>مواعيد الزيارة هي:</p>
                            <ul>
                                <li>الأقسام العامة: 13:00 - 15:00 يومياً</li>
                                <li>طب الأطفال: 13:00 - 15:00 يومياً (الوالدان فقط)</li>
                                <li>قسم الولادة: 13:00 - 15:00 (الزوج والعائلة المقربة)</li>
                            </ul>
                            <p>لرفاهية المرضى، نطلب من الزوار:</p>
                            <ul>
                                <li>تقييد عدد الزوار لشخصين لكل مريض</li>
                                <li>احترام راحة المرضى</li>
                                <li>عدم إحضار الزهور أو النباتات إلى الغرف</li>
                                <li>عدم الحضور في حالة وجود أعراض معدية (نزلة برد، أنفلونزا، ...إلخ)</li>
                            </ul>
                            <p>يمكن تعديل المواعيد حسب الحالة الصحية للمريض أو في حالات استثنائية.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-category="visites" data-aos="fade-up" data-aos-delay="300"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>هل يمكن لأحد أفراد عائلتي البقاء معي أثناء الإقامة في المستشفى؟</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>في بعض الحالات، يمكن السماح لمرافق بالبقاء مع المريض:</p>
                            <ul>
                                <li>للأطفال المنومين في قسم الأطفال (أحد الوالدين)</li>
                                <li>للمرضى المسنين أو المعتمدين على الغير</li>
                                <li>للمرضى في الرعاية التلطيفية</li>
                            </ul>
                            <p>يجب طلب الإذن من الطاقم الطبي للقسم المعني. يجب على المرافق احترام قواعد النظافة وتشغيل القسم.</p>
                        </div>
                    </div>

                    <!-- Démarches administratives -->
                    <div class="faq-item" data-category="administratif" data-aos="fade-up" data-aos-delay="250"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>كيف أحصل على شهادة طبية أو إجازة مرضية؟</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>يتم إصدار الشهادات الطبية أو الإجازات المرضية:</p>
                            <ul>
                                <li>أثناء استشارتكم أو إقامتكم من قبل الطبيب المتابع لحالتكم</li>
                                <li>لتمديد الإجازة المرضية، مطلوب استشارة مسبقة</li>
                            </ul>
                            <p>إذا كنتم بحاجة لنسخة، يمكنكم طلبها من سكرتارية القسم الطبي المعني مع تقديم بطاقة الهوية.</p>
                        </div>
                    </div>

                    <div class="faq-item" data-category="administratif" data-aos="fade-up" data-aos-delay="350"
                        data-aos-duration="800" data-aos-anchor-placement="top-bottom">
                        <div class="faq-question">
                            <h3>ما هي الوثائق المطلوبة للدخول إلى المستشفى؟</h3>
                            <div class="faq-toggle"><i class="fas fa-chevron-down"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p>للدخول إلى المستشفى، يرجى إحضار الوثائق التالية:</p>
                            <ul>
                                <li>بطاقة الهوية الوطنية</li>
                                <li>بطاقة الشفاء (الضمان الاجتماعي) أو تأمين آخر</li>
                                <li>رسالة توجيه من الطبيب المحول</li>
                                <li>نتائج الفحوصات الطبية السابقة (إن وجدت)</li>
                                <li>قائمة بالأدوية التي تتناولونها حالياً</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Section de contact supplémentaire -->
                <div class="faq-contact" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                    <h3>لم تجد إجابتك؟</h3>
                    <p>لا تتردد في التواصل معنا مباشرة:</p>
                    <p><i class="fas fa-envelope"></i>contact.ephsobha@gmail.com</p>
                    <a href="index.php#contact" class="btn btn-primary">اتصل بنا</a>
                </div>
            </div>
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

    <!-- Intégration du script AOS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialisation de AOS
            AOS.init({
                once: false,
                mirror: false,
                offset: 120,
                easing: 'ease-out-back'
            });

            // Animation du titre avec effet de soulignement
            setTimeout(function () {
                const highlightElement = document.querySelector('.highlight-text');
                if (highlightElement) {
                    highlightElement.classList.add('active');
                }
            }, 1000);

            // Fonctionnalité d'accordéon pour les questions/réponses
            const questions = document.querySelectorAll('.faq-question');

            questions.forEach(question => {
                question.addEventListener('click', function () {
                    const answer = this.nextElementSibling;
                    const isOpen = answer.classList.contains('show');

                    // Fermer toutes les réponses
                    document.querySelectorAll('.faq-answer').forEach(item => {
                        item.classList.remove('show');
                    });

                    document.querySelectorAll('.faq-question').forEach(item => {
                        item.classList.remove('active');
                    });

                    // Ouvrir la réponse cliquée si elle était fermée
                    if (!isOpen) {
                        answer.classList.add('show');
                        this.classList.add('active');
                    }
                });
            });

            // Filtrage par catégorie
            const categoryButtons = document.querySelectorAll('.faq-category');
            const faqItems = document.querySelectorAll('.faq-item');

            categoryButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const category = this.getAttribute('data-category');

                    // Activer le bouton de catégorie cliqué
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filtrer les éléments FAQ
                    faqItems.forEach(item => {
                        if (category === 'all' || item.getAttribute('data-category') === category) {
                            item.style.display = 'block';
                            // Réactivation des animations AOS pour les éléments filtrés
                            setTimeout(() => {
                                AOS.refresh();
                            }, 100);
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });

            // Fonctionnalité de recherche
            const searchInput = document.getElementById('faqSearch');

            searchInput.addEventListener('input', function () {
                const searchTerm = this.value.toLowerCase();

                faqItems.forEach(item => {
                    const question = item.querySelector('.faq-question h3').textContent.toLowerCase();
                    const answer = item.querySelector('.faq-answer').textContent.toLowerCase();

                    if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Réinitialiser les catégories
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                const allCategoryBtn = document.querySelector('.faq-category[data-category="all"]');
                if (allCategoryBtn) {
                    allCategoryBtn.classList.add('active');
                }

                // Rafraîchir AOS après la recherche
                setTimeout(() => {
                    AOS.refresh();
                }, 100);
            });
        });
    </script>

</body>

</html>

<?php include('footer-ar.php'); ?>