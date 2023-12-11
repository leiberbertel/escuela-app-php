<!DOCTYPE html>
<html lang="es">

<head>
  <title>Estudiantes</title>
  <meta charset="utf-8">
  <meta name="author" content="Leiber Bertel">
  <meta name="description" content="Sitio web para estudiantes">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../img/school.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-sm  nav-header">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.html">Registro</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Lista de estudiantes</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container mt-5">
    <h3 class="text-center">Lista de estudiantes</h3>
    <hr>
    <?php

    require_once "../config.php";

    $sql = "SELECT * FROM alumnos";
    $result = $con->query($sql);

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
    <footer class="py-3 my-5">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="../index.html" class="nav-link px-2">Registro</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Lista de estudiantes</a></li>
      </ul>
      <p class="text-center">&copy; 2023 <a class="text-light" target="_blank"
          href="https://leiberbertel.github.io">Leiber Bertel</a></p>
    </footer>
  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>