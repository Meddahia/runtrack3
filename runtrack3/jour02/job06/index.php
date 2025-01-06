<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konami Code Example</title>
    <style>
        body {
            transition: background-color 0.5s, color 0.5s;
        }
        .konami-active {
            background-color: #87CEEB; /* Bleu ciel */
            color: white;
        }
    </style>
</head>
<body>

<script>
    // Code Konami
    const konamiCode = [
        'ArrowUp', 'ArrowUp', 
        'ArrowDown', 'ArrowDown', 
        'ArrowLeft', 'ArrowRight', 
        'ArrowLeft', 'ArrowRight', 
        'b', 'a'
    ];

    let input = [];
    
    document.addEventListener('keydown', (event) => {
        input.push(event.key);
        if (input.length > konamiCode.length) {
            input.shift(); // Garde seulement les dernières touches
        }

        // Vérifie si l'entrée correspond au code Konami
        if (input.join(',') === konamiCode.join(',')) {
            document.body.classList.toggle('konami-active');
        }
    });
</script>

</body>
</html>

