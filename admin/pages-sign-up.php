<?php
session_start();
if(isset($_SESSION['adm_id'])){
    $id = $_SESSION['adm_id'];
    $name = $_SESSION['name'];
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
	<title>Sign Up</title>
	<?php include "links.php";?>
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Get started</h1>
							<p class="lead">
								Start creating the best possible user experience for you customers.
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
								<?php
									include "connection.php";
									if(isset($_POST['create'])){
										$name = $_POST['name'];
										$email = $_POST['email'];
										$password = $_POST['password']; 
										$insert_query = "INSERT INTO `admin_register`(`name`, `email`, `password`) 
										VALUES ('$name','$email','$password')";
										$result_query = mysqli_query($connection, $insert_query);
											if($result_query){?>
												<script>
													alert("Registration successful.");
													window.location.href = "pages-sign-in.php";
												</script>
											<?php }else{?>
												<script>
													alert("Registration was unsuccessful.");
												</script>
											<?php }
									}
								?>
									<form method="POST" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Full name</label>
											<input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name" />
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter password" />
										</div>
										<div class="d-grid gap-2 mt-3">
											<button type="submit" name="create" class="btn btn-lg btn-primary">Sign up</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="text-center mb-3">
							Already have account? <a href="pages-sign-in.php">Log In</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>