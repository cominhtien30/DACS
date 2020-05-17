<?php
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<?php include '../classes/admin.php'?>
<?php 
    $admin = new admin();
    if(!isset($_GET['username']) || $_GET['username']==NULL){
        echo "<script>window.location = 'brandlist.php'</script>";
        
    }else{
        $user = $_GET['username'];
    }
     if(isset($_POST["save"])){

         $update_admin = $admin->update_admin($_POST,$user);
       

     }
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            
    </h6>
  </div>

  <div class="card-body">
                <?php 
                    $adminn= $admin->get_Info($user);
                    if($adminn){
                        while($result = $adminn->fetch_assoc()){
                ?> 
    <form action="" method="POST">

       

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" value="<?php echo $result['admin_User'] ?>">
            </div>
             <div class="form-group">
                <label>Name</label>
                <input type="name" name="name" class="form-control" value="<?php echo $result['admin_Name'] ?>">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $result['admin_Email'] ?>">
            </div>
            <div class="form-group">
                <label>Change New Password</label>
                <input type="password" name="changepassword" class="form-control" placeholder="Enter New Password">
            </div>
            <div class="form-group">
                <label>Repeat New Password</label>
                <input type="password" name="newpassword" class="form-control" placeholder="Enter Repeat Password">
            </div>
            <div class="form-group">
              <label >Level</label>
                <select name="level" class="form-control">
                  <option value="><?php echo $result['level'] ?>"><?php echo $result['level'] ?></option>
                  <?php if ($result['level']==0) {
                      echo ' <option value="1">1</option>';
                  }else{
                      echo ' <option value="0">0</option>';
                  } 
                  ?>
                  option
                </select>
            </div>
        
       <?php if (isset($update_admin)) {
                echo $update_admin;
       } ?>
        <div class="modal-footer">
            <button onclick="location.href='listadmin.php'" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Save</button>
        </div>
      </form>
       <?php 
                }
            }
                ?>  
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>