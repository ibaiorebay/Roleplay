<?php

class Creature {
    private $id;
    private $name;
    private $image_url;
    private $description;

    public function __construct($id = null, $name = "", $image_url = "", $description = "") {
        $this->id = $id;
        $this->name = $name;
        $this->image_url = $image_url;
        $this->description = $description;
    }

    // Métodos para obtener y establecer las propiedades
    public function getId() { return $this->id; }
    public function getName() { return $this->name; }
    public function getImageUrl() { return $this->image_url; }
    public function getDescription() { return $this->description; }

    public function setName($name) { $this->name = $name; }
    public function setImageUrl($image_url) { $this->image_url = $image_url; }
    public function setDescription($description) { $this->description = $description; }

    // Método para guardar una criatura en la base de datos
    public static function create($db, $creature) {
        $stmt = $db->prepare("INSERT INTO creature (name, image_url, description) VALUES (?, ?, ?)");
        $stmt->execute([$creature->getName(), $creature->getImageUrl(), $creature->getDescription()]);
        return $db->lastInsertId();
    }

    // Método para actualizar una criatura en la base de datos
    public static function update($db, $creature) {
        $stmt = $db->prepare("UPDATE creature SET name = ?, image_url = ?, description = ? WHERE id = ?");
        return $stmt->execute([$creature->getName(), $creature->getImageUrl(), $creature->getDescription(), $creature->getId()]);
    }

    // Método para obtener todas las criaturas
    public static function getAll($db) {
        $stmt = $db->query("SELECT * FROM creature");
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Creature");
    }

    // Método para obtener una criatura por ID
    public static function getById($db, $id) {
        $stmt = $db->prepare("SELECT * FROM creature WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchObject("Creature");
    }

    // Método para eliminar una criatura
    public static function delete($db, $id) {
        $stmt = $db->prepare("DELETE FROM creature WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
