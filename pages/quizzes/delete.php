<?php
include('../../dbcon.php');
$id = $_GET['id'];
$requet = "DELETE FROM quizzes WHERE id = $id";
$query = mysqli_query($connection, $requet);
header("Location:show.php?deleted=true");
