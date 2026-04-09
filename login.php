<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Geoportal</title>
    <style>
        body {
            background-image: url('fondo.jpg');
            background-size: cover;
            background-position: 100% 10%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
			margin-left: -100px;
			margin-top: -50px;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.92);
            padding: 45px;
            border-radius: 25px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 320px;
            text-align: center;
        }
        .login-container img {
            max-width: 200px;
            margin-bottom: 0px;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #2c3e50;
        }
        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            font-weight: bold;
            color: #34495e;
        }
        input[type="text"],
        input[type="password"] {
            width: 90%;
            padding: 12px;
            margin-bottom: 8px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #27ae60;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #219150;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="logo.png" alt="Logo Geoportal">
        <h2>Acceso Geoportal</h2>
        <form method="POST" action="validar.php">
            <label>Usuario:</label>
            <input type="text" name="usuario" required>
            <label>Contraseña:</label>
            <input type="password" name="clave" required>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>