
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="rica">
    <meta name="keywords" content="rica">
    <meta name="author" content="rica">
    <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon" />
    <title>Rica</title>

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">

    <!-- Date-time picker css -->
    <link rel="stylesheet" type="text/css" href="assets/css/datepicker.min.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="assets/css/color1.css">

</head>

<body>


    <!-- header start -->
     <?php include APPPATH.'views/includes/header.php';?>
    <!--  header end -->


    <!-- breadcrumb start -->
    <section class="breadcrumb-section pt-0">
        <img src="assets/images/inner-bg.jpg" class="bg-img img-fluid blur-up lazyload" alt="">
        <div class="breadcrumb-content">
            <div>
                <h2>dashboard</h2>
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="title-breadcrumb">Rica</div>
    </section>
    <!-- breadcrumb end -->


    <!-- section start-->
    <section class="small-section dashboard-section bg-inner" data-sticky_parent>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="pro_sticky_info" data-sticky_column>
                        <div class="dashboard-sidebar">
                            <div class="profile-top">
                                <div class="profile-image">
                                    <img src="../assets/images/avtar/1.jpg" class="img-fluid blur-up lazyload" alt="">
                                    <a class="profile-edit" href="javascript:void(0)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                            <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34">
                                            </path>
                                            <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon>
                                        </svg>
                                    </a>
                                </div>
                                <div class="profile-detail">
                                    <h5>mark enderess</h5>
                                    <h6>+91 123 - 456 - 7890</h6>
                                    <h6>mark.enderess@mail.com</h6>
                                </div>
                            </div>
                            <div class="faq-tab">
                                <ul class="nav nav-tabs" id="top-tab" role="tablist">
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link active"
                                            href="#dashboard">dashboard</a></li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link"
                                            href="#profile">profile</a></li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link"
                                            href="#bookings">bookings</a></li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link" href="#added-card">cards
                                            & payment</a></li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link"
                                            href="#bookmark">bookmark</a></li>
                                    <li class="nav-item"><a data-bs-toggle="tab" class="nav-link"
                                            href="#security">security</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="product_img_scroll" data-sticky_column>
                        <div class="faq-content tab-content" id="top-tabContent">
                            <div class="tab-pane fade show active" id="dashboard">
                                <div class="dashboard-main">
                                    <div class="dashboard-intro">
                                        <h5>welcome! <span>Mark Enderess</span></h5>
                                        <p>you have completed 70% of your profile. add basic info to complete profile.
                                        </p>
                                        <div class="complete-profile">
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="complete-box">
                                                        <i class="far fa-check-square"></i>
                                                        <h6>verified email ID</h6>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="complete-box">
                                                        <i class="far fa-check-square"></i>
                                                        <h6>verified phone number</h6>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="complete-box not-complete">
                                                        <i class="far fa-window-close"></i>
                                                        <h6>complete basic info</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="counter-section">
                                        <div class="row">
                                            <div class="col-xl-3 col-sm-6">
                                                <div class="counter-box">
                                                    <img src="../assets/images/icon/hotel.png"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                    <h3>25</h3>
                                                    <h5>hotel booked</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6">
                                                <div class="counter-box">
                                                    <img src="../assets/images/icon/flight.png"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                    <h3>12</h3>
                                                    <h5>flight booked</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6">
                                                <div class="counter-box">
                                                    <img src="../assets/images/icon/taxi.png"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                    <h3>50</h3>
                                                    <h5>cab booked</h5>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6">
                                                <div class="counter-box">
                                                    <img src="../assets/images/icon/food.png"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                    <h3>40</h3>
                                                    <h5>food ordered</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard-info">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div id="chart">
                                                    <div class="detail-left">
                                                        <ul>
                                                            <li><span class="completed"></span> Completed</li>
                                                            <li><span class="upcoming"></span> Upcoming</li>
                                                            <li><span class="cancelled"></span> Cancelled</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="activity-box">
                                                    <h6>recent activity</h6>
                                                    <ul>
                                                        <li>
                                                            <i class="fas fa-plane"></i>
                                                            Paris to Dubai
                                                            <span>3 days ago</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-plane"></i>
                                                            Paris to Dubai
                                                            <span>23 june</span>
                                                        </li>
                                                        <li class="blue-line">
                                                            <i class="fas fa-hotel"></i>
                                                            hotel sea view
                                                            <span>20 april</span>
                                                        </li>
                                                        <li class="yellow-line">
                                                            <i class="fas fa-taxi"></i>
                                                            Paris To Toulouse
                                                            <span>12 feb</span>
                                                        </li>
                                                        <li>
                                                            <i class="fas fa-plane"></i>
                                                            Paris to Dubai
                                                            <span>14 jan</span>
                                                        </li>
                                                        <li class="blue-line">
                                                            <i class="fas fa-hotel"></i>
                                                            hotel sea view
                                                            <span>12 jan</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <div class="dashboard-box">
                                    <div class="dashboard-title">
                                        <h4>profile</h4>
                                        <span data-bs-toggle="modal" data-bs-target="#edit-profile">edit</span>
                                    </div>
                                    <div class="dashboard-detail">
                                        <ul>
                                            <li>
                                                <div class="details">
                                                    <div class="left">
                                                        <h6>name</h6>
                                                    </div>
                                                    <div class="right">
                                                        <h6>Mark Enderess</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="details">
                                                    <div class="left">
                                                        <h6>birthday</h6>
                                                    </div>
                                                    <div class="right">
                                                        <h6>25/12/1990</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="details">
                                                    <div class="left">
                                                        <h6>gender</h6>
                                                    </div>
                                                    <div class="right">
                                                        <h6>female</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="details">
                                                    <div class="left">
                                                        <h6>street address</h6>
                                                    </div>
                                                    <div class="right">
                                                        <h6>549 Sulphur Springs Road</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="details">
                                                    <div class="left">
                                                        <h6>city/state</h6>
                                                    </div>
                                                    <div class="right">
                                                        <h6>Downers Grove, IL</h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="details">
                                                    <div class="left">
                                                        <h6>zip</h6>
                                                    </div>
                                                    <div class="right">
                                                        <h6>60515</h6>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="dashboard-box">
                                    <div class="dashboard-title">
                                        <h4>login details</h4>
                                    </div>
                                    <div class="dashboard-detail">
                                        <ul>
                                            <li>
                                                <div class="details">
                                                    <div class="left">
                                                        <h6>email address</h6>
                                                    </div>
                                                    <div class="right">
                                                        <h6>mark.enderess@mail.com</h6>
                                                        <span data-bs-toggle="modal"
                                                            data-bs-target="#edit-address">edit</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="details">
                                                    <div class="left">
                                                        <h6>phone no:</h6>
                                                    </div>
                                                    <div class="right">
                                                        <h6>+91 123 - 456 - 7890</h6>
                                                        <span data-bs-toggle="modal" data-bs-target="#edit-phone">edit</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="details">
                                                    <div class="left">
                                                        <h6>password</h6>
                                                    </div>
                                                    <div class="right">
                                                        <h6>&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;</h6>
                                                        <span data-bs-toggle="modal"
                                                            data-bs-target="#edit-password">edit</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bookings">
                                <div class="dashboard-box">
                                    <div class="dashboard-title">
                                        <h4>upcoming booking</h4>
                                    </div>
                                    <div class="dashboard-detail">
                                        <div class="booking-box">
                                            <div class="date-box">
                                                <span class="day">tue</span>
                                                <span class="date">14</span>
                                                <span class="month">aug</span>
                                            </div>
                                            <div class="detail-middle">
                                                <div class="media">
                                                    <div class="icon">
                                                        <i class="fas fa-plane"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">dubai to paris</h6>
                                                        <p>amount paid: <span>$2500</span></p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">ID: aSdsadf5s1f5</h6>
                                                        <p>order date: <span>20 oct, 2020</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-last">
                                                <a href="#"><i class="fas fa-window-close" data-bs-toggle="tooltip"
                                                        data-placement="top" title="cancle booking"></i></a>
                                                <span class="badge bg-info">upcoming</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard-detail">
                                        <div class="booking-box">
                                            <div class="date-box">
                                                <span class="day">tue</span>
                                                <span class="date">14</span>
                                                <span class="month">aug</span>
                                            </div>
                                            <div class="detail-middle">
                                                <div class="media">
                                                    <div class="icon">
                                                        <i class="fas fa-hotel"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">sea view hotel</h6>
                                                        <p>amount paid: <span>$2500</span></p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">ID: aSdsadf5s1f5</h6>
                                                        <p>order date: <span>20 oct, 2020</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-last">
                                                <a href="#"><i class="fas fa-window-close" data-bs-toggle="tooltip"
                                                        data-placement="top" title="cancle booking"></i></a>
                                                <span class="badge bg-info">upcoming</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard-detail">
                                        <div class="booking-box">
                                            <div class="date-box">
                                                <span class="day">tue</span>
                                                <span class="date">14</span>
                                                <span class="month">aug</span>
                                            </div>
                                            <div class="detail-middle">
                                                <div class="media">
                                                    <div class="icon">
                                                        <i class="fas fa-taxi"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">paris to Toulouse</h6>
                                                        <p>amount paid: <span>$2500</span></p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">ID: aSdsadf5s1f5</h6>
                                                        <p>order date: <span>20 oct, 2020</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-last">
                                                <a href="#"><i class="fas fa-window-close" data-bs-toggle="tooltip"
                                                        data-placement="top" title="cancle booking"></i></a>
                                                <span class="badge bg-info">upcoming</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-box">
                                    <div class="dashboard-title">
                                        <h4>past booking</h4>
                                    </div>
                                    <div class="dashboard-detail">
                                        <div class="booking-box">
                                            <div class="date-box">
                                                <span class="day">tue</span>
                                                <span class="date">14</span>
                                                <span class="month">aug</span>
                                            </div>
                                            <div class="detail-middle">
                                                <div class="media">
                                                    <div class="icon">
                                                        <i class="fas fa-plane"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">dubai to paris</h6>
                                                        <p>amount paid: <span>$2500</span></p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">ID: aSdsadf5s1f5</h6>
                                                        <p>order date: <span>20 oct, 2020</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-last">
                                                <span class="badge bg-success">past</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard-detail">
                                        <div class="booking-box">
                                            <div class="date-box">
                                                <span class="day">tue</span>
                                                <span class="date">14</span>
                                                <span class="month">aug</span>
                                            </div>
                                            <div class="detail-middle">
                                                <div class="media">
                                                    <div class="icon">
                                                        <i class="fas fa-hotel"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">sea view hotel</h6>
                                                        <p>amount paid: <span>$2500</span></p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">ID: aSdsadf5s1f5</h6>
                                                        <p>order date: <span>20 oct, 2020</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-last">
                                                <span class="badge bg-success">past</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard-detail">
                                        <div class="booking-box">
                                            <div class="date-box">
                                                <span class="day">tue</span>
                                                <span class="date">14</span>
                                                <span class="month">aug</span>
                                            </div>
                                            <div class="detail-middle">
                                                <div class="media">
                                                    <div class="icon">
                                                        <i class="fas fa-taxi"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">paris to Toulouse</h6>
                                                        <p>amount paid: <span>$2500</span></p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">ID: aSdsadf5s1f5</h6>
                                                        <p>order date: <span>20 oct, 2020</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-last">
                                                <span class="badge bg-success">past</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-box">
                                    <div class="dashboard-title">
                                        <h4>cancelled booking</h4>
                                    </div>
                                    <div class="dashboard-detail">
                                        <div class="booking-box">
                                            <div class="date-box">
                                                <span class="day">tue</span>
                                                <span class="date">14</span>
                                                <span class="month">aug</span>
                                            </div>
                                            <div class="detail-middle">
                                                <div class="media">
                                                    <div class="icon">
                                                        <i class="fas fa-plane"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">dubai to paris</h6>
                                                        <p>amount paid: <span>$2500</span></p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">ID: aSdsadf5s1f5</h6>
                                                        <p>order date: <span>20 oct, 2020</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-last">
                                                <span class="badge bg-secondary">cancelled</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard-detail">
                                        <div class="booking-box">
                                            <div class="date-box">
                                                <span class="day">tue</span>
                                                <span class="date">14</span>
                                                <span class="month">aug</span>
                                            </div>
                                            <div class="detail-middle">
                                                <div class="media">
                                                    <div class="icon">
                                                        <i class="fas fa-hotel"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">sea view hotel</h6>
                                                        <p>amount paid: <span>$2500</span></p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">ID: aSdsadf5s1f5</h6>
                                                        <p>order date: <span>20 oct, 2020</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-last">
                                                <span class="badge bg-secondary">cancelled</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard-detail">
                                        <div class="booking-box">
                                            <div class="date-box">
                                                <span class="day">tue</span>
                                                <span class="date">14</span>
                                                <span class="month">aug</span>
                                            </div>
                                            <div class="detail-middle">
                                                <div class="media">
                                                    <div class="icon">
                                                        <i class="fas fa-taxi"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">paris to Toulouse</h6>
                                                        <p>amount paid: <span>$2500</span></p>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="media-heading">ID: aSdsadf5s1f5</h6>
                                                        <p>order date: <span>20 oct, 2020</span></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="detail-last">
                                                <span class="badge bg-secondary">cancelled</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="added-card">
                                <div class="dashboard-box">
                                    <div class="dashboard-title">
                                        <h4>cards & payment</h4>
                                    </div>
                                    <div class="dashboard-detail">
                                        <div class="row card-payment">
                                            <div class="col-xl-4 col-sm-6">
                                                <div class="payment-card master">
                                                    <div class="card-details">
                                                        <div class="card-number">
                                                            <h3>XXXX-XXXX-XXXX-2510</h3>
                                                        </div>
                                                        <div class="valid-detail">
                                                            <div class="title">
                                                                <span>valid</span>
                                                                <span>thru</span>
                                                            </div>
                                                            <div class="date">
                                                                <h3>12/23</h3>
                                                            </div>
                                                            <div class="primary">
                                                                <span
                                                                    class="badge bg-pill badge-light">primary</span>
                                                            </div>
                                                        </div>
                                                        <div class="name-detail">
                                                            <div class="name">
                                                                <h5>mark jecno</h5>
                                                            </div>
                                                            <div class="card-img">
                                                                <img src="../assets/images/icon/master.png"
                                                                    class="img-fluid blur-up lazyload" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="edit-card">
                                                        <a data-bs-toggle="modal" data-bs-target="#edit-card" href="#"><i
                                                                class="far fa-edit"></i> edit</a>
                                                        <a href="#"><i class="far fa-minus-square"></i> delete</a>
                                                    </div>
                                                </div>
                                                <div class="edit-card-mobile">
                                                    <a data-bs-toggle="modal" data-bs-target="#edit-card" href="#"><i
                                                            class="far fa-edit"></i> edit</a>
                                                    <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                        delete</a>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-6">
                                                <div class="payment-card visa">
                                                    <div class="card-details">
                                                        <div class="card-number">
                                                            <h3>XXXX-XXXX-XXXX-2510</h3>
                                                        </div>
                                                        <div class="valid-detail">
                                                            <div class="title">
                                                                <span>valid</span>
                                                                <span>thru</span>
                                                            </div>
                                                            <div class="date">
                                                                <h3>12/23</h3>
                                                            </div>
                                                        </div>
                                                        <div class="name-detail">
                                                            <div class="name">
                                                                <h5>mark jecno</h5>
                                                            </div>
                                                            <div class="card-img">
                                                                <img src="../assets/images/icon/visa.png"
                                                                    class="img-fluid blur-up lazyload" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="edit-card">
                                                        <a data-bs-toggle="modal" data-bs-target="#edit-card" href="#"><i
                                                                class="far fa-edit"></i> edit</a>
                                                        <a href="#"><i class="far fa-minus-square"></i> delete</a>
                                                    </div>
                                                </div>
                                                <div class="edit-card-mobile">
                                                    <a data-bs-toggle="modal" data-bs-target="#edit-card" href="#"><i
                                                            class="far fa-edit"></i> edit</a>
                                                    <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                        delete</a>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-6">
                                                <div class="payment-card american-express">
                                                    <div class="card-details">
                                                        <div class="card-number">
                                                            <h3>XXXX-XXXX-XXXX-2510</h3>
                                                        </div>
                                                        <div class="valid-detail">
                                                            <div class="title">
                                                                <span>valid</span>
                                                                <span>thru</span>
                                                            </div>
                                                            <div class="date">
                                                                <h3>12/23</h3>
                                                            </div>
                                                        </div>
                                                        <div class="name-detail">
                                                            <div class="name">
                                                                <h5>mark jecno</h5>
                                                            </div>
                                                            <div class="card-img">
                                                                <img src="../assets/images/icon/american.jpg"
                                                                    class="img-fluid blur-up lazyload" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="edit-card">
                                                        <a data-bs-toggle="modal" data-bs-target="#edit-card" href="#"><i
                                                                class="far fa-edit"></i> edit</a>
                                                        <a href="#"><i class="far fa-minus-square"></i> delete</a>
                                                    </div>
                                                </div>
                                                <div class="edit-card-mobile">
                                                    <a data-bs-toggle="modal" data-bs-target="#edit-card" href="#"><i
                                                            class="far fa-edit"></i> edit</a>
                                                    <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                                        delete</a>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-6">
                                                <div class="payment-card add-card">
                                                    <div data-bs-toggle="modal" data-bs-target="#add-card"
                                                        class="card-details">
                                                        <div>
                                                            <i class="fas fa-plus"></i>
                                                            <h5>add new card</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="bookmark">
                                <div class="dashboard-box">
                                    <div class="dashboard-title">
                                        <h4>my bookmark</h4>
                                    </div>
                                    <div class="product-wrapper-grid ratio3_2 special-section grid-box">
                                        <div class="row content grid">
                                            <div class="col-xl-4 col-sm-6 grid-item">
                                                <div class="special-box">
                                                    <div class="special-img">
                                                        <a href="#">
                                                            <img src="../assets/images/tour/tour/7.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                                        </a>
                                                        <div class="content_inner">
                                                            <a href="#">
                                                                <h5>Beautiful bali</h5>
                                                            </a>
                                                            <h6>6N 7D</h6>
                                                        </div>
                                                        <div class="top-icon">
                                                            <a href="#" class="" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Remove from Wishlist"><i
                                                                    class="fas fa-times"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-6 grid-item">
                                                <div class="special-box">
                                                    <div class="special-img">
                                                        <a href="#">
                                                            <img src="../assets/images/tour/tour/8.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                                        </a>
                                                        <div class="content_inner">
                                                            <a href="#">
                                                                <h5>best of europe</h5>
                                                            </a>
                                                            <h6>6N 7D</h6>
                                                        </div>
                                                        <div class="top-icon">
                                                            <a href="#" class="" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Remove from Wishlist"><i
                                                                    class="fas fa-times"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-6 grid-item">
                                                <div class="special-box">
                                                    <div class="special-img">
                                                        <a href="#">
                                                            <img src="../assets/images/hotel/room/13.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                                        </a>
                                                        <div class="content_inner">
                                                            <a href="#">
                                                                <h5>sea view hotel</h5>
                                                            </a>
                                                            <h6>$250/ night</h6>
                                                        </div>
                                                        <div class="top-icon">
                                                            <a href="#" class="" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Remove from Wishlist"><i
                                                                    class="fas fa-times"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-6 grid-item">
                                                <div class="special-box">
                                                    <div class="special-img">
                                                        <a href="#">
                                                            <img src="../assets/images/restaurant/environment/3.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                                        </a>
                                                        <div class="content_inner">
                                                            <a href="#">
                                                                <h5>italian restro</h5>
                                                            </a>
                                                            <h6>fast food | $25 for two</h6>
                                                        </div>
                                                        <div class="top-icon">
                                                            <a href="#" class="" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Remove from Wishlist"><i
                                                                    class="fas fa-times"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-6 grid-item">
                                                <div class="special-box">
                                                    <div class="special-img">
                                                        <a href="#">
                                                            <img src="../assets/images/flights/flight-breadcrumb2.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                                        </a>
                                                        <div class="content_inner">
                                                            <a href="#">
                                                                <h5>dubai to paris</h5>
                                                            </a>
                                                            <h6>egyptair | $2500</h6>
                                                        </div>
                                                        <div class="top-icon">
                                                            <a href="#" class="" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Remove from Wishlist"><i
                                                                    class="fas fa-times"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-6 grid-item">
                                                <div class="special-box">
                                                    <div class="special-img">
                                                        <a href="#">
                                                            <img src="../assets/images/tour/tour/12.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                                        </a>
                                                        <div class="content_inner">
                                                            <a href="#">
                                                                <h5>simply mauritius</h5>
                                                            </a>
                                                            <h6>6N 7D</h6>
                                                        </div>
                                                        <div class="top-icon">
                                                            <a href="#" class="" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Remove from Wishlist"><i
                                                                    class="fas fa-times"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-6 grid-item">
                                                <div class="special-box">
                                                    <div class="special-img">
                                                        <a href="#">
                                                            <img src="../assets/images/tour/tour/13.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                                        </a>
                                                        <div class="content_inner">
                                                            <a href="#">
                                                                <h5>canadian delight</h5>
                                                            </a>
                                                            <h6>6N 7D</h6>
                                                        </div>
                                                        <div class="top-icon">
                                                            <a href="#" class="" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Remove from Wishlist"><i
                                                                    class="fas fa-times"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-6 grid-item">
                                                <div class="special-box">
                                                    <div class="special-img">
                                                        <a href="#">
                                                            <img src="../assets/images/tour/tour/14.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                                        </a>
                                                        <div class="content_inner">
                                                            <a href="#">
                                                                <h5>Egyptian Wonders</h5>
                                                            </a>
                                                            <h6>6N 7D</h6>
                                                        </div>
                                                        <div class="top-icon">
                                                            <a href="#" class="" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Remove from Wishlist"><i
                                                                    class="fas fa-times"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-sm-6 grid-item">
                                                <div class="special-box">
                                                    <div class="special-img">
                                                        <a href="#">
                                                            <img src="../assets/images/tour/tour/15.jpg"
                                                                class="img-fluid blur-up lazyload bg-img" alt="">
                                                        </a>
                                                        <div class="content_inner">
                                                            <a href="#">
                                                                <h5>South Africa</h5>
                                                            </a>
                                                            <h6>6N 7D</h6>
                                                        </div>
                                                        <div class="top-icon">
                                                            <a href="#" class="" data-bs-toggle="tooltip"
                                                                data-placement="top" title="Remove from Wishlist"><i
                                                                    class="fas fa-times"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="security">
                                <div class="dashboard-box">
                                    <div class="dashboard-title">
                                        <h4>delete your accont</h4>
                                    </div>
                                    <div class="dashboard-detail">
                                        <div class="delete-section">
                                            <p>Hi <span class="text-bold">Mark Enderess</span>,</p>
                                            <p>we are sorry to here you would like to delete your account.</p>
                                            <p><span class="text-bold">note:</span></p>
                                            <p>deleting your account will permanently remove your profile, personal
                                                settings, and all other associated information.
                                                once your account is deleted, you will be logged out and will be unable
                                                to log back in.
                                            </p>
                                            <p>if you understand and agree to the above statement, and would still like
                                                to delete your account, than click below</p>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#delete-account"
                                                class="btn btn-solid">delete my account</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end-->


    <!-- footer start -->
    <footer>
        <div class="footer section-b-space section-t-space">
            <div class="container">
                <div class="row order-row">
                    <div class="col-xl-2 col-md-6 order-cls">
                        <div class="footer-title mobile-title">
                            <h5>contact us</h5>
                        </div>
                        <div class="footer-content">
                            <div class="contact-detail">
                                <div class="footer-logo">
                                    <img src="../assets/images/icon/footer-logo.png" alt=""
                                        class="img-fluid blur-up lazyload">
                                </div>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries</p>
                                <ul class="contact-list">
                                    <li><i class="fas fa-map-marker-alt"></i> A-32, Albany, Newyork.</li>
                                    <li><i class="fas fa-phone-alt"></i> 518 - 457 - 5181</li>
                                    <li><i class="fas fa-envelope"></i> contact@gmail.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-3">
                        <div class="footer-space">
                            <div class="footer-title">
                                <h5>about</h5>
                            </div>
                            <div class="footer-content">
                                <div class="footer-links">
                                    <ul>
                                        <li><a href="#">about us</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">login</a></li>
                                        <li><a href="#">register</a></li>
                                        <li><a href="#">terms & co.</a></li>
                                        <li><a href="#">privacy</a></li>
                                        <li><a href="#">support</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="footer-title">
                            <h5>our location</h5>
                        </div>
                        <div class="footer-content">
                            <div class="footer-map">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.1583091352!2d-74.11976373946229!3d40.69766374859258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1563449626439!5m2!1sen!2sin"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-3 order-cls">
                        <div class="footer-space">
                            <div class="footer-title">
                                <h5>useful links</h5>
                            </div>
                            <div class="footer-content">
                                <div class="footer-links">
                                    <ul>
                                        <li><a href="#">home</a></li>
                                        <li><a href="#">our vehical</a></li>
                                        <li><a href="#">latest video</a></li>
                                        <li><a href="#">services</a></li>
                                        <li><a href="#">booking deal</a></li>
                                        <li><a href="#">emergency call</a></li>
                                        <li><a href="#">mobile app</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="footer-title">
                            <h5>new topics</h5>
                        </div>
                        <div class="footer-content">
                            <div class="footer-blog">
                                <div class="media">
                                    <div class="img-part">
                                        <a href="#"><img src="../assets/images/cab/blog-footer/1.jpg"
                                                class="img-fluid blur-up lazyload" alt=""></a>
                                    </div>
                                    <div class="media-body">
                                        <h5>recent news</h5>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="img-part">
                                        <a href=""><img src="../assets/images/cab/blog-footer/2.jpg"
                                                class="img-fluid blur-up lazyload" alt=""></a>
                                    </div>
                                    <div class="media-body">
                                        <h5>recent news</h5>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type and scrambled it to
                                            make a type specimen book. It has survived not only five centuries</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row ">
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="footer-social">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-12">
                        <div class="copy-right">
                            <p>copyright 2019 rica by <i class="fas fa-heart"></i> pixelstrap</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
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


    <!-- edit profile modal start -->
    <div class="modal fade edit-profile-modal" id="edit-profile" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="first">first name</label>
                                <input type="text" class="form-control" id="first" placeholder="first name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last">last name</label>
                                <input type="text" class="form-control" id="last" placeholder="last name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">gender</label>
                                <select id="gender" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>female</option>
                                    <option>male</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>birthday</label>
                                <input class="form-control" placeholder="18 april" id="datepicker" />
                            </div>
                            <div class="form-group col-12">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-solid">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit profile modal start -->


    <!-- edit address modal start -->
    <div class="modal fade edit-profile-modal" id="edit-address" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">change email address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="old">old email</label>
                                <input type="email" class="form-control" id="old">
                            </div>
                            <div class="form-group col-12">
                                <label for="new">enter new email</label>
                                <input type="email" class="form-control" id="new">
                            </div>
                            <div class="form-group col-12">
                                <label for="comfirm">confirm your email</label>
                                <input type="email" class="form-control" id="comfirm">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-solid">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit address modal start -->


    <!-- edit phone no modal start -->
    <div class="modal fade edit-profile-modal" id="edit-phone" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">change phone no</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="ph-o">old phone no</label>
                                <input type="number" class="form-control" id="ph-o">
                            </div>
                            <div class="form-group col-12">
                                <label for="ph-n">enter new phone no</label>
                                <input type="number" class="form-control" id="ph-n">
                            </div>
                            <div class="form-group col-12">
                                <label for="ph-c">confirm your phone no</label>
                                <input type="number" class="form-control" id="ph-c">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-solid">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit phone no modal start -->


    <!-- edit password modal start -->
    <div class="modal fade edit-profile-modal" id="edit-password" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">change email address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="p-o">old password</label>
                                <input type="email" class="form-control" id="p-o">
                            </div>
                            <div class="form-group col-12">
                                <label for="p-n">enter new password</label>
                                <input type="email" class="form-control" id="p-n">
                            </div>
                            <div class="form-group col-12">
                                <label for="p-c">confirm your password</label>
                                <input type="email" class="form-control" id="p-c">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-solid">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit password modal start -->


    <!-- edit password modal start -->
    <div class="modal fade edit-profile-modal" id="edit-card" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">edit your card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name">name on card</label>
                            <input type="text" class="form-control" id="name" placeholder="Mark jecno">
                        </div>
                        <div class="form-group">
                            <label for="number">card number</label>
                            <input type="text" class="form-control" id="number" placeholder="7451 2154 2115 2510">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="expiry">expiry date</label>
                                <input type="text" class="form-control" id="expiry" placeholder="12/23">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="cvv">cvv</label>
                                <input type="password" maxlength="3" class="form-control" id="cvv"
                                    placeholder="&#9679;&#9679;&#9679;">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-solid">update card</button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit password modal start -->


    <!-- add card modal start -->
    <div class="modal fade edit-profile-modal" id="add-card" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">add new card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="a-month">card type</label>
                            <select id="a-month" class="form-control">
                                <option selected>add new card...</option>
                                <option>credit card</option>
                                <option>debit card</option>
                                <option>debit card with ATM pin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="a-na">name on card</label>
                            <input type="text" class="form-control" id="a-na">
                        </div>
                        <div class="form-group">
                            <label for="a-n">card number</label>
                            <input type="text" class="form-control" id="a-n">
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="a-e">expiry date</label>
                                <input type="text" class="form-control" id="a-e">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="a-c">cvv</label>
                                <input type="password" maxlength="3" class="form-control" id="a-c">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-solid">add card</button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit password modal start -->


    <!-- add card modal start -->
    <div class="modal fade edit-profile-modal" id="delete-account" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Account deletion request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <p class="text-dark">Before you leave, please tell us why you'd like to delete your Rica account.
                        This information will help us improve. (optional)</p>
                    <form>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-solid">delete my account</button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit password modal start -->



    <!-- latest jquery-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <!-- slick js-->
    <script src="assets/js/slick.js"></script>

    <!-- date-time picker js -->
    <script src="assets/js/date-picker.js"></script>

    <!-- stick section js -->
    <script src='assets/js/sticky-kit.js'></script>

    <!-- stick section js -->
    <script src='assets/js/apexcharts.js'></script>
    <script src='assets/js/chart.js'></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- lazyload js-->
    <script src="assets/js/lazysizes.min.js"></script>

    <!-- Theme js-->
    <script src="assets/js/script.js"></script>

    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd mmmm yy'
        });

        $(document).ready(function () {
            if ($(window).width() > 991) {
                $(".product_img_scroll, .pro_sticky_info").stick_in_parent();
            }
        });
    </script>


</body>

</html>
