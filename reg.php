<?php

$email=$_POST['email'];
$username=$_POST['username'];
$phone=$_POST['phone'];
$street=$_POST['street'];
$city=$_POST['city'];
$country=$_POST['country'];
$gender=$_POST['gender'];
$birthdate=$_POST['birthdate'];

//$passwd=$_POST['passwd'];

$passwd=password_hash($_POST['passwd'], PASSWORD_DEFAULT);

$dbc=mysqli_connect('localhost','root','','slm')or die("Error connecting to SQL server");

$query="insert into users (username,email,passwd,phone,street,city,country,gender,birthdate)values('$username','$email','$passwd','$phone','$street','$city','$country','$gender','$birthdate')";

$result=mysqli_query($dbc,$query) or die("Error querying the db");

if($result==false)
{
header("Location:Registration.html");
}
else
{ 
header("Location:LandingPage.html");
}
mysqli_close($dbc);
?>
