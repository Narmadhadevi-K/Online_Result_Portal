<?php

session_start();

include ("dashboarddb.php");
                                     
if (isset($_GET['id']))
{
    $id=$_GET['id'];
    $deleteQuery="DELETE FROM department where id=$id"; 
    mysqli_query($conn, $deleteQuery);

    echo "<script>window.location = 'manage_classes.php';</script>";
} else {
    echo "ERR!";
}

?>