<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/config/database.php';

if (isset($_SESSION['usuario_id'])) {
    header('Location: dashboard.php');
    exit;
}

$errors = [];
$flash = getFlash();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrfValid($_POST['csrf_token'] ?? null)) {
        $errors[] = 'La sesión del formulario expiró. Intenta de nuevo.';
    } else {
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if ($email === '' || $password === '') {
            $errors[] = 'Ingresa tu correo y contraseña.';
        } else {
            $pdo = getConnection();
            $stmt = $pdo->prepare('SELECT id, nombre, password FROM usuarios WHERE email = ?');
            $stmt->execute([$email]);
            $usuario = $stmt->fetch();

            if ($usuario && password_verify($password, $usuario['password'])) {
                session_regenerate_id(true);
                $_SESSION['usuario_id']     = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];

                header('Location: dashboard.php');
                exit;
            }
            $errors[] = 'Correo o contraseña incorrectos.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Iniciar sesión</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="auth-screen">
  <aside class="auth-aside">
    <div class="auth-mark"><span class="dot"></span>Panel de Registros</div>
    <div class="auth-quote">
      <h2>Bienvenido de vuelta. Tus datos te están esperando.</h2>
      <p>Inicia sesión para consultar, insertar, editar y eliminar tus registros desde un solo lugar, de forma rápida y segura.</p>
    </div>
    <div class="auth-steps">
      <div class="step"><span class="num">1</span> Ingresa tu correo</div>
      <div class="step"><span class="num">2</span> Escribe tu contraseña</div>
      <div class="step"><span class="num">3</span> Accede a tu panel</div>
    </div>
  </aside>

  <div class="auth-panel">
    <div class="auth-card">
      <h1>Iniciar sesión</h1>
      <p class="sub">Ingresa tus credenciales para continuar.</p>

      <?php if ($flash): ?>
        <div class="alert alert-<?= $flash['type'] === 'success' ? 'success' : 'error' ?>"><?= htmlspecialchars($flash['message']) ?></div>
      <?php endif; ?>

      <?php foreach ($errors as $err): ?>
        <div class="alert alert-error"><?= htmlspecialchars($err) ?></div>
      <?php endforeach; ?>

      <form method="POST" novalidate>
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars(csrfToken()) ?>">

        <div class="field">
          <label for="email">Correo electrónico</label>
          <div class="input-wrap">
            <input type="email" id="email" name="email" placeholder="ana@correo.com" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required autofocus>
          </div>
        </div>

        <div class="field">
          <label for="password">Contraseña</label>
          <div class="input-wrap">
            <input type="password" id="password" name="password" placeholder="Tu contraseña" required>
            <button type="button" class="toggle-pass" data-target="password">Ver</button>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
      </form>

      <p class="auth-foot">¿No tienes cuenta? <a href="register.php">Regístrate</a></p>
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
