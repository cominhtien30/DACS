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
                <td><select  name="city" id="city" class="select-css"   >
                    <option selectd value="<?php echo $data['TP'] ?>"><?php echo $data['HH'] ?></option>
                    <?php 
                        $Show_City=$city->Show_City();
                        if ($Show_City) {
                            while ($city=mysqli_fetch_array($Show_City)) {
                        ?>
                    <option   value="<?php echo $city['matp'] ?>"><?php echo $city['name'] ?></option>
                     <?php 
                           }
                        }
                      ?>
                        
                    </select>
                </td>
                
            </tr>   
            <tr>
                <td><p>District</p></td>
                <td>:</td>
                <td >
                    <select name="district" id="district" class="select-css" >
                        <option  value="<?php echo $data['QH'] ?>"><?php echo $data['TT'] ?></option>
                    </select>
                </td>
                
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
            <a name="submit" href="editprofile.php" style="background: #7fad39; color: white; font-size: 17px; margin-left: 200px; padding: 2px 15px; font-weight: 700; border-radius: 1px;">Save</a>
    
        
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
            width: 100%;
            text-align: center;
            font-size: 16px;
            font-weight: 700;
            color: #444;
            height: 45px;
         
         }
         .select-css {

    display: block;
    font-size: 16px;
    font-family: sans-serif;
    font-weight: 700;
    color: #444;
    line-height: 1.3;
    padding: .6em 1.4em .5em .8em;
    width: 100%;
    max-width: 100%; 
    box-sizing: border-box;
    margin: 0;
    border: 1px solid #aaa;
    box-shadow: 0 1px 0 1px rgba(0,0,0,.04);
    border-radius: .5em;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    background-color: #fff;
    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%22292.4%22%20height%3D%22292.4%22%3E%3Cpath%20fill%3D%22%23007CB2%22%20d%3D%22M287%2069.4a17.6%2017.6%200%200%200-13-5.4H18.4c-5%200-9.3%201.8-12.9%205.4A17.6%2017.6%200%200%200%200%2082.2c0%205%201.8%209.3%205.4%2012.9l128%20127.9c3.6%203.6%207.8%205.4%2012.8%205.4s9.2-1.8%2012.8-5.4L287%2095c3.5-3.5%205.4-7.8%205.4-12.8%200-5-1.9-9.2-5.5-12.8z%22%2F%3E%3C%2Fsvg%3E'),
      linear-gradient(to bottom, #ffffff 0%,#e5e5e5 100%);
    background-repeat: no-repeat, repeat;
    background-position: right .7em top 50%, 0 0;
    background-size: .65em auto, 100%;

}
.select-css::-ms-expand {
    display: none;
}
.select-css:hover {
    border-color: #888;
}
.select-css:focus {
    border-color: #aaa;
    box-shadow: 0 0 1px 3px rgba(59, 153, 252, .7);
    box-shadow: 0 0 0 3px -moz-mac-focusring;
    color: #222; 
    outline: none;
}
.select-css option {
    font-weight:normal;
}
    </style>
  <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>       
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
?>
 