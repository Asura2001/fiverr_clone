<?php
include "connection.php";
session_start();
if(isset($_SESSION['customer_id'])){
    $id = $_SESSION['customer_id'];
    $fname = $_SESSION['fname'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];

    $select_profile = "SELECT * FROM `user_register` WHERE `id`='$id'";
    $result_profile = mysqli_query($connection, $select_profile);
    $session_profile = mysqli_num_rows($result_profile);
   if($session_profile > 0){
        $session = mysqli_fetch_assoc($result_profile);
        $p_image = $session['image'];
        $d_name = $session['d_name'];
        $title = $session['title'];
        $description = $session['description'];
   }
} else{ ?>
<script>
    window.location.href = "index.php";
</script>
<?php } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filler Page</title>
    <?php include "links.php";?>
</head>

<body>
    <?php include "header.php"; ?>

    <main class="profilebg">
        <div class="container">
            <div class="row m-5">
                <div class="col m-5 text-center bg-white">
                    <h1 class="p-5 m-5">Filler Page</h1>
                </div>
            </div>
        </div>
    </main>

<?php include "footer.php"; ?>
</body>

</html>