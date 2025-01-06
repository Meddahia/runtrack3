<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scroll Footer Color</title>
    <link rel="stylesheet" href="style.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>

<div>Contenu de la page...</div>

<footer id="footer">Footer</footer>

<script>
    const footer = document.getElementById('footer');

    window.addEventListener('scroll', () => {
        const scrollTop = window.scrollY;
        const windowHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercentage = scrollTop / windowHeight;

        // Calcul de la couleur en fonction du pourcentage de défilement
        const red = Math.min(255, Math.floor(255 * scrollPercentage));
        const green = Math.min(255, Math.floor(255 * (1 - scrollPercentage)));
        footer.style.backgroundColor = `rgb(${red}, ${green}, 0)`;
    });
</script>

</body>
</html>
