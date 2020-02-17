<html>
<head>
<title>dynamic attendance</title>
<link rel="stylesheet" href="style.css" type="text/css">
<style type="text/css">
body
{
	background-image: url('bg.jpg');
	background-repeat: no-repeat;
	background-size: 100%,100%;
}
#hpwrapper{
	height: 650px;
	border-radius : 10px;
	background-color: white;//#2980b9;
	border: 3px solid #f1f1f1;
	width: 500px;
	margin: 0 auto;
}

.navlist:hover{
            background-color:#78e08f;
            color:white;
}
.logout_button{
	background-color: #78e08f;
    color: white;
	margin-top:10px;
    padding:10px;
    width: 100%;
	font-size:18px;
	font-weight: bold;
	border: 0px solid #f1f1f1;
}
</style>
</head>
<body>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
	<div class="nav" id="hpwrapper">
		<center><h2 style="color:#78e08f">&nbsp;&nbsp;&nbsp;&nbsp;attendance</h2></center>
		<center><img src="studentdb.jpg" height="200" width="200">
		<br>
<br>
<! –– <input type="text" name="fn">
		<! –– <input type="submit">
<a href="principaldb.php"><input type="button" value="back"></a><br>
<input type="date" name="tdmayur"><br>
<table border="1">
<?php
//if($_SERVER["REQUEST_METHOD"]=="POST")
//{
//$ne=$_POST['fn'];
  $dbname="sms";
   $servername = "localhost";
   $username = "root";
   $password = "";
$cnt=0;
    $conn=new mysqli($servername, $username, $password)or die(mysqli_error());
    //mysqli_query($conn,$sql) or die(mysqli_error());//$conn->query($conn,$sql)or die(mysqli_error());
    mysqli_select_db($conn,$dbname) or die(mysqli_error($conn));
    $value="SELECT * FROM student";
  $result=$conn->query($value);
  if($result->num_rows > 0)
  {
    while ($row = $result->fetch_assoc())
    {
        {
			echo "</td><td>".$row["name"];
			echo "</td><td><select name='m'><option>present</option><option>absent</option></select>";
			echo "</td></tr>";
		}	
	}
	}
 //}
?>
</center>
</table>
<input type="submit">
<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$dttt=$_POST['tdmayur'];
	//mysqli_query($conn,"create table dynatt(dt date,sname varchar(20),preabs varchar(20))");
	$value="SELECT * FROM student";
  $result=$conn->query($value);
  if($result->num_rows > 0)
  {
	$xxxx=$_POST['m'];//$i='ab';
    while ($row = $result->fetch_assoc())
    {
        {
			//$i+='b';
			//$xyz=$_POST['$i'];
			$abcd=$row["name"];
			mysqli_query($conn,"insert into dynatt(dt,sname,preabs) values($dttt,$abcd,$xxxx)");
		}	
	}
	}
}
?>
</form>
</div>
</body>
</html>