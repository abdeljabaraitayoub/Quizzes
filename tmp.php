<?php

session_start();
echo $_SESSION['nbrVisites'];
$_SESSION['nbrVisites'] = $_SESSION['nbrVisites'] + 1;
