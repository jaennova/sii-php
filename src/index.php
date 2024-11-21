<?php
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no_control = $_POST['no_control'];
    $pin = $_POST['pin'];

    $pdo = conectarDB();
    $stmt = $pdo->prepare("SELECT * FROM estudiantes WHERE no_control = :no_control AND pin = :pin");
    $stmt->execute(['no_control' => $no_control, 'pin' => $pin]);

    $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($estudiante) {
        $_SESSION['estudiante'] = $estudiante;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "No. de control o PIN incorrecto.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
        <input type="text" name="no_control" placeholder="No. de Control" required>
        <input type="password" name="pin" placeholder="PIN" required>
        <button type="submit">Ingresar</button>
    </form>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
</body>
</html>
