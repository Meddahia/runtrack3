document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche l'envoi du formulaire pour les tests

    // Vérification des champs
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;

    if (email && password.length >= 8) {
        alert("Vous êtes connecté !");
        // Vous pouvez ajouter ici l'envoi du formulaire
        // this.submit(); // Décommentez ceci si vous voulez envoyer le formulaire
    } else {
        alert("Veuillez remplir tous les champs correctement.");
    }
});
