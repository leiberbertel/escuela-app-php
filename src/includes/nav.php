<?php 

session_start();

if(empty($_SESSION['active'])) {
    header ('location:../../index.php');
}
?>

<nav class="navbar navbar-expand-sm  nav-header">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../app/register.php">Registro
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../app/listaEstudiantes.php">Lista de estudiantes
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link icon-close" href="../includes/salir.php">Salir
          </a>
        </li>
      </ul>
    </div>
</nav>