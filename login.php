<!doctype html>
<?php 
include "connect.php";
session_start();
if(isset($_SESSION['email'])) 
    header('location:index.php');

    if(isset($_POST['sub'])) {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $qry = "SELECT * FROM `tbl_user` WHERE  `user_email`='$email' AND `password`='$pass';";
        $sql = mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
         if(mysqli_num_rows($sql)>0) {
            $row=mysqli_fetch_assoc($sql);
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION["user_name"] = $row['user_name'];
            $_SESSION["email"] = $row['user_email'];
            header('location:index.php');
        } else {
            $warning = "Invalid login";
        }
    
    }
?>
<html>
<head>
<
<link  rel=stylesheet href="home.css">
<title>feedback</title>
</head>
<body>
<div class ="a">
<h1> PRODUCT FEEDBACK </h1>

<a href="home.html" > Home </a>
<a href="login.html" > Login </a>
<a href="register.html" > register </a>
<a href="about.html" > About </a>
</div>
<h2> LOGIN </h2>
<div class="p">
<h3> USER LOGIN</h3>
<form>
email:
<pre><input type="text" name="email"></pre>
username :
<pre><input type="text" name="username"></pre>
password:
<pre><input type="password" name="password"> </pre>
<input type="submit" name="submit"> <br>
</form>
<h3> ADMIN LOGIN</h3>
<form>
username :
<pre><input type="text" name="username"></pre>
password:
<pre><input type="password" name="password"> </pre>

<input type="submit" name="submit"> <br>
</form>
</div>
</body>
</html>
