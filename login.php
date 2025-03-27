<?php
require 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $naam = 'user';

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['2fa_verified'] = false; // reset
        header('Location: send_code.php'); // let op!
        exit;
    } else {
        $error = 'Ongeldige gebruikersnaam of wachtwoord.';
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <form method="POST">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        <label>Wachtwoord:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Inloggen</button>
    </form>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
</body>

</html>