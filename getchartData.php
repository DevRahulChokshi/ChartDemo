<?php 

include 'DbConnect.php';
global $mysqli;
$data = [];
$StartDate = date("m-01-Y", strtotime('-12 month'));
for ($i = 1; $i <= 12; $i++) { 
	$month = date("m-Y", strtotime(date("m-d-Y", strtotime($StartDate)) . ", +$i month"));
	$qry = "SELECT DATE_FORMAT(order.created_at, '%m-%Y') AS Month, SUM(order.order_amount) as TotalOrder FROM `order` WHERE DATE_FORMAT( `order`.`created_at`,'%m-%Y') = '$month' GROUP BY DATE_FORMAT(order.created_at, '%m-%Y')";

	$Result = mysqli_query($mysqli, $qry) or die('Error:'.mysqli_error());
	$authrow = mysqli_fetch_assoc($Result);
	$data[$i - 1]['label'] = date("F Y", strtotime(date("m-d-Y", strtotime($StartDate)) . ", +$i month"));
	$data[$i - 1]['y'] = 0;
	$data[$i - 1]['x'] = $i - 1;
	$data[$i - 1]['y'] = round($authrow['TotalOrder'],2);
}
echo json_encode($data);