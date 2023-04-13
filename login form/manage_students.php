<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type='text/css' href="manage6.css">
    <title>Result Portal</title>
    <style>
        .main{
               border-radius: 10px;
               border-width: 5px;
               border-style: solid;
               padding: 20px;
               margin: 7.5% 20% 0 15%;
               background-color:rgba(208, 216, 230, 0.705);
               font-family: Verdana, Geneva, Tahoma, sans-serif;
               text-align:center
             } 
            </style>
    </style>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="kpriet.png" alt="" class="logo"></a>
        <span class="heading">Students Section</span>
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
        <?php
            include('dashboarddb.php');
           

            $sql = "SELECT `name`, `regno`, `dept` FROM `students`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo "<fieldset><table>
              
                <legend style=font-size:40px;>Manage Students</legend>
                <tr>
                <th>S.NO</th>
                <th>NAME</th>
                <th>REGNO</th>
                <th>DEPT</th>
                <th>ACTION</th>
            
                </tr></fieldset>";
                
                $cnt=1;
                while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>";
                    echo"<td>$cnt</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['regno'] . "</td>";
                    echo "<td>" . $row['dept'] . "</td>";
                    echo "<td><a href='delete-student.php?regno=".$row['regno']."' style='color:#F66; text-decoration:none;'><span class='fa fa-trash'></span> Remove</a></td>";
                    echo "</tr>";
                 $cnt++; }

                echo "</table>";
                
            } else {
                echo "0 Students";
            }
        ?>
    </div>

  
</body>
</html>
