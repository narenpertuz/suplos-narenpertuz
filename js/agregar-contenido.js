document.addEventListener('DOMContentLoaded', function () {
    // Obtener elementos para las pestañas
    const infoTab = document.querySelector('[data-tab="info"]');
    const contenidoTab = document.querySelector('[data-tab="contenido"]');
    const infoContent = document.getElementById('info-tab');
    const contenidoContent = document.getElementById('contenido-tab');

    // Función para mostrar los campos de información básica
    function mostrarCamposInfo() {
        infoContent.style.display = 'block';
        contenidoContent.style.display = 'none';
    }

    // Función para mostrar los campos de contenido
    function mostrarCamposcontenido() {
        infoContent.style.display = 'none';
        contenidoContent.style.display = 'block';
    }

    // Agregar eventos de clic a las pestañas
    infoTab.addEventListener('click', mostrarCamposInfo);
    contenidoTab.addEventListener('click', mostrarCamposcontenido);
});