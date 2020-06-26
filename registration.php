<?php

session_start();


$mysqli = new mysqli("localhost","root","","userlogin");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

if(!mysqli_select_db($mysqli,'userlogin'))
{
  echo 'Not Selected the Database';
}

$name = $_POST['user'];
$pass = $_POST['password'];
$pass = md5($pass);


$s = "select * from usertable where name = '$name'";

$result = mysqli_query($mysqli, $s);

$num = mysqli_num_rows($result);

if($num == 1){
    echo "User already exist";
}else{
    $reg= "insert into usertable(name , password) values ('$name' , '$pass')";
    mysqli_query($mysqli, $reg);
    echo" Registration Succesfull";
    
}
?>