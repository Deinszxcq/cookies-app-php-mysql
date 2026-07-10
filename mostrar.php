


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
</head>
<body>
    <?php
include("conexion.php");
$sql="SELECT * FROM usuarios";
$stmt=$conexion->query($sql);
?>
<table border="1">
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Email</th>
<th>Rol</th>
<th>Acciones</th>
</tr>
<?php foreach($stmt as $usuario){ ?>
<tr>
<td>
<?= $usuario['id'] ?>
</td>
<td>
<?= $usuario['nombre']." ".$usuario['apellido'] ?>
</td>
<td>
<?= $usuario['email'] ?>
</td>
<td>
<?= $usuario['rol'] ?>
</td>
<td>
<a href="editar.php?id=<?=$usuario['id']?>">
Editar
</a>
<a href="eliminar.php?id=<?=$usuario['id']?>">
Eliminar
</a>
</td>
</tr>
<?php } ?>
</table>

</body>
</html>