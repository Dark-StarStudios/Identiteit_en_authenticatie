<?php
require 'CRUD.php';
if (!isset($_SESSION['user']) || $_SESSION['2fa_verified'] !== true) {
    header('Location: login.php');
    exit;
}
if($_SESSION['role'] < 3){
    echo "<h1>je hebt niet voldoende rechten!</h1>";
}else{

    if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['id'])){
        $title = $_POST['title'];
        $text = $_POST['text'];
        $id = $_POST['id'];
        updatePost($id,$title, $text);
        header('Location: dashboard.php');
        exit;
    }

    echo "
    <form method='POST' action='edit_post.php'>
    <label>Title:</label><br>
    <input type='text' name='title' required>
    <br><br>
    <label>Text:</label><br>
    <textarea name='text' required></textarea>
    <br><br>
    <input type='hidden' name='id' value='".$_GET['id']."'>
    <input type='submit' value='Edit Post'>
    </form>
    ";

}