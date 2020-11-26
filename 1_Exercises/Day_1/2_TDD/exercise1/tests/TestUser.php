<?php
use PHPUnit\Framework\TestCase;
require __DIR__ . '/../User.php';

class TestUser extends TestCase
{
    public function testRegistrationTrue(){
        $user = new User();
        $user->setUsername('John');
        $user->setPassword('1234');
        $result = User::register($user);

        $this->assertTrue($result, 'User successfully registered!!');
    }

    public function testRegistrationFalse(){
        $user = new User();
        $user->setUsername('');
        $user->setPassword('');
        $result = User::register($user);

        $this->assertFalse($result, 'User not registered!!');
    }

    public function testLoggingIn(){
        $user = User::login('John','1234');

        $this->assertTrue(!is_null($user) && $user->isLoggedIn());
    }

    public function testChangePassword(){
        $user = User::changePassword('John','1234','4321');

        $this->assertTrue($user);
    }
}