function showhide() {
    const article = document.getElementById('citation');

    // Vérifie si l'article existe déjà
    if (article) {
        // Si l'article existe, on le supprime
        article.remove();
    } else {
        // Sinon, on crée l'article et l'ajoute à la page
        const newArticle = document.createElement('article');
        newArticle.id = 'citation';
        newArticle.textContent = "L'important n'est pas la chute, mais l'atterrissage.";
        document.body.appendChild(newArticle);
    }
}

// Ajoute l'événement de clic au bouton
document.getElementById('button').onclick = showhide;
