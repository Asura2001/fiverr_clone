<?php
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
	<title>Add Sub-categories</title>
	<?php include "links.php";?>
</head>

<body>
	<div class="wrapper">
		<?php include "header.php";?>

		<div class="main">
			<?php include "navbar.php";?>

			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3">Add Sub-categories</h1>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
                                    <?php
                                        if(isset($_POST['add'])){
                                            $categorys=$_POST['category'];
                                            $sub_categorys=$_POST['sub_category'];
                                            $category=mysqli_real_escape_string($connection,$categorys);
                                            $sub_category=mysqli_real_escape_string($connection,$sub_categorys);
                                            $insert="INSERT INTO `categories`(`category`, `sub_category`) 
                                            VALUES ('$category','$sub_category')";
                                            $query=mysqli_query($connection,$insert);
                                            if($query){
                                                ?>
                                                <script>
//                                                    alert("The Sub-category has been added.");
                                                    window.location.href="sub-categories.php";
                                                </script>
                                                <?php
                                            }else{
                                                echo 'alert("The Sub-category was not inserted.")';
                                            }
                                        }
                                    ?>
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="mb-3">
											<label class="form-label">Category</label>
											<select class="form-select form-select-lg" type="select" name="category" required>
                                                <option selected disabled>Select a category</option>
                                                <option value="Logo & Brand Identity">Logo & Brand Identity</option>
                                                <option value="Art & Illustrations">Art & Illustrations</option>
                                                <option value="Web & App Design">Web & App Design</option>
                                                <option value="Product & Gaming">Product & Gaming</option>
                                                <option value="Visual Design">Visual Design</option>
                                                <option value="Marketting Design">Marketting Design</option>
                                                <option value="Architecture & Building Design">Architecture & Building Design</option>
                                                <option value="Fashion & Merchandise">Fashion & Merchandise</option>
                                                <option value="3D Design">3D Design</option>
                                                <option value="Website Development">Website Development</option>
                                                <option value="Website Platform">Website Platform</option>
                                                <option value="Software Development">Software Development</option>
                                                <option value="Software Developers">Software Developers</option>
                                                <option value="Mobile App Development">Mobile App Development</option>
                                                <option value="Game Development">Game Development</option>
                                                <option value="AI Developments">AI Developments</option>
                                                <option value="Chatbot">Chatbot</option>
                                                <option value="Miscellaneous">Miscellaneous</option>
                                                <option value="Search">Search</option>
                                                <option value="Social">Social</option>
                                                <option value="Media & Techniques">Media & Techniques</option>
                                                <option value="Analytics & Strategies">Analytics & Strategies</option>
                                                <option value="Industry & Purpose-Specific">Industry & Purpose-Specific</option>
                                                <option value="Miscellaneous">Miscellaneous</option>
                                                <option value="Editing & Post-Production">Editing & Post-Production</option>
                                                <option value="Social & Marketting Videos">Social & Marketting Videos</option>
                                                <option value="Animation">Animation</option>
                                                <option value="Filmed Video Production">Filmed Video Production</option>
                                                <option value="Explainer Videos">Explainer Videos</option>
                                                <option value="Product Videos">Product Videos</option>
                                                <option value="Miscellaneous">Miscellaneous</option>
                                                <option value="Content Writing">Content Writing</option>
                                                <option value="Editing & Critique">Editing & Critique</option>
                                                <option value="Career Writing">Career Writing</option>
                                                <option value="Business & Marketing Copy">Business & Marketing Copy</option>
                                                <option value="Translation & Transcription">Translation & Transcription</option>
                                                <option value="Miscellaneous">Miscellaneous</option>
                                                <option value="Music Production & Writing">Music Production & Writing</option>
                                                <option value="Audio Engineering & Post Production">Audio Engineering & Post Production</option>
                                                <option value="Voice Over & Narration">Voice Over & Narration</option>
                                                <option value="Streaming & Audio">Streaming & Audio</option>
                                                <option value="DJing">DJing</option>
                                                <option value="Sound & Design">Sound & Design</option>
                                                <option value="Lessons & Transcriptions">Lessons & Transcriptions</option>
                                                <option value="Business Formation">Business Formation</option>
                                                <option value="Legal Services">Legal Services</option>
                                                <option value="Business Growth">Business Growth</option>
                                                <option value="General & Administrative">General & Administrative</option>
                                                <option value="Sales & Customer Care">Sales & Customer Care</option>
                                                <option value="Professional Development">Professional Development</option>
                                                <option value="Accounting & Finance">Accounting & Finance</option>
                                                <option value="Miscellaneous">Miscellaneous</option>
                                                <option value="Data Collection">Data Collection</option>
                                                <option value="Data Analysis">Data Analysis</option>
                                                <option value="Data Management">Data Management</option>
                                                <option value="Data Storage">Data Storage</option>
                                                <option value="Products & Lifestyle">Products & Lifestyle</option>
                                                <option value="People & Scenes">People & Scenes</option>
                                                <option value="Local Photography">Local Photography</option>
                                                <option value="Miscellaneous">Miscellaneous</option>
                                                <option value="Build your AI app">Build your AI app</option>
                                                <option value="Get your data right">Get your data right</option>
                                                <option value="AI Artists">AI Artists</option>
                                                <option value="Creative services">Creative services</option>
                                                <option value="Refine AI with experts">Refine AI with experts</option>
                                            </select>
										</div>
										<div class="mb-3">
											<label class="form-label">Sub-category</label>
											<input class="form-control form-control-lg" type="text" name="sub_category" 
                                            placeholder="Enter the Sub-category" required />
										</div>
                                        <div class="mb-3 text-end">
                                            <button type="submit" name="add" class="btn btn-dark">Add Sub-category</button>
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