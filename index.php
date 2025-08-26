<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Octa Sakila Web</title>
    <style>
        @keyframes rainbow-border {
            0% { border-color: red; }
            16% { border-color: orange; }
            33% { border-color: yellow; }
            50% { border-color: green; }
            66% { border-color: blue; }
            83% { border-color: indigo; }
            100% { border-color: violet; }
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #121212;
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
            border: 2px solid;
            animation: rainbow-border 5s infinite;
        }
        .container {
            text-align: center;
            padding: 20px;
            max-width: 90%;
            box-sizing: border-box;
        }
        h1 {
            color: #ffffff;
            font-size: 2.5rem;
        }
        a {
            display: inline-block;
            margin: 10px 0;
            text-decoration: none;
            padding: 15px 25px;
            background: #1f1f1f;
            color: #e0e0e0;
            border: 1px solid #333;
            border-radius: 6px;
            transition: background 0.3s, color 0.3s;
            font-size: 1.2rem;
        }
        a:hover {
            background: #333;
            color: #ffffff;
        }

        @media (max-width: 600px) {
            h1 {
                font-size: 2rem;
            }
            a {
                font-size: 1rem;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🎬 Bienvenido a Octa Sakila Web</h1>
        <p>Base de datos de ejemplo <b>Sakila</b>:</p>
        <a href="films.php">📽️ Ver Películas</a><br>
        <a href="actors.php">⭐ Ver Actores</a>
    </div>
</body>
</html>
