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
    window.location.href = "../customer/signin.php";
</script>
<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onboarding/Overview</title>
    <?php include "links.php"; ?>
</head>
<body>
    <header class="border-bottom d-flex d-lg-block justify-content-around">
        <a href="../customer/index.php">
            <img src="./assets/images/icons8-fiverr-50.png" class="ms-lg-5 mt-4 mb-2">
        </a>
    </header>

    <main class="mt-5 mb-5">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 ps-3 pe-3 col-lg-6 ps-lg-5 pe-lg-5">
                        <h2 class="border-bottom pb-4 fw-bold">Ready to start selling on Fiverr? Here’s the breakdown:</h2>
                        <div class="d-flex mt-4 border-bottom pb-2">
                            <i class="fa-solid fa-book fs-1 mt-2"></i>
                            <div class="ms-3">
                                <h5 class="mb-0">Learn what makes a successful profile</h5>
                                <p class="text-muted">Discover the do’s and don’ts to ensure you’re always<br>on the right track.</p>
                            </div>
                        </div>

                        <div class="d-flex mt-4 border-bottom pb-2">
                            <i class="fa-solid fa-user fs-1 mt-2"></i>
                            <div class="ms-3">
                                <h5 class="mb-0">Create your seller profile</h5>
                                <p class="text-muted">Add your profile picture, description, and professional<br>information.</p>
                            </div>
                        </div>

                        <div class="d-flex mt-4 border-bottom pb-2">
                            <i class="fa-solid fa-house fs-1 mt-2"></i>
                            <div class="ms-3">
                                <h5 class="mb-0">Publish your Gig</h5>
                                <p class="text-muted">Create a Gig of the service you’re offering and start<br>selling instantly.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        <video class="mt-4 mt-lg-5 pt-0 pt-lg-5 img-fluid" controls><source src="./assets/videos/Seller_onboarding.mp4"></video>
                    </div>
                </div>

                <div class="row ps-lg-5">
                    <div class="col-12 col-lg-3 col-md-3">
                        <a class="btn btn-greenshadow btn-lg mt-5 mt-lg-4 w-100" href="./do.php">Continue</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>