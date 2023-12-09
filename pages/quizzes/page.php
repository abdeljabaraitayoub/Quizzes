<?php
include('../../dbcon.php');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    abort(403);
}

if (isset($_GET['id'])) {
    $quizzeTitle = $_POST['quizzeTitle'];
    $courseId = $_POST['courseId'];
    $score = $_POST['score'];
    $date = $_POST['date'];
    $id = $_POST['id'];

    $sql = "UPDATE `quizzes` SET quizzeTitle = '$quizzeTitle', course_id = '$courseId', score = '$score', `dateHour` = '$date' WHERE id = '$id'";
    $query = mysqli_query($connection, $sql);

    if ($query) {
        header("location:show.php");
        exit;
    } else {
        echo "Update failed: " . mysqli_error($connection);
    }
} else {
    $quizzeTitle = $_POST['quizzeTitle'];
    $courseId = $_POST['courseId'];
    $score = $_POST['score'];
    $date = $_POST['date'];

    $requet = "INSERT INTO  quizzes (`quizzeTitle` , `course_id` , `score` , `dateHour`) VALUE 
   ('$quizzeTitle' , '$courseId' , '$score' , '$date')";
    $query = mysqli_query($connection, $requet);

    if (isset($query)) {
        header("location:show.php");
    }
}
