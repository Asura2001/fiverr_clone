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
} $gig_id=$_GET['id'];?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Gig</title>
    <?php include "links.php";
    include "connection.php"; ?>
</head>

<body>
    <?php include "gigheader.php"; ?>

    <main class="profilebg">
        <section>
            <?php
                $select = "SELECT * FROM `gigs` WHERE id=$gig_id";
                $run = mysqli_query($connection, $select);
                $session = mysqli_fetch_assoc($run);

                if(isset($_POST["update"])){
                    $taxation = $_POST["taxation"]; 

                    $update_query = "UPDATE `gigs` SET `taxation`='$taxation' WHERE id=$gig_id AND user_id=$id";
                    $result = mysqli_query($connection, $update_query);
                    if($result){
                        ?>
                        <script>
                            window.location.href = 'gigs.php';
                        </script>
                        <?php
                    }                
                    else{
                        ?>
                        <script>
                            alert("Sorry, the data could not be updated.");
                        </script>
                        <?php
                } }?>
            <form method="POST" enctype="multipart/form-data" class="d-none d-lg-block">
                <div class="container p-5">
                    <div class="row">
                        <div class="col">
                            <div class="card p-5">
                                <div class="card-body text-center">
                                    <img class="mt-3" src="./assets/images/publish-illus.6189094.svg">
                                    <h4 class="mt-5">You're almost there!</h4>
                                </div>

                                <div class="card-body mt-3">
                                    <h5 class="card-title">You just need to complete the following requirements to start
                                        selling:</h5>
                                </div>

                                <div class="card p-4">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4 fw-bold">Let’s check if you need to fill out Form W-9
                                        </h4>
                                        <p class="card-text mb-4">Form W-9 is used in the U.S. for tax purposes.
                                            <b><u>Answering ‘No’ completes the check</u></b>.
                                        </p>
                                        <h6 class="card-text">Do you want your income to be taxed in U.S.?</h6>
                                        <div class="container card mt-5 p-5">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="taxation"
                                                            <?php if($session > 0){if($session['taxation'] == 'no') echo 'checked';}?> value="no">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            No
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="taxation"
                                                        <?php if($session > 0){if($session['taxation'] == 'yes') echo 'checked';}?> value="yes">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            Yes
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end mt-5">
                        <div class="mt-3">
                            <button type="submit" name="update" class="btn btn-dark btn-lg">Update & Continue</button>
                        </div>
                        <div class="mt-3">
                            <a class="text-success text-decoration-none" href="./gallery.php">Back</a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="container">
                <div class="card p-5 d-block d-md-none d-lg-none text-center">
                    <h1>FIVERR</h1>
                    <p class="pt-4">We recommend opening this page in desktop view.</p>
                </div>
                <div class="card p-5 d-none d-md-block d-lg-none text-center">
                    <h1 class="display-1 fw-bold">FIVERR</h1>
                    <p class="display-6 p-5">We recommend opening this page in desktop view.</p>
                </div>
            </div>
        </section>
    </main>

    <?php include "footer.php"; ?>
</body>

</html>