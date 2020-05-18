<?php ob_start();
  include 'inc/header.php';
?>
<?php
  $login = Session::get('customer_login');
  if($login == false){
    header('Location:login.php');
  }
?>
<?php 
  $username=session::get('customer_user');
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){       
       $updateCus=$user->Update_Customer($_POST,$username);
    }
 ?>
<style>
    table{
        border: none;
    }
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  font-size: 16px;
  height: -10%;
  border: none;
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
  height: 30px;
  background-color: #7FAD39;
  color: white;
}
input[type=texts], select {
  
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  height: 20px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
input[type=password], select {
  
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  height: 30px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
}
</style>

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/background.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Profile</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Profile</span>
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
            <h4>YOUR PROFILE</h4>
            <form action="" method="post">
            <div class="row">
                <table  id="customers" width="100%">
                   
                    
                     <?php
                        
                        $Get_User=$user->Get_User($username);
                        if ($Get_User) {
                        while ($result=mysqli_fetch_array($Get_User)) {
                        
                        ?>
                    <tr>
                        <td>Username </td>
                        <td>:</td>
                        <td><input  type="texts" name="" disabled value="<?php echo $username; ?>"></td>
                        
                       
                     
                        
                        
                    </tr>
                    <tr>
                        <td>Name </td>
                        <td>:</td>
                        <td>
                          <input type="texts" name="name" value="<?php echo $result['nameCus']; ?>">
                        </td>

                    </tr>
                    <tr>
                        <td>Email </td>
                        <td>:</td>
                        <td><input type="texts" name="email" value="<?php echo $result['emailCus']; ?>"></td>
                        
                    </tr>
                    <tr>
                        <td>Phone </td>
                        <td>:</td>
                        <td><input type="texts" name="phone" value="<?php echo $result['phone']; ?>"></td>
                        
                    </tr>
                    <tr>
                        <td>Address </td>
                        <td>:</td>
                        <td><input type="texts" name="address" value="<?php echo $result['address']; ?>"></td>
                        
                    </tr>
                    <tr>
                        <td>Password </td>
                        <td>:</td>
                        <td><input type="password" name="password" value=""></td>
                        
                    </tr>
                   <?php
                    }
                    }
                    ?>
                </table>
               
                
            </div>

          
          
        </div>
        
          <center><button type="submit" class="site-btn" name="submit">UPDATE</button></center>
      </form> 
      <p><?php if (isset($updateCus)) {
            echo $updateCus;
      } ?></p>
                    </div>
</section>


                
<style type="text/css" media="screen">
input{
width: 50%;
text-align: center;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php

include 'inc/footer.php';

ob_end_flush();
?>