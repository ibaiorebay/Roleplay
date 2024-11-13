<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../../persistence/DAO/OfferDAO.php');
require_once(dirname(__FILE__) . '/../../../app/models/Offer.php');
require_once(dirname(__FILE__) . '/../../../app/models/validations/ValidationsRules.php');

$_offerController = new OfferController();

// Enrutamiento de las acciones
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["type"] == "create"){
        $_offerController->createAction();
    }
    else if ($_POST["type"] == "edit"){
        $_offerController->editAction();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    //Llamo que hace la edición contra BD
    $_offerController->deleteAction();
}

class OfferController{
    
    /**
     * Parameterless constractor.
     */
    public function __construct() {
    }
    
    // Obtención de la lista completa de ofertas
    function readAction() {
        $offerDAO = new OfferDAO();
        return $offerDAO->selectAll();
    }
    
    // Función encargada de crear nuevas ofertas
    function createAction() {
        // Obtención de los valores del formulario y validación
        $company = ValidationsRules::test_input($_POST["company"]);
        $position = ValidationsRules::test_input($_POST["position"]);
        $function = ValidationsRules::test_input($_POST["function"]);
        // Creación de objeto auxiliar   
        $offer = new Offer();
        $offer->setCompany($company);
        $offer->setPosition($position);
        $offer->setFunction($function);
        //Creamos un objeto OfferDAO para hacer las llamadas a la BD
        $offerDAO = new OfferDAO();
        $offerDAO->insert($offer);

        header('Location: ../../../index.php');
    }

    // Función encargada de crear nuevas ofertas
    function editAction() {
        // Obtención de los valores del formulario y validación    
        $id = $_POST["id"];
        $company = $_POST["company"];
        $position = $_POST["position"];
        $function = $_POST["function"];
        // Creación de objeto auxiliar   
        $offer = new Offer();
        $offer->setIdOffer($id);
        $offer->setCompany($company);
        $offer->setPosition($position);
        $offer->setFunction($function);
        //Creamos un objeto OfferDAO para hacer las llamadas a la BD
        $offerDAO = new OfferDAO();
        $offerDAO->update($offer);

        header('Location: ../../../index.php');
    }

    function deleteAction() {
        $id = $_GET["id"];

        $offerDAO = new OfferDAO();
        $offerDAO->delete($id);

        header('Location: ../../../index.php');
    }
    
    
}



?>