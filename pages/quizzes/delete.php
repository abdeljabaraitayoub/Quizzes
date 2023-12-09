<?php
include('../../dbcon.php');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    abort(403);
}
$id = $_GET['id'];
$requet = "DELETE FROM quizzes WHERE id = $id";
$query = mysqli_query($connection, $requet);
header("Location:show.php?deleted=true");
