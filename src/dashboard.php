<?php
require 'db.php';
session_start();

if (!isset($_SESSION['estudiante'])) {
    header("Location: index.php");
    exit;
}

$estudiante = $_SESSION['estudiante'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($estudiante['nombre']); ?></h1>
    <p>Carrera: <?php echo htmlspecialchars($estudiante['carrera']); ?></p>
    <p>Semestre: <?php echo htmlspecialchars($estudiante['semestre']); ?></p>
    <p>Promedio: <?php echo htmlspecialchars($estudiante['promedio']); ?></p>
    <h2>Horario</h2>
    <ul>
        <?php foreach (json_decode($estudiante['horario'], true) as $materia): ?>
            <li><?php echo htmlspecialchars($materia['materia']) . " - " . htmlspecialchars($materia['hora']); ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
