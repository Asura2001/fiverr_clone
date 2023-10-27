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

    <main>
        <?php
            $gig_id=$_GET['id'];
            $select = "SELECT * FROM `requirements` WHERE gig_id = $gig_id AND alt_id='0'";
            $select_result = mysqli_query($connection, $select);

            $select2 = "SELECT * FROM `optional_requirements` WHERE gig_id = $gig_id";
            $select_result2 = mysqli_query($connection, $select2);
            $requirements_row2 = mysqli_fetch_assoc($select_result2);
        ?>
        <section class="mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                    <?php 
                        if(isset($_POST['submit'])){
                            $o_answer1 = $_POST['o_answer1'];
                            $o_answer2 = $_POST['o_answer2'];
                            $o_answer3 = $_POST['o_answer3'];
                            $answers = $_POST['answer'];
                            $questions = $_POST['question'];
                            $o_question1 = $_POST['question1'];
                            $o_question2 = $_POST['question2'];
                            $o_question3 = $_POST['question3'];
                            $question1 = mysqli_real_escape_string($connection, $o_question1);
                            $question2 = mysqli_real_escape_string($connection, $o_question2);
                            $question3 = mysqli_real_escape_string($connection, $o_question3);

                            $o_update_query = "UPDATE `optional_requirements` SET `alt_id`='$id',`answer1`='$o_answer1',
                            `answer2`='$o_answer2',`answer3`='$o_answer3' WHERE `gig_id`='$gig_id' AND `alt_id`='0'";
                            $o_update_result = mysqli_query($connection, $o_update_query);
                            $o_insert_query = "INSERT INTO `optional_requirements`(`gig_id`, `question1`, `question2`, `question3`) 
                            VALUES ('$gig_id','$question1','$question2','$question3')";
                            $o_result_query = mysqli_query($connection, $o_insert_query);

                            $question_number = 1;
                            while($requirements_row = mysqli_fetch_assoc($select_result)){
                                $question_id = $requirements_row['id']; // Assuming id is the primary key of your questions table
                                $answer = mysqli_real_escape_string($connection, $answers[$question_number]); // Sanitize user input
                                $question = mysqli_real_escape_string($connection, $questions[$question_number]); // Sanitize user input

                                $update_query = "UPDATE `requirements` SET `alt_id`='$id',`answer`='$answer' WHERE `id`='$question_id'";
                                $update_result = mysqli_query($connection, $update_query);
                                $insert_query = "INSERT INTO `requirements`(`gig_id`, `question`) 
                                VALUES ('$gig_id','$question')";
                                $result_query = mysqli_query($connection, $insert_query);

                                if($update_result){
                                    echo "<script>window.location.href='main.php'</script>";
                                } else {
                                    echo "Error updating answer for Question $question_number: " . mysqli_error($connection);
                                }

                                $question_number++;
                            }
                        }
                    ?>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="question1" value="<?php echo $requirements_row2['question1'];?>">
                            <input type="hidden" name="question2" value="<?php echo $requirements_row2['question2'];?>">
                            <input type="hidden" name="question3" value="<?php echo $requirements_row2['question3'];?>">
                            <div class="optional_questions card">
                                <div class="card-body">
                                    <h5 class="mb-1">Optional questions</h5>
                                    <p class="small text-muted">They are not necessary to answer</p>
                                    <label class="form-label">
                                        <h6><?php echo $requirements_row2['question1'];?></h6>
                                    </label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="o_answer1">
                                    </div>
                                    <label class="form-label">
                                        <h6><?php echo $requirements_row2['question2'];?></h6>
                                    </label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="o_answer2">
                                    </div>
                                    <label class="form-label">
                                        <h6><?php echo $requirements_row2['question3'];?></h6>
                                    </label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="o_answer3">
                                    </div>
                                </div>
                            </div>
                            <div class="seller_questions card mt-3">
                                <div class="card-body">
                                    <h5 class="mb-3">Question(s) from seller</h5>
                                    <?php $question_number=1; while($requirements_row = mysqli_fetch_assoc($select_result)){?>
                                    <label class="form-label">
                                        <h6><?php echo $requirements_row['question'];?></h6>
                                    </label>
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" name="question[<?php echo $question_number; ?>]"
                                        value="<?php echo $requirements_row['question'];?>">
                                        <input type="text" class="form-control" name="answer[<?php echo $question_number; ?>]">
                                    </div>
                                    <?php $question_number++; }?>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" name="submit" class="btn btn-dark w-100">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include "footer.php"; ?>
</body>

</html>