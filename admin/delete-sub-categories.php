<?php
    include "connection.php";
    $id = $_GET['id'];
    $delete_query = " DELETE FROM `categories` WHERE id=$id";
    $run_query = mysqli_query($connection, $delete_query);
    header('location:show-sub-categories.php');
?>