<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
</head>
<body>
    <?php
        include "connection.php";
        $id = $_GET['id'];
        $delete_query = " DELETE FROM `education` WHERE id=$id";
        $run_query = mysqli_query($connection, $delete_query);
        header('location:professional_info.php');
    ?>
</body>
</html>