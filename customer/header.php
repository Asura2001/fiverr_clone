<header class="header <?php if(!isset($_SESSION['customer_id'])){?>sticky-top<?php } if(isset($_SESSION['customer_id'])){?><?php }?>">
    <nav
        class="navbar navbar-expand-lg navbar-light fw-bold d-block <?php if(isset($_SESSION['customer_id'])){?>bg-white<?php }?>">
        <div class="container-fluid logindropdown">
            <a class="navbar-brand m-auto mt-lg-2 ms-lg-5 ps-5 p-lg-0" href="./index.php">
                <img src="./assets/images/icons8-fiverr-50.png" alt="fiver-logo">
            </a>
            <button class="navbar-toggler m-1 mt-lg-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if(isset($_SESSION['customer_id'])){ ?>
                <form class="d-lg-flex d-none ms-3 mt-3">
                    <input class="form-control loginsearch" type="search" placeholder="What are you looking for today?">
                    <button class="btn btn-dark" type="submit"><i class="fa fa-search ps-1 pe-1"></i></button>
                </form>
                <ul class="navbar-nav mt-3 me-lg-5 text-center m-lg-auto">
                    <li class="nav-item mt-lg-1 me-lg-2">
                        <a class="nav-link d-none d-lg-block" href="fillerpage.php">
                            <i class="fa-regular fa-bell text-muted fs-4"></i>
                        </a>
                    </li>
                    <li class="nav-item mt-1 me-lg-2">
                        <a class="nav-link fs-4" href="fillerpage.php">
                            <i class="fa-regular fa-envelope text-muted d-none d-lg-block"></i>
                            <span class="d-block d-lg-none">Messages</span>
                        </a>
                    </li>
                    <li class="nav-item mt-lg-1 me-lg-2">
                        <a class="nav-link d-none d-lg-block" href="fillerpage.php">
                            <i class="fa-regular fa-heart text-muted fs-4"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown orders me-lg-2">
                        <a class="btn nav-link text-muted fw-bold fs-5" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">Orders</a>
                            <ul class="dropdown-menu p-0 pt-2 m-0 overflow-y" aria-labelledby="dropdownMenuLink">
                            <?php
                            $select = "SELECT * FROM `orders` WHERE user_id = $id";
                            $select_result = mysqli_query($connection, $select);
                            $order_rows = mysqli_num_rows($select_result);
                            if($order_rows > 0){
                            while($order_row = mysqli_fetch_assoc($select_result)) {
                                $order_id = $order_row['id'];
                                $order_gig_id = $order_row['gig_id'];
                                $quantity = $order_row['quantity'];
                                $price = $order_row['price'];
                                $status = $order_row['status'];
                                $select2 = "SELECT * FROM `gigs` WHERE id = $order_gig_id";
                                $select_result2 = mysqli_query($connection, $select2);
                                $gig_row = mysqli_fetch_assoc($select_result2);
                                $select3 = "SELECT * FROM `gallery` WHERE gig_id = $order_gig_id";
                                $select_result3 = mysqli_query($connection, $select3);
                                $gallery_row = mysqli_fetch_assoc($select_result3);
                                ?>
                                <li class="p-0 mb-0">
                                    <a class="dropdown-item ps-3 text-muted text-wrap" href="payment_processing.php?id=<?php echo $order_id;?>">
                                        <div class="d-flex mb-2">
                                            <img src="../seller/assets/upload/<?php echo $gallery_row['image1'];?>" class="w-25" height="75px">
                                            <div class="ms-3">
                                                <p class="mb-0">Price: $<?php echo $price;?></p>
                                                <p class="mb-0">Quantity: <?php echo $quantity;?></p>
                                                <p class="mb-0">Status: <?php echo $status;?></p>
                                            </div>
                                        </div>
                                        <h6 class="mb-1"><?php echo $gig_row['title']?></h6>
                                    </a>
                                </li>
                                <hr class="mb-1 mt-1">
                                <?php }}else{ ?>
                                <li class="p-0 mb-0">
                                    <h6 class="card-body text-center">No order has been placed yet.</h6>
                                </li>
                                <?php }?>
                            </ul>
                    </li>
                    <li class="nav-item dropstart">
                        <a class="btn text-muted fs-5 nav-link fw-bold" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <img width="30px" class="rounded-pill mb-1" src="<?php echo($p_image != NULL) ? './assets/upload/'.$p_image : './assets/images/custom.png';?>">
                            <?php echo $fname; ?><i class="ms-1 fa-solid fa-caret-down small"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="profile.php">Profile</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="fillerpage.php">Post a request</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-success" href="fillerpage.php">Refer a friend</a></li>
                            <hr class="mb-0 ms-3 me-3">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="fillerpage.php">Settings</a></li>
                            <?php
                                        $check_query = "SELECT * FROM `seller_register` WHERE user_id = $id";
                                        $check_query_result = mysqli_query($connection, $check_query);
                                        $row_query = mysqli_num_rows($check_query_result);
                                        if($row_query > 0){
                                            $session_query = mysqli_fetch_assoc($check_query_result);
                                            $phone = $session_query['phone'];
                                        }
            
                                        if($row_query > 0 AND $phone != NULL){
                                    ?>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="../seller/index.php">Switch
                                    to Selling</a></li>
                            <?php } else {?>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted"
                                    href="../seller/onboarding.php">Become a seller</a></li>
                            <?php }?>
                            <hr class="mb-0 ms-3 me-3">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="fillerpage.php">English
                                    <i class="fa-solid fa-globe ms-2"></i></a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="fillerpage.php">PKR</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="fillerpage.php">Help & support</a></li>
                            <hr class="mb-0 ms-3 me-3">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="logout.php" onclick="signOut();">Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <?php } else{ ?>
                <form class="d-lg-flex d-none d-sm-none searchbar ms-3">
                    <input class="form-control search" type="search" placeholder="What are you looking for today?">
                    <button class="btn btn-dark" type="submit"><i class="fa fa-search ps-1 pe-1"></i></button>
                </form>
                <ul class="navbar-nav ms-auto mb-2 text-center mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="fillerpage.php" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Business solutions
                        </a>
                        <ul class="dropdown-menu text-center text-lg-start" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="fillerpage.php" target="_blank">
                                    <h6>Fiverr Pro</h6>
                                    <p class="text-muted small">Top freelancers and professional business<br>tools for
                                        any project</p>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="fillerpage.php" target="_blank">
                                    <h6>Fiverr Certified</h6>
                                    <p class="text-muted small">Your own branded marketplace of certified<br>experts</p>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="fillerpage.php" target="_blank">
                                    <h6>Fiverr Enterprise</h6>
                                    <p class="text-muted small">SaaS to manage your freelance workforce and<br>onboard
                                        additional talent</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown explore">
                        <a class="nav-link dropdown-toggle" href="fillerpage.php" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Explore
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="container">
                                <div class="row text-center text-lg-start">
                                    <div class="col-12 col-lg-6 p-0">
                                        <li>
                                            <a class="dropdown-item" href="fillerpage.php" target="_blank">
                                                <h6>Discover</h6>
                                                <p class="text-muted small">Inspiring projects made on<br>Fiverr</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="fillerpage.php" target="_blank">
                                                <h6>Guides</h6>
                                                <p class="text-muted small">In-depth guides covering<br>business topics
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="fillerpage.php" target="_blank">
                                                <h6>Learn</h6>
                                                <p class="text-muted small">Professional online courses,<br>led by
                                                    experts</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="fillerpage.php" target="_blank">
                                                <h6>Logo Maker</h6>
                                                <p class="text-muted small">Create your logo instantly</p>
                                            </a>
                                        </li>
                                    </div>

                                    <div class="col-12 col-lg-6 p-0">
                                        <li>
                                            <a class="dropdown-item" href="fillerpage.php" target="_blank">
                                                <h6>Community</h6>
                                                <p class="text-muted small">Connect with Fiverr's team<br>and community
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="fillerpage.php" target="_blank">
                                                <h6>Podcast</h6>
                                                <p class="text-muted small">Inside tips from top<br>minds</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="fillerpage.php" target="_blank">
                                                <h6>Blog</h6>
                                                <p class="text-muted small">News, information and<br>community stories
                                                </p>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="fillerpage.php" target="_blank">
                                                <h6>Fiverr Workspace</h6>
                                                <p class="text-muted small">Once place to manage your<br>business</p>
                                            </a>
                                        </li>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fillerpage.php"><i class="fa-solid fa-globe me-1"></i>English</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="fillerpage.php">Become a seller</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signin.php">Sign in</a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="btn btn-outline-success ms-2" href="register.php">Join</a>
                    </li>
                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link text-success" href="register.php">Join</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
        <div class="container-fluid ms-2">
            <div class="categories <?php if(!isset($_SESSION['customer_id'])){?>d-none<?php } if(isset($_SESSION['customer_id'])){?>bg-white<?php }?>">
                <div class="container-fluid p-0 d-none d-lg-block">
                    <div class="row">
                        <div class="col text-center">
                            <ul class="navbar-nav mb-2 mt-2">
                                <li class="nav-item dropdown1 me-lg-3">
                                    <p class="btn mb-0 pe-0 ps-0" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                    aria-expanded="false">Graphics & Design</p>
                                    <?php
                                    $select_c="SELECT * FROM `categories`";
                                    $run=mysqli_query($connection,$select_c);
                                    $Data=array();
                                    while ($row = mysqli_fetch_assoc($run)) {
                                        $Data[] = $row;
                                    }
                                    ?>
                                    <ul class="dropdown-menu">
                                        <div class="container-fluid">
                                            <div class="row pt-4 pb-4">
                                                <!-- Logo & Brand Identity Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Logo & Brand Identity</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Logo & Brand Identity'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Art & Illustrations Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Art & Illustrations</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Art & Illustrations'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Web & App Design Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Web & App Design</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Web & App Design'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Product & Gaming Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Product & Gaming</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Product & Gaming'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Visual Design Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Visual Design</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Visual Design'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Marketting Design Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Marketting Design</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Marketting Design'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Architecture & Building Design Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Architecture & Building Design</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Architecture & Building Design'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Fashion & Merchandise Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Fashion & Merchandise</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Fashion & Merchandise'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- 3D Design Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">3D Design</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='3D Design'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown2 me-lg-3">
                                    <p class="btn mb-0 pe-0 ps-0" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                    aria-expanded="false">Programming & Tech</p>
                                    <ul class="dropdown-menu">
                                        <div class="container-fluid">
                                            <div class="row pt-4 pb-4">
                                                <!-- Website Development Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Website Development</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Website Development'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Software Development Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Software Development</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Software Development'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Mobile App Development Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Mobile App Development</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Mobile App Development'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Game Development Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Game Development</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Game Development'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- AI Developments Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">AI Developments</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='AI Developments'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Chatbot Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Chatbot</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Chatbot'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Miscellaneous Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Miscellaneous</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Miscellaneous'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown3 me-lg-3">
                                    <p class="btn mb-0 pe-0 ps-0" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                    aria-expanded="false">Digital Marketting</p>
                                    <ul class="dropdown-menu">
                                        <div class="container-fluid">
                                            <div class="row pt-4 pb-4">
                                                <!-- Website Development Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Website Development</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Website Development'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Software Development Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Software Development</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Software Development'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Mobile App Development Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Mobile App Development</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Mobile App Development'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Game Development Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Game Development</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Game Development'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- AI Developments Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">AI Developments</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='AI Developments'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Chatbot Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Chatbot</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Chatbot'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Miscellaneous Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Miscellaneous</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Miscellaneous'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown4 me-lg-3">
                                    <p class="btn mb-0 pe-0 ps-0" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                    aria-expanded="false">Video & Animation</p>
                                    <ul class="dropdown-menu">
                                        <div class="container-fluid">
                                            <div class="row pt-4 pb-4">
                                                <!-- Editing & Post-Production Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Editing & Post-Production</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Editing & Post-Production'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Animation Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Animation</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Animation'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Filmed Video Production Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Filmed Video Production</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Filmed Video Production'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Explainer Videos Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Explainer Videos</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Explainer Videos'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown5 me-lg-3">
                                    <p class="btn mb-0 pe-0 ps-0" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                    aria-expanded="false">Writing & Translation</p>
                                    <ul class="dropdown-menu">
                                        <div class="container-fluid">
                                            <div class="row pt-4 pb-4">
                                                <!-- Content Writing Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Content Writing</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Content Writing'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Editing & Critique Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Editing & Critique</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Editing & Critique'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Business & Marketing Copy Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Business & Marketing Copy</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Business & Marketing Copy'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <!-- Translation & Transcription Subcategories -->
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Translation & Transcription</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Translation & Transcription'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown6 me-lg-3">
                                    <p class="btn mb-0 pe-0 ps-0" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                    aria-expanded="false">Music & Audio</p>
                                    <ul class="dropdown-menu">
                                        <div class="container-fluid">
                                            <div class="row pt-4 pb-4">
                                                <div class="col-4 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Music Production & Writing</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Music Production & Writing'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-4 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Audio Engineering & Post Production</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Audio Engineering & Post Production'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-4 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Voice Over & Narration</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Voice Over & Narration'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-4 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Streaming & Audio</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Streaming & Audio'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-4 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">DJing</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='DJing'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-4 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Sound & Design</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Sound & Design'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-4 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Lessons & Transcriptions</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Lessons & Transcriptions'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown7 me-lg-3">
                                    <p class="btn mb-0 pe-0 ps-0" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                    aria-expanded="false">Business</p>
                                    <ul class="dropdown-menu">
                                        <div class="container-fluid">
                                            <div class="row pt-4 pb-4">
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Business Formation</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Business Formation'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Legal Services</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Legal Services'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Business Growth</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Business Growth'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">General & Administrative</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='General & Administrative'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Sales & Customer Care</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Sales & Customer Care'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Professional Development</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Professional Development'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Accounting & Finance</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Accounting & Finance'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Miscellaneous</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Miscellaneous'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown8 me-lg-3">
                                    <p class="btn mb-0 pe-0 ps-0" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                    aria-expanded="false">Data</p>
                                    <ul class="dropdown-menu">
                                        <div class="container-fluid">
                                            <div class="row pt-4 pb-4">
                                                <div class="col-6 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Data Collection</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Data Collection'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Data Analysis</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Data Analysis'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Data Management</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Data Management'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Data Storage</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Data Storage'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown9 me-lg-3">
                                    <p class="btn mb-0 pe-0 ps-0" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                    aria-expanded="false">Photography</p>
                                    <ul class="dropdown-menu">
                                        <div class="container-fluid">
                                            <div class="row pt-4 pb-4">
                                                <div class="col-6 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Products & Lifestyle</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Products & Lifestyle'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">People & Scenes</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='People & Scenes'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-6">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Local Photography</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Local Photography'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Miscellaneous</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Miscellaneous'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown10">
                                    <p class="btn mb-0 pe-0 ps-0" id="dropdownMenuButton" data-mdb-toggle="dropdown"
                                    aria-expanded="false">AI Services</p>
                                    <ul class="dropdown-menu">
                                        <div class="container-fluid">
                                            <div class="row pt-4 pb-4">
                                                <div class="col-4 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Build your AI app</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Build your AI app'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-4 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Get your data right</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Get your data right'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-4 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">AI Artists</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='AI Artists'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-4 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Creative services</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Creative services'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                                <div class="col-4 mb-3">
                                                    <li>
                                                        <h6 class="ps-3 mb-0">Refine AI with experts</h6>
                                                    </li>
                                                    <?php foreach($Data as $data){
                                                        if($data['category']=='Refine AI with experts'){ ?>
                                                            <li>
                                                                <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                            </li>
                                                    <?php }}?>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="container-fluid p-0 d-block d-lg-none">
                    <div class="row">
                        <div class="col">
                            <ul class="navbar-nav mb-2 mt-2 text-center">
                                <li class="nav-item dropdown me-lg-2">
                                    <p class="btn dropdown-toggle nav-link m-0" role="button" id="dropdownMenuLink1"
                                        data-bs-toggle="dropdown" aria-expanded="false">Graphics & Design</p>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <h6 class="ps-3 mb-0">Logo & Brand Identity</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Logo & Brand Identity'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Art & Illustrations</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Art & Illustrations'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Web & App Design</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Web & App Design'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Product & Gaming</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Product & Gaming'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Visual Design</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Visual Design'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Marketting Design</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Marketting Design'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Architecture & Building Design</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Architecture & Building Design'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Fashion & Merchandise</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Fashion & Merchandise'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">3D Design</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='3D Design'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown2 me-lg-2">
                                    <p class="btn dropdown-toggle nav-link m-0" role="button" id="dropdownMenuLink2"
                                        data-bs-toggle="dropdown" aria-expanded="false">Programming & Tech</p>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <h6 class="ps-3 mb-0">Website Development</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Website Development'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Website Platform</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Website Platform'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Software Development</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Software Development'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Software Developers</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Software Developers'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Mobile App Development</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Mobile App Development'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Game Development</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Game Development'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">AI Developments</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='AI Developments'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Chatbot</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Chatbot'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Miscellaneous</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Miscellaneous'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown3 me-lg-2">
                                    <p class="btn dropdown-toggle nav-link m-0" role="button" id="dropdownMenuLink3"
                                        data-bs-toggle="dropdown" aria-expanded="false">Digital Marketting</p>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <h6 class="ps-3 mb-0">Search</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Search'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Social</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Social'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Media & Techniques</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Media & Techniques'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Analytics & Strategies</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Analytics & Strategies'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Industry & Purpose-Specific</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Industry & Purpose-Specific'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Miscellaneous</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Miscellaneous'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown4 me-lg-2">
                                    <p class="btn dropdown-toggle nav-link m-0" role="button" id="dropdownMenuLink4"
                                        data-bs-toggle="dropdown" aria-expanded="false">Video & Animation</p>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <h6 class="ps-3 mb-0">Editing & Post-Production</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Editing & Post-Production'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Social & Marketting Videos</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Social & Marketting Videos'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Animation</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Animation'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Filmed Video Production</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Filmed Video Production'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Explainer Videos</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Explainer Videos'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Product Videos</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Product Videos'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Miscellaneous</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Miscellaneous'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown5 me-lg-2">
                                    <p class="btn dropdown-toggle nav-link m-0" role="button" id="dropdownMenuLink5"
                                        data-bs-toggle="dropdown" aria-expanded="false">Writing & Translation</p>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <h6 class="ps-3 mb-0">Content Writing</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Content Writing'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Editing & Critique</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Editing & Critique'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Career Writing</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Career Writing'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Business & Marketing Copy</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Business & Marketing Copy'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Translation & Transcription</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Translation & Transcription'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Miscellaneous</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Miscellaneous'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown6 me-lg-2">
                                    <p class="btn dropdown-toggle nav-link m-0" role="button" id="dropdownMenuLink6"
                                        data-bs-toggle="dropdown" aria-expanded="false">Music & Audio</p>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <h6 class="ps-3 mb-0">Music Production & Writing</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Music Production & Writing'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Audio Engineering & Post Production</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Audio Engineering & Post Production'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Voice Over & Narration</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Voice Over & Narration'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Streaming & Audio</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Streaming & Audio'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">DJing</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='DJing'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Sound & Design</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Sound & Design'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Lessons & Transcriptions</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Lessons & Transcriptions'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown7 me-lg-2">
                                    <p class="btn dropdown-toggle nav-link m-0" role="button" id="dropdownMenuLink7"
                                        data-bs-toggle="dropdown" aria-expanded="false">Business</p>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <h6 class="ps-3 mb-0">Business Formation</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Business Formation'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Legal Services</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Legal Services'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Business Growth</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Business Growth'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">General & Administrative</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='General & Administrative'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Sales & Customer Care</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Sales & Customer Care'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Professional Development</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Professional Development'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Accounting & Finance</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Accounting & Finance'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Miscellaneous</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Miscellaneous'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown8 me-lg-2">
                                    <p class="btn dropdown-toggle nav-link m-0" role="button" id="dropdownMenuLink8"
                                        data-bs-toggle="dropdown" aria-expanded="false">Data</p>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <h6 class="ps-3 mb-0">Data Collection</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Data Collection'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Data Analysis</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Data Analysis'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Data Management</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Data Management'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Data Storage</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Data Storage'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown9 me-lg-2">
                                    <p class="btn dropdown-toggle nav-link m-0" role="button" id="dropdownMenuLink9"
                                        data-bs-toggle="dropdown" aria-expanded="false">Photography</p>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <h6 class="ps-3 mb-0">Products & Lifestyle</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Products & Lifestyle'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">People & Scenes</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='People & Scenes'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Local Photography</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Local Photography'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Miscellaneous</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Miscellaneous'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown10">
                                    <p class="btn dropdown-toggle nav-link m-0" role="button" id="dropdownMenuLink10"
                                        data-bs-toggle="dropdown" aria-expanded="false">AI Services</p>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <h6 class="ps-3 mb-0">Build your AI app</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Build your AI app'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Get your data right</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Get your data right'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">AI Artists</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='AI Artists'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Creative services</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Creative services'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                        <li>
                                            <h6 class="ps-3 mb-0">Refine AI with experts</h6>
                                        </li>
                                        <?php foreach($Data as $data){
                                            if($data['category']=='Refine AI with experts'){ ?>
                                                <li>
                                                    <a class="dropdown-item text-muted" href="fillerpage.php"><?php echo $data['sub_category'];?></a>
                                                </li>
                                        <?php }}?>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>