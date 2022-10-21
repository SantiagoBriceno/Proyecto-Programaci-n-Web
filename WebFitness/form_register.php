<?php

require 'database.php';

$message = '';

if($_POST) {

    $user = $_POST['usuario'];
    $pass = password_hash($_POST['contrasenia'], PASSWORD_BCRYPT);
    $email = $_POST['email'];
    $peso = $_POST['peso'];
    
    $sql = "INSERT INTO `users` (usuario, email, contrasenia, pesoActual) VALUES ('$user', '$email', '$pass', '$peso');";

    if($conn->exec($sql)){
        $message = 'El usuario a sido creado exitosamente';
    }else{
         $message = 'Su usuario no a sido creado, por favor, intente de nuevo';
    }
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/form_register.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Registro</title>
</head>

<body>
    <div class="container">

        <?php require 'partials/header.php'?>

        <?php if(!empty($message)):?>
        <p><?= $message ?></p>
        <?php endif;?>
        <main>
            <section class="register">
                <div class="flex">
                    <!-- <div class="flex2"> -->
                    <div class="column-3">
                        <img class="gymimg2" src="assets/img/gym3.png" alt="">

                    </div>
                    <!-- </div> -->


                    <div class="column-1">
                        <div class="formulario">
                            <h1>Registro de usuario</h1>

                            <form action="form_register.php" method="post">
                                <div class="user">

                                    <input type="text" name="usuario" placeholder="Nombre de usuario" required>
                                    <!-- <label>Nombre de Usuario</label> -->

                                </div>

                                <div class="user">

                                    <input type="text" name="email" placeholder="Correo Electronico" required>

                                </div>

                                <div class="user">

                                    <input type="text" name="confirm-email" placeholder="Confirme su Correo Electronico"
                                        required>

                                </div>

                                <div class="user">
                                    <input type="password" name="contrasenia" placeholder="Contraseña" required>

                                </div>


                                <div class="user">
                                    <input type="password" name="confirm-contrasenia"
                                        placeholder="Confirme su contraseña" required>
                                </div>

                                <div class="user">

                                    <input type="text" name="peso" placeholder="Indique su peso" required>

                                </div>


                                <input type="submit" onclick="location.href='index.php'" value="Iniciar">
                                <div class="registro">
                                    ¿Ya tienes cuenta? inicia sesión <a href="form_login.php">aquí</a>
                                </div>


                            </form>


                        </div>

                    </div>
                    <div class="column-2">
                        <img class="gymimg" src="assets/img/gym.png" alt="">
                    </div>
                </div>
            </section>
            <hr>


            <footer>
                Copyright &copy; Santiago Briceño - Gisella Alonso - Ricardo Cumare| All rights reserved
            </footer>
        </main>
    </div>
</body>

</html>