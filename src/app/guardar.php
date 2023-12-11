<?php

require_once "../../config.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];

    $sql = "INSERT INTO alumnos (nombres, apellido_paterno, apellido_materno)
            VALUES ('$nombres', '$paterno', '$materno')";

    if ($con->query($sql) === TRUE) {
        header("Location: listaEstudiantes.php");
        exit();
    } else {
        echo "Error al guardar los datos: " . $con->error;
    }

    $conn->close();
}
?>