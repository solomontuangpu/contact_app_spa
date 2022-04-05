<?php

require_once "base.php";

$name = $_POST['name'];
$phone = $_POST['phone'];

$sql = "INSERT INTO `contact`(`name`, `phone`) VALUES  ('$name', '$phone')";

$con = con();

if(mysqli_query($con,$sql)){
    echo "success";
}else{
    echo mysqli_error($con);
}
