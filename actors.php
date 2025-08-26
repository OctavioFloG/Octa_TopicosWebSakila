<?php
include 'db.php';

$sql = "SELECT actor_id, first_name, last_name FROM actor LIMIT 20";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actores Sakila</title>
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
            flex-direction: column;
            align-items: center;
            padding: 20px;
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
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 600px;
            margin-top: 20px;
            background: #1f1f1f;
            color: #e0e0e0;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #333;
        }
        a {
            display: inline-block;
            margin-top: 20px;
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
            table {
                font-size: 1rem;
                max-width: 90%;
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
        <h1>⭐ Actores</h1>
        <table>
            <tr><th>ID</th><th>Nombre</th><th>Apellido</th></tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>{$row['actor_id']}</td><td>{$row['first_name']}</td><td>{$row['last_name']}</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No hay datos</td></tr>";
            }
            ?>
        </table>
        <a href="index.php">⬅ Volver</a>
    </div>
</body>
</html>

<?php $conn->close(); ?>
