<?php 
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Geoportal</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    
    <link rel="stylesheet" href="./resources/ol.css">
    <link rel="stylesheet" href="resources/fontawesome-all.min.css">
    <link rel="stylesheet" href="resources/horsey.min.css">
    <link rel="stylesheet" href="resources/ol3-search-layer.min.css">
    <link rel="stylesheet" href="./resources/ol-layerswitcher.css">
    <link rel="stylesheet" href="./resources/qgis2web.css">

    <style>
        html, body, #map {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .ol-control > * {
            background-color: #f8f8f8!important;
            color: #444!important;
            border-radius: 0;
        }

        .ol-attribution a,
        .gcd-gl-input::placeholder,
        .search-layer-input-search::placeholder {
            color: #444!important;
        }

        .search-layer-input-search {
            background-color: #f8f8f8!important;
        }

        .ol-control > *:focus,
        .ol-control > *:hover {
            background-color: rgba(248, 248, 248, 0.7)!important;
        }

        .ol-control {
            background-color: rgba(255,255,255,.4) !important;
            padding: 2px !important;
        }

        .header-bar {
            position: absolute;
            top: 15px;
            right: 300px;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            align-items: center;
            gap: 15px;
            z-index: 9999;
        }

        .header-bar span {
            color: #2c3e50;
            font-weight: bold;
        }

        #fecha-hora {
            font-size: 14px;
            color: #555;
        }

        .logout-btn {
            background-color: #e74c3c;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="header-bar">
        <span>Bienvenido!, <?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
        <span id="fecha-hora">--/--/---- --:--:--</span>
        <a class="logout-btn" href="logout.php">Cerrar sesión</a>
    </div>

    <div id="map">
        <div id="popup" class="ol-popup">
            <a href="#" id="popup-closer" class="ol-popup-closer"></a>
            <div id="popup-content"></div>
        </div>
    </div>

    <script>
        function actualizarFechaHora() {
            const ahora = new Date();
            const formato = ahora.toLocaleDateString('es-ES') + ' ' + ahora.toLocaleTimeString('es-ES');
            document.getElementById('fecha-hora').textContent = formato;
        }
        setInterval(actualizarFechaHora, 1000);
        actualizarFechaHora();
    </script>

    <script src="resources/qgis2web_expressions.js"></script>
    <script src="./resources/functions.js"></script>
    <script src="./resources/ol.js"></script>
    <script src="resources/horsey.min.js"></script>
    <script src="resources/ol3-search-layer.js"></script>
    <script src="./resources/ol-layerswitcher.js"></script>

    <script src="layers/CaminosRurales_2.js"></script>
    <script src="layers/Padrones_3.js"></script>
    <script src="layers/Jurisdicciones_4.js"></script>
    <script src="layers/EstablecimientosRurales_5.js"></script>
    <script src="layers/DestacamentosySeccionales_6.js"></script>

    <script src="styles/CaminosRurales_2_style.js"></script>
    <script src="styles/Padrones_3_style.js"></script>
    <script src="styles/Jurisdicciones_4_style.js"></script>
    <script src="styles/EstablecimientosRurales_5_style.js"></script>
    <script src="styles/DestacamentosySeccionales_6_style.js"></script>

    <script src="./layers/layers.js" type="text/javascript"></script> 
    <script src="./resources/Autolinker.min.js"></script>
    <script src="./resources/qgis2web.js"></script>
</body>
</html>
