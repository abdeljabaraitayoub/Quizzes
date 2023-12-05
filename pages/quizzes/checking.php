<?php
include('../../dbcon.php');

if (isset($_POST['title']) && $_POST['courseId']) {
    $title = $_POST['title'];
    $courseid = $_POST['courseId'];
    $time = date('Y-m-d H:i:s');

    $query1 = "INSERT INTO `quizzes` (`title`,`course_id`,`score`,`dateHour`) VALUES ('$title','$courseid','1','$time')";
    mysqli_query($connection, $query1);

    $query2 = "SELECT * FROM `quizzes` WHERE title ='$title' ORDER BY `id` DESC LIMIT 1";
    $result = mysqli_query($connection, $query2);
    $row = mysqli_fetch_assoc($result);
    $quizId = $row['id'];

    for ($i = 0; $i < 5; $i++) {
        $questionText = $_POST['question' . $i];
        $query3 = "INSERT INTO `questions` (`question_text`, `quiz_id`) VALUES ('$questionText', '$quizId')";
        mysqli_query($connection, $query3);

        $query4 = "SELECT * FROM `questions` WHERE question_text ='$questionText' ORDER BY `id` DESC LIMIT 1";
        $result1 = mysqli_query($connection, $query4);
        $row1 = mysqli_fetch_assoc($result1);
        $questionId = $row1['id'];

        for ($j = 0; $j < 3; $j++) {
            $response = $_POST['response' . ($i * 3 + $j)];
            $isCorrect = ($j == 0) ? 1 : 0; // Mark the first response as correct, others as incorrect

            $query5 = "INSERT INTO `answers` (`answer_text`, `is_correct`, `question_id`) VALUES ('$response', '$isCorrect', '$questionId')";
            mysqli_query($connection, $query5);
        }
    }

    echo "Data insertion completed successfully<br>";
}
