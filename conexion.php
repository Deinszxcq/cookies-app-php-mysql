<?php
$servidor = "localhost";
$usuario  = "root";
$password = "";
$base     = "colegio";

try {

    $conexion = new PDO(
        "mysql:host=$servidor;dbname=$base;charset=utf8mb4",$usuario,$password
    );

    $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
