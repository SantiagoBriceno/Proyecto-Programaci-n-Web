<div class="datos">

                        <?php if(!empty($user)):?>
                            <h2>Mi Perfil</h2>
                            <p>Nombre de usuario: <?=$user["usuario"]?></p>
                            <p>Correo electronico: <?= $user["email"]?></p>
                            <p>Peso actual (kg's): </p>
                            <input type="text" name = "pesoNuevo">
                        <?php else: ?>
                            <?header("Location: /SitioWeb/index.php");?>
                        <?php endif?>

                            <div class="buttons">
                                <button onclick = "location.href = ''" class="btn">Guardar Cambios</button>
                                
                            </div>

                        </div>