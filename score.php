<?php
require_once('dbcon.php');
$totalScore = 0;

// Array to store users and answers 
$userAnswers = [];

$sql = "SELECT
            quizzes.id AS quiz_id,
            quizzes.title AS quiz_title,
            quizzes.score,
            quizzes.dateHour,
            courses.title AS course_title,
            questions.id AS question_id,
            questions.question_text,
            GROUP_CONCAT(answers.id) AS answer_ids,
            GROUP_CONCAT(answers.answer_text ORDER BY answers.id) AS answer_options,
            GROUP_CONCAT(answers.is_correct ORDER BY answers.id) AS correct_answers
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
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                foreach ($_POST as $key => $value) {
                    // Check if the submitted answer corresponds to a question in the database
                    if (strpos($key, 'question_') === 0) {
                        $questionId = substr($key, 9);
                        $submittedAnswerId = $value;

                        $sql = "SELECT 
                                    questions.question_text,
                                    answers.answer_text,
                                    answers.is_correct
                                FROM 
                                    questions
                                JOIN 
                                    answers ON questions.id = answers.question_id
                                WHERE 
                                    questions.id = $questionId
                                    AND answers.id = $submittedAnswerId";

                        $resultAnswer = $conn->query($sql);

                        if ($resultAnswer->num_rows > 0) {
                            $row = $resultAnswer->fetch_assoc();

                            // Store information in the userAnswers 
                            $userAnswers[] = [
                                'question_text' => $row['question_text'],
                                'submitted_answer' => $row['answer_text'],
                                'is_correct' => $row['is_correct']
                            ];

                            // If the submitted answer is correct, add to the total score
                            if ($row['is_correct'] == 1) {
                                $totalScore++;
                            }
                        }
                    }
                }
            }

            echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";

            while ($row = $result->fetch_assoc()) {
                echo "<div class='card mb-3'>";
                echo "<div class='card-header'><h4>Question: " . $row["question_text"] . "</h4></div>";
                echo "<div class='card-body'>";

                $answer_ids = explode(",", $row["answer_ids"]);
                $answer_options = explode(",", $row["answer_options"]);
                $correct_answers = explode(",", $row["correct_answers"]);

                for ($i = 0; $i < count($answer_ids); $i++) {
                    echo "<div class='form-check'>
                            <input class='form-check-input' type='radio' name='question_" . $row["question_id"] . "' value='" . $answer_ids[$i] . "'>
                            <label class='form-check-label'>" . $answer_options[$i] . "</label>
                          </div>";
                }

                echo "</div></div>";
            }

            echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#scoreModal'>Submit Answers</button>";
            echo "</form>";

            // Display the quiz score and questions 
            echo "<div class='modal fade' id='scoreModal' tabindex='-1' role='dialog' aria-labelledby='scoreModalLabel' aria-hidden='true'>";
            echo "<div class='modal-dialog' role='document'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='scoreModalLabel'>Quiz Score</h5>";
            echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
            echo "<span aria-hidden='true'>&times;</span>";
            echo "</button>";
            echo "</div>";
            echo "<div class='modal-body'>";

            // Display the quiz score
            echo "<p>Your Quiz Score: $totalScore of " . $result->num_rows . "</p>";

            //message
            if ($totalScore == 0) {
                echo "<p>Better luck next time. Keep learning!</p>";
            } elseif ($totalScore < 3) {
                echo "<p>Good effort! You're on the right track.</p>";
            } else {
                echo "<p>Congratulations! You did a fantastic job!</p>";
            }

            // Display questions with correct/incorrect answers 
            echo "<h4>Questions with Correct/Incorrect Answers:</h4>";
            foreach ($userAnswers as $answer) {
                echo "<p><strong>Question:</strong> " . $answer['question_text'] . "<br>";
                echo "<strong>Your Answer:</strong> " . $answer['submitted_answer'] . "<br>";
                echo "<strong>Correct Answer(s):</strong> ";

                // Check if correct answers are available
                if (!empty($correct_answers) && is_array($correct_answers)) {
                    // Display correct answers
                    $correctAnswerDisplayed = false;
                    foreach ($correct_answers as $key => $value) {
                        if ($value == 1) {
                            echo ($correctAnswerDisplayed ? ', ' : '') . $answer_options[$key];
                            $correctAnswerDisplayed = true;
                        }
                    }
                } else {
                    echo "Correct answer not available.";
                }

                echo "</p>";
            }

            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
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

<?php
// Close the database connection
$conn->close();
?>