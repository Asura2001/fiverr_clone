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

    <main class="profilebg">

    <section class="pt-4 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-4 text-center border bg-white">
                    <?php
                    if(isset($_POST["save"])){
                        $d_name = $_POST["d_name"];
                        $title = $_POST["title"];
                        if(!empty($_FILES['image']['name'])){
                            $image = $_FILES['image'];
                            $filename = $image["name"];
                            move_uploaded_file($image["tmp_name"],'./assets/upload/'.$filename);
                        }else{
                            $filename=$p_image;
                        }

                        $update_query = "UPDATE `user_register` SET `d_name`='$d_name',`title`='$title',`image`='$filename'
                        WHERE id=$id";
    
                        $result = mysqli_query($connection, $update_query);
    
                        if($result){
                            ?>
                            <script>
                                window.location.href='profile.php';
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
                    } ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mt-4">
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
                        <div class="mt-3">
                            <label for="display_name">
                                <a class="d-inline fw-bold btn fs-5" data-bs-toggle="modal" 
                                data-bs-target="#exampleModal"><?php echo($d_name == !NULL) ? $d_name : 'Your display name';?>
                                <i class="fa fa-pencil"></i></a>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered text-start">
                                      <div class="modal-content container p-4">
                                        <div class="row justify-content-between">
                                            <div class="col-8">
                                                <h4 class="modal-title fw-bold" id="exampleModalLabel">Choose your display name</h4>
                                            </div>
                                            <div class="col-2 text-end">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                        </div>
                                        <div class="modal-body ps-0 pe-0">
                                            <p class="mb-4">To help build credible and authentic connections with customers, 
                                                they’ll now see your display name. Learn more</p>
                                            <p class="small mb-4">We suggest using your first name and first initial of your last name.</p>
                                            <input type="text" name="d_name" value="<?php echo $d_name ?>" class="form-control" placeholder="Enter your display name">
                                            <p class="small mt-4">You’ll still see your unique username in some areas.</p>
                                            <p class="small mt-4">Add your story in one line</p>
                                            <input type="text" name="title" value="<?php echo $title ?>" class="form-control mb-4" placeholder="Here">
                                        </div>
                                        <div class="text-end">
                                            <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                                data-bs-dismiss="modal">I'll do this later</button>
                                            <button type="submit" name="save" class="btn btn-green fw-bold ps-4 pe-4">
                                                Save</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div>
                            <label for="name">
                                <p class="text-muted mb-0">@<?php echo $fname; echo $id ?></p>
                            </label>
                        </div>
                        <div>
                            <label for="title">
                                <p class="text-muted"><?php echo $title; ?></p>
                            </label>
                        </div>
                    </form>
                </div>

                <?php
                $select1 = "SELECT * FROM `gigs` WHERE user_id = $id";
                $select_result1 = mysqli_query($connection, $select1); 
                $row_select = mysqli_num_rows($select_result1);

                $select2 = "SELECT * FROM `price1` WHERE user_id = $id";
                $select3 = "SELECT * FROM `gallery` WHERE user_id = $id";
                $select_result2 = mysqli_query($connection, $select2);
                $select_result3 = mysqli_query($connection, $select3);

                $check_query = "SELECT * FROM `seller_register` WHERE user_id = $id";
                $check_query_result = mysqli_query($connection, $check_query);
                $row_query = mysqli_num_rows($check_query_result);
                if($row_query > 0){
                    $session_query = mysqli_fetch_assoc($check_query_result);
                    $phone = $session_query['phone'];
                }

                if($row_query > 0 AND $phone != NULL){
                ?>
                <div class="offset-1 col-7 text-center d-none d-lg-block">
                    <h3 class="m-4">Completed Gigs</h3>
                    <div class="row">
                        <?php while($result_select1 = mysqli_fetch_array($select_result1) AND $result_select2 = mysqli_fetch_array($select_result2) AND $result_select3 = mysqli_fetch_array($select_result3)){?>
                        <div class="col-4 p-1">
                            <a class="text-decoration-none text-reset" href="../seller/general2.php?id=<?php echo $result_select1["id"];?>">
                                <div class="card">
                                    <img src="../seller/assets/upload/<?php echo $result_select3["image1"];?>" class="border" height="130px">
                                    <div class="card-body">
                                        <p class="card-text text-start"><?php echo $result_select1["title"];?></p>
                                        <h6 class="card-title text-end mt-4 mb-0">Starting at $<?php echo $result_select2["price1"]?></h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php }?>
                        <div class="col-4 bg-white">
                            <a class="text-decoration-none text-reset" href="../seller/general.php">
                                <div class="p-5 pb-0">
                                    <img src="./assets/images/plus-sign-in-a-square.svg" class="img-fluid rounded-pill">
                                </div>
                                <div class="pt-5">
                                    <h6>Create a new Gig</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php }else{?>
                <div class="offset-1 col-7 bg-white border text-center">
                    <div>
                        <img src="./assets/images/terms.png" width="300px">
                    </div>
                    <a href="../seller/onboarding.php" class="btn btn-greenshadow mb-4">Become a seller</a>
                </div>
                <?php }?>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-lg-4 text border bg-white p-4">
                    <?php
                    if(isset($_POST["udescription"])){
                        $description = $_POST["description"];

                        $update_query = "UPDATE `user_register` SET `description`='$description' WHERE id=$id";

                        $result = mysqli_query($connection, $update_query);
    
                        if($result){
                            ?>
                            <script>
                                window.location.href='profile.php';
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
                    } ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-bold mt-1">Description</h6>
                            <a class="btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="fa fa-pencil"></i></a>
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                  <div class="modal-content container p-4">
                                    <div class="modal-header row justify-content-between">
                                        <div class="col-8">
                                            <h4 class="modal-title fw-bold d-none d-md-block" id="exampleModalLabel2">Edit your profile</h4>
                                        </div>
                                        <div class="col-2 text-end">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    </div>
                                    <div class="modal-body ps-0 pe-0 mt-1 mb-2">
                                        <label for="description" class="form-label">Description</label>
                                        <input type="text" name="description" class="form-control" placeholder="Tell us more about yourself.">
                                    </div>
                                    <div class="modal-footer text-end">
                                        <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                            data-bs-dismiss="modal">I'll do this later</button>
                                        <button type="submit" name="udescription" class="btn btn-green fw-bold ps-4 pe-4">
                                            Update</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        <p class="small mb-0"><?php echo $description; ?></h6>
                        <hr>

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
                                window.location.href='profile.php';
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
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-bold">Languages</h6>
                            <a class="btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal3"><i class="fa fa-pencil"></i></a>
                            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                  <div class="modal-content container p-4">
                                    <div class="modal-header row justify-content-between">
                                        <div class="col-8">
                                            <h4 class="modal-title fw-bold d-none d-md-block" id="exampleModalLabel2">Edit your languages</h4>
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
                        </div>
                    </form>
                        <?php
                        $select_query1 = " SELECT * FROM `language` WHERE user_id=$id";
                        $run_query1 = mysqli_query($connection, $select_query1);

                        while($result1 = mysqli_fetch_array($run_query1)){
                        ?>
                        <p class="small mb-1"><?php echo $result1['language']." -";?> 
                        <span class="text-muted"><?php echo $result1['level']; ?></span>
                        <a class="text-muted btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal1<?php echo $result1['id']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Update"><i class="ms-1 fa fa-pencil"></i></a>
                        <a class="text-muted btn p-0" href="removelan.php?id=<?php echo $result1['id']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Remove"><i class="fa-solid fa-trash"></i></a></p>
                            <div class="modal fade" id="exampleModal1<?php echo $result1['id']; ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel1<?php echo $result1['id']; ?>" aria-hidden="true">
                                <form action="process1.php?id=<?php echo $result1['id']; ?>" method="POST" enctype="multipart/form-data">
                                   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                     <div class="modal-content container p-4">
                                       <div class="modal-header row justify-content-between">
                                           <div class="col-8">
                                               <h4 class="modal-title fw-bold d-none d-md-block" id="exampleModalLabel2">Update your languages</h4>
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
                                           <select name="level" class="form-select" aria-label="Default select example" required>
                                               <option value="Basic" <?php if ($result1['level'] == 'Basic') echo 'selected'; ?>>Basic</option>
                                                <option value="Conversational" <?php if ($result1['level'] == 'Conversational') echo 'selected'; ?>>Conversational</option>
                                                <option value="Fluent" <?php if ($result1['level'] == 'Fluent') echo 'selected'; ?>>Fluent</option>
                                                <option value="Native/Bilingual" <?php if ($result1['level'] == 'Native/Bilingual') echo 'selected'; ?>>Native/Bilingual</option>
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
                        <?php } ?>
                        <hr>

                    <?php
                    if(isset($_POST["skill_submit"])){
                        $skill = $_POST["skill"];
                        $s_level = $_POST["level"];

                        $insert_query = "INSERT INTO `skills`(`user_id`, `skill`, `level`) 
                        VALUES ('$id','$skill','$s_level')";

                        $result_query = mysqli_query($connection, $insert_query);
    
                        if($result_query){
                            ?>
                            <script>
                                window.location.href='profile.php';
                            </script>
                            <?php
                        } else{
                            ?>
                            <script>
                                alert("Skill not inserted.");
                            </script>
                            <?php
                        }
                    } ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-bold">Skills</h6>
                            <a class="btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal4"><i class="fa fa-pencil"></i></a>
                            <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                  <div class="modal-content container p-4">
                                    <div class="modal-header row justify-content-between">
                                        <div class="col-8">
                                            <h4 class="modal-title fw-bold d-none d-md-block" id="exampleModalLabel2">Edit your skills</h4>
                                        </div>
                                        <div class="col-2 text-end">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    </div>
                                    <div class="modal-body ps-0 pe-0 mt-1 mb-2">
                                        <label for="skill" class="form-label">Add a Skill</label>
                                        <input type="text" name="skill" class="form-control mb-3" placeholder="Let buyers known your skills." required>
                                        <label for="skill_level" class="form-label">Level</label>
                                        <select name="level" class="form-select" aria-label="Default select example" required>
                                            <option value="" selected disabled>Select</option>
                                            <option value="Beginner">Beginner</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="Expert">Expert</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer text-end">
                                        <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="skill_submit" class="btn btn-green fw-bold ps-4 pe-4">
                                            Add</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        <?php
                        $select_query2 = " SELECT * FROM `skills` WHERE user_id=$id";
                        $run_query2 = mysqli_query($connection, $select_query2);
                        while($result2 = mysqli_fetch_array($run_query2)){
                        ?>
                        <p class="small mb-1"><?php echo $result2['skill']." -";?> 
                        <span class="text-muted"><?php echo $result2['level']; ?></span>
                        <a class="text-muted btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal2<?php echo $result2['id']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Update"><i class="ms-1 fa fa-pencil"></i></a>
                        <a class="text-muted btn p-0" href="removeskill.php?id=<?php echo $result2['id']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Remove"><i class="fa-solid fa-trash"></i></a></p>
                            <div class="modal fade" id="exampleModal2<?php echo $result2['id']; ?>" tabindex="-1" 
                            aria-labelledby="exampleModalLabel2<?php echo $result2['id']; ?>" aria-hidden="true">
                            <form action="process1.php?id=<?php echo $result2['id']; ?>" method="POST" enctype="multipart/form-data">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                  <div class="modal-content container p-4">
                                    <div class="modal-header row justify-content-between">
                                        <div class="col-8">
                                            <h4 class="modal-title fw-bold d-none d-md-block" id="exampleModalLabel2<?php echo $result2['id']; ?>">Update your skills</h4>
                                        </div>
                                        <div class="col-2 text-end">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    </div>
                                    <div class="modal-body ps-0 pe-0 mt-1 mb-2">
                                        <label for="skill" class="form-label">Update your Skill</label>
                                        <input type="text" name="skill" class="form-control mb-3" value="<?php echo $result2['skill']; ?>"
                                         placeholder="Let buyers known your skills." required>
                                        <label for="skill_level" class="form-label">Update your Level</label>
                                        <select name="level" class="form-select" aria-label="Default select example" required>
                                            <option value="Beginner" <?php if ($result2['level'] == 'Beginner') echo 'selected'; ?>>Beginner</option>
                                            <option value="Intermediate" <?php if ($result2['level'] == 'Intermediate') echo 'selected'; ?>>Intermediate</option>
                                            <option value="Expert" <?php if ($result2['level'] == 'Expert') echo 'selected'; ?>>Expert</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer text-end">
                                        <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="skill_update" class="btn btn-green fw-bold ps-4 pe-4">
                                            Update</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                        <hr>

                    <?php
                    if(isset($_POST["edu_submit"])){
                        $country = $_POST["country"];
                        $education = $_POST["education"];
                        $title = $_POST["title"];
                        $major = $_POST["major"];
                        $year = $_POST["year"];

                        $insert_query = "INSERT INTO `education`(`user_id`, `country`, `education`, `title`, `major`, `year`) 
                        VALUES ('$id','$country','$education','$title','$major','$year')";

                        $result_query = mysqli_query($connection, $insert_query);
    
                        if($result_query){
                            ?>
                            <script>
                                window.location.href='profile.php';
                            </script>
                            <?php
                        } else{
                            ?>
                            <script>
                                alert("Education not inserted.");
                            </script>
                            <?php
                        }
                    } ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-bold">Education</h6>
                            <a class="btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal5"><i class="fa fa-pencil"></i></a>
                            <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                  <div class="modal-content container p-4">
                                    <div class="modal-header row justify-content-between">
                                        <div class="col-8">
                                            <h4 class="modal-title fw-bold d-none d-md-block" id="exampleModalLabel2">Edit your education</h4>
                                        </div>
                                        <div class="col-2 text-end">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    </div>
                                    <div class="modal-body ps-0 pe-0 mt-1 mb-2">
                                        <label for="country" class="form-label">Add your country</label>
                                        <input type="text" name="country" class="form-control mb-3" placeholder="Country of College/University" required>
                                        <label for="education" class="form-label">College/University Name</label>
                                        <input type="text" name="education" class="form-control mb-3" placeholder="College/University Name" required>
                                        <label for="skill_level" class="form-label">Title</label>
                                        <select name="title" class="form-select mb-3" aria-label="Default select example" required>
                                            <option value="" selected disabled>Select your title</option>
                                            <option value="Associate">Associate</option>
                                            <option value="Certificate">Certificate</option>
                                            <option value="B.Sc">B.Sc</option>
                                            <option value="B.A">B.A</option>
                                            <option value="M.B.A">M.B.A</option>
                                            <option value="M.A">M.A</option>
                                            <option value="Ph.D">Ph.D</option>
                                            <option value="LLB">LLB</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <label for="major" class="form-label">Add your Major</label>
                                        <input type="text" name="major" class="form-control mb-3" placeholder="Major" required>
                                        <label for="year" class="form-label">Year of graduation</label>
                                        <select name="year" class="form-select mb-3" aria-label="Default select example" required>
                                            <option value="" selected disabled>Year of graduation</option>
                                            <option value="Graduated 2023">2023</option>
                                            <option value="Graduated 2022">2022</option>
                                            <option value="Graduated 2021">2021</option>
                                            <option value="Graduated 2020">2020</option>
                                            <option value="Graduated 2019">2019</option>
                                            <option value="Graduated 2018">2018</option>
                                            <option value="Graduated 2017">2017</option>
                                            <option value="Graduated 2016">2016</option>
                                            <option value="Graduated 2015">2015</option>
                                            <option value="Graduated 2014">2014</option>
                                            <option value="Graduated 2013">2013</option>
                                            <option value="Graduated 2012">2012</option>
                                            <option value="Graduated 2011">2011</option>
                                            <option value="Graduated 2010">2010</option>
                                            <option value="Graduated 2009">2009</option>
                                            <option value="Graduated 2008">2008</option>
                                            <option value="Graduated 2007">2007</option>
                                            <option value="Graduated 2006">2006</option>
                                            <option value="Graduated 2005">2005</option>
                                            <option value="Graduated 2004">2004</option>
                                            <option value="Graduated 2003">2003</option>
                                            <option value="Graduated 2002">2002</option>
                                            <option value="Graduated 2001">2001</option>
                                            <option value="Graduated 2000">2000</option>
                                            <option value="Graduated 1999">1999</option>
                                            <option value="Graduated 1998">1998</option>
                                            <option value="Graduated 1997">1997</option>
                                            <option value="Graduated 1996">1996</option>
                                            <option value="Graduated 1995">1995</option>
                                            <option value="Graduated 1994">1994</option>
                                            <option value="Graduated 1993">1993</option>
                                            <option value="Graduated 1992">1992</option>
                                            <option value="Graduated 1991">1991</option>
                                            <option value="Graduated 1990">1990</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer text-end">
                                        <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="edu_submit" class="btn btn-green fw-bold ps-4 pe-4">
                                            Add</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        $select_query3 = " SELECT * FROM `education` WHERE user_id=$id";
                        $run_query3 = mysqli_query($connection, $select_query3);
                        while($result3 = mysqli_fetch_array($run_query3)){
                        ?>
                        <p class="small mb-0"><?php echo $result3['title']." -";?> <?php echo $result3['major']; ?>
                        <a class="text-muted btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal3<?php echo $result3['id']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Update"><i class="ms-1 fa fa-pencil"></i></a>
                        <a class="text-muted btn p-0" href="removeedu.php?id=<?php echo $result3['id']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Remove"><i class="fa-solid fa-trash"></i></a></p>
                        <p class="small mb-1 text-muted"><?php echo $result3['education'].",";?> <?php echo $result3['country'].",";?>
                         <?php echo $result3['year']; ?></p>

                         <form action="process1.php?id=<?php echo $result3['id']; ?>" method="POST" enctype="multipart/form-data">
                         <div class="modal fade" id="exampleModal3<?php echo $result3['id']; ?>" tabindex="-1" 
                         aria-labelledby="exampleModalLabel3<?php echo $result3['id']; ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                  <div class="modal-content container p-4">
                                    <div class="modal-header row justify-content-between">
                                        <div class="col-8">
                                            <h4 class="modal-title fw-bold d-none d-md-block" id="exampleModalLabel2">Update your education</h4>
                                        </div>
                                        <div class="col-2 text-end">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    </div>
                                    <div class="modal-body ps-0 pe-0 mt-1 mb-2">
                                        <label for="country" class="form-label">Update your country</label>
                                        <input type="text" name="country" value="<?php echo $result3['country']; ?>" class="form-control mb-3" placeholder="Country of College/University" required>
                                        <label for="education" class="form-label">Update your College/University Name</label>
                                        <input type="text" name="education" value="<?php echo $result3['education']; ?>" class="form-control mb-3" placeholder="College/University Name" required>
                                        <label for="skill_level" class="form-label">Update your Title</label>
                                        <select name="title" class="form-select mb-3" aria-label="Default select example" required>
                                            <option value="Associate" <?php if ($result3['title'] == 'Associate') echo 'selected'; ?>>Associate</option>
                                            <option value="Certificate" <?php if ($result3['title'] == 'Certificate') echo 'selected'; ?>>Certificate</option>
                                            <option value="B.Sc" <?php if ($result3['title'] == 'B.Sc') echo 'selected'; ?>>B.Sc</option>
                                            <option value="B.A" <?php if ($result3['title'] == 'B.A') echo 'selected'; ?>>B.A</option>
                                            <option value="M.B.A" <?php if ($result3['title'] == 'M.B.A') echo 'selected'; ?>>M.B.A</option>
                                            <option value="M.A" <?php if ($result3['title'] == 'M.A') echo 'selected'; ?>>M.A</option>
                                            <option value="Ph.D" <?php if ($result3['title'] == 'Ph.D') echo 'selected'; ?>>Ph.D</option>
                                            <option value="LLB" <?php if ($result3['title'] == 'LLB') echo 'selected'; ?>>LLB</option>
                                            <option value="Other" <?php if ($result3['title'] == 'Other') echo 'selected'; ?>>Other</option>
                                        </select>
                                        <label for="major" class="form-label">Update your Major</label>
                                        <input type="text" name="major" value="<?php echo $result3['major']; ?>" class="form-control mb-3" placeholder="Major" required>
                                        <label for="year" class="form-label">Update your Year of graduation</label>
                                        <select name="year" class="form-select mb-3" aria-label="Default select example" required>
                                            <option value="Graduated 2023" <?php if ($result3['year'] == 'Graduated 2023') echo 'selected'; ?>>2023</option>
                                            <option value="Graduated 2022" <?php if ($result3['year'] == 'Graduated 2022') echo 'selected'; ?>>2022</option>
                                            <option value="Graduated 2021" <?php if ($result3['year'] == 'Graduated 2021') echo 'selected'; ?>>2021</option>
                                            <option value="Graduated 2020" <?php if ($result3['year'] == 'Graduated 2020') echo 'selected'; ?>>2020</option>
                                            <option value="Graduated 2019" <?php if ($result3['year'] == 'Graduated 2019') echo 'selected'; ?>>2019</option>
                                            <option value="Graduated 2018" <?php if ($result3['year'] == 'Graduated 2018') echo 'selected'; ?>>2018</option>
                                            <option value="Graduated 2017" <?php if ($result3['year'] == 'Graduated 2017') echo 'selected'; ?>>2017</option>
                                            <option value="Graduated 2016" <?php if ($result3['year'] == 'Graduated 2016') echo 'selected'; ?>>2016</option>
                                            <option value="Graduated 2015" <?php if ($result3['year'] == 'Graduated 2015') echo 'selected'; ?>>2015</option>
                                            <option value="Graduated 2014" <?php if ($result3['year'] == 'Graduated 2014') echo 'selected'; ?>>2014</option>
                                            <option value="Graduated 2013" <?php if ($result3['year'] == 'Graduated 2013') echo 'selected'; ?>>2013</option>
                                            <option value="Graduated 2012" <?php if ($result3['year'] == 'Graduated 2012') echo 'selected'; ?>>2012</option>
                                            <option value="Graduated 2011" <?php if ($result3['year'] == 'Graduated 2011') echo 'selected'; ?>>2011</option>
                                            <option value="Graduated 2010" <?php if ($result3['year'] == 'Graduated 2010') echo 'selected'; ?>>2010</option>
                                            <option value="Graduated 2009" <?php if ($result3['year'] == 'Graduated 2009') echo 'selected'; ?>>2009</option>
                                            <option value="Graduated 2008" <?php if ($result3['year'] == 'Graduated 2008') echo 'selected'; ?>>2008</option>
                                            <option value="Graduated 2007" <?php if ($result3['year'] == 'Graduated 2007') echo 'selected'; ?>>2007</option>
                                            <option value="Graduated 2006" <?php if ($result3['year'] == 'Graduated 2006') echo 'selected'; ?>>2006</option>
                                            <option value="Graduated 2005" <?php if ($result3['year'] == 'Graduated 2005') echo 'selected'; ?>>2005</option>
                                            <option value="Graduated 2004" <?php if ($result3['year'] == 'Graduated 2004') echo 'selected'; ?>>2004</option>
                                            <option value="Graduated 2003" <?php if ($result3['year'] == 'Graduated 2003') echo 'selected'; ?>>2003</option>
                                            <option value="Graduated 2002" <?php if ($result3['year'] == 'Graduated 2002') echo 'selected'; ?>>2002</option>
                                            <option value="Graduated 2001" <?php if ($result3['year'] == 'Graduated 2001') echo 'selected'; ?>>2001</option>
                                            <option value="Graduated 2000" <?php if ($result3['year'] == 'Graduated 2000') echo 'selected'; ?>>2000</option>
                                            <option value="Graduated 1999" <?php if ($result3['year'] == 'Graduated 1999') echo 'selected'; ?>>1999</option>
                                            <option value="Graduated 1998" <?php if ($result3['year'] == 'Graduated 1998') echo 'selected'; ?>>1998</option>
                                            <option value="Graduated 1997" <?php if ($result3['year'] == 'Graduated 1997') echo 'selected'; ?>>1997</option>
                                            <option value="Graduated 1996" <?php if ($result3['year'] == 'Graduated 1996') echo 'selected'; ?>>1996</option>
                                            <option value="Graduated 1995" <?php if ($result3['year'] == 'Graduated 1995') echo 'selected'; ?>>1995</option>
                                            <option value="Graduated 1994" <?php if ($result3['year'] == 'Graduated 1994') echo 'selected'; ?>>1994</option>
                                            <option value="Graduated 1993" <?php if ($result3['year'] == 'Graduated 1993') echo 'selected'; ?>>1993</option>
                                            <option value="Graduated 1992" <?php if ($result3['year'] == 'Graduated 1992') echo 'selected'; ?>>1992</option>
                                            <option value="Graduated 1991" <?php if ($result3['year'] == 'Graduated 1991') echo 'selected'; ?>>1991</option>
                                            <option value="Graduated 1990" <?php if ($result3['year'] == 'Graduated 1990') echo 'selected'; ?>>1990</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer text-end">
                                        <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="edu_update" class="btn btn-green fw-bold ps-4 pe-4">
                                            Update</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            </form>
                        <?php } ?>
                        <hr>

                    <?php
                    if(isset($_POST["cert_submit"])){
                        $certificate = $_POST["certificate"];
                        $certified = $_POST["certified"];
                        $year = $_POST["year"];

                        $insert_query = "INSERT INTO `certificate`(`user_id`, `certificate`, `certified`, `year`) 
                        VALUES ('$id','$certificate','$certified','$year')";

                        $result_query = mysqli_query($connection, $insert_query);
    
                        if($result_query){
                            ?>
                            <script>
                                window.location.href='profile.php';
                            </script>
                            <?php
                        } else{
                            ?>
                            <script>
                                alert("Certification not inserted.");
                            </script>
                            <?php
                        }
                    } ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="d-flex justify-content-between">
                            <h6 class="fw-bold">Certification</h6>
                            <a class="btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal6"><i class="fa fa-pencil"></i></a>
                            <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel6" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                  <div class="modal-content container p-4">
                                    <div class="modal-header row justify-content-between">
                                        <div class="col-8">
                                            <h4 class="modal-title fw-bold d-none d-md-block" id="exampleModalLabel2">Edit your certification</h4>
                                        </div>
                                        <div class="col-2 text-end">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    </div>
                                    <div class="modal-body ps-0 pe-0 mt-1 mb-2">
                                        <label for="certificate" class="form-label">Add your certificates</label>
                                        <input type="text" name="certificate" class="form-control mb-3" placeholder="Certificate or Award" required>
                                        <label for="certified" class="form-label">Add the institute</label>
                                        <input type="text" name="certified" class="form-control mb-3" placeholder="Certified From (E.G. Adobe)" required>
                                        <label for="year" class="form-label">Year of graduation</label>
                                        <select name="year" class="form-select mb-3" aria-label="Default select example" required>
                                            <option value="" selected disabled>Year</option>
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                            <option value="2021">2021</option>
                                            <option value="2020">2020</option>
                                            <option value="2019">2019</option>
                                            <option value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                            <option value="2006">2006</option>
                                            <option value="2005">2005</option>
                                            <option value="2004">2004</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                            <option value="1993">1993</option>
                                            <option value="1992">1992</option>
                                            <option value="1991">1991</option>
                                            <option value="1990">1990</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer text-end">
                                        <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="cert_submit" class="btn btn-green fw-bold ps-4 pe-4">
                                            Add</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </form>
                        <?php
                        $select_query4 = " SELECT * FROM `certificate` WHERE user_id=$id";
                        $run_query4 = mysqli_query($connection, $select_query4);
                        while($result4 = mysqli_fetch_array($run_query4)){
                        ?>
                        <p class="small mb-0"><?php echo $result4['certificate'];?>
                        <a class="text-muted btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal4<?php echo $result4['id']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Update"><i class="ms-1 fa fa-pencil"></i></a>
                        <a class="text-muted btn p-0" href="removecert.php?id=<?php echo $result4['id']; ?>" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Remove"><i class="fa-solid fa-trash"></i></a></p>
                        <p class="small mb-1 text-muted"><?php echo $result4['certified'].",";?> <?php echo $result4['year'];?></p>

                        <form action="process1.php?id=<?php echo $result4['id']; ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal fade" id="exampleModal4<?php echo $result4['id']; ?>" tabindex="-1" 
                            aria-labelledby="exampleModalLabel4<?php echo $result4['id']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                              <div class="modal-content container p-4">
                                <div class="modal-header row justify-content-between">
                                    <div class="col-8">
                                        <h4 class="modal-title fw-bold d-none d-md-block" id="exampleModalLabel2">Update your certification</h4>
                                    </div>
                                    <div class="col-2 text-end">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                </div>
                                <div class="modal-body ps-0 pe-0 mt-1 mb-2">
                                    <label for="certificate" class="form-label">Update your certificate</label>
                                    <input type="text" name="certificate" value="<?php echo $result4['certificate']; ?>" class="form-control mb-3" placeholder="Certificate or Award" required>
                                    <label for="certified" class="form-label">Update the institute</label>
                                    <input type="text" name="certified" value="<?php echo $result4['certified']; ?>" class="form-control mb-3" placeholder="Certified From (E.G. Adobe)" required>
                                    <label for="year" class="form-label">Update the Year of graduation</label>
                                    <select name="year" class="form-select mb-3" aria-label="Default select example" required>
                                        <option value="2023" <?php if ($result4['year'] == '2023') echo 'selected'; ?>>2023</option>
                                        <option value="2022" <?php if ($result4['year'] == '2022') echo 'selected'; ?>>2022</option>
                                        <option value="2021" <?php if ($result4['year'] == '2021') echo 'selected'; ?>>2021</option>
                                        <option value="2020" <?php if ($result4['year'] == '2020') echo 'selected'; ?>>2020</option>
                                        <option value="2019" <?php if ($result4['year'] == '2019') echo 'selected'; ?>>2019</option>
                                        <option value="2018" <?php if ($result4['year'] == '2018') echo 'selected'; ?>>2018</option>
                                        <option value="2017" <?php if ($result4['year'] == '2017') echo 'selected'; ?>>2017</option>
                                        <option value="2016" <?php if ($result4['year'] == '2016') echo 'selected'; ?>>2016</option>
                                        <option value="2015" <?php if ($result4['year'] == '2015') echo 'selected'; ?>>2015</option>
                                        <option value="2014" <?php if ($result4['year'] == '2014') echo 'selected'; ?>>2014</option>
                                        <option value="2013" <?php if ($result4['year'] == '2013') echo 'selected'; ?>>2013</option>
                                        <option value="2012" <?php if ($result4['year'] == '2012') echo 'selected'; ?>>2012</option>
                                        <option value="2011" <?php if ($result4['year'] == '2011') echo 'selected'; ?>>2011</option>
                                        <option value="2010" <?php if ($result4['year'] == '2010') echo 'selected'; ?>>2010</option>
                                        <option value="2009" <?php if ($result4['year'] == '2009') echo 'selected'; ?>>2009</option>
                                        <option value="2008" <?php if ($result4['year'] == '2008') echo 'selected'; ?>>2008</option>
                                        <option value="2007" <?php if ($result4['year'] == '2007') echo 'selected'; ?>>2007</option>
                                        <option value="2006" <?php if ($result4['year'] == '2006') echo 'selected'; ?>>2006</option>
                                        <option value="2005" <?php if ($result4['year'] == '2005') echo 'selected'; ?>>2005</option>
                                        <option value="2004" <?php if ($result4['year'] == '2004') echo 'selected'; ?>>2004</option>
                                        <option value="2003" <?php if ($result4['year'] == '2003') echo 'selected'; ?>>2003</option>
                                        <option value="2002" <?php if ($result4['year'] == '2002') echo 'selected'; ?>>2002</option>
                                        <option value="2001" <?php if ($result4['year'] == '2001') echo 'selected'; ?>>2001</option>
                                        <option value="2000" <?php if ($result4['year'] == '2000') echo 'selected'; ?>>2000</option>
                                        <option value="1999" <?php if ($result4['year'] == '1999') echo 'selected'; ?>>1999</option>
                                        <option value="1998" <?php if ($result4['year'] == '1998') echo 'selected'; ?>>1998</option>
                                        <option value="1997" <?php if ($result4['year'] == '1997') echo 'selected'; ?>>1997</option>
                                        <option value="1996" <?php if ($result4['year'] == '1996') echo 'selected'; ?>>1996</option>
                                        <option value="1995" <?php if ($result4['year'] == '1995') echo 'selected'; ?>>1995</option>
                                        <option value="1994" <?php if ($result4['year'] == '1994') echo 'selected'; ?>>1994</option>
                                        <option value="1993" <?php if ($result4['year'] == '1993') echo 'selected'; ?>>1993</option>
                                        <option value="1992" <?php if ($result4['year'] == '1992') echo 'selected'; ?>>1992</option>
                                        <option value="1991" <?php if ($result4['year'] == '1991') echo 'selected'; ?>>1991</option>
                                        <option value="1990" <?php if ($result4['year'] == '1990') echo 'selected'; ?>>1990</option>
                                    </select>
                                </div>
                                <div class="modal-footer text-end">
                                    <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" name="cert_update" class="btn btn-green fw-bold ps-4 pe-4">
                                        Update</button>
                                </div>
                              </div>
                            </div>
                        </div>
                        </form>
                        <?php } ?>
                </div>
            </div>
        </div>
    </section>

    </main>

    <?php include "footer.php"; ?>
</body>

</html>