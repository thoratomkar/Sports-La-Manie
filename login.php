<?php

$username=$_POST['username'];

$passwd=$_POST['passwd'];

//$passwd=password_hash($_POST['passwd'], PASSWORD_DEFAULT);

$dbc=mysqli_connect('localhost','root','','slm')or die("Error connecting to SQL server");

$query="select passwd from users where username='$username'";

$result=mysqli_query($dbc,$query) or die("Error querying the db");

if (mysqli_num_rows($result) > 0)
    while($row = mysqli_fetch_assoc($result)) 
        $passwd1=$row["passwd"];    
 else 
    echo "<script>alert('Login Unsuccesful');</script>";


if(password_verify($passwd, $passwd1))
{
echo "<script>alert('Login Succesful');window.location.href='LandingPage.html';</script>";
//header("Location:LandingPage.html");
}
else
{ 
echo "<script>alert('Login Unsuccesful');</script>";
header("Location:Login.html");
}
mysqli_close($dbc);
?>
