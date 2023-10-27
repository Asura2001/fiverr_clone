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
    <?php include "header.php"; ?>

    <main class="profilebg">
        <section>
            <div class="container-fluid p-2 d-none d-lg-block">
                <div class="row">
                    <div class="col">
                        <h1 class="display-6">Gigs</h1>
                        <div class="d-flex justify-content-between mt-5">
                            <p class="mb-0">YOUR GIGS</p>
                            <a class="btn btn-greenshadow btn-sm" href="./general.php">CREATE A NEW GIG</a>
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                    $select_gigs = "SELECT * FROM `gigs` WHERE user_id = $id";
                                    $result_gigs = mysqli_query($connection, $select_gigs);
                                    $session_gigs = mysqli_num_rows($result_gigs);

                                    if($session_gigs > 0){?>
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Gigs</th>
                                            <th scope="col">Orders</th>
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while($result = mysqli_fetch_array($result_gigs)){ ?>
                                        <tr>
                                            <th scope="row"><?php echo $result['id']; ?></th>
                                            <td><?php echo $result['title']; ?></td>
                                            <td>0</td>
                                            <td>
                                                <a class="text-reset" href="general2.php?id=<?php echo $result['id'];?>">
                                                    <i class="fa fa-pencil fs-4"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a class="text-reset" href="delete.php?id=<?php echo $result['id'];?>">
                                                    <i class="fa fa-trash fs-4"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                  </table>
                                  <?php }else{?><h5 class="text-center p-5">No Gigs created yet.</h5><?php } ?>
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