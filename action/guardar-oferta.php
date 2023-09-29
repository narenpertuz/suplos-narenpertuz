<?php
include_once "../bd/conexion.php";

$objeto = isset($_POST["objeto"]) ? $_POST["objeto"] : "";
$descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
$moneda = isset($_POST["moneda"]) ? $_POST["moneda"] : "";
$presupuesto = isset($_POST["presupuesto"]) ? $_POST["presupuesto"] : "";
$actividad = isset($_POST["actividad"]) ? $_POST["actividad"] : "";
$fechaInicio = isset($_POST["fechaInicio"]) ? $_POST["fechaInicio"] : "";
$horaInicio = isset($_POST["horaInicio"]) ? $_POST["horaInicio"] : "";
$fechaCierre = isset($_POST["fechaCierre"]) ? $_POST["fechaCierre"] : "";
$horaCierre = isset($_POST["horaCierre"]) ? $_POST["horaCierre"] : "";
$estado = 'ACTIVO';

$sql = "INSERT INTO ofertas (objeto, descripcion, moneda, presupuesto, actividad, fechaInicio, horaInicio, fechaCierre, horaCierre, estado)
        VALUES ('$objeto', '$descripcion', '$moneda', '$presupuesto', '$actividad', '$fechaInicio', '$horaInicio', '$fechaCierre', '$horaCierre', '$estado')";

if ($conn->query($sql) === TRUE) {
    echo "Oferta creada con éxito.";
} else {
    echo "Error al crear la oferta: " . $conn->error;
}

$conn->close();
