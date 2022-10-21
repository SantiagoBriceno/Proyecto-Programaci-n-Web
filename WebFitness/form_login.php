<?php 
session_start();
require 'database.php';

if($_POST){

    $user = $_POST['usuario'];
    $password = $_POST['contrasenia'];

    $records = $conn->prepare("SELECT id, usuario, contrasenia FROM users WHERE usuario = '$user'");

    $records->execute();
    $result = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if(is_countable($result) && count($result)>0 && password_verify($password, $result['contrasenia'])){

        $_SESSION['user_id'] = $result['id'];
        header('Location: /SitioWeb/principal.php');

    } else {

        $message = 'El usuario no esta registrado, Intente de nuevo';

    }



}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/form_login.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Log-In</title>
</head>
<body>
    <div class="container">

    <?php require 'partials/header.php'?> 
        <?php if(!empty($message)):?>
            <p class = parraph><?= $message ?></p>
        <?php endif;?>

        <main>
            <h1>Tu vida saludable comienza ahora</h1>
            <section class="section1">
                <div class="flex">
                    <!-- <div class="flex2"> -->
                        <div class="column-3">
                            <img class="gymimg2" src="assets/img/gym2.png" alt="">
                        
                        </div>
                    <!-- </div> -->
                    

                    <div class="column-1">
                        <div class = "formulario">
                            <h1>Inicia sesión</h1>
                                    
                            <form action = "form_login.php" method ="post">
                                <div class = "user">
                    
                                <input type="text" name = "usuario" placeholder = "Nombre de usuario" required>
                                <!-- <label>Nombre de Usuario</label> -->
                    
                                </div>
                    
                                <div class = "user">
                                    <input type="password" placeholder = "Contraseña" name = "contrasenia" required>
                                    <!-- <label for="contraseña">Contraseña</label> -->
                                </div>
                    
                                <div class = "recordar">¿Olvidó su contraseña?</div>
                    
                                <input type="submit" class = "ingresar" value="Iniciar">
                                <div class = "registro">
                                    Registrate <a href="form_register.php">aquí</a>
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
            Copyright &copy; Santiago Briceño - Gisella - Ricardo | All rights reserved
        </footer> 
    </main>
    </div>
</body>
</html>