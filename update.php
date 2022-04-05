<?php

require_once "base.php";

$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];

$sql = "UPDATE contact SET name='$name', phone='$phone' WHERE id = $id";

if(mysqli_query(con(), $sql)) {
    echo "success";
}