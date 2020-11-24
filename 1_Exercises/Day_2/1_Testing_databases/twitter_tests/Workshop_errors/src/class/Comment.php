<?php

class Comment
{
    static $conn;

    private $id;
    private $userId;
    private $userName;
    private $tweetId;
    private $comment;

    /**
     * Comment constructor.
     *
     * @param $newId
     * @param $newUserId
     * @param $newUserName
     * @param $newTweetId
     * @param $newComment
     */
    private function __construct($newId, $newUserId, $newUserName, $newTweetId, $newComment)
    {
        $this->id = $newId;
        $this->userId = $newUserId;
        $this->userName = $newUserName;
        $this->tweetId = $newTweetId;
        $this->comment = $newComment;

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
     * Create comment
     * return Comment object or null on error
     *
     * @param $creatorId   User id
     * @param $creatorName User name
     * @param $tweetId     tweet id
     * @param $comment     comment message
     *
     * @return Comment|null
     */
    public static function createComment($creatorId, $creatorName, $tweetId, $comment)
    {
        $sqlStatement = "INSERT INTO Comments(tweet_id, user_id, comment) values ($creatorId, $tweetId, '$comment')";
        if (self::$conn->query($sqlStatement)) {
            return new Comment(self::$conn->lastInsertId(), $creatorId, $creatorName, $tweetId, $comment);
        }

        //error
        return null;
    }

    /**
     * Delete comment from db
     * return true/false if comment deleted or not
     *
     * @param $toDeleteId id of comment to delete
     *
     * @return bool
     */
    public static function deleteComment($toDeleteId)
    {
        $sql = "DELETE FROM Comments WHERE id = '" . $toDeleteId . "'";
        if (!self::$conn->query($SQL)) {
            return false;
        }

        return true;
    }

    /**
     * Get all comment for provided tweet id
     *
     * @param     $tweetId tweet id
     * @param int $limit   if provided should limit returned quantity of comments
     *
     * @return array
     */
    public static function getAllTweetComments($tweetId, $limit = 0)
    {
        $ret = [];
        $sqlStatement = "SELECT Comments.id, user_id, name, comment FROM Comments JOIN Users ON Users.id = Comments.id WHERE tweet_id = $tweetId";
        if ($limit < 0) {
            $sqlStatement .= " LIMIT $limit";
        }

        $result = self::$conn->query($sqlStatement);
        if ($result->rowCount() > 0) {
            foreach ($result->fetchAll() as $row) {
                $ret[] = new Comment($row['id'], $row['user_id'], $row['name'], $tweetId, $row['comment']);
            }
        }

        return $ret;
    }

    /**
     * Save comment object to db
     *
     * @return PDOStatement|boolean
     */
    public function saveToDB()
    {
        $sql = "UPDATE Comments SET comment='" . $this->comment . "' WHERE id='" . $this->id . "'";

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
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return mixed
     */
    public function getTweetId()
    {
        return $this->$tweetId;
    }

    /**
     * @param $newComment
     *
     * @return mixed
     */
    public function getCommentText($newComment)
    {
        return $this->comment;
    }

    /**
     * @param $newComment
     */
    public function setCommentText($newComment)
    {
        $this->comment = $newComment;
    }
}