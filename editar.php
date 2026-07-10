<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>

    <?php

include("conexion.php");

$id=$_GET['id'];
$sql="SELECT * FROM usuarios WHERE id=$id";
$usuario=$conexion->query($sql)->fetch();
?>
<form action="actualizar.php" method="POST">
<input type="hidden" name="id" value="<?=$usuario['id']?>">
<input type="text" name="nombre" value="<?=$usuario['nombre']?>">
<input type="email" name="email" value="<?=$usuario['email']?>">
<button>
Actualizar
</button>
</form>

</body>
</html>