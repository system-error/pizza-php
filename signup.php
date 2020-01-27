<?php
include("config.php");

$cname = $_POST["cname"];
$clastname = $_POST["clastname"];
$password = $_POST["password"];
$street = $_POST["street"];
$city = $_POST["city"];
$email = $_POST["email"];
$house_number = $_POST["house_number"];

$sql = "INSERT INTO customer(`email`, `password`, `street`, `cname`, `csurname`, `city`, `house_number`) 
VALUES ('$email','$password','$street','$cname','$clastname','$city','$house_number')";

if ( $conn->query($sql) === TRUE) {
        echo "new record created successfully";
}



?>