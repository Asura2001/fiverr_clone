<?php
include "connection.php";
session_start();
if(isset($_SESSION['adm_id'])){
    $id = $_SESSION['adm_id'];
    $name = $_SESSION['name'];
	$p_image = $_SESSION['image'];

	$p_query = "SELECT COUNT(*) As count FROM `user_register`";
	$run_p_query = mysqli_query($connection, $p_query);
	while($output1=mysqli_fetch_assoc($run_p_query)){
    	$count1 = $output1['count'];
	}

	$p_query2 = "SELECT COUNT(*) As count FROM `seller_register`";
	$run_p_query2 = mysqli_query($connection, $p_query2);
	while($output2=mysqli_fetch_assoc($run_p_query2)){
    	$count2 = $output2['count'];
	}

	$p_query3 = "SELECT COUNT(*) As count FROM `gigs`";
	$run_p_query3 = mysqli_query($connection, $p_query3);
	while($output3=mysqli_fetch_assoc($run_p_query3)){
    	$count3 = $output3['count'];
	}

	$p_query4 = "SELECT COUNT(*) As count FROM `orders` WHERE `status`='Completed'";
	$run_p_query4 = mysqli_query($connection, $p_query4);
	while($output4=mysqli_fetch_assoc($run_p_query4)){
    	$count4 = $output4['count'];
	}

	$p_query5 = "SELECT COUNT(*) As count FROM `orders` WHERE `status`='Paid'";
	$run_p_query5 = mysqli_query($connection, $p_query5);
	while($output5=mysqli_fetch_assoc($run_p_query5)){
    	$count5 = $output5['count'];
	}

	$p_query6 = "SELECT COUNT(*) As count FROM `orders` WHERE `status`='Unpaid'";
	$run_p_query6 = mysqli_query($connection, $p_query6);
	while($output6=mysqli_fetch_assoc($run_p_query6)){
    	$count6 = $output6['count'];
	}
} else{
    header("location: pages-sign-in.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filler Page</title>
    <?php include "links.php";?>
</head>

<body>
    <div class="wrapper">
		<?php include "header.php";?>

		<div class="main">
			<?php include "navbar.php";?>

			<main class="content">
				<div class="container-fluid p-0">
                    <div class="row m-5">
                        <div class="col m-5 text-center bg-white">
                            <h1 class="p-5 m-5">Filler Page</h1>
                        </div>
                    </div>
			</main>

			<?php include "footer.php";?>
		</div>
	</div>

	<script src="js/app.js"></script>
</body>
</body>

</html>