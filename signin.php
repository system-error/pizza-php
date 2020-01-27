<?php
include("config.php");

$semail = $_POST["semail"];
$spassword = $_POST["spassword"];

$sql = "SELECT * FROM players where email='$semail' AND password='$spassword' ";

$result = mysqli_query($conn,$sql);

if (!$row= mysqli_fetch_assoc($result)){
    echo "wrong email or password";
}
else {
    "Congratulations!";
}


?>