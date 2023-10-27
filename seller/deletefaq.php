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
        $select_query = "SELECT * FROM `faq` WHERE id=$id";
        $run = mysqli_query($connection, $select_query);
        $data = mysqli_fetch_array($run);
        $gig_id = $data['gig_id'];

        $delete_query = " DELETE FROM `faq` WHERE id=$id";
        $run_query = mysqli_query($connection, $delete_query);
        $redirect_url2 = "description_&_faq.php?id=" . $gig_id;
        echo "<script>window.location.href = '$redirect_url2'</script>";
    ?>
</body>
</html>