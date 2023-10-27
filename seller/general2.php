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
                    $gig_id = $_GET['id'];
                    $select = "SELECT * FROM `gigs` WHERE id=$gig_id";
                    $run_select = mysqli_query($connection, $select);
                    $data = mysqli_fetch_assoc($run_select);

                    if(isset($_POST["update"])){
                        $title = $_POST["title"]; 
                        $category = $_POST["category"]; 
                        $sub_category = $_POST["sub_category"];
                        $o_question1 = $_POST["question1"];
                        $o_question2 = $_POST["question2"];
                        $o_question3 = $_POST["question3"];
    
                        $update_query = "UPDATE `gigs` SET `title`='$title',`category`='$category',`sub_category`='$sub_category'
                        WHERE id=$gig_id";
    
                        $result = mysqli_query($connection, $update_query);
    
                        if($result){
                            $req = "SELECT * FROM `optional_requirements` WHERE gig_id=$gig_id";
                            $check_req = mysqli_query($connection, $req);
                            $rows = mysqli_num_rows($check_req);
                            if($rows>0){}else{
                                $question1 = mysqli_real_escape_string($connection, $o_question1);
                                $question2 = mysqli_real_escape_string($connection, $o_question2);
                                $question3 = mysqli_real_escape_string($connection, $o_question3);
                                $insert_query2 = "INSERT INTO `optional_requirements`(`user_id`, `gig_id`, `question1`, `question2`, `question3`) 
                                VALUES ('$id','$gig_id','$question1','$question2','$question3')";
                                $result_query2 = mysqli_query($connection, $insert_query2);
                            }
                            $redirect_url = "pricing.php?id=" . $gig_id;
                            echo "<script>window.location.href = '$redirect_url';</script>";
                        }
                        
                        else{
                            ?>
                            <script>
                                alert("Sorry, the data could not be updated.");
                            </script>
                            <?php
                        }
                    } ?>
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="question1" value="Is this order for personal use, business use, or a side project?">
                        <input type="hidden" name="question2" value="Which industry do you work in?">
                        <input type="hidden" name="question3" value="Is this order part of a bigger project you're working on?">
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
                                    maxlength="80"><?php echo $data['title']; ?></textarea>
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
                                        <input type="text" name="category" class="form-control" 
                                        value="<?php echo $data['category']; ?>" placeholder="SELECT A CATEGORY">
                                    </div>

                                    <div class="col-6 ps-3">
                                        <input type="text" name="sub_category" class="form-control" 
                                        value="<?php echo $data['sub_category']; ?>" placeholder="SELECT A SUB-CATEGORY">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 text-end">
                            <button class="btn btn-dark btn-lg" type="submit" name="update">Update & Continue</button>
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