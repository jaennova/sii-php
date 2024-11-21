<?php
function conectarDB() {
    $host = 'sii-postgres.postgres.database.azure.com';    // URL de tu base de datos remota
    $port = '5432';                      // Puerto PostgreSQL (normalmente 5432)
    $dbname = 'postgres';       // Nombre de tu base de datos
    $user = 'jaen';                // Usuario de la base de datos
    $password = 'BDnova1!';           // Contraseña de la base de datos

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    try {
        $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return $pdo;
    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}
?>