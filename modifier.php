<?php
    if(isset($_GET['id'])){
        include 'dbcon.php';
        $nom=mysqli_real_escape_string($connection,$_POST['username']);
        $hasshedPassword=mysqli_real_escape_string($connection,password_hash("password",PASSWORD_DEFAULT));
        $email=mysqli_real_escape_string($connection,$_POST['email']);
        $role=mysqli_real_escape_string($connection,$_POST['role']);
        $id=mysqli_real_escape_string($connection,$_POST['id']);
        $requet="UPDATE  users set username='$nom', password='$hasshedPassword', email='$email', role='$role' WHERE id='$id'";
        $query=mysqli_query($connection,$requet);
        
        if(isset($query)){
            header('location:affichage.php');
        }
    }
?>