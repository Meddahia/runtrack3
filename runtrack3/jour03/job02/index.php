<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mélanger l'Arc-en-Ciel</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <h1>Mélanger et Réassembler l'Arc-en-Ciel</h1>

    <button id="shuffleButton">Mélanger les images</button>

    <div id="rainbowImages" class="image-container">
        <img src="arc/arc1.png" class="rainbow" data-order="1" draggable="true">
        <img src="arc/arc2.png" class="rainbow" data-order="2" draggable="true">
        <img src="arc/arc3.png" class="rainbow" data-order="3" draggable="true">
        <img src="arc/arc4.png" class="rainbow" data-order="4" draggable="true">
        <img src="arc/arc5.png" class="rainbow" data-order="5" draggable="true">
        <img src="arc/arc6.png" class="rainbow" data-order="6" draggable="true">
    </div>
    <button id="checkOrderButton">Vérifier l'ordre</button>
    <div id="resultMessage"></div>
</body>
</html>
