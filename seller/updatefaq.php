<?php
                                    include('connection.php');
                                    $faq_id = $_GET['id'];
                                    if(isset($_POST["update_faq"])){
                                        $question = $_POST["question"];
                                        $answer = $_POST["answer"];
                                        $gig_id = $_POST['gig_id'];
                                        $update_query = "UPDATE `faq` SET `question`='$question',`answer`='$answer' 
                                        WHERE id=$faq_id";
                                        $result_query = mysqli_query($connection, $update_query);
                    
                                        if($result_query){
                                            $redirect_url="description_&_faq.php?id=" . $gig_id;
                                            echo "<script>window.location.href='$redirect_url'</script>";
                                        }else{
                                            ?>
                                            <script>
                                                alert("Sorry, the data could not be updated.");
                                            </script>
                                            <?php
                                        } }
?>