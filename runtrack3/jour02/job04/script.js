const textarea = document.getElementById('keylogger');

document.addEventListener('keydown', (event) => {
    // Vérifie si la touche pressée est une lettre (a-z)
    const char = String.fromCharCode(event.keyCode).toLowerCase();
    if (/[a-z]/.test(char)) {
        event.preventDefault(); // Empêche le comportement par défaut de la touche
        textarea.value += char; // Ajoute la lettre une fois

        // Si le textarea a le focus, ajoute la lettre une deuxième fois
        if (document.activeElement === textarea) {
            textarea.value += char;
        }
    }
});
