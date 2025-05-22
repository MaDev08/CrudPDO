<?php 

require_once('../database/connect.php');

$description = filter_input(INPUT_POST,  'description');

if ($description) {
    $sql = $pdo->prepare("INSERT INTO tarefas (descricao) VALUES (:description)");
    $sql->bindValue(':description', $description);
    $sql->execute();

    header('Location: ../index.php');
    exit;
} else {
    header('Location: ../index.php');
    exit;
}