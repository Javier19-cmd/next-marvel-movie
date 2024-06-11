<?php

const API_URL = "https://whenisthenextmcufilm.com/api";

# Inicializando una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);

// Inicializando lo que se quiere recibir el resultado de la petición y no darlo en pantalla.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/*
    Ejecutando la petición y guardando el resultado
*/
$result = curl_exec($ch);
$data = json_decode($result, true);

curl_close($ch);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La próxima película de Marvel</title>
    <style>
        :root {
            color-scheme: light dark;
        }

        @media (prefers-color-scheme: light) {
            body {
                background-color: #f0f0f0;
                color: #333;
            }
        }

        @media (prefers-color-scheme: dark) {
            body {
                background-color: #333;
                color: #f0f0f0;
            }
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .movie, .show {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 300px;
            margin: 0 auto;
        }

        .movie img, .show img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .movie p, .show p {
            margin: 10px 0;
        }

        .movie h2, .show h2 {
            font-size: 1.3em;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>La próxima película de Marvel</h1>
    <div class="container">
        <?php if ($data): ?>
            <div class="movie">
                <h2><?= htmlspecialchars($data['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                <img src="<?= htmlspecialchars($data['poster_url'], ENT_QUOTES, 'UTF-8'); ?>" alt="Poster">
                <p><strong>Fecha de lanzamiento:</strong> <?= htmlspecialchars($data['release_date'], ENT_QUOTES, 'UTF-8'); ?></p>
                <p><strong>Días hasta el estreno:</strong> <?= htmlspecialchars($data['days_until'], ENT_QUOTES, 'UTF-8'); ?></p>
                <p><?= htmlspecialchars($data['overview'], ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <?php if (isset($data['following_production'])): ?>
                <div class="show">
                    <h2>Próxima producción: <?= htmlspecialchars($data['following_production']['title'], ENT_QUOTES, 'UTF-8'); ?></h2>
                    <img src="<?= htmlspecialchars($data['following_production']['poster_url'], ENT_QUOTES, 'UTF-8'); ?>" alt="Poster">
                    <p><strong>Fecha de lanzamiento:</strong> <?= htmlspecialchars($data['following_production']['release_date'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><strong>Días hasta el estreno:</strong> <?= htmlspecialchars($data['following_production']['days_until'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p><?= htmlspecialchars($data['following_production']['overview'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <p>No se pudo obtener la información de la próxima película de Marvel.</p>
        <?php endif; ?>
    </div>
</body>
</html>
