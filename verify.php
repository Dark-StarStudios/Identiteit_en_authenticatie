<?php
require 'config.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputCode = $_POST['code'] ?? '';

    if ($inputCode == $_SESSION['2fa_code']) {
        $_SESSION['2fa_verified'] = true;
        unset($_SESSION['2fa_code']); // veiliger
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Ongeldige code.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>2FA Verificatie</title>
</head>

<body>
    <h2>Voer de code in die naar je e-mailadres is gestuurd:</h2>
    <form method="POST">
        <input type="text" name="code" required><br><br>
        <button type="submit">Verifiëren</button>
    </form>
    <p style="color:red;"><?= htmlspecialchars($error) ?></p>
</body>

</html>