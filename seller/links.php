<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
<link rel="stylesheet" href="./assets/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<script>
    <?php if(!isset($_SESSION['customer_id'])){ ?>
    window.addEventListener('scroll',(a)=>{
        const navbar = document.querySelector('.navbar');
        if(window.pageYOffset>0){
            navbar.classList.add("bg-white");
            navbar.classList.remove("bg-transparent");

        }else{
            navbar.classList.remove("bg-white");
            navbar.classList.add("bg-transparent");
        }
    });

    window.addEventListener('scroll',(e)=>{
        const searchbar = document.querySelector('.searchbar');
        if(window.pageYOffset>120){
            searchbar.classList.remove("d-none");

        }else{
            searchbar.classList.add("d-none");
        }
    });

    window.addEventListener('scroll',(i)=>{
        const categories = document.querySelector('.categories');
        if(window.pageYOffset>120){
            categories.classList.remove("d-none");
            categories.classList.add("bg-white");

        }else{
            categories.classList.add("d-none");
            categories.classList.remove("bg-white");
        }
    });
    <?php } ?>

    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
    }};
</script>