<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if($name && $email && $message)  {
        

            $conn = new mysqli('localhost','root','1234567','result_portal');
            if($conn->connect_error){
            die('Connection Failed : '.$conn->connect_error);
            }
            else{
            $stmt = $conn->prepare("insert into contact(name, email, message)
                    value(?, ?, ?)");        
            $stmt->bind_param("sss",$name, $email, $message);       
            $stmt->execute();
            header("Location: popup.php");
            exit();
            $stmt->close();
            $conn->close();
            }  
    }