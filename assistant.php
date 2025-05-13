<?php
require_once 'header.php';
?>

<main class="ia-assistant-page">
    <div class="container">
        <section class="page-header">
            <h2><i class="fas fa-robot"></i> Assistant IA Médical</h2>
            <p class="subtitle">Un outil pour vous aider à mieux comprendre vos symptômes et vos préoccupations de santé</p>
        </section>

        <section class="ia-info">
            <div class="info-card">
                <div class="card-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="card-content">
                    <h3>Important</h3>
                    <p>Cet assistant IA est conçu uniquement pour fournir des informations générales et ne remplace en aucun cas une consultation médicale. En cas d'urgence ou de symptômes graves, veuillez contacter immédiatement un médecin ou vous rendre aux urgences.</p>
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
                            <p>Bonjour, je suis l'assistant IA de <?php echo $hospital_name; ?>. Je peux vous aider à comprendre des symptômes ou des conditions médicales. Que puis-je faire pour vous aujourd'hui?</p>
                            <p class="disclaimer">Rappel: Je ne fournis que des informations générales et ne remplace pas l'avis d'un médecin.</p>
                        </div>
                    </div>
                </div>

                <div class="chat-input">
                    <form id="chatForm">
                        <textarea id="userInput" placeholder="Décrivez vos symptômes ou posez une question..." required></textarea>
                        <button type="submit" id="sendBtn">
                            <i class="fas fa-paper-plane"></i> Envoyer
                        </button>
                    </form>
                </div>
            </div>

            <div class="ia-sidebar">
                <div class="sidebar-section">
                    <h3>Suggestions rapides</h3>
                    <div class="quick-suggestions">
                        <button class="suggestion-btn" data-question="Quels sont les symptômes courants de la grippe?">Symptômes de la grippe</button>
                        <button class="suggestion-btn" data-question="Comment prévenir les maladies cardiaques?">Prévention maladies cardiaques</button>
                        <button class="suggestion-btn" data-question="Quand faut-il consulter pour des maux de tête?">Consultation pour maux de tête</button>
                        <button class="suggestion-btn" data-question="Quels sont les symptômes du diabète?">Symptômes du diabète</button>
                        <button class="suggestion-btn" data-question="Que faire en cas de fièvre élevée?">Gestion de la fièvre</button>
                        <button class="suggestion-btn" data-question="Comment reconnaître une réaction allergique?">Reconnaître allergies</button>
                    </div>
                </div>
                
                <div class="sidebar-section emergency-section">
                    <h3>Services d'urgence</h3>
                    <p><i class="fas fa-phone-alt"></i> Urgences: <strong>+213 27 71 91 97</strong></p>
                    <p><i class="fas fa-ambulance"></i> Ambulance: <strong>+213 27 71 91 98</strong></p>
                    <button class="emergency-btn" id="emergencyBtn">
                        <i class="fas fa-exclamation-triangle"></i> Situation d'urgence?
                    </button>
                </div>
                
                <div class="sidebar-section">
                    <h3>Ressources utiles</h3>
                    <ul class="resources-list">
                        <li><a href="services.php"><i class="fas fa-clinic-medical"></i> Nos services médicaux</a></li>
                        <li><a href="contact.php"><i class="fas fa-calendar-check"></i> Prendre rendez-vous</a></li>
                        <li><a href="charte.php"><i class="fas fa-file-medical"></i> Charte du patient</a></li>
                        <li><a href="faq.php"><i class="fas fa-question-circle"></i> Questions fréquentes</a></li>
                    </ul>
                </div>
                
                <div class="sidebar-section">
                    <h3>Limites de l'assistant</h3>
                    <p>Cet assistant ne peut pas:</p>
                    <ul class="limitations-list">
                        <li>Diagnostiquer des maladies</li>
                        <li>Prescrire des médicaments</li>
                        <li>Remplacer une consultation médicale</li>
                        <li>Gérer des situations d'urgence</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Modal pour les situations d'urgence -->
        <div id="emergencyModal" class="modal">
            <div class="modal-content">
                <span class="close-modal">&times;</span>
                <h3><i class="fas fa-exclamation-triangle"></i> Situation d'urgence</h3>
                <div class="emergency-info">
                    <p>Si vous présentez l'un des symptômes suivants, veuillez contacter immédiatement les services d'urgence:</p>
                    <ul>
                        <li>Difficultés respiratoires graves</li>
                        <li>Douleur thoracique intense</li>
                        <li>Perte de conscience</li>
                        <li>Saignement abondant incontrôlable</li>
                        <li>Déficit neurologique brutal (paralysie, troubles de la parole)</li>
                        <li>Brûlure grave ou étendue</li>
                    </ul>
                    
                    <div class="emergency-contacts">
                        <div class="contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <div>
                                <h4>Urgences hôpital</h4>
                                <p>+213 27 71 91 97</p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-ambulance"></i>
                            <div>
                                <h4>Service ambulance</h4>
                                <p>+213 27 71 91 98</p>
                            </div>
                        </div>
                    </div>                   
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
    --shadow-sm: 0 2px 5px rgba(0,0,0,0.1);
    --shadow-md: 0 4px 12px rgba(0,0,0,0.1);
    --shadow-lg: 0 8px 20px rgba(0,0,0,0.15);
    --border-radius-sm: 5px;
    --border-radius-md: 10px;
    --border-radius-lg: 15px;
    --border-radius-xl: 25px;
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
    border-left: 5px solid var(--primary-color);
    border-radius: var(--border-radius-sm);
    padding: 20px;
    display: flex;
    align-items: flex-start;
    box-shadow: var(--shadow-sm);
}

