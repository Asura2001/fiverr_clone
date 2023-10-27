<?php
session_start();
include('connection.php');
if(isset($_POST['login'])){
    $email= mysqli_real_escape_string($connection, $_POST['email']);
    $password= mysqli_real_escape_string($connection, $_POST['password']);

    $select_query = "SELECT * FROM `seller_register` WHERE `email`='$email' AND `password`='$password'";

    $result_query = mysqli_query($connection, $select_query);
    $session_query = mysqli_num_rows($result_query);

   if($session_query > 0){

    $session = mysqli_fetch_assoc($result_query);
    $_SESSION['seller_id'] = $session['id'];
    $_SESSION['fname'] = $session['fname'];
    $_SESSION['lname'] = $session['lname'];
    $_SESSION['email'] = $session['email'];
    $_SESSION['password'] = $session['password'];
    $_SESSION['image'] = $session['image'];
    $_SESSION['d_name'] = $session['d_name'];
    $_SESSION['title'] = $session['title'];
    $_SESSION['description'] = $session['description'];
    $_SESSION['occupation'] = $session['occupation'];
    $_SESSION['phone'] = $session['phone'];

    ?>
    <script>
//        alert("Login Successful");
        window.location.href = "main.php";
    </script>
    <?php } else{ ?>
    <script>
        alert("Email or password are incorrect.");
    </script>
    <?php }} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiverr - Freelance Services Marketplace</title>
    <?php include "links.php"; ?>
</head>

<body>
    <?php include "header.php"; ?>

    <main class="mt-5 pt-5">
        <section>
            <div class="container">
                <div class="row border rounded">
                    <div class="col-6 p-0 register-text-holder">
                        <img src="./assets/images/registerimage.png" class="img-fluid rounded">
                        <div class="register-text text-white">
                            <h1 class="mb-4">Success Starts here</h1>
                            <h5 class="mb-3">&check; Over 600 categories</h5>
                            <h5 class="mb-3">&check; Pay per project, not per hour</h5>
                            <h5 class="mb-3">&check; Access to talent and businesses across the globe</h5>
                        </div>
                    </div>
                    <div class="col-6 ps-4 pe-4 mt-5">
                        <form class="mt-5 pt-5" method="POST" enctype="multipart/form-data">
                            <h3 class="mb-3">Sign in to your Account</h3>
                            <p class="mb-4">Don't have an Account? <a href="register.php" class="text-reset">Join here</a>
                            </p>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="pass">
                                    <input type="password" name="password" class="form-control" id="myInput">
                                    <div class="showpass">
                                        <p class="mb-0" onclick="myFunction()">Show</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 mb-3">
                                <button type="submit" name="login" class="btn btn-success w-100">Login</button>
                            </div>
                        </form>
                        <div class="d-flex text-muted justify-content-around hr-width">
                            <hr class="width"> <span class="pt-1">OR</span> <hr class="width">
                        </div>
                        <div class="mt-4 mb-3 text-center">
                            <button class="btn btn-facebook ps-3 pe-3 me-1"><i
                                    class="fa-brands fa-facebook-f me-4"></i>Continue with Facebook</button>
                            <button class="btn btn-google ps-3 pe-4 ms-1"><i
                                    class="fa-brands fa-google-plus-g me-4"></i>Continue with Google</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include "footer.php"; ?>
</body>

</html>