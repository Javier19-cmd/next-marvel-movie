<?php
    if (!isset($name)) {
        $name = "Pedro";
    }

    $age = 22;

    $output = "Hola, mi nombre es $name y tengo una edad de $age.";

    // Variable global
    define("PI", 3.14);

    // Variable constante
    const NOMBRE = "Miguel";

    // Usamos condiciones antes de match
    $outputAge = match (true) {
        $age < 3 => "Eres un bebé",
        $age < 18 => "Eres un niño",
        $age < 60 => "Eres un adulto",
        default => "Eres un adulto mayor"
    };

    // Array
    $bestLanguages = ["PHP", "JavaScript", "Python", 1, 2];
    $bestLanguages[] = "Java";

    // Diccionario 
    $person = [
        "name" => "Miguel",
        "age" => 78,
        "isDev" => true,
        "Languages"=> ["PHP", "JavaScript", "Python"],
    ]
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        :root {
            color-scheme: light dark;
        }

        @media (prefers-color-scheme: light) {
            body {
                background-color: white;
                color: black;
            }
        }

        @media (prefers-color-scheme: dark) {
            body {
                background-color: black;
                color: white;
            }
        }

        body {
            display: grid;
            place-content: center;
            margin: 0;
            height: 100vh;
        }
    </style>
</head>
<body>
    <h1>
        <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
    </h1>
    <p>
        <?= htmlspecialchars($output, ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <p>
        Valor de PI: <?= htmlspecialchars(PI, ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <p>
        Nombre constante: <?= htmlspecialchars(NOMBRE, ENT_QUOTES, 'UTF-8'); ?>
    </p>
    <p>
        <?= htmlspecialchars($outputAge, ENT_QUOTES, 'UTF-8'); ?>
    </p>

    <ul>
        <?php foreach ($bestLanguages as $key => $language): ?>
            <li> <?= $key . " " . $language ?> </li>
        <?php endforeach; ?> 
    </ul>
</body>
</html>
