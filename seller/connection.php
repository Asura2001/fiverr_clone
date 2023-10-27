<?php
    $username = "root";
    $password = "";
    $server = "localhost";
    $database = "fiver_clone";

// connection Query

    $connection = mysqli_connect($server, $username, $password, $database);

    if($connection){
        ?>
        <script>
            // alert('Connection Successfull.');
        </script>

    <?php } else{ ?>

        <script>
            alert('Connection Failed.');
        </script>
        
        <?php } ?>