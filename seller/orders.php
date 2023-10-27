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
    <title>Index</title>
    <?php include "links.php"; ?>
</head>

<body>
    <?php include "header.php"; ?>

    <main class="profilebg">
        <section>
            <div class="container-fluid p-2 d-none d-lg-block">
                <div class="row">
                    <div class="col">
                        <h1 class="display-6">ORDERS</h1>
                        <div class="mt-5">
                            <p class="mb-0">YOUR ORDERS</p>
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                    $select_orders = "SELECT * FROM `orders`";
                                    $result_orders = mysqli_query($connection, $select_orders);
                                    $session_orders = mysqli_num_rows($result_orders);

                                    if($session_orders > 0){?>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Buyer</th>
                                            <th scope="col">Gig</th>
                                            <th scope="col">Placed on</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while($result = mysqli_fetch_array($result_orders)){ 
                                            $order_gig_id = $result['gig_id'];
                                            $user_id = $result['user_id'];
                                            $id = $result['id'];
                                            $select2 = "SELECT * FROM `user_register` WHERE id=$user_id";
                                            $select_result2 = mysqli_query($connection, $select2);
                                            $user_row = mysqli_fetch_assoc($select_result2);
                                            $select3 = "SELECT * FROM `gigs` WHERE id=$order_gig_id";
                                            $select_result3 = mysqli_query($connection, $select3);
                                            $gig_row = mysqli_fetch_assoc($select_result3);
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <a class="text-reset text-decoration-none" href="product.php?id=<?php echo $id;?>">
                                                    <?php echo $user_row['fname'];?>
                                                </a>
                                            </th>
                                            <td>
                                                <a class="text-reset text-decoration-none" href="product.php?id=<?php echo $id;?>">
                                                    <?php echo $gig_row['title'];?>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="text-reset text-decoration-none" href="product.php?id=<?php echo $id;?>">
                                                    <?php echo $result['dated'];?>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="text-reset text-decoration-none" href="product.php?id=<?php echo $id;?>">
                                                    $<?php echo $result['price']*$result['quantity'];?>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="text-reset text-decoration-none" href="product.php?id=<?php echo $id;?>">
                                                    <?php echo $result['status'];?>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                  </table>
                                  <?php }else{?><h5 class="text-center p-5">No Orders have been placed yet.</h5><?php } ?>
                            </div>
                        </div>
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
        </section>
    </main>

    <?php include "footer.php"; ?>
</body>

</html>