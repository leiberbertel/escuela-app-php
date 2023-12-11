<?php
$alert = '';
session_start();
if(!empty($_SESSION['active'])) { 
    header('location:/forms_sena/src/app/register.php');
} else { 

    if(!empty($_POST)) {

        if(empty($_POST['usuario']) || empty($_POST['contrasena'])){
            $alert = "Ingrese su usuario y contraseña";
        } else { 

            require_once "config.php";

            $user = mysqli_real_escape_string($conn, $_POST['usuario']);
            $pass = mysqli_real_escape_string($conn, $_POST['contrasena']);

            $query = mysqli_query($conn, "SELECT * FROM usuario WHERE usuario='$user' AND contrasena='$pass'");
            
            $result = mysqli_num_rows($query);

            if($result > 0) { 
                $data = mysqli_fetch_array($query); 

                $_SESSION['active'] = true; 
                $_SESSION['idUser'] = $data['idusuario'];   
                $_SESSION['nombre'] = $data['nombre']; 
                $_SESSION['email'] = $data['correo']; 
                $_SESSION['user'] = $data['usuario']; 
                $_SESSION['rol'] = $data['rol'];
                header('location:/forms_sena/src/app/register.php');
            } else {
                $alert = "El usuario o contraseña es incorrecto";
                session_destroy();
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/assets/css/styles.css">
    <link rel="shortcut icon" href="src/assets/img/school.png" type="image/x-icon">
    <title>Log in | Escuela</title>
</head>
<body>
    <section id="container">
        <form action="" method="post">
            <h3>Iniciar sesión</h3>
            <img src="src/assets/img/school.png" alt="img_login" width="180">
            <input type="text" class="form-control" placeholder="Usuario" name="usuario">
            <input type="password" class="form-control" placeholder="Contraseña" name="contrasena">
            <div id="alert">
                <p> <?php echo isset($alert)? $alert:''; ?> </p>
            </div>
            <input type="submit" value="Ingresar">
        </form>
    </section>
</body>
</html>