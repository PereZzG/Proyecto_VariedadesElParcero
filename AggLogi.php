<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreProducto = $_POST['nombre_producto'];
    $cantidadProducto = $_POST['cantidad_producto'];
    $precioProducto = $_POST['precio_producto'];
    $imagenProducto = $_FILES['imagen_producto']['name'];

    // Directorio donde se guardará la imagen
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($imagenProducto);

    // Crear el directorio si no existe
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Mover el archivo subido al directorio destino
    if (move_uploaded_file($_FILES['imagen_producto']['tmp_name'], $targetFile)) {
        // Conectar a la base de datos
        $pdo = new PDO('mysql:host=localhost;dbname=variedades_el_parcero', 'root', '');

        // Preparar y ejecutar la consulta para insertar el producto
        $stmt = $pdo->prepare("INSERT INTO productos (nombre_producto, cantidad_producto, precio_producto, imagen_producto) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nombreProducto, $cantidadProducto, $precioProducto, $targetFile]);

        // Redirigir a Gesti.php con una alerta de éxito
        echo "<script>
            alert('Producto agregado con éxito.');
            window.location.href = 'Gesti.php';
        </script>";
    } else {
        echo "<script>
            alert('Error al subir la imagen.');
            window.history.back();
        </script>";
    }
}
?>