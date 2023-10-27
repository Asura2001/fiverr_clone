<?php
session_start();
include "connection.php";
if(isset($_SESSION['customer_id'])){
    $id = $_SESSION['customer_id'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    
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
    <title>Professional Info</title>
    <?php include "links.php";?>
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
                        <h1 class="display-3 display-lg-6 fw-bold">Professional Info</h1>
                        <p class="mt-3 d-none d-lg-block">This is your time to shine. Let potential buyers know what you do<br>best
                         and how you gained your skills, certifications and experience.</p>
                        <p class="text-end fw-bold"><i>* Mandatory fields</i></p>
                    </div>
                </div>

                    <div class="row mt-5 pt-5">
                        <div class="col-12 col-lg-3">
                            <p class="fs-5">Skill<span class="text-danger">*</span></p>
                        </div>

                        <div class="col-12 col-lg-6">
                            <table class="table border">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col text-muted">Skill</th>
                                        <th scope="col text-muted">Level</th>
                                        <th scope="col text-muted">
                                            <a class="btn text-success fw-bold p-0" data-bs-toggle="modal" data-bs-target="#exampleModal4">Add New</a>
                                            
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
                                                            window.location.href='professional_info.php';
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
                                                <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                                    <div class="modal-content container p-4">
                                                        <div class="modal-header row justify-content-between">
                                                            <div class="col-8">
                                                                <h4 class="modal-title fw-bold d-none d-lg-block" id="exampleModalLabel2">Edit your skills</h4>
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
                                            </form>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $select_query2 = " SELECT * FROM `skills` WHERE user_id=$id";
                                    $run_query2 = mysqli_query($connection, $select_query2);
                                    while($result2 = mysqli_fetch_array($run_query2)){
                                    ?>
                                    <tr>
                                        <td><?php echo $result2['skill'];?></td>
                                        <td><?php echo $result2['level'];?></td>
                                        <td>
                                        <a class="text-muted btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal2<?php echo $result2['id']; ?>" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Update"><i class="ms-1 fa fa-pencil"></i></a>
                                        <a class="text-muted btn p-0" href="removeskill2.php?id=<?php echo $result2['id']; ?>" data-bs-toggle="tooltip"
                                            data-bs-placement="bottom" title="Remove"><i class="fa-solid fa-trash"></i></a>
                                            <div class="modal fade" id="exampleModal2<?php echo $result2['id']; ?>" tabindex="-1" 
                                                aria-labelledby="exampleModalLabel2<?php echo $result2['id']; ?>" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                                    <div class="modal-content container p-4">
                                                        <div class="modal-header row justify-content-between">
                                                            <div class="col-8">
                                                                <h4 class="modal-title fw-bold d-none d-lg-block" id="exampleModalLabel2<?php echo $result2['id']; ?>">Update your skills</h4>
                                                            </div>
                                                            <div class="col-2 text-end">
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                        </div>

                                                        <form action="process2.php?id=<?php echo $result2['id']; ?>" method="POST" enctype="multipart/form-data">
                                                        <div class="modal-body ps-0 pe-0 mt-1 mb-2">
                                                            <label for="skill" class="form-label">Update your Skill</label>
                                                            <input type="text" name="skill" class="form-control mb-3" value="<?php echo $result2['skill']; ?>"
                                                            placeholder="Let buyers known your skills." required>
                                                            <label for="skill_level" class="form-label">Update your Level</label>
                                                            <select name="level" class="form-select" aria-label="Default select example" required>
                                                                <option value="Beginner">Beginner</option>
                                                                <option value="Intermediate">Intermediate</option>
                                                                <option value="Expert">Expert</option>
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer text-end">
                                                            <button type="button" class="btn btn-lightgray fw-bold ps-4 pe-4" 
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" name="skill_update" class="btn btn-green fw-bold ps-4 pe-4">
                                                                Update</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                    </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-5 pt-5">
                        <div class="col-12 col-lg-3">
                            <p class="fs-5">Education</p>
                        </div>

                        <div class="col-12 col-lg-6">
                            <table class="table border">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col text-muted">Degree</th>
                                        <th scope="col text-muted">Years</th>
                                        <th scope="col text-muted">
                                            <a class="btn text-success fw-bold p-0" data-bs-toggle="modal" data-bs-target="#exampleModal5">Add New</a>
                                        
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
                                                        window.location.href='professional_info.php';
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
                                            <div class="modal fade" id="exampleModal5" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                                  <div class="modal-content container p-4">
                                                    <div class="modal-header row justify-content-between">
                                                        <div class="col-8">
                                                            <h4 class="modal-title fw-bold d-none d-lg-block" id="exampleModalLabel2">Edit your education</h4>
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
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $select_query3 = " SELECT * FROM `education` WHERE user_id=$id";
                                    $run_query3 = mysqli_query($connection, $select_query3);
                                    while($result3 = mysqli_fetch_array($run_query3)){
                                    ?>
                                    <tr>
                                        <td><?php echo $result3['education'];?></td>
                                        <td><?php echo $result3['year'];?></td>
                                        <td>
                                            <a class="text-muted btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal3<?php echo $result3['id']; ?>" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Update"><i class="ms-1 fa fa-pencil"></i></a>
                                            <a class="text-muted btn p-0" href="removeedu2.php?id=<?php echo $result3['id']; ?>" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Remove"><i class="fa-solid fa-trash"></i></a>
                                                <form action="process2.php?id=<?php echo $result3['id']; ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="modal fade" id="exampleModal3<?php echo $result3['id']; ?>" tabindex="-1" 
                                                    aria-labelledby="exampleModalLabel3<?php echo $result3['id']; ?>" aria-hidden="true">
                                                           <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                                             <div class="modal-content container p-4">
                                                               <div class="modal-header row justify-content-between">
                                                                   <div class="col-8">
                                                                       <h4 class="modal-title fw-bold d-none d-lg-block" id="exampleModalLabel2">Update your education</h4>
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
                                                                   <label for="major" class="form-label">Update your Major</label>
                                                                   <input type="text" name="major" value="<?php echo $result3['major']; ?>" class="form-control mb-3" placeholder="Major" required>
                                                                   <label for="year" class="form-label">Update your Year of graduation</label>
                                                                   <select name="year" class="form-select mb-3" aria-label="Default select example" required>
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
                                                                   <button type="submit" name="edu_update" class="btn btn-green fw-bold ps-4 pe-4">
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

                    <div class="row mt-5 pt-5">
                        <div class="col-12 col-lg-3">
                            <p class="fs-5">Certificate</p>
                        </div>

                        <div class="col-12 col-lg-6">
                            <table class="table border">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col text-muted">Certificate or Award</th>
                                        <th scope="col text-muted">Year</th>
                                        <th scope="col text-muted">
                                            <a class="btn text-success fw-bold p-0" data-bs-toggle="modal" data-bs-target="#exampleModal6">Add New</a>
                                        
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
                                                        window.location.href='professional_info.php';
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
                                            <div class="modal fade" id="exampleModal6" tabindex="-1" aria-labelledby="exampleModalLabel6" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                                  <div class="modal-content container p-4">
                                                    <div class="modal-header row justify-content-between">
                                                        <div class="col-8">
                                                            <h4 class="modal-title fw-bold d-none d-lg-block" id="exampleModalLabel2">Edit your certification</h4>
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
                                        </form>
                                        </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $select_query4 = " SELECT * FROM `certificate` WHERE user_id=$id";
                                    $run_query4 = mysqli_query($connection, $select_query4);
                                    while($result4 = mysqli_fetch_array($run_query4)){
                                    ?>
                                    <tr>
                                        <td><?php echo $result4['certificate'];?></td>
                                        <td><?php echo $result4['year'];?></td>
                                        <td>
                                            <a class="text-muted btn p-0" data-bs-toggle="modal" data-bs-target="#exampleModal4<?php echo $result4['id']; ?>" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Update"><i class="ms-1 fa fa-pencil"></i></a>
                                            <a class="text-muted btn p-0" href="removecert2.php?id=<?php echo $result4['id']; ?>" data-bs-toggle="tooltip"
                                                data-bs-placement="bottom" title="Remove"><i class="fa-solid fa-trash"></i></a>
                                                <form action="process2.php?id=<?php echo $result4['id']; ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="modal fade" id="exampleModal4<?php echo $result4['id']; ?>" tabindex="-1" 
                                                        aria-labelledby="exampleModalLabel4<?php echo $result4['id']; ?>" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable text-start">
                                                          <div class="modal-content container p-4">
                                                            <div class="modal-header row justify-content-between">
                                                                <div class="col-8">
                                                                    <h4 class="modal-title fw-bold d-none d-lg-block" id="exampleModalLabel2">Update your certification</h4>
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
                                                                <button type="submit" name="cert_update" class="btn btn-green fw-bold ps-4 pe-4">
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

                    <?php
                    if(isset($_POST["update"])){

                    $occupation = $_POST["occupation"]; 

                    $update_query = "UPDATE `seller_register` SET `occupation`='$occupation'
                    WHERE user_id=$id";

                    $result = mysqli_query($connection, $update_query);

                    if($result){
                        ?>
                        <script>
                            window.location.href='./linked_accounts.php';
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
                    <div class="row mt-5">
                        <div class="col-12 col-lg-3">
                            <p class="fs-5">Your Occupation<span class="text-danger">*</span></p>
                        </div>

                        <div class="col-12 col-lg-6">
                            <input type="text" placeholder="Your Occupation" name="occupation"
                            value="<?php echo $occupation; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="text-center text-md-end mt-4 mb-5">
                        <button type="sumbit" name="update" class="btn btn-greenshadow btn-lg ps-5 pe-5" href="">Continue</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>