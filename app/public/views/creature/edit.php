<?php
// Incluimos el controlador para obtener la criatura y realizar la acción de editar
require_once(dirname(__FILE__) . '/../../../controllers/creature/CreatureController.php');
require_once(dirname(__FILE__) . '/../../../../utils/SessionUtils.php');


// Verificamos si se recibió un ID para editar una criatura específica
if (isset($_GET["id"])) {
    $creatureController = new CreatureController();
    $creature = $creatureController->getCreatureById($_GET["id"]); // Método para obtener los datos de la criatura
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Editar Criatura</title>
        <!-- Bootstrap Core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="../../../../index.php"><img src="../../../../assets/img/small-logo.png" alt="" ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a  class="nav-link " href="../index.php">Principal</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link " href="../contact.php">Contactar</a>
                    </li>
                </ul>
            </div>  
        </nav>  
        
        <!-- Page Content -->
        <div class="container">
            <div class="row m-y-2">
                <div class="col-lg-8 push-lg-4">
                    <form class="form-horizontal" role="form" method="POST" action="../../../controllers/creature/CreatureController.php">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <h2>Editar criatura</h2>
                                <hr>
                            </div>
                        </div>

                        <!-- ID de la criatura (oculto para no ser editado directamente) -->
                        <input type="hidden" name="id" value="<?= $creature->getCreatureId(); ?>">

                        <!-- Nombre -->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group has-danger">
                                    <label class="sr-only" for="name">Nombre:</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" value="<?= $creature->getName(); ?>" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="sr-only" for="description">Descripción:</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <input type="text" name="description" class="form-control" id="description" placeholder="Descripción" value="<?= $creature->getDescription(); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Avatar -->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="sr-only" for="avatar">Avatar:</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <input type="text" name="avatar" class="form-control" id="avatar" placeholder="Avatar (URL)" value="<?= $creature->getAvatar(); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Potencia de ataque -->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="sr-only" for="attack">Potencia de ataque:</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <input type="text" name="attack" class="form-control" id="attack" placeholder="Potencia de ataque" value="<?= $creature->getAttack(); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Vida -->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="sr-only" for="life">Vida:</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <input type="text" name="life" class="form-control" id="life" placeholder="Vida" value="<?= $creature->getLife(); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Arma -->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="sr-only" for="weapon">Arma:</label>
                                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                        <input type="text" name="weapon" class="form-control" id="weapon" placeholder="Arma" value="<?= $creature->getWeapon(); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botón para guardar cambios -->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" name="type" value="edit">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- JavaScript Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    </body>
</html>
