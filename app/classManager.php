<!-- <?php
namespace App;
use App\classUser;
class classManager extends classUser{
    //Create MI Function
    public function createMenuItems($itemName,$itemPrice)
    {
        $errorMsg = '';
        $conn = OpenCon();
        $query = "INSERT INTO menuitems (itemName, itemPrice) 
                    VALUES('$itemName', '$itemPrice')";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()."Data cannot inserted");
        return $result; // If insert successful, it should return 1 (number of rows inserted)
    }

    //Update MI Function
    public function updateMenuItems($itemId,$itemName,$itemPrice)
    {
        $errorMsg = '';
        $conn = OpenCon();
        $sql = "UPDATE menuitems SET itemName='$itemName',itemPrice='$itemPrice' WHERE itemId='$itemId'";
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()."Data cannot update");
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
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()."Error! Please try again later.");
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
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()."SQL Error");
        return $result;
    }

    public function viewMenuItemsByID($recordId)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM menuitems where itemId = '$recordId'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()."SQL Error");
        return $result;
    }

    //View Coupon Functions
    public function viewCoupon()
    {
        $conn = OpenCon();
        $query = "SELECT * FROM coupon";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()."SQL Error");
        return $result;
    }

    public function viewCouponByID($recordId)
    {
        $conn = OpenCon();
        $query = "SELECT * FROM coupon where couponId = '$recordId'";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()."SQL Error");
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
            $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()."Data cannot inserted");
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
        $result = mysqli_query($conn,$sql) or die(mysqli_connect_errno()."Data cannot update");
        if($result)
            return $result; // If insert successful, it should return 1 (number of rows inserted)
        else { 
            return false;
        }
    }
}
?> -->