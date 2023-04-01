<?php
require('vendor/autoload.php');
$con=mysqli_connect('localhost','root','','eservices');
$res=mysqli_query($con,"select * from orders where `user_id`='" . $_GET['user_id'] . "'");
if(mysqli_num_rows($res)>0){
	$html='<style>
		.table{
			border-collapse: collapse;
			width:100%;
		} 
		td,th{
			border: 1px solid #000;
			padding: 0.5rem;
			text-align: center;
			font-size: 1rem;
		}
		h5,h4,h2{
			text-align: center;
		}
		.blank{
			border:0;
		}
		</style>
		<h2>E-Waste Services, Aurangabad</h2>
		<h4>Bill</h4>
		<table class="table">';
		$html.='<tr><td>Order Number</td><td>Name</td><td>Email</td><td>Phone Number</td><td>Payment Method</td><td>address</td><td>Product Details</td><td>Price</td><td>Placed On</td><td>jayesh</td></tr>';
		while($row=mysqli_fetch_assoc($res)){
			$html.='<tr><td>'.$row['id'].'</td><td>'.$row['name'].'</td><td>'.$row['email'].'</td><td>'.$row['number'].'</td><td>'.$row['method'].'</td><td>'.$row['address'].'</td><td>'.$row['total_products'].'</td><td>'.$row['total_price'].'</td><td>'.$row['placed_on'].'</td><td></td></tr>';
		}
	$html.='</table>';
}else{
	$html="Data not found";
}
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file= time().'.pdf';
$mpdf->output($file,'I');
//D
//I
//F
//S
?>