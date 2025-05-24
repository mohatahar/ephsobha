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
    <title>دليل المؤسسات الصحية - ولاية الشلف</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    <!-- Google Fonts for Arabic -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/annuaire.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            text-align: center;
            padding: 90px 20px;
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
            font-weight: 600;
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
            font-weight: 600;
        }

        /* Styles pour le tableau des établissements */
        .etablissement-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        .etablissement-table th,
        .etablissement-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: right;
        }

        .etablissement-table th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
        }

        .etablissement-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .etablissement-table tr:hover {
            background-color: #e8f5e9;
        }

        .sector-public {
            color: #2196F3;
            font-weight: bold;
        }

        .sector-prive {
            color: #e91e63;
            font-weight: bold;
        }

        /* Carte et contrôles */
        .map-container {
            height: 500px;
            margin-top: 30px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .map-layers-control {
            background: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            border-right: 4px solid var(--primary-color);
        }

        .map-layers-control strong {
            margin-left: 15px;
            color: var(--primary-color);
        }

        #map-type {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: white;
            direction: ltr;
        }

        /* Bouton de localisation */
        .locate-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: 500;
            font-family: 'Noto Sans Arabic', sans-serif;
        }

        .locate-btn:hover {
            background-color: #005d91;
        }

        .locate-btn i {
            margin-left: 5px;
        }

        /* Bouton retour en haut */
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

        /* Responsive styles */
        @media (max-width: 768px) {
            .page-content {
                padding: 20px;
            }

            .page-title h1 {
                font-size: 2.2rem;
            }

            .etablissement-table,
            .etablissement-table tbody,
            .etablissement-table tr,
            .etablissement-table td {
                display: block;
                width: 100%;
            }

            .etablissement-table thead {
                display: none;
            }

            .etablissement-table tr {
                margin-bottom: 15px;
                border: 2px solid #ddd;
                border-radius: 5px;
                overflow: hidden;
            }

            .etablissement-table td {
                border: none;
                position: relative;
                padding-right: 50%;
                text-align: left;
                border-bottom: 1px solid #eee;
            }

            .etablissement-table td:before {
                content: attr(data-label);
                position: absolute;
                right: 6px;
                width: 45%;
                padding-left: 10px;
                white-space: nowrap;
                text-align: right;
                font-weight: bold;
                color: var(--primary-color);
            }

            .etablissement-table td:last-child {
                border-bottom: none;
            }
        }

        @media (max-width: 576px) {
            .page-title {
                padding: 80px 20px;
            }

            .page-title p {
                font-size: 1.1rem;
            }

            .map-layers-control {
                flex-direction: column;
                align-items: flex-start;
            }

            .map-layers-control strong {
                margin-bottom: 10px;
                margin-left: 0;
            }
        }

        /* RTL adjustments for icons */
        .fa-map-marker-alt::before {
            margin-left: 5px;
            margin-right: 0;
        }

        /* Legend styling */
        .legend-item {
            margin-bottom: 5px;
        }

        .legend-dot {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-left: 8px;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">دليل المؤسسات الصحية</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">اكتشف المؤسسات الصحية في ولاية الشلف</p>
        </div>
    </section>

    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>معلومة مهمة</h3>
                <p>يحتوي هذا الدليل على أهم المؤسسات الصحية في ولاية الشلف. يمكنكم الاطلاع على المعلومات والعناوين وتحديد موقع كل مؤسسة على الخريطة التفاعلية أدناه. المؤسسات العمومية مشار إليها باللون الأزرق والمؤسسات الخاصة باللون الأحمر.</p>
            </div>

            <section data-aos="fade-up" data-aos-delay="200">
                <h2 class="section-title">قائمة المؤسسات</h2>

                <table class="etablissement-table" data-aos="fade-up" data-aos-delay="250">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>القطاع</th>
                            <th>العنوان</th>
                            <th>الهاتف</th>
                            <th>الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                         <tr data-aos="fade-up" data-aos-delay="300">
                            <td data-label="الاسم">مديرية الصحة والسكان الشلف</td>
                            <td data-label="القطاع"><span class="sector-public">عمومي</span></td>
                            <td data-label="العنوان">الشلف</td>
                            <td data-label="الهاتف"style="direction: ltr; text-align: right;">+213 27 43 31 33</td>
                            <td data-label="الإجراء"><button class="locate-btn"
                                    onclick="showLocation(36.16285, 1.34394, 'مديرية الصحة والسكان الشلف')">
                                        <i class="fas fa-map-marker-alt"></i> تحديد الموقع</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="300">
                            <td data-label="الاسم">المؤسسة العمومية الإستشفائية الصبحة</td>
                            <td data-label="القطاع"><span class="sector-public">عمومي</span></td>
                            <td data-label="العنوان">بلدية الصبحة</td>
                            <td data-label="الهاتف"style="direction: ltr; text-align: right;">+213 27 71 91 97</td>
                            <td data-label="الإجراء"><button class="locate-btn"
                                    onclick="showLocation(36.10538, 1.10444, 'المؤسسة العمومية الإستشفائية الصبحة')">
                                        <i class="fas fa-map-marker-alt"></i> تحديد الموقع</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="الاسم">المؤسسة العمومية الإستشفائية الأخوات باج</td>
                            <td data-label="القطاع"><span class="sector-public">عمومي</span></td>
                            <td data-label="العنوان">حي بن سونة، الشلف</td>
                            <td data-label="الهاتف"style="direction: ltr; text-align: right;">+213 27 79 84 03</td>
                            <td data-label="الإجراء"><button class="locate-btn"
                                    onclick="showLocation(36.1593, 1.3212, 'المؤسسة العمومية الإستشفائية الأخوات باج')">
                                        <i class="fas fa-map-marker-alt"></i> تحديد الموقع</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="الاسم">المؤسسة العمومية الإستشفائية أولاد محمد</td>
                            <td data-label="القطاع"><span class="sector-public">عمومي</span></td>
                            <td data-label="العنوان">حي النصر، الشلف</td>
                            <td data-label="الهاتف"style="direction: ltr; text-align: right;">+213 27 77 33 34</td>
                            <td data-label="الإجراء"><button class="locate-btn"
                                    onclick="showLocation(36.1573, 1.3624, 'المؤسسة العمومية الإستشفائية أولاد محمد')">
                                        <i class="fas fa-map-marker-alt"></i> تحديد الموقع</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="الاسم">المؤسسة العمومية الإستشفائية الشرفة</td>
                            <td data-label="القطاع"><span class="sector-public">عمومي</span></td>
                            <td data-label="العنوان">حي البدر، الشلف</td>
                            <td data-label="الهاتف"style="direction: ltr; text-align: right;">+213 27 79 49 73</td>
                            <td data-label="الإجراء"><button class="locate-btn"
                                    onclick="showLocation(36.1466, 1.3132, 'المؤسسة العمومية الإستشفائية الشرفة')">
                                        <i class="fas fa-map-marker-alt"></i> تحديد الموقع</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="الاسم">المؤسسة العمومية الإستشفائية عين مران</td>
                            <td data-label="القطاع"><span class="sector-public">عمومي</span></td>
                            <td data-label="العنوان">بلدية عين مران</td>
                            <td data-label="الهاتف"style="direction: ltr; text-align: right;">+213 27 79 49 73</td>
                            <td data-label="الإجراء"><button class="locate-btn"
                                    onclick="showLocation(36.1589, 0.9622, 'المؤسسة العمومية الإستشفائية عين مران')">
                                        <i class="fas fa-map-marker-alt"></i> تحديد الموقع</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="الاسم">المؤسسة العمومية الإستشفائية الشطية</td>
                            <td data-label="القطاع"><span class="sector-public">عمومي</span></td>
                            <td data-label="العنوان">بلدية الشطية</td>
                            <td data-label="الهاتف"style="direction: ltr; text-align: right;">+213 27 79 49 73</td>
                            <td data-label="الإجراء"><button class="locate-btn"
                                    onclick="showLocation(36.2047, 1.2611, 'المؤسسة العمومية الإستشفائية الشطية')">
                                        <i class="fas fa-map-marker-alt"></i> تحديد الموقع</button></td>
                        </tr>
                         <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="الاسم">المؤسسة العمومية الإستشفائية تنس</td>
                            <td data-label="القطاع"><span class="sector-public">عمومي</span></td>
                            <td data-label="العنوان">بلدية تنس</td>
                            <td data-label="الهاتف"style="direction: ltr; text-align: right;">+213 27 76 71 71</td>
                            <td data-label="الإجراء"><button class="locate-btn"
                                    onclick="showLocation(36.5128, 1.3068, 'المؤسسة العمومية الإستشفائية تنس')">
                                        <i class="fas fa-map-marker-alt"></i> تحديد الموقع</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="الاسم">المؤسسة الاستشفائية المتخصصة تنس</td>
                            <td data-label="القطاع"><span class="sector-public">عمومي</span></td>
                            <td data-label="العنوان">تنس</td>
                            <td data-label="الهاتف"style="direction: ltr; text-align: right;">+213 27 45 18 77</td>
                            <td data-label="الإجراء"><button class="locate-btn"
                                    onclick="showLocation(36.5037, 1.2697, 'المؤسسة الاستشفائية المتخصصة تنس')">
                                        <i class="fas fa-map-marker-alt"></i> تحديد الموقع</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="400">
                            <td data-label="الاسم">عيادة الحكمة</td>
                            <td data-label="القطاع"><span class="sector-prive">خاص</span></td>
                            <td data-label="العنوان">حي 184 مسكن عدل، الشلف</td>
                            <td data-label="الهاتف"style="direction: ltr; text-align: right;">+213 27 77 50 50</td>
                            <td data-label="الإجراء"><button class="locate-btn"
                                    onclick="showLocation(36.1629, 1.3298, 'عيادة الحكمة')">
                                        <i class="fas fa-map-marker-alt"></i> تحديد الموقع</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="400">
                            <td data-label="الاسم">عيادة البرتقال</td>
                            <td data-label="القطاع"><span class="sector-prive">خاص</span></td>
                            <td data-label="العنوان">شارع عبد الحميد بن باديس، الشلف</td>
                            <td data-label="الهاتف"style="direction: ltr; text-align: right;">+213 27 77 18 63</td>
                            <td data-label="الإجراء"><button class="locate-btn"
                                    onclick="showLocation(36.1638, 1.3301, 'عيادة البرتقال')">
                                        <i class="fas fa-map-marker-alt"></i> تحديد الموقع</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="400">
                            <td data-label="الاسم">عيادة النصر</td>
                            <td data-label="القطاع"><span class="sector-prive">خاص</span></td>
                            <td data-label="العنوان">حي النصر، الشلف</td>
                            <td data-label="الهاتف" style="direction: ltr; text-align: right;">+213 27 77 83 83</td>
                            <td data-label="الإجراء"><button class="locate-btn"
                                    onclick="showLocation(36.1489, 1.3682, 'عيادة النصر')">
                                        <i class="fas fa-map-marker-alt"></i> تحديد الموقع</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="500">
                            <td data-label="الاسم">عيادة الإحسان</td>
                            <td data-label="القطاع"><span class="sector-prive">خاص</span></td>
                            <td data-label="العنوان">حي الحمضيات، الشلف</td>
                            <td data-label="الهاتف"style="direction: ltr; text-align: right;">+213 27 77 62 85</td>
                            <td data-label="الإجراء"><button class="locate-btn"
                                    onclick="showLocation(36.1700, 1.3416, 'عيادة الإحسان')">
                                        <i class="fas fa-map-marker-alt"></i> تحديد الموقع</button></td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section>
                <h2 class="section-title">خريطة المؤسسات</h2>

                <div class="map-layers-control">
                    <strong><i class="fas fa-layer-group"></i> اختر نوع الخريطة:</strong>
                    <select id="map-type">
                        <option value="osm">خريطة الشوارع</option>
                        <option value="satellite">الأقمار الصناعية</option>
                    </select>
                </div>

                <div class="map-container" id="map"></div>
            </section>

            <div class="info-card" data-aos="fade-up" data-aos-delay="450" style="margin-top: 30px;">
                <h3><i class="fas fa-info-circle"></i> مفتاح الرموز</h3>
                <div class="legend-item">
                    <span class="legend-dot" style="background-color: #2196F3;"></span>
                    <span style="color: #2196F3; font-weight: bold;">أزرق:</span> مؤسسات القطاع العمومي
                </div>
                <div class="legend-item">
                    <span class="legend-dot" style="background-color: #e91e63;"></span>
                    <span style="color: #e91e63; font-weight: bold;">أحمر:</span> مؤسسات القطاع الخاص
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton de retour en haut -->
    <div id="back-to-top" class="back-to-top">
        <i class="fas fa-chevron-up"></i>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialisation de AOS
        AOS.init({
            once: false,       // Animation peut se répéter
            mirror: false,     // Animation se produit une seule fois
            offset: 120,       // Décalage (en px) depuis le point de déclenchement original
            easing: 'ease-out-back' // Type d'effet d'animation
        });

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

        // Variable pour stocker le marqueur actuellement sélectionné
        let selectedMarker = null;
        let isLocationPinned = false;

        // Établissements de santé avec leurs coordonnées et adresses en arabe
        const etablissements = [
            { name: 'مديرية الصحة والسكان الشلف', lat: 36.16285, lon: 1.34394, sector: 'عمومي', address: 'الشلف' },
            { name: 'المؤسسة العمومية الإستشفائية الصبحة', lat: 36.10538, lon: 1.10444, sector: 'عمومي', address: 'بلدية الصبحة' },
            { name: 'المؤسسة العمومية الإستشفائية الأخوات باج', lat: 36.1593, lon: 1.3212, sector: 'عمومي', address: 'حي بن سونة، الشلف' },
            { name: 'المؤسسة العمومية الإستشفائية أولاد محمد', lat: 36.1573, lon: 1.3624, sector: 'عمومي', address: 'حي النصر، الشلف' },
            { name: 'المؤسسة العمومية الإستشفائية الشرفة', lat: 36.1466, lon: 1.3132, sector: 'عمومي', address: 'حي البدر، الشلف' },
            { name: 'المؤسسة العمومية الإستشفائية عين مران', lat: 36.1589, lon: 0.9622, sector: 'عمومي', address: 'بلدية عين مران' },
            { name: 'المؤسسة العمومية الإستشفائية الشطية', lat: 36.2047, lon: 1.2611, sector: 'عمومي', address: 'بلدية الشطية' },
            { name: 'المؤسسة العمومية الإستشفائية تنس', lat: 36.5128, lon: 1.3068, sector: 'عمومي', address: 'بلدية تنس' },
            { name: 'المؤسسة الاستشفائية المتخصصة تنس', lat: 36.5037, lon: 1.2697, sector: 'عمومي', address: 'تنس' },
            { name: 'عيادة الحكمة', lat: 36.1629, lon: 1.3298, sector: 'خاص', address: 'حي 184 مسكن عدل، الشلف' },
            { name: 'عيادة البرتقال', lat: 36.1638, lon: 1.3301, sector: 'خاص', address: 'شارع عبد الحميد بن باديس، الشلف' },
            { name: 'عيادة النصر', lat: 36.1489, lon: 1.3682, sector: 'خاص', address: 'حي النصر، الشلف' },
            { name: 'عيادة الإحسان', lat: 36.1700, lon: 1.3416, sector: 'خاص', address: 'حي الحمضيات، الشلف' }
        ];
       
        // Initialiser la carte
        var map = L.map('map').setView([36.1541, 1.3367], 10);

        // Définir les différentes couches de carte
        var osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        var satelliteLayer = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
        });

        // Ajouter la couche OpenStreetMap par défaut
        osmLayer.addTo(map);

        // Fonction pour afficher la localisation d'un établissement
        function showLocation(lat, lon, name) {
            // Faire défiler la page vers la carte
            document.getElementById('map').scrollIntoView({ behavior: 'smooth', block: 'center' });

            // Supprimer tous les marqueurs existants
            map.eachLayer(function (layer) {
                if (layer instanceof L.Marker && layer !== selectedMarker) {
                    map.removeLayer(layer);
                }
            });

            // Centrer la carte sur les coordonnées
            map.setView([lat, lon], 14);

            // Trouver l'établissement dans la liste
            const etablissement = etablissements.find(e => e.name === name);

            // Si on a déjà un marqueur sélectionné, le supprimer
            if (selectedMarker) {
                map.removeLayer(selectedMarker);
            }

            // Ajouter un nouveau marqueur
            var markerColor = etablissement.sector === 'Public' ? '#2196F3' : '#e91e63';
            var markerIcon = L.divIcon({
                className: 'custom-marker',
                html: `<div style="background-color:${markerColor};width:25px;height:25px;border-radius:50%;border:3px solid white;box-shadow:0 0 8px rgba(0,0,0,0.5);"></div>`,
                iconSize: [25, 25],
                iconAnchor: [12.5, 12.5]
            });

            selectedMarker = L.marker([lat, lon], { icon: markerIcon }).addTo(map);
            selectedMarker.bindPopup(`
                <strong style="font-size:14px;">${name}</strong><br>
                <span style="color:${markerColor};font-weight:bold;">قطاع ${etablissement.sector}</span><br>
                <span>${etablissement.address}</span>
            `).openPopup();

            // Marquer la position comme épinglée
            isLocationPinned = true;
        }

        // Fonction pour ajouter tous les marqueurs
        function addAllMarkers() {
            // Ne pas supprimer le marqueur sélectionné s'il existe
            map.eachLayer(function (layer) {
                if (layer instanceof L.Marker && layer !== selectedMarker) {
                    map.removeLayer(layer);
                }
            });

            // Ajouter des marqueurs pour tous les établissements
            etablissements.forEach(etab => {
                // Vérifier si cet établissement n'est pas déjà sélectionné
                if (!selectedMarker || 
                    selectedMarker._latlng.lat !== etab.lat || 
                    selectedMarker._latlng.lng !== etab.lon) {
                    
                    var markerColor = etab.sector === 'Public' ? '#2196F3' : '#e91e63';
                    var markerIcon = L.divIcon({
                        className: 'custom-marker',
                        html: `<div style="background-color:${markerColor};width:15px;height:15px;border-radius:50%;border:2px solid white;box-shadow:0 0 5px rgba(0,0,0,0.3);"></div>`,
                        iconSize: [15, 15],
                        iconAnchor: [7.5, 7.5]
                    });

                    L.marker([etab.lat, etab.lon], { icon: markerIcon })
                        .addTo(map)
                        .bindPopup(`
                            <strong style="font-size:14px;">${etab.name}</strong><br>
                            <span style="color:${markerColor};font-weight:bold;">Secteur ${etab.sector}</span><br>
                            <span>${etab.address}</span>
                        `);
                }
            });
        }

        // Ajouter tous les marqueurs au chargement initial
        addAllMarkers();

        // Gestion du changement de type de carte
        document.getElementById('map-type').addEventListener('change', function () {
            // Supprimer toutes les couches de tuiles existantes
            map.eachLayer(function (layer) {
                if (layer instanceof L.TileLayer) {
                    map.removeLayer(layer);
                }
            });

            // Ajouter la nouvelle couche
            switch (this.value) {
                case 'osm':
                    osmLayer.addTo(map);
                    break;
                case 'satellite':
                    satelliteLayer.addTo(map);
                    break;
            }

            // Réajouter tous les marqueurs
            addAllMarkers();
        });

        // Événements de la carte pour maintenir les informations affichées
        map.on('zoom', function() {
            // Réajouter les marqueurs mais conserver celui sélectionné
            if (isLocationPinned) {
                addAllMarkers();
            }
        });

        map.on('moveend', function() {
            // Réajouter les marqueurs mais conserver celui sélectionné
            if (isLocationPinned) {
                addAllMarkers();
            }
        });
    </script>
</body>

</html>
<?php include('footer-ar.php'); ?>