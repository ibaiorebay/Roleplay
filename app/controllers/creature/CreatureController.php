<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../../persistence/DAO/CreatureDAO.php');
require_once(dirname(__FILE__) . '/../../../app/models/Creature.php');
require_once(dirname(__FILE__) . '/../../../app/models/validations/ValidationsRules.php');
require_once(dirname(__FILE__) . '/../../../utils/SessionUtils.php');

$_creatureController = new CreatureController();

// Enrutamiento de las acciones
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["type"] == "submit") {
        $_creatureController->createAction();
    } else if ($_POST["type"] == "edit") {
        $_creatureController->editAction();
    } else if ($_POST["type"] == "apply") {
        $_creatureController->applyAction(SessionUtils::getIdUser());
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    //Llamo que hace la edición contra BD
    $_creatureController->deleteAction();
}

class CreatureController {

    /**
     * Parameterless constractor.
     */
    public function __construct() {
        
    }

    // Obtención de la lista completa de ofertas
    function readAction() {
        $creatureDAO = new CreatureDAO();
        return $creatureDAO->selectAll();
    }

    // Función encargada de crear nuevas ofertas
    function createAction() {
        // Obtención de los valores del formulario y validación
        $name = ValidationsRules::test_input($_POST["name"]);
        $description = ValidationsRules::test_input($_POST["description"]);
        $avatar = ValidationsRules::test_input($_POST["avatar"]);
        $attack = ValidationsRules::test_input($_POST["attack"]);
        $life = ValidationsRules::test_input($_POST["life"]);
        $weapon = ValidationsRules::test_input($_POST["weapon"]);

        $creature = new Creature();
        $creature->setname($name);
        $creature->setdescription($description);
        $creature->setavatar($avatar);
        $creature->setAttack($attack);
        $creature->setLife($life);
        $creature->setLife($life);

        $creatureDAO = new CreatureDAO();
        $creatureDAO->insert($creature);

        header('Location: ../../public/views/index.php');
    }
    
    function editAction() {   
        $id = $_POST["id"];
        $name = ValidationsRules::test_input($_POST["name"]);
        $description = ValidationsRules::test_input($_POST["description"]);
        $avatar = ValidationsRules::test_input($_POST["avatar"]);
        $attack = ValidationsRules::test_input($_POST["attack"]);
        $life = ValidationsRules::test_input($_POST["life"]);
        $weapon = ValidationsRules::test_input($_POST["weapon"]);

        $creature = new Creature();
        $creature->setCreatureId($id);
        $creature->setName($name);
        $creature->setDescription($description);
        $creature->setAvatar($avatar);
        $creature->setAttack($attack);
        $creature->setLife($life);
        $creature->setWeapon($weapon);

        $creatureDAO = new CreatureDAO();
        $creatureDAO->update($creature);

        header('Location: ../../../index.php');
    }

    function deleteAction() {
        $id = $_GET["id"];

        $creatureDAO = new CreatureDAO();
        $creatureDAO->delete($id);

        header('Location: ../../../index.php');
    }

    function getCreatures() {
        // Recupero el ID de la Oferta
        $idOffer = $_GET["idOffer"];

        // Creo un objeto CreatureDAO
        $creatureDAO = new CreatureDAO();

        // Recupero las criaturas asociadas a la oferta
        return $creatureDAO->selectCreaturesByOffer($idOffer);
    }
}

?>