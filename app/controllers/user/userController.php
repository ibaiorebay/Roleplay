<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../../persistence/DAO/UserDAO.php');
require_once(dirname(__FILE__) . '/../../../app/models/User.php');
require_once(dirname(__FILE__) . '/../../../app/models/validations/ValidationsRules.php');

require_once(dirname(__FILE__) . '/../../../utils/SessionUtils.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
            checkAction();
           
}


function checkAction() {
   
    
    $user = new User();
    $user->setEmail($_POST["user"]);
    $user->setPassword($_POST["pass"]);

    //Creamos un objeto UserDAO para hacer las llamadas a la BD
    $userDAO = new UserDAO();
    if($userDAO->check($user))
    {
        // Establecemos la sesión
        SessionUtils::startSessionIfNotStarted();
        SessionUtils::setSession($user->getEmail());
    
        header('Location: ../../../app/private/views/index.php');    
    }
    else
    {
        // TODO No existe
        header('Location: ../../../app/public/views/index.php?error=ErrorLogin');    
    }
        
}

    