<!-- <?php
require('conn.php');
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $score = 0;

//     // Assuming the correct answers are 'a' for all questions
//     $correctAnswers = ['a', 'a'];

//     // Check each answer and calculate the score
//     for ($i = 1; $i <= count($correctAnswers); $i++) {
//         $questionName = 'q' . $i;
//         if (isset($_POST[$questionName]) && $_POST[$questionName] === $correctAnswers[$i - 1]) {
//             $score++;
//         }
//     }

//     // Display the score
//     echo "You scored $score out of " . count($correctAnswers) . " questions.";
// }
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quiz Page</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <style>
      
        body {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mt-5 mb-4"> Quizzes :</h2>

    <!-- Quiz Questions -->

    <form action="process_quiz.php" method="post">
        <div class="mb-4">
            <h4>1. What is the capital of France?</h4>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="a">
                <label class="form-check-label">a) Paris</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="b">
                <label class="form-check-label">b) London</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q1" value="c">
                <label class="form-check-label">c) Berlin</label>
            </div>
        </div>

        <!--  more questions  -->

        <div class="mb-4">
            <h4>2. What is the largest mammal?</h4>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="a">
                <label class="form-check-label">a) Elephant</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="b">
                <label class="form-check-label">b) Blue Whale</label>
            </div>
            <div class="form-check">
                <input type="radio" class="form-check-input" name="q2" value="c">
                <label class="form-check-label">c) Giraffe</label>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Submit Quiz</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
