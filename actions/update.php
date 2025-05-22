<?php

    require_once("../database/connect.php")

    $description = filter_input(INPUT_GET, "description")
    $id = filter_input(INPUT_GET, "id")

    if($id && $description){
        $sql = $pdo->prepare("update task set descricao = :description where id = :id");
        $sql = bindValue(":id". $id);
        $sql = bindValue(":description". $description);
        $sql = execute();

        header("Location ../index.php");
        exit;
    } else{
        header("Location ../index.php");
        exit;
    }

?>