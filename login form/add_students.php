<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" type="text/css" href="form2.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Result Portal</title>
    <style>
        .main{
               border-radius: 10px;
               border-width: 5px;
               border-style: solid;
               padding: 20px;
               margin: 7.5% 20% 0 20%;
               background-color:rgba(208, 216, 230, 0.705);
               font-family: Verdana, Geneva, Tahoma, sans-serif;
              
             }
    </style>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="kpriet.png" alt="" class="logo"></a>
        <span class="heading">Students Section</span>
        <div class="btnn">
        <a href="logout.php"><span class="fa fa-sign-out"></span> Logout</a>
        </div>
    </div>

    <div class="nav">
        <ul>
        <li>
                <a href="dashboard.php"><b>Dashboard</b></a>
            </li>
            
            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn"><b>Department &nbsp</b>
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Add Department</a>
                    <a href="manage_classes.php">Manage Department</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn"><b>Students &nbsp</b>
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Add Students</a>
                    <a href="manage_students.php">Manage Students</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn"><b>Results &nbsp</b>
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Add Results</a>
                    <a href="manage_results.php">Manage Results</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <form action="" method="post">
            <fieldset>
                <legend style="font-size:40px; text-align:center">Add Student</legend>
                <input type="text" name="name" placeholder="Student Name">
                <input type="text" name="regno" placeholder="Register No">
                
                <?php
                    include('dashboarddb.php');
                   
                    
                    $dept_result=mysqli_query($conn,"SELECT `dept` FROM `department`");
                        echo '<select name="dept">';
                        echo '<option selected disabled>Select Department</option>';
                    while($row = mysqli_fetch_array($dept_result)){
                        $display=$row['dept'];
                        echo '<option value="'.$display.'">'.$display.'</option>';
                    }
                    echo'</select>'
                ?>
                <input type="submit" value="Submit">
            </fieldset>
        </form>
    </div>

    
</body>
</html>

<?php

    if(isset($_POST['name'],$_POST['regno'])) {
        $name=$_POST['name'];
        $regno=$_POST['regno'];
        if(!isset($_POST['dept']))
            $dept=null;
        else
            $dept=$_POST['dept'];

        // validation
        if (empty($name) or empty($regno) or empty($dept) or preg_match("/[a-z]/i",$regno) or !preg_match("/^[a-zA-Z ]*$/",$name)) {
            if(empty($name))
                echo '<p class="error">Please enter name</p>';
            if(empty($dept))
                echo '<p class="error">Please select your department</p>';
            if(empty($regno))
                echo '<p class="error">Please enter your register number</p>';
            if(preg_match("/[a-z]/i",$regno))
                echo '<p class="error">Please enter valid register number</p>';
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    echo '<p class="error">No numbers or symbols allowed in name</p>'; 
                  }
            exit();
        }
        
        $sql = "INSERT INTO `students` (`name`, `regno`, `dept`) VALUES ('$name', '$regno', '$dept')";
        $result=mysqli_query($conn,$sql);

        
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid Details")';
            echo '</script>';
        }
        else{
            echo '<script language="javascript">';
            echo 'alert("Success!!")';
            echo '</script>';
        }

    }
?>