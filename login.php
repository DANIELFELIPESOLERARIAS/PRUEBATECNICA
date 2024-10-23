<?php
session_start(); // Iniciar la sesión
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$usuario]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($contraseña, $user['contraseña'])) {
        $_SESSION['user_id'] = $user['id']; // Almacenar el ID del usuario en la sesión
        $_SESSION['nombres'] = $user['nombres'];
        $_SESSION['apellidos'] = $user['apellidos'];
        // Redirigir a la página de perfil o editar datos
        header("Location: edit_profile.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form method="post">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
        <p>No tienes una cuenta? <a href="register.php">Registrar</a></p>
    </div>
</body>
</html>
