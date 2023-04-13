<!DOCTYPE html>
<html lang="en">
<head>
    <title>Result Portal</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form{
    width: 250px;
    height: 330px;
    background: linear-gradient(to top, rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
    position: absolute;
    top: -20px;
    left: 870px;
    transform: translate(0%,-5%);
    border-radius: 10px;
    padding: 25px;
}
    </style>
</head>
<body>

    <div class="main">
        <div class="navbar">
            <div class="icon">
            <a href="http://localhost/internship%20project/login%20form/login_page.php#"><img src="kpriet.png"></a>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="http://localhost/internship%20project/login%20form/login_page.php#">HOME</a></li>
                    <li><a href="about.php">ABOUT US </a></li>
                    <li><a href="contact.php">CONTACT US</a></li>
                    <li><a href="admin.php">ADMIN</a></li>
                </ul>
            </div>

        

        </div> 
        <div class="content">
            <h1> <span> Student<br> Result Portal</span> <br>Office of the Controller <br> of Examinations</h1>
            <p class="par"><b>Find more informations about Exams, Regulations and Results at <br> KPR Institute of  
                Engineering and Technology.</b></p>

                <button class="cn"><a href="https://kpriet.ac.in/admissions">ADMISSIONS</a></button>
                <form class="form" action="student.php" method="post">
                
                    <h2>Login Here</h2>
                    

                    <input type="name" name="name" placeholder="Name" required/>
                    <input type="password" name="regno" placeholder="Register Number" required/>
                    <button type="submit" name="submit" class="btnn">Login</button>
                   
                    
                    
                    <p class="liw">Official websites</p>

                    <div class="icons">
                        <a href="https://www.facebook.com/KPRIETonline/"><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href="https://www.instagram.com/lifeatkpr/?hl=en"><ion-icon name="logo-instagram"></ion-icon></a>
                        <a href="https://twitter.com/KPRIETonline?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><ion-icon name="logo-twitter"></ion-icon></a>
                        <a href="https://www.kpriet.ac.in/"><ion-icon name="logo-google"></ion-icon></a>
                    </div>

                
                 </form>
                    </div>
                </div>
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>