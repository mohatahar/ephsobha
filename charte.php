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
    <title>Charte du Patient - <?php echo $hospital_name; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

        .guidelines-list {
            list-style-type: none;
            padding-left: 0;
        }

        .guidelines-list li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .guidelines-list li i {
            color: var(--primary-color);
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .special-notice {
            background-color: #fff3cd;
            border-left: 4px solid var(--warning-color);
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .special-notice h3 {
            color: #856404;
            margin-bottom: 10px;
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
        }

        /* Styles pour les listes numérotées */
        .numbered-list {
            list-style-type: none;
            counter-reset: item;
            padding-left: 0;
        }

        .numbered-list li {
            counter-increment: item;
            margin-bottom: 15px;
            padding-left: 35px;
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
            left: 0;
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
    </style>
</head>

<body>
    <!-- Page Title Section -->
    <section class="page-title" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <h1 data-aos="fade-down" data-aos-duration="1000">Charte du Patient</h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Guide complet du malade : droits,
                arrivée, séjour et sortie à l'EPH SOBHA</p>
        </div>
    </section>

    <!-- Page Content -->
    <div class="container">
        <div class="page-content">
            <div class="info-card" data-aos="fade-up" data-aos-delay="100">
                <h3>Bienvenue à l'EPH SOBHA</h3>
                <p>Cette charte a pour objectif de vous informer sur vos droits et de vous guider tout au long de votre
                    parcours de soins dans notre établissement. Notre équipe est entièrement dévouée à votre bien-être
                    et à votre rétablissement. Ce document vous accompagnera de votre arrivée jusqu'à votre sortie de
                    l'hôpital.</p>
            </div>

            <!-- Accès rapide aux sections -->
            <section class="quick-links" data-aos="fade-up" data-aos-delay="200">
                <h3><i class="fas fa-link"></i> Accès rapide</h3>
                <ul>
                    <li><a href="#guide">Guide du Malade</a></li>
                    <li><a href="#droits">Droits du Patient</a></li>
                    <li><a href="#arrivee">Votre Arrivée</a></li>
                    <li><a href="#sejour">Votre Séjour</a></li>
                    <li><a href="#sortie">Votre Sortie</a></li>
                    <li><a href="#devoirs">Vos Devoirs</a></li>
                </ul>
            </section>

            <!-- Section Guide du Malade -->
            <section id="guide" class="charte-section" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title"><i class="fas fa-book"></i> Guide du Malade</h2>

                <div class="info-card" data-aos="fade-up" data-aos-delay="150">
                    <h3>Madame, Mademoiselle, Monsieur,</h3>
                    <p>Pour les soins que requiert votre état de santé, vous êtes accueilli(e) à l'EPH SOBHA. Le présent
                        guide vous apporte des informations sur les conditions d'admission, de séjour, de sortie et vous
                        apporte les réponses aux questions que vous vous posez. Toutes informations complémentaires
                        pourront vous être données sur votre demande.</p>
                    <p>Afin de mieux répondre à votre attente, nous vous proposons de nous faire parvenir vos
                        appréciations, remarques et suggestions que vous souhaiteriez formuler, en utilisant le
                        questionnaire de sortie ou via email. Nous vous assurons de notre considération attentive.</p>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="200">Fonctionnement de l'établissement</h3>
                <p data-aos="fade-up" data-aos-delay="250">Les gardes d'urgences sont assurées par nos médecins au
                    niveau de l'EPH SOBHA.</p>

                <div class="right-box" data-aos="fade-right" data-aos-delay="300">
                    <h3>Horaires de travail</h3>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-building"></i> <strong>Administration :</strong> du dimanche au jeudi
                            <ul>
                                <li>08H00-12H00</li>
                                <li>13H00-16H30</li>
                            </ul>
                        </li>
                        <li><i class="fas fa-door-open"></i> <strong>Bureau des admissions :</strong> 7j/7, 24h/24</li>
                        <li><i class="fas fa-stethoscope"></i> <strong>Consultations externes :</strong> du dimanche au
                            jeudi
                            <ul>
                                <li>08H00-12H00</li>
                                <li>13H00-16H30</li>
                            </ul>
                        </li>
                        <li><i class="fas fa-x-ray"></i> <strong>Radiologie :</strong> 24h/24, 7j/7</li>
                        <li><i class="fas fa-flask"></i> <strong>Laboratoire :</strong> 24h/24 pour les malades admis
                            aux urgences et malades hospitalisés</li>
                    </ul>
                </div>

                <div class="right-box" data-aos="fade-right" data-aos-delay="350">
                    <h3>Gardes de nuit</h3>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-moon"></i> <strong>Journées ouvrables :</strong> de 16H00 jusqu'au
                            lendemain 08H00</li>
                        <li><i class="fas fa-calendar-alt"></i> <strong>Week-end et jours fériés :</strong> 08H00-20H00,
                            20H00 au lendemain 08H00</li>
                    </ul>
                </div>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="400">
                    <h3>Visites</h3>
                    <p>Visites quotidiennes, de 13H30 à 15H00 (sauf visites interdites par le médecin traitant).</p>
                    <p><strong>Interdiction d'accès pour les mineurs de moins de 14 ans.</strong></p>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="450">Conditions d'admission</h3>
                <p data-aos="fade-up" data-aos-delay="500">L'hospitalisation se fait suite à :</p>
                <ul class="numbered-list">
                    <li data-aos="fade-left" data-aos-delay="550">
                        <strong>Admission par les urgences</strong><br>
                        Établissement par le médecin des urgences d'une demande d'admission.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="600">
                        <strong>Admission programmée</strong><br>
                        Par un rendez-vous obtenu préalablement lors d'une consultation externe.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="650">
                        <strong>Service de maternité</strong><br>
                        Le livret de famille est obligatoire pour le service de maternité.
                    </li>
                </ul>

                <p data-aos="fade-up" data-aos-delay="700">L'agent du bureau des admissions enregistre l'hospitalisation
                    et établit un bulletin d'admission sur lequel figure le nom du service et une fiche navette, qui
                    seront remis par les parents au surveillant médical de l'unité où sera hospitalisé le patient.</p>

                <p data-aos="fade-up" data-aos-delay="750"><strong>Documents requis :</strong> Une pièce d'identité du
                    patient avec sa carte d'assurance ou de démuni.</p>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="800">
                    <h3>Recommandations importantes aux accompagnateurs</h3>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-user-friends"></i> En aucun cas les visites ne doivent fatiguer ou gêner
                            les malades voisins.</li>
                        <li><i class="fas fa-bed"></i> Ne pas s'asseoir sur les lits des malades.</li>
                        <li><i class="fas fa-broom"></i> Garder les lieux propres.</li>
                    </ul>
                </div>
            </section>

            <!-- Section Droits du Patient (MISE À JOUR) -->
            <section id="droits" class="charte-section" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title"><i class="fas fa-gavel"></i> Droits du Patient</h2>

                <div class="right-box" data-aos="fade-right" data-aos-delay="200">
                    <h3>Principes généraux</h3>
                    <p>Toute personne a droit à la protection de sa santé et aux soins qu'exige son état de santé, à
                        toutes les étapes de la vie.</p>
                    <p>Les services de l'EPH SOBHA, sont accessibles à toute la population. Ils fonctionnent dans les
                        meilleures conditions possibles et garantissent :</p>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-shield-alt"></i> Les droits fondamentaux et la sécurité des personnes qui
                            recourent à leurs services</li>
                        <li><i class="fas fa-user-shield"></i> Le respect de la dignité humaine</li>
                        <li><i class="fas fa-hand-sparkles"></i> Le respect des règles d'hygiène fixées par la
                            législation et la réglementation en vigueur</li>
                        <li><i class="fas fa-user-md"></i> La dignité professionnelle et l'indépendance scientifique de
                            l'ensemble des personnels</li>
                    </ul>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="250">Respect de la dignité et de la vie privée du patient</h3>
                <ul class="numbered-list">
                    <li data-aos="fade-left" data-aos-delay="300">
                        <strong>Protection de la vie privée</strong><br>
                        La protection de la vie privée du malade est garantie. Le caractère confidentiel des données du
                        malade est garanti par la loi. Le secret couvre l'ensemble des informations concernant la
                        personne, parvenues à la connaissance du professionnel de santé.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="350">
                        <strong>Secret médical</strong><br>
                        Il couvre également le dossier médical et la sphère privée du patient. L'ensemble de l'équipe
                        soignante ainsi que tout autre employé de l'EPH est tenu par l'obligation du secret médical et
                        professionnel.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="400">
                        <strong>Exceptions au secret médical</strong><br>
                        Le secret médical peut être levé pour les mineurs et les incapables à la demande de la famille
                        c'est-à-dire : le conjoint, le père, la mère, le ou les enfants, les frères, les sœurs ou le
                        tuteur. Le secret médical peut également être levé par l'autorité judicaire.
                    </li>
                </ul>

                <h3 data-aos="fade-up" data-aos-delay="450">Droit à l'acceptation et au refus des soins</h3>
                <ul class="numbered-list">
                    <li data-aos="fade-left" data-aos-delay="500">
                        <strong>Acceptation ou refus des soins</strong><br>
                        Le malade hospitalisé à l'EPH a le droit d'accepter ou de refuser toute prestation de
                        diagnostic, de traitement ou de surveillance. En cas d'incapacité complète ou partielle, de par
                        la loi ou de fait, ce droit est exercé par le représentant légal ou par l'autorité compétente.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="550">
                        <strong>Participation du patient</strong><br>
                        Les patients s'efforcent de contribuer au bon déroulement des soins, notamment en suivant les
                        prescriptions qu'ils ont acceptées et en fournissant aux professionnels de la santé les
                        renseignements les plus complets sur leur santé.
                    </li>
                </ul>

                <h3 data-aos="fade-up" data-aos-delay="600">Droit à l'information</h3>
                <ul class="numbered-list">
                    <li data-aos="fade-left" data-aos-delay="650">
                        <strong>Information sur l'état de santé</strong><br>
                        Tout malade hospitalisé à l'EPH a droit, sauf en cas d'urgence ou d'incapacité ou
                        d'impossibilité, à être informée sur son état de santé, des soins qu'il nécessite et des risques
                        qu'il encourt, ceci afin de prendre lui-même les décisions et/ou de participer aux décisions
                        pouvant avoir des conséquences sur sa santé.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="700">
                        <strong>Cas des mineurs et des majeurs sous tutelle</strong><br>
                        Les droits des mineurs et des majeurs sous tutelle sont exercés, selon les cas, par les parents
                        ou par le tuteur.
                    </li>
                </ul>

                <h3 data-aos="fade-up" data-aos-delay="750">Consentement du patient</h3>
                <ul class="numbered-list">
                    <li data-aos="fade-left" data-aos-delay="800">
                        <strong>Consentement libre et éclairé</strong><br>
                        Aucun acte médical, aucun traitement ne peut être pratiqué sans le consentement libre et éclairé
                        du patient. Ce consentement peut être retiré à tout moment. Le médecin doit respecter la volonté
                        de la personne, après l'avoir informée des conséquences de ses choix.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="850">
                        <strong>Mineurs et majeurs sous tutelle</strong><br>
                        Le consentement du mineur ou du majeur sous tutelle doit être systématiquement recherché s'il
                        est apte à exprimer sa volonté et à participer à la décision.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="900">
                        <strong>Cas d'urgence</strong><br>
                        Toutefois, en cas d'urgence, de maladie contagieuse et au cas ou la vie du patient serait
                        gravement menacée, le prestataire doit prodiguer les soins et le cas échéant passer outre le
                        consentement.
                    </li>
                </ul>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="950">
                    <h3>Droit de recours du patient</h3>
                    <p>Tout patient ainsi que toute personne habilitée à le représenter peut en cas de violation des
                        droits s'adresser à la commission de conciliation et de médiation ou déposer une plainte auprès
                        de la Direction Générale de l'EPH.</p>
                </div>
            </section>

            <!-- Section Votre Arrivée (MISE À JOUR) -->
            <section id="arrivee" class="charte-section" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title"><i class="fas fa-hospital-user"></i> Votre Arrivée</h2>

                <div class="right-box" data-aos="fade-right" data-aos-delay="200">
                    <h3>Formalités à l'Entrée</h3>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-check-circle"></i> La décision d'admission est prononcée par un Médecin de
                            l'EPH ou par l'autorité administrative/judiciaire sur réquisition et après avis médical</li>
                        <li><i class="fas fa-check-circle"></i> Le bureau des entrées administre toutes les formalités
                            liées au séjour du malade</li>
                        <li><i class="fas fa-check-circle"></i> La demande d'hospitalisation est établie par le service
                            d'hospitalisation sur le formulaire fourni par l'EPH</li>
                        <li><i class="fas fa-check-circle"></i> Le bulletin d'admission est délivré au malade ou au
                            parent par le bureau des entrées sur présentation du formulaire de demande</li>
                    </ul>
                </div>

                <div class="info-card" data-aos="fade-up" data-aos-delay="250">
                    <h3>Documents nécessaires</h3>
                    <p>Pour faciliter votre admission, veuillez vous munir des documents suivants :</p>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-id-card"></i> Pièce d'identité (carte nationale d'identité, passeport)</li>
                        <li><i class="fas fa-file"></i> Carte de sécurité sociale (carte CHIFFA), CNAS, CASNOS
                            ou CNR ou carte d'immatriculation des services de la solidarité nationale</li>
                        <li><i class="fas fa-notes-medical"></i> Formulaire de demande d'hospitalisation (si applicable)
                        </li>
                        <li><i class="fas fa-file-prescription"></i> Ordonnances et traitements en cours</li>
                        <li><i class="fas fa-file-medical-alt"></i> Résultats d'examens récents (analyses,
                            radiographies, etc.)</li>
                    </ul>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="300">Procédure d'admission complète</h3>
                <ul class="numbered-list">
                    <li data-aos="fade-left" data-aos-delay="350">
                        <strong>Informations administratives</strong><br>
                        Le bulletin d'admission remis est obligatoirement accompagné de la fiche navette, du résumé
                        clinique de sortie et du résumé de sortie standardisé. Les informations administratives
                        contenues dans la fiche navette sont transcrites par le personnel du bureau des entrées.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="400">
                        <strong>Contacts d'urgence</strong><br>
                        Le demandeur, malade ou parent de malade, doit indiquer au préposé les noms, téléphones et
                        adresses des personnes à contacter en cas d'urgence.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="450">
                        <strong>Suivi des actes médicaux</strong><br>
                        Chaque prestataire, médical ou paramédical autorisé, inscrit chaque acte réalisé dans le
                        service. Le remplissage de la fiche navette est sous la responsabilité du surveillant médical du
                        service d'hospitalisation.
                    </li>
                </ul>

                <h3 data-aos="fade-up" data-aos-delay="500">Modes d'admission</h3>
                <ol class="numbered-list">
                    <li data-aos="fade-left" data-aos-delay="550">
                        <strong>Demande d'admission à la demande d'un médecin traitant hors EPH</strong><br>
                        Les demandes d'admission émanant d'un médecin traitant hors EPH sont traitées au niveau des
                        Urgences. Le médecin de l'unité de consultation, après avis du médecin-chef ou d'unité
                        d'hospitalisation, oriente le malade vers le secrétariat médical du service pour l'établissement
                        des documents d'hospitalisation.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="600">
                        <strong>Admission à la suite d'une consultation du service</strong><br>
                        Le médecin de l'unité de consultation, après avis du médecin-chef ou d'unité d'hospitalisation,
                        oriente le malade vers le secrétariat médical du service pour l'établissement des documents
                        d'hospitalisation.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="650">
                        <strong>Admission programmée</strong><br>
                        Une convocation est remise ou adressée au malade, après avis du chef de service. Le malade se
                        rend au secrétariat médical du service pour l'établissement des documents d'hospitalisation.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="700">
                        <strong>Admission à la suite d'une mutation de service</strong><br>
                        Lorsqu'un médecin de l'EPH constate que l'état d'un malade hospitalisé dans son service requiert
                        des soins relevant d'une autre discipline, il demande l'avis du service d'accueil. Les
                        formalités administratives de mutation inter-service sont entamées auprès du bureau des entrées
                        dès que l'accord écrit est donné par le service d'accueil.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="750">
                        <strong>Admission à la suite d'un transfert d'un autre établissement de soins</strong><br>
                        L'admission dans le cadre des évacuations obéit aux règles contenues dans la partie évacuation.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="800">
                        <strong>Admission d'un garde malade</strong><br>
                        L'admission d'un garde malade est décidée par le Médecin traitant de l'EPH.
                    </li>
                </ol>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="850">
                    <h3>Si vous arrivez en urgence</h3>
                    <p>Aucune formalité ne retardera votre entrée. Dès que possible, il est important de faire
                        régulariser votre dossier, soit par un membre de votre entourage, soit par vous-même.</p>
                </div>
            </section>

            <!-- Section Votre Séjour -->
            <!-- Section Votre Séjour -->
            <section id="sejour" class="charte-section" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title"><i class="fas fa-bed"></i> Votre Séjour</h2>
                <h3 data-aos="fade-up" data-aos-delay="200">Des équipes pour vous prendre en charge</h3>
                <p data-aos="fade-up" data-aos-delay="250">Tout au long de votre séjour, vous allez rencontrer
                    différents professionnels de la santé. Pour mieux les connaître, voici leurs missions.</p>

                <div class="right-box" data-aos="fade-right" data-aos-delay="300">
                    <h3>L'équipe médicale</h3>
                    <p>Elle est placée sous la responsabilité d'un médecin chef de service, assisté de praticiens
                        spécialistes et de médecins généralistes. L'un des membres de cette équipe
                        s'occupera plus particulièrement de vous. Il vous donnera toutes les informations sur votre état
                        de santé ou sur les examens et traitements prescrits. Il pourra recevoir votre famille sur
                        rendez-vous.</p>
                </div>

                <div class="right-box" data-aos="fade-right" data-aos-delay="350">
                    <h3>L'équipe paramédicale</h3>
                    <p>Elle est notamment composée d'un coordinateur, de cadres paramédicaux, d'infirmiers,
                        d'aides-soignants et d'agents des services hospitaliers.</p>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-user-nurse"></i> <strong>Le cadre de santé</strong> coordonne les soins qui
                            vous sont dispensés. Il est à votre disposition pour recueillir vos demandes ou
                            observations.</li>
                        <li><i class="fas fa-stethoscope"></i> <strong>L'infirmière</strong> vous donne les soins que
                            nécessite votre état de santé et applique les prescriptions médicales.</li>
                        <li><i class="fas fa-hands-helping"></i> <strong>L'aide-soignante</strong> assiste l'infirmière,
                            assure l'hygiène de votre chambre et veille à votre confort.</li>
                        <li><i class="fas fa-broom"></i> <strong>L'agent des services hospitaliers</strong> effectue
                            l'entretien des services.</li>
                    </ul>
                    <p>Vous pourrez identifier l'ensemble des membres de l'équipe soignante grâce au badge sur lequel
                        sont indiqués leur nom et fonction.</p>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="400">Autres professionnels</h3>
                <p data-aos="fade-up" data-aos-delay="450">D'autres professionnels de santé collaborent également aux
                    soins :</p>
                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="500"><i class="fas fa-utensils"></i> Diététiciens</li>
                    <li data-aos="fade-left" data-aos-delay="550"><i class="fas fa-user-nurse"></i> Infirmiers
                        spécialisés</li>
                    <li data-aos="fade-left" data-aos-delay="600"><i class="fas fa-hand"></i>
                        Kinésithérapeutes</li>
                    <li data-aos="fade-left" data-aos-delay="650"><i class="fas fa-x-ray"></i> Manipulateurs
                        d'électroradiologie médicale</li>
                    <li data-aos="fade-left" data-aos-delay="700"><i class="fas fa-comments"></i> Orthophonistes</li>
                    <li data-aos="fade-left" data-aos-delay="750"><i class="fas fa-brain"></i> Psychologues</li>
                    <li data-aos="fade-left" data-aos-delay="800"><i class="fas fa-flask"></i> Techniciens de
                        laboratoire</li>
                </ul>

                <p data-aos="fade-up" data-aos-delay="850">D'autres professionnels administratifs et techniques
                    (électriciens, plombiers, jardiniers, cuisiniers...) travaillent également pour votre confort.</p>

                <div class="info-card" data-aos="fade-up" data-aos-delay="900">
                    <h3>La lutte contre les infections nosocomiales</h3>
                    <p>Les infections nosocomiales sont des infections qui peuvent être contractées au cours d'une
                        hospitalisation, mais dont la fréquence est heureusement faible. La prévention de ces infections
                        est une préoccupation de l'ensemble des personnes travaillant à l'hôpital.</p>
                    <p>Le Comité de Lutte contre les Infections Nosocomiales (CLIN) et l'équipe opérationnelle d'hygiène
                        développent et coordonnent les actions visant à empêcher la survenue de telles infections. Si
                        vous souhaitez plus d'informations à ce sujet, n'hésitez pas à en parler avec votre médecin ou
                        le cadre infirmier du service.</p>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="950">Vie quotidienne dans le service</h3>

                <div class="right-box" data-aos="fade-right" data-aos-delay="1000">
                    <h3>Vêtements et linge</h3>
                    <p>Prévoyez pour votre séjour des vêtements confortables (pyjama, robe de chambre, pantoufles, …)
                        ainsi qu'un nécessaire de toilette : serviette et gant, savon, brosse à dents et dentifrice.</p>
                    <p>Le linge de lit et de table est fourni et entretenu par l'hôpital.</p>
                    <p><strong>Dans la mesure du possible, n'apportez pas d'objets de valeur.</strong></p>
                </div>

                <div class="right-box" data-aos="fade-right" data-aos-delay="1050">
                    <h3>Hygiène</h3>
                    <p>La toilette fait partie intégrante des soins d'hygiène.</p>
                    <p>Si votre état de santé le permet, vous pourrez effectuer seul(e) votre toilette. En cas de
                        besoin, l'équipe soignante vous apportera une aide.</p>
                </div>

                <div class="right-box" data-aos="fade-right" data-aos-delay="1100">
                    <h3>Repas</h3>
                    <p>Les menus élaborés par une équipe pluridisciplinaire respectent les recommandations
                        nutritionnelles. Vos repas sont préparés au sein même de l'hôpital, assurant qualité et hygiène
                        alimentaire.</p>
                    <p>Vous pouvez choisir votre menu avec l'aide-soignante du service. En fonction de votre état de
                        santé et des prescriptions médicales, un régime personnalisé pourra être mis en place.</p>
                    <p>Les horaires de repas sont généralement :</p>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-coffee"></i> Petit-déjeuner : vers 8 heures</li>
                        <li><i class="fas fa-hamburger"></i> Déjeuner : vers 12 heures</li>
                        <li><i class="fas fa-utensils"></i> Dîner : vers 18h30</li>
                    </ul>
                </div>

                <div class="right-box" data-aos="fade-right" data-aos-delay="1150">
                    <h3>Prothèses</h3>
                    <p>Le port de prothèse (lunettes, lentilles, prothèse dentaire ou auditive…) doit être signalé à
                        l'équipe soignante. Pensez à prévoir les produits nécessaires à leur entretien. Afin d'éviter
                        les risques de perte, rangez-les soigneusement.</p>
                </div>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="1200">
                    <h3>Règlement et sécurité</h3>
                    <p>Pour le confort et la sécurité de tous, il vous est demandé :</p>
                    <ul class="guidelines-list">
                        <li><i class="fas fa-smoking-ban"></i> De ne pas fumer à l'intérieur de l'hôpital</li>
                        <li><i class="fas fa-volume-mute"></i> De ne pas troubler le repos des autres malades, de jour
                            comme de nuit</li>
                    </ul>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="1250">Détente et distractions</h3>
                <p data-aos="fade-up" data-aos-delay="1300">Vous pouvez apporter votre poste de radio (le casque est
                    recommandé). Il est également possible de s'équiper d'un téléviseur dans certains services.</p>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="1350">
                    <h3>Visites</h3>
                    <p>Les visites sont autorisées quotidiennement entre 13H30 et 15H00. Pour plus d'informations,
                        consultez notre <a href="visite.php">page dédiée aux visites</a>.</p>
                </div>
            </section>

            <!-- Section Votre Sortie -->
            <section id="sortie" class="charte-section" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title"><i class="fas fa-door-open"></i> Votre Sortie</h2>

                <div class="right-box" data-aos="fade-right" data-aos-delay="200">
                    <h3>Décision de sortie</h3>
                    <p>Votre sortie peut être décidée par votre médecin traitant ou par un des parents contre avis
                        médical. Le médecin signe la sortie sur le bulletin d'admission et la fiche navette, puis remet
                        le dossier administratif et médical au bureau d'admissions.</p>
                </div>

                <h3 data-aos="fade-up" data-aos-delay="250">Procédure de sortie</h3>
                <ol class="numbered-list">
                    <li data-aos="fade-left" data-aos-delay="300">
                        <strong>Passage au bureau des entrées</strong><br>
                        Vous devez vous présenter au guichet de la régie où vous récupérerez votre dossier médical,
                        après avoir honoré vos frais d'hospitalisation. Si vous
                        êtes exempté de paiement, vous devrez présenter une carte justificative (carte de démuni ou de
                        malade chronique).
                    </li>
                    <li data-aos="fade-left" data-aos-delay="350">
                        <strong>Finalisation administrative</strong><br>
                        La fiche navette sera ensuite transférée au bureau des admissions où votre sortie administrative
                        sera enregistrée.
                    </li>
                    <li data-aos="fade-left" data-aos-delay="400">
                        <strong>Documents disponibles</strong><br>
                        Vous pouvez demander un certificat de présence lors de votre hospitalisation et un certificat de
                        séjour à votre sortie de l'hôpital.
                    </li>
                </ol>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="450">
                    <h3>Sortie contre avis médical</h3>
                    <p>Si vous décidez de quitter l'établissement contre avis médical, vous devrez signer une décharge
                        qui dégagera l'établissement et le médecin de toute responsabilité quant aux conséquences qui
                        pourraient résulter de cette décision.</p>
                </div>

                <div class="special-notice" data-aos="flip-up" data-aos-delay="500">
                    <h3>En cas de décès</h3>
                    <p>En cas de décès à l'hôpital, le dossier est transféré au bureau des entrées avec le constat de
                        décès. Les proches du défunt pourront récupérer les documents suivants : constat de décès,
                        certificat de non-contagion et déclaration de décès du bureau des admissions.</p>
                    <p>Ces documents devront être remis à l'APC de Sobha qui déclarera le décès et remettra
                        l'acte de décès, permettant de retirer le permis de transport de la dépouille au niveau de l'APC de Sobha.</p>
                    <p>Dans le cas d'un décès d'une personne d'une autre wilaya, les proches devront se déplacer au
                        siège de la wilaya de Chlef pour récupérer le permis de transport de la dépouille.</p>
                </div>
            </section>

            <!-- Section Vos Devoirs -->
            <section id="devoirs" class="charte-section" data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title"><i class="fas fa-balance-scale"></i> Vos Devoirs</h2>

                <p data-aos="fade-up" data-aos-delay="150">En tant que patient, vous avez également des devoirs envers
                    l'établissement, le personnel soignant et les autres patients :</p>

                <ul class="guidelines-list">
                    <li data-aos="fade-left" data-aos-delay="200"><i class="fas fa-check-circle"></i> Respecter le
                        personnel soignant, administratif et technique</li>
                    <li data-aos="fade-left" data-aos-delay="250"><i class="fas fa-check-circle"></i> Respecter les
                        autres patients et leur tranquillité</li>
                    <li data-aos="fade-left" data-aos-delay="300"><i class="fas fa-check-circle"></i> Respecter les
                        locaux et le matériel mis à votre disposition</li>
                    <li data-aos="fade-left" data-aos-delay="350"><i class="fas fa-check-circle"></i> Fournir toutes les
                        informations nécessaires à votre prise en charge</li>
                    <li data-aos="fade-left" data-aos-delay="400"><i class="fas fa-check-circle"></i> Suivre les
                        prescriptions, les traitements et les consignes médicales</li>
                    <li data-aos="fade-left" data-aos-delay="450"><i class="fas fa-check-circle"></i> Respecter
                        l'interdiction de fumer dans l'enceinte de l'établissement</li>
                    <li data-aos="fade-left" data-aos-delay="500"><i class="fas fa-check-circle"></i> Limiter le bruit
                        et respecter les heures de visite</li>
                </ul>
            </section>

            <div class="cta-section" data-aos="zoom-in" data-aos-delay="100">
                <h3>Votre avis nous intéresse</h3>
                <p>Afin d'améliorer constamment la qualité de nos services, n'hésitez pas à nous faire part de vos
                    remarques et suggestions.</p>
                <a href="index.php#contact" class="btn btn-primary" data-aos="fade-up"
                    data-aos-delay="200">Contactez-nous</a>
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

<?php include('footer.php'); ?>