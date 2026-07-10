<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar</title>
</head>
<body>
    <?php
    include("conexion.php");

    // Verificar que los datos realmente vengan por el método POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Validar que los campos obligatorios no estén vacíos
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            
            try {
                $sql = "INSERT INTO usuarios (nombre, apellido, email, usuario, password, rol)
                        VALUES (:nombre, :apellido, :email, :usuario, :password, :rol)";

                $stmt = $conexion->prepare($sql);

                // Definir el rol por defecto si no viene en el formulario
                $rol = !empty($_POST['rol']) ? trim($_POST['rol']) : 'cliente';

                $stmt->execute([
                    ':nombre'   => trim($_POST['nombre']),
                    ':apellido' => trim($_POST['apellido']),
                    ':email'    => trim($_POST['email']),
                    ':usuario'  => trim($_POST['usuario']),
                    ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    ':rol'      => $rol
                ]);

                // Alerta de éxito y redirección al login
                echo "<script>
                        alert('¡Usuario registrado con éxito!');
                        window.location.href = 'index.html';
                      </script>";
                exit();

            } catch (PDOException $e) {
                echo "<div style='color: red; text-align: center;'>Error al registrar usuario: " . $e->getMessage() . "</div>";
            }
        } else {
            echo "<script>
                    alert('Por favor, completa los campos obligatorios (Usuario y Contraseña).');
                    window.history.back();
                  </script>";
        }
    } else {
        // Si intentan entrar al archivo directamente por URL, los manda al inicio
        header("Location: index.html");
        exit();
    }
    ?>
</body>
</html>