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
    <title>Onboarding/Overview/do</title>
    <?php include "links.php"; ?>
</head>
<body>
    <header class="border-bottom d-flex d-lg-block justify-content-around">
        <a href="../customer/index.php">
            <img src="./assets/images/icons8-fiverr-50.png" class="ms-lg-5 mt-4 mb-2">
        </a>
    </header>

    <main class="mt-4 mb-5">
        <section>
            <div class="container">
                <div class="row">
                    <div class="col d-none d-lg-block">
                        <img src="./assets/images/do.png" class="img-fluid rounded">
                    </div>

                    <div class="col-12 col-lg-8 mt-4">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-bold">What makes a successful Fiverr profile?</h3>
                                    <p class="text-muted">Your first impression matters! Create a profile that will stand out from the crowd on Fiverr.</p>            
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6 mt-3 mt-lg-0 col-lg-4">
                                    <div class="d-flex d-lg-block justify-content-around">
                                        <img src="./assets/images/profile-icon.svg">
                                    </div>
                                    <p class="text-muted mt-3">Take your time in creating your profile so it’s exactly as you want it to be.</p>
                                </div>

                                <div class="col-12 col-md-6 mt-3 mt-lg-0 col-lg-4">
                                    <div class="d-flex d-lg-block justify-content-around">
                                        <img src="./assets/images/link-icon.svg">
                                    </div>
                                    <p class="text-muted mt-3">Add credibility by linking out to your relevant professional networks.</p>
                                </div>

                                <div class="col-12 col-md-6 mt-3 mt-lg-0 col-lg-4">
                                    <div class="d-flex d-lg-block justify-content-around">
                                        <img src="./assets/images/skills-icon.svg">
                                    </div>
                                    <p class="text-muted mt-3">Accurately describe your professional skills to help you get more work.</p>
                                </div>

                                <div class="col-12 col-md-6 mt-3 mt-lg-0 col-lg-4">
                                    <div class="d-flex d-lg-block justify-content-around">
                                        <img src="./assets/images/profilepic-icon.svg">
                                    </div>
                                    <p class="text-muted mt-3">Put a face to your name! Upload a profile picture that clearly shows your face.</p>
                                </div>

                                <div class="col-12 col-md-6 mt-3 mt-lg-0 col-lg-4">
                                    <div class="d-flex d-lg-block justify-content-around">
                                        <img src="./assets/images/secure-icon.svg">
                                    </div>
                                    <p class="text-muted mt-3">To keep our community secure for everyone, we may ask you to verify your ID.</p>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12 col-md-6 col-lg-6 d-md-flex">
                                    <div>
                                        <a class="btn btn-greenshadow btn-lg ps-5 pe-5 w-100" href="./dont.php">Continue</a>
                                    </div>
                                    <div>
                                        <a class="btn btn-link mt-1 w-100" href="./onboarding.php">Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>