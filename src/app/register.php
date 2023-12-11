<!DOCTYPE html>
<html lang="es">

<head>
  <title>Registro</title>
  <meta charset="utf-8">
  <meta name="author" content="Leiber Bertel">
  <meta name="description" content="Sitio para estudiantes">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="../assets/img/school.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
  <?php include "../includes/nav.php"; ?>

  <section class="container mt-4 w-50">
    <h3 class="text-center">Registro de estudiantes</h3>
    <form action="app/guardar.php" method="post" enctype="multipart/form-data">
      <div class="mb-3 mt-3">
      <div class="mb-3">
        <label for="nombres">Nombres:</label>
        <input class="form-control" required placeholder="Ingresa tus nombres" name="nombres">
      </div>
      <div class="mb-3">
        <label for="paterno">Apellido paterno:</label>
        <input class="form-control" required placeholder="Ingresa el apellido paterno" name="paterno">
      </div>
      <div class="mb-3">
        <label for="materno">Apellido materno:</label>
        <input class="form-control" required placeholder="Ingresa el apellido materno" name="materno">
      </div>
      <div class="form-check mb-3">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="terms-conditions" value="acepto" title="Recuerda esta casilla" checked required> Acepto los
          términos y condiciones
        </label>
      </div>
      <button type="submit" class="btn d-block m-auto" name="registro">Enviar</button>
    </form>
  </section>

  <section class="container">
    <?php include "../includes/footer.php"; ?>
  </section>

</body>

</html>