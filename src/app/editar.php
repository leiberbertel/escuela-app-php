<?php
require_once "../../config.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$nombres = "";
$apellido_paterno = "";
$apellido_materno = "";

if($id) {
    $stmt = $con->prepare("SELECT * FROM alumnos WHERE id_alumnos = ?");
    $stmt->bind_param("i", $id);
    
    if($stmt->execute()) {
        $resultado = $stmt->get_result();
        if($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $nombres = $fila['nombres'];
            $apellido_paterno = $fila['apellido_paterno'];
            $apellido_materno = $fila['apellido_materno'];
        }
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombres = $con->real_escape_string($_POST['nombres']);
    $apellido_paterno = $con->real_escape_string($_POST['apellido_paterno']);
    $apellido_materno = $con->real_escape_string($_POST['apellido_materno']);
    
    $stmt = $con->prepare("UPDATE alumnos SET nombres=?, apellido_paterno=?, apellido_materno=? WHERE id_alumnos=?");
    $stmt->bind_param("sssi", $nombres, $apellido_paterno, $apellido_materno, $id);
    
    if ($stmt->execute()) {
        header('location: listaEstudiantes.php');
    } else {
        echo 'Error actualizando el registro: ' . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <title>Actualizar estudiante</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="shortcut icon" href="school.png" type="image/x-icon">
  <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
  <nav class="navbar navbar-expand-sm nav-header">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../index.html">Registro</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listaEstudiantes.php">Lista de estudiantes</a>
      </li>
    </ul>
  </nav>

  <section class="container mt-4 w-50">
    <h3 class="text-center">Actualizar estudiante</h3>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nombres">Nombres:</label>
        <input class="form-control" required name="nombres" value="<?php echo $nombres; ?>">
      </div>
      <div class="mb-3">
        <label for="apellido_paterno">Apellido paterno:</label>
        <input class="form-control" required name="apellido_paterno" value="<?php echo $apellido_paterno; ?>">
      </div>
      <div class="mb-3">
        <label for="apellido_materno">Apellido materno:</label>
        <input class="form-control" required name="apellido_materno" value="<?php echo $apellido_materno; ?>">
      </div>
      <button type="submit" class="btn d-block m-auto">Actualizar</button>
    </form>
  </section>
  <section class="container">
    <footer class="py-3 my-5">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="../index.html" class="nav-link px-2">Registro</a></li>
        <li class="nav-item"><a href="listaEstudiantes.php" class="nav-link px-2">Lista de estudiantes</a></li>
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
