<?php
require_once('dbcon.php');

$sql = "SELECT
            quizzes.id AS quiz_id,
            quizzes.title AS quiz_title,
            quizzes.score,
            quizzes.dateHour,
            courses.title AS course_title,
            questions.id AS question_id,
            questions.question_text,
            GROUP_CONCAT(answers.id) AS answer_ids,
            GROUP_CONCAT(answers.answer_text ORDER BY answers.id) AS answer_options
        FROM
            quizzes
        JOIN
            courses ON quizzes.course_id = courses.id
        JOIN
            questions ON questions.quiz_id = quizzes.id
        JOIN
            answers ON answers.question_id = questions.id
        GROUP BY
            quizzes.id, questions.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quiz</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">

        <?php
        if ($result->num_rows > 0) {
            echo "<form action='score.php' method='post'>";

            while ($row = $result->fetch_assoc()) {
                echo "<div class='card mb-3'>";
                echo "<div class='card-header'><h4>Question: " . $row["question_text"] . "</h4></div>";
                echo "<div class='card-body'>";

                $answer_ids = explode(",", $row["answer_ids"]);
                $answer_options = explode(",", $row["answer_options"]);

                for ($i = 0; $i < count($answer_ids); $i++) {
                    echo "<div class='form-check'>
                            <input class='form-check-input' type='radio' name='question_" . $row["question_id"] . "' value='" . $answer_ids[$i] . "'>
                            <label class='form-check-label'>" . $answer_options[$i] . "</label>
                          </div>";
                }

                echo "</div></div>";
            }

            echo "<button type='submit' class='btn btn-primary'>Submit Answers</button>";
            echo "</form>";
        } else {
            echo "0 results";
        }
        ?>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
