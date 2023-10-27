<?php
session_start();
if(isset($_SESSION['adm_id'])){
    $id = $_SESSION['adm_id'];
    $name = $_SESSION['name'];
    $p_image = $_SESSION['image'];

	include "connection.php";
	$select="SELECT * FROM `categories`";
	$run=mysqli_query($connection,$select);
    $row=mysqli_num_rows($run);
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
	<title>Show Sub-categories</title>
	<?php include "links.php";?>
</head>

<body>
	<div class="wrapper">
		<?php include "header.php";?>

		<div class="main">
			<?php include "navbar.php";?>

			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3">All Sub-categories</h1>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body text-center">
                                    <?php if($row>0){?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Categories</th>
                                                <th scope="col">Sub-categories</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php while($result = mysqli_fetch_array($run)){
                                                $id=$result['id']; 
                                                $categories=$result['category']; 
                                                $sub_categories=$result['sub_category']; 
                                            ?>
                                            <tr>
                                                <td class="fw-bold">
                                                    <?php echo $id;?>
                                                </td>
                                                <td>
                                                    <?php echo $categories;?>
                                                </td>
                                                <td>
                                                    <?php echo $sub_categories;?>
                                                </td>
                                                <td>
                                                    <a href="update-sub-categories.php?id=<?php echo $id;?>" 
                                                    class="btn btn-warning"><i class="mb-1" data-feather="edit-2"></i> Edit</a>
                                                </td>
                                                <td>
                                                    <a href="delete-sub-categories.php?id=<?php echo $id;?>"
                                                    class="btn btn-danger"><i class="mb-1" data-feather="trash"></i> Delete</a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                    <?php }else{?>
                                    <h2 class="card-text p-5">No Sub-categories added yet</h2>
                                    <?php }?>
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