<?php  
//action.php
$connect = mysqli_connect('localhost', 'root', '', 'db_sport');

$input = filter_input_array(INPUT_POST);

$quantity = mysqli_real_escape_string($connect, $input["quantity"]);
$last_name = mysqli_real_escape_string($connect, $input["last_name"]);

if($input["action"] === 'EDIT')
{
 $query = "
 UPDATE tbl_product 
 SET quantity = '".$quantity."',  
 WHERE id = '".$input["productId"]."'
 ";

 mysqli_query($connect, $query);

}
// if($input["action"] === 'DELETE')
// {
//  $query = "
//  DELETE FROM tbl_user 
//  WHERE id = '".$input["id"]."'
//  ";
//  mysqli_query($connect, $query);
// }

echo json_encode($input);

?>
