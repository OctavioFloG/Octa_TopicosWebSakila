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
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        table { border-collapse: collapse; width: 60%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #0077cc; color: white; }
        a { display: inline-block; margin-top: 20px; text-decoration: none; padding: 8px; background: #0077cc; color: white; border-radius: 6px; }
        a:hover { background: #005fa3; }
    </style>
</head>
<body>
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
</body>
</html>

<?php $conn->close(); ?>
