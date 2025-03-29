<?php
require 'config.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username  = htmlspecialchars($_POST['username']);
    $email     = htmlspecialchars(trim($_POST['email']));
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname  = htmlspecialchars($_POST['lastname']);
    $password  = $_POST['password'];

    // Validatie
    if (!$username || !$email || !$firstname || !$lastname || !$password) {
        $errors[] = "Alle velden zijn verplicht.";
    }

    // Controleer unieke gebruikersnaam en e-mail
    $check = $pdo->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $check->execute([$username, $email]);
    $existing = $check->fetch();

    if ($existing) {
        if ($existing['username'] === $username) $errors[] = "Gebruikersnaam is al in gebruik.";
        if ($existing['email'] === $email) $errors[] = "E-mailadres is al geregistreerd.";
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, email, firstname, lastname, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$username, $email, $firstname, $lastname, $hashedPassword]);

        header('Location: login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registreren</title>
</head>

<body>
    <h2>Registratieformulier</h2>
    <form method="POST">
        <label>Gebruikersnaam:</label><br>
        <input type="text" name="username" required><br><br>

        <label>E-mailadres:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Voornaam:</label><br>
        <input type="text" name="firstname" required><br><br>

        <label>Achternaam:</label><br>
        <input type="text" name="lastname" required><br><br>

        <label>Wachtwoord:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Registreren</button>
    </form>

    <?php if ($errors): ?>
        <ul style="color:red;">
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>

</html>