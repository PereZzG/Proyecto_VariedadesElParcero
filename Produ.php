<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variedades El Parcero - Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="StylePr.css">
</head>
<body class="bg-gradient-to-r from-purple-800 to-blue-900 p-5">
    <div class="header-title">
        <span>VARIE</span><span class="letter">D</span><span>ADES EL PARCE</span><span class="letter">R</span><span>O</span>
    </div>
    <div class="nav-container">
        <button class="nav-button" onclick="location.href='Produ.php'">Productos</button>
        <button class="nav-button" onclick="location.href='Gesti.php'">Gestion</button>
        <button class="nav-button" onclick="location.href='Vender.php'">Vender</button>
        <button class="nav-button" onclick="location.href='Venta.php'">Ventas</button>
        <button class="nav-button" onclick="location.href='Info.php'">Info</button>
    </div>

    <div class="product-container">
        <?php
        // Conectar a la base de datos
        $pdo = new PDO('mysql:host=localhost;dbname=variedades_el_parcero', 'root', '');

        // Recuperar los productos de la base de datos
        $stmt = $pdo->query('SELECT * FROM productos');
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($productos as $producto) {
            echo '<div class="product-item">';
            echo '<img src="' . htmlspecialchars($producto['imagen_producto']) . '" alt="Product Image">';
            echo '<p>' . htmlspecialchars($producto['nombre_producto']) . '</p>';
            echo '<p>Cantidad: ' . htmlspecialchars($producto['cantidad_producto']) . '</p>';
            echo '<p>Precio: $' . htmlspecialchars($producto['precio_producto']) . '</p>';
            echo '</div>';
        }
        ?>
    </div>
    
    <script src="Productos.js"></script>
</body>
</html>
