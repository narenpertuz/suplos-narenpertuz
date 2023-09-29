document.addEventListener('DOMContentLoaded', function () {
    // Obtener elementos para las pestañas
    const infoTab = document.querySelector('[data-tab="info"]');
    const cronogramaTab = document.querySelector('[data-tab="cronograma"]');
    const infoContent = document.getElementById('info-tab');
    const cronogramaContent = document.getElementById('cronograma-tab');

    // Función para mostrar los campos de información básica
    function mostrarCamposInfo() {
        infoContent.style.display = 'block';
        cronogramaContent.style.display = 'none';
    }

    // Función para mostrar los campos de cronograma
    function mostrarCamposCronograma() {
        infoContent.style.display = 'none';
        cronogramaContent.style.display = 'block';
    }

    // Agregar eventos de clic a las pestañas
    infoTab.addEventListener('click', mostrarCamposInfo);
    cronogramaTab.addEventListener('click', mostrarCamposCronograma);

    const tipoActividadSelect = document.getElementById('actividad');
    const options = [];

    fetch('../data/clasificador_de_bienes_y_servicios_v14_1.xls')
        .then(response => response.arrayBuffer())
        .then(data => {
            const workbook = XLSX.read(data, {
                type: 'array'
            });
            const worksheet = workbook.Sheets[workbook.SheetNames[0]];

            for (let i = 1; i <= worksheet['!ref'].split(':')[1].replace(/\D/g, ''); i++) {
                const cell = worksheet[`A${i}`];
                if (cell && cell.v) {
                    options.push({
                        id: cell.v,
                        text: cell.v
                    });
                }
            }

            // Inicializa Select2 con las opciones
            $(tipoActividadSelect).select2({
                data: options,
                placeholder: 'Selecciona una actividad',
                allowClear: true
            });
        })
        .catch(error => {
            console.error('Error al descargar o procesar el archivo Excel:', error);
        });
});