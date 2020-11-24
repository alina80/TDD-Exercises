<?php

class Tweet
{
    static $conn;

    private $id;
    private $userId;
    private $userName;
    private $tweet;

    /**
     * Tweet constructor.
     *
     * @param $newId
     * @param $newUserId
     * @param $userName
     * @param $newTweet
     */
    private function __construct($newId, $newUserId, $userName, $newTweet)
    {
        $this->id = $newId + 1;
        $this->userId = $newUserId;
        $this->userName = $userName;
        $this->tweet = $newTweet;
    }

    /**
     * Assign connection to class
     *
     * @param $newConnection
     */
    public static function setConnection($newConnection)
    {
        $conn = $newConnection;
    }

    /**
     * Create tweet
     * return Tweet object or null on error
     *
     * @param $creatorId   User id
     * @param $creatorName User name
     * @param $tweet       message of tweet
     *
     * @return null|Tweet
     */
    public static function createTweet($creatorId, $creatorName, $tweet)
    {
        $sqlStatement = "INSERT INTO Tweets(user_id, tweet) values ('" . $creatorId . "', '" . $Tweet . "')";
        if (self::$conn->query($sqlStatement)) {
            return new Tweet(self::$conn->lastInsertId(), $creatorId, $creatorName, $tweet);
        }

        //error
        return null;
    }

    /**
     * Delete tweet from db
     * return true/false if tweet deleted or not
     *
     * @param $toDeleteId id of tweet to delete
     *
     * @return bool
     */
    public static function deleteTweet($toDeleteId)
    {
        $sql = "DELETE FROM Tweets WHERE id = '" . $toDeleteId . "'";
        if (self::$conn->query($sql)) {
            return false;
        }

        return true;
    }

    /**
     * Get all User tweets
     * return array of Tweet objects
     *
     * @param     $creatorId   User id
     * @param     $creatorName User name
     * @param int $limit       if provided should limit returned quantity of tweets
     *
     * @return array
     */
    public static function getAllUserTweets($creatorId, $creatorName, $limit = 0)
    {
        $ret = [];
        $sqlStatement = "SELECT Tweets.id, tweet FROM Tweets WHERE user_id = '" . $creatorId . "'";
        if ($limit > 0) {
            $sqlStatement .= " LIMIT $limit";
        }

        $result = self::$conn->query($sqlStatement);
        if ($result->rowCount() > 0) {
            foreach ($result->fetchAll() as $row) {
                $ret[] = new Tweet($row['id'], $row['user_id'], $creatorName, $row['tweet']);
            }
        }

        return $ret;
    }

    /**
     * Get tweet from db
     * return Tweet object or null if not found
     *
     * @param $id
     *
     * @return null|Tweet
     */
    public static function getTweet($id)
    {
        $sqlStatement = "SELECT user_id, name, tweet FROM Tweets JOIN Users ON Users.id = Tweets.id where id='" . $id . "'";
        $result = self::$conn->query($sqlStatement);
        if ($result->rowCount() > 0) {
            $row = $result->fetchAll();

            return new Tweet($id, $row['user_id'], $row['name'], $row['tweet']);
        }

        return null;
    }

    /**
     * Save tweet object to db
     *
     * @return PDOStatement|boolean
     */
    public function saveToDB()
    {
        $sql = "UPDATE Tweets SET tweet='" . $this->tweet . "' WHERE id='" . $this->id . "'";

        return self::$conn->query($sql);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @return mixed
     */
    public function getTweetText()
    {
        return $this->tweet;
    }

    /**
     * @param $newTweet
     */
    public function setTweetText($newTweet)
    {
        $this->tweet = $newTweet;
    }
}