<?php
    class CSTest extends \PHPUnit\Framework\TestCase{
        public function testaddTablePaxNo(){
            $user = new App\classCustomer;
            $result = $user->addTablePaxNo("12","44",);
            $this->assertTrue($result);
        }
        public function testaddMenuItemToOrders(){
            $user = new App\classCustomer;
            $result = $user->addMenuItemToOrders("103","1","20");
            $this->assertTrue($result);
        }
        public function testaddCreditCard(){
            $user = new App\classCustomer;
            $result = $user->addCreditCard("1","test@gmail.com","123456789","03/24","MasterCard");
            $this->assertTrue($result);
        }
    }
?>