<?php
session_start();
include "connection.php";
if(isset($_SESSION['adm_id'])){
	?><script>window.location.href="index.php"</script><?php
}else{
	if(isset($_POST["login"])){
		$email= mysqli_real_escape_string($connection, $_POST['email']);
		$password= mysqli_real_escape_string($connection, $_POST['password']);
	
		$select_query = "SELECT * FROM `admin_register` WHERE `email`='$email' AND `password`='$password'";
	
		$result_query = mysqli_query($connection, $select_query);
		$run_result = mysqli_num_rows($result_query);
	
		if($run_result > 0){
			$started_session = mysqli_fetch_assoc($result_query);
			$_SESSION['adm_id'] = $started_session['id'];
			$_SESSION['name'] = $started_session['name'];
			$_SESSION['image'] = $started_session['image'];
			header('location:index.php');
	
		?>
		<script>
			alert("login Successful.");
		</script>
		<?php
	   }
	   else{
		?>
		<script>
			alert("Email or password is incorrect.");
		</script>
		<?php
	   }
	}
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
	<title>Sign In</title>
	<?php include "links.php";?>
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back!</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-3">
									<form method="POST" enctype="multipart/form-data">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
										</div>
										<div class="d-grid gap-2 mt-3">
											<button type="submit" name="login" class="btn btn-lg btn-primary">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>

</body>

</html>