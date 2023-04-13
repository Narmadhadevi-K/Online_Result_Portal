<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $regno = $_POST['regno'];
    $password = $_POST['password'];
    $cpass= $_POST['confirm_password'];

    if($name && $email && $regno && $password && $cpass)  {
        if($password==$cpass) {

            $conn = new mysqli('localhost','root','1234567','result_portal');
            if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
            }
            else{
            $stmt = $conn->prepare("insert into sign_up(name, email, regno, password, confirm_password)
                    value(?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss",$name, $email, $regno, $password, $cpass);
            $stmt->execute();
           

            
            }
            header("Location: popup.php");
            exit();
            $stmt->close();
            $conn->close();
            } 
        }
        else {
                echo "<h2>Your passwords don't match!!</h2>";
            } 
        

     
            
