
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
    <link rel="stylesheet" type="text/css" href="assets/css/color1.css">

</head>

<body>


    <!-- pre-loader start -->
    <div class="loader-wrapper img-gif">
        <img src="assets/images/loader.gif" alt="">
    </div>
    <!-- pre-loader end -->


    <!-- header start -->
       <?php include APPPATH.'views/includes/header.php';?>
    <!--  header end -->


    <!-- breadcrumb start -->
    <section class="breadcrumb-section pt-0">
        <img src="assets/images/inner-bg.jpg" class="bg-img img-fluid blur-up lazyload" alt="">
        <div class="breadcrumb-content">
            <div>
                <h2>login</h2>
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">login</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="title-breadcrumb">Rica</div>
    </section>
    <!-- breadcrumb end -->


    <!-- section start -->
    <section class="section-b-space dark-cls animated-section">
        <img src="assets/images/cab/grey-bg.jpg" alt="" class="img-fluid blur-up lazyload bg-img">
        <div class="animation-section">
            <div class="cross po-1"></div>
            <div class="cross po-2"></div>
            <div class="round po-4"></div>
            <div class="round po-5"></div>
            <div class="round r-y po-8"></div>
            <div class="square po-10"></div>
            <div class="square po-11"></div>
        </div>
        <div class="container">
            <div class="row">

                <div class="offset-lg-3 col-lg-6 offset-sm-2 col-sm-8 col-12">
                    <div class="col-md-12">                 
                    <?php
                    if(!empty($this->session->userdata('error_message'))){
                        ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                <?php echo $this->session->userdata('error_message');?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>    
                    <?php
                    if(!empty($this->session->userdata('success_message'))){
                        ?>
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                                <?php echo $this->session->userdata('success_message');?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                    <div class="account-sign-in">
                        <div class="title">
                            <h3>Login</h3>
                        </div>
                        <div class="login-with">
                            <h6>log in with</h6>
                            <div class="login-social row">
                                <div class="col">
                                    <a class="boxes">
                                        <img src="assets/images/icon/social/facebook.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                        <h6>facebook</h6>
                                    </a>
                                </div>
                                <div class="col">
                                    <a class="boxes">
                                        <img src="assets/images/icon/social/google.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                        <h6>google</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="divider">
                                <h6>OR</h6>
                            </div>
                        </div>
                        <form action="<?php echo base_url('login')?>" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">user name or Email address</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with
                                    anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">&nbsp;
                                <label class="form-check-label" for="exampleCheck1">remember me</label>
                            </div>
                            <div class="button-bottom">
                                <button type="submit" class="w-100 btn btn-solid">login</button>
                                <div class="divider">
                                    <h6>or</h6>
                                </div>
                                <a href="#"  class="w-100 btn btn-solid btn-outline">create account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->


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
