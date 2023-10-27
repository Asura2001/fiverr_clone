<?php
include "connection.php";
session_start();
if(isset($_SESSION['customer_id'])){
    ?>
<script>
    window.location.href = "main.php";
</script>
<?php } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiverr - Freelance Services Marketplace</title>
    <?php include "links.php"; ?>
</head>

<body>
    <?php include "header.php"; ?>

    <main>
        <section class="text-light">
            <div class="container-fluid">
                <div class="row">
                    <div class="col p-0">
                        <div class="carousel">
                            <div id="carouselExampleInterval" class="carousel slide carousel-fade"
                                data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active" data-bs-interval="2000">
                                        <img src="./assets/images/jenny-2x.jpeg"
                                            class="d-none d-md-none d-lg-block w-100">
                                        <img src="./assets/images/jenny-blank-2x.png"
                                            class="d-none d-md-block d-lg-none w-100">
                                        <img src="./assets/images/jenny-blank-2x.png"
                                            class="d-block d-md-none d-lg-none" height="300px">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="./assets/images/colin-2x.jpeg"
                                            class="d-none d-md-none d-lg-block w-100">
                                        <img src="./assets/images/colin-blank-2x.jpg"
                                            class="d-none d-md-block d-lg-none w-100">
                                        <img src="./assets/images/colin-blank-2x.jpg"
                                            class="d-block d-md-none d-lg-none" height="300px">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="./assets/images/scarlett-2x.jpeg"
                                            class="d-none d-md-none d-lg-block w-100">
                                        <img src="./assets/images/scarlett-blank-2x.jpg"
                                            class="d-none d-md-block d-lg-none w-100">
                                        <img src="./assets/images/scarlett-blank-2x.jpg"
                                            class="d-block d-md-none d-lg-none" height="300px">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="./assets/images/jordan-2x.jpeg"
                                            class="d-none d-md-none d-lg-block w-100">
                                        <img src="./assets/images/jenny-blank-2x.png"
                                            class="d-none d-md-block d-lg-none w-100">
                                        <img src="./assets/images/jenny-blank-2x.png"
                                            class="d-block d-md-none d-lg-none" height="300px">
                                    </div>
                                    <div class="carousel-item" data-bs-interval="2000">
                                        <img src="./assets/images/christina-2x.jpeg"
                                            class="d-none d-md-none d-lg-block w-100">
                                        <img src="./assets/images/christina-blank-2x.jpg"
                                            class="d-none d-md-block d-lg-none w-100">
                                        <img src="./assets/images/christina-blank-2x.jpg"
                                            class="d-block d-md-none d-lg-none" height="300px">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-text">
                                <h1>Find the right freelance<br>service, right away</h1>
                                <form class="d-block d-lg-flex mt-5">
                                    <input class="form-control search" type="search"
                                        placeholder="Search for any service...">
                                        <div class="col">
                                        <button class="btn btn-lg btn-success w-100 mt-1 mt-lg-0" type="submit"><i
                                            class="fa fa-search ps-1 pe-1 d-none d-lg-block"></i><span
                                            class="d-block d-lg-none">Search</span></button>
                                        </div>
                                </form>
                                <div class="mt-4 d-none d-lg-block">
                                    <span class="fw-bold me-2">Popular:</span>
                                    <button
                                        class="btn btn-sm btn-outline-light rounded-pill ps-3 pe-3 fw-bold me-2">Website
                                        Design</button>
                                    <button
                                        class="btn btn-sm btn-outline-light rounded-pill ps-3 pe-3 fw-bold me-2">Wordpress</button>
                                    <button
                                        class="btn btn-sm btn-outline-light rounded-pill ps-3 pe-3 fw-bold me-2">Logo
                                        Design</button>
                                    <button class="btn btn-sm btn-outline-light rounded-pill ps-3 pe-3 fw-bold me-2">AI
                                        Services</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-4 bg-light d-flex justify-content-center">
                        <p class="text-muted mt-3 d-none d-lg-block">Trusted by:</p>
                        <img src="./assets/images/meta.12b5e5c.png" class="ms-2 ms-lg-5" alt="Meta">
                        <img src="./assets/images/google.61e78c8.png" class="ms-5 d-none d-lg-block" alt="Google">
                        <img src="./assets/images/netflix.96c5e3f.png" class="ms-2 ms-lg-5" alt="Netflix">
                        <img src="./assets/images/pandg.0f4cfc2.png" class="ms-5 d-none d-lg-block" alt="P&G">
                        <img src="./assets/images/paypal.305e264.png" class="ms-2 ms-lg-5" alt="PayPal">
                    </div>
                </div>
            </div>
        </section>

        <section class="popular-services pt-3 pt-lg-5 pb-5">
            <div class="container-fluid">
                <div class="row pt-3 pt-lg-5 pb-3">
                    <div class="col">
                        <h1>Popular Services</h1>
                    </div>
                </div>
                <div class="row text-light pb-5">
                    <div class="col">
                        <div class="logos-slider slider">
                            <div class="slide">
                                <img class="img rounded" src="./assets/images/ai-artists-2x.png" class="img-fluid">
                                <div class="text">
                                    <p class="small mb-0">Add talent to AI</p>
                                    <h4>AI Artist</h4>
                                </div>
                            </div>
                            <div class="slide">
                                <img class="img rounded" src="./assets/images/logo-design-2x.png">
                                <div class="text">
                                    <p class="small mb-0">Build your brand</p>
                                    <h4>Logo Design</h4>
                                </div>
                            </div>
                            <div class="slide">
                                <img class="img rounded" src="./assets/images/wordpress-2x.png">
                                <div class="text">
                                    <p class="small mb-0">Customize your site</p>
                                    <h4>WordPress</h4>
                                </div>
                            </div>
                            <div class="slide">
                                <img class="img rounded" src="./assets/images/voice-over-2x.png">
                                <div class="text">
                                    <p class="small mb-0">Share your message</p>
                                    <h4>Voice Over</h4>
                                </div>
                            </div>
                            <div class="slide">
                                <img class="img rounded" src="./assets/images/animated-explainer-2x.png">
                                <div class="text">
                                    <p class="small mb-0">Engage your audience</p>
                                    <h4>Video Explainer</h4>
                                </div>
                            </div>
                            <div class="slide">
                                <img class="img rounded" src="./assets/images/social-2x.png">
                                <div class="text">
                                    <p class="small mb-0">Reach more customer</p>
                                    <h4>Social Media</h4>
                                </div>
                            </div>
                            <div class="slide">
                                <img class="img rounded" src="./assets/images/seo-2x.png">
                                <div class="text">
                                    <p class="small mb-0">Unlock growth online</p>
                                    <h4>SEO</h4>
                                </div>
                            </div>
                            <div class="slide">
                                <img class="img rounded" src="./assets/images/illustration-2x.png">
                                <div class="text">
                                    <p class="small mb-0">Color your dreams</p>
                                    <h4>Illustration</h4>
                                </div>
                            </div>
                            <div class="slide">
                                <img class="img rounded" src="./assets/images/translation-2x.png">
                                <div class="text">
                                    <p class="small mb-0">Go global</p>
                                    <h4>Translation</h4>
                                </div>
                            </div>
                            <div class="slide">
                                <img class="img rounded" src="./assets/images/data-entry-2x.png">
                                <div class="text">
                                    <p class="small mb-0">Learn your business</p>
                                    <h4>Data Entry</h4>
                                </div>
                            </div>
                            <div class="slide">
                                <img class="img rounded" src="./assets/images/book-covers-2x.png">
                                <div class="text">
                                    <p class="small mb-0">Showcase your story</p>
                                    <h4>Book Covers</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-lightblue pt-5 pb-5">
            <div class="container">
                <div class="row pt-4">
                    <div class="col-12 col-lg-5">
                        <h3 class="fw-bold pb-4">The best part? Everything.</h1>

                            <h5 class="pb-2"><i class="fa-regular fa-circle-check text-muted"></i> Stick to your budget
                            </h5>
                            <h6 class="text-muted mb-4">Find the right service for every price point. No hourly rates,
                                just project-based pricing.</h6>
                            <h5 class="pb-2"><i class="fa-regular fa-circle-check text-muted"></i> Get quality work done
                                quickly</h5>
                            <h6 class="text-muted mb-4">Hand your project over to a talented freelancer in minutes, get
                                long-lasting results.</h6>
                            <h5 class="pb-2"><i class="fa-regular fa-circle-check text-muted"></i> Pay when you're happy
                            </h5>
                            <h6 class="text-muted mb-4">Upfront quotes mean no surprises. Payments only get released
                                when you approve.</h6>
                            <h5 class="pb-2"><i class="fa-regular fa-circle-check text-muted"></i> Count on 24/7 support
                            </h5>
                            <h6 class="text-muted mb-4">Our round-the-clock support team is available to help anytime,
                                anywhere.</h6>
                    </div>

                    <div class="col-12 col-lg-7">
                        <video class="img-fluid mt-5 rounded" src="./assets/videos/video1.mp4" controls></video>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-5 pb-5 categories-image-holder">
            <div class="container">
                <div class="row pt-5 pb-5">
                    <div class="col">
                        <h2 class="fw-bold">You need it, we've got it</h2>
                    </div>
                </div>

                <div class="row pb-4">
                    <div class="offset-lg-1 col-6 col-md-4 col-lg-2 text-center">
                        <a href="#" class="text-reset text-decoration-none">
                            <img src="./assets/images/graphics-design.91dfe44.svg" width="60px">
                            <p class="mt-1 categories">Graphics & Design</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="#" class="text-reset text-decoration-none">
                            <img src="./assets/images/online-marketing.a3e9794.svg" width="60px">
                            <p class="mt-1 categories">Digital Marketting</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="#" class="text-reset text-decoration-none">
                            <img src="./assets/images/writing-translation.a787f2f.svg" width="60px">
                            <p class="mt-1 categories">Writing & Translation</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="#" class="text-reset text-decoration-none">
                            <img src="./assets/images/video-animation.1356999.svg" width="60px">
                            <p class="mt-1 categories">Videos & Animation</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="#" class="text-reset text-decoration-none">
                            <img src="./assets/images/music-audio.ede4c90.svg" width="60px">
                            <p class="mt-1 categories">Music & Audio</p>
                        </a>
                    </div>
                    <div class="offset-lg-1 col-6 col-md-4 col-lg-2 text-center">
                        <a href="#" class="text-reset text-decoration-none">
                            <img src="./assets/images/programming.6ee5a90.svg" width="60px">
                            <p class="mt-1 categories">Programming & Tech</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="#" class="text-reset text-decoration-none">
                            <img src="./assets/images/business.fabc3a7.svg" width="60px">
                            <p class="mt-1 categories">Business</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="#" class="text-reset text-decoration-none">
                            <img src="./assets/images/lifestyle.112b348.svg" width="60px">
                            <p class="mt-1 categories">Lifestyle</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="#" class="text-reset text-decoration-none">
                            <img src="./assets/images/data.855fe95.svg" class="mt-3" width="60px">
                            <p class="mt-2 categories">Data</p>
                        </a>
                    </div>
                    <div class="col-6 col-md-4 col-lg-2 text-center">
                        <a href="#" class="text-reset text-decoration-none">
                            <img src="./assets/images/photography.0cf5a3f.svg" width="60px">
                            <p class="mt-1 categories">Photography</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-darkblue text-light pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-5">
                        <div class="d-flex">
                            <img src="./assets/images/fiver.svg" width="100px">
                            <h4 class="d-inline ms-2 mt-3">Business Solutions</h4>
                        </div>
                        <h2 class="mt-4">Advanced solutions and professional talent for businesses</h2>

                        <div class="d-flex pt-4">
                            <img src="./assets/images/starrycheck.svg" width="25px">
                            <div class="ms-3">
                                <h5 class="mb-0">Fiverr Pro</h5>
                                <p class="mb-0">Access top freelancers and professional business tools for any project
                                </p>
                            </div>
                        </div>

                        <div class="d-flex pt-4">
                            <img src="./assets/images/starrycheck.svg" width="25px">
                            <div class="ms-3">
                                <h5 class="mb-0">Fiverr Certified</h5>
                                <p class="mb-0">Build your own branded marketplace of certified experts</p>
                            </div>
                        </div>

                        <div class="d-flex pt-4">
                            <img src="./assets/images/starrycheck.svg" width="25px">
                            <div class="ms-3">
                                <h5 class="mb-0">Fiverr Enterprise</h5>
                                <p class="mb-0">Manage your freelance workforce and onboard additional talent with an
                                    end-to-end SaaS solution</p>
                            </div>
                        </div>
                    </div>

                    <div class="offset-lg-1 col-12 col-lg-6 mt-5">
                        <img src="./assets/images/EN.png" class="img-fluid">
                    </div>
                    <div class="d-none d-lg-block mt-5">
                        <button class="btn btn-light ps-4 pe-4 fw-bold">Learn More</button>
                    </div>
                    <div class="d-block d-lg-none mt-5">
                        <button class="btn btn-light w-100 fw-bold">Learn More</button>
                    </div>
                </div>
            </div>
        </section>

        <section class="popular-services pt-5 pb-5 d-none d-lg-block">
            <div class="container-fluid">
                <div class="row text-light pt-5 pb-5">
                    <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="carousel2">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="d-flex text-dark">
                                    <img src="./assets/images/testimonial-video-still-rooted.jpeg" class="w-50">
                                    <div class="ms-3">
                                        <h4 class="text-muted">Kay Kim, Co-Founder <img
                                                src="./assets/images/rooted-logo-x2.7da3bc9.png" class="img-fluid"></h4>
                                        <blockquote class="font-domaine fw-bold fs-2"><i>"It's extremely exciting that
                                                Fiverr has
                                                freelancers from all over the world — it broadens the talent pool. One
                                                of the best things about Fiverr is that while we're sleeping, someone's
                                                working."</i></blockquote>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="d-flex text-dark">
                                    <img src="./assets/images/testimonial-video-still-haerfest.jpeg" class="w-50">
                                    <div class="ms-3 mt-5">
                                        <h4 class="text-muted">Tim and Dan Joo, Co-Founders <img
                                                src="./assets/images/haerfest-logo-x2.934ab63.png" class="img-fluid">
                                        </h4>
                                        <blockquote class="font-domaine fw-bold fs-2"><i>"When you want to create a
                                                business bigger than yourself, you need a lot of help. That's what
                                                Fiverr does."</i></blockquote>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="d-flex text-dark">
                                    <img src="./assets/images/testimonial-video-still-naadam.jpeg" class="w-50">
                                    <div class="ms-3 mt-3">
                                        <h4 class="text-muted">Caitlin Tormey, Chief Commercial Officer <img
                                                src="./assets/images/naadam-logo-x2.a79031d.png" class="img-fluid">
                                        </h4>
                                        <blockquote class="font-domaine fw-bold fs-2"><i>"We've used Fiverr for Shopify
                                                web development, graphic design, and backend web development. Working
                                                with Fiverr makes my job a little easier every day."</i></blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-5 pb-5 logo-maker-holder">
            <div class="container">
                <div class="logo-maker">
                    <div class="row d-none d-lg-block">
                        <div class="col">
                            <img src="./assets/images/logo-maker-banner-wide-desktop-1352-2x.png" class="img-fluid">
                            <div class="text-light logo-maker-text">
                                <div class="d-flex">
                                    <h3>fiverr</h3>
                                    <p class="ms-1 mb-0 fs-4">logo maker.</p>
                                </div>
                                <h2>Make an incredible logo</h2>
                                <h2><i>in minutes</i></h2>
                                <p>Pre-designed by top talent. Just add your touch.</p>
                                <a class="btn btn-light text-primary fw-bold ps-4 pe-4">Try Fiverr Logo Maker</a>
                            </div>
                        </div>
                    </div>
                    <div class="row d-block d-lg-none">
                        <div class="col">
                            <div class="text-light p-4">
                                <div class="d-flex">
                                    <h3>fiverr</h3>
                                    <p class="ms-1 mb-0 fs-4">logo maker.</p>
                                </div>
                                <h2>Make an incredible logo</h2>
                                <h2><i>in minutes</i></h2>
                                <p>Pre-designed by top talent. Just add your touch.</p>
                                <a class="btn btn-light text-primary fw-bold ps-4 pe-4">Try Fiverr Logo Maker</a>
                            </div>
                        </div>
                        <div class="col">
                            <img src="./assets/images/logo-maker-banner-tablet-852-2x.png" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="inspiring-work pt-5 pb-5 bg-light">
            <div class="container-fluid">
                <div class="row pt-5 pb-5">
                    <div class="col">
                        <h1>Inspiring work made on Fiverr</h1>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col">
                        <div class="logos-slider slider">
                            <div class="slide">
                                <div class="card">
                                    <img src="./assets/images/christophbrandl.jpeg" class="img2">
                                    <div class="card-body ps-0 pe-0">
                                        <div class="d-flex mt-2 ms-2">
                                            <img src="./assets/images/alien.png" class="w-25 border">
                                            <div class="ms-2 mt-2">
                                                <h6 class="card-text mb-0">Illustration</h6>
                                                <p class="mb-0 small text-muted">by christophbrandl</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="card">
                                    <img src="./assets/images/noneyn.jpeg" class="img2">
                                    <div class="card-body ps-0 pe-0">
                                        <div class="d-flex mt-2 ms-2">
                                            <img src="./assets/images/lady1.jpeg" class="w-25 border">
                                            <div class="ms-2 mt-2">
                                                <h6 class="card-text small mb-0">Potraits & Caricatures</h6>
                                                <p class="mb-0 small text-muted">by noneyn</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="card">
                                    <img src="./assets/images/passionshake.jpeg" class="img2">
                                    <div class="card-body ps-0 pe-0">
                                        <div class="d-flex mt-2 ms-2">
                                            <img src="./assets/images/lady3.jpeg" class="w-25 border">
                                            <div class="ms-2 mt-2">
                                                <h6 class="card-text small mb-0">Product Photography</h6>
                                                <p class="mb-0 small text-muted">by passionshake</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="card">
                                    <img src="./assets/images/skydesigner.png" class="img2">
                                    <div class="card-body ps-0 pe-0">
                                        <div class="d-flex mt-2 ms-2">
                                            <img src="./assets/images/s.png" class="w-25 border">
                                            <div class="ms-2 mt-2">
                                                <h6 class="card-text small mb-0">Web & Mobile Design</h6>
                                                <p class="mb-0 small text-muted">by skydesigner</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="card">
                                    <img src="./assets/images/spickex.jpeg" class="img2">
                                    <div class="card-body ps-0 pe-0">
                                        <div class="d-flex mt-2 ms-2">
                                            <img src="./assets/images/lady3.jpeg" class="w-25 border">
                                            <div class="ms-2 mt-2">
                                                <h6 class="card-text small mb-0">Flyer Design</h6>
                                                <p class="mb-0 small text-muted">by spickex</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="card">
                                    <img src="./assets/images/annapietrangeli.jpeg" class="img2">
                                    <div class="card-body ps-0 pe-0">
                                        <div class="d-flex mt-2 ms-2">
                                            <img src="./assets/images/lady2.jpeg" class="w-25 border">
                                            <div class="ms-2 mt-2">
                                                <h6 class="card-text small mb-0">Book Design</h6>
                                                <p class="mb-0 small text-muted">by annapietrangeli</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="card">
                                    <img src="./assets/images/eveeelin.jpeg" class="img2">
                                    <div class="card-body ps-0 pe-0">
                                        <div class="d-flex mt-2 ms-2">
                                            <img src="./assets/images/lady5.png" class="w-25 border">
                                            <div class="ms-2 mt-2">
                                                <h6 class="card-text small mb-0">Logo Design</h6>
                                                <p class="mb-0 small text-muted">by eveeelin</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <section class="guides pt-5 pb-5">
            <div class="container-fluid">
                <div class="row pt-5 pb-3">
                    <div class="col">
                        <h1>Guides to help you grow</h1>
                    </div>
                </div>
                <div class="row pb-5">
                    <div class="col">
                        <div class="logos-slider slider">
                            <div class="slide">
                                <img height="175px" src="./assets/images/side hustle.webp">
                                <div class="mt-2">
                                    <h6>start a side business</h6>
                                </div>
                            </div>
                            <div class="slide">
                                <img height="175px" src="./assets/images/business logo design-fiverr guide.webp">
                                <div class="mt-2">
                                    <h6>Create a logo for your business</h6>
                                </div>
                            </div>
                            <div class="slide">
                                <img height="175px" src="./assets/images/home based online business-fiverr.webp">
                                <div class="mt-2">
                                    <h6>Start an online business and work from home</h6>
                                </div>
                            </div>
                            <div class="slide">
                                <img height="175px" src="./assets/images/Howtobuildawebsitefromscratch.webp">
                                <div class="mt-2">
                                    <h6>Build your website from scratch</h6>
                                </div>
                            </div>
                            <div class="slide">
                                <img height="175px" src="./assets/images/growwithAI.webp">
                                <div class="mt-2">
                                    <h6>Grow your business with AI</h6>
                                </div>
                            </div>
                            <div class="slide">
                                <img height="175px" src="./assets/images/ecommerce.webp">
                                <div class="mt-2">
                                    <h6>Ecommerce Businesss Ideas</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-5 pb-5 signup-text-holder">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="signup-text">
                            <img src="./assets/images/bg-signup-1400-x1.png" class="img-fluid d-none d-md-none d-lg-block">
                            <img src="./assets/images/scarlett-blank-2x.jpg" class="img-fluid d-none d-md-block d-lg-none">
                            <img src="./assets/images/scarlett-blank-2x.jpg" height="200px" class="w-100 d-block d-md-none d-lg-none">
                            <div class="signup text-light">
                                <h1>Suddenly it's all so <i>doable.</i></h1>
                                <div class="offset-1 offset-lg-0 col-10 col-lg-3">
                                    <a class="btn btn-success w-100 mt-4">Join Fiverr</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include "footer.php"; ?>
</body>

</html>