<?php 

$host="localhost";
$user="id15304932_myprepmate";
$password="Inp_Project_123";
$db="id15304932_logindemo";

$conn=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['login']))
{
    
    $uname=$_POST['uname'];
    $password=$_POST['password'];
    
    $sql="select * from login where username='".$uname."'AND password='".$password."' limit 1";
    
    if($result = $conn->query($sql))
     {
       if($result->num_rows == 1)
        {
        header("Location: ../stud_dash/stud-dash.html");
        //echo '<script>alert("welcome");</script><script>window.location.href = "intro.php";</script>';
        }
        else
        {
         echo'<html>
              <style>
              #snackbar {
              visibility: hidden;
              min-width: 250px;
              margin-left: -125px;
              background-color: #333;
              color: #fff;
              text-align: center;
              border-radius: 2px;
              padding: 16px;
              position: fixed;
              z-index: 1;
              left: 50%;
              bottom: 30px;
              font-size: 17px;
              }#snackbar.show {
              visibility: visible;
              -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
              animation: fadein 0.5s, fadeout 0.5s 2.5s;
              }@-webkit-keyframes fadein {
              from {bottom: 0; opacity: 0;} 
              to {bottom: 30px; opacity: 1;}}
              @keyframes fadein {
              from {bottom: 0; opacity: 0;}
              to {bottom: 30px; opacity: 1;}}
              @-webkit-keyframes fadeout {
              from {bottom: 30px; opacity: 1;} 
              to {bottom: 0; opacity: 0;}}
              @keyframes fadeout {
              from {bottom: 30px; opacity: 1;}
              to {bottom: 0; opacity: 0;}}
              </style>
              <body>
              <div id="snackbar">Invalid Credentials</div>
              </body>
              </html>
              <script>
              function myFunction() {
              var x = document.getElementById("snackbar");
              x.className = "show";
              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
              }myFunction()
              </script>';
        //echo '<script>alert("Incorrect Credentials, enter again.");</script><script>window.location.href = "intro.php";</script>';
        }
     }    
}
if(isset($_POST['register']))
{
    
    $uname=$_POST['uname'];
    $password=$_POST['password'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $contact=$_POST['cno'];
   
    $sql="Insert into login(password,username) values('$password','$uname')";
        if($conn->query($sql) === TRUE)
    {
        header("Location: ../stud_dash/stud-dash.html");
    }
    else{
        echo "Error:".$sql." ".$conn->error;
    } 
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPrepMate</title>
    <script src="intro_script.js"></script>
    <link rel="stylesheet" href="Intro_style.css">    
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="intro.html" class="logo">
                MyPrepMate
            </a>
        </div>

        <nav>
            <div class="nav-items">
                <button class="button">Login</button>
                <button class="button-2">Join Now!</button>
            </div>
        </nav>
        
        <form method="POST">
            <div class="modal-bg">
                <div class="modal" id="01">
                    <h2>
                        Welcome!
                    </h2>
                    <img src="../images/img_avatar2.png" alt="avatar">
                    <label for="uname">
                        Username
                    </label>
                    <input type="text" name="uname" id="uname" required>
                    <label for="password">
                        Password
                    </label>
                    <input type="password" name="password" id="password" required>
                    <button name="login">Login In</button>
                    <a href="#">Forgot Password?</a>
                    <span class="modal-close">
                        <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm0 10.293l5.293-5.293.707.707-5.293 5.293 5.293 5.293-.707.707-5.293-5.293-5.293 5.293-.707-.707 5.293-5.293-5.293-5.293.707-.707 5.293 5.293z"/>
                        </svg>
                    </span>
                </div>
            </div>
        </form>
            
        <form name="Regform" class="modal-bg-2" method="POST">
            <div class="modal-2" id="02">
                <h2>
                    Welcome!
                </h2>
                <img src="../images/img_avatar2.png" alt="avatar">
                <input type="text" name="fname" id="fname" placeholder="First Name">
                <label for="fname">
                    First Name 
                </label>
                <input type="text" name="lname" id="lname" placeholder="Last Name">
                <label for="lname">
                    Last Name
                </label>
                <input type="text" name="email" id="email" placeholder="Email Id" autocomplete="off" onblur="ValidateEmail(document.Regform.email)">
                <label for="email">
                    Email
                </label>
                <input type="text" name="uname" id="uname" placeholder="Username">
                <label for="uname">
                    Username
                </label>
                <input type="password" minlength="8" maxlength="15" name="password" id="password" placeholder="Password" onkeyup="CheckStrength(document.Regform.password)">
                <label for="password">
                    Password
                </label>
                <progress value="0" max="100" id="progress"></progress>
                <font color="grey">(8-15 characters only)</font>
                <span id="progresslabel"></span>
                <input type="text" name="cno" id="cno" placeholder="Contact Number" autocomplete="off" onblur="ValidatePhone(document.Regform.cno)">                  
                <label for="cno">
                    Contact Number
                </label>
                <input list="genders" name="gender" placeholder="Gender">
                    <datalist id="genders">
                        <option value="Male"></option>
                        <option value="Female"></option>
                        <option value="Others"></option> 
                    </datalist>                    
                <label for="uname">
                    Gender
                </label>
                <button type="submit" name="register">Register Now!</button>
                <span class="modal-2-close">
                    <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd">
                        <path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm0 10.293l5.293-5.293.707.707-5.293 5.293 5.293 5.293-.707.707-5.293-5.293-5.293 5.293-.707-.707 5.293-5.293-5.293-5.293.707-.707 5.293 5.293z"/>
                    </svg>
                </span>
            </div>       
        </form>
    </header>
    <main>
        <section class="banner">
            <img src="../images/education.png" alt="banner" class="banner">
        </section>
        <section class="features">
            <h1>What makes us stand out?</h1>
            <div class="video">
                <img src="../images/video-lect.jpg" alt="Video Lectures">
                <div class="video-txt">
                    <h3>Video lectures</h3>
                    <h5>In-depth video lectures taught by World Class instructors making concepts simpler!</h5>
                </div>
            </div>
            <div class="elib">
                <div class="elib-txt">
                    <h3>Access to E-Libraries</h3>
                    <h5>In-depth video lectures taught by World Class instructors making concepts simpler!</h5>
                </div>
                <img src="../images/e-lib-final.jpg" alt="Video Lectures">
            </div>
            <div class="quiz">
                <img src="../images/quiz.jpg" alt="Video Lectures">
                <div class="quiz-txt">
                    <h3>Rigorous Testing</h3>
                    <h5>In-depth video lectures taught by World Class instructors making concepts simpler!</h5>
                </div>
            </div>
            <div class="report">
                <div class="report-txt">
                    <h3>Performance Reports</h3>
                    <h5>In-depth video lectures taught by World Class instructors making concepts simpler!</h5>
                </div>
                <img src="../images/reports-fin.jpg" alt="Video Lectures">
            </div>
        </section>
        <section class="courses">
            <h1>What will you learn today?</h1>
            <div class="course-categories" id="course-categories">
                <h3 class="course-categories-title">Courses just for you</h3>
                <div class="course-tags">
                    <div class="tag-wrapper">
                        <a href="../course_details/ds-course.html" class="tag-link"></a>
                        <img src="../images/ds-icon.jpg" alt="ds" width="300", height="350">
                        <div class="tag-card">
                            <a href="../course_details/ds-course.html" class="tag-card-name">Data<br>Structures</a>
                        </div>
                    </div>
                </div>
                <div class="course-tags">
                    <div class="tag-wrapper">
                        <a href="../course_details/dbms-course.html" class="tag-link"></a>
                        <img src="../images/db-icon.jpg" alt="dbms" width="300", height="350">
                        <div class="tag-card">
                            <a href="../course_details/dbms-course.html" class="tag-card-name">Database<br>Management</a>
                        </div>
                    </div>
                </div>
                <div class="course-tags">
                    <div class="tag-wrapper">
                        <a href="../course_details/iot-course.html" class="tag-link"></a>
                        <img src="../images/iot-icon.jpg" alt="iot" width="300", height="350">
                        <div class="tag-card">
                            <a href="../course_details/iot-course.html" class="tag-card-name">Internet of<br>Things</a>
                        </div>
                    </div>
                </div>
                <div class="course-tags">
                    <div class="tag-wrapper">
                        <a href="../course_details/cns-course.html" class="tag-link"></a>
                        <img src="../images/cns-icon.png" alt="cns" width="300", height="350">
                        <div class="tag-card">
                            <a href="../course_details/cns-course.html" class="tag-card-name">Cryptography &<br>Network Secutiy</a>
                        </div>
                    </div>
                </div>
                <div class="course-tags">
                    <div class="tag-wrapper">
                        <a href="../course_details/java-course.html" class="tag-link"></a>
                        <img src="../images/java.png" alt="jpl" width="300", height="350">
                        <div class="tag-card">
                            <a href="../course_details/java-course.html" class="tag-card-name">Java Programming</a>
                        </div>
                    </div>
                </div>
                <div class="course-tags">
                    <div class="tag-wrapper">
                        <a href="../course_details/inp-course.html" class="tag-link"></a>
                        <img src="../images/inp-icon.jpg" alt="inp" width="300", height="350">
                        <div class="tag-card">
                            <a href="../course_details/inp-course.html" class="tag-card-name">Web<br>Development</a>
                        </div>
                    </div>
                </div>
                <div class="course-tags">
                    <div class="tag-wrapper">
                        <a href="../course_details/os-course.html" class="tag-link"></a>
                        <img src="../images/os-icon.jpg" alt="os" width="300", height="350">
                        <div class="tag-card">
                            <a href="../course_details/os-course.html" class="tag-card-name">Operating<br>Systems</a>
                        </div>
                    </div>
                </div>
                <div class="course-tags">
                    <div class="tag-wrapper">
                        <a href="../course_details/eceb-course.html" class="tag-link"></a>
                        <img src="../images/e-biz-icon.jpg" alt="os" width="300", height="350">
                        <div class="tag-card">
                            <a href="../course_details/eceb-course.html" class="tag-card-name">E-Commerce &<br>E-Business</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="intro_script.js"></script>
</body>
</html>