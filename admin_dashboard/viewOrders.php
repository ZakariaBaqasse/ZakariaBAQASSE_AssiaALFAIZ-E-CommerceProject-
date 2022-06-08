<body>
    <h3 class="text-center my-3">Clients Orders</h3>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Order Id</th>
      <th scope="col">Order  Amount</th>
      <th scope="col">Order Date</th>
      <th scope="col">Client</th>
      <th scope="col">Invoice Number</th>
      <th scope="col">Total Products</th>
      <th scope="col">Order Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $gettingOrders = "select * from `orders`";
      $gettingOrderStmt = $db->prepare($gettingOrders);
      $gettingOrderStmt->execute();
      $allOrders = $gettingOrderStmt->fetchAll();
     
      foreach($allOrders as $oneOrder){
          $oId = $oneOrder['order_id'];
          $oUid = $oneOrder['user_id'];
          $oAmount = $oneOrder['amount_due'];
          $oDate = $oneOrder['order_date'];
          $oInvoice = $oneOrder['invoice_number'];
          $oProducts = $oneOrder['total_products'];
          $oStatus = $oneOrder['order_status'];
         $findUser = "select * from `users` where user_id =$oUid";
         $findStmt = $db->prepare($findUser);
         $findStmt->execute();
         $client = $findStmt->fetch();
         $clientName = $client['username'];
          
         

          echo " <tr>
          <td>$oId</td>
          <td>$oAmount MAD</td>
          <td>$oDate</td>
          <td>$clientName</td>
          <td>$oInvoice</td>
          <td>$oProducts</td>
          <td>$oStatus</td>
          </tr>";
      }
    ?>

   
  </tbody>
</table>

</body>