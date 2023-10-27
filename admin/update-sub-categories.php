<?php
$c_id=$_GET['id'];
session_start();
if(isset($_SESSION['adm_id'])){
    $id = $_SESSION['adm_id'];
    $name = $_SESSION['name'];
    $p_image = $_SESSION['image'];

	include "connection.php";
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
					<h1 class="h3 mb-3">Update Sub-categories</h1>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
                                    <?php
                                        if(isset($_POST['update'])){
                                            $categorys=$_POST['category'];
                                            $sub_categorys=$_POST['sub_category'];
                                            $category=mysqli_real_escape_string($connection,$categorys);
                                            $sub_category=mysqli_real_escape_string($connection,$sub_categorys);
                                            $update="UPDATE `categories` SET `category`='$category',`sub_category`='$sub_category'
                                            WHERE `id`='$c_id'";
                                            $query=mysqli_query($connection,$update);
                                            if($query){
                                                ?>
                                                <script>
                                                    alert("The Sub-category has been updated.");
                                                    window.location.href="show-sub-categories.php";
                                                </script>
                                                <?php
                                            }else{
                                                echo 'alert("The Sub-category was not updated.")';
                                            }
                                        }

                                        $select="SELECT * FROM `categories` WHERE `id`='$c_id'";
                                        $run=mysqli_query($connection,$select);
                                        $data=mysqli_fetch_assoc($run);
                                    ?>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
											<label class="form-label">Category</label>
                                            <select class="form-select form-select-lg" type="select" name="category">
                                                <option value="Logo & Brand Identity" <?php echo ($data['category'] == 'Logo & Brand Identity') ? 'selected' : ''; ?>>Logo & Brand Identity</option>
                                                <option value="Art & Illustrations" <?php echo ($data['category'] == 'Art & Illustrations') ? 'selected' : ''; ?>>Art & Illustrations</option>
                                                <option value="Web & App Design" <?php echo ($data['category'] == 'Web & App Design') ? 'selected' : ''; ?>>Web & App Design</option>
                                                <option value="Product & Gaming" <?php echo ($data['category'] == 'Product & Gaming') ? 'selected' : ''; ?>>Product & Gaming</option>
                                                <option value="Visual Design" <?php echo ($data['category'] == 'Visual Design') ? 'selected' : ''; ?>>Visual Design</option>
                                                <option value="Marketting Design" <?php echo ($data['category'] == 'Marketting Design') ? 'selected' : ''; ?>>Marketting Design</option>
                                                <option value="Architecture & Building Design" <?php echo ($data['category'] == 'Architecture & Building Design') ? 'selected' : ''; ?>>Architecture & Building Design</option>
                                                <option value="Fashion & Merchandise" <?php echo ($data['category'] == 'Fashion & Merchandise') ? 'selected' : ''; ?>>Fashion & Merchandise</option>
                                                <option value="3D Design" <?php echo ($data['category'] == '3D Design') ? 'selected' : ''; ?>>3D Design</option>
                                                <option value="Website Development" <?php echo ($data['category'] == 'Website Development') ? 'selected' : ''; ?>>Website Development</option>
                                                <option value="Website Platform" <?php echo ($data['category'] == 'Website Platform') ? 'selected' : ''; ?>>Website Platform</option>
                                                <option value="Software Development" <?php echo ($data['category'] == 'Software Development') ? 'selected' : ''; ?>>Software Development</option>
                                                <option value="Software Developers" <?php echo ($data['category'] == 'Software Developers') ? 'selected' : ''; ?>>Software Developers</option>
                                                <option value="Mobile App Development" <?php echo ($data['category'] == 'Mobile App Development') ? 'selected' : ''; ?>>Mobile App Development</option>
                                                <option value="Game Development" <?php echo ($data['category'] == 'Game Development') ? 'selected' : ''; ?>>Game Development</option>
                                                <option value="AI Developments" <?php echo ($data['category'] == 'AI Developments') ? 'selected' : ''; ?>>AI Developments</option>
                                                <option value="Chatbot" <?php echo ($data['category'] == 'Chatbot') ? 'selected' : ''; ?>>Chatbot</option>
                                                <option value="Miscellaneous" <?php echo ($data['category'] == 'Miscellaneous') ? 'selected' : ''; ?>>Miscellaneous</option>
                                                <option value="Search" <?php echo ($data['category'] == 'Search') ? 'selected' : ''; ?>>Search</option>
                                                <option value="Social" <?php echo ($data['category'] == 'Social') ? 'selected' : ''; ?>>Social</option>
                                                <option value="Media & Techniques" <?php echo ($data['category'] == 'Media & Techniques') ? 'selected' : ''; ?>>Media & Techniques</option>
                                                <option value="Analytics & Strategies" <?php echo ($data['category'] == 'Analytics & Strategies') ? 'selected' : ''; ?>>Analytics & Strategies</option>
                                                <option value="Industry & Purpose-Specific" <?php echo ($data['category'] == 'Industry & Purpose-Specific') ? 'selected' : ''; ?>>Industry & Purpose-Specific</option>
                                                <option value="Miscellaneous" <?php echo ($data['category'] == 'Miscellaneous') ? 'selected' : ''; ?>>Miscellaneous</option>
                                                <option value="Editing & Post-Production" <?php echo ($data['category'] == 'Editing & Post-Production') ? 'selected' : ''; ?>>Editing & Post-Production</option>
                                                <option value="Social & Marketting Videos" <?php echo ($data['category'] == 'Social & Marketting Videos') ? 'selected' : ''; ?>>Social & Marketting Videos</option>
                                                <option value="Animation" <?php echo ($data['category'] == 'Animation') ? 'selected' : ''; ?>>Animation</option>
                                                <option value="Filmed Video Production" <?php echo ($data['category'] == 'Filmed Video Production') ? 'selected' : ''; ?>>Filmed Video Production</option>
                                                <option value="Explainer Videos" <?php echo ($data['category'] == 'Explainer Videos') ? 'selected' : ''; ?>>Explainer Videos</option>
                                                <option value="Product Videos" <?php echo ($data['category'] == 'Product Videos') ? 'selected' : ''; ?>>Product Videos</option>
                                                <option value="Miscellaneous" <?php echo ($data['category'] == 'Miscellaneous') ? 'selected' : ''; ?>>Miscellaneous</option>
                                                <option value="Content Writing" <?php echo ($data['category'] == 'Content Writing') ? 'selected' : ''; ?>>Content Writing</option>
                                                <option value="Editing & Critique" <?php echo ($data['category'] == 'Editing & Critique') ? 'selected' : ''; ?>>Editing & Critique</option>
                                                <option value="Career Writing" <?php echo ($data['category'] == 'Career Writing') ? 'selected' : ''; ?>>Career Writing</option>
                                                <option value="Business & Marketing Copy" <?php echo ($data['category'] == 'Business & Marketing Copy') ? 'selected' : ''; ?>>Business & Marketing Copy</option>
                                                <option value="Translation & Transcription" <?php echo ($data['category'] == 'Translation & Transcription') ? 'selected' : ''; ?>>Translation & Transcription</option>
                                                <option value="Miscellaneous" <?php echo ($data['category'] == 'Miscellaneous') ? 'selected' : ''; ?>>Miscellaneous</option>
                                                <option value="Music Production & Writing" <?php echo ($data['category'] == 'Music Production & Writing') ? 'selected' : ''; ?>>Music Production & Writing</option>
                                                <option value="Audio Engineering & Post Production" <?php echo ($data['category'] == 'Audio Engineering & Post Production') ? 'selected' : ''; ?>>Audio Engineering & Post Production</option>
                                                <option value="Voice Over & Narration" <?php echo ($data['category'] == 'Voice Over & Narration') ? 'selected' : ''; ?>>Voice Over & Narration</option>
                                                <option value="Streaming & Audio" <?php echo ($data['category'] == 'Streaming & Audio') ? 'selected' : ''; ?>>Streaming & Audio</option>
                                                <option value="DJing" <?php echo ($data['category'] == 'DJing') ? 'selected' : ''; ?>>DJing</option>
                                                <option value="Sound & Design" <?php echo ($data['category'] == 'Sound & Design') ? 'selected' : ''; ?>>Sound & Design</option>
                                                <option value="Lessons & Transcriptions" <?php echo ($data['category'] == 'Lessons & Transcriptions') ? 'selected' : ''; ?>>Lessons & Transcriptions</option>
                                                <option value="Business Formation" <?php echo ($data['category'] == 'Business Formation') ? 'selected' : ''; ?>>Business Formation</option>
                                                <option value="Legal Services" <?php echo ($data['category'] == 'Legal Services') ? 'selected' : ''; ?>>Legal Services</option>
                                                <option value="Business Growth" <?php echo ($data['category'] == 'Business Growth') ? 'selected' : ''; ?>>Business Growth</option>
                                                <option value="General & Administrative" <?php echo ($data['category'] == 'General & Administrative') ? 'selected' : ''; ?>>General & Administrative</option>
                                                <option value="Sales & Customer Care" <?php echo ($data['category'] == 'Sales & Customer Care') ? 'selected' : ''; ?>>Sales & Customer Care</option>
                                                <option value="Professional Development" <?php echo ($data['category'] == 'Professional Development') ? 'selected' : ''; ?>>Professional Development</option>
                                                <option value="Accounting & Finance" <?php echo ($data['category'] == 'Accounting & Finance') ? 'selected' : ''; ?>>Accounting & Finance</option>
                                                <option value="Miscellaneous" <?php echo ($data['category'] == 'Miscellaneous') ? 'selected' : ''; ?>>Miscellaneous</option>
                                                <option value="Data Collection" <?php echo ($data['category'] == 'Data Collection') ? 'selected' : ''; ?>>Data Collection</option>
                                                <option value="Data Analysis" <?php echo ($data['category'] == 'Data Analysis') ? 'selected' : ''; ?>>Data Analysis</option>
                                                <option value="Data Management" <?php echo ($data['category'] == 'Data Management') ? 'selected' : ''; ?>>Data Management</option>
                                                <option value="Data Storage" <?php echo ($data['category'] == 'Data Storage') ? 'selected' : ''; ?>>Data Storage</option>
                                                <option value="Products & Lifestyle" <?php echo ($data['category'] == 'Products & Lifestyle') ? 'selected' : ''; ?>>Products & Lifestyle</option>
                                                <option value="People & Scenes" <?php echo ($data['category'] == 'People & Scenes') ? 'selected' : ''; ?>>People & Scenes</option>
                                                <option value="Local Photography" <?php echo ($data['category'] == 'Local Photography') ? 'selected' : ''; ?>>Local Photography</option>
                                                <option value="Miscellaneous" <?php echo ($data['category'] == 'Miscellaneous') ? 'selected' : ''; ?>>Miscellaneous</option>
                                                <option value="Build your AI app" <?php echo ($data['category'] == 'Build your AI app') ? 'selected' : ''; ?>>Build your AI app</option>
                                                <option value="Get your data right" <?php echo ($data['category'] == 'Get your data right') ? 'selected' : ''; ?>>Get your data right</option>
                                                <option value="AI Artists" <?php echo ($data['category'] == 'AI Artists') ? 'selected' : ''; ?>>AI Artists</option>
                                                <option value="Creative services" <?php echo ($data['category'] == 'Creative services') ? 'selected' : ''; ?>>Creative services</option>
                                                <option value="Refine AI with experts" <?php echo ($data['category'] == 'Refine AI with experts') ? 'selected' : ''; ?>>Refine AI with experts</option>
                                            </select>
										</div>
										<div class="mb-3">
											<label class="form-label">Sub-category</label>
											<input class="form-control form-control-lg" type="text" name="sub_category"
                                            value="<?php echo $data['sub_category'];?>" placeholder="Enter the Sub-category" />
										</div>
                                        <div class="mb-3 text-end">
                                            <button type="submit" name="update" class="btn btn-dark">Update Sub-category</button>
                                        </div>
                                    </form>
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