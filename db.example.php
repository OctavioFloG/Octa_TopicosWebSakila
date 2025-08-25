<?php
// Copiar este archivo a db.php y completa tus credenciales reales
$servername = "localhost";
$username = "root";
$password = "tu_contraseña";
$dbname = "sakila";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
