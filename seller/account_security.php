<?php
session_start();
include "connection.php"; 
if(isset($_SESSION['customer_id'])){
    $id = $_SESSION['customer_id'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];

    $select_query = "SELECT * FROM `seller_register` WHERE user_id = $id";
    $result_query = mysqli_query($connection, $select_query);
    $session_query = mysqli_num_rows($result_query);

   if($session_query > 0){
        $session_query = mysqli_fetch_assoc($result_query);
        $seller_id = $session_query['id'];
        $lname = $session_query['lname'];
        $occupation = $session_query['occupation'];
        $phone = $session_query['phone'];
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
    <title>Account Security</title>
    <?php include "links.php"; ?>
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
                        <h1 class="display-3 display-lg-6 fw-bold">Account Security</h1>
                        <p class="mt-3 d-none d-lg-block">Trust and safety is a big deal in our community. Please verify
                             your email and phone<br>number so that we can keep your account secured.</p>
                    </div>
                </div>

                <div class="row mt-3 justify-content-between">
                    <div class="col-12 col-lg-3">
                        <div class="d-flex fs-5">
                            <i class="fa-solid fa-envelope mt-1 me-2 text-muted"></i> <p>Email</p>
                            <p class="text-muted ms-3 small"><i>Private</i></p>
                        </div>
                    </div>

                    <div class="col-12 col-lg-2 text-center text-lg-end">
                        <a class="btn btn-outline-dark btn-lg ps-5 pe-5 disabled">Verified</a>
                    </div>
                </div>

                <?php
                if(isset($_POST["save"])){

                    $phone = $_POST["phone"]; 

                    $update_query = "UPDATE `seller_register` SET `phone`='$phone'
                    WHERE user_id=$id";

                    $result = mysqli_query($connection, $update_query);

                    if(!$result){
                        ?>
                        <script>
                            alert("Sorry, the data could not be updated.");
                        </script>
                        <?php
                    }
                } ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="row mt-5 justify-content-between">
                    <div class="col-12 col-lg-3">
                        <div class="d-flex fs-5">
                            <i class="fa fa-phone mt-1 me-2 text-muted"></i> <p class="mb-0">Phone</p>
                            <p class="text-muted ms-3 small mb-0"><i>Private</i></p>
                        </div>
                        <p class="text-muted">We'll never share your phone number.</p>
                    </div>

                    <div class="col-12 col-lg-3 text-center text-lg-end">
                        <a class="btn btn-outline-dark" data-bs-toggle="modal" 
                            data-bs-target="#exampleModal">Add Phone Number</a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered text-start">
                              <div class="modal-content container p-5">
                                <div class="row justify-content-between">
                                    <div class="col-8">
                                        <h4 class="modal-title fw-bold d-none d-lg-block" id="exampleModalLabel">Verify Phone Number</h4>
                                    </div>
                                    <div class="col-2 text-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                </div>
                                <div class="modal-body ps-0 pe-0">
                                    <p class="mb-4">Thank you for taking a moment to verify your phone number.</p>
                                    <p class="small fw-bold mb-2">Enter your phone number.</p>
                                    <input type="text" name="phone"
                                        class="form-control" pattern="(?=.*[0-9]).{11,}" placeholder="Your phone number"
                                        value="<?php echo $phone; ?>" title="Must contain 11 numbers in format '01234567890'" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="button" class="btn btn-lightgray fw-bold w-100" 
                                        data-bs-dismiss="modal">Cancel</button>
                                    </div>

                                    <div class="col-6">
                                        <button type="submit" class="btn btn-green fw-bold w-100"
                                        name="save">Save</button>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-4">
                <div class="text-center text-md-end mt-4 mb-5">
                    <a class="btn btn-greenshadow btn-lg ps-5 pe-5" data-bs-toggle="modal" 
                    data-bs-target="#exampleModal2">Finish</a>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered text-start">
                            <div class="modal-content container p-4">
                                <div class="text-end">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body ps-0 pe-0 text-center">
                                    <div class="mb-4 text-center">
                                        <img src="./assets/images/crown.c3d2119.svg" width="60px">
                                    </div>
                                    <h4 class="mt-4 fw-bold">Your Seller Profile is all set!</h4>
                                    <p class="text-muted mb-4">Now go ahead and create your first Gig to start selling
                                        your services. You can edit your profile information anytime.</p>
                                    <a class="btn btn-green fw-bold ps-4 pe-4" href="./gigs.php">Done</a>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
            </form>
        </section>
    </main>

    <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>