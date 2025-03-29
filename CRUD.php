<?php
require 'config.php';

// CREATE
function createPost($title, $text) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO posts (title, text) VALUES (:title, :text)");
    $stmt->execute(['title' => $title, 'text' => $text]);
    return $pdo->lastInsertId();
}

// READ
function getAllPosts() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM posts ORDER BY ID DESC");
    return $stmt->fetchAll();
}

function getPostById($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM posts WHERE ID = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

// UPDATE
function updatePost($id, $title, $text) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE posts SET title = :title, text = :text WHERE ID = :id");
    return $stmt->execute(['title' => $title, 'text' => $text, 'id' => $id]);
}

// DELETE
function deletePost($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM posts WHERE ID = :id");
    return $stmt->execute(['id' => $id]);
}