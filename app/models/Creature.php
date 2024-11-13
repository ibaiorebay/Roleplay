<?php

/**
 * Class User
 * 
 * Encapsulates a user.
 *
 * @version    0.1
 * 
 * @author     cuatrovientos
 */
class Creature {

    private $creatureid;
    private $name;
    private $description;
    private $avatar;
    private $attack;
    private $life;
    private $weapon;

    //Getters and setters of User Class.

    public function getAttack() {
        return $this->attack;
    }

    public function setAttack($attack) {
        $this->attack = $attack;
    }

    public function getLife() {
        return $this->life;
    }

    public function setLife($life) {
        $this->life = $life;
    }

    public function getWeapon() {
        return $this->weapon;
    }

    public function setWeapon($weapon) {
        $this->weapon = $weapon;
    }

    public function getcreatureid() {
        return $this->creatureid;
    }

    public function setcreatureid($id) {
        $this->creatureid = $id;
    }

    public function getname() {
        return $this->name;
    }

    public function setname($name) {
        $this->name = $name;
    }

    public function getdescription() {
        return $this->description;
    }

    public function setdescription($description) {
        $this->description = $description;
    }

    public function getavatar() {
        return $this->avatar;
    }

    public function setavatar($avatar) {
        $this->avatar = $avatar;
    }

    function publicCreature2HTML() {
    $result = '<div class="col-md-4">';
    $result .= '<div class="card">';
    $result .= '<div class="card-block">';
    $result .= '<h2 class="card-title">' . $this->getname() . '</h2>';
    $result .= '<p class="card-text description">' . $this->getdescription() . '</p>';
    $result .= '</div>';
    
    // Mostrar el avatar si está disponible
    if ($this->getavatar()) {
        $result .= '<img src="' . $this->getavatar() . '" alt="Avatar" class="img-fluid" />';
    }

    // Mostrar más información como ataque, vida y arma
    $result .= '<div class="card-body">';
    $result .= '<p>Attack: ' . $this->getAttack() . '</p>';
    $result .= '<p>Life: ' . $this->getLife() . '</p>';
    $result .= '<p>Weapon: ' . $this->getWeapon() . '</p>';
    $result .= '</div>';
    
    // Añadir botones en el pie de la tarjeta
    $result .= '<div class="card-footer text-center">';
    $result .= '<div class="btn-group" role="group">';
    $result .= '<a href="#" class="btn btn-primary">Descripción</a>';
    $result .= '<a href="../public/views/creature/edit.php" class="btn btn-warning">Editar</a>';
    $result .= '<a href="#" class="btn btn-danger">Eliminar</a>';
    $result .= '</div>';
    $result .= '</div>';

    $result .= '</div>'; // Cierre de la tarjeta
    $result .= '</div>'; // Cierre de la columna

    return $result;
}

}

?>
