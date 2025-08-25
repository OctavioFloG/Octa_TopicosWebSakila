<?php
include 'db.php';

$sql = "SELECT film_id, title, release_year FROM film LIMIT 20";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Películas Sakila</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        table { border-collapse: collapse; width: 80%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #0077cc; color: white; }
        a { display: inline-block; margin-top: 20px; text-decoration: none; padding: 8px; background: #0077cc; color: white; border-radius: 6px; }
        a:hover { background: #005fa3; }
    </style>
</head>
<body>
    <h1>🎬 Películas</h1>
    <table>
        <tr><th>ID</th><th>Título</th><th>Año</th></tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['film_id']}</td><td>{$row['title']}</td><td>{$row['release_year']}</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay datos</td></tr>";
        }
        ?>
    </table>
    <a href="index.php">⬅ Volver</a>
</body>
</html>

<?php $conn->close(); ?>
