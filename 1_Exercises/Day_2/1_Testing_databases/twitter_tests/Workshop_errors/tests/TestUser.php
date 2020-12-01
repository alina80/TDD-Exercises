<?php

require __DIR__ . '/../src/class/User.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class TestUser extends TestCase
{
    use TestCaseTrait;


    protected function getConnection()
    {
        $host = $GLOBALS['DB_HOST'];
        $user = $GLOBALS['DB_USER'];
        $password = $GLOBALS['DB_PASSWORD'];
        $db = $GLOBALS['DB_NAME'];

        try {
            // DB connection
            $conn = new PDO('mysql:dbname=' . $db . ';host=' . $host, $user, $password,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
        } catch (PDOException $e) {
            // Catch error
            echo 'Connection failed: ' . $e->getMessage();

           // return;
        }

        return $this->createDefaultDBConnection($conn, $db);
    }

    protected function getDataSet()
    {
        return $this->createMySQLXMLDataSet(__DIR__ . '/../datasets/users.xml');
    }

    public function testUsers()
    {
        $this->assertEquals(0,$this->getConnection()->getRowCount('Users'));
    }
}