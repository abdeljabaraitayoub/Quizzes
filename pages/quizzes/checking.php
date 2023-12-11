<?php
include('../../dbcon.php');
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    abort(403);
}

if (isset($_POST['title']) && $_POST['courseId']) {
    // Insert quiz info
    $title = $_POST['title'];
    $courseid = $_POST['courseId'];
    $time = date('Y-m-d H:i:s');

    $query1 = "INSERT INTO `quizzes` (`title`,`course_id`,`score`,`dateHour`) VALUES ('$title','$courseid','1','$time')";
    mysqli_query($connection, $query1);
}

    // Retrieve the inserted quiz ID
    $query2 = "SELECT * FROM `quizzes` WHERE title ='$title' ORDER BY `id` DESC LIMIT 1";
    $result = mysqli_query($connection, $query2);
    $row = mysqli_fetch_assoc($result);
    $quizId = $row['id'];

    if (isset($_POST['editQuizId'])) {
        // Update existing quiz
        $editQuizId = $_POST['editQuizId'];
        $updateQuizQuery = "UPDATE `quizzes` SET `title`='$title', `course_id`='$courseid', `dateHour`='$time' WHERE `id`='$editQuizId'";
        mysqli_query($connection, $updateQuizQuery); 

    // Loop through questions
    for ($i = 0; $i < 5; $i++) {
        $questionText = $_POST['question' . $i];
        $query3 = "INSERT INTO `questions` (`question_text`, `quiz_id`) VALUES ('$questionText', '$quizId')";
        mysqli_query($connection, $query3);

        // Retrieve the inserted question's ID
        $query4 = "SELECT * FROM `questions` WHERE question_text ='$questionText' ORDER BY `id` DESC LIMIT 1";
        $result1 = mysqli_query($connection, $query4);
        $row1 = mysqli_fetch_assoc($result1);
        $questionId = $row1['id'];

        // Loop through answers for each question
        for ($j = 0; $j < 3; $j++) {
            $response = $_POST['response' . ($i * 3 + $j)];
            $isCorrect = ($j == 0) ? 1 : 0; // Mark the first response as correct, others as incorrect

            $query5 = "INSERT INTO `answers` (`answer_text`, `is_correct`, `question_id`) VALUES ('$response', '$isCorrect', '$questionId')";
            mysqli_query($connection, $query5);
        }
    }

    header("Location:show.php?created=true");
}
