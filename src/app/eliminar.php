<?php

require_once "../config.php";

// Obtén el ID del registro a borrar desde la URL o cualquier otro método
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;  // Convierte a entero para sanear la entrada

$sql = "DELETE FROM alumnos WHERE id_alumnos=$id";
if ($con->query($sql) === TRUE) {
    header('location: listaEstudiantes.php');
} else {
    echo 'Error borrando el registro: ' . $con->error;
}
