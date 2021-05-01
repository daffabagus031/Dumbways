<?php
include_once("koneksi.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM category_tb WHERE id=$id");

header("Location:kat.php");
?>