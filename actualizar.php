<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizado</title>
</head>
<body>
    
<?php
include("conexion.php");

$sql="UPDATE usuarios SET nombre=:nombre,email=:email WHERE id=:id";
$stmt=$conexion->prepare($sql);
$stmt->execute([
":nombre"=>$_POST['nombre'],
":email"=>$_POST['email'],
":id"=>$_POST['id']
]);
echo "Usuario actualizado";
?>

</body>
</html>