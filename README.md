# Panel de Registros — CRUD con Login en PHP

Aplicación PHP con inicio de sesión moderno y operaciones CRUD completas (crear, consultar, editar y eliminar registros), pensada para la **Actividad 7: Pruebas de Funcionamiento**.

## Funcionalidades

- **Inicio de sesión** con diseño moderno (pantalla dividida) y verificación de contraseña con `password_hash`/`password_verify`.
- **Registro de usuarios** con validación de campos y contraseñas hasheadas.
- **Inserción de datos** (nuevo registro).
- **Consulta de registros** en un panel tipo dashboard.
- **Edición** de registros existentes.
- **Eliminación** de registros con confirmación.
- **Cierre de sesión** seguro (destruye la sesión y la cookie).
- Protección CSRF en todos los formularios y consultas preparadas (PDO) contra inyección SQL.

## Requisitos

- PHP 8.0 o superior
- MySQL / MariaDB
- Extensión `pdo_mysql` habilitada

## Instalación local (XAMPP / similar)

1. Copia la carpeta del proyecto dentro de `htdocs` (o el directorio público de tu servidor).
2. Crea la base de datos ejecutando el script `database.sql`:
   ```bash
   mysql -u root -p < database.sql
   ```
3. Ajusta las credenciales de conexión en `config/database.php` si es necesario:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_NAME', 'crud_app');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   ```
4. Inicia Apache/MySQL desde tu panel (XAMPP, Laragon, etc.) y visita:
   ```
   http://localhost/crud-app/
   ```
5. Regístrate desde `register.php`, inicia sesión y prueba el CRUD.

## Estructura del proyecto

```
crud-app/
├── assets/
│   └── css/style.css        # Diseño moderno (paleta Slate & Amber)
├── config/
│   └── database.php         # Conexión PDO a MySQL
├── includes/
│   └── auth.php             # Helpers de sesión, CSRF y mensajes flash
├── database.sql             # Script de creación de la base de datos
├── index.php                # Redirección según sesión activa
├── login.php                # Inicio de sesión
├── register.php              # Registro de usuarios
├── logout.php                # Cierre de sesión
├── dashboard.php             # Consulta de registros
├── create.php                # Inserción de datos
├── edit.php                  # Edición de registros
└── delete.php                # Eliminación de registros
```

## Guía de pruebas (Actividad 7)

| Prueba | Cómo verificarla |
|---|---|
| Inicio de sesión | Ir a `login.php`, ingresar credenciales válidas |
| Registro de usuarios | Ir a `register.php`, crear una cuenta nueva |
| Inserción de datos | Desde el dashboard, botón "+ Nuevo registro" |
| Consulta de registros | `dashboard.php` lista todos los registros del usuario |
| Edición | Botón "Editar" en la fila del registro |
| Eliminación | Botón "Eliminar" (con confirmación) |
| Cierre de sesión | Botón "Cerrar sesión" en la barra superior |

## Subir a GitHub

```bash
git init
git add .
git commit -m "CRUD con login moderno en PHP"
git branch -M main
git remote add origin https://github.com/TU_USUARIO/TU_REPOSITORIO.git
git push -u origin main
```

> Nota: revisa el archivo `.gitignore` incluido para evitar subir archivos de configuración local sensibles.
