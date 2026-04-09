<?php
session_start();

// Conectar a la base
$conexion = new mysqli("localhost", "root", "", "login_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir los datos del formulario
$usuario = $_POST['usuario'] ?? '';
$clave = $_POST['clave'] ?? '';

// Sanitizar entrada
$usuario = $conexion->real_escape_string($usuario);
$clave_encriptada = hash('SHA1', $clave);  // Encriptar como en la BD

// Buscar en la base
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND clave='$clave_encriptada'";
$resultado = $conexion->query($sql);

// Verificar si existe
if ($resultado->num_rows === 1) {
    $_SESSION['usuario'] = $usuario;
    header("Location: index.php");
    exit();
} else {
    echo "Usuario o contraseña incorrectos. <a href='login.php'>Volver</a>";
}
