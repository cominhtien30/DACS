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

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_buy'])){
$buyer= Session::get('customer_user');
$insertOrder = $ct->insert_Order($_POST,$buyer);
$MaxId = $ct->get_Max_Id();
if($MaxId){
while ($result = $MaxId->fetch_assoc()){

$insertOrderDetails = $ct->insert_OrderDetail($result['order_Id']);
}
}
$destroyCart = $ct->Del_cart_by_Session();
header('Location:success.php');
}
// else{
//   echo "<script>window.location = '404.php'</script>";
// }
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
                            <input type="text" name="password" placeholder="Enter Password">
                        </div>
                        <div class="checkout__input">
                            <p>Repeat Password<span>*</span></p>
                            <input type="text" name="repeatpassword" placeholder="Repeat Password">
                        </div>
                        
                        
                        
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <select  id="city" name="city" >
                            	 <option value="null">Select City</option>
                                <?php
                                $citylist = $city->Show_City();
                                if($citylist){
                                	while ($resultCity = $citylist->fetch_assoc()){
                                ?>
                               
                                <option  data-name="<?= $resultCity['matp'] ?>" value="<?php echo $resultCity['matp'] ?>"><?php echo $resultCity['name'] ?></option>
                                <?php 
                                	      }
                                    }
                                 ?>
                      
                               
                            </select>
                        </div>
                        <div class="checkout__input">
                            <p>District<span>*</span></p>
                            <select id="district" name="district">
                                <option value="null">Chọn Quận Huyện</option>
                            </select>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" name="address" placeholder="Enter Address" class="checkout__input__add">
                            
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
                        </div>
                        <td>
                        	<input type="submit" value="Register" name="register">
                        </td>
                    </div>  	
                    
                </form>
            </div>
        </div>
        
    </section>
    
    <script>

                      $(document).ready(function(){
                         $('#city').change(function(){
                            var matp = $('#city option:selected').val();
                            data = {
                                city:1,
                                matp:matp
                            };
                            $.ajax({
                                url:"getdistrict.php",
                                type:"POST",
                                 data:data
                        }).done(function(result){
                         $('#district').html(result);
                
                        })
                    })

                });
                    </script>

    <?php
    include 'inc/footer.php';
    
    ob_end_flush();?>