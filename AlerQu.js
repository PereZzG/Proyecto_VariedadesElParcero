let productoSeleccionado = null;

function seleccionarProducto(producto) {
    productoSeleccionado = producto;
    document.getElementById('productoEliminar').textContent = `¿Desea eliminar ${producto.nombre_producto}?`;
    document.getElementById('modalConfirmacion').classList.remove('hidden');
}

function cerrarModal() {
    document.getElementById('modalConfirmacion').classList.add('hidden');
    productoSeleccionado = null;
}

function confirmarEliminacion() {
    if (productoSeleccionado) {
        document.getElementById('producto_id').value = productoSeleccionado.id; // Usar 'id' en lugar de 'id_producto'
        document.getElementById('formEliminar').submit();
    }
}