.card-icon {
    font-size: 30px;
    color: var(--primary-color);
    margin-right: 20px;
}

.card-content h3 {
    margin-top: 0;
    color: var(--primary-color);
    font-weight: 600;
}

.ia-interface {
    display: flex;
    gap: 30px;
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
    margin-right: 15px;
    flex-shrink: 0;
}

.user .message-avatar {
    background-color: var(--secondary-color);
}

.message-content {
    background-color: var(--light-gray);
    padding: 15px;
    border-radius: var(--border-radius-lg);
    border-top-left-radius: 0;
    max-width: 80%;
    box-shadow: var(--shadow-sm);
}

.user .message-content {
    background-color: var(--primary-light);
    border-top-left-radius: var(--border-radius-lg);
    border-top-right-radius: 0;
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
}

#userInput:focus {
    border-color: var(--primary-color);
}

#sendBtn {
    align-self: flex-end;
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
    text-align: left;
    font-weight: 500;
}

.suggestion-btn:hover {
    background-color: var(--primary-light);
    border-color: var(--primary-color);
    transform: translateY(-2px);
}

.emergency-section {
    border-left: 4px solid var(--danger-color);
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
    margin-right: 10px;
    color: var(--primary-color);
}

.limitations-list {
    padding-left: 20px;
    margin: 10px 0 0;
    color: var(--dark-gray);
}

.limitations-list li {
    margin-bottom: 8px;
}

/* Modal pour les situations d'urgence */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
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
}

