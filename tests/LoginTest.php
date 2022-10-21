<?php
    class LoginTest extends \PHPUnit\Framework\TestCase{
        public function testloginuser(){
            $user = new App\classUser;
            $result = $user->loginUser("Admin@gmail.com","password");
            $this->assertTrue($result);
        }
        public function testlogoutuser(){
            $user = new App\classUser;
            $result = $user->logout();
            $this->assertFalse(false,$result);
        }
    }
?>