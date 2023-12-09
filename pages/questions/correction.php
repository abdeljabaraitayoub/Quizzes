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
  </style>
</head>

<body>

  <div class="quiz-container">
    <div class="row">
      <div class="col-md-8 offset-md-2">

        <?php

        require '../../dbcon.php';

        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //   $r = "SELECT * FROM questions";
        //   $q = mysqli_query($connection,$r);
        //   while($value = mysqli_fetch_assoc($q)){
        //     $r2 = "SELECT * FROM questions INNER JOIN answers ON questions.id = answers.question_id WHERE questions.id = " . $value['id'];
        //     $q2 = mysqli_query($connection,$r2);
        //     while($value2 = mysqli_fetch_assoc($q2)){
        //       $id = $value2['id'];
        //     if (isset($_POST["$id"])){
        //       $reponse_id = $_POST["$id"];
        //       $r3 = "SELECT * from answers where id = $reponse_id";
        //       $q3 = mysqli_query($connection,$r3);
        //       $v3 = mysqli_fetch_assoc($q3);
        //      echo $v3["answer_text"] ."<br>";
        //      }     

        //     } 
        // }
        // }
        $quizid = $_GET["id"];

        $quizTitleQuery = "SELECT title FROM quizzes WHERE id = '$quizid'";
        $quizTitleResult = mysqli_query($connection, $quizTitleQuery);
        $quizTitle = mysqli_fetch_assoc($quizTitleResult)['title'];
        ?>
          <h2 class="text-center"><?php echo $quizTitle; ?></h2>
        <?php

        $r = "SELECT * FROM questions where quiz_id ='$quizid'";
        $q = mysqli_query($connection, $r);
        $cont = 0;
        while ($value = mysqli_fetch_assoc($q)) {
          echo "<div class='question'>" . $value['question_text'] . "</div>";
          $r2 = "SELECT * FROM questions INNER JOIN answers ON questions.id = answers.question_id WHERE questions.id = " . $value['id'];
          $q2 = mysqli_query($connection, $r2);

          while ($value2 = mysqli_fetch_assoc($q2)) {

            if ($value2['is_correct'] == 1) {
              $color = "#5fcc5f";
            } else if (isset($_POST[$value['id']]) && $_POST[$value['id']] == $value2['id']) {
              $color = "red";
            } else {
              $color = "none";
            }

            echo "<div class='option'>
                  <input class type='radio' id=" . $value2['id'] . " name=" . $value['id'] . " value=" . $value2['id'] . ">
                  <label style='background-color:$color' for=" . $value2['id'] . "  >" . $value2['answer_text'] . "</label>
                </div>";
          }
          $chosen_id = $_POST[$value['id']];
          $r_chosen = "SELECT * FROM answers where id = $chosen_id";
          $q_chosen = mysqli_query($connection, $r_chosen);
          $v_chosen = mysqli_fetch_assoc($q_chosen);
          if ($v_chosen['is_correct'] == 1) {
            $cont++;
          }
        }
        $score = ($cont * 100) / $q->num_rows;

        echo "
              <h4>Votre score dans cet examen est de $score %</h4>
              <div class='progress bg-body'>
              <div class='progress-bar bg-success' role='progressbar' style='width:$score%' aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'></div>
              </div>";

        ?>
      </div>
    </div>
  </div>