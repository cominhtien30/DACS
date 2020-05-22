<?php 
    include 'inc/header.php';

?>

    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    

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
                            <form action="product.php" method="GET">
                                <!-- <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div> -->

                                <input type="text" name="namepro" placeholder="What do yo u need?">
                                <button type="" class="site-btn">SEARCH</button>

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
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <form action="" method="post">  
    <section class="checkout spad">
        <div class="container">
            
            <div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
            <h2>Profile</h3>
            </div>
            <div class="clear"></div>
        </div>
        <table class="table-hover" width="100%">
           <?php
            $username=session::get('customer_user');
            $Get_User=$user->Get_User($username);
            if ($Get_User) {
                while ($data=mysqli_fetch_array($Get_User)) {
                    # code...

            ?>
            <tr>
                <td><p>Name </p></td>
                <td>:</td>
                <td><input type="text" name="name" value="<?php echo $data['nameCus'] ?>"></td>
               
            </tr>
            <tr>
                <td><p>Số Điện Thoại  </p></td>
                <td>:</td>
                <td><input type="text" name="phone" value="<?php echo $data['phone'] ?>"></td>
                
            </tr>
            <tr>
                <td><p>Email</p> </td>
                <td>:</td>
                <td><input type="text" name="email" value="<?php echo $data['emailCus'] ?>"></td>
                
            </tr>  
            <tr>
                <td><p>City</p></td>
                <td>:</td>
                <td><input type="text" value="<?php echo $data['HH'] ?>">
                </td>
                
            </tr>   
            <tr>
                <td><p>District</p></td>
                <td>:</td>
                <td class=""><input type="text" value="<?php echo $data['TT'] ?>"></td>
                
            </tr>        
            <tr>
                <td><p>Địa Chỉ</p></td>
                <td>:</td>
                <td><input type="text" name="address" value="<?php echo $data['address'] ?>"></td>
            </tr>   
            <?php 
                    }
            }
             ?>
            

        </table>
            <a href="editprofile.php" style="background: #7fad39; color: white; font-size: 17px; margin-left: 200px; padding: 2px 15px; font-weight: 700; border-radius: 1px;">Edit Profile</a>
    
        
        </div>
    </div>
 </div>
        </div>
    </section>
    </form>
    <!-- Checkout Section End -->
    <!-- Footer Section Begin -->
    <style type="text/css" media="screen">
        input{
            width: 50%;
            text-align: center;
        }   
    </style>
   <?php
    
    include 'inc/footer.php';
    

?>