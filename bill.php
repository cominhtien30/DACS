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
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Bill</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
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
                <h4>Billing Details</h4>
                    <div class="row">
                        <table width="100%">

                              <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Customer</th>
                                <th>Totalprice</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                              <?php 
                                $cus=session::get('customer_user');
                                $get_Bill_by_Customer=$bill->get_Bill_by_Customer($cus);
                                if ($get_Bill_by_Customer){
                                    while ($data=mysqli_fetch_array($get_Bill_by_Customer)) {
                                        
                             
                               ?>
                                <tr>

                                    <td><?php echo $data['order_Id'] ?></td>
                                    <td><?php echo $fm->formatDate($data['date']) ?></td>
                                    <td><?php echo $data['receiver'] ?></td>
                                    <td><?php echo $data['totalprice'] ?></td>
                                    <?php 
                                        if ($data['status']==0) {
                                            echo '<td class="text-danger">Pedding</td>';
                                        }elseif($data['status']==1){
                                            echo '<td class="text-success">Success</td>';
                                        }
                                     ?>
                                    
                                    
                                    <td><a href="billdetails.php?idbill=<?php echo $data['order_Id']  ?>p">View Details Bill</a></td>
                                </tr>
                                <?php 
                                    }
                                }
                                 ?>
                        </table>
                    </div> 
            </div>
        </div>
    </section>
<style type="text/css" media="screen">
        
         table, th, td {
            border: 3px solid black;
         }
         th,td{
            font-size: 20px;
            padding: 10px;
         }
</style>

    <!-- Checkout Section End -->

    <!-- Footer Section Begin -->
   <?php
    
    include 'inc/footer.php';
    

?>