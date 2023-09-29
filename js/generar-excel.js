document.addEventListener('DOMContentLoaded', function () {
    const campoBusqueda = document.getElementById('busqueda');
    const tabla = document.querySelector('.styled-table');
    const filas = tabla.querySelectorAll('tbody tr');
    const generarExcelBtn = document.getElementById('generarExcel');

    campoBusqueda.addEventListener('input', function () {
        const consulta = campoBusqueda.value.toLowerCase();

        filas.forEach(function (fila) {
            let filaCoincide = false;
            fila.querySelectorAll('td').forEach(function (celda) {
                const contenidoCelda = celda.textContent.toLowerCase();
                if (contenidoCelda.includes(consulta)) {
                    filaCoincide = true;
                }
            });

            if (filaCoincide) {
                fila.style.display = 'table-row';
            } else {
                fila.style.display = 'none';
            }
        });
    });

    generarExcelBtn.addEventListener('click', function () {
        const workbook = XLSX.utils.book_new();
        const nombreHoja = 'Procesos';
        const datos = [];

        // Encabezados de la tabla
        const encabezados = [];
        tabla.querySelectorAll('thead th').forEach(function (th) {
            encabezados.push(th.textContent);
        });
        datos.push(encabezados);

        // Filas de la tabla
        tabla.querySelectorAll('tbody tr').forEach(function (fila) {
            const filaDatos = [];
            fila.querySelectorAll('td').forEach(function (celda) {
                filaDatos.push(celda.textContent);
            });
            datos.push(filaDatos);
        });

        const worksheet = XLSX.utils.aoa_to_sheet(datos);
        XLSX.utils.book_append_sheet(workbook, worksheet, nombreHoja);

        // Descargar el archivo Excel
        XLSX.writeFile(workbook, 'Reporte.xlsx');
    });
});
