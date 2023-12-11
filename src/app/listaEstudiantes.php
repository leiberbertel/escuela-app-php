<!DOCTYPE html>
<html lang="es">

<head>
  <title>Estudiantes</title>
  <meta charset="utf-8">
  <meta name="author" content="Leiber Bertel">
  <meta name="description" content="Sitio web para estudiantes">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../assets/img/school.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
  <?php include "../includes/nav.php"; ?>
  <div class="container mt-5">
    <h3 class="text-center">Lista de estudiantes</h3>
    <hr>
    <?php

    require_once "../../config.php";

    $sql = "SELECT * FROM alumnos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
                $contador = 0;
                echo '<div class="row my-4">';
                while ($row = $result->fetch_assoc()) {
                    $nombres = $row['nombres'];
                    $paterno = $row['apellido_paterno'];
                    $materno = $row['apellido_materno'];

                    if ($contador % 3 == 0 && $contador > 0) {
                        echo '</div><div class="row">';
                    }

                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<div class="card-body">';
                    echo '<p class="card-text"><em>Nombres:</em> ' . $nombres . '</p>';
                    echo '<p class="card-text"><em>Apellido paterno:</em> ' . $paterno . '</p>';
                    echo '<p class="card-text"><em>Apellido materno:</em> ' . $materno . '</p>';
                    echo '<div class="btn-group d-flex justify-content-between">';
                    echo '<a class="nav-link link-crud btn-action btn-outline-secondary px-1 text-center gap-2" href="editar.php?id=' . $row['id_alumnos'] . '">Editar alumno</a>';
                    echo '<a class="nav-link link-crud btn-action btn-outline-secondary text-center" href="eliminar.php?id=' . $row['id_alumnos'] . '">Eliminar alumno</a>';                    
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                    $contador++;
                }

                echo '</div>';
            } 
            else {
                echo "<p>No se encontraron estudiantes en la base de datos.</p>";
            }
    ?>

  <section class="container">
    <?php include "../includes/footer.php"; ?>
  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>