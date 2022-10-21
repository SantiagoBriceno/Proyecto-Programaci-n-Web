<?php

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

        $pesoActual = $user["pesoActual"];
        $id_user = $user["id"];

        $sql = "SELECT * FROM pesos INNER JOIN users ON pesos.id_usuario = users.id WHERE users.id = '$id_user';";
        $record = $conn->prepare($sql);
        $record->execute();

        $result = $record->fetchAll(PDO::FETCH_ASSOC);

        if(is_countable($result) && count($result)>0){
            
            $i = 0;
            echo '<div class = "historial"';
        
            echo "<p> Peso Inicial: ".$result[0]['peso']."kg</p>";
        
            for($i = 1; $i < sizeof($result); $i++){
                echo "<p> Progreso de peso: ".$result[$i]['peso']."kg</p>";
            }

            echo "<p> Peso actual: ".$user['pesoActual']."kg</p>";
            echo '</div>';

        }else{
            echo '<div class = "historial"';
            echo "<p> Peso actual: ".$user['pesoActual']."kg</p>";
            echo '</div>';
        }
    }

    

?>

