<?php
include('header.php');
// Configuration de base
$hospital_name = "EPH SOBHA";
$tagline = "Au service de votre santé";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annuaire des Établissements de Santé - Wilaya de Chlef</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />
    <!-- AOS CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
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
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 5px;
        }

        .info-card h3 {
            color: var(--primary-color);
            margin-bottom: 10px;
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
            text-align: left;
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
            border-left: 4px solid var(--primary-color);
        }

        .map-layers-control strong {
            margin-right: 15px;
            color: var(--primary-color);
        }

        #map-type {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
            background-color: white;
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
        }

        .locate-btn:hover {
            background-color: #005d91;
        }

        /* Info panel pour les coordonnées */
        .coordinates-panel {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(255, 255, 255, 0.9);
            padding: 8px 12px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            font-size: 0.9rem;
            max-width: 300px;
            display: none;
        }

        .coordinates-panel h4 {
            margin: 0 0 8px 0;
            color: var(--primary-color);
            font-size: 1rem;
        }

        .coordinates-panel p {
            margin: 0;
            line-height: 1.4;
        }

        /* Bouton retour en haut */
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
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
                padding-left: 50%;
                text-align: right;
                border-bottom: 1px solid #eee;
            }

            .etablissement-table td:before {
                content: attr(data-label);
                position: absolute;
                left: 6px;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: left;
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
            }
        }

          /* Correction pour l'information de localisation */
    .location-info {
        position: absolute;
        background-color: white;
        border-left: 4px solid #0077b6;
        border-radius: 5px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        padding: 15px;
        width: 300px;
        z-index: 1000;
        display: none; /* Caché par défaut */
    }
    
    .location-info h3 {
        margin-top: 0;
        color: #0077b6;
    }
    
    /* Style pour le bouton de fermeture */
    .close-info {
        position: absolute;
        top: 5px;
        right: 10px;
        cursor: pointer;
        font-weight: bold;
        color: #666;
    }
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">Annuaire des Établissements de Santé</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Découvrez les établissements de santé
                dans la Wilaya de Chlef</p>
        </div>
    </section>

    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>Information importante</h3>
                <p>Cet annuaire recense les principaux établissements de santé dans la Wilaya de Chlef. Vous pouvez
                    consulter les coordonnées et localiser chaque établissement sur la carte interactive ci-dessous. Les
                    établissements publics sont indiqués en bleu et les établissements privés en rouge.</p>
            </div>

            <section data-aos="fade-up" data-aos-delay="200">
                <h2 class="section-title">Liste des établissements</h2>

                <table class="etablissement-table" data-aos="fade-up" data-aos-delay="250">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Secteur</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-aos="fade-up" data-aos-delay="300">
                            <td data-label="Nom">EPH Sobha</td>
                            <td data-label="Secteur"><span class="sector-public">Public</span></td>
                            <td data-label="Adresse">Commune de Sobha, Wilaya de Chlef</td>
                            <td data-label="Téléphone">+213 27 71 91 97</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.10538, 1.10444, 'EPH Sobha')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="Nom">CHU Chlef</td>
                            <td data-label="Secteur"><span class="sector-public">Public</span></td>
                            <td data-label="Adresse">Route de Ténès, Chlef</td>
                            <td data-label="Téléphone">+213 27 72 22 55</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.1541, 1.3367, 'CHU Chlef')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="400">
                            <td data-label="Nom">Clinique El Rahma</td>
                            <td data-label="Secteur"><span class="sector-prive">Privé</span></td>
                            <td data-label="Adresse">Rue Larbi Ben M'hidi, Chlef</td>
                            <td data-label="Téléphone">+213 27 77 20 30</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.1661, 1.3394, 'Clinique El Rahma')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="450">
                            <td data-label="Nom">Polyclinique Ben Boulaïd</td>
                            <td data-label="Secteur"><span class="sector-public">Public</span></td>
                            <td data-label="Adresse">Centre-ville, Chlef</td>
                            <td data-label="Téléphone">+213 27 72 15 45</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.1629, 1.3394, 'Polyclinique Ben Boulaïd')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="500">
                            <td data-label="Nom">Clinique El Amal</td>
                            <td data-label="Secteur"><span class="sector-prive">Privé</span></td>
                            <td data-label="Adresse">Avenue de l'ALN, Chlef</td>
                            <td data-label="Téléphone">+213 27 76 33 44</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.1578, 1.3531, 'Clinique El Amal')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="550">
                            <td data-label="Nom">Hôpital Haï Salam</td>
                            <td data-label="Secteur"><span class="sector-public">Public</span></td>
                            <td data-label="Adresse">Quartier Haï Salam, Chlef</td>
                            <td data-label="Téléphone">+213 27 73 10 20</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.1492, 1.3276, 'Hôpital Haï Salam')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                    </tbody>
                </table>
            </section>

            <section>
                <h2 class="section-title">Carte des établissements</h2>

                <div class="map-layers-control">
                    <strong><i class="fas fa-layer-group"></i> Choisir le type de carte :</strong>
                    <select id="map-type">
                        <option value="osm">OpenStreetMap</option>
                        <option value="satellite">Satellite</option>
                    </select>
                </div>

                <div class="map-container" id="map">
                    <!-- Panneau des coordonnées -->
                    <div id="coordinates-panel" class="coordinates-panel">
                        <h4>Information de localisation</h4>
                        <p id="location-name"></p>
                        <p id="location-address"></p>
                    </div>
                </div>
            </section>

            <div class="info-card" data-aos="fade-up" data-aos-delay="450" style="margin-top: 30px;">
                <h3><i class="fas fa-info-circle"></i> Légende</h3>
                <p><span style="color: #2196F3; font-weight: bold;">● Bleu</span> : Établissements du secteur public</p>
                <p><span style="color: #e91e63; font-weight: bold;">● Rouge</span> : Établissements du secteur privé</p>
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

        // Établissements de santé avec leurs coordonnées et adresses
        const etablissements = [
            { name: 'EPH Sobha', lat: 36.10538, lon: 1.10444, sector: 'Public', address: 'Commune de Sobha, Wilaya de Chlef' },
            { name: 'CHU Chlef', lat: 36.1541, lon: 1.3367, sector: 'Public', address: 'Route de Ténès, Chlef' },
            { name: 'Clinique El Rahma', lat: 36.1661, lon: 1.3394, sector: 'Privé', address: 'Rue Larbi Ben M\'hidi, Chlef' },
            { name: 'Polyclinique Ben Boulaïd', lat: 36.1629, lon: 1.3394, sector: 'Public', address: 'Centre-ville, Chlef' },
            { name: 'Clinique El Amal', lat: 36.1578, lon: 1.3531, sector: 'Privé', address: 'Avenue de l\'ALN, Chlef' },
            { name: 'Hôpital Haï Salam', lat: 36.1492, lon: 1.3276, sector: 'Public', address: 'Quartier Haï Salam, Chlef' }
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
                <span style="color:${markerColor};font-weight:bold;">Secteur ${etablissement.sector}</span><br>
                <span>${etablissement.address}</span>
            `).openPopup();

            // Mettre à jour et afficher le panneau de coordonnées
            document.getElementById('location-name').textContent = `${name} (${etablissement.sector})`;
            document.getElementById('location-address').textContent = `Adresse: ${etablissement.address}`;
            document.getElementById('coordinates-panel').style.display = 'block';

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
<?php include('footer.php'); ?>