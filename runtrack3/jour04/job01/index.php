<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f0f8;
            color: #5c2a3a;
            text-align: center;
            padding: 50px;
        }

        button {
            background-color: #d5006d;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 15px 30px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #c2005b;
        }

        p {
            margin-top: 20px;
            font-size: 24px;
            border: 2px solid #d5006d;
            padding: 20px;
            border-radius: 5px;
            background-color: #fff;
        }
    </style>

    
</head>
<body>

<button id="button">Afficher mon expression favorite</button>

    <p id="expression"></p>

    <script>
        document.getElementById('button').addEventListener('click', function() {
            fetch('expression.txt')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Erreur de réseau');
                    }
                    return response.text();
                })
                .then(data => {
                    document.getElementById('expression').innerText = data;
                })
                .catch(error => {
                    console.error('Erreur:', error);
                });
        });
    </script>

</body>
</html>