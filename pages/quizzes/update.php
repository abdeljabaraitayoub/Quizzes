<?php
include('../../dbcon.php');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    abort(403);
}
// Establishing database connection

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
    $id = $_POST['id'];
    $quizzeTitle = $_POST['quizzeTitle'];
    $courseId = $_POST['courseId'];
    $score = $_POST['score'];
    $date = $_POST['date'];
   
    if (isset($_GET['id'])) {
  
    $sql = "UPDATE quizzes SET quizzeTitle = $quizzeTitle, course_id = $courseId, score = $score, dateHour = $date 
                    WHERE id = '$id'";
    $query = mysqli_query($connection, $sql);
    if ($query) {
        echo "done: " ;

        exit;
    } else {
        echo "try again: " . mysqli_error($connection);
    }

    }
    
?>