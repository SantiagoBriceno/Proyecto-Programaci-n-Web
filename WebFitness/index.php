<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Programación Web</title>
     <link rel="stylesheet" href="assets/css/style.css">
    
    
</head>

<body>
    <div class="container">
        <?php require 'partials/header.php'?> 
        <main>
            <section class="section1">
                <div class="flex">
                    <div class="column">
                        <div>
                            <img class="dumbellimg" src="dumbell.png" alt="">
                        </div>
                        <h1>Comienza el cambio ya</h1>
                        <p class="info">Somos una pagina que te acompañamos en todo tu progreso, te brindamos los mejores ejercicios y dietas segun tu estatura, tu peso y edad. Únete ahora y comienza el cambio</p>
                        
                            <div class="buttons">
                                <button onclick = "location.href = 'form_login.php'" class="btn">Iniciar Sesión</button>
                                <button onclick = "location.href = 'form_register.php'" class="btn">Únete ahora</button>
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