<?php
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "quizzes");
define("BASE", "http://localhost/Quizzes/");

// Establishing database connection
$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

function abort($code = 404)
{
    http_response_code($code);
    header("Location: " . BASE . "pages/{$code}.php");
    die();
}

function dd($data)
{
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
}
