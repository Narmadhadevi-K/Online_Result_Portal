<!DOCTYPE html>
<html lang="en">
<head>
    <title>Result Portal</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form2{
    width: 250px;
    height: 320px;
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

        

        </div><br><br><br><br> <br><br><br>
        <div style="width: 1200px;height: auto;margin: auto;color: #fff;position: relative;margin-right: 800px;margin-left:-350px">
           
                <form class="form2" action="dbcontact.php" method="post">
                    <h2>Contact Us</h2>
                    <input type="name" name="name" placeholder="Enter name Here" required/>
                    <input type="email" name="email" placeholder="Enter Email Here" required/>
                    <input type="text" name="message" placeholder="Message" required/>
                    <button class="btnn">Submit</a></button>
                </form>
                    <
        </div>
    </div>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>