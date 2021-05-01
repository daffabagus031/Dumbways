<?php
include_once("koneksi.php");

$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM writer_tb WHERE id=$id");

header("Location:pen.php");
?>