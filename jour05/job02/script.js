document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Empêche l'envoi du formulaire pour les tests

    // Vérification des champs
    const firstName = document.getElementById('firstName').value.trim();
    const lastName = document.getElementById('lastName').value.trim();
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    // Vérification simple
    if (firstName && lastName && email && password.length >= 8 && password === confirmPassword) {
        alert("Vous êtes inscrit avec succès !");
        // Vous pouvez ajouter ici l'envoi du formulaire
        // this.submit(); // Décommentez ceci si vous voulez envoyer le formulaire
    } else {
        alert("Veuillez remplir tous les champs correctement et assurez-vous que les mots de passe correspondent.");
    }
});
