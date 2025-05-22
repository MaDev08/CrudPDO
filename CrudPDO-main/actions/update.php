<?php

    require_once("../database/connect.php");

    $description = filter_input(INPUT_GET, "description");
    $id = filter_input(INPUT_GET, "id");

    if ($id && $description) {
        $sql = $pdo->prepare("UPDATE tarefas SET descricao = :description WHERE id = :id");
        
        // Corrigindo o uso do bindValue (use -> e não =)
        $sql->bindValue(":id", $id);
        $sql->bindValue(":description", $description);

        // Corrigindo a chamada do execute() (use -> e não =)
        if ($sql->execute()) {
            header("Location: ../index.php");
            exit;
        } else {
            echo "Erro ao atualizar a tarefa.";
        }
    } else {
        header("Location: ../index.php");
        exit;
    }

?>