.close-modal {
    position: absolute;
    top: 15px;
    right: 20px;
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
    padding-left: 20px;
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

/* Animation d'entrée des messages */
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

/* Style du défilement */
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

/* Indicateur de chargement */
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

/* Responsive */
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatForm = document.getElementById('chatForm');
    const userInput = document.getElementById('userInput');
    const chatMessages = document.getElementById('chatMessages');
    const suggestionBtns = document.querySelectorAll('.suggestion-btn');
    const emergencyBtn = document.getElementById('emergencyBtn');
    const emergencyModal = document.getElementById('emergencyModal');
    const closeModal = document.querySelector('.close-modal');
    const callNowBtn = document.getElementById('callNowBtn');
    
    // Ajustement automatique de la hauteur du textarea
    userInput.addEventListener('input', function() {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });
    
    // Base de connaissances médicales avancée
    const medicalDatabase = {
        'conditions': {
            'grippe': {
                keywords: ['grippe', 'flu', 'fièvre', 'courbatures', 'rhume'],
                symptoms: [
                    'Fièvre élevée soudaine (38°C ou plus)',
                    'Courbatures et douleurs musculaires',
                    'Fatigue intense',
                    'Maux de tête',
                    'Toux sèche',
                    'Congestion nasale',
                    'Mal de gorge'
                ],
                recommendations: [
                    'Se reposer et s\'hydrater régulièrement',
                    'Prendre du paracétamol pour soulager la fièvre et les douleurs (suivre la posologie recommandée)',
                    'Éviter les contacts avec d\'autres personnes pour limiter la contagion',
                    'Consulter un médecin si les symptômes sont sévères ou persistent plus de 5 jours'
                ],
                complications: [
                    'Pneumonie',
                    'Bronchite',
                    'Sinusite',
                    'Otite',
                    'Aggravation des maladies chroniques (asthme, diabète, etc.)'
                ],
                urgence: false
            },
            'cardiaque': {
                keywords: ['coeur', 'cardiaque', 'cardiovasculaire', 'cardio', 'infarctus', 'pression', 'thoracique', 'poitrine', 'douleur poitrine'],
                prevention: [
                    'Adopter une alimentation équilibrée (régime méditerranéen)',
                    'Pratiquer une activité physique régulière (au moins 150 min/semaine)',
                    'Éviter le tabac et limiter la consommation d\'alcool',
                    'Gérer son stress',
                    'Contrôler sa tension artérielle et son cholestérol',
                    'Maintenir un poids santé',
                    'Limiter la consommation de sel et de graisses saturées'
                ],
                risquesPrincipaux: [
                    'Hypertension artérielle',
                    'Taux de cholestérol élevé',
                    'Diabète',
                    'Tabagisme',
                    'Obésité',
                    'Sédentarité',
                    'Antécédents familiaux'
                ],
                signesAlerte: [
                    'Douleur thoracique (sensation d\'étau, de compression)',
                    'Douleur irradiant vers la mâchoire, le cou, les épaules ou les bras',
                    'Essoufflement inhabituel',
                    'Fatigue extrême sans raison apparente',
                    'Palpitations',
                    'Nausées, vomissements (particulièrement chez les femmes)'
                ],
                urgence: true
            },
            'maux de tête': {
                keywords: ['tête', 'migraine', 'céphalée', 'cephalee', 'mal de tête', 'douleur tête', 'crâne'],
                types: [
                    'Céphalées de tension (stress, fatigue, mauvaise posture)',
                    'Migraines (douleur pulsatile, sensibilité à la lumière et au bruit)',
                    'Céphalées en grappe (extrêmement douloureuses, autour d\'un œil)',
                    'Céphalées secondaires (dues à une autre condition médicale)'
                ],
                recommandations: [
                    'Repos dans un environnement calme et sombre (pour migraines)',
                    'Hydratation adéquate',
                    'Application de froid ou de chaud sur le front ou la nuque',
                    'Médicaments en vente libre (paracétamol, ibuprofène) selon la posologie recommandée',
                    'Techniques de relaxation et gestion du stress'
                ],
                consulter: [
                    'Maux de tête soudains et violents ("les pires de votre vie")',
                    'Maux de tête accompagnés de fièvre, raideur de la nuque, confusion',
                    'Maux de tête après un traumatisme crânien',
                    'Maux de tête qui s\'aggravent sur plusieurs jours',
                    'Maux de tête qui perturbent significativement votre quotidien',
                    'Maux de tête accompagnés de troubles de la vision, de la parole ou de faiblesse'
                ],
                urgence: false
            },
            'diabète': {
                keywords: ['diabete', 'diabète', 'sucre', 'glycémie', 'glycemie', 'soif', 'uriner'],
                types: [
                    'Type 1 (maladie auto-immune, généralement diagnostiquée chez les enfants et jeunes adultes)',
                    'Type 2 (lié au mode de vie, plus fréquent chez les adultes)',
                    'Gestationnel (apparaît pendant la grossesse)'
                ],
                symptoms: [
                    'Soif excessive et bouche sèche',
                    'Mictions fréquentes, surtout la nuit',
                    'Fatigue inexpliquée',
                    'Perte de poids inexpliquée (diabète de type 1)',
                    'Vision floue',
                    'Cicatrisation lente des plaies',
                    'Infections fréquentes (urinaires, cutanées)',
                    'Fourmillements dans les mains et les pieds'
                ],
                facteurs: [
                    'Antécédents familiaux',
                    'Surpoids ou obésité',
                    'Sédentarité',
                    'Alimentation riche en sucres et graisses',
                    'Âge (risque accru après 45 ans)',
                    'Hypertension artérielle',
                    'Cholestérol élevé'
                ],
                gestion: [
                    'Surveiller régulièrement sa glycémie',
                    'Suivre un régime alimentaire équilibré',
                    'Pratiquer une activité physique régulière',
                    'Prendre les médicaments prescrits',
                    'Surveiller ses pieds quotidiennement',
                    'Contrôles médicaux réguliers'
                ],
                urgence: false
            },
            'allergies': {
                keywords: ['allergie', 'allergique', 'réaction', 'urticaire', 'éruption', 'gonflement'],
                signs: [
                    'Éruptions cutanées ou urticaire',
                    'Démangeaisons',
                    'Gonflement des lèvres, de la langue ou de la gorge',
                    'Congestion nasale, écoulement nasal',
                    'Yeux rouges, larmoyants et qui démangent',
                    'Difficultés respiratoires ou respiration sifflante',
                    'Toux',
                    'Nausées, vomissements ou diarrhée'
                ],
                allergenesCommuns: [
                    'Pollens d\'arbres, d\'herbes et de mauvaises herbes',
                    'Acariens',
                    'Moisissures',
                    'Poils d\'animaux',
                    'Certains aliments (arachides, fruits de mer, œufs, lait)',
                    'Certains médicaments (pénicilline, aspirine, AINS)'
                ],
                traitements: [
                    'Éviter les allergènes identifiés',
                    'Antihistaminiques',
                    'Décongestionnants nasaux',
                    'Sprays nasaux corticostéroïdes',
                    'Collyre anti-allergique',
                    'Immunothérapie (désensibilisation)'
                ],
                urgence: true
            },
            'fièvre': {
                keywords: ['fièvre', 'température', 'chaud', 'thermomètre', 'transpiration'],
                definition: 'Température corporelle supérieure à 38°C, généralement symptôme d\'une infection ou inflammation',
                mesures: [
                    'Fièvre légère (38-38.5°C): généralement sans danger',
                    'Fièvre modérée (38.5-39.5°C): inconfortable mais rarement dangereuse',
                    'Fièvre élevée (39.5-40.5°C): nécessite attention médicale',
                    'Fièvre très élevée (>40.5°C): urgence médicale'
                ],
                gestion: [
                    'S\'hydrater abondamment',
                    'Se reposer',
                    'S\'habiller légèrement',
                    'Maintenir une température ambiante modérée',
                    'Paracétamol ou ibuprofène selon la posologie recommandée (éviter l\'aspirine chez les enfants)'
                ],
                consulter: [
                    'Fièvre chez un nourrisson de moins de 3 mois',
                    'Fièvre persistant plus de 3 jours',
                    'Fièvre supérieure à 40°C',
                    'Fièvre accompagnée de raideur de la nuque, confusion, éruption cutanée',
                    'Fièvre chez une personne immunodéprimée'
                ],
                urgence: false
            }
        },
        'symptoms': {
            'douleur thoracique': {
                keywords: ['poitrine', 'thorax', 'thoracique', 'oppression', 'compression', 'étau'],
                possibleCauses: [
                    'Problèmes cardiaques (infarctus, angine de poitrine)',
                    'Problèmes pulmonaires (embolie pulmonaire, pneumonie)',
                    'Problèmes digestifs (reflux gastro-œsophagien)',
                    'Problèmes musculosquelettiques',
                    'Anxiété et attaques de panique'
                ],
                signesGravite: [
                    'Douleur intense, oppressante (sensation d\'étau)',
                    'Douleur irradiant vers le bras gauche, la mâchoire, le dos',
                    'Douleur accompagnée d\'essoufflement',
                    'Douleur accompagnée de nausées ou vomissements',
                    'Douleur avec sueurs froides',
                    'Perte de conscience'
                ],
                urgence: true
            },
            'difficultés respiratoires': {
                keywords: ['respiration', 'souffle', 'essoufflement', 'étouffement', 'haleter', 'suffocation'],
                possibleCauses: [
                    'Asthme',
                    'BPCO (bronchopneumopathie chronique obstructive)',
                    'Pneumonie',
                    'Embolie pulmonaire',
                    'Insuffisance cardiaque',
                    'Anxiété et attaques de panique',
                    'Réaction allergique'
                ],
                signesGravite: [
                    'Incapacité à parler en phrases complètes',
                    'Lèvres ou ongles bleuâtres',
                    'Utilisation des muscles du cou pour respirer',
                    'Respiration très rapide ou très lente',
                    'Confusion mentale'
                ],
                urgence: true
            },
            'maux de ventre': {
                keywords: ['ventre', 'abdomen', 'abdominal', 'estomac', 'digestif', 'douleur ventre'],
                possibleCauses: [
                    'Gastro-entérite',
                    'Appendicite',
                    'Calculs rénaux ou biliaires',
                    'Syndrome du côlon irritable',
                    'Ulcère gastrique',
                    'Pancréatite',
                    'Constipation',
                    'Intoxication alimentaire'
                ],
                signesGravite: [
                    'Douleur abdominale sévère et soudaine',
                    'Douleur abdominale avec fièvre élevée',
                    'Vomissements de sang',
                    'Selles noires ou sanglantes',
                    'Abdomen rigide et très sensible au toucher',
                    'Douleur intense irradiant vers le dos'
                ],
                recommendations: [
                    'Repos digestif',
                    'Hydratation adéquate',
                    'Alimentation légère',
                    'Éviter alcool, tabac et aliments épicés',
                    'Surveillance de l\'évolution des symptômes'
                ],
                urgence: false
            }
        }
    };
    
    // Fonction pour ajouter un message à la conversation
    function addMessage(text, isUser = false) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${isUser ? 'user' : 'bot'}`;
        
        const avatarDiv = document.createElement('div');
        avatarDiv.className = 'message-avatar';
        
        const icon = document.createElement('i');
        icon.className = isUser ? 'fas fa-user' : 'fas fa-robot';
        avatarDiv.appendChild(icon);
        
        const contentDiv = document.createElement('div');
        contentDiv.className = 'message-content';
        
        // Traiter le texte avec mise en forme pour les réponses de l'IA
        if (!isUser) {
            // Remplacer les marqueurs pour la mise en forme
            text = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>'); // Gras
            text = text.replace(/\*(.*?)\*/g, '<em>$1</em>'); // Italique
            
            // Détecter et formater les listes
            if (text.includes('<br>-')) {
                const parts = text.split('<br>-');
                const intro = parts.shift();
                
                let formattedText = intro + '<ul style="margin-top:10px;margin-bottom:10px;padding-left:20px;">';
                parts.forEach(item => {
                    formattedText += `<li style="margin-bottom:5px;">${item.trim()}</li>`;
                });
                formattedText += '</ul>';
                text = formattedText;
            }
        }
        
        const paragraph = document.createElement('p');
        paragraph.innerHTML = text;
        contentDiv.appendChild(paragraph);
        
        if (!isUser) {
            const disclaimer = document.createElement('p');
            disclaimer.className = 'disclaimer';
            disclaimer.textContent = 'Rappel: Je ne fournis que des informations générales et ne remplace pas l\'avis d\'un médecin.';
            contentDiv.appendChild(disclaimer);
        }
        
        messageDiv.appendChild(avatarDiv);
        messageDiv.appendChild(contentDiv);
        
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
    
    // Fonction pour ajouter un indicateur de chargement
    function addTypingIndicator() {
        const typingDiv = document.createElement('div');
        typingDiv.className = 'message bot typing-message';
        
        const avatarDiv = document.createElement('div');
        avatarDiv.className = 'message-avatar';
        
        const icon = document.createElement('i');
        icon.className = 'fas fa-robot';
        avatarDiv.appendChild(icon);
        
        const typingIndicator = document.createElement('div');
        typingIndicator.className = 'typing-indicator';
        
        for (let i = 0; i < 3; i++) {
            const dot = document.createElement('span');
            typingIndicator.appendChild(dot);
        }
        
        typingDiv.appendChild(avatarDiv);
        typingDiv.appendChild(typingIndicator);
        
        chatMessages.appendChild(typingDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
        
        return typingDiv;
    }
    
    // Fonction avancée pour analyser le message et générer une réponse médicale pertinente
    function processUserQuery(query) {
        query = query.toLowerCase();
        let response = '';
        let emergencyAlert = false;
        
        // Vérifier si c'est une situation potentiellement urgente
        const emergencyKeywords = ['urgence', 'grave', 'urgent', 'immédiat', 'ambulance', 'mourir', 'inconscient', 'respire pas'];
        const potentialEmergency = emergencyKeywords.some(keyword => query.includes(keyword));
        
        if (potentialEmergency) {
            return {
                response: `**Situation potentiellement urgente détectée.**<br><br>
                          Si vous ou quelqu'un près de vous êtes en situation d'urgence médicale, veuillez immédiatement contacter les services d'urgence au <strong>+213 27 71 91 97</strong> ou rendez-vous aux urgences les plus proches.<br><br>
                          Ce service n'est pas conçu pour gérer les urgences médicales.`,
                emergency: true
            };
        }
        
        // Identifier la catégorie de la requête (condition ou symptôme)
        let foundMatch = false;
        let matchCategory = null;
        let matchType = null;
        
        // Recherche dans les conditions médicales
        for (const condition in medicalDatabase.conditions) {
            const entry = medicalDatabase.conditions[condition];
            if (entry.keywords.some(keyword => query.includes(keyword))) {
                foundMatch = true;
                matchCategory = 'conditions';
                matchType = condition;
                break;
            }
        }
        
        // Si aucune condition n'est trouvée, chercher dans les symptômes
        if (!foundMatch) {
            for (const symptom in medicalDatabase.symptoms) {
                const entry = medicalDatabase.symptoms[symptom];
                if (entry.keywords.some(keyword => query.includes(keyword))) {
                    foundMatch = true;
                    matchCategory = 'symptoms';
                    matchType = symptom;
                    break;
                }
            }
        }
        
        // Générer une réponse basée sur les correspondances trouvées
        if (foundMatch) {
            const matchData = medicalDatabase[matchCategory][matchType];
            emergencyAlert = matchData.urgence || false;
            
            // Format de réponse spécifique à chaque catégorie et type
            if (matchCategory === 'conditions') {
                switch (matchType) {
                    case 'grippe':
                        response = `**Concernant la grippe:**<br><br>
                                  **Symptômes courants:**<br>`;
                        matchData.symptoms.forEach(symptom => {
                            response += `- ${symptom}<br>`;
                        });
                        
                        response += `<br>**Recommandations:**<br>`;
                        matchData.recommendations.forEach(rec => {
                            response += `- ${rec}<br>`;
                        });
                        
                        response += `<br>**Complications possibles à surveiller:**<br>`;
                        matchData.complications.forEach(comp => {
                            response += `- ${comp}<br>`;
                        });
                        break;
                        
                    case 'cardiaque':
                        response = `**Concernant la santé cardiovasculaire:**<br><br>
                                  **Prévention des maladies cardiaques:**<br>`;
                        matchData.prevention.forEach(prev => {
                            response += `- ${prev}<br>`;
                        });
                        
                        response += `<br>**Facteurs de risque principaux:**<br>`;
                        matchData.risquesPrincipaux.forEach(risk => {
                            response += `- ${risk}<br>`;
                        });
                        
                        response += `<br>**⚠️ Signes d'alerte nécessitant une consultation urgente:**<br>`;
                        matchData.signesAlerte.forEach(sign => {
                            response += `- ${sign}<br>`;
                        });
                        
                        response += `<br>**IMPORTANT:** Si vous ressentez une douleur thoracique intense, contactez immédiatement les services d'urgence.`;
                        break;
                        
                    case 'maux de tête':
                        response = `**Concernant les maux de tête:**<br><br>
                                  **Types principaux:**<br>`;
                        matchData.types.forEach(type => {
                            response += `- ${type}<br>`;
                        });
                        
                        response += `<br>**Recommandations pour soulager les maux de tête:**<br>`;
                        matchData.recommandations.forEach(rec => {
                            response += `- ${rec}<br>`;
                        });
                        
                        response += `<br>**Quand consulter un médecin:**<br>`;
                        matchData.consulter.forEach(cons => {
                            response += `- ${cons}<br>`;
                        });
                        break;
                        
                    case 'diabète':
                        response = `**Concernant le diabète:**<br><br>
                                  **Types de diabète:**<br>`;
                        matchData.types.forEach(type => {
                            response += `- ${type}<br>`;
                        });
                        
                        response += `<br>**Symptômes courants:**<br>`;
                        matchData.symptoms.forEach(symptom => {
                            response += `- ${symptom}<br>`;
                        });
                        
                        response += `<br>**Facteurs de risque:**<br>`;
                        matchData.facteurs.forEach(facteur => {
                            response += `- ${facteur}<br>`;
                        });
                        
                        response += `<br>**Gestion du diabète:**<br>`;
                        matchData.gestion.forEach(conseil => {
                            response += `- ${conseil}<br>`;
                        });
                        break;
                        
                    case 'allergies':
                        response = `**Concernant les réactions allergiques:**<br><br>
                                  **Signes d'une réaction allergique:**<br>`;
                        matchData.signs.forEach(sign => {
                            response += `- ${sign}<br>`;
                        });
                        
                        response += `<br>**Allergènes communs:**<br>`;
                        matchData.allergenesCommuns.forEach(allergene => {
                            response += `- ${allergene}<br>`;
                        });
                        
                        response += `<br>**Traitements possibles:**<br>`;
                        matchData.traitements.forEach(traitement => {
                            response += `- ${traitement}<br>`;
                        });
                        
                        response += `<br>**⚠️ IMPORTANT:** Une réaction allergique sévère (gonflement de la gorge, difficultés respiratoires) est une urgence médicale qui nécessite une intervention immédiate.`;
                        break;
                        
                    case 'fièvre':
                        response = `**Concernant la fièvre:**<br><br>
                                  **Définition:** ${matchData.definition}<br><br>
                                  **Niveaux de fièvre:**<br>`;
                        matchData.mesures.forEach(mesure => {
                            response += `- ${mesure}<br>`;
                        });
                        
                        response += `<br>**Comment gérer la fièvre:**<br>`;
                        matchData.gestion.forEach(conseil => {
                            response += `- ${conseil}<br>`;
                        });
                        
                        response += `<br>**Quand consulter un médecin:**<br>`;
                        matchData.consulter.forEach(situation => {
                            response += `- ${situation}<br>`;
                        });
                        break;
                }
            } 
            else if (matchCategory === 'symptoms') {
                switch (matchType) {
                    case 'douleur thoracique':
                        response = `**Concernant la douleur thoracique:**<br><br>
                                  **⚠️ IMPORTANT: Une douleur thoracique peut être le signe d'une urgence médicale.**<br><br>
                                  **Causes possibles:**<br>`;
                        matchData.possibleCauses.forEach(cause => {
                            response += `- ${cause}<br>`;
                        });
                        
                        response += `<br>**Signes de gravité nécessitant une attention médicale immédiate:**<br>`;
                        matchData.signesGravite.forEach(signe => {
                            response += `- ${signe}<br>`;
                        });
                        
                        response += `<br>Si vous présentez ces signes, contactez immédiatement les services d'urgence ou rendez-vous aux urgences les plus proches.`;
                        break;
                        
                    case 'difficultés respiratoires':
                        response = `**Concernant les difficultés respiratoires:**<br><br>
                                  **⚠️ IMPORTANT: Des difficultés respiratoires sévères nécessitent une attention médicale immédiate.**<br><br>
                                  **Causes possibles:**<br>`;
                        matchData.possibleCauses.forEach(cause => {
                            response += `- ${cause}<br>`;
                        });
                        
                        response += `<br>**Signes de gravité:**<br>`;
                        matchData.signesGravite.forEach(signe => {
                            response += `- ${signe}<br>`;
                        });
                        
                        response += `<br>Si vous présentez l'un de ces signes de gravité, contactez immédiatement les services d'urgence.`;
                        break;
                        
                    case 'maux de ventre':
                        response = `**Concernant les douleurs abdominales:**<br><br>
                                  **Causes possibles:**<br>`;
                        matchData.possibleCauses.forEach(cause => {
                            response += `- ${cause}<br>`;
                        });
                        
                        response += `<br>**Recommandations générales:**<br>`;
                        matchData.recommendations.forEach(rec => {
                            response += `- ${rec}<br>`;
                        });
                        
                        response += `<br>**Signes nécessitant une consultation médicale urgente:**<br>`;
                        matchData.signesGravite.forEach(signe => {
                            response += `- ${signe}<br>`;
                        });
                        break;
                }
            }
        } else {
            // Réponse par défaut si aucune correspondance n'est trouvée
            response = `Je n'ai pas pu identifier précisément votre question concernant "${query}".<br><br>
                      Pourriez-vous formuler votre question différemment ou être plus spécifique sur vos symptômes ou préoccupations?<br><br>
                      Je peux vous informer sur plusieurs conditions médicales comme la grippe, les maladies cardiaques, les maux de tête, le diabète, les allergies, ou des symptômes comme les douleurs thoraciques, les difficultés respiratoires ou les maux de ventre.`;
        }
        
        return {
            response: response,
            emergency: emergencyAlert
        };
    }
    
    // Gestion de la soumission du formulaire
    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const userMessage = userInput.value.trim();
        if (!userMessage) return;
        
        // Ajouter le message de l'utilisateur
        addMessage(userMessage, true);
        userInput.value = '';
        userInput.style.height = 'auto';
        
        // Ajouter l'indicateur de chargement
        const typingIndicator = addTypingIndicator();
        
        // Simuler un traitement du message (dans un environnement réel, cela pourrait être un appel API)
        setTimeout(() => {
            // Supprimer l'indicateur de chargement
            typingIndicator.remove();
            
            // Analyser le message et générer une réponse
            const responseData = processUserQuery(userMessage);
            
            // Ajouter la réponse de l'IA
            addMessage(responseData.response);
            
            // Si c'est une urgence potentielle, ouvrir la modal d'urgence
            if (responseData.emergency) {
                setTimeout(() => {
                    emergencyModal.style.display = 'block';
                }, 1000);
            }
        }, 1500);
    });
    
    // Gestion des boutons de suggestion
    suggestionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const question = this.getAttribute('data-question');
            userInput.value = question;
            userInput.focus();
            // Déclencher un événement input pour ajuster la hauteur du textarea
            const event = new Event('input', {
                bubbles: true,
                cancelable: true
            });
            userInput.dispatchEvent(event);
        });
    });
    
    // Gestion du bouton d'urgence
    emergencyBtn.addEventListener('click', function() {
        emergencyModal.style.display = 'block';
    });
    
    // Fermeture de la modal
    closeModal.addEventListener('click', function() {
        emergencyModal.style.display = 'none';
    });
    
    // Fermer la modal si on clique en dehors
    window.addEventListener('click', function(event) {
        if (event.target == emergencyModal) {
            emergencyModal.style.display = 'none';
        }
    });
    
    // Simulation d'appel téléphonique (pour démonstration)
    callNowBtn.addEventListener('click', function() {
        alert('Redirection vers l\'appel téléphonique...\nEn situation réelle, cette action lancerait un appel aux urgences.');
    });
    
    // Fonction pour ajouter des suggestions contextuelles en fonction des interactions
    function suggestContextualQuestions(query) {
        // Cette fonction pourrait être implémentée pour suggérer des questions pertinentes
        // en fonction de l'historique de la conversation
        // Non implémentée dans cette version par souci de simplicité
    }
});
</script>

<?php
require_once 'footer.php';
?>