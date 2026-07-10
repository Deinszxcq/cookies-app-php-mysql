<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
   <h1>Registro de usuario</h1>
    <form action="guardar.php" method="POST">
<input type="text" name="nombre" placeholder="Nombre"><br>
<input type="text" name="apellido" placeholder="Apellido"><br>
<input type="email" name="email" placeholder="Email"><br>
<input type="text" name="usuario" placeholder="Usuario"><br>
<input type="password" name="password" placeholder="Password"><br>
<select name="rol">
<option>Administrador</option>
<option>Usuario</option>
<option>Cliente</option>
</select>
<button type="submit">
  Guardar  
</button>
</form>

</body>
</html>