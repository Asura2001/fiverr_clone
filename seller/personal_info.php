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
   }
} else{ ?>
<script>
    window.location.href = "../customer/signin.php";
</script>
<?php } ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Info</title>
    <?php include "links.php"; ?>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="d-flex d-lg-block justify-content-around">
                        <a href="../customer/index.php">
                            <img src="./assets/images/icons8-fiverr-50.png" class="ms-0 ms-lg-5 mt-4 mb-2">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row border-top border-bottom d-none d-lg-block">
                <div class="col">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link text-muted active" aria-current="page" href="./personal_info.php">
                                <i class="fa-solid fa-1 text-white bg-dark rounded-pill p-2 me-1"></i>
                                Personal Info <i class="fa-solid fa-chevron-right ms-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted ps-2" href="./professional_info.php">
                                <i class="fa-solid fa-2 text-white bg-dark rounded-pill p-2 me-1"></i>
                                Professional Info <i class="fa-solid fa-chevron-right ms-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted ps-2" href="./linked_accounts.php">
                                <i class="fa-solid fa-3 text-white bg-dark rounded-pill p-2 me-1"></i>
                                Linked Accounts <i class="fa-solid fa-chevron-right ms-3"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted ps-2" href="./account_security.php">
                                <i class="fa-solid fa-4 text-white bg-dark rounded-pill p-2 me-1"></i>Account
                                Security</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section>
            <div class="container-fluid">
                <div class="row mt-5 border-bottom">
                    <div class="col text-muted">
                        <h1 class="display-3 display-lg-6 fw-bold">Personal Info</h1>
                        <p class="mt-3 d-none d-lg-block">Tell us a bit about yourself. This information will appear 
                            on your<br>public profile, so that potential buyers can get to know you better.</p>
                        <p class="text-end fw-bold"><i>* Mandatory fields</i></p>
                    </div>
                </div>

                    <div class="row mt-5 pt-5">
                        <div class="col-12 col-lg-3">
                            <p class="fs-5">Languages<span class="text-danger">*</span></p>
                        </div>

                        <div class="col-12 col-lg-6">
                            <table class="table border">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col text-muted">Language</th>
                                        <th scope="col text-muted">Level</th>
                                        <th scope="col text-muted">
                                            <a class="btn text-success fw-bold p-0" data-bs-toggle="modal" data-bs-target="#exampleModal3">Add New</a>
                                            
                                            <?php
                                            if(isset($_POST["lan_submit"])){
                                                $language = $_POST["language"];
                                                $l_level = $_POST["level"];
                        
                                                $insert_query = "INSERT INTO `language`(`user_id`, `language`, `level`) 
                                                VALUES ('$id','$language','$l_level')";
                        
                                                $result_query = mysqli_query($connection, $insert_query);
                            
                                                if($result_query){
                                                    ?>
                                                    <script>
                                                        window.location.href='personal_info.php';
                                                    </script>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <script>
                                                        alert("Language not inserted.");
                                                    </script>
                                                    <?php
                                                }
                                        } ?>
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                                  <div class="modal-content container p-4">
                                                    <div class="modal-header row justify-content-between">
                                                        <div class="col-8">
                                                            <h4 class="modal-title fw-bold d-none d-block" id="exampleModalLabel2">Add your languages</h4>
                                                        </div>
                                                        <div class="col-2 text-end">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body ps-0 pe-0 mt-1 mb-2">
                                                        <label for="language" class="form-label">Add a language</label>
                                                        <input type="text" name="language" class="form-control mb-3" placeholder="You can add upto 4" required>
                                                        <label for="lan_level" class="form-label">Level</label>
                                                        <select name="level" class="form-select" aria-label="Default select example" required>
                                                            <option value="" selected disabled>Select</option>
                                                            <option value="Basic">Basic</option>
                                                            <option value="Conversational">Conversational</option>
                                                            <option value="Fluent">Fluent</option>
                                                            <option value="Native/Bilingual">Native/Bilingual</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer text-end">
                                                        <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" name="lan_submit" class="btn btn-green fw-bold ps-4 pe-4">
                                                            Add</button>
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                        </form>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $select_query1 = " SELECT * FROM `language` WHERE user_id=$id";
                                    $run_query1 = mysqli_query($connection, $select_query1);
                                    while($result1 = mysqli_fetch_array($run_query1)){
                                    ?>
                                    <tr>
                                        <td><?php echo $result1['language'];?></td>
                                        <td><?php echo $result1['level'];?></td>
                                        <td>
                                            <a class="text-muted btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $result1['id']; ?>" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Update"><i class="ms-1 fa fa-pencil"></i></a>
                                            <a class="text-muted btn p-0" href="removelan2.php?id=<?php echo $result1['id']; ?>" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Remove"><i class="fa-solid fa-trash"></i></a>

                                            <form action="process2.php?id=<?php echo $result1['id']; ?>" method="POST" enctype="multipart/form-data">
                                                <div class="modal fade" id="exampleModal1<?php echo $result1['id']; ?>" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel1<?php echo $result1['id']; ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                                         <div class="modal-content container p-4">
                                                           <div class="modal-header row justify-content-between">
                                                               <div class="col-8">
                                                                   <h4 class="modal-title fw-bold d-none d-block" id="exampleModalLabel2">Update your languages</h4>
                                                               </div>
                                                               <div class="col-2 text-end">
                                                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                               </div>
                                                           </div>
                    
                                                           <div class="modal-body ps-0 pe-0 mt-1 mb-2">
                                                               <label for="language" class="form-label">Update your language</label>
                                                               <input type="text" name="language" class="form-control mb-3" placeholder="You can add upto 4"
                                                                value="<?php echo $result1['language']; ?>" required>
                                                               <label for="lan_level" class="form-label">Level</label>
                                                               <select name="level" value="<?php echo $result1['level']; ?>" class="form-select" aria-label="Default select example" required>
                                                                   <option value="Basic">Basic</option>
                                                                   <option value="Conversational">Conversational</option>
                                                                   <option value="Fluent">Fluent</option>
                                                                   <option value="Native/Bilingual">Native/Bilingual</option>
                                                               </select>
                                                           </div>
                                                           <div class="modal-footer text-end">
                                                               <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                                                   data-bs-dismiss="modal">Cancel</button>
                                                               <button type="submit" name="lan_update" class="btn btn-green fw-bold ps-4 pe-4">
                                                                   Update</button>
                                                           </div>
                                                         </div>
                                                        </div>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    
                <?php
                    if(isset($seller_id)){
                        if(isset($_POST["update"])){
                            $fname = $_POST["fname"];
                            $lname = $_POST["lname"];
                            $d_name = $_POST["d_name"];
                            $description = $_POST["description"];

                            $update_query = "UPDATE `seller_register` SET `lname`='$lname' WHERE `user_id`='$id'";
                            $update_query2 = "UPDATE `user_register` SET `fname`='$fname',
                            `d_name`='$d_name',`description`='$description' WHERE `id`='$id'";

                            $result_query = mysqli_query($connection, $update_query); mysqli_query($connection, $update_query2);

                            if($result_query){
                                ?>
                                <script>
                                    window.location.href='./professional_info.php';
                                </script>
                                <?php
                            }

                            else{
                                ?>
                                <script>
                                    alert("Sorry, the data could not be updated.");
                                </script>
                                <?php
                            }
                    } } else{

                        if(isset($_POST["save"])){
                            $lname = $_POST["lname"];
        
                            $insert_query = "INSERT INTO `seller_register`(`user_id`, `lname`) 
                            VALUES ('$id','$lname')";
                    
                            $result_query = mysqli_query($connection, $insert_query);
        
                            if($result_query){
                                ?>
                                <script>
                                    window.location.href='./professional_info.php';
                                </script>
                                <?php
                            }
                            
                            else{
                                ?>
                                <script>
                                    alert("Sorry, the data could not be updated.");
                                </script>
                                <?php
                            }
                    } }?>
                <form method="POST" enctype="multipart/form-data">
                    <div class="row mt-5">
                        <div class="col-12 col-lg-3">
                            <p class="fs-5">Full Name<span class="text-danger">*</span> <span class="text-muted small"><i>Private</i></span></p>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input type="text" placeholder="First Name" name="fname"
                                    value="<?php echo $fname; ?>" class="form-control" required 
                                    <?php if(!isset($seller_id)){ ?>disabled<?php } ?>>
                                </div>

                                <div class="col-12 col-lg-6 mt-2 mt-lg-0">
                                    <input type="text" placeholder="Last Name" name="lname"
                                    class="form-control" required 
                                    <?php if(isset($seller_id)){ ?>value="<?php echo $lname; ?>"<?php } ?>>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 pt-5">
                        <div class="col-12 col-lg-3">
                            <p class="fs-5">Display Name<span class="text-danger">*</span></p>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <input type="text" placeholder="Display Name" name="d_name"
                                    value="<?php echo $d_name; ?>" class="form-control" required
                                    <?php if(!isset($seller_id)){ ?>disabled<?php } ?>>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 pt-5">
                        <div class="col-12 col-lg-3 mt-5">
                            <p class="fs-5">Profile Picture<span class="text-danger">*</span></p>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12 col-lg-6 text-center text-lg-start">
                                    <label class="profileimage">
                                    <img src="<?php echo($p_image > 0) ? './assets/upload/'.$p_image : './assets/images/custom.png';?>" 
                                    id="selectedImage1" width="150px" class="<?php echo($session_profile > 0) ? '' : 'd-none';?> 
                                    imagepfp selectedImage1">
                                        <img class="imagepfp" src="./assets/images/custom.png" width="150px" 
                                            <?php echo($session_profile > 0) ? 'style="display: none;"' : '';?> id="imageUploadWrapper1">
                                        <img class="imagefp" width="150px" src="./assets/images/camera.png">
                                        <input type="file" name="image" class="d-none" id="imageInput1">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-5 pt-5">
                        <div class="col-12 col-lg-3">
                            <p class="fs-5">Description<span class="text-danger">*</span></p>
                        </div>

                        <div class="col-12 col-lg-6">
                            <input type="text" placeholder="Description" name="description"
                            value="<?php echo $description; ?>" class="form-control" required
                            <?php if(!isset($seller_id)){ ?>disabled<?php } ?>>
                        </div>
                    </div>
                    <?php if(isset($seller_id)){ ?>
                    <div class="text-center text-md-end mt-5 mb-5">
                        <button type="sumbit" name="update" class="btn btn-greenshadow btn-lg ps-5 pe-5">Continue</button>
                    </div>
                    <?php } else { ?>
                    <div class="text-center text-md-end mt-5 mb-5">
                        <button type="sumbit" name="save" class="btn btn-greenshadow btn-lg ps-5 pe-5">Continue</button>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </section>
    </main>

    <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>