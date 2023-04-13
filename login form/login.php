<?php
 $name = $_POST['name'];
 $regno = $_POST['regno'];

 $con = new mysqli("localhost","root","1234567","result_portal");
 if($con->connect_error) {
    die("Failed to connect : ".$con->connect_error);
 } else {
    $stmt = $con->prepare("select * from students where name = ?");
    $stmt->bind_param("s", $name );
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
        if($data['regno'] === $regno) {
            header("Location: student.php");
            exit();
        } else{
            echo "<h2> Invalid name or regno </h2>";
        }
    }
 }
 ?>