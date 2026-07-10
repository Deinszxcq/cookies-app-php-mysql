<?php
session_start();
include("conexion.php");

// Verificamos que el usuario logueado realmente tenga el rol de admin
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
    header("Location: index.html");
    exit();
}

try {
    // Consultamos los usuarios usando PDO
    $query = "SELECT id, nombre, apellido, email, usuario, rol, fecha_registro FROM usuarios";
    $stmt = $conexion->prepare($query);
    $stmt->execute();
} catch (PDOException $e) {
    die("Error al consultar usuarios: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administrador</title>
    <style>
        table { width: 85%; margin: 20px auto; border-collapse: collapse; font-family: Arial, sans-serif; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background-color: #0275d8; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div style="text-align: center; margin-top: 20px;">
        <h2>Bienvenido Administrador: <?php echo htmlspecialchars($_SESSION['usuario']); ?></h2>
        <p>Lista de usuarios registrados en el sistema "Colegio":</p>
        <a href="logout.php" style="color: red; text-decoration: none; font-weight: bold;">Cerrar Sesión</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($row['apellido']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['usuario']); ?></td>
                    <td><?php echo htmlspecialchars($row['rol']); ?></td>
                    <td><?php echo htmlspecialchars($row['fecha_registro']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>