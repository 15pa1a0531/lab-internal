<?php 
include "connect.php";
session_start();

if(isset($_POST['sub'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
		$qry1="select * from tbl_feedback where `user_name`='$name' or `user_email`='$email';";
		$sql=mysqli_query($conn,$qry1);
		if(mysqli_num_rows($sql)>0) {
			$warning = "You have already registered";
		}
		else{
        $qry = "INSERT INTO `tbl_user` ( `user_name`, `user_email`, `password`) VALUES ('$name', '$email', '$pass')";
        mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
        header('location:index.php');
		}
    }
?>
<html>
<head>
<link  rel=stylesheet href="home.css">
<title>feedback</title>
</head>
<body>
<div class ="a">
<h1> PRODUCT FEEDBACK </h1>
<a href="home.html" > Home </a>
<a href="login.html" > Login </a>
<a href="register.php" > register </a>
<a href="about.html" > About </a>
</div>
        
        <div>
                <h2>Register</h2>
				<h4> <?php if(isset($warning)) echo $warning; ?></h4>
                <form class="form" method="post" action="">
                Name<input type="text" name="name"><br><br>
                Email<input type="text" name="email"><br><br>
                Password<input type="password" name="pass"><br><br>
                Retype Password <input type="text" name="repass">
                <input type="submit" name="sub" value="Click to Submit">
            </form><br>
			<b>If you have Registered <a href="login.php">Login</a></b></div>
      </body>  
</html>
