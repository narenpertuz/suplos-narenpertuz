<?php
include_once "../bd/conexion.php";

if (isset($_GET["idContenido"])) {
    $idContenido = $_GET["idContenido"];

    $sql = "SELECT contenido FROM contenidos WHERE idContenido = $idContenido";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $contenido = $row["contenido"];

        // Ruta al directorio donde se almacenan los archivos
        $ruta = "../files/";

        // Ruta completa del archivo a eliminar
        $archivo = $ruta . $contenido;

        // Verificar si el archivo existe
        if (file_exists($archivo)) {
            // Intentar eliminar el archivo
            if (unlink($archivo)) {
                // Si se elimina el archivo físico, también eliminamos el registro de la base de datos
                $sqlEliminar = "DELETE FROM contenidos WHERE idContenido = $idContenido";
                if ($conn->query($sqlEliminar) === TRUE) {
                    echo "El archivo y el registro se eliminaron correctamente.";
                } else {
                    echo "Error al eliminar el registro: " . $conn->error;
                }
            } else {
                echo "Error al eliminar el archivo físico.";
            }
        } else {
            echo "El archivo no existe.";
        }
    } else {
        echo "No se encontró el archivo en la base de datos.";
    }
} else {
    echo "ID de archivo no proporcionado.";
}

$conn->close();
