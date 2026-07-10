<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/config/database.php';
requireLogin();

$errors = [];
$titulo = $descripcion = $categoria = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfValid($_POST['csrf_token'] ?? null)) {
        $errors[] = 'La sesión del formulario expiró. Intenta de nuevo.';
    } else {
        $titulo      = trim($_POST['titulo'] ?? '');
        $descripcion = trim($_POST['descripcion'] ?? '');
        $categoria   = trim($_POST['categoria'] ?? '');

        if ($titulo === '') {
            $errors[] = 'El título es obligatorio.';
        }

        if (empty($errors)) {
            $pdo = getConnection();
            $stmt = $pdo->prepare('INSERT INTO registros (usuario_id, titulo, descripcion, categoria) VALUES (?, ?, ?, ?)');
            $stmt->execute([$_SESSION['usuario_id'], $titulo, $descripcion, $categoria]);

            setFlash('success', 'Registro creado correctamente.');
            header('Location: dashboard.php');
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nuevo registro</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="app-shell">
  <div class="topbar">
    <div class="brand"><span class="dot"></span>Panel de Registros</div>
    <div class="user-chip">
      <span><?= htmlspecialchars($_SESSION['usuario_nombre']) ?></span>
      <form method="POST" action="logout.php">
        <button type="submit" class="btn-logout">Cerrar sesión</button>
      </form>
    </div>
  </div>

  <div class="container" style="max-width:640px;">
    <a href="dashboard.php" class="back-link">&larr; Volver a registros</a>
    <div class="page-head">
      <div>
        <h1>Nuevo registro</h1>
        <p>Completa los datos para insertar un nuevo registro.</p>
      </div>
    </div>

    <?php foreach ($errors as $err): ?>
      <div class="alert alert-error"><?= htmlspecialchars($err) ?></div>
    <?php endforeach; ?>

    <div class="card">
      <form method="POST" class="form-grid">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(csrfToken()) ?>">

        <div class="field">
          <label for="titulo">Título</label>
          <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($titulo) ?>" placeholder="Nombre del registro" required>
        </div>

        <div class="field">
          <label for="categoria">Categoría</label>
          <input type="text" id="categoria" name="categoria" value="<?= htmlspecialchars($categoria) ?>" placeholder="Ej. General, Trabajo, Personal">
        </div>

        <div class="field">
          <label for="descripcion">Descripción</label>
          <textarea id="descripcion" name="descripcion" placeholder="Detalles del registro..."><?= htmlspecialchars($descripcion) ?></textarea>
        </div>

        <div class="form-actions">
          <button type="submit" class="btn btn-accent">Guardar registro</button>
          <a href="dashboard.php" class="btn btn-ghost" style="text-decoration:none; display:inline-flex; align-items:center; justify-content:center;">Cancelar</a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
