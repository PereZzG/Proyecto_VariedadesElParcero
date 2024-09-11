document.addEventListener('DOMContentLoaded', () => {
    cargarVentas();
    
    document.getElementById('calculate-total').addEventListener('click', calcularTotalVentas);
    document.getElementById('reset-sales').addEventListener('click', resetearVentas);
});

function cargarVentas() {
    fetch('ObtenerVentas.php')
        .then(response => response.json())
        .then(ventas => {
            const tbody = document.getElementById('sales-list');
            tbody.innerHTML = '';

            ventas.forEach(venta => {
                const tr = document.createElement('tr');

                tr.innerHTML = `
                    <td class="p-2">${venta.id_venta}</td>
                    <td class="p-2">${venta.fecha_venta}</td>
                    <td class="p-2">${venta.nombre_producto}</td>
                    <td class="p-2">${venta.cantidad_vendida}</td>
                    <td class="p-2">$${venta.total.toFixed(2)}</td>
                `;

                tbody.appendChild(tr);
            });
        })
        .catch(error => console.error('Error al cargar las ventas:', error));
}

function calcularTotalVentas() {
    const filas = document.querySelectorAll('#sales-list tr');
    let total = 0;

    filas.forEach(fila => {
        const totalCelda = fila.querySelectorAll('td')[4];
        const totalValor = parseFloat(totalCelda.textContent.replace('$', ''));
        total += totalValor;
    });

    document.getElementById('total-sales').textContent = `Total de Ventas: $${total.toFixed(2)}`;
}

function resetearVentas() {
    document.getElementById('sales-list').innerHTML = '';
    document.getElementById('total-sales').textContent = '';
}
