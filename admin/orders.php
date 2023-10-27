<?php
session_start();
if(isset($_SESSION['adm_id'])){
    $id = $_SESSION['adm_id'];
    $name = $_SESSION['name'];
    $p_image = $_SESSION['image'];

	include "connection.php";
	$select="SELECT * FROM `orders`";
	$run=mysqli_query($connection,$select);
	$session_orders=mysqli_num_rows($run);
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
	<title>Orders</title>
	<?php include "links.php";?>
</head>

<body>
	<div class="wrapper">
		<?php include "header.php";?>

		<div class="main">
			<?php include "navbar.php";?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">Orders</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<?php if($session_orders > 0){?>
								<table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Buyer</th>
                                            <th scope="col">Gig</th>
                                            <th scope="col">Placed on</th>
                                            <th scope="col">Total</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php while($result = mysqli_fetch_array($run)){ 
                                            $order_gig_id = $result['gig_id'];
                                            $user_id = $result['user_id'];
                                            $id = $result['id'];
                                            $select2 = "SELECT * FROM `user_register` WHERE id=$user_id";
                                            $select_result2 = mysqli_query($connection, $select2);
                                            $user_row = mysqli_fetch_assoc($select_result2);
                                            $select3 = "SELECT * FROM `gigs` WHERE id=$order_gig_id";
                                            $select_result3 = mysqli_query($connection, $select3);
                                            $gig_row = mysqli_fetch_assoc($select_result3);
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo $user_row['fname'];?>
                                            </th>
                                            <td>
                                                <?php echo $gig_row['title'];?>
                                            </td>
                                            <td>
                                                <?php echo $result['dated'];?>
                                            </td>
                                            <td>
                                                $<?php echo $result['price']*$result['quantity'];?>
                                            </td>
                                            <td>
                                                <?php echo $result['status'];?>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                  </table>
                                  <?php }else{?><h5 class="text-center p-5">No Orders have been placed yet.</h5><?php } ?>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
			<?php include "footer.php";?>
		</div>
	</div>

	<script src="js/app.js"></script>

</body>

</html>