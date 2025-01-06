<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Météo du jour</title>
    <link rel="stylesheet" href="exo_1.css">
</head>
<body>
    <div class="container">
        <h1>Météo du jour</h1>

        <?php
        // Récupération de la météo via les paramètres GET
        if (isset($_GET['meteo'])) {
            $meteo = strtolower($_GET['meteo']); // mettre la météo en minuscule
            $message = "";
            $class = "";

            // Affichage du message en fonction de la météo
            switch ($meteo) {
                case 'soleil':
                    $message = "Il fait beau aujourd'hui, profitez du soleil !";
                    $class = "soleil";
                    break;

                case 'pluie':
                    $message = "Il pleut dehors, n'oubliez pas votre parapluie !";
                    $class = "pluie";
                    break;

                case 'neige':
                    $message = "Il neige, sortez vos manteaux et profitez de la magie de l'hiver !";
                    $class = "neige";
                    break;

                case 'nuageux':
                    $message = "Le ciel est couvert, mais il n'y a pas de pluie en vue.";
                    $class = "nuageux";
                    break;

                default:
                    $message = "Météo non reconnue. Merci de spécifier un type de météo valide.";
                    $class = "error";
                    break;
            }

            // Affichage du message avec la bonne classe
            echo "<div class='message $class'>$message</div>";
        } else {
            echo "<div class='message error'>Veuillez fournir la météo via le paramètre 'meteo'.</div>";
        }
        ?>
        
    </div>
</body>
</html>