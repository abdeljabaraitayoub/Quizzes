<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    abort(403);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
    <title>Quizzes</title>
    <link rel="shortcut icon" href="../../images/favicon.ico" />
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html {
      width: 100%;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f3f3f3;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    form {
      width: 100%;
    }

    .quiz-container {
      width: 100%;
      padding: 30px;
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .question {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #333;
    }

    .option {
      margin-bottom: 15px;
    }

    label {
      cursor: pointer;
      display: flex;
      align-items: center;
      transition: all 0.3s ease;
      border-radius: 5px;
      padding: 10px;
      border: 2px solid transparent;
    }

    input[type='radio'] {
      display: none;
    }

    label:hover {
      background-color: #f0f0f0;
    }

    input[type='radio']:checked+label {
      border-color: #3498db;
      background-color: #9fe4ff;
    }

    button:hover {
      background-color: blue;
    }
  </style>
</head>

<body>

  <form method="POST" action="correction.php?id=<?php echo ($_GET["id"]) ?>">
    <div class="quiz-container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <?php
          if (isset($_GET["id"])) {
            $quizid = $_GET["id"];

            require '../../dbcon.php';

              $quizTitleQuery = "SELECT title FROM quizzes WHERE id = '$quizid'";
              $quizTitleResult = mysqli_query($connection, $quizTitleQuery);
              $quizTitle = mysqli_fetch_assoc($quizTitleResult)['title'];
          ?>
              <h2 class="text-center"><?php echo $quizTitle; ?></h2>
              <?php
            $r = "SELECT * FROM questions where quiz_id ='$quizid'";
            $q = mysqli_query($connection, $r);
            while ($value = mysqli_fetch_assoc($q)) {
              echo "<div class='question'>" . $value['question_text'] . "</div>";
              $r2 = "SELECT * FROM questions INNER JOIN answers ON questions.id = answers.question_id WHERE questions.id = " . $value['id'];
              $q2 = mysqli_query($connection, $r2);

              while ($value2 = mysqli_fetch_assoc($q2)) {
                echo "<div class='option'>
                   <input class type='radio' id=" . $value2['id'] . " name=" . $value['id'] . " value=" . $value2['id'] . ">
                   <label for=" . $value2['id'] . "  >" . $value2['answer_text'] . "</label>
                 </div>";
              }
            }
          }

          ?>
          <div class="text-center">
            <button class="btn btn-primary">Envoyer</button>
          </div>
        </div>
      </div>
    </div>
  </form>

          <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $r = "SELECT * FROM questions";
                $q = mysqli_query($connection, $r);
                while ($value = mysqli_fetch_assoc($q)) {
                  $r2 = "SELECT * FROM questions INNER JOIN answers ON questions.id = answers.question_id WHERE questions.id = " . $value['id'];
                  $q2 = mysqli_query($connection, $r2);
                  while ($value2 = mysqli_fetch_assoc($q2)) {
                    $id = $value2['id'];
                    if (isset($_POST["$id"])) {
                      $reponse_id = $_POST["$id"];
                      echo $reponse_id . "<br>";
                      $r3 = "SELECT * from answers where id = $reponse_id";
                      $q3 = mysqli_query($connection, $r3);
                      $v3 = mysqli_fetch_assoc($q3);
                      // echo "<div>
                      // <h3>" . $v3['answer_text'] . "</h3>
                      // </div>";
                      if ($v3['is_correct'] == 0) {
                        echo 'votre question est faux';
                      } else {
                        echo 'cest correct';
                      }
                    }
                  }
                }
              }
          ?>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>