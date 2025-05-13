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
                        <input type="text" id="userInput" placeholder="Décrivez vos symptômes ou posez une question..." required>
                        <button type="submit" id="sendBtn">
                            <i class="fas fa-paper-plane"></i>
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
                    </div>
                </div>
                
                <div class="sidebar-section">
                    <h3>Services d'urgence</h3>
                    <p><i class="fas fa-phone-alt"></i> Urgences: <strong>+213 27 71 91 97</strong></p>
                    <p><i class="fas fa-ambulance"></i> Ambulance: <strong>+213 27 71 91 98</strong></p>
                </div>
                
                <div class="sidebar-section">
                    <h3>Ressources utiles</h3>
                    <ul class="resources-list">
                        <li><a href="services.php"><i class="fas fa-clinic-medical"></i> Nos services médicaux</a></li>
                        <li><a href="contact.php"><i class="fas fa-calendar-check"></i> Prendre rendez-vous</a></li>
                        <li><a href="charte.php"><i class="fas fa-file-medical"></i> Charte du patient</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<style>
.ia-assistant-page {
    padding: 40px 0;
    min-height: 80vh;
}

.page-header {
    text-align: center;
    margin-bottom: 30px;
}

.page-header h2 {
    color: var(--primary-color);
    margin-bottom: 10px;
    font-size: 2.5rem;
}

.page-header .subtitle {
    color: var(--secondary-color);
    font-size: 1.2rem;
}

.ia-info {
    margin-bottom: 30px;
}

.info-card {
    background-color: #f8f9fa;
    border-left: 5px solid var(--primary-color);
    border-radius: 5px;
    padding: 20px;
    display: flex;
    align-items: flex-start;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.card-icon {
    font-size: 30px;
    color: var(--primary-color);
    margin-right: 20px;
}

.card-content h3 {
    margin-top: 0;
    color: var(--primary-color);
}

.ia-interface {
    display: flex;
    gap: 30px;
}

.chat-container {
    flex: 1;
    display: flex;
    flex-direction: column;
    height: 550px;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
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
    background-color: #f1f3f5;
    padding: 15px;
    border-radius: 15px;
    border-top-left-radius: 0;
    max-width: 80%;
}

.user .message-content {
    background-color: #e6f7ff;
    border-top-left-radius: 15px;
    border-top-right-radius: 0;
}

.message-content p {
    margin: 0;
    line-height: 1.5;
}

.message-content .disclaimer {
    font-size: 0.8rem;
    color: #6c757d;
    margin-top: 5px;
    font-style: italic;
}

.chat-input {
    padding: 15px;
    border-top: 1px solid #e9ecef;
}

#chatForm {
    display: flex;
}

#userInput {
    flex: 1;
    padding: 12px 15px;
    border: 1px solid #ced4da;
    border-radius: 25px;
    font-size: 16px;
    outline: none;
    transition: border-color 0.3s;
}

#userInput:focus {
    border-color: var(--primary-color);
}

#sendBtn {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background-color: var(--primary-color);
    color: white;
    border: none;
    margin-left: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
}

#sendBtn:hover {
    background-color: var(--dark-color);
}

