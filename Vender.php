<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variedades El Parcero</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="StyleVe.css">
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

    <section class="text-center mb-8">
        <h2 class="text-2xl text-white bg-red-600 inline-block py-2 px-6 rounded-full">¡Nueva compra!</h2>
    </section>

    <div class="product-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
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
            echo '<p>Precio: $' . htmlspecialchars($producto['precio_producto']) . '</p>';
            echo '<p>Cantidad: ' . htmlspecialchars($producto['cantidad_producto']) . '</p>';
            echo '<input type="number" min="1" max="' . htmlspecialchars($producto['cantidad_producto']) . '" placeholder="Cantidad" onchange="actualizarCantidad(this, ' . htmlspecialchars(json_encode($producto)) . ')">';
            echo '</div>';
        }
        ?>
    </div>

    <footer class="flex justify-center mt-8">
        <button class="bg-red-600 text-white py-2 px-6 rounded-full" onclick="mostrarConfirmacion()">Comprar</button>
    </footer>

    <!-- Modal de confirmación -->
    <div id="modalConfirmacion" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-5 rounded-lg">
            <h3 class="text-xl font-bold mb-4">Confirmar Compra</h3>
            <div id="resumenCompra"></div>
            <p id="totalCompra" class="text-lg font-bold mt-4"></p>
            <div class="mt-4 flex justify-between">
                <button class="bg-green-600 text-white py-2 px-4 rounded" onclick="confirmarVenta()">Confirmar</button>
                <button class="bg-gray-600 text-white py-2 px-4 rounded" onclick="cerrarModal()">Cancelar</button>
            </div>
        </div>
    </div>

    <form id="formVenta" method="POST" action="RegistrarVenta.php" class="hidden">
        <input type="hidden" name="productos" id="productos">
    </form>

    <script src="AlerVe.js"></script>
</body>
</html>