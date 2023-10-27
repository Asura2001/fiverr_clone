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
$gig_id = $_GET['id']; ?>

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
    <?php include "gigheader.php"; ?>

    <main class="profilebg">
        <section>
        <?php
            $select_gallery = "SELECT * FROM `gallery` WHERE `user_id`='$id' AND `gig_id`='$gig_id'";
            $result_gallery = mysqli_query($connection, $select_gallery);
            $rows_gallery = mysqli_num_rows($result_gallery);

            if($rows_gallery > 0){
                $session_gallery = mysqli_fetch_assoc($result_gallery);
                    $image1=$session_gallery['image1']; $image2=$session_gallery['image2']; $image3=$session_gallery['image3'];
                    $video=$session_gallery['video']; $document1=$session_gallery['document1']; $document2=$session_gallery['document2'];

                if(isset($_POST['update'])){
                    if(!empty($_FILES['image1']['name'])){
                        $image1 = $_FILES['image1'];
                        $filename1 = $image1["name"];
                        move_uploaded_file($image1["tmp_name"],'./assets/upload/'.$filename1);
                    }else{
                        $filename1=$image1;
                    }

                    if(!empty($_FILES['image2']['name'])){
                        $image2 = $_FILES['image2'];
                        $filename2 = $image2["name"];
                        move_uploaded_file($image2["tmp_name"],'./assets/upload/'.$filename2);
                    }else{
                        $filename2=$image2;
                    }

                    if(!empty($_FILES['image3']['name'])){
                        $image3 = $_FILES['image3'];
                        $filename3 = $image3["name"];
                        move_uploaded_file($image3["tmp_name"],'./assets/upload/'.$filename3);
                    }else{
                        $filename3=$image3;
                    }

                    if(!empty($_FILES['video']['name'])){
                        $video = $_FILES['video'];
                        $filename4 = $video["name"];
                        move_uploaded_file($video["tmp_name"],'./assets/upload/'.$filename4);
                    }else{
                        $filename4=$video;
                    }

                    if(!empty($_FILES['document1']['name'])){
                        $document1 = $_FILES['document1'];
                        $filename5 = $document1["name"];
                        move_uploaded_file($document1["tmp_name"],'./assets/upload/'.$filename5);
                    }else{
                        $filename5=$document1;
                    }

                    if(!empty($_FILES['document2']['name'])){
                        $document2 = $_FILES['document2'];
                        $filename6 = $document2["name"];
                        move_uploaded_file($document2["tmp_name"],'./assets/upload/'.$filename6);
                    }else{
                        $filename6=$document2;
                    }

                    $update_gallery = "UPDATE `gallery` SET `user_id`='$id',
                    `gig_id`='$gig_id',`image1`='$filename1',`image2`='$filename2',`image3`='$filename3',
                    `video`='$filename4',`document1`='$filename5',`document2`='$filename6' WHERE user_id=$id AND gig_id=$gig_id";

                    $result_gallery = mysqli_query($connection, $update_gallery);
                    if($result_gallery){
                        $redirect_url="publish.php?id=" . $gig_id;
                        echo "<script>window.location.href='$redirect_url';</script>";
                    }else{
                        echo"<script>alert('Sorry, the data could not be updated.')</script>";
                    }
                }
            }else{
                if(isset($_POST['save'])){
                    $image1 = $_FILES['image1'];
                    $filename1 = $image1["name"];
                    move_uploaded_file($image1["tmp_name"],'./assets/upload/'.$filename1);

                    $image2 = $_FILES['image2'];
                    $filename2 = $image2["name"];
                    move_uploaded_file($image2["tmp_name"],'./assets/upload/'.$filename2);

                    $image3 = $_FILES['image3'];
                    $filename3 = $image3["name"];
                    move_uploaded_file($image3["tmp_name"],'./assets/upload/'.$filename3);

                    $video = $_FILES['video'];
                    $filename4 = $video["name"];
                    move_uploaded_file($video["tmp_name"],'./assets/upload/'.$filename4);

                    $document1 = $_FILES['document1'];
                    $filename5 = $document1["name"];
                    move_uploaded_file($document1["tmp_name"],'./assets/upload/'.$filename5);
                    
                    $document2 = $_FILES['document2'];
                    $filename6 = $document2["name"];
                    move_uploaded_file($document2["tmp_name"],'./assets/upload/'.$filename6);

                    $insert_gallery = "INSERT INTO `gallery`(`user_id`, `gig_id`, `image1`, `image2`, 
                    `image3`, `video`, `document1`, `document2`) VALUES ('$id','$gig_id','$filename1','$filename2',
                    '$filename3','$filename4','$filename5','$filename6')";

                    $result_gallery = mysqli_query($connection, $insert_gallery);
                    if($result_gallery){
                        $redirect_url="publish.php?id=" . $gig_id;
                        echo "<script>window.location.href='$redirect_url';</script>";
                    }else{
                        echo"<script>alert('Sorry, the data could not be changed.')</script>";
                    }
                }
            } ?>
            <form method="POST" enctype="multipart/form-data" class="d-none d-lg-block">
                <div class="container p-5">
                    <div class="row">
                        <div class="col">
                            <h1>Showcase Your Services In A Gig Gallery</h1>
                            <p>Encourage buyers to choose your Gig by featuring a variety of your work.</p>
                            <div class="bg-light rounded p-4 d-flex">
                                <i class="fa-solid fa-circle-info mt-1"></i>
                                <p class="mb-0 ms-3">To comply with Fiverr’s terms of service, make sure to upload only
                                    content you either own or you have the permission or license to use.</p>
                            </div>
                            <hr class="mt-4">
                        </div>
                    </div>

                    <div class="row">
                        <h4 class="mb-1">Images (up to 3)</h4>
                        <p class="mb-5">Get noticed by the right buyers with visual examples of your services.</p>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center removebuttonholder1">
                                    <!-- Use a div to wrap the image, label, and remove icon -->
                                    <img src="<?php echo($rows_gallery > 0) ? './assets/upload/'.$image1 : '#';?>" 
                                    id="selectedImage1" class="<?php echo($rows_gallery > 0) ? '' : 'd-none';?> img-fluid selectedImage1">
                                        <!-- Add an icon for removing the selected image -->
                                        <span id="removebutton1" class="<?php echo($rows_gallery > 0) ? '' : 'd-none';?> removebutton1 rounded">
                                            <i class="fas fa-trash-alt text-light gigimage p-3"></i>
                                        </span>
                                    <div id="imageUploadWrapper1" <?php echo($rows_gallery > 0) ? 'style="display: none;"' : '';?>>
                                        <!-- Display the selected image or a placeholder -->
                                        <img src="./assets/images/image.png" class="rounded m-4" width="60px"><br>
                                        <label class="gigimage text-primary mb-2">
                                            Browse an image
                                            <input type="file" name="image1" class="form-control d-none" 
                                            accept="image/*" id="imageInput1">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center removebuttonholder2">
                                    <!-- Use a div to wrap the image, label, and remove icon -->
                                    <img src="<?php echo($rows_gallery > 0) ? './assets/upload/'.$image2 : '#';?>" 
                                    id="selectedImage2" class="<?php echo($rows_gallery > 0) ? '' : 'd-none';?> img-fluid selectedImage2">
                                        <!-- Add an icon for removing the selected image -->
                                        <span id="removebutton2" class="<?php echo($rows_gallery > 0) ? '' : 'd-none';?> removebutton2 rounded">
                                            <i class="fas fa-trash-alt text-light gigimage p-3"></i>
                                        </span>
                                    <div id="imageUploadWrapper2" <?php echo($rows_gallery > 0) ? 'style="display: none;"' : '';?>>
                                        <!-- Display the selected image or a placeholder -->
                                        <img src="./assets/images/image.png" class="rounded m-4" width="60px"><br>
                                        <label class="gigimage text-primary mb-2">
                                            Browse an image
                                            <input type="file" name="image2" class="form-control d-none" 
                                            accept="image/*" id="imageInput2">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center removebuttonholder3">
                                    <!-- Use a div to wrap the image, label, and remove icon -->
                                    <img src="<?php echo($rows_gallery > 0) ? './assets/upload/'.$image3 : '#';?>" 
                                    id="selectedImage3" class="<?php echo($rows_gallery > 0) ? '' : 'd-none';?> img-fluid selectedImage3">
                                        <!-- Add an icon for removing the selected image -->
                                        <span id="removebutton3" class="<?php echo($rows_gallery > 0) ? '' : 'd-none';?> removebutton3 rounded">
                                            <i class="fas fa-trash-alt text-light gigimage p-3"></i>
                                        </span>
                                    <div id="imageUploadWrapper3" <?php echo($rows_gallery > 0) ? 'style="display: none;"' : '';?>>
                                        <!-- Display the selected image or a placeholder -->
                                        <img src="./assets/images/image.png" class="rounded m-4" width="60px"><br>
                                        <label class="gigimage text-primary mb-2">
                                            Browse an image
                                            <input type="file" name="image3" class="form-control d-none" 
                                            accept="image/*" id="imageInput3">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4">
                    </div>
                    
                    <div class="row mt-1">
                        <h4 class="mb-1">Video (only one)</h4>
                        <p class="mb-0">Capture buyers' attention with a video that showcases your service.</p>
                        <p class="small mb-5">Please choose a video shorter than 75 seconds and smaller than 50MB</p>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center removebuttonholder4">
                                    <!-- Use a div to wrap the image, label, and remove icon -->
                                    <video src="<?php echo($rows_gallery > 0) ? './assets/upload/'.$video : '#';?>" 
                                    id="selectedImage4" class="<?php echo($rows_gallery > 0) ? '' : 'd-none';?> img-fluid selectedImage4"></video>
                                        <!-- Add an icon for removing the selected image -->
                                        <span id="removebutton4" class="<?php echo($rows_gallery > 0) ? '' : 'd-none';?> removebutton4 rounded">
                                            <i class="fas fa-trash-alt text-light gigimage p-3"></i>
                                        </span>
                                    <div id="imageUploadWrapper4" <?php echo($rows_gallery > 0) ? 'style="display: none;"' : '';?>>
                                        <!-- Display the selected image or a placeholder -->
                                        <img src="./assets/images/video.png" class="rounded m-4" width="60px"><br>
                                        <label class="gigimage text-primary mb-2">
                                            Browse a video
                                            <input type="file" name="video" class="form-control d-none" 
                                            accept="video/*" id="imageInput4">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4">
                    </div>

                    <div class="row mt-1">
                        <h4 class="mb-1">Documents (upto two)</h4>
                        <p class="mb-5">Show some of the best work you created in a document (PDFs only).</p>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center removebuttonholder5">
                                    <!-- Use a div to wrap the image, label, and remove icon -->
                                    <embed src="<?php echo($rows_gallery > 0) ? './assets/images/pdf_done.png' : '#';?>" 
                                    id="selectedImage5" class="<?php echo($rows_gallery > 0) ? '' : 'd-none';?> img-fluid selectedImage5">
                                        <!-- Add an icon for removing the selected image -->
                                        <span id="removebutton5" class="<?php echo($rows_gallery > 0) ? '' : 'd-none';?> removebutton5 rounded">
                                            <i class="fas fa-trash-alt text-light gigimage p-3"></i>
                                        </span>
                                    <div id="imageUploadWrapper5" <?php echo($rows_gallery > 0) ? 'style="display: none;"' : '';?>>
                                        <!-- Display the selected image or a placeholder -->
                                        <img src="./assets/images/pdf.png" class="rounded m-4" width="60px"><br>
                                        <label class="gigimage text-primary mb-2">
                                            Browse a PDF
                                            <input type="file" name="document1" class="form-control d-none" 
                                            accept="pdf/*" id="imageInput5">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center removebuttonholder6">
                                    <!-- Use a div to wrap the image, label, and remove icon -->
                                    <embed src="<?php echo($rows_gallery > 0) ? './assets/images/pdf_done.png' : '#';?>" 
                                    id="selectedImage6" class="<?php echo($rows_gallery > 0) ? '' : 'd-none';?> img-fluid selectedImage6">
                                        <!-- Add an icon for removing the selected image -->
                                        <span id="removebutton6" class="<?php echo($rows_gallery > 0) ? '' : 'd-none';?> removebutton6 rounded">
                                            <i class="fas fa-trash-alt text-light gigimage p-3"></i>
                                        </span>
                                    <div id="imageUploadWrapper6" <?php echo($rows_gallery > 0) ? 'style="display: none;"' : '';?>>
                                        <!-- Display the selected image or a placeholder -->
                                        <img src="./assets/images/pdf.png" class="rounded m-4" width="60px"><br>
                                        <label class="gigimage text-primary mb-2">
                                            Browse a PDF
                                            <input type="file" name="document2" class="form-control d-none" 
                                            accept="PDF/*" id="imageInput6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4">
                    </div>
                    <div class="text-end">
                        <?php if($rows_gallery > 0){ ?>
                        <div class="mt-3">
                            <button type="submit" name="update" class="btn btn-dark btn-lg">Update & Continue</button>
                        </div>
                        <?php }else{ ?>
                        <div class="mt-3">
                            <button type="submit" name="save" class="btn btn-dark btn-lg">Save & Continue</button>
                        </div>
                        <?php } ?>
                        <div class="mt-3">
                            <a class="text-success text-decoration-none" href="./requirements.php">Back</a>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
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