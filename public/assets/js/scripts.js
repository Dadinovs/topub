
let serviceCount = 0; // Compteur pour les services
let localisationCount = 0; // Compteur pour les localisations
let carouselCount = 0; // Compteur pour les images du carrousel

// Fonction pour afficher un message
function showMessage(type, message) {
    const messageContainer = document.getElementById('messageContainer');
    messageContainer.innerHTML = ''; // Vider les anciens messages

    const alertClass = (type === 'success') ? 'alert alert-success' : 'alert alert-danger';
    const alertDiv = document.createElement('div');
    alertDiv.className = alertClass;
    alertDiv.textContent = message;
    messageContainer.appendChild(alertDiv);

    // Supprimer le message après 5 secondes
    setTimeout(() => {
        if (messageContainer.contains(alertDiv)) {
            messageContainer.removeChild(alertDiv);
        }
    }, 5000);
}

// Fonction pour ajouter un nouveau service
document.getElementById('addServiceBtn').addEventListener('click', function() {
    serviceCount++; // Incrémenter le compteur
    const servicesContainer = document.getElementById('servicesContainer');

    const newServiceDiv = document.createElement('div');
    newServiceDiv.classList.add('mb-3');

    // Champ texte pour le service
    newServiceDiv.innerHTML = `
        <label for="service${serviceCount}" class="form-label">Service ${serviceCount} :</label>
        <input type="text" name="service${serviceCount}" id="service${serviceCount}" class="form-control">
        <label for="imageservice${serviceCount}" class="form-label">Image Service ${serviceCount} (max. 2 Mo) :</label>
        <input type="file" name="imageservice${serviceCount}" id="imageservice${serviceCount}" class="form-control" accept="image/*">
    `;
    
    servicesContainer.appendChild(newServiceDiv);
});

// Événement pour le bouton "Ajouter une localisation"
document.getElementById('addLocationButton').addEventListener('click', function() {
    localisationCount++; // Incrémenter le compteur à chaque clic

    // Créer une nouvelle div pour la localisation
    const newLocationDiv = document.createElement('div');
    newLocationDiv.classList.add('mb-3');

    // Ajouter un label et un input pour la nouvelle localisation
    newLocationDiv.innerHTML = `
        <label for="localisation${localisationCount}" class="form-label">Localisation ${localisationCount} :</label>
        <input type="text" name="localisation${localisationCount}" id="localisation${localisationCount}" class="form-control" placeholder="Entrez la localisation">
    `;

    // Ajouter la nouvelle div dans le conteneur de localisations
    document.getElementById('localisationContainer').appendChild(newLocationDiv);
});

// Événement pour le bouton "Ajouter une image pour le carrousel"
document.getElementById('addCarouselImageBtn').addEventListener('click', function() {
    carouselCount++; // Incrémenter le compteur pour les images du carrousel

    // Créer une nouvelle div pour l'image du carrousel
    const newCarouselImageDiv = document.createElement('div');
    newCarouselImageDiv.classList.add('mb-3');

    // Ajouter un label et un input pour la nouvelle image du carrousel
    newCarouselImageDiv.innerHTML = `
        <label for="carouselImage${carouselCount}" class="form-label">Image pour le carrousel ${carouselCount} (max. 2 Mo) :</label>
        <input type="file" name="carouselImage${carouselCount}" id="carouselImage${carouselCount}" class="form-control" accept="image/*">
    `;

    // Ajouter la nouvelle div dans le conteneur du carrousel
    document.getElementById('carouselContainer').appendChild(newCarouselImageDiv);
});

// Écouteur d'événement pour le formulaire d'entreprise
document.getElementById('entrepriseForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêcher l'envoi par défaut du formulaire

    const formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showMessage('success', data.message);
            this.reset(); // Réinitialiser le formulaire
        } else {
            showMessage('error', data.message || 'Une erreur est survenue. Veuillez réessayer.');
        }
    })
    .catch(error => {
        showMessage('error', 'Erreur de connexion. Veuillez réessayer plus tard.');
    });
});

// Add dynamic partner image upload field
document.getElementById('addPartnerImageBtn').addEventListener('click', function() {
    const partnerImagesContainer = document.getElementById('partnerImagesContainer');

    const div = document.createElement('div');
    div.classList.add('mb-3');
    div.innerHTML = `
        <label for="partner_image[]" class="form-label">Image de partenaire :</label>
        <input type="file" name="partner_image[]" class="form-control" accept="image/*" required>
    `;
    partnerImagesContainer.appendChild(div);
});

// JavaScript to handle adding new service descriptions
document.getElementById('addServiceBtn').addEventListener('click', function() {
    const servicesContainer = document.getElementById('servicesContainer');
    
    // Create a new textarea for the service description
    const newServiceDiv = document.createElement('div');
    newServiceDiv.classList.add('mb-3');
    newServiceDiv.innerHTML = `
        <label for="service_description" class="form-label">Description du service :</label>
        <textarea name="service_description[]" class="form-control" rows="3" required></textarea>
    `;
    
    servicesContainer.appendChild(newServiceDiv);
});