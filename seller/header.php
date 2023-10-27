<header>
    <nav class="navbar navbar-expand-lg fw-bold">
        <div class="container-fluid">
            <a class="navbar-brand mb-lg-1 m-md-auto ps-md-5 ps-lg-4 pe-lg-5" href="./index.php">
                <img src="./assets/images/icons8-fiverr-50.png" alt="fiver-logo">
            </a>
            <button class="navbar-toggler m-1 mt-lg-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-lg-1">
                    <li class="nav-item">
                        <a class="btn nav-link text-muted fw-bold" href="./index.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="btn dropdown-toggle text-muted nav-link fw-bold" role="button"
                        id="dropdownMenuLink3" data-bs-toggle="dropdown" aria-expanded="false">My Business</a>
                        <ul class="dropdown-menu text-center text-lg-start" aria-labelledby="dropdownMenuLink">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="orders.php">Orders</a></li>
                            <hr class="mb-1 mt-1 m-3 d-none d-lg-block">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="./gigs.php">Gigs</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="../customer/profile.php">Profile</a></li>
                            <hr class="mb-1 mt-1 m-3 d-none d-lg-block">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Earnings</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Fiverr Workspace</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="btn dropdown-toggle text-muted nav-link fw-bold" role="button"
                        id="dropdownMenuLink4" data-bs-toggle="dropdown" aria-expanded="false">Growth & Marketting</a>

                        <ul class="dropdown-menu text-center text-lg-start" aria-labelledby="dropdownMenuLink">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="profile.php">Scale Your Business</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Contact</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Fiverr Learn</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="btn dropdown-toggle text-muted nav-link fw-bold" role="button"
                        id="dropdownMenuLink4" data-bs-toggle="dropdown" aria-expanded="false">Analytics</a>

                        <ul class="dropdown-menu text-center text-lg-start" aria-labelledby="dropdownMenuLink">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Overview</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Repeat Business</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav mt-lg-3 mb-1 pe-lg-4">
                    <li class="nav-item">
                        <form class="d-lg-flex ms-3 d-none">
                            <input class="form-control" type="search" placeholder="What are you looking for today?">
                                <button class="btn btn-dark" type="submit"><i class="fa fa-search ps-1 pe-1"></i></button>
                        </form>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link me-2" title="Notifications" href="#">
                            <i class="fa-regular fa-bell text-muted fs-4"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn me-2" title="Messages" href="#">
                            <i class="fa-regular fa-envelope text-muted fs-4 d-none d-lg-block"></i>
                            <span class="d-lg-none text-muted fw-bold">Messages</span>
                        </a>
                    </li>
                    <li class="nav-item dropstart d-none d-lg-block">
                        <a class="btn text-muted fs-5 nav-link p-0 me-3" role="button" title="Help & Resources"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-question text-muted border border-3 p-1 rounded-pill"></i>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Help Center</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Fiverr Forum</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Fiverr Blog</a></li>
                            <hr class="mb-1 mt-1 m-3">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Ask the Community</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Contact Support</a></li>
                        </ul>
                    </li>
                    <li class="list-inline-item dropstart">
                        <a class="btn text-muted fs-5 nav-link p-0 fw-bold mt-1 mt-lg-0" role="button"
                        id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img width="30px" class="rounded-pill mb-1" src="<?php echo($p_image != NULL) ? '../customer/assets/upload/'.$p_image : '../customer/assets/images/custom.png';?>">
                            <?php echo $fname; ?><i class="ms-1 fa-solid fa-caret-down small"></i>
                        </a>
                        <ul class="dropdown-menu text-center text-lg-start" aria-labelledby="dropdownMenuLink">
                            <li class="p-0"><a class="dropdown-item ps-3" href="../customer/signin.php">Switch to Buying</a></li>
                            <hr class="mb-1 mt-1 m-3 d-none d-lg-block">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="../customer/profile.php">Profile</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Refer a friend</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Settings</a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">Billing & Payment</a></li>
                            <hr class="mb-1 mt-1 m-3 d-none d-lg-block">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">English
                                <i class="fa-solid fa-globe ms-2"></i></a></li>
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="#">PKR</a></li>
                            <hr class="mb-1 mt-1 m-3 d-none d-lg-block">
                            <li class="p-0"><a class="dropdown-item ps-3 text-muted" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>