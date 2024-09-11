let productosSeleccionados = [];

function actualizarCantidad(input, producto) {
    const cantidad = parseInt(input.value);
    if (cantidad > 0 && cantidad <= producto.cantidad_producto) {
        const index = productosSeleccionados.findIndex(p => p.id === producto.id);
        if (index > -1) {
            productosSeleccionados[index].cantidad = cantidad;
        } else {
            producto.cantidad = cantidad;
            productosSeleccionados.push(producto);
        }
    } else {
        alert('Cantidad no válida');
        input.value = '';
    }
}

function mostrarConfirmacion() {
    const resumenCompra = document.getElementById('resumenCompra');
    const totalCompra = document.getElementById('totalCompra');
    resumenCompra.innerHTML = '';
    let total = 0;

    productosSeleccionados.forEach(producto => {
        const subtotal = producto.cantidad * producto.precio_producto;
        total += subtotal;
        resumenCompra.innerHTML += `<p>${producto.nombre_producto} - Cantidad: ${producto.cantidad} - Subtotal: $${subtotal}</p>`;
    });

    totalCompra.textContent = `Total de la compra: $${total}`;
    document.getElementById('modalConfirmacion').classList.remove('hidden');
}

function cerrarModal() {
    document.getElementById('modalConfirmacion').classList.add('hidden');
}

function confirmarVenta() {
    if (productosSeleccionados.length > 0) {
        document.getElementById('productos').value = JSON.stringify(productosSeleccionados);
        document.getElementById('formVenta').submit();
    } else {
        alert('No hay productos seleccionados');
    }
}
