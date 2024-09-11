<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variedades El Parcero</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="StyleQu.css">
</head>
<body class="bg-gradient-to-r from-purple-800 to-blue-900 p-5">

    <div class="header-title">
        <span>VARIE</span><span class="letter">D</span><span>ADES EL PARCE</span><span class="letter">R</span><span>O</span>
    </div>

    <section class="text-center mb-6">
        <h2 class="text-2xl text-white">Seleccione el o los elementos que desea remover</h2>
    </section>

    <main class="product-container grid grid-cols-2 gap-4 md:grid-cols-4">
        <?php
        // Conectar a la base de datos
        $pdo = new PDO('mysql:host=localhost;dbname=variedades_el_parcero', 'root', '');

        // Recuperar los productos de la base de datos
        $stmt = $pdo->query('SELECT * FROM productos');
        $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($productos as $producto) {
            echo '<div class="product-item" onclick="seleccionarProducto(' . htmlspecialchars(json_encode($producto)) . ')">';
            echo '<img src="' . htmlspecialchars($producto['imagen_producto']) . '" alt="Product Image" class="product-image">';
            echo '<p class="product-name">' . htmlspecialchars($producto['nombre_producto']) . '</p>';
            echo '</div>';
        }
        ?>
    </main>

    <footer class="flex justify-center space-x-4 mt-8">
        <button class="bg-red-600 text-white py-2 px-4 rounded-full" onclick="eliminarProducto()">Eliminar</button>
        <button class="bg-red-600 text-white py-2 px-4 rounded-full" onclick="location.href='Gesti.php'">Volver</button>
    </footer>

    <!-- Modal de Confirmación -->
    <div id="modalConfirmacion" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-5 rounded-lg">
            <h3 class="text-xl font-bold mb-4">Confirmar Eliminación</h3>
            <p id="productoEliminar" class="text-lg"></p>
            <div class="mt-4 flex justify-between">
                <button class="bg-red-600 text-white py-2 px-4 rounded" onclick="confirmarEliminacion()">Eliminar</button>
                <button class="bg-gray-600 text-white py-2 px-4 rounded" onclick="cerrarModal()">Cancelar</button>
            </div>
        </div>
    </div>

    <form id="formEliminar" method="POST" action="EliminarProducto.php" class="hidden">
        <input type="hidden" name="producto_id" id="producto_id">
    </form>

    <script src="AlerQu.js"></script>
</body>
</html>
