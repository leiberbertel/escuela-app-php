<?php

require_once "../config.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0; 

$sql = "DELETE FROM alumnos WHERE id_alumnos=$id";
if ($con->query($sql) === TRUE) {
    header('location: listaEstudiantes.php');
} else {
    echo 'Error borrando el registro: ' . $con->error;
}
