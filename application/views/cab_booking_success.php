
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="One Way Call Taxi">
    <meta name="keywords" content="One Way Call Taxi">
    <meta name="author" content="One Way Call Taxi">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <title>One Way Call Taxi</title>

    <!--Google font-->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <!-- Animation -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="assets/css/color3.css">

</head>

<body>


    <!-- pre-loader start -->
    <div class="loader-wrapper img-gif">
        <img src="../assets/images/loader.gif" alt="">
    </div>
    <!-- pre-loader end -->


    <!-- header start -->
    <?php include APPPATH.'views/includes/header.php';?>
    <!--  header end -->


    <!-- breadcrumb start -->
    <section class="breadcrumb-section flight-sec pt-0">
        <img src="assets/images/cab/breadcrumb.jpg" class="bg-img img-fluid blur-up lazyload" alt="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-right breadcrumb-content pt-0">
                        <div>
                            <h2>booking success</h2>
                            <nav aria-label="breadcrumb" class="theme-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">booking success</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->


    <!-- section start -->
    <section class="section-b-space success-section">
        <div class="container">
            <div class="row success-detail mt-0">
                <div class="col">
                    <img src="assets/images/cab/car/2.png" class="img-fluid blur-up lazyload" alt="">
                    <h2>Your Ride Is confirmed. We will contact you shortly..👍</h2>
                    <a href="<?php echo base_url()?>" class="btn btn-solid color1">Go To Home</a>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->


    <!-- footer start -->
   <?php include APPPATH.'views/includes/footer.php';?>
    <!-- footer end -->


    <!-- tap to top -->
    <div class="tap-top">
        <div>
            <i class="fas fa-angle-up"></i>
        </div>
    </div>
    <!-- tap to top end -->


    <!-- setting start -->
    <div class="theme-setting">
        <div class="dark">
            <input class="tgl tgl-skewed" id="dark" type="checkbox">
            <label class="tgl-btn" data-tg-off="Dark" data-tg-on="Light" for="dark"></label>
        </div>
        <div class="rtl">
            <input class="tgl tgl-skewed" id="rtl" type="checkbox">
            <label class="tgl-btn" data-tg-off="RTL" data-tg-on="LTR" for="rtl"></label>
        </div>
    </div>
    <!-- setting end -->


    <!-- latest jquery-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- filter js -->
    <script src="assets/js/filter.js"></script>
    <script src="assets/js/isotope.min.js"></script>

    <!-- slick js-->
    <script src="assets/js/slick.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- Theme js-->
    <script src="assets/js/script.js"></script>

</body>

</html>
