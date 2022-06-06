<?php
      include_once('../includes/connectDatabase.php');
      session_start();
      $total = 0;
      $status = 'pending';
      $invoice = mt_rand();
      if(isset($_GET['user'])){
      $uId = $_GET['user'];
      $products = array_column($_SESSION['cart'],'product_id');
      $numOfproducts = sizeof($products);
      foreach($products as $cartItem){
        $select = "select * from `products` where product_id = $cartItem";
        $stmt = $db->prepare($select);
        $stmt->execute();
        $result = $stmt->fetch();
        $title = $result['product_title'];
        $price = $result['product_price'];
        $total += $price;
    }
      $insert_order = "Insert into `orders` (user_id, amount_due,invoice_number,total_products,order_date,order_status) 
                       values($uId,$total,$invoice,$numOfproducts,NOW(),'$status')";
      $insertstmt = $db->prepare($insert_order);
      if($insertstmt->execute()){
          $_SESSION['insert']='Order submitted successfully';
          unset($_SESSION['cart']);
          header('Location: ./user_dashboard.php');
      }else{
          echo $insertstmt->error_log;
      }
    }
        
        
        ?>