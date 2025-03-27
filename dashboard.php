<?php
require 'config.php';

if (!isset($_SESSION['user']) || $_SESSION['2fa_verified'] !== true) {
    header('Location: login.php');
    exit;
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h2>Welkom <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
    <p>Je bent volledig ingelogd.</p>

    <a href="logout.php">Uitloggen</a>
</body>

</html>