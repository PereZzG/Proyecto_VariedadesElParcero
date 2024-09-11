<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variedades El Parcero</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="StyleGe.css">
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

    <div class="main-content">
        <main class="grid grid-cols-2 gap-4 md:grid-cols-4">
            <div class="product-card flex flex-col items-center space-y-2" onclick="location.href='Agg.php'">
                <div class="bg-green-500 text-white w-16 h-16 flex items-center justify-center rounded-full">
                    <i class="fas fa-plus text-4xl"></i>
                </div>
                <span class="text-lg font-semibold">Agregar Producto</span>
            </div>
            <div class="product-card flex flex-col items-center space-y-2" onclick="location.href='Quit.php'">
                <div class="bg-red-500 text-white w-16 h-16 flex items-center justify-center rounded-full">
                    <i class="fas fa-minus text-4xl"></i>
                </div>
                <span class="text-lg font-semibold">Quitar Producto</span>
            </div>

            <?php
            // Conectar a la base de datos
            $pdo = new PDO('mysql:host=localhost;dbname=variedades_el_parcero', 'root', '');

            // Recuperar los productos de la base de datos
            $stmt = $pdo->query('SELECT * FROM productos');
            $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($productos as $producto) {
                echo '<div class="product-card bg-red-500 text-white p-4 rounded-lg flex flex-col items-center">';
                echo '<img src="' . htmlspecialchars($producto['imagen_producto']) . '" alt="Product Image" class="w-32 h-32 object-cover mb-2">';
                echo '<span class="font-semibold">' . htmlspecialchars($producto['nombre_producto']) . '</span>';
                echo '<span>Cantidad: ' . htmlspecialchars($producto['cantidad_producto']) . '</span>';
                echo '<span>Precio: $' . htmlspecialchars($producto['precio_producto']) . '</span>';
                echo '</div>';
            }
            ?>
        </main>
    </div>

    <script src="Gestion.js"></script>
</body>
</html>