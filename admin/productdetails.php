<?php
include('includes/header.php');
include('includes/navbar.php');

?>
<?php include '../classes//brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php'?>
<style type="text/css">

.rows {
display: flex;
flex-wrap: wrap;
margin-right: -.100rem;
margin-left: -.75rem;
}
.scroll{
  height: 400px;
  overflow: scroll;
}
h5{
  margin-top: 10px;
  color: black;
  width: 80%;
  text-align: justify;
}
h3{
  color: red;
  font-weight: bold;
}
#redd{
  color: red;
  font-weight: bold;
}
</style>
<?php
    $prod = new product();
    $cat = new category();
    if(!isset($_GET['name']) || $_GET['name']==NULL){
    echo "<script>window.location = 'productlist.php'</script>";

    }else{
    $name = $_GET['name'];

    }
    $product= $prod->Show_ProductByName($name);
      if($product){
        while ($result = $product->fetch_assoc()){
          $namecat = $result['catName'];

        }
    }

    // if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registerbtn'])){

    // $updateProd = $prod->update_product($_POST,$_FILES,$name);
    // }
    

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addsize'])){

        $quantity = $_POST['quantity'];
        $size = $_POST['size'];
       

        $insert_product = $prod->add_Size_Product($name,$size,$quantity);
    }

    // if(isset($_POST["update_Quanti"])){
    //     $id = $_POST["update_Quanti"];
    //     $quantity = $_POST["quantity"];

    //     $delbrand = $brand->updateQuantity($id,'1000');
  // }
    
?> 

<!-- Begin editproduct -->
<div class="modal fade" id="editproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE PRODUCT </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        
        <div class="modal-body">
            <?php 
              $get_list= $prod->Show_ProductByName($name);
              if($get_list){
                  while($result_prod = $get_list->fetch_assoc()){
                ?>
            <div class="form-group">

                <label> Product name </label>
                <input type="text" name="productName" class="form-control" placeholder="Enter Product" value="<?php echo $result_prod['productName'] ?>">
            </div>
             
             
             
            <div class="form-group">

                <label> Price </label>
                <input type="text" name="price" class="form-control" placeholder="Enter price" value="<?php echo $result_prod['price'] ?>">
            </div>
            <div class="form-group">

                <label> Description </label>
                <input type="text" name="description" class="form-control" placeholder="Enter Description" value="<?php echo $result_prod['description'] ?>">
            </div>
            <div class="form-group">

                <label> Image </label>
                 <img src="uploads/<?php echo $result_prod['image']?>"  width="80" ?>
                <input type="file" name="image" class="form-control" v >
            </div>

        <?php 
            }
          }
         ?>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- End editproduct -->
<!-- Begin addsize -->
 <form action="" method="POST" enctype="multipart/form-data">
<div class="modal fade" id="addsize" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE PRODUCT </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
              <label >Type</label>
                 <select id="size" name="size"  class="form-control action">
                  
                            <option>Chọn Size</option>
                            <?php
                                
                                $catlist = $cat->getSizebyCat($namecat);
                                if($catlist){
                                    while ($result = $catlist->fetch_assoc()) {
                                        
                            ?>
                                 <option ><?php echo $result['catSize'] ?></option>
                              
                            <?php 

                                }
                            }
                            ?>
                            
                        </select>
            </div>
             
             
             
            <div class="form-group">

                <label> Quantity </label>
                <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Enter quantity">
            </div>
            
            
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addsize" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- End addsize -->
<div class="container-fluid">
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h3 class="m-0 font-weight-bold text-primary">Product
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editproduct">
              Update Product
            </button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsize">
              Add Size
            </button>
      </h3>
    </div>
    
     <?php 
          $get_list= $prod->Show_ProductByName($name);
          if($get_list){
              while($result_prod = $get_list->fetch_assoc()){
                ?>     
    <div class="card-body">
      <?php
                    if(isset($updateProd)){
                        echo $updateProd;
                    }
                ?> 
      
     
      <form action="" method="POST">
     
        <div class="rows">
           
          <div class="col-4">
            <img src="upload/<?php echo $result_prod['image']?>" width="400px">
          </div>
          <div class=" col-8">
            <h3 class="m-0 font-weight-bold text-primary"><?php echo $result_prod['productName'] ?></h3>
            
            <h5><?php echo $result_prod['description'] ?></h5>
            
            <h5 id="redd">Brand: <?php echo $result_prod['brandName'] ?></h5>
           
             <h5 id="redd">Category: <?php echo $result_prod['catName'] ?></h5>
             
              <h5 id="redd">Size: <?php echo $result_prod['catSize'] ?></h5>
            <h3>Price: <?php echo $result_prod['price'] ?></h3>
              
          </div>
        </div>
        
        <div class="scroll">
         
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th> ID </th>
                    <th> Size </th>
                    <th> Quantity </th>
                    
                    <th> EDIT </th>
                    <th> DELETE </th>
                  </tr>
                </thead>
                <tbody>
                   <?php
                                
                                $Sizelist = $prod->getSize_1Product($name);
                                if($Sizelist){
                                    while ($result = $Sizelist->fetch_assoc()) {        
                            ?>
                  <tr>
                    <td> 1 </td>
                    <td> <?php echo $result['size']?></td>
                    <td contenteditable="true" id="quantity" name="quantity"> 
                        <?php echo $result['quantity']?>
                    </td>
                    
                    <td>
                      
                        <!--  <input type="hidden" name="edit_id" value="<?php echo $result['admin_User']; ?>">
                        <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button> -->
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">UPDATE</a>
                     
                    </td>
                    <td>
                      
                        <input type="hidden" name="update_Quanti" value="<?php echo $result['productId']?>">
                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                     
                    </td>
                  </tr>
                 
                  <?php  
                                }
                            }
                            ?>
                  
                </tbody>
              </table>
               
            </div>


        <div class="modal-footer">
          <button onclick="location.href='listadmin.php'" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>
      
    </div>
     <?php  
                                }
                            }
                            ?>
    
  </div>
</div>
</form>

<!-- /.container-fluid -->
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>