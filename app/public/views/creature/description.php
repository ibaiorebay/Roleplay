<?php
// Cargar el modelo de Creature y la conexión a la base de datos
require_once '../../models/Creature.php';
require_once 'persistence/conf/PersistentManager.php';

$db = PersistentManager::getInstance();

// Verificar que el ID de la criatura está disponible en la URL
if (isset($_GET['id'])) {
    $creature_id = $_GET['id'];
    $creature = Creature::getById($db, $creature_id);

    if (!$creature) {
        echo "La criatura no existe.";
        exit;
    }
} else {
    echo "ID de criatura no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Criatura</title>
    <link rel="stylesheet" href="/path/to/bootstrap.min.css"> <!-- Cambia el path si es necesario -->
</head>
<body>
    <div class="container mt-5">
        <h1>Detalles de la Criatura</h1>
        <form>
            <div class="mb-3">
                <label for="creatureid" class="form-label">ID</label>
                <input type="text" id="creatureid" class="form-control" value="<?php echo $creature->getcreatureid(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" id="name" class="form-control" value="<?php echo $creature->getname(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descripción</label>
                <textarea id="description" class="form-control" rows="3" readonly><?php echo $creature->getdescription(); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Avatar</label>
                <?php if ($creature->getavatar()): ?>
                    <img src="<?php echo $creature->getavatar(); ?>" alt="Avatar" class="img-fluid">
                <?php else: ?>
                    <p>No disponible</p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="attack" class="form-label">Ataque</label>
                <input type="text" id="attack" class="form-control" value="<?php echo $creature->getAttack(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="life" class="form-label">Vida</label>
                <input type="text" id="life" class="form-control" value="<?php echo $creature->getLife(); ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="weapon" class="form-label">Arma</label>
                <input type="text" id="weapon" class="form-control" value="<?php echo $creature->getWeapon(); ?>" readonly>
            </div>
            <a href="/creatures" class="btn btn-primary">Volver a la Lista</a>
            <a href="/creatures/<?php echo $creature->getcreatureid(); ?>/edit" class="btn btn-warning">Editar</a>
            <a href="/creatures/<?php echo $creature->getcreatureid(); ?>/delete" class="btn btn-danger">Eliminar</a>
        </form>
    </div>
</body>
</html>
