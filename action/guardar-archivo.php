<?php
// Validar y procesar los datos del formulario
$titulo = $_POST["titulo"];
$descripcion = $_POST["descripcion"];

// Obtener información del archivo cargado
$contenido = $_FILES["contenido"]["name"];
$archivoTemporal = $_FILES["contenido"]["tmp_name"];

// Mover el archivo cargado al directorio de almacenamiento
$directorioAlmacenamiento = "../files/";
$rutaArchivo = $directorioAlmacenamiento . $contenido;

move_uploaded_file($archivoTemporal, $rutaArchivo);

include_once "../bd/conexion.php";

$sql = "INSERT INTO contenidos (titulo, descripcion, contenido) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $titulo, $descripcion, $contenido);

if ($stmt->execute()) {
    echo "Contenido guardado exitosamente.";
} else {
    echo "Error al guardar el contenido: " . $stmt->error;
}

// Cierra la conexión a la base de datos
$stmt->close();
$conn->close();
