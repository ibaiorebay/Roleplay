<h1>Lista de Criaturas</h1>
<a href="/creatures/create">Crear Nueva Criatura</a>
<ul>
    <?php foreach ($creatures as $creature): ?>
        <li>
            <h2><?php echo $creature->getName(); ?></h2>
            <img src="<?php echo $creature->getImageUrl(); ?>" alt="<?php echo $creature->getName(); ?>" />
            <p><?php echo $creature->getDescription(); ?></p>
            <a href="/creatures/<?php echo $creature->getId(); ?>">Detalles</a>
            <a href="/creatures/<?php echo $creature->getId(); ?>/edit">Editar</a>
            <a href="/creatures/<?php echo $creature->getId(); ?>/delete">Eliminar</a>
        </li>
    <?php endforeach; ?>
</ul>
