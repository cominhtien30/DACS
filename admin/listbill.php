<?php
include('includes/header.php');
include('includes/navbar.php');
include ("../helpers/format.php");

?>
<?php include '../classes/bill.php'?>
<?php 
	$bill = new bill();
  $fm=new format();
    
 ?>

 <?php 
;
  if(isset($_POST["updatestt"])){
    $id = $_POST["updatestt"];
    
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

    // $status = $_POST['status'];
    $updatestt = $bill->update_Status($id,$_POST);
    }

 ?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">ALL BILL
            
    </h6>
  </div>

  <div class="card-body">
  <form action="" method="post">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Date </th>
            <th>Customer </th>
            <th>Total Price</th>
            <th>Address</th>
            <th>Status </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
			<?php
                    
                    $get_Bill=$bill->get_Bill();
                    if ($get_Bill){
                    while ($result=$get_Bill->fetch_assoc()) {
                    
                    
                    ?>
          <tr>
            <td><a href="billdetails.php?idbill=<?php echo $result['order_Id']?>">#<?php echo $result['order_Id'] ?></a></td>
            <td><?php echo $fm->formatDate($result['date']) ?></td>
            <td><?php echo $result['receiver'] ?></td>
            <td><?php echo $result['totalprice'] ?></td>
            <td><?php echo $result['address'] ?></td>
            <td>
                <form action="" method="post">
                	<select class="form-control"  id="status" name="status">
                    <?php 
                        if($result['status'] ==0){                               
                     ?>
                        <option selected value="0">Chưa xử lý</option>
                        <option value="1">Giao hàng</option>
                        <option value="2">Hoàn thành</option>
                        <option value="3">Hủy đơn</option>
                    <?php 
                    }elseif($result['status'] ==1){
                    ?>
                        <option  value="0">Chưa xử lý</option>
                        <option  selected value="1">Giao hàng</option>
                        <option value="2">Hoàn thành</option>
                        <option value="3">Hủy đơn</option>
                    <?php 
                    }elseif ($result['status'] ==2) {
                      
                    
                     ?>
                        <option  value="0">Chưa xử lý</option>
                        <option  value="1">Giao hàng</option>
                        <option  selected value="2">Hoàn thành</option>
                        <option value="3">Hủy đơn</option>
                     <?php 
                    }else{
                     ?>
                        <option  value="0">Chưa xử lý</option>
                        <option  value="1">Giao hàng</option>
                        <option  value="2">Hoàn thành</option>
                        <option selected value="3">Hủy đơn</option>
                     <?php 
                    }
                     ?>
                	</select>
                    
                </form>
            </td>
            <td>
                
                  <input type="hidden" name="updatestt" value="<?php echo $result['order_Id']?>">
                 <button  type="submit" name="submit" class="btn btn-success"> SAVE </button>
                 
               
            </td>
          </tr>
         <?php
                    }
                    }
                    ?>
        </tbody>
      </table>

    </div>
  </form>
  </div>
</div>

</div>
<script type="jquery.min.js">
  
</script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>