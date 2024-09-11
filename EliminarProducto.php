<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $producto_id = $_POST['producto_id'];

    // Conectar a la base de datos
    $pdo = new PDO('mysql:host=localhost;dbname=variedades_el_parcero', 'root', '');

    // Preparar y ejecutar la consulta de eliminación
    $stmt = $pdo->prepare('DELETE FROM productos WHERE id = :id'); // Usar 'id'
    $stmt->bindParam(':id', $producto_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header('Location: Quit.php'); // Redirigir de nuevo a la página de eliminación
        exit(); // Asegurarse de que no se ejecute código adicional
    } else {
        echo "Error al eliminar el producto.";
    }
}
?>