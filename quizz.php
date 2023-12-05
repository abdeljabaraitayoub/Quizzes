<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Examen QCM</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 40px;
    }
    .question {
      font-weight: bold;
      margin-bottom: 20px;
    }
    .option {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

<form action="">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h2 class="text-center">QUiZZe</h2>
        <?php

          require 'dbcon.php';
          $sql = "SELECT * FROM questions";
          $result = mysqli_query($connection, $sql);

          while ($value = mysqli_fetch_assoc($result)) {
            echo "<div class='question'>" . $value['question_text'] . "</div>";
            $sql_answers = "SELECT * FROM answers WHERE question_id = " . $value['id'];
            $result_answers = mysqli_query($connection, $sql_answers);

            while ($value2 = mysqli_fetch_assoc($result_answers)) {
              echo "<div class='option'>
                      <input type='radio' id=" . $value2['id'] . " name=" . $value['id'] . ">
                      <label for=" . $value2['id'] . ">" . $value2['answer_text'] . "</label>
                    </div>";
            }
          }

        ?>
        <div class="text-center">
          <button class="btn btn-primary">Submit</button
