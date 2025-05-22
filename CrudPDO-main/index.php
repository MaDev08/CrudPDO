<?php 
    require_once("database/connect.php");

    $tasks = [];

    $sql = $pdo->query("SELECT * FROM tarefas ORDER BY id ASC"); 

    if ($sql->rowCount() > 0){
        $tasks = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/styles/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>To-do list</title>
</head>

<body>
    <div id="to_do">
        <h1>Coisas para fazer</h1>

        <form action="actions/create.php" method="POST" class="to-do-form">
            <input type="text" name="description" placeholder="Escreva a sua tarefa aqui" required>
            <button type="submit" class="form-button">
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>

        <div id="tasks">
            <?php foreach($tasks as $task): ?>
            <div class="task">
                <input
                    type="checkbox"
                    name="progress"
                    class="progress <?= isset($task['completed']) && $task['completed'] ? 'done' : '' ?>"
                    data-task-id="<?= isset($task['id']) ? $task['id'] : '' ?>"
                    <?= isset($task["completed"]) && $task["completed"] ? 'checked' : '' ?>
                >

                <p class="task-description">
                    <?= isset($task["description"]) ? htmlspecialchars($task["description"]) : "Descrição não disponível" ?>
                </p>

                <div class="task-actions">
                    <a class="action-button edit-button">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </a>

                    <a href="actions/delete.php?id=<?= isset($task["id"]) ? $task["id"] : '' ?>" class="action-button delete-button">
                        <i class="fa-regular fa-trash-can"></i>
                    </a>
                </div>

                <form action="actions/update.php" method="POST" class="to-do-form edit-task hidden">
                    <input type="hidden" name="id" value="<?= isset($task["id"]) ? $task["id"] : '' ?>">
                    <input type="text" name="description" placeholder="Nova descrição">
                    <button type="submit" class="form-button confirm-button">
                        <i class="fa-solid fa-check"></i>
                    </button>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="src/javascript/script.js"></script>
</body>

</html>
