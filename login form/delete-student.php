<?php

session_start();

include ("dashboarddb.php");
                                     
if (isset($_GET['regno']))
{
    $regno=$_GET['regno'];
    $deleteQuery="DELETE FROM students where regno=$regno"; 
    mysqli_query($conn, $deleteQuery);

    echo "<script>window.location = 'manage_students.php';</script>";
} else {
    echo "ERR!";
}

?>