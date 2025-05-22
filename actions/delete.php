<?php

    require_once("../database/connect.php")

    $description = filter_input(INPUT_GET, "id")

    if($id){
        $sql = $pdo->prepare("delete from tarefas where id = :id");
        $sql = bindValue(":id". $id);
        $sql = execute();

        header("Location ../index.php");
        exit;
    } else{
        header("Location ../index.php");
    }

?>