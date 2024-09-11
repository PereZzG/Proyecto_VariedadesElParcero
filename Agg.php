<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variedades El Parcero - Agregar Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="StyleAg.css">
</head>
<body>
    <div class="header-title">
        <span>VARIE</span><span class="letter">D</span><span>ADES EL PARCE</span><span class="letter">R</span><span>O</span>
    </div>
    <div class="form-container">
        <form method="POST" enctype="multipart/form-data" action="AggLogi.php">
            <div class="form-section">
                <h2>¡Agrega el Nuevo Producto!</h2>
                <label for="nombre_producto"><b>Nombre del Producto</b></label>
                <input type="text" id="nombre_producto" name="nombre_producto" placeholder="Lapicero, borrador, sacapunta etc..." required>

                <label for="cantidad_producto"><b>Cantidad de Producto</b></label>
                <input type="number" id="cantidad_producto" name="cantidad_producto" placeholder="1,10,100..." required>

                <label for="precio_producto"><b>Precio del Producto c/u</b></label>
                <input type="number" id="precio_producto" name="precio_producto" placeholder="100,1000,10000..." required>

                <button type="submit"><b>Agregar</b></button>
                <button type="button" onclick="location.href='Gesti.php'"><b>Volver</b></button>
            </div>
            <div class="image-container">
                <img src="https://placehold.co/150x150" alt="Product Image" id="product-image">
                <label for="imagen_producto" class="upload-button">Img...</label>
                <input type="file" id="imagen_producto" name="imagen_producto" style="display:none;" onchange="previewImage(event)" required>
            </div>
        </form>
    </div>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('product-image');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
