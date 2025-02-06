<!-- TODO-App Php Script Here -->

<?php

// Database
include('db.php');

if(isset($_REQUEST['todoi'])){

    $task = $_REQUEST['task'];

    // insert task
    $sql = "insert into todo_list(task,mark) values('$task','Uncome')";
    mysqli_query($db,$sql);
    header("location:index.php");

}

?>