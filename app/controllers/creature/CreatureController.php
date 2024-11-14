<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../../persistence/DAO/CreatureDAO.php');
require_once(dirname(__FILE__) . '/../../../app/models/Creature.php');
require_once(dirname(__FILE__) . '/../../../app/models/validations/ValidationsRules.php');
require_once(dirname(__FILE__) . '/../../../utils/SessionUtils.php');

$persistentManager = PersistentManager::getInstance();
$conn = $persistentManager->get_connection();

class CreatureController {
    private $creatureDAO;
    
    public function __construct() {
        $this->creatureDAO = new CreatureDAO();
    }

     public function listCreatures() {
        return $creatures = $this->creatureDAO->selectAll();
        
    }
    public function createCreature($name, $description, $avatar, $attackPower, $lifeLevel, $weapon) {
        // Creamos un objeto de tipo Creature
        $creature = new Creature();
        $creature->setName($name);
        $creature->setDescription($description);
        $creature->setAvatar($avatar);
        $creature->setAttackPower($attackPower);
        $creature->setLifeLevel($lifeLevel);
        $creature->setWeapon($weapon);

        // Usamos el DAO para insertar la criatura en la base de datos
        $this->creatureDAO->insertCreature($creature);
    }
    public function getCreatureById($id) {
        return $creature = $this->creatureDAO->getCreatureById($id);
    }
     public function updateCreature($id, $name, $description, $avatar, $attackPower, $lifeLevel, $weapon) {
        $creature = new Creature();
        $creature->setIdCreature($id);
        $creature->setName($name);
        $creature->setDescription($description);
        $creature->setAvatar($avatar);
        $creature->setAttackPower($attackPower);
        $creature->setLifeLevel($lifeLevel);
        $creature->setWeapon($weapon);

        // Actualizamos la criatura en la base de datos
        $this->creatureDAO->updateCreature($creature);
    }
    
    public function deleteCreature($id) {
        return $this->creatureDAO->deleteCreature($id);
    }
}

?>