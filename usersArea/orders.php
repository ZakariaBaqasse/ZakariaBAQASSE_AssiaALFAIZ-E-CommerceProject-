<body>
<h3 class="text-center text-warning my-5">My Orders</h3>
<table class="table table-hover px-3">
  <thead>
    <tr>
      <th scope="col">Si No</th>
      <th scope="col">Amount Due</th>
      <th scope="col">Total Products</th>
      <th scope="col">Invoice Number</th>
      <th scope="col">Order Date</th>
      <th scope="col">Complete/Incomplete</th>
      <th scope="col">Confirm Payment</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $getMyOrders = "select * from `orders` where user_id = $uId";
      $getMyOrdersStmt = $db->prepare($getMyOrders);
      $getMyOrdersStmt->execute();
      $myOrders = $getMyOrdersStmt->fetchAll();
      foreach($myOrders as $myOrder){
          $confirmation = "<a href='#' class='text-dark'>Confirm payment</a>";
          $complete = 'incomplete';
          $orderId = $myOrder['order_id'];
          $orderAmount = $myOrder['amount_due'];
          $orderProducts = $myOrder['total_products'];
          $orderInvoice = $myOrder['invoice_number'];
          $orderDate = $myOrder['order_date'];
          $orderStatus = $myOrder['order_status'];
          if($orderStatus != 'pending'){
              $complete = 'complete';
              $confirmation = 'confirmed';
          }
          echo " <tr>
          <td>$orderId</td>
          <td>$orderAmount</td>
          <td>$orderProducts</td>
          <td>$orderInvoice</td>
          <td>$orderDate</td>
          <td>$complete</td>
          <td>$confirmation</td>
        </tr>";
      }
    ?>
  </tbody>
</table>


</body>