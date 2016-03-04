<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Store.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        function testGetName()
        {
            // Arrange
            $id = null;
            $name = "Jared's Shoe Emporium";
            $test_store = new Store($id, $name);

            // Act
            $result = $test_store->getName();

            // Assert
            $this->assertEquals($name, $result);
        }

        function testGetId()
        {
            // Arrange
            $id = null;
            $name = "Jared's Shoe Emporium";
            $test_store = new Store($id, $name);

            // Act
            $result = $test_store->getId();

            // Assert
            $this->assertEquals($id, $result);
        }
    }
?>
