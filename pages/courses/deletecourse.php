<?php
include('../../dbcon.php');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo $id;
    $query = "delete from courses where id ='$id'";
    if (mysqli_query($connection, $query)) {
        header("location:show.php?alert=1");
    }
}
