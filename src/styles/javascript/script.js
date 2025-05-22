$(document).ready(function () {
    //alert("Good morning") --> Serve para ver se já está funcionando o Jquery
    $(".edit-button").on("click", function () {
        var $task = $(this).closest(".task");
        $task.find(".progress").addClass("hidden");
        $task.find(".task-description").addClass("hidden");
        $task.find(".task-actions").addClass("hidden");
        $task.find(".edit-task").addClass("hidden");
    });

    $(".progress").on("click", function () {
        if ($(this).is(":checked")) {
            $(this).addClass("done");
        }
        else {
            $(this).addClass("done");
        }
    });
});