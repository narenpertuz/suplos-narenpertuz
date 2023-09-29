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

        // Ruta completa del archivo a descargar
        $archivo = $ruta . $contenido;

        // Verificar si el archivo existe
        if (file_exists($archivo)) {
            // Definir los encabezados para forzar la descarga
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$contenido");
            header("Content-Type: application/pdf");
            header("Content-Transfer-Encoding: binary");
            
            readfile($archivo);
            exit;
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
