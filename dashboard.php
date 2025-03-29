<?php
require 'CRUD.php';

if (!isset($_SESSION['user']) || $_SESSION['2fa_verified'] !== true) {
    header('Location: login.php');
    exit;
}

    $stmt = $pdo->prepare("SELECT * FROM roles WHERE rechten_nivea  = ?");
    $stmt->execute([$_SESSION['role']]);
    $role = $stmt->fetch();

    if(isset($_POST['delete_id'])){
        deletePost($_POST['delete_id']);
    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
</head>

<body>
    <h2>Welkom <?= $_SESSION['user']."(".$role['naam'].")" ?>!</h2>
    <p>Je bent volledig ingelogd.</p>

    <a href="logout.php">Uitloggen</a>
    <?php
        // print_r(getAllPosts());
        $posts = getAllPosts();
        if($_SESSION['role'] >= 1){
            foreach ($posts as $post) {
                echo "<h2>" . htmlspecialchars($post['title']) . "</h2>";
                echo "<p>" . htmlspecialchars($post['text']) . "</p>";
                if($_SESSION['role'] >= 3){
                    echo "<form method='GET' action='edit_post.php'> <input type='hidden' name='id' value='".$post['ID']."'> <input type='submit' value='Wijziging Post'> </form>";
                }
                if($_SESSION['role'] >= 4){
                    echo "<form method='POST'> <input type='hidden' name='delete_id' value='".$post['ID']."'> <input type='submit' value='Verwijderen Post'> </form>";
                }
            }
        }
        if($_SESSION['role'] >= 2){
            echo "<br><br><a href='create_post.php'>Toevoeg Post</a>";
        }
    ?>
</body>

</html>