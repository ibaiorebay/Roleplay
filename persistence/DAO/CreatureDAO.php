<?php

//dirname(__FILE__) Es el directorio del archivo actual
require_once(dirname(__FILE__) . '..\..\conf\PersistentManager.php');

class CreatureDAO {

    //Se define una constante con el nombre de la tabla
    const CREATURE_TABLE = 'creature';

    //Conexión a BD
    private $conn = null;

    //Constructor de la clase
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    public function selectAll() {
        $query = "SELECT * FROM " . CreatureDAO::CREATURE_TABLE;
        $result = mysqli_query($this->conn, $query);
        $creatures = array();
        while ($userBD = mysqli_fetch_array($result)) {
            $creature = new Creature();
            $creature->setCreatureId($userBD["idCreature"]);
            $creature->setName($userBD["name"]);
            $creature->setDescription($userBD["descripcion"]);
            $creature->setAvatar($userBD["avatar"]);
            $creature->setAttack($userBD["attackPower"]);
            $creature->setLife($userBD["lifeLevel"]);
            $creature->setWeapon($userBD["weapon"]);

            array_push($creatures, $creature);
        }
        return $creatures;
    }

    public function insert($creature) {
        $query = "INSERT INTO " . CreatureDAO::CREATURE_TABLE . " (name, description, avatar, attackPower, lifeLevel, weapon) VALUES(?,?,?,?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);

        $name = $creature->getName();
        $description = $creature->getDescription();
        $avatar = $creature->getAvatar();
        $attack = $creature->getAttack();
        $life = $creature->getLife();
        $weapon = $creature->getWeapon();

        mysqli_stmt_bind_param($stmt, 'sssiis', $name, $description, $avatar, $attack, $life, $weapon);
        return $stmt->execute();
    }

    public function getCreatureInformation($creature) {
        $query = "SELECT id, name, description, avatar, attack, life, weapon FROM " . CreatureDAO::CREATURE_TABLE . " WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        $creatureId = $creature->getCreatureId();

        $stmt->bind_param('i', $creatureId);
        $stmt->execute();
        $result = $stmt->get_result();
        mysqli_stmt_store_result($stmt);
        $rows = mysqli_stmt_num_rows($stmt);

        if ($result->num_rows == 1) {
            $datosBD = $result->fetch_assoc();
            $creature->setCreatureId($datosBD['id']);
            $creature->setName($datosBD['name']);
            $creature->setDescription($datosBD['description']);
            $creature->setAvatar($datosBD['avatar']);
            $creature->setAttack($datosBD['attack']);
            $creature->setLife($datosBD['life']);
            $creature->setWeapon($datosBD['weapon']);

            return $creature;
        } else {
            return null;
        }
    }

    public function selectById($id) {
        $query = "SELECT name, description, avatar, attack, life, weapon FROM " . CreatureDAO::CREATURE_TABLE . " WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $name, $description, $avatar, $attack, $life, $weapon);

        $creature = new Creature();
        while (mysqli_stmt_fetch($stmt)) {
            $creature->setCreatureId($id);
            $creature->setName($name);
            $creature->setDescription($description);
            $creature->setAvatar($avatar);
            $creature->setAttack($attack);
            $creature->setLife($life);
            $creature->setWeapon($weapon);
        }

        return $creature;
    }

    public function delete($id) {
        $query = "DELETE FROM " . CreatureDAO::CREATURE_TABLE . " WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }
}

?>
