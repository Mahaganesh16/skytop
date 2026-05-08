
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
    <!-- Animation -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/animate.css">

    <!--    country code-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/intlTelInput.css">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/slick-theme.css">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/bootstrap.css">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/color3.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet">
</head>

<body>


    <!-- header start -->
     <?php include APPPATH.'views/includes/header.php';?>
    <!--  header end -->


    <!-- breadcrumb start -->
    <section class="breadcrumb-section flight-sec pt-0">
        <img src="<?php echo base_url('assets/images/cab/breadcrumb.jpg');?>" class="bg-img img-fluid blur-up lazyload" alt="">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-right breadcrumb-content pt-0">
                        <div>
                            <h2>cab booking</h2>
                            <nav aria-label="breadcrumb" class="theme-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cab booking</li>
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
                    <div class="review-section">
                        <div class="review_box">
                            <div class="title-top">
                                <h5>contact details</h5>
                            </div>
                            <div class="guest-detail">
                                <form action="<?php echo base_url('cab_booking/'.$address_Det->cid)?>" method="post" >
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col first-name">
                                                <label>first name *</label>
                                                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="First name">
                                                <?php echo form_error('firstName',"<div style='color:red'>","</div>");?>
                                            </div>
                                            <div class="col">
                                                <label>last name *</label>
                                                <input type="text" id="lastName" name="lastName" class="form-control"  placeholder="Last name">
                                                <?php echo form_error('lastName',"<div style='color:red'>","</div>");?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email address (Optional)</label>
                                        <input type="email" name="email"  class="form-control" placeholder="Enter email">
                                        <small id="emailHelp" class="form-text text-muted">Booking confirmation will be
                                            sent to this email ID.</small>
                                         <?php echo form_error('email',"<div style='color:red'>","</div>");?>
                                    </div>
                                    <div class="form-group">
                                        <label>contact info *</label>
                                        <input id="mobile_no" name="mobile_no" type="tel"  class="form-control" value="<?php echo $this->session->userdata('mobile_no');?>" readonly>
                                         <?php echo form_error('mobile_no',"<div style='color:red'>","</div>");?>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Full Address (include Nearby Landmark) *</label>
                                        <textarea class="form-control" id="address" name="address" rows="3"
                                            placeholder=""></textarea>
                                         <?php echo form_error('address',"<div style='color:red'>","</div>");?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">have a coupon code?</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control promo_code" id="promo_code" name="promo_code" placeholder="Promo Code">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">apply</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                       
                                        <div class="col-md-6" >
                                             <button type="submit" class="btn btn-solid" style="float: right;">Complete Booking</button>
                                        </div>
                                    </div>
                                    <input type="hidden" name="from_address" value="<?php echo $this->session->userdata('from_address'); ?>">
                                    <input type="hidden" name="to_address" value="<?php echo $this->session->userdata('to_address'); ?>">
                                    <div class="submit-btn">
                                       
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="review_box">
                            <div class="title-top">
                                <h5>Information</h5>
                            </div>
                            <div class="flight_detail">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="boxes">
                                            <h6>Cancellation Charges Applicable</h6>
                                            <!-- <ul>
                                                <li>airline fee : <span>$2012</span></li>
                                                <li>This airline allows cancellation only before 2 hrs from departure
                                                    time.
                                                </li>
                                            </ul> -->
                                        </div>
                                        <div class="boxes">
                                            <h6>Reschedule Charges Applicable</h6>
                                            <!-- <ul>
                                                <li>airline fee : <span>$2012</span></li>
                                                <li>This airline allows reschedule only before 2 hrs from departure
                                                    time.
                                                </li>
                                            </ul> -->
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
                                                <td>From :</td>
                                                <td><?php echo $address_Det->from_address ?> </td>
                                            </tr>
                                            <tr>
                                                <td>To:</td>
                                                <td><?php echo $address_Det->to_address ?> </td>
                                            </tr>
                                            <tr>
                                                <td>pickup Date:</td>
                                                <td><?php echo $address_Det->program_date ?> </td>
                                            </tr>
                                            <tr>
                                                <td>car type</td>
                                                <td><?php echo $address_Det->car_type ?></td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                    <!-- <div class="grand_total">
                                        <h5>total fare: <span id="price_Det">$1250</span></h5>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="review_box">
                            <div class="flight_detail">
                                <div class="promo-section">
                                    <div class="form-group mb-0">
                                        <label>have a coupon code?</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Promo Code">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">apply</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="promos">
                                        <form>
                                            <?php
                                                foreach ($coupons as $all_Coupon) {
                                            ?>
                                                <div class="form-check" >
                                                    <input class="form-check-input radio_animated" type="radio"
                                                        name="radiobtn" id="exampleRadios3 select_Coupon" value="<?php echo $all_Coupon->Coupon_code?>" onclick="coupon_code_check('<?php echo $all_Coupon->Coupon_code?>')">
                                                    <div>
                                                        <label class="form-check-label title" for="exampleRadios3">
                                                            <?php echo $all_Coupon->Coupon_code?>
                                                        </label>
                                                        <label class="form-check-label" for="exampleRadios3">
                                                            <?php echo $all_Coupon->description?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="review_box">
                             <div class="row">
                                <div class="col">
                                    <div class="slider-14 arrow-classic">
                                        
                                        <div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Kerala package</h5>
                                                </div>
                                                <div class="card-body">
                                                    <img src="<?php echo base_url('assets/images/package/kerala.jpeg')?>" style="width: 100%">
                                                </div>
                                                <div class="card-footer">
                                                    <a href="#" class="btn btn-warning" style="width: 100%;color: #fff">Book Now</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>Tamil Nadu package</h5>
                                                </div>
                                                <div class="card-body">
                                                    <img src="<?php echo base_url('assets/images/package/tamilnadu.jpeg')?>" style="width: 100%">
                                                </div>
                                                <div class="card-footer">
                                                    <a href="#" class="btn btn-warning" style="width: 100%;color: #fff">Book Now</a>
                                                </div>
                                            </div>
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
    <!-- booking section end -->


    <!-- book now section start -->
    <div class="book-panel">
        <h6 class="mb-0 text">grand total : <span id="price_Det">$1250</span></h6>
        <button type="button" onclick="window.location.href='cab-booking-payment.html';"
            class="btn bottom-btn theme-color">continue</button>
    </div>
    <!-- book now section end -->


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
        
    </div>
    <!-- setting end -->


    <!-- latest jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo base_url('/')?>assets/js/jquery-3.5.1.min.js"></script>

    <!-- country select -->

    <!-- slick js-->
    <script src="<?php echo base_url('/')?>assets/js/slick.js"></script>

    <!-- Bootstrap js-->
    <script src="<?php echo base_url('/')?>assets/js/bootstrap.bundle.min.js"></script>

    <!-- lazyload js-->

    <script src="<?php echo base_url('/')?>assets/js/lazysizes.min.js"></script>

    <!-- Theme js-->
    <script src="<?php echo base_url('/')?>assets/js/script.js"></script>

    <script>
        function coupon_code_check(coupon_code) 
        {

            alert(coupon_code);
            // var coupon = $('#select_Coupon').val();

            $('#promo_code').val(coupon_code);
        }
        
    </script>
    <script type="text/javascript">
        calcCrow(<?php echo $this->session->userdata('origin_latlng'); ?>,<?php echo $this->session->userdata('destination_latlng'); ?>).toFixed(1);

        // google.maps.event.addDomListener(window, "load", initMap);
          function calcCrow(lat1, lon1, lat2, lon2) 
            {
              var R = 6371; // km
              var dLat = toRad(lat2-lat1);
              var dLon = toRad(lon2-lon1);
              var lat1 = toRad(lat1);
              var lat2 = toRad(lat2);

              var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
              var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
              var d = R * c;
              $('#price_Det').html("₹"+((Math.round(d) * 13)+200));
              return d;
            }

            // Converts numeric degrees to radians
            function toRad(Value) 
            {
                return Value * Math.PI / 180;
            }

    </script>

</body>

</html>
