<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="form2.css">
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
        <span class="heading">Class Section</span>
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
                <legend style="font-size:40px; text-align:center">Add Department</legend>
                <input type="text" name="dept" placeholder="Department Name">
                <input type="text" name="id" placeholder="Department ID">
                <input type="submit" value="Submit">
            </fieldset>        
        </form>
    </div>

    <div class="footer">

    </div>
</body>
</html>

<?php 
	include('dashboarddb.php');
   
    if (isset($_POST['dept'],$_POST['id'])) {
        $dept=$_POST["dept"];
        $id=$_POST["id"];

        // validation
        if (empty($dept) or empty($id) or preg_match("/[a-z]/i",$id)) {
            if(empty($dept))
                echo '<p class="error">Please enter department</p>';
            if(empty($id))
                echo '<p class="error">Please enter department id</p>';
            if(preg_match("/[a-z]/i",$id))
                echo '<p class="error">Please enter valid department id</p>';
            exit();
        }

        $sql = "INSERT INTO `department` (`dept`, `id`) VALUES ('$dept', '$id')";
        $result=mysqli_query($conn,$sql);
        
        if (!$result) {
            echo '<script language="javascript">';
            echo 'alert("Invalid class name or class id")';
            echo '</script>';
        } else{
            echo '<script language="javascript">';
            echo 'alert("Success!!")';
            echo '</script>';
        }
    }

?>