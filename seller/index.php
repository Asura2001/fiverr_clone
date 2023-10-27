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
    
    $select_query = "SELECT * FROM `seller_register` WHERE user_id = $id";
    $result_query = mysqli_query($connection, $select_query);
    $session_query = mysqli_num_rows($result_query);
   if($session_query > 0){
        $session_query = mysqli_fetch_assoc($result_query);
        $seller_id = $session_query['id'];
        $lname = $session_query['lname'];
        $occupation = $session_query['occupation'];
        $phone = $session_query['phone'];
   } else{ ?>
    <script>
        window.location.href = "../customer/signin.php";
    </script>
    <?php }
} else{ ?>
    <script>
        window.location.href = "../customer/signin.php";
    </script>
    <?php 
}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <?php include "links.php"; ?>
</head>

<body>
    <?php include "header.php"; ?>

    <main class="profilebg">
        <section>
            <div class="container p-5">
                <div class="row card">
                    <div class="col card-body text-center">
                        <h5 class="card-text">Active Orders <span class="text-muted">- 0</span></h5>
                    </div>
                </div>
                <div class="d-flex mt-5 mt-lg-3 mb-3 mb-lg-1">
                    <h6 class="m-auto m-lg-0">Upgrade your Business</h6><hr class="ms-4 mt-2 w-75 d-lg-block d-none">
                </div>
                <div class="row card">
                    <div class="col p-4 pt-5 pb-5">
                        <h4 class="card-title fw-bold">3 steps to become a top seller on Fiverr</h4>
                        <p class="card-text text-muted">The key to your success on Fiverr is the brand you build for yourself through 
                            your Fiverr reputation. We gathered some tips and resources to help you become a leading seller on Fiverr.</p>
                        <div class="container-fluid p-0">
                            <div class="row justify-content-between">
                                <div class="col-lg-3">
                                    <img src="./assets/images/horn.svg">
                                    <h5 class="mt-3 mb-4">Get noticed</h5>
                                    <p class="text-muted mb-4">Tap into the power of social media by 
                                        <span class="text-dark">sharing your Gig</span>, and 
                                        <a class="text-decoration-none" href="#">get expert help</a> to grow your impact.</p>
                                    <a class="btn btn-outline-primary btn-lg ps-4 pe-4 mt-lg-5" 
                                    target="_blank" href="./profile.php">Share Your Gigs</a>
                                </div>
                                <div class="col-lg-3 mt-5 mt-lg-0">
                                    <img src="./assets/images/book.svg">
                                    <h5 class="mt-3 mb-4">Get more skills & exposure</h5>
                                    <p class="text-muted mb-4 mb-lg-2">Hone your skills and expand your knowledge with 
                                        online courses. You’ll be able to offer more services and 
                                        <span class="text-dark">gain more exposure</span> with every course completed.</p>
                                    <a class="btn btn-outline-primary btn-lg ps-4 pe-4 mt-lg-3" 
                                    target="_blank" href="./profile.php">Explore Learn</a>
                                </div>
                                <div class="col-lg-3 mt-5 mt-lg-0">
                                    <img src="./assets/images/stars.svg">
                                    <h5 class="mt-3 mb-4">Become a successful seller!</h5>
                                    <p class="text-muted mb-4 mb-lg-5">Watch this free online course to learn how to
                                         create an outstanding service experience for your buyer and
                                        <span class="text-dark">grow your career</span> as an online freelancer.</p>
                                    <a class="btn btn-outline-primary btn-lg ps-4 pe-4" 
                                    target="_blank" href="./profile.php">Explore Learn</a>
                                </div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include "footer.php"; ?>
</body>

</html>