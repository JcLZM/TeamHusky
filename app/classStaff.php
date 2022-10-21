<?php
namespace App;
use App\classUser;
class classStaff extends classUser{
public function addMenuItemToOrders($orderId, $itemId, $quantity)
    {
        $errorMsg = '';
        $conn = OpenCon();
        $query = "INSERT INTO menuitemsorders (orderId, itemId, quantity) VALUES('$orderId', '$itemId', '$quantity')";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
        return $result; // If insert successful, it should return 1 (number of rows inserted)
    }

}