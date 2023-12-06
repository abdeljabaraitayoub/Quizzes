<?php
include 'dbcon.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $requete="SELECT *FROM users WHERE id='$id'";
    $query=mysqli_query($connection,$requete);
    $rows=mysqli_fetch_assoc($query);
    $id=$rows['id'];
    $username=$rows['username'];
    $password=$rows['password'];
    $email=$rows['email'];
    $role=$rows['role'];
}
?>
<?php
include 'dbcon.php';
$query = "SELECT * FROM users";
$quercon = mysqli_query($connection, $query);
?>