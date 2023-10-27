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
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
	<title>Admin page</title>
	<?php include "links.php";?>
</head>

<body>
	<div class="wrapper">
		<?php include "header.php";?>

		<div class="main">
			<?php include "navbar.php";?>

			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
					<div class="row">
						<div class="col-12 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total users</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $count1;?></h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total sellers</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $count2;?></h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total gigs</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="grid"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $count3;?></h1>
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Orders paid</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $count5;?></h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Orders unpaid</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="loader"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $count6;?></h1>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Orders completed</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="check-square"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3"><?php echo $count4;?></h1>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>

			<?php include "footer.php";?>
		</div>
	</div>
</body>

</html>