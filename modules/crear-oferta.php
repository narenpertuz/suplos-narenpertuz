<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Oferta</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/xlsx.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <h1>Crear Oferta</h1>
        <div class="tabs">
            <div class="tab active" data-tab="info">Información Básica</div>
            <div class="tab" data-tab="cronograma">Cronograma</div>
        </div>
        <form action="../action/guardar-oferta.php" method="POST">
            <div class="tab-content active" id="info-tab">
                <label for="objeto">Objeto:</label>
                <input type="text" id="objeto" name="objeto" required>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

                <label for="moneda">Tipo de Moneda:</label>
                <select id="moneda" name="moneda" required>
                    <option value="COP">COP</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                </select>

                <label for="presupuesto">Presupuesto:</label>
                <input type="number" id="presupuesto" name="presupuesto" required>

                <label for="actividad">Tipo de Actividad:</label>
                <select id="actividad" name="actividad" required class="js-select2">
                    <!-- Las opciones se agregarán dinámicamente desde JavaScript -->
                </select>
            </div>
            <div class="tab-content" id="cronograma-tab">
                <label for="fechaInicio">Fecha de Inicio:</label>
                <input type="date" id="fechaInicio" name="fechaInicio" class="cronograma-input" required>

                <label for="hora_inicio">Hora de Inicio:</label>
                <input type="time" id="horaInicio" name="horaInicio" class="cronograma-input" required>

                <label for="fechaCierre">Fecha de Cierre:</label>
                <input type="date" id="fechaCierre" name="fechaCierre" class="cronograma-input" required>

                <label for="horaCierre">Hora de Cierre:</label>
                <input type="time" id="horaCierre" name="horaCierre" class="cronograma-input" required>
            </div>
            <br>
            <button type="submit">Guardar Oferta</button>
        </form>
    </div>
    <script src="../js/sweetalert.js"></script>
    <script src="../js/crear-oferta.js"></script>
</body>

</html>