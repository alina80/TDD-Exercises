<?php
require_once(__DIR__ . '/db.php');

$twitterArraysSQL = [
    "create table Users(
                        id int AUTO_INCREMENT NOT NULL,
                        name varchar(255) NOT NULL,
                        email varchar(255) NOT NULL,
                        password varchar(60) NOT NULL,
                        info text,
                        PRIMARY KEY(id))
     ENGINE=InnoDB, CHARACTER SET=utf8"
    ,
    "create table Tweets(
                        id int AUTO_INCREMENT NOT NULL,
                        user_id int NOT NULL,
                        tweet varchar(140) NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(user_id) REFERENCES Users(id) ON DELETE CASCADE)
     ENGINE=InnoDB, CHARACTER SET=utf8"
    ,
    "create table Comments(
                        id int AUTO_INCREMENT NOT NULL,
                        tweet_id int NOT NULL,
                        user_id int NOT NULL,
                        comment varchar(60) NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(user_id) REFERENCES Users(id) ON DELETE CASCADE,
                        FOREIGN KEY(tweet_id) REFERENCES Tweets(id) ON DELETE CASCADE)
     ENGINE=InnoDB, CHARACTER SET=utf8"
    ,
    "create table Messages(
                        id int AUTO_INCREMENT NOT NULL,
                        sender_id int NOT NULL,
                        receiver_id int NOT NULL,
                        opened datetime NOT NULL,
                        message text NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(sender_id) REFERENCES Users(id) ON DELETE CASCADE,
                        FOREIGN KEY(receiver_id) REFERENCES Users(id) ON DELETE CASCADE)
     ENGINE=InnoDB, CHARACTER SET=utf8"
    ,
    "create table Friendships(
                        id int AUTO_INCREMENT NOT NULL,
                        user1_id int NOT NULL,
                        user2_id int NOT NULL,
                        PRIMARY KEY(id),
                        FOREIGN KEY(user1_id) REFERENCES Users(id) ON DELETE CASCADE,
                        FOREIGN KEY(user2_id) REFERENCES Users(id) ON DELETE CASCADE)
     ENGINE=InnoDB, CHARACTER SET=utf8"];

foreach ($twitterArraysSQL as $query) {
    try {
        $result = $conn->query($query);
        echo "The table was created correctly<br>";
    } catch (PDOException $e) {
        echo "Error creating table: " . $e->getMessage() . "<br>";
    }
}

$conn = null;