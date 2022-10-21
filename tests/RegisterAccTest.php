<?php
    class RegisterAccTest extends \PHPUnit\Framework\TestCase{
        public function testRegisteruser(){
            $user = new App\classAdmin;
            $result = $user->registerAccount("test","test","test123@gmail.com","test","password","male","test 123");
            $this->assertTrue($result);
        }
        public function testRegisterRole(){
            $user = new App\classAdmin;
            $result = $user->registerUserRole("7","Admin");
            $this->assertTrue($result);
        }
    }
?>