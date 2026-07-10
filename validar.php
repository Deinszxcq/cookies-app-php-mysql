<?php
session_start();
include("conexion.php");

if (isset($_POST['usuario']) && isset($_POST['password'])) {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ":usuario" => $usuario
    ]);

    $fila = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($fila) {
        // Validar contraseña encriptada
        if (password_verify($password, $fila['password'])) {

            // Crear variables de sesión
            $_SESSION['id'] = $fila['id'];
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['usuario'] = $fila['usuario'];
            $_SESSION['rol'] = $fila['rol'];

            // Control de roles (Corregido para que coincida con tu phpMyAdmin)
            switch ($fila['rol']) {
                case "admin": // Cambiado de "Administrador" a "admin"
                    header("Location: administrador.php");
                    break;

                case "cliente": // Cambiado de "Cliente" a "cliente"
                    header("Location: cliente.php");
                    break;

                case "usuario":
                    header("Location: usuario.php");
                    break;

                default:
                    echo "<script>alert('Rol no definido en el sistema.'); window.location.href='index.html';</script>";
            }
            exit();

        } else {
            echo "<script>alert('Contraseña incorrecta.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('El usuario no existe.'); window.history.back();</script>";
    }

} else {
    echo "<script>alert('Por favor, complete todos los campos.'); window.history.back();</script>";
}
?>