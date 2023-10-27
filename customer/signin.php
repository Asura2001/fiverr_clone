<?php
include 'connection.php';
if(isset($_POST['login'])){
    $email= mysqli_real_escape_string($connection, $_POST['email']);
    $password= mysqli_real_escape_string($connection, $_POST['password']);

    $select_query = "SELECT * FROM `user_register` WHERE `email`='$email' AND `password`='$password'";
    $result_query = mysqli_query($connection, $select_query);
    $session_query = mysqli_num_rows($result_query);
    if($session_query > 0){
        session_start();
        $session = mysqli_fetch_assoc($result_query);
        $_SESSION['customer_id'] = $session['id'];
        $_SESSION['fname'] = $session['fname'];
        $_SESSION['email'] = $session['email'];
        $_SESSION['password'] = $session['password'];

        header("Location: main.php"); // Redirect to main page after successful login
        exit();
    } else {
        echo "Email or password is incorrect.";
    }
}

include('config.php');
$login_button = '';
if(isset($_GET["code"]))
{
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
 if(!isset($token['error']))
 {
  $google_client->setAccessToken($token['access_token']);
  $_SESSION['access_token'] = $token['access_token'];
  $google_service = new Google_Service_Oauth2($google_client);
  $data = $google_service->userinfo->get();
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
   $googleName=$data['given_name'];
  }
  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }
  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
   $googleEmail=$data['email'];
  }
  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }
  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
  if(isset($_SESSION['access_token']))
  {
    $select = "SELECT * FROM `user_register` WHERE `email`='$googleEmail'";
    $result = mysqli_query($connection, $select);
    $session = mysqli_num_rows($result);
    if($session > 0){
        $session = mysqli_fetch_assoc($result);
        $_SESSION['customer_id'] = $session['id'];
        $_SESSION['fname'] = $session['fname'];
        $_SESSION['email'] = $session['email'];
        $_SESSION['password'] = $session['password'];

        header("Location: main.php");
        exit();
    }
  }
 }
}
if(isset($_SESSION['customer_id'])){
    ?>
    <script>
        window.location.href = "main.php";
    </script>
<?php }?>

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
                    <div class="col-6 p-0 register-text-holder d-none d-lg-block">
                        <img src="./assets/images/registerimage.png" class="img-fluid rounded">
                        <div class="register-text text-white">
                            <h1 class="mb-4">Success Starts here</h1>
                            <h5 class="mb-3">&check; Over 600 categories</h5>
                            <h5 class="mb-3">&check; Pay per project, not per hour</h5>
                            <h5 class="mb-3">&check; Access to talent and businesses across the globe</h5>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 ps-4 pe-4 mt-5">
                        <form class="mt-lg-5 pt-lg-5" method="POST" enctype="multipart/form-data">
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
                        <div class="row mt-4 mb-3">
                            <div class="col-12 col-md-6 text-lg-end">
                                <button class="btn btn-facebook w-100"><i
                                    class="fa-brands fa-facebook-f me-4"></i>Continue with Facebook</button>
                            </div>
                            <div class="col-12 col-md-6 text-lg-start">
                                <a href="<?php echo $google_client->createAuthUrl();?>" class="btn btn-google mt-3 mt-md-0 w-100"><i
                                    class="fa-brands fa-google-plus-g me-4"></i>Continue with Google</a>
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