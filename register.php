<?php
include 'config.php'; // Asegúrate de que el archivo config.php se incluya correctamente

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
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Encriptar la contraseña

    try {
        // Inserción en la base de datos
        $sql = "INSERT INTO usuarios (nombres, apellidos, tipo_documento, numero_documento, fecha_nacimiento, ciudad_nacimiento, telefono, usuario, contraseña) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nombres, $apellidos, $tipo_documento, $numero_documento, $fecha_nacimiento, $ciudad_nacimiento, $telefono, $usuario, $contraseña]);
        echo "<script>alert('Usuario registrado con éxito.');</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        function validarFormulario() {
            // Validar campos numéricos
            var numeroDocumento = document.forms["registro"]["numero_documento"].value;
            var telefono = document.forms["registro"]["telefono"].value;
            var regexNumeros = /^[0-9]*$/;

            if (!regexNumeros.test(numeroDocumento)) {
                alert("El número de documento debe ser numérico.");
                return false;
            }
            if (!regexNumeros.test(telefono)) {
                alert("El teléfono debe ser numérico.");
                return false;
            }

            // Validar campos vacíos
            var tipoDocumento = document.forms["registro"]["tipo_documento"].value;
            if (tipoDocumento == "") {
                alert("Debe seleccionar un tipo de documento.");
                return false;
            }

            return true; // Si todas las validaciones se cumplen, permitir el envío del formulario
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <form name="registro" method="post" onsubmit="return validarFormulario()">
            <input type="text" name="nombres" placeholder="Nombres" required>
            <input type="text" name="apellidos" placeholder="Apellidos" required>
            <select name="tipo_documento" required>
                <option value="">Seleccione Tipo de Documento</option>
                <option value="CC">Cédula de Ciudadanía (CC)</option>
                <option value="CE">Cédula de Extranjería (CE)</option>
            </select>
            <input type="text" name="numero_documento" placeholder="Número de Documento" required>
            <input type="date" name="fecha_nacimiento" required>
            <input type="text" name="ciudad_nacimiento" placeholder="Ciudad de Nacimiento" required>
            <input type="text" name="telefono" placeholder="Teléfono" required>
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <button type="submit">Registrar</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a></p>
    </div>
</body>
</html>
