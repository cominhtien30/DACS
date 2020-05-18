<?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once  ($filepath.'/../helpers/format.php');
 ?>




<?php 

	/**
	 * 
	 */
	class bill
	{
		private $db;
		private $fm;

		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
				public function insert_Order($data,$buyerr){
			
			$name = mysqli_real_escape_string($this->db->link, $data['name']);	
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$total = 0;
			$session_id = session_id();
			$query = "SELECT * FROM tbl_cart WHERE ssId = '$session_id'";
			$get_cart = $this->db->select($query);
			if($get_cart){
				while ($result = $get_cart->fetch_assoc()) {
					$quantity = $result['quantity'];
					$price = $result['price'];
					$totalprice = $quantity * $price;
					$total +=$totalprice;
				}

			}
			
			$query_order = "INSERT INTO tbl_order ( buyer, receiver, phone, email, city, district, address, totalprice) VALUES ('$buyerr','$name','$phone','$email','$city','$district','$address','$total')";
			$insertOder = $this->db->insert($query_order);
			}
		
		
		public function get_Bill_by_Customer($cus){

			$query = "SELECT * FROM tbl_order  WHERE buyer = '$cus' ORDER BY order_Id DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public function delete_Order($id){
			$query = "DELETE  FROM tbl_order WHERE order_Id = '$id' ";
			$result = $this->db->delete($query);
			return $result;		
		}

		public function get_BillDetails($bill){

			$query = "SELECT * FROM tbl_orderdetails WHERE id_order = '$bill'";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_Bill_by_Id($id){

			$query = "SELECT a.order_Id, a.date , a.buyer, a.receiver, a.phone,a.email,a.totalprice,a.address, b.name as 'city', c.name as 'dis' FROM tbl_order a, tbl_city b, tbl_district c WHERE a.city=b.matp AND a.district=c.maqh AND order_Id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>