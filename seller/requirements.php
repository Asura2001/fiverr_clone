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
$gig_id = $_GET['id']?>

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
            <div class="container p-5 d-none d-lg-block">
                <div class="card">
                    <div class="row p-4 card-body">
                        <div class="col">
                            <h5>Get all the information you need from buyers to get started</h5>
                            <p class="mb-0 text-muted">Add questions to help buyers provide you with exactly
                                what you need to start working on their order.</p>
                            <div class="hr-width d-flex justify-content-around mt-3 mb-3">
                                <hr class="width">
                                <p class="smaller fw-bold text-muted pt-2">FIVERR QUESTIONS</p>
                                <hr class="width">
                            </div>
                            <p class="mb-0 text-muted">These optional questions will be added for all buyers.</p>
                            <div class="card m-2">
                                <div class="card-body shadow">
                                    <h6 class="card-text mb-0">1. Is this order for personal use, business use, or a
                                        side project?</h6>
                                    <p class="card-text">For business / personal / side project</p>
                                </div>
                            </div>
                            <div class="card m-2 mt-4 shadow">
                                <div class="card-body">
                                    <h6 class="card-text mb-0">2. Which industry do you work in?</h6>
                                    <p class="card-text">3D design, e-commerce, accounting, marketing, etc.</p>
                                </div>
                            </div>
                            <div class="card m-2 mt-4 shadow">
                                <div class="card-body">
                                    <h6 class="card-text mb-0">3. Is this order part of a bigger project you're working
                                        on?</h6>
                                    <p class="card-text">Building a mobile app, creating an animation, developing a
                                        game, etc.</p>
                                </div>
                            </div>
                            <div class="hr-width mt-5 d-flex justify-content-around">
                                <hr class="width">
                                <p class="smaller fw-bold text-muted pt-2">YOUR QUESTIONS</p>
                                <hr class="width">
                            </div>
                            <p class="small text-muted mt-3">Here’s where you can request any details needed to complete
                                the order.<br>
                                There’s no need to repeat any of the general questions asked above by Fiverr.</p>
                            <?php
                            $select_req = "SELECT * FROM `requirements` WHERE user_id=$id AND gig_id=$gig_id";
                            $result_req = mysqli_query($connection, $select_req);

                            while($data = mysqli_fetch_array($result_req)){
                                $req_id = $data['id'];?>
                            <div class="card m-2 mt-3">
                                <div class="card-body shadow d-flex justify-content-between">
                                    <div class="mt-3">
                                        <h6 class="card-text mb-0"><?php echo $data['question'];?></h6>
                                    </div>
                                    <div class="text-end mt-3">
                                        <a class="btn btn-outline-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?php echo $req_id;?>"><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-outline-primary" href="deletereq.php?id=<?php echo $req_id;?>"><i class="fa fa-trash"></i></a>
                                        <?php
                                            if(isset($_POST["update"])){
                                                $question = $_POST["question"];
                                                $form = $_POST["form"];
                                                $update_query = "UPDATE `requirements` SET `question`='$question' 
                                                WHERE id=$req_id";
                                                $result_query = mysqli_query($connection, $update_query);

                                                if($result_query){
                                                    $redirect_url2 = "requirements.php?id=" . $gig_id;
                                                    echo "<script>window.location.href = '$redirect_url2'</script>";
                                                }else{
                                                    ?>
                                                    <script>
                                                        alert("Sorry, the data could not be updated.");
                                                    </script>
                                        <?php   } } ?>
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="modal fade" id="exampleModal<?php echo $req_id;?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel<?php echo $req_id;?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                                    <div class="modal-content container p-4">
                                                        <div class="modal-header row justify-content-between">
                                                            <div class="col-8">
                                                                <h4 class="modal-title fw-bold" id="exampleModalLabel2">Update
                                                                    Questions</h4>
                                                            </div>
                                                            <div class="col-2 text-end">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body ps-0 pe-0 mt-1 mb-2">
                                                            <label for="question" class="form-label fw-bold">Update the question</label>
                                                            <input type="text" name="question" class="form-control mb-3" value="<?php echo $data['question'];?>"
                                                            placeholder="Request necessary details such as dimensions and more.">
                                                        </div>
                                                        <div class="modal-footer text-end">
                                                            <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" name="update"
                                                                class="btn btn-dark fw-bold ps-4 pe-4">
                                                            Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <a class="btn btn-outline-primary fw-bold mt-4" data-bs-toggle="modal"
                                data-bs-target="#exampleModal3">+ Add New Question</a>
                                <?php
                                if(isset($_POST["add"])){
                                    $question = $_POST["question"];
                                    $insert_query = "INSERT INTO `requirements`(`gig_id`, `question`) 
                                    VALUES ('$gig_id','$question')";
                                    $result_query = mysqli_query($connection, $insert_query);

                                    if($result_query){
                                        $redirect_url = "requirements.php?id=" . $gig_id;
                                        echo "<script>window.location.href = '$redirect_url'</script>";
                                    }else{
                                        ?>
                                        <script>
                                            alert("Sorry, the data could not be updated.");
                                        </script>
                            <?php   } } ?>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="modal fade" id="exampleModal3" tabindex="-1"
                                    aria-labelledby="exampleModalLabel3" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                        <div class="modal-content container p-4">
                                            <div class="modal-header row justify-content-between">
                                                <div class="col-8">
                                                    <h4 class="modal-title fw-bold" id="exampleModalLabel2">Adding
                                                        Questions</h4>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <div class="modal-body ps-0 pe-0 mt-1 mb-2">
                                                <label for="question" class="form-label fw-bold">Add a question</label>
                                                <input type="text" name="question" class="form-control mb-3"
                                                    placeholder="Request necessary details such as dimensions and more.">
                                            </div>
                                            <div class="modal-footer text-end">
                                                <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" name="add"
                                                    class="btn btn-dark fw-bold ps-4 pe-4">
                                                    Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-end mt-3">
                    <div>
                        <a class="btn btn-dark btn-lg" href="gallery.php?id=<?php echo $gig_id;?>">Update & Continue</a>
                    </div>
                    <div>
                        <a class="text-success text-decoration-none" href="./description_&_faq.php">Back</a>
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