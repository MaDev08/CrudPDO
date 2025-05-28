<?php

require_once('../database/connect.php');

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $sql = $pdo->prepare('DELETE FROM tarefas WHERE id = :id');
    $sql->bindValue(':id', $id);
    $sql->execute();
    
    header('Location: ../index.php');
    exit;
} else {
    header('Location: ../index.php');
    exit;
}