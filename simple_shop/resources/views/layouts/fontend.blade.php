<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('fontend')}}/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title> Product.com </title>



</head>
<body>
<!--nav start-->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#"><img src="{{url('fontend')}}/image/logo.png" class="logoStyle" alt="logo"></a>

            <form class="d-flex" action="" method="GET">
                <input name="search" class="form-control sharchBarWidth" type="search" placeholder="Search Product..." required>
                <button class="btn sharchbtnStyle" type="submit"><i class="fas fa-search"></i></button>

            </form>


            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <div class="d-flex justify-content-end sharchLeftMargin">
                    <img src="{{url('fontend')}}/image/man.jpg" alt="" width="40" height="40" class="imgStyle">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            User Name
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Product</a></li>
                        </ul>
                    </li>
                </div>
            </ul>
        </div>
    </div>
</nav>
<!--nav end-->

<!--product curd section start-->
<div class="container">

    <div class="row" style="margin-top:80px ;">
        <div class="col-md-3 mt-3">
            <a href="#">
                <div class="card" style="width: 100%;">
                    <img src="{{url('fontend')}}/image/productImage/image.jpg" class="card-img-top cardImageStyle" alt="...">
                    <div class="card-body">
                        <div class="">
                            <h5 class="card-title cardTextStyle">Mackbook</h5>
                            <p class="card-text cardTextStyle">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <p class="cardNameStyle cardTextStyle">Jamal ali
                                <span class="lovePosition">
                                    <i class="fas fa-heart"></i>
                                    <i class="fas fa-heart"></i>
                                    <i class="fas fa-heart"></i>
                                    <i class="fas fa-heart"></i>
                                    <i class="fas fa-heart"></i>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination d-flex justify-content-center mt-3">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<!--product curd section end-->

<!-- footer start -->
<div class="footerBackgroundColor">
    <div class="container">
        <p class="footerTextColor d-flex justify-content-center">
            Product Company © 2021 - All Right Reserved
        </p>
    </div>
</div>
<!-- footer end -->

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
</body>
</html>
