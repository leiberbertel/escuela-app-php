<?php

require_once "../../config.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0; 

$sql = "DELETE FROM alumnos WHERE id= $id ";
if ($conn->query($sql) === TRUE) {
    header('location: listaEstudiantes.php');
} else {
    echo 'Error borrando el registro: ' . $conn->error;
}
