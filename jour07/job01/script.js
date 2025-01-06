document.addEventListener('DOMContentLoaded', function() {
    // Initialisation du modal
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);

    // Gestion de la soumission du formulaire
    document.getElementById('signup-form').addEventListener('submit', function(event) {
        event.preventDefault();  // Empêche la soumission du formulaire classique

        // Validation supplémentaire : Vérifier que les mots de passe correspondent
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm-password').value;

        if (password !== confirmPassword) {
            alert("Les mots de passe ne correspondent pas !");
            return;
        }

        // Affiche l'alerte "Bienvenue !"
        alert("Bienvenue !");

        // Vérifie si le formulaire est valide
        if (this.checkValidity()) {
            // Si le formulaire est valide, affiche le modal de confirmation
            var instance = M.Modal.getInstance(document.getElementById('confirmation-modal'));
            instance.open();
        } else {
            // Si le formulaire n'est pas valide, met en surbrillance les champs non remplis
            this.reportValidity(); // Affiche les messages d'erreur du navigateur pour chaque champ
        }
    });
});
