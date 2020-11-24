<?php

class Message
{
    static $conn;

    private $id;
    private $senderId;
    private $senderName;
    private $receiverId;
    private $receiverName;
    private $opened;
    private $message;

    /**
     * Message constructor.
     *
     * @param $newId
     * @param $senderId
     * @param $senderName
     * @param $receiverId
     * @param $receiverName
     * @param $message
     * @param $opened
     */
    private function __construct($newId, $senderId, $senderName, $receiverId, $receiverName, $message, $opened)
    {
        $this->id = $newId;
        $this->senderId = $senderId;
        $this->senderName = $senderName;
        $this->receiverId = $receiverId;
        $this->receiverName = $receiverName;
        $this->message = $message;
        $this->opened = false;
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

    //this function return:
    //   true if tweet was deleted
    //   false if not

    /**
     * Create messate
     * return Message object or null on error
     *
     * @param $senderId     User id
     * @param $senderName   User name
     * @param $receiverId   User id
     * @param $receiverName User name
     * @param $message      message
     *
     * @return Message|null
     */
    public static function createMessage($senderId, $senderName, $receiverId, $receiverName, $message)
    {
        $sqlStatement = "INSERT INTO Messages(sender_id, receiver_id, message) values ('" . $senderId . "', '" . $receiverId . "', '" . $message . "')";
        if (self::$conn->query($sqlStatement)) {
            return new Message(self::$conn->lastInsertId(), $senderId, $senderName, $receiverId, $receiverName, $message, false);
        }

        //error
        return null;
    }

    /**
     * Delete message from db
     * return true/false if message deleted or not
     *
     * @param $toDeleteId id of message to delete
     *
     * @return bool
     */
    public static function deleteMessage($toDeleteId)
    {
        $sql = "DELETE FROM Messages WHERE id = '" . $toDeleteId . "'";
        if (self::$conn->query($sql)) {
            return true;
        }

        return false;
    }

    /**
     * Get all User received messages
     * return array of Messages objects
     *
     * @param     $receiverId   User id
     * @param     $receiverName User name
     * @param int $limit        if provided should limit returned quantity of messages
     *
     * @return array
     */
    public static function getAllReceivedMessages($receiverId, $receiverName, $limit = 0)
    {
        $ret = [];
        $sqlStatement = "SELECT Messages.id, sender_id, name, receiver_id, opened, message FROM Messages JOIN Users ON Messages.sender_id = Users.id WHERE receiver_id = '" . $receiverId . "'";
        if ($limit > 0) {
            $sqlStatement .= " LIMIT $limit";
        }

        $result = self::$conn->query($sqlStatement);
        if ($result->rowCount() > 0) {
            foreach ($result->fetchAll() as $row) {
                $ret[] = new Message($row['id'], $row['receiver_id'], $row['name'], $row['receiver_id'], $receiverName, $row['message'], $row['opened']);
            }
        }

        return $ret;
    }

    /**
     * Get all User send messages
     * return array of Messages objects
     *
     * @param     $senderId   User id
     * @param     $senderName User name
     * @param int $limit      if provided should limit returned quantity of messages
     *
     * @return array
     */
    public static function getAllSendMessages($senderId, $senderName, $limit = 1)
    {
        $ret = [];
        $sqlStatement = "SELECT Messages.id, sender_id, name, receiver_id, opened, message from Messages JOIN Users ON Messages.receiver_id = Users.id WHERE sender_id ='" . $senderId . "'";
        if ($limit > 0) {
            $sqlStatement .= " LIMIT $limit";
        }
        $result = self::$conn->query($sqlStatement);
        if ($result->rowCount() > 0) {
            foreach ($result->fetchAll() as $row) {
                $ret[] = new Message($row['id'], $row['sender_id'], $senderName, $row['receiver_id'], $row['name'], $row['message'], $row['opened']);
            }
        }

        return $ret;
    }


    /**
     * Save message open time to db
     */
    public function openMessage()
    {
        $this->opened = date("Y-m-d H:i:s");
        $this->saveToDB();
    }

    /**
     * Save Message object to db
     *
     * @return PDOStatement|boolean
     */
    public function saveToDB()
    {
        $sql = "UPDATE Messages SET opened='" . $this->receiverId . "' WHERE id='" . $this->id . "'";

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
    public function getSenderId()
    {
        return $this->senderId;
    }

    /**
     * @return mixed
     */
    public function getSenderName()
    {
        return $this->senderName;
    }

    /**
     * @return mixed
     */
    public function getReceiverId()
    {
        return $this->receiverId;
    }

    /**
     * @return mixed
     */
    public function getReceiverName()
    {
        return $this->senderName;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param $newMessage
     */
    public function setMessageText($newMessage)
    {
        $this->message = $newMessage;
    }
}