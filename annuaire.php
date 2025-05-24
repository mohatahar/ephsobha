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
                            <td data-label="Nom">DSP CHLEF</td>
                            <td data-label="Secteur"><span class="sector-public">Public</span></td>
                            <td data-label="Adresse">Chlef</td>
                            <td data-label="Téléphone">+213 27 43 31 33</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.16285, 1.34394, 'DSP CHLEF')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="300">
                            <td data-label="Nom">EPH Sobha</td>
                            <td data-label="Secteur"><span class="sector-public">Public</span></td>
                            <td data-label="Adresse">Sobha</td>
                            <td data-label="Téléphone">+213 27 71 91 97</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.10538, 1.10444, 'EPH Sobha')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="Nom">EPH Soeurs bedj</td>
                            <td data-label="Secteur"><span class="sector-public">Public</span></td>
                            <td data-label="Adresse">Cité Bensouna, Chlef</td>
                            <td data-label="Téléphone">+213 27 79 84 03</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.1593, 1.3212, 'EPH Soeurs bedj')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="Nom">EPH Ouled Mohammed</td>
                            <td data-label="Secteur"><span class="sector-public">Public</span></td>
                            <td data-label="Adresse">Cité elnassr, Chlef</td>
                            <td data-label="Téléphone">+213 27 77 33 34</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.1573, 1.3624, 'EPH Ouled Mohammed')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="Nom">EPH Chorfa</td>
                            <td data-label="Secteur"><span class="sector-public">Public</span></td>
                            <td data-label="Adresse">Hay El Badr, Chlef</td>
                            <td data-label="Téléphone">+213 27 79 49 73</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.1466, 1.3132, 'EPH Chorfa')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="Nom">EPH Ain Merane</td>
                            <td data-label="Secteur"><span class="sector-public">Public</span></td>
                            <td data-label="Adresse">Ain Merane</td>
                            <td data-label="Téléphone">+213 27 79 49 73</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.1589, 0.9622, 'EPH Ain Merane')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="Nom">EPH Chettia</td>
                            <td data-label="Secteur"><span class="sector-public">Public</span></td>
                            <td data-label="Adresse">Chettia</td>
                            <td data-label="Téléphone">+213 27 79 49 73</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.2047, 1.2611, 'EPH Chettia')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                         <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="Nom">EPH Ténès</td>
                            <td data-label="Secteur"><span class="sector-public">Public</span></td>
                            <td data-label="Adresse">Ténès</td>
                            <td data-label="Téléphone">+213 27 76 71 71</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.5128, 1.3068, 'EPH Ténès')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="350">
                            <td data-label="Nom">EHS Ténès</td>
                            <td data-label="Secteur"><span class="sector-public">Public</span></td>
                            <td data-label="Adresse">Ténès</td>
                            <td data-label="Téléphone">+213 27 45 18 77</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.5037, 1.2697, 'EHS Ténès')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="400">
                            <td data-label="Nom">Clinique El Hikma</td>
                            <td data-label="Secteur"><span class="sector-prive">Privé</span></td>
                            <td data-label="Adresse">Cité 184 logement AADL, Chlef</td>
                            <td data-label="Téléphone">+213 27 77 50 50</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.1629, 1.3298, 'Clinique El Hikma')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="400">
                            <td data-label="Nom">Clinique les orangers</td>
                            <td data-label="Secteur"><span class="sector-prive">Privé</span></td>
                            <td data-label="Adresse">Bd . Abd El Hamid Ibn Badis, Chlef</td>
                            <td data-label="Téléphone">+213 27 77 18 63</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.1638, 1.3301, 'Clinique les orangers')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="400">
                            <td data-label="Nom">Clinique Ennasr</td>
                            <td data-label="Secteur"><span class="sector-prive">Privé</span></td>
                            <td data-label="Adresse">Cité elnassr, Chlef</td>
                            <td data-label="Téléphone">+213 27 77 83 83</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.1489, 1.3682, 'Clinique Ennasr')"><i
                                        class="fas fa-map-marker-alt"></i> Localiser</button></td>
                        </tr>
                        <tr data-aos="fade-up" data-aos-delay="500">
                            <td data-label="Nom">Clinique El Ihssene</td>
                            <td data-label="Secteur"><span class="sector-prive">Privé</span></td>
                            <td data-label="Adresse">Cia des Citronniers, Chlef</td>
                            <td data-label="Téléphone">+213 27 77 62 85</td>
                            <td data-label="Action"><button class="locate-btn"
                                    onclick="showLocation(36.1700, 1.3416, 'Clinique El Ihssene')"><i
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

                <div class="map-container" id="map"></div>
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
            { name: 'DSP CHLEF', lat: 36.16285, lon: 1.34394, sector: 'Public', address: 'Chlef' },
            { name: 'EPH Sobha', lat: 36.10538, lon: 1.10444, sector: 'Public', address: 'Sobha' },
            { name: 'EPH Soeurs bedj', lat: 36.1593, lon: 1.3212, sector: 'Public', address: 'Cité Bensouna, Chlef' },
            { name: 'EPH Ouled Mohammed', lat: 36.1573, lon: 1.3624, sector: 'Public', address: 'Cité elnassr, Chlef' },
            { name: 'EPH Chorfa', lat: 36.1466, lon: 1.3132, sector: 'Public', address: 'Hay El Badr, Chlef' },
            { name: 'EPH Ain Merane', lat: 36.1589, lon: 0.9622, sector: 'Public', address: 'Ain Merane' },
            { name: 'EPH Chettia', lat: 36.2047, lon: 1.2611, sector: 'Public', address: 'Chettia' },
            { name: 'EPH Ténès', lat: 36.5128, lon: 1.3068, sector: 'Public', address: 'Ténès' },
            { name: 'EHS Ténès', lat: 36.5037, lon: 1.2697, sector: 'Public', address: 'Ténès' },
            { name: 'Clinique El Hikma', lat: 36.1629, lon: 1.3298, sector: 'Privé', address: 'Cité 184 logement AADL, Chlef' },
            { name: 'Clinique les orangers', lat: 36.1638, lon: 1.3301, sector: 'Privé', address: 'Bd . Abd El Hamid Ibn Badis, Chlef' },
            { name: 'Clinique Ennasr', lat: 36.1489, lon: 1.3682, sector: 'Privé', address: 'Cité elnassr, Chlef' },
            { name: 'Clinique El Ihssene', lat: 36.1700, lon: 1.3416, sector: 'Privé', address: 'Cia des Citronniers, Chlef' }
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