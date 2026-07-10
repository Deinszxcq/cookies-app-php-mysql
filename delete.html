<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/config/database.php';
requireLogin();

$id = (int) ($_GET['id'] ?? 0);
$pdo = getConnection();

$stmt = $pdo->prepare('DELETE FROM registros WHERE id = ? AND usuario_id = ?');
$stmt->execute([$id, $_SESSION['usuario_id']]);

if ($stmt->rowCount() > 0) {
    setFlash('success', 'Registro eliminado correctamente.');
} else {
    setFlash('error', 'El registro no existe o ya fue eliminado.');
}

header('Location: dashboard.php');
exit;
