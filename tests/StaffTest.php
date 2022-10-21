<?php
    class StaffTest extends \PHPUnit\Framework\TestCase{
        public function testcreateMenuItems(){
            $user = new App\classStaff;
            $result = $user->addMenuItemToOrders("1","1","30");
            $this->assertTrue($result);
        }
    }
?>