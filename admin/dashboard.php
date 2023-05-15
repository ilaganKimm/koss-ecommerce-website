<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOSS Admin Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" 
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>
<body>

<div class="main-container d-flex">
    <div class="sidebar" id="side_nav">
        <div class="header-box px-3 pt-3 pb-4 d-flex justify-content-between">
            <h3 class="px-2 me-2 text-white">Dashboard</h3>
            <button class="btn d-md-none d-block close-btn px-2 py-0 text-white"><i class="fas fa-times"></i></button>  
        </div>
        <ul class="list-unstyled px-2">
            <li class="active"><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-list-alt"></i> All Categories </a></li>
            <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-plus-square"></i> Add Category </a></li>
            <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-list-alt"></i> All Products </a></li>
            <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-plus-square"></i> Add Product </a></li>
            <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block d-flex justify-content-between">
                <span><i class="fas fa-list-alt"></i> All Orders</span>
                <span class="bg-danger rounded-pill text-white py-0 px-2">03</span>
            </a></li>
            <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="fas fa-history"></i> Order History </a></li>
        </ul>
        <hr class="h-color mx-2">
        <ul class="list-unstyled px-2">
        <li class=""><a href="#" class="text-decoration-none px-3 py-2 d-block"><i class="far fa-plus-square"></i> Add Product </a></li>
        </ul>
    </div>
    <div class="content">
        <nav class="navbar navbar-expand-md bg-body-tertiary">
            <div class="container-fluid">
                <div class="d-flex justify-content-between d-md-none d-block">
                <button class="btn open-btn px-1 py-0"><i class="fas fa-home-lg-alt"></i></button>  
                    <a class="navbar-brand fs-4" href="#"><span class="bg-dark rounded px-2 py-0 text-white">KOSS</span></a>
                    
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-ellipsis-v"></i>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <form class="d-flex" role="search">
                        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <div class="dashboard-content">
            <h3 class="fs-4 text-center">Admin</h3>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $(".sidebar ul li").on('click', function(){
        $(".sidebar ul li.active").removeClass('active');
        $(this).addClass('active');

    });

    $('.open-btn').on('click', function (){
            $('.sidebar').addClass('active');
            
       
    });

    $('.close-btn').on('click', function (){
            $('.sidebar').removeClass('active');
            
       
    });


</script>
</body>
</html>