<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Consultar Procesos</title>
    <link rel="stylesheet" href="../css/estilos.css">
    <script src="../js/xlsx.js"></script>
</head>

<body>
    <div class="container">
        <h1>Consultar Procesos</h1>
        <input type="text" id="busqueda" placeholder="Filtrar...">
        <br><br><button type="submit" id="generarExcel">Generar Excel</button>
    </div>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Objeto</th>
                <th>Actividad</th>
                <th>Descripción</th>
                <th>Moneda</th>
                <th>Presupuesto</th>
                <th>Fecha de Inicio</th>
                <th>Hora de Inicio</th>
                <th>Fecha de Cierre</th>
                <th>Hora de Cierre</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once "../bd/conexion.php";

            $sql = "SELECT * FROM ofertas";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["idOferta"] . "</td>";
                    echo "<td>" . $row["objeto"] . "</td>";
                    echo "<td>" . $row["actividad"] . "</td>";
                    echo "<td>" . $row["descripcion"] . "</td>";
                    echo "<td>" . $row["moneda"] . "</td>";
                    echo "<td>" . $row["presupuesto"] . "</td>";
                    echo "<td>" . $row["fechaInicio"] . "</td>";
                    echo "<td>" . $row["horaInicio"] . "</td>";
                    echo "<td>" . $row["fechaCierre"] . "</td>";
                    echo "<td>" . $row["horaCierre"] . "</td>";
                    echo "<td>" . $row["estado"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No se encontraron registros.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const campoBusqueda = document.getElementById('busqueda');
            const tabla = document.querySelector('.styled-table');
            const filas = tabla.querySelectorAll('tbody tr');

            campoBusqueda.addEventListener('input', function() {
                const consulta = campoBusqueda.value.toLowerCase();

                filas.forEach(function(fila) {
                    let filaCoincide = false;
                    fila.querySelectorAll('td').forEach(function(celda) {
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
        });
    </script>
    <script src="../js/generar-excel.js"></script>
</body>

</html>