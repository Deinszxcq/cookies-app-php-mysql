<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/config/database.php';

if (isset($_SESSION['usuario_id'])) {
    header('Location: dashboard.php');
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfValid($_POST['csrf_token'] ?? null)) {
        $errors[] = 'La sesión del formulario expiró. Intenta de nuevo.';
    } else {
        $nombre   = trim($_POST['nombre'] ?? '');
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $password2 = $_POST['password2'] ?? '';

        if ($nombre === '' || $email === '' || $password === '') {
            $errors[] = 'Todos los campos son obligatorios.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Ingresa un correo electrónico válido.';
        }
        if (strlen($password) < 8) {
            $errors[] = 'La contraseña debe tener al menos 8 caracteres.';
        }
        if ($password !== $password2) {
            $errors[] = 'Las contraseñas no coinciden.';
        }

        if (empty($errors)) {
            $pdo = getConnection();
            $stmt = $pdo->prepare('SELECT id FROM usuarios WHERE email = ?');
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $errors[] = 'Ya existe una cuenta con ese correo electrónico.';
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare('INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)');
                $stmt->execute([$nombre, $email, $hash]);

                setFlash('success', 'Cuenta creada correctamente. Ahora puedes iniciar sesión.');
                header('Location: login.php');
                exit;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crear cuenta</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="auth-screen">
  <aside class="auth-aside">
    <div class="auth-mark"><span class="dot"></span>Panel de Registros</div>
    <div class="auth-quote">
      <h2>Crea tu cuenta y empieza a gestionar tus datos hoy mismo.</h2>
      <p>Regístrate en segundos y obtén acceso completo para insertar, consultar, editar y eliminar tus registros de forma segura.</p>
    </div>
    <div class="auth-steps">
      <div class="step"><span class="num">1</span> Completa tus datos</div>
      <div class="step"><span class="num">2</span> Verifica tu contraseña</div>
      <div class="step"><span class="num">3</span> Inicia sesión y comienza</div>
    </div>
  </aside>

  <div class="auth-panel">
    <div class="auth-card">
      <h1>Crear cuenta</h1>
      <p class="sub">Completa el formulario para registrarte.</p>

      <?php foreach ($errors as $err): ?>
        <div class="alert alert-error"><?= htmlspecialchars($err) ?></div>
      <?php endforeach; ?>

      <form method="POST" novalidate>
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(csrfToken()) ?>">

        <div class="field">
          <label for="nombre">Nombre completo</label>
          <div class="input-wrap">
            <input type="text" id="nombre" name="nombre" placeholder="Ana Torres" value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>" required>
          </div>
        </div>

        <div class="field">
          <label for="email">Correo electrónico</label>
          <div class="input-wrap">
            <input type="email" id="email" name="email" placeholder="ana@correo.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
          </div>
        </div>

        <div class="field">
          <label for="password">Contraseña</label>
          <div class="input-wrap">
            <input type="password" id="password" name="password" placeholder="Mínimo 8 caracteres" required>
            <button type="button" class="toggle-pass" data-target="password">Ver</button>
          </div>
        </div>

        <div class="field">
          <label for="password2">Confirmar contraseña</label>
          <div class="input-wrap">
            <input type="password" id="password2" name="password2" placeholder="Repite tu contraseña" required>
            <button type="button" class="toggle-pass" data-target="password2">Ver</button>
          </div>
        </div>

        <button type="submit" class="btn btn-accent">Crear cuenta</button>
      </form>

      <p class="auth-foot">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
    </div>
  </div>
</div>

<script>
document.querySelectorAll('.toggle-pass').forEach(btn => {
  btn.addEventListener('click', () => {
    const input = document.getElementById(btn.dataset.target);
    const isPass = input.type === 'password';
    input.type = isPass ? 'text' : 'password';
    btn.textContent = isPass ? 'Ocultar' : 'Ver';
  });
});
</script>
</body>
</html>