.ia-sidebar {
    width: 300px;
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.sidebar-section {
    margin-bottom: 25px;
}

.sidebar-section h3 {
    color: var(--primary-color);
    margin-top: 0;
    margin-bottom: 15px;
    padding-bottom: 10px;
    border-bottom: 1px solid #e9ecef;
}

.quick-suggestions {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.suggestion-btn {
    padding: 10px 15px;
    background-color: #f1f3f5;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    transition: background-color 0.3s;
    text-align: left;
}

.suggestion-btn:hover {
    background-color: #e2e6ea;
}

.resources-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.resources-list li {
    margin-bottom: 10px;
}

.resources-list a {
    color: var(--secondary-color);
    text-decoration: none;
    display: flex;
    align-items: center;
}

.resources-list a:hover {
    color: var(--primary-color);
}

.resources-list i {
    margin-right: 10px;
    color: var(--primary-color);
}

@media (max-width: 992px) {
    .ia-interface {
        flex-direction: column;
    }
    
    .ia-sidebar {
        width: 100%;
    }
}

@media (max-width: 768px) {
    .info-card {
        flex-direction: column;
    }
    
    .card-icon {
        margin-bottom: 15px;
    }
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

.message {
    animation: messageIn 0.3s ease;
}

/* Style du défilement */
.chat-messages::-webkit-scrollbar {
    width: 6px;
}

.chat-messages::-webkit-scrollbar-track {
    background: #f1f1f1;
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
    border-radius: 15px;
    background-color: #f1f3f5;
    margin-bottom: 20px;
    width: fit-content;
}

.typing-indicator span {
    height: 8px;
    width: 8px;
    background-color: #bbb;
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatForm = document.getElementById('chatForm');
    const userInput = document.getElementById('userInput');
    const chatMessages = document.getElementById('chatMessages');
    const suggestionBtns = document.querySelectorAll('.suggestion-btn');
    
    // Base de connaissances simplifiée pour les réponses de l'IA
    const knowledgeBase = {
        'grippe': {
            keywords: ['grippe', 'flu', 'fièvre', 'courbatures'],
            response: `Les symptômes courants de la grippe comprennent:<br>
                      - Fièvre élevée soudaine (38°C ou plus)<br>
                      - Courbatures et douleurs musculaires<br>
                      - Fatigue intense<br>
                      - Maux de tête<br>
                      - Toux sèche<br>
                      - Mal de gorge<br>
                      <br>Il est recommandé de se reposer, boire beaucoup de liquides et consulter un médecin si les symptômes sont sévères ou persistent.`
        },
        'cardio': {
            keywords: ['coeur', 'cardiaque', 'cardiovasculaire', 'cardio', 'infarctus'],
            response: `Pour prévenir les maladies cardiaques, il est recommandé de:<br>
                      - Adopter une alimentation équilibrée (régime méditerranéen)<br>  
                      - Pratiquer une activité physique régulière (au moins 150 min/semaine)<br>
                      - Éviter le tabac et limiter la consommation d'alcool<br>
                      - Gérer son stress<br>
                      - Contrôler sa tension artérielle et son cholestérol<br>
                      <br>Un suivi médical régulier est essentiel, surtout si vous avez des antécédents familiaux.`
        },
        'maux de tête': {
            keywords: ['tête', 'migraine', 'céphalée', 'cephalee', 'mal de tête'],
            response: `Il est conseillé de consulter un médecin pour des maux de tête dans les cas suivants:<br>
                      - Maux de tête soudains et violents ("les pires de votre vie")<br>
                      - Maux de tête accompagnés de fièvre, raideur de la nuque, confusion<br>
                      - Maux de tête après un traumatisme crânien<br>
                      - Maux de tête qui s'aggravent sur plusieurs jours<br>
                      - Maux de tête qui perturbent significativement votre quotidien<br>
                      <br>N'hésitez pas à consulter notre service de neurologie pour un diagnostic précis.`
        },
        'diabète': {
            keywords: ['diabete', 'diabète', 'sucre', 'glycémie', 'glycemie'],
            response: `Les symptômes courants du diabète comprennent:<br>
                      - Soif excessive et bouche sèche<br>
                      - Mictions fréquentes, surtout la nuit<br>
                      - Fatigue inexpliquée<br>
                      - Perte de poids inexpliquée (diabète de type 1)<br>
                      - Vision floue<br>
                      - Cicatrisation lente des plaies<br>
                      <br>Si vous présentez ces symptômes, il est important de consulter rapidement un médecin pour un dépistage.`
        },
        'default': {
            response: `Je ne suis pas en mesure de fournir des informations spécifiques sur cette condition. Pour des conseils médicaux précis, je vous recommande de consulter un professionnel de santé. Vous pouvez prendre rendez-vous avec l'un de nos médecins en contactant notre accueil au +213 27 71 91 97 ou en visitant notre page de contact.`
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
    
    // Fonction pour générer une réponse en fonction de l'entrée utilisateur
    function generateResponse(input) {
        input = input.toLowerCase();
        
        // Recherche dans la base de connaissances
        for (const category in knowledgeBase) {
            if (category === 'default') continue;
            
            const entry = knowledgeBase[category];
            if (entry.keywords && entry.keywords.some(keyword => input.includes(keyword))) {
                return entry.response;
            }
        }
        
        return knowledgeBase.default.response;
    }
    
    // Gestion de la soumission du formulaire
    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const userMessage = userInput.value.trim();
        if (!userMessage) return;
        
        // Ajouter le message de l'utilisateur
        addMessage(userMessage, true);
        userInput.value = '';
        
        // Ajouter l'indicateur de chargement
        const typingIndicator = addTypingIndicator();
        
        // Simuler un délai de réponse de l'IA
        setTimeout(() => {
            // Supprimer l'indicateur de chargement
            typingIndicator.remove();
            
            // Générer et ajouter la réponse de l'IA
            const aiResponse = generateResponse(userMessage);
            addMessage(aiResponse);
        }, 1500);
    });
    
    // Gestion des boutons de suggestion
    suggestionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const question = this.getAttribute('data-question');
            userInput.value = question;
            userInput.focus();
        });
    });
});
</script>

<?php
require_once 'footer.php';
?>