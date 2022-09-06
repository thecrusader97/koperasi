<?php
// include database connection file
include_once("config.php");
 
// Get id from URL to delete that user
$id = $_GET['id'];
 
// Delete user row from table based on given id
$result = mysqli_query($conn, "UPDATE anggota SET trash='1' WHERE kode=$id");
$result = mysqli_query($conn, "UPDATE simpanan SET trash='1' WHERE kode=$id");
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:anggota.php");
?>