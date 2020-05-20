<?php
include 'inc/header.php';
?>
<?php
    $buyer= Session::get('customer_user');
?>
<section class="breadcrumb-section set-bg" data-setbg="img/background.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thank You</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-details spad">
				<?php
            $show = $bill->get_Bill_Max();
                if($show){
                           
                    while($result = $show->fetch_assoc()){
                               
                ?>
    <div class="blog__details__text">
        <center><h3>Hi <?php echo " " .$buyer ?>!</h3></center>
        <center><h4>Thanks for your purchase from BUG SHOP.</h4></center>
        <?php 
            }
        }
         ?>
        <center>
        <?php
        $show = $bill->get_Bill_Max();
            if($show){        
            while($result = $show->fetch_assoc()){
                ?>
                <h3 class="one">ORDER ID: #<?php echo $result['order_Id']; ?></h3>
            <?php
            }
        }

        ?>
        <h5>( Please keep a copy of this receipt for your records.) <br>
        Please <a href="bill.php">click here</a> to view your order details
        </h5>
        <h5 class="htest">Kind Regards,</h5>
        <br>
        <h5>Your Friends at BUG SHOP</h5>
        </center>
        
        
    </div>
    <div class="col-lg-12">
        <div class="shoping__cart__btns">
            <center><a href="index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a></center>
            
        </div>
    </div>
</section>
<style type="text/css">
    a:hover {
        color: blue;
    }
    h3.one{
        margin-top: 1em;
    }
    h5.htest{
        margin-top: 1em;
    }
</style>

<?php

include 'inc/footer.php';

?>