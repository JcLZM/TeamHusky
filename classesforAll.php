<?php
include "classUser.php";

class Admin extends User{

    public function viewAccount(){
        $conn = OpenCon();
        $query = "SELECT * FROM user";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    public function viewAccountByID($recordId){
        $conn = OpenCon();
        $query = "SELECT * FROM user where id = '$recordId'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    public function viewUserRole(){
        $conn = OpenCon();
        $query = "SELECT * FROM userrole";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    public function viewUserRoleByID($recordId){
        $conn = OpenCon();
        $query = "SELECT * FROM userrole where id = '$recordId'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    public function registerAccount($name, $surname, $email, $phone, $password, $gender, $address) {
        $errorMsg = '';
        // Check if username already exists
        $query = "SELECT * FROM user WHERE email='".$email."'";
        $conn = OpenCon();
        $result = mysqli_query($conn,$query);
        $rowCount = mysqli_num_rows($result);
        //if the username is not in db then insert to the table
        if ($rowCount == 0) {
            $sql = "INSERT INTO user (first_name, last_name, email, gender, address, contact, password) 
                    VALUES('$name', '$surname', '$email','$gender', '$address', '$phone', '$password')"; 
            $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot inserted");
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        }
        else { 
            return false;
        }
    }
    
    public function registerUserRole($userId, $role) {
        $errorMsg = '';
        // Check if username already exists
        $query = "SELECT * FROM userrole WHERE userId='".$userId."'";
        $conn = OpenCon();
        $result = mysqli_query($conn,$query);
        $rowCount = mysqli_num_rows($result);
        //if the username is not in db then insert to the table
        if ($rowCount == 0) {
            $sql = "INSERT INTO userrole (userId, role) 
                    VALUES('$userId', '$role')"; 
            $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot inserted");
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        }
        else { 
            return false;
        }
    }

    public function suspendUserRole($userId, $role) {
        $errorMsg = '';
        $conn = OpenCon();
        $sql = "UPDATE userrole SET userId='$userId',role='$role' WHERE userId='$userId'"; 
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot suspend");
        if($result)
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        else { 
            return false;
        }
        
    }

    public function updateUser($id,$name, $surname, $email, $phone, $password, $gender, $address) {
        $errorMsg = '';
        // Check if username already exists
        // $query = "SELECT * FROM user WHERE email='".$email."'";
        $conn = OpenCon();
        $sql = "UPDATE user SET first_name='$name',last_name='$surname',email='$email',gender='$gender',address='$address',contact='$phone',password='$password' WHERE id='$id'";
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot update");
        if($result)
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        else { 
            return false;
        }
    }

    public function updateUserRole($id,$userId, $role) {
        $errorMsg = '';
        // Check if username already exists
        $conn = OpenCon();
        $sql = "UPDATE userrole SET userId='$userId',role='$role' WHERE id='$id'";
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot update");
        if($result)
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        else { 
            return false;
        }
    }

    public function searchUser($email)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    public function searchUserRole($userId, $role)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM userrole WHERE userId = '$userId' or role = '$role'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    
}

class Manager extends User
{

}

class Owner extends User
{
    
}

class Staff extends User
{
    
    
}

class MenuItems
{
    //Create MI Function
    public function createMenuItems($itemName,$itemPrice)
    {
        $errorMsg = '';
        $conn = OpenCon();
        $query = "INSERT INTO menuitems (itemName, itemPrice) 
                    VALUES('$itemName', '$itemPrice')";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
        return $result; // If insert successful, it should return 1 (number of rows inserted)
    }

    //Update MI Function
    public function updateMenuItems($itemId,$itemName,$itemPrice)
    {
        $errorMsg = '';
        $conn = OpenCon();
        $sql = "UPDATE menuitems SET itemName='$itemName',itemPrice='$itemPrice' WHERE itemId='$itemId'";
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot update");
        if($result)
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        else { 
            return false;
        }
    }

    //Delete MI Function
    public function deleteMenuItems($recordId)
    {
        $errorMsg = '';
        $conn = OpenCon();
        $sql = "DELETE FROM menuitems WHERE itemId='$recordId'";
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Error! Please try again later.");
        if($result)
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        else { 
            return false;
        }
    }

    //View MI Functions
    public function viewMenuItems()
    {
        $conn = OpenCon();
        $query = "SELECT * FROM menuitems";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    public function viewMenuItemsByID($recordId)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM menuitems where itemId = '$recordId'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    public function searchMenuItems($itemName)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM menuitems where itemName = '$itemName'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }
}

class Coupon extends MenuItems
{
    //View Coupon Functions
    public function viewCoupon()
    {
        $conn = OpenCon();
        $query = "SELECT * FROM coupon";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    public function viewCouponByID($recordId)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM coupon where couponId = '$recordId'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //Create Coupon Function
    public function createCoupon($couponCode, $discountAmt, $couponStatus) 
    {
        $errorMsg = '';
        // Check if couponCode already exists
		$query = "SELECT * FROM coupon WHERE couponCode='".$couponCode."'";
        $conn = OpenCon();
        $result = mysqli_query($conn,$query);
		$rowCount = mysqli_num_rows($result);
        //if the couponCode is not in db then insert to the table
        if ($rowCount == 0) {
            $sql = "INSERT INTO coupon (couponCode, discountAmt, couponStatus) 
            VALUES('$couponCode', '$discountAmt', '$couponStatus')"; 
            $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot inserted");
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        }
        else { 
            return false;
        }
    }

    //Update Coupon Function
    public function updateCoupon($couponId, $discountAmt, $couponStatus)
    {
        $errorMsg = '';
        $conn = OpenCon();
        $sql = "UPDATE coupon SET discountAmt='$discountAmt', couponStatus='$couponStatus' WHERE couponId='$couponId'";
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot update");
        if($result)
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        else { 
            return false;
        }
    }

    //Search Coupon Function
    public function searchCoupon($couponCode)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM coupon WHERE couponCode = '$couponCode'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }
    
    public function redeemCoupon($couponId){
        $errorMsg = '';
        $conn = OpenCon();
        $sql = "UPDATE coupon SET couponStatus='Redeemed' WHERE couponId='$couponId'";
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot update");
        if($result)
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        else { 
            return false;
        }
    }
}

class Orders extends MenuItems
{
    public function viewMIOByOrderID($recordId)
    {
        $conn = OpenCon();
        $query = "SELECT *
        FROM menuitemsorders 
        WHERE orderId = '$recordId'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    public function viewMIOByItemID($recordId)
    {
        $conn = OpenCon();
        $query = "SELECT *
        FROM menuitemsorders
        JOIN menuitems ON menuitems.itemId = menuitemsorders.itemId 
        WHERE menuitemsorders.itemId = '$recordId'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //view bill transactions
    public function viewBillTransactions($orderId){
        $errorMsg = '';
        $conn = OpenCon();
        $query = "SELECT menuitemsorders.itemId,quantity, itemName, (itemPrice*quantity) AS totalPrice FROM menuitemsorders
        JOIN menuitems ON menuitems.itemId = menuitemsorders.itemId WHERE menuitemsorders.orderId='$orderId'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
        return $result; // If insert successful, it should return 1 (number of rows inserted)
    }

    //ViewMIO
    public function viewMIOrders()
    {
        $conn = OpenCon();
        $query = "SELECT menuitemsorders.orderId, menuitemsorders.itemId, orders.tableNo,menuitems.itemName, quantity, TIME(orders.createdAt)as 'OrderTime'  
        FROM menuitemsorders
        JOIN orders ON menuitemsorders.orderId = orders.orderId
        JOIN menuitems ON menuitemsorders.itemId = menuitems.itemId
        WHERE date(orders.createdAt) = CURDATE()
        ORDER BY menuitemsorders.orderId DESC";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }
    
    //AddMIO
    public function addMenuItemToOrders($orderId, $itemId, $quantity)
    {
        $errorMsg = '';
        $conn = OpenCon();
        $query = "INSERT INTO menuitemsorders (orderId, itemId, quantity) VALUES('$orderId', '$itemId', '$quantity')";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
        return $result; // If insert successful, it should return 1 (number of rows inserted)
    }
    
    //DeleteMIO
    public function removeItemFromOrders($orderId, $itemId)
    {
        $errorMsg = '';
        $conn = OpenCon();
        $query = "DELETE FROM menuitemsorders WHERE orderId='$orderId' and itemId = '$itemId'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
        return $result; // If insert successful, it should return 1 (number of rows inserted)  
    }

    //UpdateMIO
    public function updateItemInOrders($orderId, $quantity, $itemId) {
        $conn = OpenCon();
        $sql = "UPDATE menuitemsorders SET quantity= $quantity WHERE orderId= $orderId and itemId = $itemId";
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()." Data cannot update");
        if($result)
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        else { 
            return false;
        }
    }

    //view Avg Customer
    public function viewAvgCust()
    {
        $conn = OpenCon();
        $query = "SELECT ROUND(AVG(paxNo)) AS 'AverageCust' FROM orders";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //view DailyASC
    public function viewDailyASC()
    {
        $conn = OpenCon();
        $query = "SELECT ROUND(AVG(itemprice*quantity), 2) AS 'AVGSpending', orders.orderId, DATE(createdAt) AS 'Daily'
        FROM menuitemsorders
        JOIN menuitems ON menuitems.itemId = menuitemsorders.itemId
        JOIN orders ON menuitemsorders.orderId = orders.orderId
        GROUP BY DAY(createdAt)";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //view WeeklyASC
    public function viewWeeklyASC()
    {
        $conn = OpenCon();
        $query = "SELECT ROUND(AVG(itemPrice*quantity), 2) AS 'AVGSpending', WEEK(createdAt) AS 'WeekNo', DATE(createdAt) AS 'Weekly'
                FROM menuitemsorders
                JOIN menuitems ON menuitems.itemId = menuitemsorders.itemId
                JOIN orders ON menuitemsorders.orderId = orders.orderId
                GROUP BY WEEK(createdAt)";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //view MonthlyASC
    public function viewMonthlyASC()
    {
        $conn = OpenCon();
        $query = "SELECT ROUND(AVG(itemPrice*quantity), 2) AS 'AVGSpending', MONTHNAME(createdAt) AS 'Monthly'
        FROM menuitemsorders
        JOIN menuitems ON menuitems.itemId = menuitemsorders.itemId
        JOIN orders ON menuitemsorders.orderId = orders.orderId
        GROUP BY MONTH(createdAt)";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //view DailyFPC
    public function viewDailyFPC()
    {
        $conn = OpenCon();
        $query = "SELECT COUNT(orderId) AS 'FPCustomer', DATE(createdAt) AS 'Daily'
        FROM orders
        GROUP BY DAY(createdAt)";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //view WeeklyFPC
    public function viewWeeklyFPC()
    {
        $conn = OpenCon();
        $query = "SELECT COUNT(orderId) AS 'FPCustomer', WEEK(createdAt) AS 'WeekNo', DATE(createdAt) AS 'Weekly'
        FROM orders
        GROUP BY WEEK(createdAt)";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //view MonthlyFPC
    public function viewMonthlyFPC()
    {
        $conn = OpenCon();
        $query = "SELECT COUNT(orderId) AS 'FPCustomer', MONTHNAME(createdAt) AS 'Monthly'
        FROM orders
        GROUP BY MONTH(createdAt)";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //view DailyMI
    public function viewDailyMI($DailyMI)
    {
        $conn = OpenCon();
        $query = "SELECT SUM(quantity) AS TotalQtySold, itemName , DATE(createdAt) AS 'Daily'
        FROM menuitemsorders 
        JOIN menuitems on menuitems.itemId = menuitemsorders.itemId 
        JOIN orders on orders.orderId = menuitemsorders.orderId 
        WHERE DATE(orders.createdAt) = '$DailyMI' 
        GROUP BY itemName 
        ORDER BY TotalQtySold DESC 
        LIMIT 3";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //view WeeklyMI
    public function viewWeeklyMI($WeeklyMI)
    {
        $conn = OpenCon();
        $query = "SELECT SUM(quantity) AS TotalQtySold, itemName, WEEK(createdAt) AS 'WeekNo', DATE(createdAt) AS 'Weekly' 
        FROM menuitemsorders 
        JOIN menuitems on menuitems.itemId = menuitemsorders.itemId 
        JOIN orders on orders.orderId = menuitemsorders.orderId 
        WHERE DATE(orders.createdAt) BETWEEN date_sub('$WeeklyMI', interval 1 week) AND '$WeeklyMI' 
        GROUP BY itemName 
        ORDER BY TotalQtySold DESC 
        LIMIT 3";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //view MonthlyMI
    public function viewMonthlyMI($MonthlyMI)
    {
        $conn = OpenCon();
        $query = "SELECT SUM(quantity) AS TotalQtySold, itemName, MONTHNAME(createdAt) AS 'MonthlyName', DATE(createdAt) AS 'Monthly'
        FROM menuitemsorders 
        JOIN menuitems on menuitems.itemId = menuitemsorders.itemId 
        JOIN orders on orders.orderId = menuitemsorders.orderId 
        WHERE DATE(orders.createdAt) BETWEEN date_sub('$MonthlyMI', interval 1 month) AND '$MonthlyMI' 
        GROUP BY itemName 
        ORDER BY TotalQtySold DESC 
        LIMIT 3";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." SQL Error");
        return $result;
    }

    //Add Table and Pax No
    public function addTablePaxNo($tableNo, $paxNo)
    {
        $conn = OpenCon();
        $query = "INSERT INTO orders (tableNo, paxNo) VALUES('$tableNo', '$paxNo')";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
        $_SESSION['orderId'] = $conn -> insert_id;
        return $result; // If insert successful, it should return 1 (number of rows inserted)
    }

    //Add Credit Card
    public function addCreditCard($orderId, $custEmail, $cardNum, $expiryDate, $cardType)
    {
        $conn = OpenCon();
        $query = "INSERT INTO payment (orderId, custEmail, cardNum, expiryDate, cardType) VALUES('$orderId', '$custEmail', '$cardNum', '$expiryDate', '$cardType')";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
        return $result; // If insert successful, it should return 1 (number of rows inserted)
    }
}
?>