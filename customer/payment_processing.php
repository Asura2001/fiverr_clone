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
    <title>Fiverr - Freelance Services Marketplace</title>
    <?php include "links.php";?>
</head>

<body>
    <?php include "header.php"; ?>

    <main>
    <?php
        $totalprice=0;
        $order_id = $_GET['id'];
        $select = "SELECT * FROM `orders` WHERE id = $order_id";
        $select_result = mysqli_query($connection, $select);
        while($order_row = mysqli_fetch_assoc($select_result)) {
            $order_gig_id = $order_row['gig_id'];
            $package_type = $order_row['package_type'];
            $quantity = $order_row['quantity'];
            $price = $order_row['price'];
            $status = $order_row['status'];
            $currentdate = $order_row['dated'];
            $file = $order_row['file'];

            $select2 = "SELECT * FROM `gigs` WHERE id = $order_gig_id";
            $select_result2 = mysqli_query($connection, $select2);
            $gig_row = mysqli_fetch_assoc($select_result2);
    
            $select3 = "SELECT * FROM `gallery` WHERE gig_id = $order_gig_id";
            $select_result3 = mysqli_query($connection, $select3);
            $gallery_row = mysqli_fetch_assoc($select_result3);
    
            $select4 = "SELECT * FROM `price1` WHERE gig_id = $order_gig_id AND package_type = '$package_type'";
            $select_result4 = mysqli_query($connection, $select4);
            $price1_row = mysqli_fetch_assoc($select_result4);
            $price1_rows = mysqli_num_rows($select_result4);
    
            $select5 = "SELECT * FROM `price2` WHERE gig_id = $order_gig_id AND package_type = '$package_type'";
            $select_result5 = mysqli_query($connection, $select5);
            $price2_row = mysqli_fetch_assoc($select_result5);
            $price2_rows = mysqli_num_rows($select_result5);
    
            $select6 = "SELECT * FROM `price3` WHERE gig_id = $order_gig_id AND package_type = '$package_type'";
            $select_result6 = mysqli_query($connection, $select6);
            $price3_row = mysqli_fetch_assoc($select_result6);
            $price3_rows = mysqli_num_rows($select_result6);

            $select_alt = "SELECT * FROM `requirements` WHERE gig_id = $order_gig_id";
            $select_result_alt = mysqli_query($connection, $select_alt);
            $requirements_rows=0;
            while($requirements_alt = mysqli_fetch_assoc($select_result_alt)){
                $alt_id = $requirements_alt['alt_id'];
                if($alt_id=0){
                    $select7 = "SELECT * FROM `requirements` WHERE gig_id = $order_gig_id AND alt_id='0'";
                    $select_result7 = mysqli_query($connection, $select7);
                    $requirements_row = mysqli_fetch_assoc($select_result7);
                    $requirements_rows = mysqli_num_rows($select_result7);
                }else{
                    $select7 = "SELECT * FROM `requirements` WHERE gig_id = $order_gig_id";
                    $select_result7 = mysqli_query($connection, $select7);
                    $requirements_row = mysqli_fetch_assoc($select_result7);
                    $requirements_rows = mysqli_num_rows($select_result7);
                }
            }
        }
        $totalprice=$price*$quantity
    ?>
        <section class="mt-4 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="d-flex mb-5 justify-content-center">
                            <img src="<?php echo($p_image > 0) ? './assets/upload/'.$p_image : './assets/images/custom.png';?>" 
                            width="75px" class="rounded-pill">
                            <div class="ms-3 mt-3">
                                <h5 class="mb-0 fw-bold"><?php echo $fname;?></h5>
                                <h6 class="text-muted fw-light">@<?php echo $fname; echo $id;?></h6>
                            </div>
                        </div>
                        <div class="d-none d-lg-flex text-center mb-5 justify-content-between">
                            <h2 class="fw-bold"><?php echo $gig_row["title"];?></h2>
                            <h2 class="fw-bold">$<?php echo $price;?></h2>
                        </div>
                        <div class="d-flex d-lg-none text-center mb-5 justify-content-between">
                            <h5 class="fw-bold"><?php echo $gig_row["title"];?></h5>
                            <h5 class="fw-bold">$<?php echo $price;?></h2>
                        </div>
                        <div id="carouselExampleDark" class="carousel carousel-dark slide mb-5" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <?php if($gallery_row["image2"] != NULL){?><button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button><?php }?>
                                <?php if($gallery_row["image3"] != NULL){?><button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button><?php }?>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="../seller/assets/upload/<?php echo $gallery_row["image1"];?>" class="d-block w-100">
                                </div>
                                <?php if($gallery_row["image2"] != NULL){?>
                                <div class="carousel-item">
                                    <img src="../seller/assets/upload/<?php echo $gallery_row["image2"];?>" class="d-block w-100">
                                </div>
                                <?php }?>
                                <?php if($gallery_row["image3"] != NULL){?>
                                <div class="carousel-item">
                                    <img src="../seller/assets/upload/<?php echo $gallery_row["image3"];?>" class="d-block w-100">
                                </div>
                                <?php }?>
                            </div>
                            <?php if($gallery_row["image2"] OR $gallery_row["image3"] != NULL){?>
                            <button class="carousel-control-prev justify-content-start" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon p-lg-4" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next justify-content-end" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                <span class="carousel-control-next-icon p-lg-4" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <?php }?>
                        </div>
                        <div class="about_gig mb-5 text-center text-lg-start">
                            <h4 class="fw-bold mb-3">About this Gig</h4>
                            <p><?php echo $gig_row["description"];?></p>
                        </div>
                        <div class="status mb-5 text-center text-lg-start">
                            <h4 class="fw-bold mb-3">Payment status:</h4>
                            <h4 class="fw-light mb-3"><?php echo $status;?></span></h4>
                        </div>
                        <?php if($price1_rows > 0){?>
                        <div class="product-details text-center text-lg-start">
                            <h4 class="fw-bold mb-3">Product details:</h4>
                            <p class="mb-1"><?php echo $price1_row["details1"];?></p>
                            <p class="mb-3 small fw-bold"><i class="fa-regular fa-clock"></i> <?php echo $price1_row["time1"];?></p>
                            <div class="card">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row text-center">
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <p class="card-text">Number of pages <?php echo $price1_row["pages1"];?></p>
                                                <p class="card-text">Number of revisions <?php echo $price1_row["revisions1"];?></p>
                                                <p class="card-text">Number of products <?php echo $price1_row["products1"];?></p>
                                                <p class="card-text">Number of plugins <?php echo $price1_row["plugins1"];?></p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price1_row['functional1'] == 'yes') echo 'checked';?>> Functional</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price1_row['responsive1'] == 'yes') echo 'checked';?>> Responsive</p>
                                            </div>
                                            <div class="col-12 mt-3 mt-md-0 col-md-6 col-lg-4">
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price1_row['content1'] == 'yes') echo 'checked';?>> Allows content</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price1_row['ecommerce1'] == 'yes') echo 'checked';?>> Ecommerce functionality</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price1_row['responsive1'] == 'yes') echo 'checked';?>> Responsive</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price1_row['payment_processing1'] == 'yes') echo 'checked';?>> Payment processing</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price1_row['in_form1'] == 'yes') echo 'checked';?>> Opt-in form</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price1_row['auto_responder1'] == 'yes') echo 'checked';?>> Auto responder</p>
                                            </div>
                                            <div class="col-12 mt-3 mt-lg-0 col-md-6 col-lg-4">
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price1_row['speed1'] == 'yes') echo 'checked';?>> Speed optimization</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price1_row['hosting1'] == 'yes') echo 'checked';?>> Hosting setup</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price1_row['icons1'] == 'yes') echo 'checked';?>> Social Media icons</p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $input_string = $price1_row['time1'];
                                $text_part = preg_replace('/\d/', '', $input_string);
                                $number_part = (int) preg_replace('/\D/', '', $input_string);
                            ?>
                        </div>
                        <?php }?>                         
                        <?php if($price2_rows > 0){?>
                        <div class="product-details">
                            <h4 class="fw-bold mb-3">Product details:</h4>
                            <p class="mb-1"><?php echo $price2_row["details2"];?></p>
                            <p class="mb-3 small fw-bold"><i class="fa-regular fa-clock"></i> <?php echo $price2_row["time2"];?></p>
                            <div class="card">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row text-center">
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <p class="card-text">Number of pages <?php echo $price2_row["pages2"];?></p>
                                                <p class="card-text">Number of revisions <?php echo $price2_row["revisions2"];?></p>
                                                <p class="card-text">Number of products <?php echo $price2_row["products2"];?></p>
                                                <p class="card-text">Number of plugins <?php echo $price2_row["plugins2"];?></p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price2_row['functional2'] == 'yes') echo 'checked';?>> Functional</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price2_row['responsive2'] == 'yes') echo 'checked';?>> Responsive</p>
                                            </div>
                                            <div class="col-12 mt-3 mt-md-0 col-md-6 col-lg-4">
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price2_row['content2'] == 'yes') echo 'checked';?>> Allows content</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price2_row['ecommerce2'] == 'yes') echo 'checked';?>> Ecommerce functionality</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price2_row['responsive2'] == 'yes') echo 'checked';?>> Responsive</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price2_row['payment_processing2'] == 'yes') echo 'checked';?>> Payment processing</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price2_row['in_form2'] == 'yes') echo 'checked';?>> Opt-in form</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price2_row['auto_responder2'] == 'yes') echo 'checked';?>> Auto responder</p>
                                            </div>
                                            <div class="col-12 mt-3 mt-lg-0 col-md-6 col-lg-4">
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price2_row['speed2'] == 'yes') echo 'checked';?>> Speed optimization</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price2_row['hosting2'] == 'yes') echo 'checked';?>> Hosting setup</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price2_row['icons2'] == 'yes') echo 'checked';?>> Social Media icons</p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $input_string = $price2_row['time2'];
                                $text_part = preg_replace('/\d/', '', $input_string);
                                $number_part = (int) preg_replace('/\D/', '', $input_string);
                            ?>
                        </div>
                        <?php }?>
                        <?php if($price3_rows > 0){?>
                        <div class="product-details">
                            <h4 class="fw-bold mb-3">Product details:</h4>
                            <p class="mb-1"><?php echo $price3_row["details3"];?></p>
                            <p class="mb-3 small fw-bold"><i class="fa-regular fa-clock"></i> <?php echo $price3_row["time3"];?></p>
                            <div class="card">
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row text-center">
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <p class="card-text">Number of pages <?php echo $price3_row["pages3"];?></p>
                                                <p class="card-text">Number of revisions <?php echo $price3_row["revisions3"];?></p>
                                                <p class="card-text">Number of products <?php echo $price3_row["products3"];?></p>
                                                <p class="card-text">Number of plugins <?php echo $price3_row["plugins3"];?></p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price3_row['functional3'] == 'yes') echo 'checked';?>> Functional</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price3_row['responsive3'] == 'yes') echo 'checked';?>> Responsive</p>
                                            </div>
                                            <div class="col-12 mt-3 mt-md-0 col-md-6 col-lg-4">
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price3_row['content3'] == 'yes') echo 'checked';?>> Allows content</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price3_row['ecommerce3'] == 'yes') echo 'checked';?>> Ecommerce functionality</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price3_row['responsive3'] == 'yes') echo 'checked';?>> Responsive</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price3_row['payment_processing3'] == 'yes') echo 'checked';?>> Payment processing</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price3_row['in_form3'] == 'yes') echo 'checked';?>> Opt-in form</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price3_row['auto_responder3'] == 'yes') echo 'checked';?>> Auto responder</p>
                                            </div>
                                            <div class="col-12 mt-3 mt-lg-0 col-md-6 col-lg-4">
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price3_row['speed3'] == 'yes') echo 'checked';?>> Speed optimization</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price3_row['hosting3'] == 'yes') echo 'checked';?>> Hosting setup</p>
                                                <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                                <?php if($price3_row['icons3'] == 'yes') echo 'checked';?>> Social Media icons</p>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $input_string = $price3_row['time3'];
                                $text_part = preg_replace('/\d/', '', $input_string);
                                $number_part = (int) preg_replace('/\D/', '', $input_string);
                            ?>
                        </div>
                        <?php }?>
                        <p class="d-none" id="time"><?php echo $number_part;?></p>
                        <p id="currentDate" data-current-date="<?php echo $currentdate;?>"></p>

                        <?php
                            if($status=="Completed"){
                            $select_rating = "SELECT count(*) As count FROM ratings WHERE `gig_id`='$order_gig_id' AND `customer_id`='$id'";
                            $run_rating = mysqli_query($connection,$select_rating);
                            while($result_rating = mysqli_fetch_assoc($run_rating)){
                                $count=$result_rating['count'];
                            }

                            $show_rating="SELECT * FROM ratings WHERE `gig_id`='$order_gig_id' AND `customer_id`='$id'";
                            $show_rating = mysqli_query($connection,$show_rating);
                            $data_rating = mysqli_fetch_assoc($show_rating);
                        ?>
                            <form class="completion text-center mt-5">
                                <h3 class="fw-bold bg-light p-3 rounded mb-4">This order has been Completed.</h3>
                                <a href="download.php?path=../seller/assets/upload/<?php echo $file;?>"
                                class="btn btn-dark btn-lg">Download your files</a> 
                            </form>

                            <?php if($count < 1){?>
                            <div class="starcard text-center mt-5"> 
                                <h3 class="mb-3">Leave a review.</h3>
                                <span onclick="gfg(1)"class="star"><i class="fa-solid fa-star fs-2"></i></span>
                                <span onclick="gfg(2)"class="star"><i class="fa-solid fa-star fs-2"></i></span>
                                <span onclick="gfg(3)"class="star"><i class="fa-solid fa-star fs-2"></i></span>
                                <span onclick="gfg(4)"class="star"><i class="fa-solid fa-star fs-2"></i></span>
                                <span onclick="gfg(5)"class="star"><i class="fa-solid fa-star fs-2"></i></span>
                                <?php
                                    if(isset($_POST['r_submit'])){
                                        $rating=$_POST['rating'];
                                        $input="INSERT INTO `ratings`(`gig_id`, `customer_id`, `rating`) 
                                        VALUES ('$order_gig_id','$id','$rating')";
                                        $run=mysqli_query($connection,$input);
                                        if($run){
                                            echo "<script>alert('Thank you for your rating.')</script>";
                                            echo "<script>window.location.href='main.php'</script>";
                                        }else{
                                            echo "<script>alert('The rating was not inserted.')</script>";
                                        }
                                    }
                                ?>
                                <form class="d-flex justify-content-center mt-3" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="rating" id="hidden-output">
                                    <h4>Your rating: <span id="output">0</span>/5</h4>
                                    <div class="ms-2">
                                        <button type="submit" name="r_submit" class="btn btn-dark btn-sm">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <?php }else{?>
                                <div class="starcard text-center mt-5"> 
                                <h3 class="mb-3">Update your review.</h3>
                                <span onclick="gfg(1)"class="star <?php echo ($data_rating['rating'] >= 1 && $data_rating['rating'] <= 5)?'selected':'';?>"><i class="fa-solid fa-star fs-2"></i></span>
                                <span onclick="gfg(2)"class="star <?php echo ($data_rating['rating'] >= 2 && $data_rating['rating'] <= 5)?'selected':'';?>"><i class="fa-solid fa-star fs-2"></i></span>
                                <span onclick="gfg(3)"class="star <?php echo ($data_rating['rating'] >= 3 && $data_rating['rating'] <= 5)?'selected':'';?>"><i class="fa-solid fa-star fs-2"></i></span>
                                <span onclick="gfg(4)"class="star <?php echo ($data_rating['rating'] >= 4 && $data_rating['rating'] <= 5)?'selected':'';?>"><i class="fa-solid fa-star fs-2"></i></span>
                                <span onclick="gfg(5)"class="star <?php echo ($data_rating['rating']== 5)?'selected':'';?>"><i class="fa-solid fa-star fs-2"></i></span>
                                <?php
                                    if(isset($_POST['u_submit'])){
                                        $u_rating=$_POST['u_rating'];
                                        $update="UPDATE `ratings` SET `rating`='$u_rating'";
                                        $run_update=mysqli_query($connection,$update);
                                        if($run_update){
                                            echo "<script>window.location.href='main.php'</script>";
                                        }else{
                                            echo "<script>alert('The rating was not updated.')</script>";
                                        }
                                    }
                                ?>
                                <form class="d-flex justify-content-center mt-3" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="u_rating" id="hidden-output">
                                    <h4>Your rating: <span id="output"><?php echo $data_rating['rating'];?></span>/5</h4>
                                    <div class="ms-2">
                                        <button type="submit" name="u_submit" class="btn btn-dark btn-sm">Update</button>
                                    </div>
                                </form>
                            </div>
                            <?php }?>
                        <?php }else{?>
                        <form class="mt-5 mb-5 text-center text-lg-start" method="POST" action="stripe_form.php">
                            <input type="hidden" name="id" value="<?php echo $order_id;?>"/>
                            <?php echo ($status == 'Unpaid') ? '<button type="submit" name="submit" class="btn btn-dark btn-lg w-100">Pay now ($'.$totalprice.')</button>' : '';?>
                            <?php echo ($status == 'Unpaid') ? '' : '<button class="btn btn-light btn-lg text-muted rounded-pill disabled">The order has been paid.</button>';?>
                        </form>

                        <?php
                            if($status=='Paid'){
                                if($requirements_rows > 0){
                                    if($requirements_row['answer']==NULL){
                                        ?>
                                        <div class="check-your-order mb-5 text-center text-lg-start">
                                            <h4 class="fw-bold mb-3">Order status</h4>
                                            <div class="d-block d-lg-flex justify-content-lg-between">
                                                <p class="mt-lg-2 mb-lg-0">The seller can start working on your order as soon as you answer their questions</p>
                                                <a class="btn btn-dark" href="requirement_processing.php?id=<?php echo $gig_row['id'];?>">See requirements</a>
                                            </div>
                                        </div>
                                        <?php }else{?>
                                        <div class="check-your-order mb-5 text-center text-lg-start">
                                            <h4 class="fw-bold mb-3">Order status</h4>
                                            <p class="mb-5">The seller is working on your order, it shall arrive in:</p>
                                            <div class="countdown-container" id="countdown-container">
                                                <span class="bg" id="days">0</span>:<span class="bg" 
                                                id="hours">0</span>:<span class="bg" id="minutes"
                                                >0</span>:<span class="bg" id="seconds">0</span>
                                            </div>
                                        </div>
                                    <?php }
                                }else{?>
                                    <div class="check-your-order mb-5 text-center text-lg-start">
                                        <h4 class="fw-bold mb-3">Order status</h4>
                                        <p class="mb-5">The seller is working on your order, it shall arrive in:</p>
                                        <div class="countdown-container" id="countdown-container">
                                            <span class="bg" id="days">0</span>:<span class="bg" 
                                                id="hours">0</span>:<span class="bg" id="minutes"
                                                >0</span>:<span class="bg" id="seconds">0</span>
                                        </div>
                                    </div>
                                <?php }
                            }
                        }?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        const countdownContainer = document.getElementById("countdown-container");
        const currentDateElement = document.getElementById("currentDate");
        const currentDateString = currentDateElement.getAttribute("data-current-date");
        const targetDate = new Date(currentDateString).getTime() + (<?php echo $number_part; ?> * 24 * 60 * 60 * 1000);
        function startCountdown() {
            const currentDate = new Date().getTime();
            const timeRemaining = targetDate - currentDate;
            const daysElement = document.getElementById("days");
            const hoursElement = document.getElementById("hours");
            const minutesElement = document.getElementById("minutes");
            const secondsElement = document.getElementById("seconds");
            let days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
            let hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);
            days = String(days).padStart(2, "0");
            hours = String(hours).padStart(2, "0");
            minutes = String(minutes).padStart(2, "0");
            seconds = String(seconds).padStart(2, "0");
            daysElement.textContent = days;
            hoursElement.textContent = hours;
            minutesElement.textContent = minutes;
            secondsElement.textContent = seconds;
            }
        setInterval(startCountdown, 1000);

    // To access the stars 
    let stars = document.getElementsByClassName("star"); 
    let output = document.getElementById("output"); 
    let hidden_output = document.getElementById("hidden-output"); 

    // Funtion to update rating 
    function gfg(n) { 
        remove(); 
        for (let i = 0; i < n; i++) { 
            if (n == 1) cls = "selected"; 
            else if (n == 2) cls = "selected"; 
            else if (n == 3) cls = "selected"; 
            else if (n == 4) cls = "selected"; 
            else if (n == 5) cls = "selected"; 
            stars[i].className = "star " + cls; 
        } 
        output.innerText = n; 
        hidden_output.value= n; 
    } 

    // To remove the pre-applied styling 
    function remove() { 
        let i = 0; 
        while (i < 5) { 
            stars[i].className = "star"; 
            i++; 
        } 
    }
    </script>
<?php include "footer.php"; ?>
</body>

</html>