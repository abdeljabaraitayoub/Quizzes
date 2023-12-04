<?php
require 'connection.php';
$id = $_GET['id'];
$requet="DELETE FROM quizzes WHERE id = $id";
$query=mysqli_query($con,$requet);

if(isset($query)){
    header("location:show.php");
}
?>