<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrap">
        <div class="task-list">
            <ul>
                <?php 
                    require("includes/connect.php");
                    $stmt = $pdo->prepare('SELECT * FROM tasks ORDER BY date DESC, time DESC');
                    $stmt->execute();
                    $resultat = $stmt->fetchAll(PDO::FETCH_OBJ);
                    // var_dump($resultat);die();
                    foreach($resultat as $row){
                        $task_id = $row->id;
                    ?>
                        <li>
                            <span> <?php echo $row->date.' '.$row->task ?> </span>
                            <img id="<?php echo $task_id ?>" class="delete-task" width="10px" src="images/close.svg"/> 
                        </li>
                <?php   
                    }
                ?>

            </ul>
        </div>
        <form class="add-new-task" autocomplete="off">
            <input type="text" id="new-task" name="new-task" placeholder="Add a new item..."/>
        </form>
    </div>

    <script src="./js/jquery-3.2.1.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script>
        delete_task();
        function delete_task(){
            $('.delete-task').click(function(){
                var current_element = $(this);
                var id = $(this).attr('id');

                $.post('includes/delete-task.php', {task_id: id}, function(){
                    current_element.parent().fadeOut("fast", function() { $(this).remove(); })
                })
            })
        }

        function add_task(){
            $('.add-new-task').submit(function(){
                // var new_task = $('.add-new-task input[name=new-task]').val();
                var new_task = $('#new-task').val();
                
                if(new_task != ''){
                    $.post('includes/add-task.php', {task: new_task}, function(data){
                        $('#new-task').val('');
                        $(data).prependTo('.task-list ul').hide().fadeIn();
                        current_element.parent().fadeOut("fast", function() { $(this).remove(); })
                    })
                }
            })
        }

    </script>

</body>
</html>