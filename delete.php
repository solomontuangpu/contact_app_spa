<?php

require_once "base.php";

$id = $_GET['id'];
$sql = "DELETE FROM contact WHERE id = $id";
if(mysqli_query(con(), $sql)) {
  echo "success";
}