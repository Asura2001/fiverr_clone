<?php
include 'connection.php';
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
   $select="SELECT * FROM `user_register` WHERE `email`='$googleEmail'";
   $run=mysqli_query($connection,$select);
   $row=mysqli_num_rows($run);
   if($row>0){
    ?>
    <script>
        alert('The Email is already in use.');
    </script>
    <?php
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
   }else{
     $insert="INSERT INTO `user_register`(`fname`, `email`) 
     VALUES ('$googleName','$googleEmail')";
     $result=mysqli_query($connection,$insert);
     if($result){
        session_start();
        $_SESSION['customer_id'] = mysqli_insert_id($connection); // Get the ID of the inserted user
        $_SESSION['fname'] = $googleName;
        $_SESSION['email'] = $googleEmail;
        $_SESSION['password'] = '';
                
        header("Location: main.php"); // Redirect to main page after successful registration
        exit();
     }else{
        ?>
        <script>
            alert('The Google Login was unsuccessful.');
        </script>
        <?php
     }
   }
  }
 }
}
if(isset($_POST['register'])){
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $insert_query = "INSERT INTO `user_register`(`fname`, `email`, `password`) 
    VALUES ('$fname','$email','$password')";

    $result_query = mysqli_query($connection, $insert_query);

    if($result_query){ 
        session_start();
        $_SESSION['customer_id'] = mysqli_insert_id($connection); // Get the ID of the inserted user
        $_SESSION['fname'] = $fname;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
                
        header("Location: main.php"); // Redirect to main page after successful registration
        exit();
    }else{
        echo "Registration unsuccessful.";
}}
?>

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
                    <div class="col-12 col-lg-6 ps-4 pe-4 mt-4 mt-lg-5">
                        <form class="mt-2 pt-lg-5" method="POST" enctype="multipart/form-data">
                            <h3 class="mb-3">Create a new Account</h3>
                            <p class="mb-4">Already have an account? <a href="signin.php" class="text-reset">Sign in</a>
                            </p>
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="fname" class="form-control" required
                                title="Please input your first name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required
                                title="Email must contain @gmail.com or a valid account">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="pass">
                                    <input type="password" name="password" class="form-control" 
                                        id="myInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                        title="Must contain at least one number and one uppercase and 
                                        lowercase letter, and at least 8 or more characters" required>
                                    <div class="showpass">
                                        <p class="mb-0" onclick="myFunction()">Show</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 mb-3">
                                <button type="submit" name="register" class="btn btn-success w-100">Register</button>
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
                            <?php if(!isset($_SESSION['access_token'])){?>
                                <div class="col-12 col-md-6 text-lg-start">
                                    <a href="<?php echo $google_client->createAuthUrl();?>" class="btn btn-google mt-3 mt-md-0 w-100">
                                        <i class="fa-brands fa-google-plus-g me-4"></i>Continue with Google
                                    </a>
                                </div>
                            <?php }?>
                        </div>
                        <div class="mt-5">
                            <p class="small fw-bold text-muted">By joining, you agree to the Fiverr 
                                <a class="text-muted" href="https://www.fiverr.com/terms_of_service?store=false">Terms of Service</a>
                                and to occasionally receive emails from us. Please read our 
                                <a class="text-muted" href="https://www.fiverr.com/privacy-policy?store=false">Privacy Policy</a> 
                                to learn how we use your personal data.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include "footer.php";?>
</body>

</html>