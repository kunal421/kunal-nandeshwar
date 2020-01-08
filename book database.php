<?php
//book no book name price publishere pub_id name and address and accept publisher name and display book details
//published by that publisher
?>
<html>
<body>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
Enter Book publisher name : <input type="text" name="pn">
<input type="submit">
</form>
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
$p=$_POST['pn'];
$conn=mysqli_connect("localhost","root","") or die(mysqli_error());
//$db=mysqli_query($conn,"create database php") or die(mysqli_error($conn));
mysqli_select_db($conn,"php")or die(mysqli_error());
$result=mysqli_query($conn,"SELECT * FROM book WHERE publisher='$p'");
if($result->num_rows > 0)
{
	while($row=$result->fetch_assoc())
	{
		echo "<br>book name = ".$row["name"];
	}
}
else
{
	echo "not found";
}
mysqli_close($conn);
}
?>
