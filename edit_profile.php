<?php
session_start(); // Iniciar sesión
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirigir a login si no hay sesión
    exit();
}

$user_id = $_SESSION['user_id'];

// Cargar datos del usuario
$sql = "SELECT * FROM usuarios WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger datos del formulario
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $ciudad_nacimiento = $_POST['ciudad_nacimiento'];
    $telefono = $_POST['telefono'];
    $usuario = $_POST['usuario'];

    try {
        // Actualizar en la base de datos
        $sql = "UPDATE usuarios SET nombres = ?, apellidos = ?, tipo_documento = ?, numero_documento = ?, fecha_nacimiento = ?, ciudad_nacimiento = ?, telefono = ?, usuario = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombres, $apellidos, $tipo_documento, $numero_documento, $fecha_nacimiento, $ciudad_nacimiento, $telefono, $usuario, $user_id]);
        echo "Datos actualizados con éxito.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h2>Editar Perfil</h2>
        <form method="post">
            <input type="text" name="nombres" value="<?= htmlspecialchars($user['nombres']) ?>" required>
            <input type="text" name="apellidos" value="<?= htmlspecialchars($user['apellidos']) ?>" required>
            <select name="tipo_documento" required>
                <option value="<?= htmlspecialchars($user['tipo_documento']) ?>"><?= htmlspecialchars($user['tipo_documento']) ?></option>
                <option value="CC">Cédula de Ciudadanía (CC)</option>
                <option value="CE">Cédula de Extranjería (CE)</option>
            </select>
            <input type="text" name="numero_documento" value="<?= htmlspecialchars($user['numero_documento']) ?>" required>
            <input type="date" name="fecha_nacimiento" value="<?= htmlspecialchars($user['fecha_nacimiento']) ?>" required>
            <input type="text" name="ciudad_nacimiento" value="<?= htmlspecialchars($user['ciudad_nacimiento']) ?>" required>
            <input type="text" name="telefono" value="<?= htmlspecialchars($user['telefono']) ?>" required>
            <input type="text" name="usuario" value="<?= htmlspecialchars($user['usuario']) ?>" required>
            <button type="submit">Actualizar Datos</button>
        </form>
        <p><a href="logout.php">Cerrar Sesión</a></p>
    </div>
</body>
</html>
