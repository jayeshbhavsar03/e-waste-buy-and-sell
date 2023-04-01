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
		tr,td,th{
			border: 1px solid #000;
			padding: 0.5rem;
			font-size: 1rem;
		}
		h5,h4,h2{
			text-align: center;
		}
		</style>
		<h2>E-Waste Services, Aurangabad</h2>
		<h4>Bill</h4>
		<table class="table">';
		while($row=mysqli_fetch_assoc($res)){
			$html.='
            <tr><th>Order Number</th><td>'.$row['id'].'</td></tr>
            <tr><th>Name</th><td>'.$row['name'].'</td></tr>
            <tr><th>Email</th><td>'.$row['email'].'</td></tr>
            <tr><th>Phone Number</th><td>'.$row['number'].'</td></tr>
            <tr><th>Payment Method</th><td>'.$row['method'].'</td></tr>
            <tr><th>Address</th><td>'.$row['address'].'</td></tr>
            <tr><th>Placed On</th><td>'.$row['placed_on'].'</td></tr>
            <tr><th>Product Details</th><td>'.$row['total_products'].'</td></tr>
            <tr><th>Price</th><td>₹'.$row['total_price'].'</td></tr>
            ';
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