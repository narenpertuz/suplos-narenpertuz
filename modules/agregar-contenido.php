<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Agregar Contenido</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <div class="container">
        <h1>Contenido - Documentación</h1>
        <div class="tabs">
            <div class="tab active" data-tab="info">Agregar contenido</div>
            <div class="tab" data-tab="contenido">Biblioteca de contenidos</div>
        </div>
        <form action="../action/guardar-archivo.php" method="POST" enctype="multipart/form-data">
            <div class="tab-content active" id="info-tab">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"></textarea>
                <label for="contenido">Seleccionar archivo:</label>
                <br><input type="file" id="contenido" name="contenido" accept=".pdf, .doc, .docx" required>
                <br><br><button type="submit">Cargar Archivo</button>
            </div>
            <div class="tab-content" id="contenido-tab">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Nombre del Archivo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once "../bd/conexion.php";

                        $sql = "SELECT idContenido, titulo, descripcion, contenido FROM contenidos";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["titulo"] . "</td>";
                                echo "<td>" . $row["descripcion"] . "</td>";
                                echo "<td>" . $row["contenido"] . "</td>";
                                echo "<td><a href='../action/descargar-archivo.php?idContenido=" . $row["idContenido"] . "'>Descargar</a> <a href='../action/eliminar-archivo.php?idContenido=" . $row["idContenido"] . "'>Eliminar</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No se encontraron archivos.</td></tr>";
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    <script src="../js/agregar-contenido.js"></script>
    <script src="../js/generar-excel.js"></script>
</body>

</html>