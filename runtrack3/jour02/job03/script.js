let count = 0; // Initialise le compteur à 0

function addone() {
    count++; // Augmente le compteur de 1
    document.getElementById('compteur').textContent = count; // Met à jour le texte du paragraphe
}

// Ajoute un gestionnaire d'événements pour le bouton
document.getElementById('button').addEventListener('click', addone);
