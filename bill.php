<?php
include 'inc/header.php';
?>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 16px;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 20px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 20px;
  padding-bottom: 22px;
  text-align: left;
  background-color: #7FAD39;
  color: white;
}
</style>
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
                    <h2>Your Bill</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.php">-Home</a>
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
                <table id="customers" width="100%">
                    <tr>
                        <th>ID</th>
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
                    while ($result=mysqli_fetch_array($get_Bill_by_Customer)) {
                    
                    
                    ?>
                    <tr>
                        <td>#<?php echo $result['order_Id'] ?></td>
                        <td><?php echo $fm->formatDate($result['date']) ?></td>
                        <td><?php echo $result['receiver'] ?></td>
                        <td><?php echo $result['totalprice'] ?></td>
                        <?php
                        if ($result['status']==0) {
                          echo '<td class="text-danger">Pedding</td>';
                        }elseif($result['status']==1){
                         echo '<td class="text-success">Shipping</td>';
                        }elseif($result['status']==2)
                         echo '<td class="text-success">Success</td>';
                        else
                            echo '<td class="text-danger">Canncel</td>';
                        ?>
                        
                        
                        <td><a href="billdetails.php?idbill=<?php echo $result['order_Id']  ?>">View Details Bill</a></td>
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

<?php

include 'inc/footer.php';

?>