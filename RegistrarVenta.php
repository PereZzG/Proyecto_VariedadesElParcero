<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productos = json_decode($_POST['productos'], true);

    // Conectar a la base de datos
    $pdo = new PDO('mysql:host=localhost;dbname=variedades_el_parcero', 'root', '');

    // Iniciar transacción
    $pdo->beginTransaction();

    try {
        foreach ($productos as $producto) {
            $total = $producto['cantidad'] * $producto['precio_producto'];

            // Registrar la venta
            $stmt = $pdo->prepare('INSERT INTO ventas (nombre_producto, cantidad_vendida, total_venta) VALUES (:nombre, :cantidad, :total)');
            $stmt->bindParam(':nombre', $producto['nombre_producto']);
            $stmt->bindParam(':cantidad', $producto['cantidad']);
            $stmt->bindParam(':total', $total);
            $stmt->execute();

            // Actualizar la cantidad de producto en inventario
            $stmt = $pdo->prepare('UPDATE productos SET cantidad_producto = cantidad_producto - :cantidad WHERE id = :id');
            $stmt->bindParam(':cantidad', $producto['cantidad']);
            $stmt->bindParam(':id', $producto['id']);
            $stmt->execute();
        }

        // Confirmar transacción
        $pdo->commit();
        header('Location: Vender.php');
    } catch (Exception $e) {
        // Revertir transacción
        $pdo->rollBack();
        echo "Error al procesar la venta: " . $e->getMessage();
    }
}
?>
