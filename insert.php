<?php
    include 'dbcon.php';
    $nom=mysqli_real_escape_string($connection,$_POST['username']);
    $hasshedPassword=mysqli_real_escape_string($connection,password_hash("password",PASSWORD_DEFAULT));
    $email=mysqli_real_escape_string($connection,$_POST['email']);
    $role=mysqli_real_escape_string($connection,$_POST['role']);
    $requet="INSERT INTO users (username, password, email, role) VALUES('$nom','$hasshedPassword','$email' ,'$role')";
    $query=mysqli_query($connection,$requet);
    if(isset($query)){
        header ('location: affichage.php');
        }
?>