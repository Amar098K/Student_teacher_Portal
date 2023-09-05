<html>
<head>
 <link rel="stylesheet" href="home.css?version=81"/>
</head>
<?php

$conn=new mysqli("localhost","root","","studentresult");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
$stuerror=" ";
$studentroll="";
$studentpass="";
$teacherid="";
$teacherpass="";
$teaerror=" ";
if(isset($_POST["student_submit"]))
{
    if($_POST["studentroll"]!="" && $_POST["studentpass"]!="")
    {
        $studentroll=$_POST["studentroll"];
        $studentpass=$_POST["studentpass"];
        if($conn)
      {
          $sql="SELECT count(*) as cntUser
          FROM student_details
          WHERE roll='$studentroll' AND studentPassword= '$studentpass' ";


$result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $count = $row['cntUser'];
           if($count > 0)
          {
              $_SESSION['studentroll']=$studentroll;

              header('location:studentlogin/studentlogin.php');
           
             
          }
          else{
             
             $stuerror="*";
          }
          

      }
    }
}
if(isset($_POST["teacher_submit"]))
{
    if($_POST["teacherid"]!="" && $_POST["teacherpass"]!="")
    {
        $teacherid=$_POST["teacherid"];
        $teacherpass=$_POST["teacherpass"];
        if($conn)
      {
          $sql="SELECT count(*) as cntUser
          FROM teacher_details
          WHERE id='$teacherid' AND Teacherpassword= '$teacherpass' ";


$result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $count = $row['cntUser'];
           if($count > 0)
          {session_start();
              
            $_SESSION['teacherid']=$teacherid;

              header('location:teacherlogin/teacherlogin.php');
          }
          else{
             
             $teaerror="*";
          }

      }
    }
}
?>

<body>
    <div class="head">
        <div class="image">
    <img src="calicut_logo.png" height="75px"/>
</div>
    <div class="main">
<h1>Student Result Portal</h1>
</div>
</div>


<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
<div class="both">
<div class="student">
<div class="login stu">Student</div>
<div class="logo stu">
    <img src="graduate.png" height="150px"/>

</div>
<div class="login_details stu">
  
    <div>
        Student Roll: <input type="number" name="studentroll" /><span><?php echo "$stuerror";?></span>
    </div>
    <div>
        Password: <input type="password" name="studentpass" /><span><?php echo "$stuerror";?></span>
    </div>
    <div>
        <button type="submit" name="student_submit">Login</button>
    </div>

</div>

</div>
<div class="teacher">
<div class="login tea">Teacher</div>
<div class="bottom tea">
<div class="logo tea">
    <img src="teacher.png" height="150px"/>
</div>
<div class="login_details tea">

    <div>
        Teacher id: <input type="number" name="teacherid" /><span><?php echo "$teaerror"?></span>
    </div>
    <div>
        Password: <input type="password" name="teacherpass" /><span><?php echo "$teaerror"?></span>
    </div>
    <div>
        <button type="submit" name="teacher_submit" >Login</button>
    </div>

</div>
</div>
</div>
</div>
</form>
<div class="logos">
    <ul>
        <li><a href="https://www.facebook.com/" target="_blank"><img src="facebook.png" height="25px" ></a></li>
        <li><a href="https://www.youtube.com/" target="_blank"><img src="youtube.png" height="25px"></a></li>
        <li><a href="https://www.instagram.com/" target="_blank"><img src="instagram.png" height="25px"></a></li>
            
</ul>
</div>
</body>



</html>