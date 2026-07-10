<?php
require_once __DIR__ . '/includes/auth.php';

header('Location: ' . (isset($_SESSION['usuario_id']) ? 'dashboard.php' : 'login.php'));
exit;
