
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/font-awesome.css">

    <!-- Animation -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/animate.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/slick-theme.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/color3.css">

</head>

<body>


    <!-- header start -->
    <?php include APPPATH.'views/includes/header.php';?>
    <!--  header end -->


    <!-- breadcrumb start -->
    <section class="breadcrumb-section flight-sec pt-0">
        <img src="<?php echo base_url()?>assets/images/cab/breadcrumb.jpg" class="bg-img img-fluid blur-up lazyload" alt="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-right breadcrumb-content pt-0">
                        <div>
                            <h2>cab payment
                            </h2>
                            <nav aria-label="breadcrumb" class="theme-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cab payment</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->


    <!-- booking section start -->
    <section class="small-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product_img_scroll" data-sticky_column>
                        <div class="review-section">
                            <div class="review_box">
                                <div class="title-top">
                                    <h5>payment option</h5>
                                </div> 
                                <div class="flight_detail payment-gateway">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="h_one">
                                                <div class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#one"
                                                    aria-expanded="true">
                                                    <label for='r_one'>
                                                        <input class="radio_animated ml-0" type='radio' checked
                                                            id='r_one' name='occupation' value='Working' required />
                                                        Razorpay
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="one" class="collapse show" aria-labelledby="h_one"
                                                data-bs-parent="#accordionExample">
                                                <div class="card-body">
                                                    <form action="<?php echo base_url('razorpay')?>" method="post">
                                                        <input type="hidden" name="fname" id="fname" value="<?php echo $bokkingDet->firstName;?>" />
                                                        <input type="hidden" name="lname" id="lname" value="<?php echo $bokkingDet->lastName; ?>"/>
                                                        <input type="hidden" name="email" id="email" value="<?php echo $bokkingDet->email; ?>"/>
                                                        <input type="hidden" name="mobile_no" id="mobile_no" value="<?php echo $bokkingDet->mobile_no; ?>"/>
                                                        <input type="hidden" name="address" id="address" value="<?php echo $bokkingDet->address; ?>"/>
                                                        <input type="hidden" name="promo_code" id="promo_code" value="<?php echo $bokkingDet->promo_code; ?>"/>
                                                        <input type="hidden" name="from_address" id="from_address" value="<?php echo $bokkingDet->from_address; ?>"/>
                                                        <input type="hidden" name="to_address" id="to_address" value="<?php echo $bokkingDet->to_address; ?>"/>
                                                        <div class="payment-btn">
                                                            <button type="submit" class="btn btn-solid color1">make payment</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="h_two">
                                                <div class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#two"
                                                    aria-expanded="true" aria-controls="two">
                                                    <label for='r_two'>
                                                        <input class="radio_animated ml-0" type='radio' id='r_two'
                                                            name='occupation' value='Working' required /> Google Pay
                                                    </label>
                                                </div>
                                            </div>
                                            <div id="two" class="collapse" aria-labelledby="h_two"
                                                data-bs-parent="#accordionExample">
                                                <div class="card-body">
                                                    <form>
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 booking-order res-margin">
                    <div class="review-section">
                        <div class="review_box">
                            <div class="title-top">
                                <h5>booking summery</h5>
                            </div>
                            <div class="flight_detail">
                                <div class="summery_box">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Itinerary :</td>
                                                <td><?php echo $bokkingDet->from_address; ?> > <?php echo $bokkingDet->to_address; ?></td>
                                            </tr>
                                            <tr>
                                                <td>pickup date:</td>
                                                <td><?php echo $bokkingDet->program_date; ?>, <?php echo $bokkingDet->program_time; ?></td>
                                            </tr>
                                            <tr>
                                                <td>return date:</td>
                                                <td>-</td>
                                            </tr>
                                            <tr>
                                                <td>Per KM Charge:</td>
                                                <td><?php 
                                                    $CI = &get_instance();
                                                    $CI->load->model('Home_Model');
                                                    $carDet = $CI->Home_Model->getCarDet($bokkingDet->car_type);
                                                    echo "₹".$carDet->km_price;
                                                        
                                                    
                                                    ?>  
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>car type</td>
                                                <td>
                                                    <?php 
                                                    $CI = &get_instance();
                                                    $CI->load->model('Home_Model');
                                                    $carDet = $CI->Home_Model->getCarDet($bokkingDet->car_type);
                                                    echo $carDet->car_name;
                                                        
                                                    
                                                    ?>  
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="grand_total">
                                        <h5>total fare: <span>$1250</span></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- booking section end -->


    <!-- book now section start -->
    <div class="book-panel">
        <h6 class="mb-0 text">grand total : <span>$1250</span></h6>
        <button type="button" onclick="window.location.href='cab-booking-payment.html'"
            class="btn bottom-btn theme-color">continue</button>
    </div>
    <!-- book now section end -->


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


    <!-- latest jquery-->
    <script src="<?php echo base_url()?>assets/js/jquery-3.5.1.min.js"></script>

    <!-- slick js-->
    <script src="<?php echo base_url()?>assets/js/slick.js"></script>

    <!-- Bootstrap js-->
    <script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js"></script>

    <!-- lazyload js-->
    <script src="<?php echo base_url()?>assets/js/lazysizes.min.js"></script>

    <!-- Theme js-->
    <script src="<?php echo base_url()?>assets/js/script.js"></script>

</body>

</html>
