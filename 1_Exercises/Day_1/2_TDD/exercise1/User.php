<?php
session_start();
$_SESSION['users'] = [];
class User
{
    private string $username;
    private string $password;
    private bool $isLoggedIn;

    public function __construct()
    {
        $this->username = '';
        $this->password = '';
        $this->isLoggedIn = false;
    }

    public static function register(User $user) : bool
    {
        if ($user->getUsername() != '' && $user->getPassword() != ''){
            $_SESSION['users'][] = $user;
            return true;
        }
        return false;
    }

    public static function login($username,$password) : ?User
    {
        foreach ($_SESSION['users'] as $k => $user){
            if($user->username == $username && $user->password == $password){
                $loggedInUser = $user;
                $loggedInUser->setIsLoggedIn(true);

                return $loggedInUser;
            }
        }
        return null;
    }

    public static function changePassword($username,$password,$newPassword) :bool
    {
        foreach ($_SESSION['users'] as $k => $user){
            if($user->username == $username && $user->password == $password){
                $user->setPassword($newPassword);

                return true;
            }
        }
        return false;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        if (trim($username) != ''){
            $this->username = $username;
        }
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        if (trim($password) != ''){
            $this->password = $password;
        }
    }

    /**
     * @return bool
     */
    public function isLoggedIn(): bool
    {
        return $this->isLoggedIn;
    }

    /**
     * @param bool $isLoggedIn
     */
    public function setIsLoggedIn(bool $isLoggedIn): void
    {
        $this->isLoggedIn = $isLoggedIn;
    }



}