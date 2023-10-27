<?php
session_start();
if(isset($_SESSION['customer_id'])){
    $id = $_SESSION['customer_id'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];

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
    <title>Linked Accounts</title>
    <?php include "links.php";
    include "connection.php"; ?>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="d-flex d-lg-block justify-content-around">
                        <a href="../customer/index.php">
                            <img src="./assets/images/icons8-fiverr-50.png" class="ms-0 ms-lg-5 mt-4 mb-2">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row border-top border-bottom d-none d-lg-block">
                <div class="col">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-muted active" aria-current="page" href="./personal_info.php">
                                <i class="fa-solid fa-1 text-white bg-dark rounded-pill p-2 me-1"></i>
                                Personal Info <i class="fa-solid fa-chevron-right ms-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted ps-2" href="./professional_info.php">
                                <i class="fa-solid fa-2 text-white bg-dark rounded-pill p-2 me-1"></i>
                                Professional Info <i class="fa-solid fa-chevron-right ms-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted ps-2" href="./linked_accounts.php">
                                <i class="fa-solid fa-3 text-white bg-dark rounded-pill p-2 me-1"></i>
                                Linked Accounts <i class="fa-solid fa-chevron-right ms-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted ps-2" href="./account_security.php">
                                <i class="fa-solid fa-4 text-white bg-dark rounded-pill p-2 me-1"></i>Account
                                Security</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section>
            <div class="container-fluid">
                <div class="row mt-5 border-bottom">
                    <div class="col text-muted">
                        <h1 class="display-3 display-lg-6 fw-bold">Linked Accounts</h1>
                        <p class="mt-3 d-none d-lg-block">Taking the time to verify and link your accounts can upgrade your 
                            credibility and help us provide you with more<br>business. Don’t worry, your 
                            information is and always will remain private.</p>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col text-muted">
                        <h5>Your Social Presence</h5>
                        <p class="small"><i>Private</i></p>
                    </div>
                </div>

                <div class="row mt-3 justify-content-between">
                    <div class="col-12 col-lg-3">
                        <div class="d-flex fs-5">
                            <i class="fa-brands fa-google mt-1 me-2 text-success"></i> <p>Google</p>
                        </div>
                    </div>

                    <div class="col-12 col-lg-2 text-center text-lg-end">
                        <a class="btn btn-outline-dark btn-lg ps-5 pe-5" href="#">Connect</a>
                    </div>
                </div>

                <div class="row mt-5 justify-content-between">
                    <div class="col-12 col-lg-3">
                        <div class="d-flex fs-5">
                            <i class="fa-brands fa-facebook mt-1 me-2 text-primary"></i> <p>Facebook</p>
                        </div>
                    </div>

                    <div class="col-12 col-lg-2 text-center text-lg-end">
                        <a class="btn btn-outline-dark btn-lg ps-5 pe-5" href="#">Connect</a>
                    </div>
                </div>
            </div>
            <hr class="mt-5">
            <div class="text-center text-md-end mt-4 mb-5">
                <a class="btn btn-greenshadow btn-lg ps-5 pe-5" href="./account_security.php">Continue</a>
            </div>
        </section>
    </main>

    <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>