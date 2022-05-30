<?php
include_once('../includes/connectDatabase.php');
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
  //whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
  } 

$ip = getIPAddress();
$selectSmt = "select product_price from cart_details join products on products.product_id = cart_details.product_id where cart_details.ip_address='$ip'";
$stmt = $db->prepare($selectSmt);
$stmt->execute();
$Items = $stmt->fetchAll();
$data = [];
$total = 0;
foreach($Items as $Item){
    $price = array($Item['product_price']);
    $totalPrice = array_sum($price);
    $total+=$totalPrice;
}
array_push($data,$total);
echo json_encode($data);
?>