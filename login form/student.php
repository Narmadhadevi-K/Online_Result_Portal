<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="student.css">
    <title>Result Portal</title>
</head>
<body>

  <h3>KPR INSTITUTE OF ENGINEERING AND TECHNOLOGY</h3>
  
  <h4>Semester Results - 2022</h4>
    <?php
        include("dashboarddb.php");

        if(!isset($_POST['name']))
            $name=null;
        else
            $name=$_POST['name'];
            $regno=$_POST['regno'];
           
        
           

        // validation
        if (empty($regno) or empty($name) or preg_match("/[a-z]/i",$regno)) {
          if(empty($regno))
              echo '<p class="error">Please select your Register Number</p>';
          if(empty($name))
              echo '<p class="error">Please enter your Name</p>';
          if(preg_match("/[a-z]/i",$name))
              echo '<p class="error">Please enter valid Name</p>';
          exit();
      }

      $result_sql=mysqli_query($conn,"SELECT `name` FROM `students` WHERE `regno`='$regno' and `name`='$name'");
      while($row = mysqli_fetch_assoc($result_sql))
      {
      $name = $row['name'];
    
      }

      $result_sql=mysqli_query($conn,"SELECT `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `tmarks`, `percentage`, `dept` FROM `result` WHERE `regno`='$regno' and `name`='$name'");
      while($row = mysqli_fetch_assoc($result_sql))
      {
          $sub1 = $row['sub1'];
          $sub2 = $row['sub2'];
          $sub3 = $row['sub3'];
          $sub4 = $row['sub4'];
          $sub5 = $row['sub5'];
          $tmark = $row['tmarks'];
          $percentage = $row['percentage'];
          $dept = $row['dept'];
      }
      if(mysqli_num_rows($result_sql)==0){
          echo "no result";
          exit();
      }
    ?>

    <div class="container">
        <!-- <div class="details">
            <span>Name:</span> <?php echo $name; ?> <br>
            <span>Department:</span> <?php echo $dept; ?> <br>
            <span>Roll No:</span> <?php echo $regno; ?> <br>
        </div>

        <div class="main">
            <div class="s1">
                <p>Subjects</p>
                <p>Paper 1</p>
                <p>Paper 2</p>
                <p>Paper 3</p>
                <p>Paper 4</p>
                <p>Paper 5</p>
            </div>
            <div class="s2">
                <p>Marks</p>
                <?php echo '<p>'.$sub1.'</p>';?>
                <?php echo '<p>'.$sub2.'</p>';?>
                <?php echo '<p>'.$sub3.'</p>';?>
                <?php echo '<p>'.$sub4.'</p>';?>
                <?php echo '<p>'.$sub5.'</p>';?>
            </div>
        </div>

        <div class="result">
            <?php echo '<p>Total Marks:&nbsp'.$tmark.'</p>';?>
            <?php echo '<p>Percentage:&nbsp'.$percentage.'%</p>';?>
        </div>

        <div class="button">
            <button onclick="window.print()">Print Result</button>
        </div> -->


        <div class="main2">
            <table>
              <thead class="head1">
              <tr>
                        <td colspan="10" class="footer">Student's Name</td>
                        <td colspan="2"><?php echo $name;?> </td>
                        </tr>

                    <tr>
                        <td colspan="10" class="footer">Department</td>
                        <td colspan="2"><?php echo $dept;?> </td>
                        </tr>
                
                        <tr>
                        <td colspan="10" class="footer">Register Number</td>
                        <td colspan="2"><?php echo $regno;?> </td>
                        </tr>
    </thead></table>
              <table class="gap">
                <thead>
                  <tr>
                    <td> S.N </td>
                    <td colspan="10">Subjects</td>
                    <td rowspan="2"> Obtained Marks </td>
                  </tr>   
                </thead>
                <tbody>
                  <tr>
                    <td> 1 </td>
                    <td colspan="10">Paper 1 </td>
                    <td> <?php echo '<p>'.$sub1.' / 100</p>';?> </td>
                  </tr>
                
                  <tr>
                    <td> 2 </td>
                    <td colspan="10">Paper 2 </td>
                    <td> <?php echo '<p>'.$sub2.' / 100</p>';?></td>
                  </tr>
            
                  <tr>
                    <td> 3 </td>
                    <td colspan="10">Paper 3 </td>
                    <td> <?php echo '<p>'.$sub3.' / 100</p>';?> </td>
                  </tr>
            
                  <tr>
                    <td> 4 </td>
                    <td colspan="10">Paper 4 </td>
                    <td> <?php echo '<p>'.$sub4.' / 100</p>';?> </td>
                  </tr>
            
                  <tr>
                    <td> 5 </td>
                    <td colspan="10">Paper 5 </td>
                    <td> <?php echo '<p>'.$sub5.' / 100</p>';?> </td>
                  </tr>
                </tbody>
            
                
                <tfoot>
                    
                    <tr>
                    
                    <td colspan="10" class="footer">Total Marks Obtained</td>
                    <td colspan="2"> <?php echo $tmark;?> / 500 </td>
                    </tr>
                    
                    <tr>
                    <td colspan="10" class="footer">Percentage</td>
                    <td colspan="2"><?php echo $percentage;?>% </td>
                    </tr>

                    
                </tfoot>
              </table>

              <div class="row">
                  <div class="container">
                  <div class="button">
                    <button class="button" onclick="window.print()">Print Result</button>
        </div>
                  </div>
              </div>
        </div>
    </div>
     <h2>***END***</h2>
     <div class="dis">
     <h6> Disclaimer: The result published in our website is provisional only. CoE is not responsible for any inadvertment<br>
     error that may have crept in the data/results being published on the Net. This is being published on the Net<br>
     just for immediate information to the examinees. The Final Mark Sheets issued should only be treated authentic & final<br>
     in this regard.</h6> 
     </div>
</body>
</html>

<style>
  
  td {
    border: 1px solid #726E6D;
    padding: 10px;
  }
  
  thead{
    font-weight:bold;
    text-align:center;
    background: #625D5D;
    color:white;
   
    
  }

  .button {
  background-color: #0047AB;
  border: none;
  color: white;
  padding: 3px 6px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
  
 
  
  .footer {
    text-align:right;
    font-weight:bold;
  }
  
  tbody  {
    background:linear-gradient(to right, rgb(255, 255, 255),rgba(107, 97, 97, 0)), #D1D0CE;
  }
  tfoot  {
    background:linear-gradient(to right, rgb(255, 255, 255),rgba(107, 97, 97, 0)), #D1D0CE;
  }
  h2{
    text-align:center;
  }
  h3{
    text-align:center;
  }
  .head1  {
    background:linear-gradient(to right,rgba(107, 97, 97, 0), rgb(255, 255, 255)), #D1D0CE;
    color:black;
  }
  .gap{
    margin-top:20px;
  }
  h6{
    text-align:center;
  }
  h4{
    text-align:center;
  }
  body{
    background:url(bg3.jpg);
    background-repeat:no-repeat;
    background-size:cover;
  }
  
  </style>