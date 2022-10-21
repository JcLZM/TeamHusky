<?php
    class RMTest extends \PHPUnit\Framework\TestCase{
        public function testcreateMenuItems(){
            $user = new App\classManager;
            $result = $user->createMenuItems("Chicken Rice","4.00");
            $this->assertTrue($result);
        }
        public function testCreateCoupon(){
            $user = new App\classManager;
            $result = $user->createCoupon("couponCode123","2","Available");
            $this->assertTrue($result);
        }
    }
?>