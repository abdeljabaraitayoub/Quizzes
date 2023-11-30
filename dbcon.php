<?php
define("HOSTNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DATABASE", "quizzes");

// Establishing database connection
$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
