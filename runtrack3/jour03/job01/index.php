<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple jQuery</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #message {
            display: none; /* Cacher le message par défaut */
        }
    </style>
</head>
<body>
    <button id="showButton">Afficher le message</button>
    <button id="hideButton">Cacher le message</button>
    <div id="message">
        Les logiciels et les cathédrales, c'est un peu la même chose - d'abord on les construit, ensuite on prie.
    </div>

    <script>
        $(document).ready(function() {
            $('#showButton').click(function() {
                $('#message').fadeIn(); // Afficher le message
            });

            $('#hideButton').click(function() {
                $('#message').fadeOut(); // Cacher le message
            });
        });
    </script>
</body>
</html>
