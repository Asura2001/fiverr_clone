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
   $gig_id = $_GET["id"];
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
            $select1 = "SELECT * FROM `gigs` WHERE id = $gig_id";
            $select2 = "SELECT * FROM `price1` WHERE gig_id = $gig_id";
            $select3 = "SELECT * FROM `price2` WHERE gig_id = $gig_id";
            $select4 = "SELECT * FROM `price3` WHERE gig_id = $gig_id";
            $select5 = "SELECT * FROM `gallery` WHERE gig_id = $gig_id";
            $select6 = "SELECT * FROM `faq` WHERE gig_id = $gig_id";
            $select7 = "SELECT AVG(rating) AS averageRating FROM ratings WHERE `gig_id`='$gig_id'";
            $select8 = "SELECT count(*) As count FROM ratings WHERE `gig_id`='$gig_id'";
            $select_result1 = mysqli_query($connection, $select1); 
            $select_result2 = mysqli_query($connection, $select2);
            $select_result3 = mysqli_query($connection, $select3);
            $select_result4 = mysqli_query($connection, $select4);
            $select_result5 = mysqli_query($connection, $select5);
            $select_result6 = mysqli_query($connection, $select6);
            $select_result7 = mysqli_query($connection, $select7);
            $select_result8 = mysqli_query($connection, $select8);
            $result1 = mysqli_fetch_assoc($select_result1);
            $result2 = mysqli_fetch_assoc($select_result2);
            $result3 = mysqli_fetch_assoc($select_result3);
            $result4 = mysqli_fetch_assoc($select_result4);
            $result5 = mysqli_fetch_assoc($select_result5);
            $result6 = mysqli_fetch_assoc($select_result6);
            $row_6 = mysqli_num_rows($select_result6);
            $result_select = mysqli_num_rows($select_result7);
            while($result_select2 = mysqli_fetch_assoc($select_result8)){
                $count=$result_select2['count'];
            }
            $result_data = mysqli_fetch_array($select_result7);
        ?>
        <section class="mt-4 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <h2 class="fw-bold mb-5 mb-lg-3 text-center text-lg-start"><?php echo $result1["title"];?></h2>
                        <div class="d-flex mb-5 mb-lg-3 justify-content-center justify-content-lg-start">
                            <img src="../customer/assets/upload/<?php echo $p_image?>" width="75px" class="rounded-pill">
                            <div class="ms-3 mt-3">
                                <h5 class="mb-0 fw-bold"><?php echo $fname;?></h5>
                                <h6 class="text-muted fw-light">@<?php echo $fname; echo $id;?></h6>
                            </div>
                        </div>
                        <div id="carouselExampleDark" class="carousel carousel-dark slide mb-5" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <?php if($result5["image2"] != NULL){?><button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button><?php }?>
                                <?php if($result5["image3"] != NULL){?><button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button><?php }?>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="../seller/assets/upload/<?php echo $result5["image1"];?>" class="d-block w-100">
                                </div>
                                <?php if($result5["image2"] != NULL){?>
                                <div class="carousel-item">
                                    <img src="../seller/assets/upload/<?php echo $result5["image2"];?>" class="d-block w-100">
                                </div>
                                <?php }?>
                                <?php if($result5["image3"] != NULL){?>
                                <div class="carousel-item">
                                    <img src="../seller/assets/upload/<?php echo $result5["image3"];?>" class="d-block w-100">
                                </div>
                                <?php }?>
                            </div>
                            <?php if($result5["image2"] OR $result5["image3"] != NULL){?>
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
                        <div class="about_gig mb-5">
                            <h4 class="fw-bold mb-3">About this Gig</h4>
                            <p><?php echo $result1["description"];?></p>
                        </div>
                        <?php if($row_6 > 0){?>
                        <div class="faq">
                            <h4 class="fw-bold mb-3">FAQ</h4>
                            <div class="accordion mt-3" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne<?php echo $result6['id'];?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $result6['id'];?>" aria-controls="collapseOne<?php echo $faq_id;?>">
                                        <b><?php echo $result6['question'];?></b>
                                        </button>
                                    </h2>
                                    <div id="collapseOne<?php echo $result6['id'];?>" class="accordion-collapse collapse" aria-labelledby="headingOne<?php echo $result6['id'];?>" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php echo $result6['answer'];?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                        <?php if($result_select>0){?>
                            <div class="mt-5">
                                <h4 class="fw-bold">Reviews</h4>
                                <p class="mb-2">
                                <?php if($result_data["averageRating"]!=0){?>
                                <i class="fa-solid fa-star"></i>
                                <?php echo round($result_data["averageRating"],1).' ('.$count.')';}?></p>
                            </div>
                        <?php }?>
                    </div>

                    <div class="col-12 mt-5 mt-lg-0 offset-lg-1 col-lg-4">
                        <nav class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                            <a class="nav-link active" href="basic" id="basic-tab" data-bs-toggle="tab" data-bs-target="#basic" 
                                type="button" role="tab" aria-controls="basic" aria-selected="true">Basic</a>
                            <a class="nav-link" href="standard" id="standard-tab" data-bs-toggle="tab" data-bs-target="#standard" 
                                type="button" role="tab" aria-controls="standard" aria-selected="false">Standard</a>
                            <a class="nav-link" href="premium" id="premium-tab" data-bs-toggle="tab" data-bs-target="#premium" 
                                type="button" role="tab" aria-controls="premium" aria-selected="false">Premium</a>
                        </nav>

                        <div class="border tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="basic" role="tabpanel" aria-labelledby="basic-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $result1["title"];?></h5>
                                        <h5 class="card-title text-end">$<?php echo $result2["price1"];?></h5>
                                        <p class="card-text"><?php echo $result2["details1"];?></p>
                                        <p class="card-text small fw-bold"><i class="fa-regular fa-clock"></i> <?php echo $result2["time1"];?></p>
                                        <p class="card-text">Number of pages <?php echo $result2["pages1"];?></p>
                                        <p class="card-text">Number of revisions <?php echo $result2["revisions1"];?></p>
                                        <p class="card-text">Number of products <?php echo $result2["products1"];?></p>
                                        <p class="card-text">Number of plugins <?php echo $result2["plugins1"];?></p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result2['functional1'] == 'yes') echo 'checked';?>> Functional</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result2['responsive1'] == 'yes') echo 'checked';?>> Responsive</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result2['content1'] == 'yes') echo 'checked';?>> Allows content</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result2['ecommerce1'] == 'yes') echo 'checked';?>> Ecommerce functionality</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result2['responsive1'] == 'yes') echo 'checked';?>> Responsive</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result2['payment_processing1'] == 'yes') echo 'checked';?>> Payment processing</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result2['in_form1'] == 'yes') echo 'checked';?>> Opt-in form</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result2['auto_responder1'] == 'yes') echo 'checked';?>> Auto responder</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result2['speed1'] == 'yes') echo 'checked';?>> Speed optimization</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result2['hosting1'] == 'yes') echo 'checked';?>> Hosting setup</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result2['icons1'] == 'yes') echo 'checked';?>> Social Media icons</p>
                                        <div class="mt-4">
                                            <a class="btn btn-dark w-100" data-bs-toggle="modal" 
                                            data-bs-target="#exampleModal<?php echo $result2["id"];?>">Continue &rarr;</a>
                                            <?php
                                            if(isset($_POST["1st_price"])){
                                                $package_type = $result2["package_type"];
                                                $price1 = $result2["price1"];
                                                $quantity1 = $_POST["quantity"];
                                                $select_price1 = "INSERT INTO `orders`(`user_id`, `gig_id`, `package_type`, `quantity`, `price`) 
                                                VALUES ('$id','$gig_id','$package_type','$quantity1','$price1')";
                                                $run_query1 = mysqli_query($connection, $select_price1);
                                                if($run_query1){
                                                    ?>
                                                    <script>
                                                        window.location.href='main.php';
                                                    </script>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <script>
                                                        alert("Sorry, the order could not be placed.");
                                                    </script>
                                                    <?php
                                                }
                                            }?>
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="modal fade" id="exampleModal<?php echo $result2["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $result1["id"];?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered text-start">
                                                    <div class="modal-content">
                                                        <div class="modal-header justify-content-between border-bottom">
                                                            <div class="col-8">
                                                                <h5 class="modal-title fw-bold" id="exampleModalLabel<?php echo $result2["id"];?>">Order Options</h5>
                                                            </div>
                                                            <div class="col-2 text-end">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex mb-4 justify-content-between">
                                                                <h4 class="fw-bold">Basic</h4>
                                                                <h4 class="fw-bold">$<?php echo $result2["price1"];?></h4>
                                                            </div>
                                                            <p class="mb-2"><?php echo $result1["title"];?></p>
                                                            <hr>
                                                            <div class="d-flex justify-content-between">
                                                                <p class="fs-5">Gig Quantity</p>
                                                                <div class="input-group mb-3 cartcontainer" style="width: 130px;">
                                                                    <span class="input-group-text cartbtn" onclick="button2()">-</span>
                                                                    <input type="number" id="input" min="1" max="10"
                                                                        class="form-control bg-light text-center" name="quantity" value="1">
                                                                    <span class="input-group-text cartbtn" onclick="button1()">+</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer cartcontainer justify-content-center">
                                                            <button type="submit" class="btn btn-dark btn-lg w-100" name="1st_price">Continue</button>
                                                            <p class="text-muted">You won't be charged yet</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="standard" role="tabpanel" aria-labelledby="standard-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $result1["title"];?></h5>
                                        <h5 class="card-title text-end">$<?php echo $result3["price2"];?></h5>
                                        <p class="card-text"><?php echo $result3["details2"];?></p>
                                        <p class="card-text small fw-bold"><i class="fa-regular fa-clock"></i> <?php echo $result3["time2"];?></p>
                                        <p class="card-text">Number of pages <?php echo $result3["pages2"];?></p>
                                        <p class="card-text">Number of revisions <?php echo $result3["revisions2"];?></p>
                                        <p class="card-text">Number of products <?php echo $result3["products2"];?></p>
                                        <p class="card-text">Number of plugins <?php echo $result3["plugins2"];?></p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result3['functional2'] == 'yes') echo 'checked';?>> Functional</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result3['responsive2'] == 'yes') echo 'checked';?>> Responsive</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result3['content2'] == 'yes') echo 'checked';?>> Allows content</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result3['ecommerce2'] == 'yes') echo 'checked';?>> Ecommerce functionality</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result3['responsive2'] == 'yes') echo 'checked';?>> Responsive</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result3['payment_processing2'] == 'yes') echo 'checked';?>> Payment processing</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result3['in_form2'] == 'yes') echo 'checked';?>> Opt-in form</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result3['auto_responder2'] == 'yes') echo 'checked';?>> Auto responder</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result3['speed2'] == 'yes') echo 'checked';?>> Speed optimization</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result3['hosting2'] == 'yes') echo 'checked';?>> Hosting setup</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result3['icons2'] == 'yes') echo 'checked';?>> Social Media icons</p>
                                        <div class="mt-4">
                                            <a class="btn btn-dark w-100" data-bs-toggle="modal" 
                                            data-bs-target="#exampleModal1<?php echo $result3["id"];?>">Continue &rarr;</a>
                                            <?php
                                            if(isset($_POST["2nd_price"])){
                                                $package_type = $result3["package_type"];
                                                $price2 = $result3["price2"];
                                                $quantity2 = $_POST["quantity"];
                                                $select_price2 = "INSERT INTO `orders`(`user_id`, `gig_id`, `package_type`, `quantity`, `price`) 
                                                VALUES ('$id','$gig_id','$package_type','$quantity2','$price2')";
                                                $run_query2 = mysqli_query($connection, $select_price2);
                                                if($run_query2){
                                                    ?>
                                                    <script>
                                                        window.location.href='main.php';
                                                    </script>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <script>
                                                        alert("Sorry, the order could not be placed.");
                                                    </script>
                                                    <?php
                                                }
                                            }?>
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="modal fade" id="exampleModal1<?php echo $result3["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $result1["id"];?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered text-start">
                                                    <div class="modal-content">
                                                        <div class="modal-header justify-content-between border-bottom">
                                                            <div class="col-8">
                                                                <h5 class="modal-title fw-bold" id="exampleModalLabel1<?php echo $result3["id"];?>">Order Options</h5>
                                                            </div>
                                                            <div class="col-2 text-end">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex mb-4 justify-content-between">
                                                                <h4 class="fw-bold">Standard</h4>
                                                                <h4 class="fw-bold">$<?php echo $result3["price2"];?></h4>
                                                            </div>
                                                            <p class="mb-2"><?php echo $result1["title"];?></p>
                                                            <hr>
                                                            <div class="d-flex justify-content-between">
                                                                <p class="fs-5">Gig Quantity</p>
                                                                <div class="input-group mb-3 cartcontainer" style="width: 130px;">
                                                                    <span class="input-group-text cartbtn" onclick="button4()">-</span>
                                                                    <input type="number" id="input2" min="1" max="10"
                                                                        class="form-control bg-light text-center" name="quantity" value="1">
                                                                    <span class="input-group-text cartbtn" onclick="button3()">+</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer cartcontainer justify-content-center">
                                                            <button type="submit" class="btn btn-dark btn-lg w-100" name="2nd_price">Continue</button>
                                                            <p class="text-muted">You won't be charged yet</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="premium" role="tabpanel" aria-labelledby="premium-tab">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $result1["title"];?></h5>
                                        <h5 class="card-title text-end">$<?php echo $result4["price3"];?></h5>
                                        <p class="card-text"><?php echo $result4["details3"];?></p>
                                        <p class="card-text small fw-bold"><i class="fa-regular fa-clock"></i> <?php echo $result4["time3"];?></p>
                                        <p class="card-text">Number of pages <?php echo $result4["pages3"];?></p>
                                        <p class="card-text">Number of revisions <?php echo $result4["revisions3"];?></p>
                                        <p class="card-text">Number of products <?php echo $result4["products3"];?></p>
                                        <p class="card-text">Number of plugins <?php echo $result4["plugins3"];?></p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result4['functional3'] == 'yes') echo 'checked';?>> Functional</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result4['responsive3'] == 'yes') echo 'checked';?>> Responsive</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result4['content3'] == 'yes') echo 'checked';?>> Allows content</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result4['ecommerce3'] == 'yes') echo 'checked';?>> Ecommerce functionality</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result4['responsive3'] == 'yes') echo 'checked';?>> Responsive</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result4['payment_processing3'] == 'yes') echo 'checked';?>> Payment processing</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result4['in_form3'] == 'yes') echo 'checked';?>> Opt-in form</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result4['auto_responder3'] == 'yes') echo 'checked';?>> Auto responder</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result4['speed3'] == 'yes') echo 'checked';?>> Speed optimization</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result4['hosting3'] == 'yes') echo 'checked';?>> Hosting setup</p>
                                        <p class="card-text"><input type="checkbox" class="form-check-input p-2" disabled
                                        <?php if($result4['icons3'] == 'yes') echo 'checked';?>> Social Media icons</p>
                                        <div class="mt-4">
                                            <a class="btn btn-dark w-100" data-bs-toggle="modal" 
                                            data-bs-target="#exampleModal2<?php echo $result4["id"];?>">Continue &rarr;</a>
                                            <?php
                                            if(isset($_POST["3rd_price"])){
                                                $package_type = $result4["package_type"];
                                                $price3 = $result4["price3"];
                                                $quantity3 = $_POST["quantity"];
                                                $select_price3 = "INSERT INTO `orders`(`user_id`, `gig_id`, `package_type`, `quantity`, `price`) 
                                                VALUES ('$id','$gig_id','$package_type','$quantity3','$price3')";
                                                $run_query3 = mysqli_query($connection, $select_price3);
                                                if($run_query3){
                                                    ?>
                                                    <script>
                                                        window.location.href='main.php';
                                                    </script>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <script>
                                                        alert("Sorry, the order could not be placed.");
                                                    </script>
                                                    <?php
                                                }
                                            }?>
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="modal fade" id="exampleModal2<?php echo $result4["id"];?>" tabindex="-1" aria-labelledby="exampleModalLabel<?php echo $result1["id"];?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered text-start">
                                                    <div class="modal-content">
                                                        <div class="modal-header justify-content-between border-bottom">
                                                            <div class="col-8">
                                                                <h5 class="modal-title fw-bold" id="exampleModalLabel2<?php echo $result4["id"];?>">Order Options</h5>
                                                            </div>
                                                            <div class="col-2 text-end">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex mb-4 justify-content-between">
                                                                <h4 class="fw-bold">Standard</h4>
                                                                <h4 class="fw-bold">$<?php echo $result4["price3"];?></h4>
                                                            </div>
                                                            <p class="mb-2"><?php echo $result1["title"];?></p>
                                                            <hr>
                                                            <div class="d-flex justify-content-between">
                                                                <p class="fs-5">Gig Quantity</p>
                                                                <div class="input-group mb-3 cartcontainer" style="width: 130px;">
                                                                    <span class="input-group-text cartbtn" onclick="button6()">-</span>
                                                                    <input type="number" id="input3" min="1" max="10"
                                                                        class="form-control bg-light text-center" name="quantity" value="1">
                                                                    <span class="input-group-text cartbtn" onclick="button5()">+</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer cartcontainer justify-content-center">
                                                            <button type="submit" class="btn btn-dark btn-lg w-100" name="3rd_price">Continue</button>
                                                            <p class="text-muted">You won't be charged yet</p>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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