<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

session_start();


if($_SESSION['rol']!="Usuario"){

    header("Location:index.php");
    exit();

}

?>


<h1>
Panel Usuario
</h1>

<p>
Bienvenido:
<?php echo $_SESSION['nombre']; ?>
</p>



</body>
</html>