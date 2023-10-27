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
} 
$gig_id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Gig</title>
    <?php include "links.php"; ?>
</head>

<body>
    <?php include "gigheader.php"; ?>

    <main class="profilebg">
        <section>
            <?php
                $select_query1 = "SELECT * FROM `price1` WHERE user_id = $id AND gig_id=$gig_id";
                $result_query1 = mysqli_query($connection, $select_query1);
                $session_query1 = mysqli_num_rows($result_query1);

                $select_query2 = "SELECT * FROM `price2` WHERE user_id = $id AND gig_id=$gig_id";
                $result_query2 = mysqli_query($connection, $select_query2);
                $session_query2 = mysqli_num_rows($result_query2);

                $select_query3 = "SELECT * FROM `price3` WHERE user_id = $id AND gig_id=$gig_id";
                $result_query3 = mysqli_query($connection, $select_query3);
                $session_query3 = mysqli_num_rows($result_query3);
            
               if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){
                    $session_query1 = mysqli_fetch_assoc($result_query1);
                        $name1 = $session_query1['name1']; $details1 = $session_query1['details1']; $time1 = $session_query1['time1']; $functional1 = $session_query1['functional1'];
                        $pages1 = $session_query1['pages1']; $revisions1 = $session_query1['revisions1']; $responsive1 = $session_query1['responsive1']; 
                        $content1 = $session_query1['content1']; $plugins1 = $session_query1['plugins1']; $ecommerce1 = $session_query1['ecommerce1']; 
                        $products1 = $session_query1['products1']; $payment_processing1 = $session_query1['payment_processing1'];
                        $in_form1 = $session_query1['in_form1']; $auto_responder1 = $session_query1['auto_responder1']; $speed1 = $session_query1['speed1'];
                        $hosting1 = $session_query1['hosting1']; $icons1 = $session_query1['icons1']; $price1 = $session_query1['price1'];

                    $session_query2 = mysqli_fetch_assoc($result_query2);
                        $name2 = $session_query2['name2']; $details2 = $session_query2['details2']; $time2 = $session_query2['time2']; $functional2 = $session_query2['functional2'];
                        $pages2 = $session_query2['pages2']; $revisions2 = $session_query2['revisions2']; $responsive2 = $session_query2['responsive2']; 
                        $content2 = $session_query2['content2']; $plugins2 = $session_query2['plugins2']; $ecommerce2 = $session_query2['ecommerce2']; 
                        $products2 = $session_query2['products2']; $payment_processing2 = $session_query2['payment_processing2'];
                        $in_form2 = $session_query2['in_form2']; $auto_responder2 = $session_query2['auto_responder2']; $speed2 = $session_query2['speed2'];
                        $hosting2 = $session_query2['hosting2']; $icons2 = $session_query2['icons2']; $price2 = $session_query2['price2'];

                    $session_query3 = mysqli_fetch_assoc($result_query3);
                        $name3 = $session_query3['name3']; $details3 = $session_query3['details3']; $time3 = $session_query3['time3']; $functional3 = $session_query3['functional3'];
                        $pages3 = $session_query3['pages3']; $revisions3 = $session_query3['revisions3']; $responsive3 = $session_query3['responsive3']; 
                        $content3 = $session_query3['content3']; $plugins3 = $session_query3['plugins3']; $ecommerce3 = $session_query3['ecommerce3']; 
                        $products3 = $session_query3['products3']; $payment_processing3 = $session_query3['payment_processing3'];
                        $in_form3 = $session_query3['in_form3']; $auto_responder3 = $session_query3['auto_responder3']; $speed3 = $session_query3['speed3'];
                        $hosting3 = $session_query3['hosting3']; $icons3 = $session_query3['icons3']; $price3 = $session_query3['price3'];

                        if(isset($_POST['update'])){
                            $name1 = $_POST['name1']; $details1 = $_POST['details1']; $time1 = $_POST['time1']; $functional1 = $_POST['functional1'];
                            $pages1 = $_POST['pages1']; $revisions1 = $_POST['revisions1']; $responsive1 = $_POST['responsive1']; 
                            $content1 = $_POST['content1']; $plugins1 = $_POST['plugins1']; $ecommerce1 = $_POST['ecommerce1']; 
                            $products1 = $_POST['products1']; $payment_processing1 = $_POST['payment_processing1'];
                            $in_form1 = $_POST['in_form1']; $auto_responder1 = $_POST['auto_responder1']; $speed1 = $_POST['speed1'];
                            $hosting1 = $_POST['hosting1']; $icons1 = $_POST['icons1']; $price1 = $_POST['price1'];
            
                            $name2 = $_POST['name2']; $details2 = $_POST['details2']; $time2 = $_POST['time2']; $functional2 = $_POST['functional2'];
                            $pages2 = $_POST['pages2']; $revisions2 = $_POST['revisions2']; $responsive2 = $_POST['responsive2']; 
                            $content2 = $_POST['content2']; $plugins2 = $_POST['plugins2']; $ecommerce2 = $_POST['ecommerce2']; 
                            $products2 = $_POST['products2']; $payment_processing2 = $_POST['payment_processing2'];
                            $in_form2 = $_POST['in_form2']; $auto_responder2 = $_POST['auto_responder2']; $speed2 = $_POST['speed2'];
                            $hosting2 = $_POST['hosting2']; $icons2 = $_POST['icons2']; $price2 = $_POST['price2'];
            
                            $name3 = $_POST['name3']; $details3 = $_POST['details3']; $time3 = $_POST['time3']; $functional3 = $_POST['functional3'];
                            $pages3 = $_POST['pages3']; $revisions3 = $_POST['revisions3']; $responsive3 = $_POST['responsive3']; 
                            $content3 = $_POST['content3']; $plugins3 = $_POST['plugins3']; $ecommerce3 = $_POST['ecommerce3']; 
                            $products3 = $_POST['products3']; $payment_processing3 = $_POST['payment_processing3'];
                            $in_form3 = $_POST['in_form3']; $auto_responder3 = $_POST['auto_responder3']; $speed3 = $_POST['speed3'];
                            $hosting3 = $_POST['hosting3']; $icons3 = $_POST['icons3']; $price3 = $_POST['price3'];

                            $update1 = "UPDATE `price1` SET `gig_id`='$gig_id',
                            `name1`='$name1',`details1`='$details1',`time1`='$time1',`functional1`='$functional1',
                            `pages1`='$pages1',`revisions1`='$revisions1',`responsive1`='$responsive1',`content1`='$content1',
                            `plugins1`='$plugins1',`ecommerce1`='$ecommerce1',`products1`='$products1',
                            `payment_processing1`='$payment_processing1',`in_form1`='$in_form1',`auto_responder1`='$auto_responder1',
                            `speed1`='$speed1',`hosting1`='$hosting1',`icons1`='$icons1',`price1`='$price1' 
                            WHERE gig_id=$gig_id";

                            $update2 = "UPDATE `price2` SET `gig_id`='$gig_id',
                            `name2`='$name2',`details2`='$details2',`time2`='$time2',`functional2`='$functional2',
                            `pages2`='$pages2',`revisions2`='$revisions2',`responsive2`='$responsive2',`content2`='$content2',
                            `plugins2`='$plugins2',`ecommerce2`='$ecommerce2',`products2`='$products2',
                            `payment_processing2`='$payment_processing2',`in_form2`='$in_form2',`auto_responder2`='$auto_responder2',
                            `speed2`='$speed2',`hosting2`='$hosting2',`icons2`='$icons2',`price2`='$price2' 
                            WHERE gig_id=$gig_id";

                            $update3 = "UPDATE `price3` SET `gig_id`='$gig_id',
                            `name3`='$name3',`details3`='$details3',`time3`='$time3',`functional3`='$functional3',
                            `pages3`='$pages3',`revisions3`='$revisions3',`responsive3`='$responsive3',`content3`='$content3',
                            `plugins3`='$plugins3',`ecommerce3`='$ecommerce3',`products3`='$products3',
                            `payment_processing3`='$payment_processing3',`in_form3`='$in_form3',`auto_responder3`='$auto_responder3',
                            `speed3`='$speed3',`hosting3`='$hosting3',`icons3`='$icons3',`price3`='$price3' 
                            WHERE gig_id=$gig_id";

                            $result = mysqli_query($connection, $update1); mysqli_query($connection, $update2); mysqli_query($connection, $update3);
                            if($result){
                                $redirect_url2 = "description_&_faq.php?id=" . $gig_id;
                                echo "<script>window.location.href = '$redirect_url2';</script>";
                            }else{
                                ?>
                                <script>
                                    alert("Data not inserted.");
                                </script>
                                <?php
                            }
                        }
               }else{
                if(isset($_POST['save'])){
                    $name1 = $_POST['name1']; $details1 = $_POST['details1']; $time1 = $_POST['time1']; $functional1 = $_POST['functional1'];
                    $pages1 = $_POST['pages1']; $revisions1 = $_POST['revisions1']; $responsive1 = $_POST['responsive1']; 
                    $content1 = $_POST['content1']; $plugins1 = $_POST['plugins1']; $ecommerce1 = $_POST['ecommerce1']; 
                    $products1 = $_POST['products1']; $payment_processing1 = $_POST['payment_processing1'];
                    $in_form1 = $_POST['in_form1']; $auto_responder1 = $_POST['auto_responder1']; $speed1 = $_POST['speed1'];
                    $hosting1 = $_POST['hosting1']; $icons1 = $_POST['icons1']; $price1 = $_POST['price1'];
    
                    $name2 = $_POST['name2']; $details2 = $_POST['details2']; $time2 = $_POST['time2']; $functional2 = $_POST['functional2'];
                    $pages2 = $_POST['pages2']; $revisions2 = $_POST['revisions2']; $responsive2 = $_POST['responsive2']; 
                    $content2 = $_POST['content2']; $plugins2 = $_POST['plugins2']; $ecommerce2 = $_POST['ecommerce2']; 
                    $products2 = $_POST['products2']; $payment_processing2 = $_POST['payment_processing2'];
                    $in_form2 = $_POST['in_form2']; $auto_responder2 = $_POST['auto_responder2']; $speed2 = $_POST['speed2'];
                    $hosting2 = $_POST['hosting2']; $icons2 = $_POST['icons2']; $price2 = $_POST['price2'];
    
                    $name3 = $_POST['name3']; $details3 = $_POST['details3']; $time3 = $_POST['time3']; $functional3 = $_POST['functional3'];
                    $pages3 = $_POST['pages3']; $revisions3 = $_POST['revisions3']; $responsive3 = $_POST['responsive3']; 
                    $content3 = $_POST['content3']; $plugins3 = $_POST['plugins3']; $ecommerce3 = $_POST['ecommerce3']; 
                    $products3 = $_POST['products3']; $payment_processing3 = $_POST['payment_processing3'];
                    $in_form3 = $_POST['in_form3']; $auto_responder3 = $_POST['auto_responder3']; $speed3 = $_POST['speed3'];
                    $hosting3 = $_POST['hosting3']; $icons3 = $_POST['icons3']; $price3 = $_POST['price3'];
    
    
                    $insert1 = "INSERT INTO `price1`(`user_id`, `gig_id`, `name1`, `details1`, `time1`, `functional1`, `pages1`, 
                    `revisions1`, `responsive1`, `content1`, `plugins1`, `ecommerce1`, `products1`, `payment_processing1`, `in_form1`, 
                    `auto_responder1`, `speed1`, `hosting1`, `icons1`, `price1`) VALUES ('$id','$gig_id',
                    '$name1','$details1','$time1','$functional1','$pages1','$revisions1','$responsive1','$content1','$plugins1',
                    '$ecommerce1','$products1','$payment_processing1','$in_form1','$auto_responder1','$speed1','$hosting1','$icons1',
                    '$price1')";
                    
                    $insert2 = "INSERT INTO `price2`(`user_id`, `gig_id`, `name2`, `details2`, `time2`, `functional2`, `pages2`, 
                    `revisions2`, `responsive2`, `content2`, `plugins2`, `ecommerce2`, `products2`, `payment_processing2`, `in_form2`, 
                    `auto_responder2`, `speed2`, `hosting2`, `icons2`, `price2`) VALUES ('$id','$gig_id',
                    '$name2','$details2','$time2','$functional2','$pages2','$revisions2','$responsive2','$content2','$plugins2',
                    '$ecommerce2','$products2','$payment_processing2','$in_form2','$auto_responder2','$speed2','$hosting2','$icons2',
                    '$price2')";
                    
                    $insert3 = "INSERT INTO `price3`(`user_id`, `gig_id`, `name3`, `details3`, `time3`, `functional3`, `pages3`, 
                    `revisions3`, `responsive3`, `content3`, `plugins3`, `ecommerce3`, `products3`, `payment_processing3`, `in_form3`, 
                    `auto_responder3`, `speed3`, `hosting3`, `icons3`, `price3`) VALUES ('$id','$gig_id',
                    '$name3','$details3','$time3','$functional3','$pages3','$revisions3','$responsive3','$content3','$plugins3',
                    '$ecommerce3','$products3','$payment_processing3','$in_form3','$auto_responder3','$speed3','$hosting3','$icons3',
                    '$price3')";
    
                    $result = mysqli_query($connection, $insert1); mysqli_query($connection, $insert2); mysqli_query($connection, $insert3);
                    if($result){
                        $redirect_url2 = "description_&_faq.php?id=" . $gig_id;
                        echo "<script>window.location.href = '$redirect_url2';</script>";
                    }else{
                        ?>
                        <script>
                            alert("Data not inserted.");
                        </script>
                        <?php
                    }
                } } ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="container p-5 d-none d-lg-block">
                    <div class="row">
                        <div class="col">
                            <h1 class="mb-4 text-muted">Scope & Pricing</h1>
                            <div class="bg-primary text-light rounded p-4 d-flex">
                                <i class="fa-solid fa-circle-info mt-2"></i>
                                <p class="mb-0 ms-3">The scope of this service is to deliver buyers a functional
                                    website. Package prices should include predefined options at a minimum of $80. Please move
                                    your Gig to another category if you do not offer this specific service.</p>    
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h6>Packages</h6>
                    <div class="card bg-light p-3 mt-3">
                        <div class="row card-body">
                            <div class="col-3">                            
                            </div>

                            <div class="col-3 p-0">
                                <h6>Basic</h6>
                                <textarea class="form-control resize" name="name1" placeholder="Name your package"
                                maxlength="35" title="35 characters max" rows="3" required><?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo $name1;}?></textarea>
                                <textarea class="form-control resize" name="details1" placeholder="Describe the details of your offering"
                                maxlength="100" title="100 characters max" rows="6" required><?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo $details1;}?></textarea>
                                <select class="form-select" name="time1" required>
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>DELIVERY TIME</option>
                                    <option value="1 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '1 DAY DELIVERY') ? 'selected' : '';}?>>1 DAY DELIVERY</option>
                                    <option value="2 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '2 DAY DELIVERY') ? 'selected' : '';}?>>2 DAY DELIVERY</option>
                                    <option value="3 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '3 DAY DELIVERY') ? 'selected' : '';}?>>3 DAY DELIVERY</option>
                                    <option value="4 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '4 DAY DELIVERY') ? 'selected' : '';}?>>4 DAY DELIVERY</option>
                                    <option value="5 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '5 DAY DELIVERY') ? 'selected' : '';}?>>5 DAY DELIVERY</option>
                                    <option value="6 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '6 DAY DELIVERY') ? 'selected' : '';}?>>6 DAY DELIVERY</option>
                                    <option value="7 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '7 DAY DELIVERY') ? 'selected' : '';}?>>7 DAY DELIVERY</option>
                                    <option value="" disabled>-</option>
                                    <option value="10 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '10 DAY DELIVERY') ? 'selected' : '';}?>>10 DAY DELIVERY</option>
                                    <option value="14 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '14 DAY DELIVERY') ? 'selected' : '';}?>>14 DAY DELIVERY</option>
                                    <option value="21 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '21 DAY DELIVERY') ? 'selected' : '';}?>>21 DAY DELIVERY</option>
                                    <option value="" disabled>-</option>
                                    <option value="30 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '30 DAY DELIVERY') ? 'selected' : '';}?>>30 DAY DELIVERY</option>
                                    <option value="45 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '45 DAY DELIVERY') ? 'selected' : '';}?>>45 DAY DELIVERY</option>
                                    <option value="60 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '60 DAY DELIVERY') ? 'selected' : '';}?>>60 DAY DELIVERY</option>
                                    <option value="75 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '75 DAY DELIVERY') ? 'selected' : '';}?>>75 DAY DELIVERY</option>
                                    <option value="90 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time1 == '90 DAY DELIVERY') ? 'selected' : '';}?>>90 DAY DELIVERY</option>
                                </select>
                            </div>

                            <div class="col-3 p-0">
                                <h6>Standard</h6>
                                <textarea class="form-control resize" name="name2" placeholder="Name your package"
                                maxlength="35" title="35 characters max" rows="3" required><?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo $name2;}?></textarea>
                                <textarea class="form-control resize" name="details2" placeholder="Describe the details of your offering"
                                maxlength="100" title="100 characters max" rows="6" required><?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo $details2;}?></textarea>
                                <select class="form-select" name="time2" required>
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>DELIVERY TIME</option>
                                    <option value="1 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '1 DAY DELIVERY') ? 'selected' : '';}?>>1 DAY DELIVERY</option>
                                    <option value="2 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '2 DAY DELIVERY') ? 'selected' : '';}?>>2 DAY DELIVERY</option>
                                    <option value="3 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '3 DAY DELIVERY') ? 'selected' : '';}?>>3 DAY DELIVERY</option>
                                    <option value="4 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '4 DAY DELIVERY') ? 'selected' : '';}?>>4 DAY DELIVERY</option>
                                    <option value="5 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '5 DAY DELIVERY') ? 'selected' : '';}?>>5 DAY DELIVERY</option>
                                    <option value="6 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '6 DAY DELIVERY') ? 'selected' : '';}?>>6 DAY DELIVERY</option>
                                    <option value="7 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '7 DAY DELIVERY') ? 'selected' : '';}?>>7 DAY DELIVERY</option>
                                    <option value="" disabled>-</option>
                                    <option value="10 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '10 DAY DELIVERY') ? 'selected' : '';}?>>10 DAY DELIVERY</option>
                                    <option value="14 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '14 DAY DELIVERY') ? 'selected' : '';}?>>14 DAY DELIVERY</option>
                                    <option value="21 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '21 DAY DELIVERY') ? 'selected' : '';}?>>21 DAY DELIVERY</option>
                                    <option value="" disabled>-</option>
                                    <option value="30 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '30 DAY DELIVERY') ? 'selected' : '';}?>>30 DAY DELIVERY</option>
                                    <option value="45 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '45 DAY DELIVERY') ? 'selected' : '';}?>>45 DAY DELIVERY</option>
                                    <option value="60 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '60 DAY DELIVERY') ? 'selected' : '';}?>>60 DAY DELIVERY</option>
                                    <option value="75 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '75 DAY DELIVERY') ? 'selected' : '';}?>>75 DAY DELIVERY</option>
                                    <option value="90 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time2 == '90 DAY DELIVERY') ? 'selected' : '';}?>>90 DAY DELIVERY</option>
                                </select>
                            </div>

                            <div class="col-3 p-0">
                                <h6>Premium</h6>
                                <textarea class="form-control resize" name="name3" placeholder="Name your package"
                                maxlength="35" title="35 characters max" rows="3" required><?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo $name3;}?></textarea>
                                <textarea class="form-control resize" name="details3" placeholder="Describe the details of your offering"
                                maxlength="100" title="100 characters max" rows="6" required><?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo $details3;}?></textarea>
                                <select class="form-select" name="time3" required>
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>DELIVERY TIME</option>
                                    <option value="1 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '1 DAY DELIVERY') ? 'selected' : '';}?>>1 DAY DELIVERY</option>
                                    <option value="2 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '2 DAY DELIVERY') ? 'selected' : '';}?>>2 DAY DELIVERY</option>
                                    <option value="3 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '3 DAY DELIVERY') ? 'selected' : '';}?>>3 DAY DELIVERY</option>
                                    <option value="4 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '4 DAY DELIVERY') ? 'selected' : '';}?>>4 DAY DELIVERY</option>
                                    <option value="5 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '5 DAY DELIVERY') ? 'selected' : '';}?>>5 DAY DELIVERY</option>
                                    <option value="6 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '6 DAY DELIVERY') ? 'selected' : '';}?>>6 DAY DELIVERY</option>
                                    <option value="7 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '7 DAY DELIVERY') ? 'selected' : '';}?>>7 DAY DELIVERY</option>
                                    <option value="" disabled>-</option>
                                    <option value="10 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '10 DAY DELIVERY') ? 'selected' : '';}?>>10 DAY DELIVERY</option>
                                    <option value="14 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '14 DAY DELIVERY') ? 'selected' : '';}?>>14 DAY DELIVERY</option>
                                    <option value="21 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '21 DAY DELIVERY') ? 'selected' : '';}?>>21 DAY DELIVERY</option>
                                    <option value="" disabled>-</option>
                                    <option value="30 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '30 DAY DELIVERY') ? 'selected' : '';}?>>30 DAY DELIVERY</option>
                                    <option value="45 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '45 DAY DELIVERY') ? 'selected' : '';}?>>45 DAY DELIVERY</option>
                                    <option value="60 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '60 DAY DELIVERY') ? 'selected' : '';}?>>60 DAY DELIVERY</option>
                                    <option value="75 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '75 DAY DELIVERY') ? 'selected' : '';}?>>75 DAY DELIVERY</option>
                                    <option value="90 DAY DELIVERY" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($time3 == '90 DAY DELIVERY') ? 'selected' : '';}?>>90 DAY DELIVERY</option>
                                </select>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Functional website</p>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" class="form-check-input p-2" name="functional1" value="yes"
                                title="Website should be functional to meet the buyer's expectations." required
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query1['functional1'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" class="form-check-input p-2" name="functional2" value="yes"
                                title="Website should be functional to meet the buyer's expectations." required
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query2['functional2'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" class="form-check-input p-2" name="functional3" value="yes"
                                title="Website should be functional to meet the buyer's expectations." required
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query3['functional3'] == 'yes') echo 'checked';}?>>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Number of pages</p>
                            </div>

                            <div class="col-3 p-0">
                                <select class="form-select" name="pages1">
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>SELECT</option>
                                    <option value="1" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages1 == '1') ? 'selected' : '';}?>>1</option>
                                    <option value="2" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages1 == '2') ? 'selected' : '';}?>>2</option>
                                    <option value="3" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages1 == '3') ? 'selected' : '';}?>>3</option>
                                    <option value="4" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages1 == '4') ? 'selected' : '';}?>>4</option>
                                    <option value="5" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages1 == '5') ? 'selected' : '';}?>>5</option>
                                    <option value="6" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages1 == '6') ? 'selected' : '';}?>>6</option>
                                    <option value="7" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages1 == '7') ? 'selected' : '';}?>>7</option>
                                    <option value="8" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages1 == '8') ? 'selected' : '';}?>>8</option>
                                    <option value="9" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages1 == '9') ? 'selected' : '';}?>>9</option>
                                    <option value="10" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages1 == '10') ? 'selected' : '';}?>>10</option>
                                </select>
                            </div>

                            <div class="col-3 p-0">
                                <select class="form-select" name="pages2">
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>SELECT</option>
                                    <option value="1" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages2 == '1') ? 'selected' : '';}?>>1</option>
                                    <option value="2" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages2 == '2') ? 'selected' : '';}?>>2</option>
                                    <option value="3" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages2 == '3') ? 'selected' : '';}?>>3</option>
                                    <option value="4" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages2 == '4') ? 'selected' : '';}?>>4</option>
                                    <option value="5" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages2 == '5') ? 'selected' : '';}?>>5</option>
                                    <option value="6" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages2 == '6') ? 'selected' : '';}?>>6</option>
                                    <option value="7" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages2 == '7') ? 'selected' : '';}?>>7</option>
                                    <option value="8" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages2 == '8') ? 'selected' : '';}?>>8</option>
                                    <option value="9" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages2 == '9') ? 'selected' : '';}?>>9</option>
                                    <option value="10" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages2 == '10') ? 'selected' : '';}?>>10</option>
                                </select>
                            </div>

                            <div class="col-3 p-0">
                                <select class="form-select" name="pages3">
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>SELECT</option>
                                    <option value="1" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages3 == '1') ? 'selected' : '';}?>>1</option>
                                    <option value="2" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages3 == '2') ? 'selected' : '';}?>>2</option>
                                    <option value="3" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages3 == '3') ? 'selected' : '';}?>>3</option>
                                    <option value="4" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages3 == '4') ? 'selected' : '';}?>>4</option>
                                    <option value="5" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages3 == '5') ? 'selected' : '';}?>>5</option>
                                    <option value="6" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages3 == '6') ? 'selected' : '';}?>>6</option>
                                    <option value="7" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages3 == '7') ? 'selected' : '';}?>>7</option>
                                    <option value="8" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages3 == '8') ? 'selected' : '';}?>>8</option>
                                    <option value="9" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages3 == '9') ? 'selected' : '';}?>>9</option>
                                    <option value="10" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($pages3 == '10') ? 'selected' : '';}?>>10</option>
                                </select>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Revisions</p>
                            </div>

                            <div class="col-3 p-0">
                                <select class="form-select" name="revisions1">
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>SELECT</option>
                                    <option value="0" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions1 == '0') ? 'selected' : '';}?>>0</option>
                                    <option value="1" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions1 == '1') ? 'selected' : '';}?>>1</option>
                                    <option value="2" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions1 == '2') ? 'selected' : '';}?>>2</option>
                                    <option value="3" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions1 == '3') ? 'selected' : '';}?>>3</option>
                                    <option value="4" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions1 == '4') ? 'selected' : '';}?>>4</option>
                                    <option value="5" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions1 == '5') ? 'selected' : '';}?>>5</option>
                                    <option value="6" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions1 == '6') ? 'selected' : '';}?>>6</option>
                                    <option value="7" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions1 == '7') ? 'selected' : '';}?>>7</option>
                                    <option value="8" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions1 == '8') ? 'selected' : '';}?>>8</option>
                                    <option value="9" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions1 == '9') ? 'selected' : '';}?>>9</option>
                                    <option value="unlimited" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions1 == 'unlimited') ? 'selected' : '';}?>>UNLIMITED</option>
                                </select>
                            </div>

                            <div class="col-3 p-0">
                                <select class="form-select" name="revisions2">
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>SELECT</option>
                                    <option value="0" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions2 == '0') ? 'selected' : '';}?>>0</option>
                                    <option value="1" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions2 == '1') ? 'selected' : '';}?>>1</option>
                                    <option value="2" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions2 == '2') ? 'selected' : '';}?>>2</option>
                                    <option value="3" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions2 == '3') ? 'selected' : '';}?>>3</option>
                                    <option value="4" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions2 == '4') ? 'selected' : '';}?>>4</option>
                                    <option value="5" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions2 == '5') ? 'selected' : '';}?>>5</option>
                                    <option value="6" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions2 == '6') ? 'selected' : '';}?>>6</option>
                                    <option value="7" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions2 == '7') ? 'selected' : '';}?>>7</option>
                                    <option value="8" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions2 == '8') ? 'selected' : '';}?>>8</option>
                                    <option value="9" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions2 == '9') ? 'selected' : '';}?>>9</option>
                                    <option value="unlimited" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions2 == 'unlimited') ? 'selected' : '';}?>>UNLIMITED</option>
                                </select>
                            </div>

                            <div class="col-3 p-0">
                                <select class="form-select" name="revisions3">
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>SELECT</option>
                                    <option value="0" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions3 == '0') ? 'selected' : '';}?>>0</option>
                                    <option value="1" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions3 == '1') ? 'selected' : '';}?>>1</option>
                                    <option value="2" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions3 == '2') ? 'selected' : '';}?>>2</option>
                                    <option value="3" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions3 == '3') ? 'selected' : '';}?>>3</option>
                                    <option value="4" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions3 == '4') ? 'selected' : '';}?>>4</option>
                                    <option value="5" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions3 == '5') ? 'selected' : '';}?>>5</option>
                                    <option value="6" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions3 == '6') ? 'selected' : '';}?>>6</option>
                                    <option value="7" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions3 == '7') ? 'selected' : '';}?>>7</option>
                                    <option value="8" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions3 == '8') ? 'selected' : '';}?>>8</option>
                                    <option value="9" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions3 == '9') ? 'selected' : '';}?>>9</option>
                                    <option value="unlimited" 
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($revisions3 == 'unlimited') ? 'selected' : '';}?>>UNLIMITED</option>
                                </select>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Responsive Design</p>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="responsive1" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query1['responsive1'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="responsive2" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query2['responsive2'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="responsive3" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query3['responsive3'] == 'yes') echo 'checked';}?>>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Content Upload</p>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="content1" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query1['content1'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="content2" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query2['content2'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="content3" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query3['content3'] == 'yes') echo 'checked';}?>>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Plugins/extensions installation</p>
                            </div>

                            <div class="col-3 p-0">
                                <select class="form-select" name="plugins1">
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>SELECT</option>
                                    <option value="1"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins1 == '1') ? 'selected' : '';}?>>1</option>
                                    <option value="2"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins1 == '2') ? 'selected' : '';}?>>2</option>
                                    <option value="3"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins1 == '3') ? 'selected' : '';}?>>3</option>
                                    <option value="4"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins1 == '4') ? 'selected' : '';}?>>4</option>
                                    <option value="5"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins1 == '5') ? 'selected' : '';}?>>5</option>
                                    <option value="6"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins1 == '6') ? 'selected' : '';}?>>6</option>
                                    <option value="7"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins1 == '7') ? 'selected' : '';}?>>7</option>
                                    <option value="8"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins1 == '8') ? 'selected' : '';}?>>8</option>
                                    <option value="9"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins1 == '9') ? 'selected' : '';}?>>9</option>
                                    <option value="10"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins1 == '10') ? 'selected' : '';}?>>10</option>
                                </select>
                            </div>

                            <div class="col-3 p-0">
                                <select class="form-select" name="plugins2">
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>SELECT</option>
                                    <option value="1"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins2 == '1') ? 'selected' : '';}?>>1</option>
                                    <option value="2"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins2 == '2') ? 'selected' : '';}?>>2</option>
                                    <option value="3"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins2 == '3') ? 'selected' : '';}?>>3</option>
                                    <option value="4"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins2 == '4') ? 'selected' : '';}?>>4</option>
                                    <option value="5"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins2 == '5') ? 'selected' : '';}?>>5</option>
                                    <option value="6"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins2 == '6') ? 'selected' : '';}?>>6</option>
                                    <option value="7"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins2 == '7') ? 'selected' : '';}?>>7</option>
                                    <option value="8"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins2 == '8') ? 'selected' : '';}?>>8</option>
                                    <option value="9"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins2 == '9') ? 'selected' : '';}?>>9</option>
                                    <option value="10"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins2 == '10') ? 'selected' : '';}?>>10</option>
                                </select>
                            </div>

                            <div class="col-3 p-0">
                                <select class="form-select" name="plugins3">
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>SELECT</option>
                                    <option value="1"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins3 == '1') ? 'selected' : '';}?>>1</option>
                                    <option value="2"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins3 == '2') ? 'selected' : '';}?>>2</option>
                                    <option value="3"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins3 == '3') ? 'selected' : '';}?>>3</option>
                                    <option value="4"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins3 == '4') ? 'selected' : '';}?>>4</option>
                                    <option value="5"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins3 == '5') ? 'selected' : '';}?>>5</option>
                                    <option value="6"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins3 == '6') ? 'selected' : '';}?>>6</option>
                                    <option value="7"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins3 == '7') ? 'selected' : '';}?>>7</option>
                                    <option value="8"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins3 == '8') ? 'selected' : '';}?>>8</option>
                                    <option value="9"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins3 == '9') ? 'selected' : '';}?>>9</option>
                                    <option value="10"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($plugins3 == '10') ? 'selected' : '';}?>>10</option>
                                </select>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">E-commerce functionality</p>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="ecommerce1" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query1['ecommerce1'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="ecommerce2" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query2['ecommerce2'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="ecommerce3" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query3['ecommerce3'] == 'yes') echo 'checked';}?>>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Number of products</p>
                            </div>

                            <div class="col-3 p-0">
                                <select class="form-select" name="products1">
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>SELECT</option>
                                    <option value="1"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '1') ? 'selected' : '';}?>>1</option>
                                    <option value="2"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '2') ? 'selected' : '';}?>>2</option>
                                    <option value="3"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '3') ? 'selected' : '';}?>>3</option>
                                    <option value="4"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '4') ? 'selected' : '';}?>>4</option>
                                    <option value="5"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '5') ? 'selected' : '';}?>>5</option>
                                    <option value="6"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '6') ? 'selected' : '';}?>>6</option>
                                    <option value="7"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '7') ? 'selected' : '';}?>>7</option>
                                    <option value="8"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '8') ? 'selected' : '';}?>>8</option>
                                    <option value="9"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '9') ? 'selected' : '';}?>>9</option>
                                    <option value="10"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '10') ? 'selected' : '';}?>>10</option>
                                    <option value="11"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '11') ? 'selected' : '';}?>>11</option>
                                    <option value="12"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '12') ? 'selected' : '';}?>>12</option>
                                    <option value="13"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '13') ? 'selected' : '';}?>>13</option>
                                    <option value="14"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '14') ? 'selected' : '';}?>>14</option>
                                    <option value="15"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '15') ? 'selected' : '';}?>>15</option>
                                    <option value="16"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '16') ? 'selected' : '';}?>>16</option>
                                    <option value="17"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '17') ? 'selected' : '';}?>>17</option>
                                    <option value="18"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '18') ? 'selected' : '';}?>>18</option>
                                    <option value="19"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '19') ? 'selected' : '';}?>>19</option>
                                    <option value="20"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '20') ? 'selected' : '';}?>>20</option>
                                    <option value="21"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '21') ? 'selected' : '';}?>>21</option>
                                    <option value="22"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '22') ? 'selected' : '';}?>>22</option>
                                    <option value="23"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '23') ? 'selected' : '';}?>>23</option>
                                    <option value="24"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '24') ? 'selected' : '';}?>>24</option>
                                    <option value="25"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '25') ? 'selected' : '';}?>>25</option>
                                    <option value="26"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '26') ? 'selected' : '';}?>>26</option>
                                    <option value="27"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '27') ? 'selected' : '';}?>>27</option>
                                    <option value="28"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '28') ? 'selected' : '';}?>>28</option>
                                    <option value="29"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '29') ? 'selected' : '';}?>>29</option>
                                    <option value="30"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '30') ? 'selected' : '';}?>>30</option>
                                    <option value="31"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '31') ? 'selected' : '';}?>>31</option>
                                    <option value="32"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '32') ? 'selected' : '';}?>>32</option>
                                    <option value="33"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '33') ? 'selected' : '';}?>>33</option>
                                    <option value="34"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '34') ? 'selected' : '';}?>>34</option>
                                    <option value="35"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '35') ? 'selected' : '';}?>>35</option>
                                    <option value="36"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '36') ? 'selected' : '';}?>>36</option>
                                    <option value="37"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '37') ? 'selected' : '';}?>>37</option>
                                    <option value="38"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '38') ? 'selected' : '';}?>>38</option>
                                    <option value="39"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '39') ? 'selected' : '';}?>>39</option>
                                    <option value="40"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '40') ? 'selected' : '';}?>>40</option>
                                    <option value="41"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '41') ? 'selected' : '';}?>>41</option>
                                    <option value="42"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '42') ? 'selected' : '';}?>>42</option>
                                    <option value="43"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '43') ? 'selected' : '';}?>>43</option>
                                    <option value="44"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '44') ? 'selected' : '';}?>>44</option>
                                    <option value="45"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '45') ? 'selected' : '';}?>>45</option>
                                    <option value="46"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '46') ? 'selected' : '';}?>>46</option>
                                    <option value="47"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '47') ? 'selected' : '';}?>>47</option>
                                    <option value="48"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '48') ? 'selected' : '';}?>>48</option>
                                    <option value="49"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '49') ? 'selected' : '';}?>>49</option>
                                    <option value="50"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products1 == '50') ? 'selected' : '';}?>>50</option>
                                </select>
                            </div>

                            <div class="col-3 p-0">
                                <select class="form-select" name="products2">
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>SELECT</option>
                                    <option value="1"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '1') ? 'selected' : '';}?>>1</option>
                                    <option value="2"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '2') ? 'selected' : '';}?>>2</option>
                                    <option value="3"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '3') ? 'selected' : '';}?>>3</option>
                                    <option value="4"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '4') ? 'selected' : '';}?>>4</option>
                                    <option value="5"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '5') ? 'selected' : '';}?>>5</option>
                                    <option value="6"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '6') ? 'selected' : '';}?>>6</option>
                                    <option value="7"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '7') ? 'selected' : '';}?>>7</option>
                                    <option value="8"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '8') ? 'selected' : '';}?>>8</option>
                                    <option value="9"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '9') ? 'selected' : '';}?>>9</option>
                                    <option value="10"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '10') ? 'selected' : '';}?>>10</option>
                                    <option value="11"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '11') ? 'selected' : '';}?>>11</option>
                                    <option value="12"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '12') ? 'selected' : '';}?>>12</option>
                                    <option value="13"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '13') ? 'selected' : '';}?>>13</option>
                                    <option value="14"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '14') ? 'selected' : '';}?>>14</option>
                                    <option value="15"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '15') ? 'selected' : '';}?>>15</option>
                                    <option value="16"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '16') ? 'selected' : '';}?>>16</option>
                                    <option value="17"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '17') ? 'selected' : '';}?>>17</option>
                                    <option value="18"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '18') ? 'selected' : '';}?>>18</option>
                                    <option value="19"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '19') ? 'selected' : '';}?>>19</option>
                                    <option value="20"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '20') ? 'selected' : '';}?>>20</option>
                                    <option value="21"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '21') ? 'selected' : '';}?>>21</option>
                                    <option value="22"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '22') ? 'selected' : '';}?>>22</option>
                                    <option value="23"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '23') ? 'selected' : '';}?>>23</option>
                                    <option value="24"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '24') ? 'selected' : '';}?>>24</option>
                                    <option value="25"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '25') ? 'selected' : '';}?>>25</option>
                                    <option value="26"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '26') ? 'selected' : '';}?>>26</option>
                                    <option value="27"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '27') ? 'selected' : '';}?>>27</option>
                                    <option value="28"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '28') ? 'selected' : '';}?>>28</option>
                                    <option value="29"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '29') ? 'selected' : '';}?>>29</option>
                                    <option value="30"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '30') ? 'selected' : '';}?>>30</option>
                                    <option value="31"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '31') ? 'selected' : '';}?>>31</option>
                                    <option value="32"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '32') ? 'selected' : '';}?>>32</option>
                                    <option value="33"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '33') ? 'selected' : '';}?>>33</option>
                                    <option value="34"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '34') ? 'selected' : '';}?>>34</option>
                                    <option value="35"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '35') ? 'selected' : '';}?>>35</option>
                                    <option value="36"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '36') ? 'selected' : '';}?>>36</option>
                                    <option value="37"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '37') ? 'selected' : '';}?>>37</option>
                                    <option value="38"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '38') ? 'selected' : '';}?>>38</option>
                                    <option value="39"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '39') ? 'selected' : '';}?>>39</option>
                                    <option value="40"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '40') ? 'selected' : '';}?>>40</option>
                                    <option value="41"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '41') ? 'selected' : '';}?>>41</option>
                                    <option value="42"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '42') ? 'selected' : '';}?>>42</option>
                                    <option value="43"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '43') ? 'selected' : '';}?>>43</option>
                                    <option value="44"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '44') ? 'selected' : '';}?>>44</option>
                                    <option value="45"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '45') ? 'selected' : '';}?>>45</option>
                                    <option value="46"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '46') ? 'selected' : '';}?>>46</option>
                                    <option value="47"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '47') ? 'selected' : '';}?>>47</option>
                                    <option value="48"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '48') ? 'selected' : '';}?>>48</option>
                                    <option value="49"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '49') ? 'selected' : '';}?>>49</option>
                                    <option value="50"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products2 == '50') ? 'selected' : '';}?>>50</option>
                                </select>
                            </div>

                            <div class="col-3 p-0">
                                <select class="form-select" name="products3">
                                    <option value="" <?php if(!$session_query1 > 0 AND !$session_query2 > 0 AND !$session_query3 > 0){?>selected<?php }?> disabled>SELECT</option>
                                    <option value="1"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '1') ? 'selected' : '';}?>>1</option>
                                    <option value="2"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '2') ? 'selected' : '';}?>>2</option>
                                    <option value="3"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '3') ? 'selected' : '';}?>>3</option>
                                    <option value="4"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '4') ? 'selected' : '';}?>>4</option>
                                    <option value="5"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '5') ? 'selected' : '';}?>>5</option>
                                    <option value="6"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '6') ? 'selected' : '';}?>>6</option>
                                    <option value="7"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '7') ? 'selected' : '';}?>>7</option>
                                    <option value="8"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '8') ? 'selected' : '';}?>>8</option>
                                    <option value="9"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '9') ? 'selected' : '';}?>>9</option>
                                    <option value="10"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '10') ? 'selected' : '';}?>>10</option>
                                    <option value="11"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '11') ? 'selected' : '';}?>>11</option>
                                    <option value="12"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '12') ? 'selected' : '';}?>>12</option>
                                    <option value="13"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '13') ? 'selected' : '';}?>>13</option>
                                    <option value="14"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '14') ? 'selected' : '';}?>>14</option>
                                    <option value="15"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '15') ? 'selected' : '';}?>>15</option>
                                    <option value="16"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '16') ? 'selected' : '';}?>>16</option>
                                    <option value="17"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '17') ? 'selected' : '';}?>>17</option>
                                    <option value="18"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '18') ? 'selected' : '';}?>>18</option>
                                    <option value="19"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '19') ? 'selected' : '';}?>>19</option>
                                    <option value="20"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '20') ? 'selected' : '';}?>>20</option>
                                    <option value="21"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '21') ? 'selected' : '';}?>>21</option>
                                    <option value="22"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '22') ? 'selected' : '';}?>>22</option>
                                    <option value="23"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '23') ? 'selected' : '';}?>>23</option>
                                    <option value="24"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '24') ? 'selected' : '';}?>>24</option>
                                    <option value="25"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '25') ? 'selected' : '';}?>>25</option>
                                    <option value="26"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '26') ? 'selected' : '';}?>>26</option>
                                    <option value="27"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '27') ? 'selected' : '';}?>>27</option>
                                    <option value="28"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '28') ? 'selected' : '';}?>>28</option>
                                    <option value="29"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '29') ? 'selected' : '';}?>>29</option>
                                    <option value="30"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '30') ? 'selected' : '';}?>>30</option>
                                    <option value="31"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '31') ? 'selected' : '';}?>>31</option>
                                    <option value="32"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '32') ? 'selected' : '';}?>>32</option>
                                    <option value="33"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '33') ? 'selected' : '';}?>>33</option>
                                    <option value="34"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '34') ? 'selected' : '';}?>>34</option>
                                    <option value="35"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '35') ? 'selected' : '';}?>>35</option>
                                    <option value="36"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '36') ? 'selected' : '';}?>>36</option>
                                    <option value="37"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '37') ? 'selected' : '';}?>>37</option>
                                    <option value="38"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '38') ? 'selected' : '';}?>>38</option>
                                    <option value="39"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '39') ? 'selected' : '';}?>>39</option>
                                    <option value="40"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '40') ? 'selected' : '';}?>>40</option>
                                    <option value="41"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '41') ? 'selected' : '';}?>>41</option>
                                    <option value="42"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '42') ? 'selected' : '';}?>>42</option>
                                    <option value="43"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '43') ? 'selected' : '';}?>>43</option>
                                    <option value="44"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '44') ? 'selected' : '';}?>>44</option>
                                    <option value="45"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '45') ? 'selected' : '';}?>>45</option>
                                    <option value="46"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '46') ? 'selected' : '';}?>>46</option>
                                    <option value="47"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '47') ? 'selected' : '';}?>>47</option>
                                    <option value="48"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '48') ? 'selected' : '';}?>>48</option>
                                    <option value="49"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '49') ? 'selected' : '';}?>>49</option>
                                    <option value="50"
                                    <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){echo ($products3 == '50') ? 'selected' : '';}?>>50</option>
                                </select>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Payment processing</p>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="payment_processing1" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query1['payment_processing1'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="payment_processing2" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query2['payment_processing2'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="payment_processing3" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query3['payment_processing3'] == 'yes') echo 'checked';}?>>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Opt-in form</p>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="in_form1" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query1['in_form1'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="in_form2" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query2['in_form2'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="in_form3" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query3['in_form3'] == 'yes') echo 'checked';}?>>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Auto-responder integration</p>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="auto_responder1" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query1['auto_responder1'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="auto_responder2" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query2['auto_responder2'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="auto_responder3" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query3['auto_responder3'] == 'yes') echo 'checked';}?>>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Speed optimization</p>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="speed1" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query1['speed1'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="speed2" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query2['speed2'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="speed3" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query3['speed3'] == 'yes') echo 'checked';}?>>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Hosting setup</p>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="hosting1" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query1['hosting1'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="hosting2" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query2['hosting2'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="hosting3" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query3['hosting3'] == 'yes') echo 'checked';}?>>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Social media icons</p>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="icons1" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query1['icons1'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="icons2" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query2['icons2'] == 'yes') echo 'checked';}?>>
                            </div>

                            <div class="col-3 p-0 text-center">
                                <input type="checkbox" name="icons3" value="yes" class="form-check-input p-2"
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){if($session_query3['icons3'] == 'yes') echo 'checked';}?>>
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-3">
                                <p class="mb-0">Price</p>
                            </div>

                            <div class="col-3 p-0">
                                <input type="number" name="price1" class="form-control fw-bold" placeholder="$80-$10,000" required
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){ ?>value="<?php echo $price1;?>"<?php }?>>
                            </div>

                            <div class="col-3 p-0">
                                <input type="number" name="price2" class="form-control fw-bold" placeholder="$80-$10,000" required
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){ ?>value="<?php echo $price2;?>"<?php }?>>
                            </div>

                            <div class="col-3 p-0">
                                <input type="number" name="price3" class="form-control fw-bold" placeholder="$80-$10,000" required
                                <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){ ?>value="<?php echo $price3;?>"<?php }?>>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <?php if($session_query1 > 0 AND $session_query2 > 0 AND $session_query3 > 0){ ?>
                        <div class="mt-3">
                            <button type="submit" name="update" class="btn btn-dark btn-lg">Update & Continue</button>
                        </div>
                        <?php }else{ ?>
                        <div class="mt-3">
                            <button type="submit" name="save" class="btn btn-dark btn-lg">Save & Continue</button>
                        </div>
                        <?php } ?>
                        <div class="mt-3">
                            <a class="text-success text-decoration-none" href="./gigs.php">Back</a>
                        </div>
                    </div>
                </div>
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
            </form>
        </section>
    </main>

    <?php include "footer.php"; ?>
</body>

</html>