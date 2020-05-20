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
	<div class="blog__details__text">
		<center><h3>Hi <?php echo " " .$buyer ?>!</h3></center>
		<center><h4>Thanks for your purchase from BUG SHOP</h4></center>
		
			<center>
				<?php
            $show = $bill->get_Bill_Max();
                if($show){
                           
                    while($result = $show->fetch_assoc()){
                               
                        
        ?>

				<h3>ORDER ID: #<?php echo $result['order_Id']; ?></h3>
				<?php
             }
               }
        ?> 
        <h5>( Please keep a copy of this receipt for your records.) <br>
        	Please <a href="bill.php">click here</a> to view your order details
		</h5>
		<h5>Kind Regards,</h5>
		<br>
		<h5>Your Friends at BUG SHOP</h5>

			</center>
		
        
	</div>
</section>


<?php
    
    include 'inc/footer.php';
    

?>