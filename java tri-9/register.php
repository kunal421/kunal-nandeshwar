<html>
<head>
<title>Sign Up Page</title>
<link rel="stylesheet" href="style.css">
<style type="text/css">
body{
	background-image: url('reg.jpg');
	background-repeat: no-repeat;
	background-size: 100%,100%;
}
#rgwrapper{
	height: 850px;
	border-radius : 10px;
	background-color: #3498db;
	border: 3px solid #f1f1f1;
	width: 500px;
	margin: 0 auto;
}
</style>
</head>
<body>
	<div id="rgwrapper">
	<center><br><br><h2>REGISTER FORM</h2></center>
		<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
			<div class="inner_container">
				<label><b>Name</b></label>
				<input type="text" placeholder="Enter Username" name="username" required>
				<label><b>Address</b></label>
				<input type="text" placeholder="Enter address" name="addr" required>
				<label><b>Enter Mail</b></label>
				<input type="text" placeholder="Enter mail" name="ml" required>
				<label><b>Contact Number</b></label>
				<input type="int" pattern="[6-9]{1}[0-9]{9}" placeholder="Enter number" name="nr" required>
				<label><b>Select Role</b></label><br><br>
				<select name="sl"><option value="student">Student</option><option value="teacher">Teacher</option><option value="staff">Staff</option><option value="principal">principle</option></select>
				<br><br><label><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="password" required>
				<label><b>Confirm Password</b></label>
				<input type="password" placeholder="Enter Password" name="cpassword" required>
				<button name="register" class="sign_up_btn" type="submit">Sign Up</button>
				<a href="login.php"><button type="button" class="back_btn"><< Back to Login</button></a>
			</div>
		</form>
	</div>
		
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$sele=$_POST['sl'];
  $name=$_POST["username"];
  $pass=$_POST["password"];
  $address=$_POST["addr"];
  $pass0=$_POST["cpassword"];
  $mail=$_POST["ml"];
  $number=$_POST["nr"];
  $dbname="sms";
   $servername = "localhost";
   $username = "root";
   $password = "";
   $v=0;
   $i=0;
   if(strlen($name)<3)
   {           echo "<script type='text/javascript'>alert('name is short');</script>";
	$v++;
   }
	if(strlen($pass)<4 || strlen($pass0)<4)
	{	echo "<script type='text/javascript'>alert('password is short');</script>";
	$v++;
	}
	if(strlen($address)<6)
	{	echo "<script type='text/javascript'>alert('address is short');</script>";
	$v++;
	}
	if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) 
	{$v++;
	echo "<script type='text/javascript'>alert('invalid email');</script>";
	}
	if(strlen($number)!=10)
	{	echo "<script type='text/javascript'>alert('number should be 10 digit');</script>";
	$v++;
	}
	if($number[0] < 7)
	{	
		echo "<script type='text/javascript'>alert('invalid starting digit in the number');</script>";
		$v++;
	}
    $conn=new mysqli($servername, $username, $password);
    //$sql="CREATE DATABASE $dbname";
    //mysqli_query($conn,$sql) or die(mysqli_error());
    mysqli_select_db($conn,$dbname) or die(mysqli_error());
   // $table1="CREATE TABLE student(name varchar(20),address text,password varchar(20),email varchar(20),number bigint)";
   //$conn->query($table1) or die(mysqli_error($conn));
   //$table1="CREATE TABLE teacher(name varchar(20),address text,password varchar(20),email varchar(20),number bigint)";
   //$conn->query($table1) or die(mysqli_error($conn));
   //$table1="CREATE TABLE staff(name varchar(20),address text,password varchar(20),email varchar(20),number bigint)";
   //$conn->query($table1) or die(mysqli_error($conn));
  //$table1="CREATE TABLE principal(name varchar(20),address text,password varchar(20),email varchar(20),number bigint)";
   //$conn->query($table1) or die(mysqli_error($conn));
   if($v==0)
   {
    if($pass==$pass0)
    {
		if($sele=="student"){
      $values="INSERT INTO student(name,address,password,email,number) VALUES('$name','$address','$pass','$mail','$number')";
        if($conn->query($values)===TRUE)
              {
                $message = "Registered Successfully!";
                echo "<script type='text/javascript'>alert('$message');</script>";
              }     
      }
	  else if($sele=="teacher")
	  {
     $values="INSERT INTO teacher(name,address,password,email,number) VALUES('$name','$address','$pass','$mail','$number')";
        if($conn->query($values)===TRUE)
              {
                $message = "Registered Successfully!";
                echo "<script type='text/javascript'>alert('$message');</script>";
              }     
      }
	  else if($sele=="staff")
	  {
      $values="INSERT INTO staff(name,address,password,email,number) VALUES('$name','$address','$pass','$mail','$number')";
        if($conn->query($values)===TRUE)
              {
                $message = "Registered Successfully!";
                echo "<script type='text/javascript'>alert('$message');</script>";
              }     
      }
	  else if($sele=="principal")
	  {
		  $values="INSERT INTO principal(name,address,password,email,number) VALUES('$name','$address','$pass','$mail','$number')";
        if($conn->query($values)===TRUE)
              {
                $message = "Registered Successfully!";
                echo "<script type='text/javascript'>alert('$message');</script>";
              }     
      }
	}
      else 
      {
        $passerr="Check password";
        echo "<script type='text/javascript'>alert('$passerr');</script>";
	}
  }
}
?>
</body>
</html>