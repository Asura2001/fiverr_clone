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
        <section class="mt-4 mb-4">
            <div class="container">
                <div class="row mb-4">
                    <div class="col">
                        <h2 class="fw-bold">Nice to see you, <?php echo $fname; ?>
                        </h2>
                    </div>
                </div>
                <div class="row border rounded justify-content-between p-4">
                    <div class="col-12 col-lg-6">
                        <div class="d-flex">
                            <i class="fa-solid fa-wand-magic-sparkles fs-3 text-muted mt-2 me-2"></i>
                            <div>
                                <h5 class="mb-1 fw-bold">Get proposals from the most relevant sellers</h5>
                                <p class="mb-0">Simply create a project brief and let us do the searching for you.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 mt-4 mt-lg-1 text-end">
                        <a class="btn btn-secondary w-100" href="#">Create a brief</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-4">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-12 mt-2 text-center text-lg-start">
                        <a class="text-muted text-decoration-none" href="#">
                            <h5 class="underline-hover">Continue browsing &rightarrow;</h5>
                        </a>
                    </div>
                </div>
                <div class="row border rounded p-4 pb-0">
                    <div class="col">
                        <div class="logos-slider slider">
                            <?php
                                $select1 = "SELECT * FROM `gigs`";
                                $select_result1 = mysqli_query($connection, $select1); 
                                while($result_select1 = mysqli_fetch_array($select_result1)){
                                    $gig_id = $result_select1['id'];
                                    $user_id = $result_select1['user_id'];
                                    $select1_clone = "SELECT * FROM `user_register` WHERE id=$user_id";
                                    $select2 = "SELECT * FROM `price1` WHERE gig_id = $gig_id";
                                    $select3 = "SELECT * FROM `gallery` WHERE gig_id = $gig_id";
                                    $select4 = "SELECT AVG(rating) AS averageRating FROM ratings WHERE `gig_id`='$gig_id'";
                                    $select5 = "SELECT count(*) As count FROM ratings WHERE `gig_id`='$gig_id'";
                                    $select_result2 = mysqli_query($connection, $select2);
                                    $select_result3 = mysqli_query($connection, $select3);
                                    $select_result4 = mysqli_query($connection,$select4);
                                    $select_result5 = mysqli_query($connection,$select5);
                                    $select_result1_clone = mysqli_query($connection, $select1_clone);
                                    $result_select2 = mysqli_fetch_array($select_result2);
                                    $result_select3 = mysqli_fetch_array($select_result3);
                                    $result_select1_clone = mysqli_fetch_array($select_result1_clone);
                                    $result_select4 = mysqli_num_rows($select_result4);
                                    while($result_select5 = mysqli_fetch_assoc($select_result5)){
                                        $count=$result_select5['count'];
                                    }
                                    $result_data = mysqli_fetch_array($select_result4);
                            ?>
                            <div class="slide">
                                <a class="text-reset text-decoration-none" href="product.php?id=<?php echo $result_select1["id"];?>">
                                    <div class="card border-0 me-2 underline-hover">
                                        <img class="border" src="../seller/assets/upload/<?php echo $result_select3["image1"];?>" height="180px">
                                        <div class="card-body ps-0 pe-0">
                                            <div class="d-flex mt-2">
                                                <img src="./assets/upload/<?php echo $result_select1_clone['image'];?>"
                                                    class="w-25 rounded-pill">
                                                <h6 class="card-text mt-1 ms-2 me-5"><?php echo $result_select1_clone['fname'];?></h6>
                                            </div>
                                            <p class="mt-2 mb-2"><?php echo $result_select1["title"];?></p>
                                            <?php if($result_select4>0){?>
                                                <p class="mb-2">
                                                    <?php if($result_data["averageRating"]!=0){?>
                                                        <i class="fa-solid fa-star"></i>
                                                    <?php echo round($result_data["averageRating"],1).' ('.$count.')';}?>
                                                </p>
                                            <?php }?>
                                            <h5 class="mb-2">From $<?php echo $result_select2["price1"];?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-4 productphotographers">
            <div class="container">
                <div class="row mb-4 pt-1">
                    <div class="col p-0 text-center text-lg-start">
                        <h4 class="fw-bold">Gigs you may like</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-4 pb-0">
                        <div class="logos-slider slider">
                        <?php
                            $select1 = "SELECT * FROM `gigs` ORDER BY rand()";
                            $select_result1 = mysqli_query($connection, $select1); 
                            while($result_select1 = mysqli_fetch_array($select_result1)){
                                $gig_id = $result_select1['id'];
                                $user_id = $result_select1['user_id'];
                                $select1_clone = "SELECT * FROM `user_register` WHERE id=$user_id";
                                $select2 = "SELECT * FROM `price1` WHERE gig_id = $gig_id";
                                $select3 = "SELECT * FROM `gallery` WHERE gig_id = $gig_id";
                                $select4 = "SELECT AVG(rating) AS averageRating FROM ratings WHERE `gig_id`='$gig_id'";
                                $select5 = "SELECT count(*) As count FROM ratings WHERE `gig_id`='$gig_id'";
                                $select_result2 = mysqli_query($connection, $select2);
                                $select_result3 = mysqli_query($connection, $select3);
                                $select_result4 = mysqli_query($connection,$select4);
                                $select_result5 = mysqli_query($connection,$select5);
                                $select_result1_clone = mysqli_query($connection, $select1_clone);
                                $result_select2 = mysqli_fetch_array($select_result2);
                                $result_select3 = mysqli_fetch_array($select_result3);
                                $result_select1_clone = mysqli_fetch_array($select_result1_clone);
                                $result_select4 = mysqli_num_rows($select_result4);
                                while($result_select5 = mysqli_fetch_assoc($select_result5)){
                                    $count=$result_select5['count'];
                                }
                                $result_data = mysqli_fetch_array($select_result4);
                        ?>
                            <div class="slide">
                                <a class="text-reset text-decoration-none" href="product.php?id=<?php echo $result_select1["id"];?>">
                                    <div class="card border-0 me-2 underline-hover">
                                        <img class="border" src="../seller/assets/upload/<?php echo $result_select3["image1"];?>" height="180px">
                                        <div class="card-body ps-0 pe-0">
                                            <div class="d-flex mt-2">
                                                <img src="./assets/upload/<?php echo $result_select1_clone['image'];?>"
                                                    class="w-25 rounded-pill">
                                                <h6 class="card-text mt-1 ms-2 me-5"><?php echo $result_select1_clone['fname'];?></h6>
                                            </div>
                                            <p class="mb-2 mt-2"><?php echo $result_select1["title"];?></p>
                                            <?php if($result_select4>0){?>
                                                <p class="mb-2">
                                                    <?php if($result_data["averageRating"]!=0){?>
                                                    <i class="fa-solid fa-star"></i>
                                                    <?php echo round($result_data["averageRating"],1).' ('.$count.')';}?></p>
                                            <?php }?>
                                            <h5 class="mt-2 mb-0">From $<?php echo $result_select2["price1"];?></h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include "footer.php"; ?>
</body>

</html>