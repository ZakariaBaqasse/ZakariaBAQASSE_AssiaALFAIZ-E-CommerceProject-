<?php
      include_once('../includes/connectDatabase.php');
      session_start();
      $total = 0;
      $status = 'paid';
      $invoice = mt_rand();
      if(isset($_SESSION['username'])){
      $uname = $_SESSION['username'];
      $findUser = "select * from `users` where username ='$uname'";
      $findStmt = $db -> prepare($findUser);
      $findStmt->execute();
      $userFound = $findStmt->fetch();
      $uId=$userFound['user_id'];
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
      $insertstmt->execute();
          $_SESSION['paid']='Congratulations! Your payment has been processed successfully We will ship your purshased products as soon as possible';
          unset($_SESSION['cart']);
          header('Location: ../usersArea/user_dashboard.php');
      
    }
        
        
        ?>