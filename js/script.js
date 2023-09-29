
// Obtener elementos del DOM
const accederButton = document.getElementById('accederButton');
const botonesOferta = document.getElementById('botonesOferta');
const crearButton = document.getElementById('crearButton');
const copiarButton = document.getElementById('copiarButton');
const consultarButton = document.getElementById('consultarButton');
const salirButton = document.getElementById('salirButton');

// Función para mostrar los botones de oferta y el botón "Salir"
function mostrarBotonesOferta() {
    accederButton.style.display = 'none';
    botonesOferta.style.display = 'block';
    salirButton.style.display = 'block';
}

// Función para ocultar los botones de oferta y mostrar el botón "Acceder"
function ocultarBotonesOferta() {
    botonesOferta.style.display = 'none';
    salirButton.style.display = 'none';

    // Centrar el botón "Acceder" en el contenedor
    accederButton.style.display = 'block';
    accederButton.style.margin = '0 auto';
}

// Agregar un evento de clic al botón "Acceder" para mostrar los botones de oferta
accederButton.addEventListener('click', mostrarBotonesOferta);

// Agregar evento de clic al botón "Salir" para ocultar los botones de oferta
salirButton.addEventListener('click', function () {
    ocultarBotonesOferta();
});

copiarButton.addEventListener('click', () => {
    // Redirigir a la página de agregar contenidos
    window.location.href = 'modules/agregar-contenido.php';
});

consultarButton.addEventListener('click', () => {
    // Redirigir a la página de consultar procesos
    window.location.href = 'modules/consultar-procesos.php';
});

// Agregar evento de clic al botón "Crear"
crearButton.addEventListener('click', function () {
    // Redirigir a la página de creación de oferta
    window.location.href = 'modules/crear-oferta.php';
});
