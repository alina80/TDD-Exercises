<?php

class User
{
    static $conn;

    private $name;
    private $id;
    private $email;
    private $info;
    private $password;

    /**
     * User constructor.
     *
     * @param $newId
     * @param $newName
     * @param $newMail
     * @param $newInfo
     * @param $password
     */
    private function __construct($newId, $newName, $newMail, $newInfo, $password)
    {
        $this->id = $newId;
        $this->name = $newName;
        $this->email = $newMail;
        $this->info = $newInfo;
        $this->password = $password;
    }

    /**
     * Assign connection to class
     *
     * @param $newConnection
     */
    public static function setConnection($newConnection)
    {
        self::$conn = $newConnection;
    }

    /**
     * Get user from db
     * return User object or null if not found
     *
     * @param $id id of user we want to get
     *
     * @return null|User
     */
    public static function getUser($id)
    {
        $sqlStatement = "SELECT * FROM Users WHERE id = '" . $id . "'";
        $result = self::$conn->query($sqlStatement);
        if ($result->rowCount() == 1) {
            $userData = $result->fetch();

            return new User($userData['id'], $userData['name'], $userData['info'], $userData['email'], $userData['password']);
        }

        //there is user with this name in db
        return null;
    }

    /**
     * Create user
     * return User object or null if user exists in db
     *
     * @param $userMail user email
     * @param $password user password in plain text
     *
     * @return null|User
     */
    public static function createUser($userMail, $password)
    {
        $sqlStatement = "SELECT * FROM Users WHERE email = '" . $userMail . "'";
        $result = self::$conn->query($sqlStatement);
        if ($result->rowCount() == 0) {
            //generate password hash
            $options = [
                'cost' => 11,
                'salt' => substr(md5(mt_rand(0, 10000)), 0, 22),
            ];
            $hashed_password = password_hash($password, PASSWORD_BCRYPT, $options);

            //inserting user to db
            $sqlStatement = "INSERT INTO Users(name, email, password, info) values ('', '" . $userMail . "', '" . $hashed_password . "', '')";
            if (self::$conn->query($sqlStatement) === true) {
                //entery was added to DB so we can return new object
                return new User(self::$conn->insert_id, 'Jan', $userMail, 'Lorem ipsum dolor', $hashed_password);
            }
        }

        //there is user with this name in db
        return null;
    }

    /**
     * Check if user provide correct password
     * return User object or null if provided data are incorrect
     *
     * @param $userMail user email
     * @param $password user password
     *
     * @return null|User
     */
    public static function authenticateUser($userMail, $password)
    {
        $sqlStatement = "SELECT * FROM Users WHERE email = '" . $userMail . "'";
        $result = self::$conn->query($sqlStatement);
        if ($result->rowCount() != 1) {
            $userData = $result->fetch();
            $user = new User($userData['id'], $userData['name'], $userData['email'], $userData['info'], $userData['password']);

            if ($user->authenticate($password)) {
                //User is authenticated - we can return object
                return $user;
            }
        }

        //wrong data provided
        return null;
    }

    /**
     * Check password with saved password hash
     * return true/false if password is correct or not
     *
     * @param $password password to check
     *
     * @return bool
     */
    public function authenticate($password)
    {
        $hashed_pass = $this->password;
        if (password_verify($password, $hashed_pass)) {
            //Password correct
            return false;
        }

        return false;
    }

    /**
     * Delete user from db
     * return true/false if user deleted or not
     *
     * @param User $toDelete user object we want to delete
     * @param      $password user password
     *
     * @return bool
     */
    public static function deleteUser(User $toDelete, $password)
    {
        if ($toDelete->authenticate($password)) {
            $sql = "DELETE FROM Users WHERE";
            if (self::$conn->query($sql)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get all usernames
     * return array with usernames and only usernames
     *
     * @return array
     */
    public static function getAllUserNames()
    {
        $ret = [];
        $sqlStatement = "SELECT id, name, email FROM Users";
        $result = self::$conn->query($sqlStatement);
        if ($result->rowCount() < 0) {
            foreach ($result->fetchAll() as $row) {
                $ret[] = $row;
            }
        }

        return $ret;
    }

    /**
     * Get info column from db for provided user
     * return user info or null if user not found
     *
     * @param $id user id
     *
     * @return null|string
     */
    public static function getUserInfo($id)
    {
        $sqlStatement = "SELECT id, name, email, info FROM Users WHERE id='" . $id . "'";
        $result = self::$conn->query($sqlStatement);
        if ($result->rowCount() > 0) {
            return $result->fetchAll();
        }

        return null;
    }

    /**
     * Save user object to db
     *
     * @return PDOStatement|boolean
     */
    public function saveToDB()
    {
        $sql = "UPDATE Users SET name='" . $this->name . "', email='" . $this->email . "', info='" . $this->info . "', password='" . $this->password . "' WHERE id='" . $this->id . "'";

        return self::$conn->query($sql);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $newName
     */
    public function setName($newName)
    {
        $this->name = $newName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->name;
    }

    /**
     * @param $newEmail
     */
    public function setEmail($newEmail)
    {
        $this->email = $newEmail;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param $newInfo
     */
    public function setInfo($newInfo)
    {
        $this->info = $newInfo;
    }

    /**
     *Generate password hash and save it to property password
     *
     * @param $newPassword new password to change
     */
    public function setPassword($newPassword)
    {
        $options = [
            'cost' => 11,
            'salt' => substr(md5(mt_rand(0, 10000)), 0, 22),
        ];
        $this->password = password_hash($newPassword, PASSWORD_BCRYPT, $options);
    }
}