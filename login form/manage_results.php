<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="form2.css">
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
        <span class="heading">Results Section</span>
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
                    <a href="manage_classes.php">Manage Class</a>
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
        <br><br>
        <form action="" method="post">
            <fieldset>
                <legend style="font-size:40px; text-align:center">Delete Result</legend>
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
                <input type="text" name="regno" placeholder="Register Number">
                <input type="submit" value="Delete">
            </fieldset>
        </form>
        

        
    </div>

 
    
</body>
</html>

<?php
    if(isset($_POST['dept'],$_POST['regno'])) {
        $dept=$_POST['dept'];
        $regno=$_POST['regno'];
        echo $dept;
        echo $regno;
        $delete_sql=mysqli_query($conn,"DELETE from `result` where `regno`='$regno' and `dept`='$dept'");
        if(!$delete_sql){
            echo '<script language="javascript">';
            echo 'alert("Not available")';
            echo '</script>';
        } else {
            echo '<script language="javascript">';
            echo 'alert("Deleted")';
            echo '</script>';
        }
    }
    ?>
   