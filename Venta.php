<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variedades El Parcero - Ventas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="StyleVen.css">
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
    <div class="sales-list-container mt-5">
        <h2 class="sales-title">Ventas del Día</h2>
        <table class="sales-table w-full text-left">
            <thead>
                <tr>
                    <th class="p-2">ID Venta</th>
                    <th class="p-2">Fecha</th>
                    <th class="p-2">Producto</th>
                    <th class="p-2">Cantidad</th>
                    <th class="p-2">Total</th>
                </tr>
            </thead>
            <tbody id="sales-list">
                <?php
                // Conectar a la base de datos
                $pdo = new PDO('mysql:host=localhost;dbname=variedades_el_parcero', 'root', '');

                // Recuperar las ventas de la base de datos
                $stmt = $pdo->query('SELECT * FROM ventas');
                $ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($ventas as $venta) {
                    echo '<tr>';
                    echo '<td class="p-2">' . htmlspecialchars($venta['id_venta']) . '</td>';
                    echo '<td class="p-2">' . htmlspecialchars($venta['fecha']) . '</td>';
                    echo '<td class="p-2">' . htmlspecialchars($venta['nombre_producto']) . '</td>';
                    echo '<td class="p-2">' . htmlspecialchars($venta['cantidad_vendida']) . '</td>';
                    echo '<td class="p-2">$' . htmlspecialchars($venta['total_venta']) . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <button id="calculate-total" class="mt-4 bg-white text-red-700 py-2 px-4 rounded">Mostrar Total de Ventas</button>
        <div id="total-sales" class="mt-2 text-white font-bold"></div>
        <button id="reset-sales" class="mt-4 bg-white text-red-700 py-2 px-4 rounded">Resetear Ventas</button>
    </div>
    <script src="VenLis.js"></script>
</body>
</html>
