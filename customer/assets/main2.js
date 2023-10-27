//logo slider

$('.logos-slider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: true,
    dots: false,
    pauseOnHover: false,
    responsive: [{
    breakpoint: 769,
    settings: {
    slidesToShow: 3
    }
    }, {
    breakpoint: 426,
    settings: {
    slidesToShow: 1
    }
    }]
    });