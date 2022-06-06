<?php
function get_user_pending_orders(){
    global $db;
    global $uId;
    /*$username = $_SESSION['username'];
    $getUser = "select * from `users` where username = '$username'";
    $userStmt = $db->prepare($getUser);
    $userStmt->execute();
    $currentUser = $userStmt->fetch();
    $userId = $currentUser['user_id'];*/
    $status = 'pending';
    $getPendingOrder = "select * from `orders` where user_id = $uId and order_status = 'pending'";
    $orderStmt = $db->prepare($getPendingOrder);
    $orderStmt->execute();
    $orderCount = $orderStmt->rowCount();
    if(!isset($_GET['myOrders']) && !isset($_GET['editProfile'])&&!isset($_GET['deleteProfile'])){
        if($orderCount>0){
            echo "<h3 class='text-center text-success mt-5 mb-3'>You have <span class='text-danger'>$orderCount</span> pending orders.</h3>
                   <p class='text-center text-dark'><a href='user_dashboard.php?myOrders' class='text-dark'>Check Orders Details</a></p>";
        }
        else{
            echo "<h3 class='text-center text-success mt-5 mb-3'>You have No pending orders.</h3>
                   <p class='text-center '><a href='../index.php' class='text-dark'>Check Orders Details</a></p>";
       
        }
    }
}


?>