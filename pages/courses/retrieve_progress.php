<?php
include('../../dbcon.php');
session_start();

if (isset($_GET['course_id'])) {
    $courseId = $_GET['course_id'];
    $userId = $_SESSION['user_id'];

    $query = "SELECT progress FROM user_courses WHERE course_id = ? AND user_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ii", $courseId, $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        echo $row['progress'];
    } else {
        echo 0;
    }
}
