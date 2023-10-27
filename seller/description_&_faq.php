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
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
</head>

<body>
    <?php include "gigheader.php"; ?>

    <main class="profilebg">
        <section>
            <div class="container p-5 d-none d-lg-block">
                <div class="row">
                    <div class="col">
                        <h1 class="text-muted">Frequently Asked Questions</h1>
                        <hr>
                        <p>Add Questions & Answers for Your Buyers.</p>
                        <?php
                            if(isset($_POST["add"])){
                                $question = $_POST["question"];
                                $answer = $_POST["answer"];
                                $insert_query = "INSERT INTO `faq`(`user_id`, `gig_id`, `question`, `answer`) VALUES ('$id','$gig_id',
                                '$question','$answer')";
                                $result_query = mysqli_query($connection, $insert_query);

                                if($result_query){
                                    $redirect_url2 = "description_&_faq.php?id=" . $gig_id;
                                    echo "<script>window.location.href = '$redirect_url2'</script>";
                                }else{
                                    ?>
                                    <script>
                                        alert("Sorry, the data could not be updated.");
                                    </script>
                        <?php   } } ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="accordion mt-3" id="accordionExample">
                                <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-controls="collapseOne">
                                    <span class="fw-bold text-success">+ Add FAQ</span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <label for="question" class="form-label">Add a question</label>
                                        <input type="text" name="question" class="form-control mb-3"
                                        placeholder="i.e. Do you translate to English as well" required>
                                        <label for="answer" class="form-label">Add an Answer</label>
                                        <input type="text" name="answer" class="form-control mb-3"
                                        placeholder="i.e. Yes, I also translate from English to Hebrew" required>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" name="add" class="btn btn-dark fw-bold ps-4 pe-4">
                                                Add</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                            
                            <?php
                                $select_faq = "SELECT * FROM `faq` WHERE user_id=$id AND gig_id=$gig_id";
                                $result_faq = mysqli_query($connection, $select_faq);

                                while($data = mysqli_fetch_array($result_faq)){
                                    $faq_id = $data['id'];?>
                                <div class="accordion mt-3" id="accordionExample">
                                    <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne<?php echo $faq_id;?>">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?php echo $faq_id;?>" aria-controls="collapseOne<?php echo $faq_id;?>">
                                        <b><?php echo $data['question'];?></b>
                                        </button>
                                    </h2>
                                    <div id="collapseOne<?php echo $faq_id;?>" class="accordion-collapse collapse" aria-labelledby="headingOne<?php echo $faq_id;?>" data-bs-parent="#accordionExample">
                                        <form action="updatefaq.php?id=<?php echo $faq_id;?>" method="POST" enctype="multipart/form-data">
                                            <div class="accordion-body">
                                                <label for="question" class="form-label">Add a question</label>
                                                <input type="text" name="question" class="form-control mb-3" value="<?php echo $data['question'];?>"
                                                placeholder="i.e. Do you translate to English as well" required>
                                                <label for="answer" class="form-label">Add an Answer</label>
                                                <input type="text" name="answer" class="form-control mb-3"  value="<?php echo $data['answer'];?>"
                                                placeholder="i.e. Yes, I also translate from English to Hebrew" required>
                                                <input type="hidden" value=<?php echo $gig_id;?> name="gig_id">
                                                <div class="d-flex justify-content-between">
                                                    <a href="deletefaq.php?id=<?php echo $faq_id;?>" class="btn btn-danger">Delete</a>
                                                    <div>
                                                        <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" name="update_faq" class="btn btn-dark fw-bold ps-4 pe-4">
                                                            Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            <?php }?>
                        <hr class="mt-5">
                    </div>
                </div>

                <?php
                $select_query = "SELECT * FROM `gigs` WHERE user_id = $id AND id=$gig_id";
                $result_query = mysqli_query($connection, $select_query);
                $session_query = mysqli_fetch_assoc($result_query);
                $description = $session_query['description'];

                if(isset($_POST["update"])){
                    $description = $_POST["description"];
                    $update_query = "UPDATE `gigs` SET `description`='$description' WHERE id=$gig_id AND user_id=$id";
                    $result = mysqli_query($connection, $update_query);

                    if($result){
                        $redirect_url = "requirements.php?id=" . $gig_id;
                        echo "<script>window.location.href = '$redirect_url';</script>";
                    }else{
                        ?>
                        <script>
                            alert("Sorry, the data could not be updated.");
                        </script>
                        <?php
                    }
                } ?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mt-5">
                        <div class="col">
                            <h1 class="mb-4 text-muted">Description</h1>
                            <hr>
                            <p class="text-muted">Briefly Describe Your Gig</p>
                            <textarea id="editor" class="form-control resize" name="description"
                            rows="10" maxlength="1200"><?php echo($description);?></textarea>
                            <p class="small text-muted fw-bold text-end mt-2">Maximum length 1200 characters.</p>
                            <hr class="mt-5">
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="mt-3">
                            <button type="submit" name="update" class="btn btn-dark btn-lg">Update & Continue</button>
                        </div>
                        <div class="mt-3">
                            <a class="text-success text-decoration-none" href="./pricing.php">Back</a>
                        </div>
                    </div>
                </form>
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
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
                .then( editor => {
                    console.log( editor );
            } )
                .catch( error => {
                    console.error( error );
            } );
    </script>
</body>

</html>