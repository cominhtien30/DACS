<?php  ob_start();
include 'inc/header.php';
?>
<?php 
$check = Session::get('customer_login');
    if($check== true){
        header('Location:index.php');
    }
 ?>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
    $insert_Customer=$user->insert_Customer($_POST);
}
?>
 <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript" charset="utf-8" async defer></script>
                    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All departments</span>
                    </div>
                    <ul>
                        <li><a href="#">Fresh Meat</a></li>
                        <li><a href="#">Vegetables</a></li>
                        <li><a href="#">Fruit & Nut Gifts</a></li>
                        <li><a href="#">Fresh Berries</a></li>
                        <li><a href="#">Ocean Foods</a></li>
                        <li><a href="#">Butter & Eggs</a></li>
                        <li><a href="#">Fastfood</a></li>
                        <li><a href="#">Fresh Onion</a></li>
                        <li><a href="#">Papayaya & Crisps</a></li>
                        <li><a href="#">Oatmeal</a></li>
                        <li><a href="#">Fresh Bananas</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/background.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Register</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.php">Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        
        <div class="checkout__form">
            <h4>Register User</h4>
            <center><h3><?php if (isset($insert_Customer)) {
            echo $insert_Customer;

      } ?></h3></center>
      <center><h4>Nếu Đã Có Tài Khoản <a style="color: #7fad39" href="login.php">Tiến Hành Đăng Nhập</a></h4></center>
            <form action="register.php" method="post">
                <div class="row">
                    <div class="modal-body">
                        <!-- <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                        </div> -->
                        <div class="checkout__input">
                            <p>User Name<span>*</span></p>
                            <input type="text" name="username" placeholder="Enter Username">
                        </div>
                        <div class="checkout__input">
                            <p> Name<span>*</span></p>
                            <input type="text" name="name" placeholder="Enter Name">
                        </div>
                        <div class="checkout__input">
                            <p> Password<span>*</span></p>
                            <input type="password" name="password" placeholder="Enter Password">
                        </div>
                        <div class="checkout__input">
                            <p>Repeat Password<span>*</span></p>
                            <input type="password" name="repeatpassword" placeholder="Repeat Password">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phone" placeholder="Enter Phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="email" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Address<span>*</span></p>
                                    <input type="text" name="address" placeholder="Enter Address">
                                </div>
                            </div>
                        </div>
                        <td>
                        	
                        <center><button style="width: 100%;" type="submit" class="site-btn" name="register">Register</button></center>
                        </td>
                    </div>  	
                    
                </form>
            </div>
        </div>
        
    </section>
    

    <?php
    include 'inc/footer.php';
    
    ob_end_flush();?>