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
                <div class="row justify-content-between">
                    <div class="col-5">
                        <div class="d-none d-lg-flex text-center mb-5 justify-content-between">
                            <h4 class="fw-bold"><?php echo $gig_row["title"];?></h2>
                        </div>
                        <div class="d-flex d-lg-none text-center mb-5 justify-content-between">
                            <h4 class="fw-bold"><?php echo $gig_row["title"];?></h5>
                        </div>
                        <?php if($status=="Completed"){?>
                            <div class="check-your-order text-center">
                                <h3 class="fw-bold bg-light p-3 rounded">This order has been Completed.</h3>
                            </div>
                        <?php }else{?>
                            <div class="check-your-order mb-5 text-center text-lg-start">
                                <h4 class="fw-bold mb-3">Deadline</h4>
                                <p class="mb-4">Complete your order in:</p>
                                <div class="countdown-container" id="countdown-container">
                                    <span class="bg" id="days">0</span>:<span class="bg" 
                                    id="hours">0</span>:<span class="bg" id="minutes"
                                    >0</span>:<span class="bg" id="seconds">0</span> Days
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <div class="col-3">
                        <img src="../seller/assets/upload/<?php echo $gallery_row["image1"];?>" class="d-block w-100">
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="status mb-5 text-center text-lg-start">
                            <h4 class="fw-bold mb-3">Order status:</h4>
                            <h5 class="mb-3"><?php echo $status;?></span></h4>
                        </div>
                        <p class="d-none" id="time"><?php echo $number_part;?></p>
                        <p id="currentDate" data-current-date="<?php echo $currentdate;?>"></p>
                            <div class="submission-details mt-5 mb-5">
                                <h3 class="fw-bold mb-3">Amount received upon order completion: $<?php echo $totalprice*.8;?>*</h3>
                                <h5 class="text-muted">* You will be paid 80% of the total price of the project.</h5>
                            </div>
                        <?php if($status=="Completed"){?>
                            <div class="submission text-center">
                                <h3 class="fw-bold bg-light p-3 rounded">This order has been Completed.</h3>
                            </div>
                        <?php }else{?>
                            <div class="submission">
                                <a class="btn btn-dark btn-lg rounded-pill w-100" 
                                data-bs-toggle="modal" data-bs-target="#exampleModal">Complete the order</a>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <?php
                                        if(isset($_POST["submit"])){
                                            $file = $_FILES['file'];
                                            $filename = $file["name"];
                                            move_uploaded_file($file["tmp_name"],'./assets/upload/'.$filename);

                                            $update = "UPDATE `orders` SET `file`='$filename',`status`='Completed' WHERE `id`='$order_id'";
                                            $update_run = mysqli_query($connection,$update);
                                            if($update_run){
                                                ?>
                                                <script>
                                                    window.location.href='orders.php';
                                                </script>
                                                <?php
                                            }else{
                                                ?>
                                                <script>
                                                    alert("File not uploaded.");
                                                </script>
                                                <?php
                                            }
                                        }
                                    ?>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                        <div class="modal-content container p-4">
                                            <div class="modal-header row justify-content-between">
                                                <div class="col-8">
                                                    <h4 class="modal-title fw-bold d-none d-md-block" id="exampleModalLabel">Complete order</h4>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <div class="modal-body ps-0 pe-0 mt-1 mb-2">
                                                <label for="file" class="form-label mb-3">Submit the completed order</label>
                                                <input type="file" name="file" class="form-control" required>
                                            </div>
                                            <div class="modal-footer text-end">
                                                <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" name="submit" class="btn btn-dark fw-bold ps-4 pe-4">
                                                    Submit</button>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
    // countdown
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
</script>
<?php include "footer.php"; ?>
</body>

</html>