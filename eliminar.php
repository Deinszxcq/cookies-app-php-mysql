<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<body>
    <?php
include("conexion.php");
$id=$_GET['id'];
$sql="DELETE FROM usuarios WHERE id=:id";
$stmt=$conexion->prepare($sql);
$stmt->execute([":id"=>$id]);
header("Location: mostrar.php");
?>

</body>
</html>