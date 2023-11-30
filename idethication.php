<?php include('dbcon.php');
if (isset($_POST['name']) && isset($_POST['password'])) {
    $password = $_POST['password'];
    $name = $_POST['name'];
    $query = "SELECT * FROM users where username = '$name'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    if ($password == "" && $name == "") {
        header("location:index.php?error=1");
    } else if ($password == "") {
        header("location:index.php?error=2");
    } else if ($name == "") {
        header("location:index.php?error=3");
    } else {
        if ($row['username'] == $name && $row['password'] == $password) {
            echo 'login';
        } else if ($row['username'] != $name && $row['password'] != $password) {
            header("location:index.php?error=4");
        }
    }
}
