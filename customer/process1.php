<?php
    include "connection.php";
    if(isset($_POST["lan_update"])){
    $language = $_POST["language"];
    $l_level = $_POST["level"];
    $l_id = $_GET['id'];

    $update_query = "UPDATE `language` SET `language`='$language',`level`='$l_level' WHERE id=$l_id";
    
    $result_query = mysqli_query($connection, $update_query);
    
        if($result_query){
        ?>
        <script>
            window.location.href='profile.php';
        </script>
        <?php
        } else{
        ?>
        <script>
        alert("Language not updated.");
        </script>
        <?php
        }
    } 
?>

<?php
    if(isset($_POST["skill_update"])){
    $skill = $_POST["skill"];
    $s_level = $_POST["level"];
    $s_id = $_GET['id'];

    $update_query = "UPDATE `skills` SET `skill`='$skill',`level`='$s_level' WHERE id=$s_id";
    
    $result_query = mysqli_query($connection, $update_query);
    
        if($result_query){
        ?>
        <script>
            window.location.href='profile.php';
        </script>
        <?php
        } else{
        ?>
        <script>
        alert("Language not updated.");
        </script>
        <?php
        }
    } 
?>

<?php
    if(isset($_POST["edu_update"])){
        $country = $_POST["country"];
        $education = $_POST["education"];
        $title = $_POST["title"];
        $major = $_POST["major"];
        $year = $_POST["year"];
        $e_id = $_GET['id'];

    $update_query = "UPDATE `education` SET `country`='$country',`education`='$education',
    `title`='$title',`major`='$major',`year`='$year' WHERE id=$e_id";
    
    $result_query = mysqli_query($connection, $update_query);
    
        if($result_query){
        ?>
        <script>
            window.location.href='profile.php';
        </script>
        <?php
        } else{
        ?>
        <script>
        alert("Language not updated.");
        </script>
        <?php
        }
    } 
?>

<?php
    if(isset($_POST["cert_update"])){
        $certificate = $_POST["certificate"];
        $certified = $_POST["certified"];
        $year = $_POST["year"];
        $c_id = $_GET['id'];

    $update_query = "UPDATE `certificate` SET `certificate`='$certificate',`certified`='$certified',`year`='$year' WHERE id=$c_id";
    
    $result_query = mysqli_query($connection, $update_query);
    
        if($result_query){
        ?>
        <script>
            window.location.href='profile.php';
        </script>
        <?php
        } else{
        ?>
        <script>
        alert("Language not updated.");
        </script>
        <?php
        }
    } 
?> 