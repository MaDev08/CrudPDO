<?php

require_once('../database/connect.php');

$id = filter_input(INPUT_POST, 'id');
$completed = filter_input(INPUT_POST, 'completed');

if ($id && $completed) {
    $sql = $pdo->prepare("UPDATE tarefas SET completo = :completed WHERE id = :id");
    $sql->bindValue(':completed', $completed);
    $sql->bindValue(':id', $id);
    $sql->execute();

    echo json_encode(['sucesso' => true]);
    exit;
} else {
    echo json_encode(['sucesso' => false]);
    exit;
}