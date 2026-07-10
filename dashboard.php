<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/config/database.php';
requireLogin();

$pdo = getConnection();
$stmt = $pdo->prepare('SELECT id, titulo, descripcion, categoria, creado_en FROM registros WHERE usuario_id = ? ORDER BY creado_en DESC');
$stmt->execute([$_SESSION['usuario_id']]);
$registros = $stmt->fetchAll();

$flash = getFlash();
$iniciales = strtoupper(substr($_SESSION['usuario_nombre'], 0, 1));
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Panel de registros</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="app-shell">
  <div class="topbar">
    <div class="brand"><span class="dot"></span>Panel de Registros</div>
    <div class="user-chip">
      <div class="avatar"><?= htmlspecialchars($iniciales) ?></div>
      <span><?= htmlspecialchars($_SESSION['usuario_nombre']) ?></span>
      <form method="POST" action="logout.php">
        <button type="submit" class="btn-logout">Cerrar sesión</button>
      </form>
    </div>
  </div>

  <div class="container">
    <div class="page-head">
      <div>
        <h1>Tus registros</h1>
        <p><?= count($registros) ?> registro(s) en total</p>
      </div>
      <a href="create.php" class="btn btn-accent" style="width:auto; padding-left:20px; padding-right:20px;">+ Nuevo registro</a>
    </div>

    <?php if ($flash): ?>
      <div class="alert alert-<?= $flash['type'] === 'success' ? 'success' : 'error' ?>"><?= htmlspecialchars($flash['message']) ?></div>
    <?php endif; ?>

    <div class="card">
      <?php if (empty($registros)): ?>
        <div class="empty-state">
          <p>Aún no tienes registros. Crea el primero para empezar.</p>
          <a href="create.php" class="btn btn-primary" style="width:auto; padding-left:20px; padding-right:20px; margin-top:10px; display:inline-flex;">+ Nuevo registro</a>
        </div>
      <?php else: ?>
        <table>
          <thead>
            <tr>
              <th>Título</th>
              <th>Categoría</th>
              <th>Descripción</th>
              <th>Creado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($registros as $r): ?>
              <tr>
                <td><strong><?= htmlspecialchars($r['titulo']) ?></strong></td>
                <td><?php if ($r['categoria']): ?><span class="badge"><?= htmlspecialchars($r['categoria']) ?></span><?php endif; ?></td>
                <td><?= htmlspecialchars(mb_strimwidth($r['descripcion'] ?? '', 0, 70, '…')) ?></td>
                <td><?= htmlspecialchars(date('d/m/Y', strtotime($r['creado_en']))) ?></td>
                <td>
                  <div class="row-actions">
                    <a href="edit.php?id=<?= (int) $r['id'] ?>">Editar</a>
                    <a href="delete.php?id=<?= (int) $r['id'] ?>" class="del" onclick="return confirm('¿Eliminar este registro? Esta acción no se puede deshacer.');">Eliminar</a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </div>
</div>
</body>
</html>
