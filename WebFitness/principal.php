
<?php

    session_start();

    require 'database.php';

    if(isset($_SESSION['user_id'])){

        $id = $_SESSION['user_id']; 

        $record = $conn->prepare("SELECT id, usuario, email, contrasenia, pesoActual FROM users WHERE id ='$id'");
        $record->execute();

        $result = $record->fetch(PDO::FETCH_ASSOC);

        $user = null;
        if(count($result) > 0){
            $user = $result;
        }

        $pesoAntiguo = $user["pesoActual"];
        $id_user = $user["id"];

        if($_POST){
            $peso = $_POST["pesoNuevo"];

            if($peso != $pesoAntiguo){

            
            $sql = "INSERT INTO `pesos` (peso, id_usuario) VALUES ('$pesoAntiguo', '$id_user');";
            $record = $conn->prepare($sql);
            $record->execute();

            $sql = "UPDATE `users` SET `pesoActual` = '$peso' WHERE `users`.`id` = '$id_user';";
            $record = $conn->prepare($sql);
            $record->execute();
        }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/principal.css">
    <title>Bandeja de entrada</title>
</head>
<body>
    <div class="container">
    <header>
        <nav class="flex1">
            <div class="logo">Smart Gym</div>
            <ul class="navegador">
                <li>Mi perfil
                </li>

                <li>Peso actual: <?=$user["pesoActual"]?>kg </li>

                <li><button onclick = "mostrar2()" class = "btn">Historial de progreso</button> </li>

                <li>
                    <button onclick = "mostrar()" class="btn">Actualizar Peso</button>    
                </li>

                <li>
                    <button onclick = "location.href = 'logout.php'" class="btn">LogOut</button>
                </li>
            </ul>
        </nav>
    <hr>
    </header>
        <main>
            
            <section class="section1">
                
                <div class="flex2">
                    <div class="column">
                    <h1>¡Bienvenido <?=$user["usuario"]?>!</h1>
                    <p class = "alternar">Selecciona una de nuestros planes, sigue las instrucciones y comienza tu transformación ¡YA!</p>
                    
                    <div class="datos">
                        <form action="principal.php" method="post">
                        <?php if(!empty($user)):?>
                            <h2>Mi Peso</h2>
                            <!-- <p>Nombre de usuario: <?=$user["usuario"]?></p>
                            <p>Correo electronico: <?= $user["email"]?></p> -->
                            <p>Peso actual (kg's): </p>
                            <input type="text" name = "pesoNuevo">
                        <?php else: ?>
                            <?header("Location: SitioWeb/principal.php");?>
                        <?php endif?>

                            <div class="buttons">
                                <input type="submit" onclick = "header('Location: /SitioWeb/principal.php');" class="btn" value = "Guardar Cambios" required>
                                
                            </div>

                    </div>
                            
                    
                        <?php require 'historial.php';?>
                    
                
                    </div>
                </form>
                    <div class="column-2">
                        <img class="gymimg" src="assets/img/gym.png" alt="">
                    </div>
                </div>
            </section>
            
            <hr>

            <section class="section2">
                <h1>PLANES Y OBJETIVOS</h1>
                
                <div class="planes">
                    
                    <div class="box">
                        <h2>BAJA DE PESO</h2>

                        <div class="plan-container">
      
                            <div class="plan-select">
                                <img src="assets/img/1_1.png" alt="">
                                <div class="plan-info">
                                <div>
                                    <a href="assets/img_extern/1_1.jpg">Planes de alimentacion</a>
                                    <p>Logra tu objetivo comiendo saludable</p>
                                </div>

                                </div>
                            </div>

                            <div class="plan-select">
                                <img src="assets/img/1_2.png" alt="">
                                <div class="plan-info">
                                <div>
                                    <a href="html/1_rutina.html">Rutinas</a>
                                    <p>Ejercitarte correctamente es la clave del éxito</p>
                                </div>
                                
                                </div>
                            </div>

                            <div class="plan-select">
                                <img src="assets/img/1_3.png" alt="">
                                <div class="plan-info">
                                <div>
                                    <a href="assets/img_extern/1_3.jpeg">Tips</a>
                                    <p>Conoce y entiende mas a fondo como funciona tu cuerpo para lograr tus objetivos </p>
                                </div>
                                </div>
                            </div>
                      
                        </div>
                        
                    </div>

                    <div class="box">
                        <h2>DEFINICION Y PERDIDA DE GRASA</h2>
                        <div class="plan-container">
      
                            <div class="plan-select">
                                <img src="assets/img/2_1.png" alt="">
                                <div class="plan-info">
                                <div>
                                    <a href="assets/img_extern/2_1.jpg">Planes de alimentacion</a>
                                    <p>La alimentación es el 60% del trabajo</p>
                                </div>

                                </div>
                            </div>

                            <div class="plan-select">
                                <img src="assets/img/2_2.png" alt="">
                                <div class="plan-info">
                                <div>
                                    <a href="html/2_rutina.html">Rutinas</a>
                                    <p>Llevate al límite y destruye las barreras para lograr tus metas</p>
                                </div>
                                
                                </div>
                            </div>

                            <div class="plan-select">
                                <img src="assets/img/2_3.png" alt="">
                                <div class="plan-info">
                                <div>
                                    <a href="assets/img_extern/2_3.jpeg">Tips</a>
                                    <p>Aprende las claves basicas para una buena definición</p>
                                </div>
                                </div>
                            </div>

                           
                        </div>
                    </div>

                    <div class="box">
                        <h2>AUMENTO DE PESO CONTROLADO</h2>
                        <div class="plan-container">
      
                            <div class="plan-select">
                                <img src="assets/img/3_1.png" alt="">
                                <div class="plan-info">
                                <div>
                                    <a href="assets/img_extern/3_1.jpg">Planes de alimentacion</a>
                                    <p>La constancia y disciplina lograra un aumento correcto de peso</p>
                                </div>

                                </div>
                            </div>

                            <div class="plan-select">
                                <img src="assets/img/3_2.png" alt="">
                                <div class="plan-info">
                                <div>
                                    <a href="html/3_rutina.html">Rutinas</a>
                                    <p>Lleva al máximo pontencial a tus músculos y disfruta de los resultados</p>
                                </div>
                                
                                </div>
                            </div>

                            <div class="plan-select">
                                <img src="assets/img/3_3.png" alt="">
                                <div class="plan-info">
                                <div>
                                    <a href="assets/img_extern/3_3.jpeg">Tips</a>
                                    <p>Aprende las claves básicas de un buen aumento de peso</p>
                                </div>
                                </div>
                            </div>

                        </div>
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

<script>

    function mostrar(){
        const x = document.querySelector(".datos");
        const y = document.querySelector(".alternar");
        x.style.visibility="visible";
        y.style.visibility = "hidden";
        
    }

    function mostrar2(){
        
        const x = document.querySelector(".historial");
        const xStyle = window.getComputedStyle(x);
        const xVisibility = xStyle.getPropertyValue('visibility');
        // const y = document.querySelector(".alternar");
        if(xVisibility  == "hidden"){
            x.style.visibility="visible";
        }else{
            x.style.visibility="hidden";
        }
        
        // y.style.visibility = "hidden";
    }


</script>