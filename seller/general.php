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
    <title>Create a New Gig</title>
    <?php include "links.php";
    include "connection.php"; ?>
</head>

<body>
    <?php include "gigheader.php"; ?>

    <main class="profilebg">
        <section>
            <div class="container p-5">
                <div class="card p-5 d-none d-lg-block">
                    <?php
                    if(isset($_POST["save"])){
                        $title = $_POST["title"];
                        $category = $_POST["category"];
                        $sub_category = $_POST["sub_category"];

                        $gigs_query = "SELECT * FROM `gigs` WHERE `title`='$title' AND `category`='$category' AND `sub_category`='$sub_category'";
                        $check_gigs_result = mysqli_query($connection, $gigs_query);

                        if(mysqli_num_rows($check_gigs_result) > 0){
                            ?>
                            <script>
                                alert("Gig already exists.");
                            </script>
                            <?php
                        } else {
                            $insert_query = "INSERT INTO `gigs`(`user_id`, `title`, `category`, `sub_category`) 
                            VALUES ('$id','$title','$category','$sub_category')";
                            $result_query = mysqli_query($connection, $insert_query);

                            if($result_query){
                                ?>
                                <script>
                                    window.location.href='./gigs.php';
                                </script>
                                <?php
                            } else{
                                ?>
                                <script>
                                    alert("Sorry, the data could not be inserted.");
                                </script>
                                <?php
                        } } }?>
                    <form method="post" enctype="multipart/form-data">
                        <div class="row card-body">
                            <div class="col-3">
                                <h5>Gig title</h5>
                                <p>As your Gig storefront, your <span class="fw-bold">title is the most important
                                        place</span>
                                    to include keywords that buyers would likely use to search for a service like yours.
                                </p>
                            </div>

                            <div class="col-9">
                                <textarea name="title" class="form-control resize p-3 fw-bold fs-5" placeholder="I will"
                                    maxlength="80"></textarea>
                                <p class="small text-muted text-end fw-bold mb-0 mt-2">Max length 80 characters</p>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <h5>Category</h5>
                                <p>Choose the category and sub-category most suitable for your Gig.</p>
                            </div>

                            <div class="col-9">
                                <div class="row">
                                    <div class="col-6 pe-3">
                                        <input type="text" name="category" class="form-control" placeholder="SELECT A CATEGORY">
                                    </div>

                                    <div class="col-6 ps-3">
                                        <input type="text" name="sub_category" class="form-control" placeholder="SELECT A SUB-CATEGORY">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 text-end">
                            <button class="btn btn-dark btn-lg" type="submit" name="save">Save</button>
                        </div>
                    </form>
                </div>
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