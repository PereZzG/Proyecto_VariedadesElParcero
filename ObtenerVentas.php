<?php
// ObtenerVentas.php
header('Content-Type: application/json');

// Conectar a la base de datos
$pdo = new PDO('mysql:host=localhost;dbname=variedades_el_parcero', 'root', '');

// Recuperar ventas de la base de datos
$query = "
    SELECT v.id_venta, v.fecha_venta, p.nombre_producto, d.cantidad_vendida, (d.cantidad_vendida * p.precio_producto) AS total
    FROM ventas v
    JOIN detalle_ventas d ON v.id_venta = d.id_venta
    JOIN productos p ON d.id_producto = p.id_producto
    ORDER BY v.fecha_venta DESC
";

$stmt = $pdo->query($query);
$ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($ventas);
