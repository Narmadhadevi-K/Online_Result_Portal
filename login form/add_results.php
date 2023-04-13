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
        <a href="logout.php" ><span class="fa fa-sign-out"></span> Logout</a>
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
            <legend style="text-align:center; font-size:40px">Enter Marks</legend>

                <?php
                    include("dashboarddb.php");
                    

                    $select_class_query="SELECT `dept` from `department`";
                    $dept_result=mysqli_query($conn,$select_class_query);
                    //select department
                    echo '<select name="dept">';
                    echo '<option selected disabled>Select department</option>';
                    
                        while($row = mysqli_fetch_array($dept_result)) {
                            $display=$row['dept'];
                            echo '<option value="'.$display.'">'.$display.'</option>';
                        }
                    echo'</select>';                      
                ?>

                <input type="text" name="regno" placeholder="Student's Register Number">
                <input type="text" name="sub1" id="" placeholder="Subject 1 - Marks">
                <input type="text" name="sub2" id="" placeholder="Subject 2 - Marks">
                <input type="text" name="sub3" id="" placeholder="Subject 3 - Marks">
                <input type="text" name="sub4" id="" placeholder="Subject 4 - Marks">
                <input type="text" name="sub5" id="" placeholder="Subject 5 - Marks">
                <input type="submit" value="Generate">
            </fieldset>
        </form>
    </div>

</body>
</html>

<?php
    if(isset($_POST['regno'],$_POST['sub1'],$_POST['sub2'],$_POST['sub3'],$_POST['sub4'],$_POST['sub5']))
    {
        $regno=$_POST['regno'];
        if(!isset($_POST['dept']))
            $dept=null;
        else
            $dept=$_POST['dept'];
        $sub1=(int)$_POST['sub1'];
        $sub2=(int)$_POST['sub2'];
        $sub3=(int)$_POST['sub3'];
        $sub4=(int)$_POST['sub4'];
        $sub5=(int)$_POST['sub5'];

        $tmarks=$sub1+$sub2+$sub3+$sub4+$sub5;
        $percentage=$tmarks/5;

        // validation
        if (empty($dept) or empty($regno) or $sub1>100 or  $sub2>100 or $sub3>100 or $sub4>100 or $sub5>100 or $sub1<0 or  $sub2<0 or $sub3<0 or $sub4<0 or $sub5<0 ) {
            if(empty($dept))
                echo '<p class="error">Please select department</p>';
            if(empty($regno))
                echo '<p class="error">Please enter register number</p>';
            if(preg_match("/[a-z]/i",$regno))
                echo '<p class="error">Please enter valid register number</p>';
            if(preg_match("/[a-z]/i",$tmarks))
                echo '<p class="error">Please enter valid marks</p>';
            if($sub1>100 or  $sub2>100 or $sub3>100 or $sub4>100 or $sub5>100 or $sub1<0 or  $sub2<0 or $sub3<0 or $sub4<0 or $sub5<0)
                echo '<p class="error">Please enter valid marks</p>';
            exit();
        }

        $name=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `regno`='$regno' and `dept`='$dept'");
        while($row = mysqli_fetch_array($name)) {
            $display=$row['name'];
            echo $display;
         }

        $sql="INSERT INTO `result` (`name`, `regno`, `dept`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `tmarks`, `percentage`) VALUES ('$display', '$regno', '$dept', '$sub1', '$sub2', '$sub3', '$sub4', '$sub5', '$tmarks', '$percentage')";
        $sql=mysqli_query($conn,$sql);

        if (!$sql) {
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