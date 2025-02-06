<!-- Fetch Data -->
<?php

//  Database 
include('db.php');

$sql = "select * from todo_list";
$res = mysqli_query($db, $sql);

// Mark Completer

if (isset($_REQUEST['markchange'])) {

    $id = $_REQUEST['markchange'];

    $marksql = "update todo_list set mark='come' where todo_id = '$id'";
    mysqli_query($db, $marksql);
    header("location:index.php");

}

// Delete 
if (isset($_REQUEST['deltodo'])) {

    $todo_id = $_REQUEST['deltodo'];

    $delsql = "delete from todo_list where todo_id = '$todo_id'";
    mysqli_query($db, $delsql);
    header("location:index.php");


}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Todo App </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <!-- Body Content Here -->
    <div class="container">
        <h1>Todo List</h1>
        <form class="todo_form" action="todo.php" method="post">
            <input type="text" name="task" placeholder="Enter Todo" required>
            <button name="todoi">Add</button>
        </form>
        <div class="tasks">
            <?php
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                    <?php if ($row['mark'] == 'Uncome') { ?>
                        <div class="task">
                            <div class="task_action"><a href="index.php?markchange=<?php echo $row['todo_id'] ?>" class="markest"><i
                                        class='bx bx-cool'></i></a></div>
                            <div class="task_name">
                                <p><?php echo $row['task'] ?></p>
                            </div>
                            <div class="task_action"><a href="index.php?deltodo=<?php echo $row['todo_id'] ?>"><i
                                        class='bx bx-x'></i></a></div>
                        </div>
                    <?php } else { ?>
                        <div class="task">
                            <div class="task_action"><a href="#" class="markest come_markest"><i class='bx bx-cool'></i></a></div>
                            <div class="task_name com_task">
                                <p><?php echo $row['task'] ?></p>
                            </div>
                            <div class="task_action"><a href="index.php?deltodo=<?php echo $row['todo_id'] ?>"><i
                                        class='bx bx-x'></i></a></div>
                        </div>
                    <?php } ?>
                <?php }
            } else {
                ?>
                <div class="task">

                    <div class="task_name">
                        <p>Add Your Task Here To Do...</p>
                    </div>

                </div>
                <?php
            }

            ?>
        </div>
    </div>



    <!-- Javascript content -->

</body>

</html>