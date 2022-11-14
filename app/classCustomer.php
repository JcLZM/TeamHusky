<!-- <?php
namespace App;
use App\classUser;
class classCustomer extends classUser{
    public function addTablePaxNo($tableNo, $paxNo)
    {
        $conn = OpenCon();
        $query = "INSERT INTO orders (tableNo, paxNo) VALUES('$tableNo', '$paxNo')";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
        $_SESSION['orderId'] = $conn -> insert_id;
        return $result; // If insert successful, it should return 1 (number of rows inserted)
    }
    public function addMenuItemToOrders($orderId, $itemId, $quantity)
    {
        $errorMsg = '';
        $conn = OpenCon();
        $query = "INSERT INTO menuitemsorders (orderId, itemId, quantity) VALUES('$orderId', '$itemId', '$quantity')";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
        return $result; // If insert successful, it should return 1 (number of rows inserted)
    }

    public function addCreditCard($orderId, $custEmail, $cardNum, $expiryDate, $cardType)
    {
        $conn = OpenCon();
        $query = "INSERT INTO payment (orderId, custEmail, cardNum, expiryDate, cardType) VALUES('$orderId', '$custEmail', '$cardNum', '$expiryDate', '$cardType')";
        $result = mysqli_query($conn,$query) or die(mysqli_connect_errno()." Data cannot inserted");
        return $result; // If insert successful, it should return 1 (number of rows inserted)
    }

}
?>-->