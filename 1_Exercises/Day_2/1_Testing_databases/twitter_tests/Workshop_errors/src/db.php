<?php
require_once(__DIR__ . "/class/User.php");
require_once(__DIR__ . "/class/Tweet.php");
require_once(__DIR__ . "/class/Comment.php");
require_once(__DIR__ . "/class/Message.php");

//define db settings
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'coderslab');
define('DB_DB', 'Twitter_TDD');

try {
    // DB connection
    $conn = new PDO('mysql:dbname=' . DB_DB . ';host=' . DB_HOST, DB_USER, DB_PASSWORD,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
} catch (PDOException $e) {
    // Catch error
    echo 'Connection failed: ' . $e->getMessage();

    return;
}

//setting connections for Models
User::setConnection($conn);
Tweet::setConnection($conn);
Comment::setConnection($conn);
Message::setConnection($conn);