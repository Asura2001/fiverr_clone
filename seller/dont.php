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
    <title>Onboarding/Overview/dont</title>
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
                        <img src="./assets/images/image2.png" class="img-fluid rounded">
                    </div>

                    <div class="col-12 col-lg-8 mt-4">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <h3 class="fw-bold">Now, let’s talk about the things you want to steer clear of.</h3>
                                    <p class="text-muted">Your success on Fiverr is important to us. Avoid the following to keep in line with our community standards:</p>            
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6 mt-3 mt-lg-0 col-lg-4">
                                    <div class="d-flex d-lg-block justify-content-around">
                                        <img src="./assets/images/information.svg">
                                    </div>
                                    <p class="text-muted mt-3">Providing any misleading or inaccurate information about your identity.</p>
                                </div>

                                <div class="col-12 col-md-6 mt-3 mt-lg-0 col-lg-4">
                                    <div class="d-flex d-lg-block justify-content-around">
                                        <img src="./assets/images/account.svg">
                                    </div>
                                    <p class="text-muted mt-3">Opening duplicate accounts. Remember, you can always create more Gigs.</p>
                                </div>

                                <div class="col-12 col-md-6 mt-3 mt-lg-0 col-lg-4">
                                    <div class="d-flex d-lg-block justify-content-around">
                                        <img src="./assets/images/work.svg">
                                    </div>
                                    <p class="text-muted mt-3">Soliciting other community members for work on Fiverr.</p>
                                </div>

                                <div class="col-12 col-md-6 mt-3 mt-lg-0 col-lg-4">
                                    <div class="d-flex d-lg-block justify-content-around">
                                        <img src="./assets/images/payment.svg">
                                    </div>
                                    <p class="text-muted mt-3">Requesting to take communication and payment outside of Fiverr.</p>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12 col-md-6 col-lg-6 d-md-flex">
                                    <div>
                                        <a class="btn btn-greenshadow btn-lg ps-5 pe-5 w-100" href="./personal_info.php">Continue</a>
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