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
        protected function tearDown()
        {
            Store::deleteAll();
        }

        function testGetName()
        {
            // Arrange
            $id = 1;
            $name = "The Shoe Emporium";
            $test_store = new Store($id, $name);

            // Act
            $result = $test_store->getName();

            // Assert
            $this->assertEquals($name, $result);
        }

        function testGetId()
        {
            // Arrange
            $id = 1;
            $name = "The Shoe Emporium";
            $test_store = new Store($id, $name);

            // Act
            $result = $test_store->getId();

            // Assert
            $this->assertEquals($id, $result);
        }
// CANNOT HAVE POSSESSIVES IN TESTS!!!!!
        function testSave()
        {
            // Arrange
            $id = 1;
            $name = "The Shoe Emporium";
            $test_store = new Store($id, $name);

            // Act
            $test_store->save();

            // Assert
            $result = Store::getAll();
            $this->assertEquals($test_store, $result[0]);
        }

        function testGetAll()
        {
            // Arrange
            $id = 1;
            $name = "The Shoe Emporium";
            $test_store = new Store($id, $name);
            $test_store->save();

            $id2 = 2;
            $name2 = "The Blue Shoe";
            $test_store2 = new Store($id2, $name2);
            $test_store2->save();

            // Act
            $result = Store::getAll();

            // Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function testDeleteAll()
        {
            // Arrange
            $id = 1;
            $name = "The Shoe Emporium";
            $test_store = new Store($id, $name);
            $test_store->save();

            $id2 = 2;
            $name2 = "The Blue Shoe";
            $test_store2 = new Store($id2, $name2);
            $test_store2->save();

            // Act
            Store::deleteAll();

            // Assert
            $result = Store::getAll();
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            // Arrange
            $id = 1;
            $name = "The Shoe Emporium";
            $test_store = new Store($id, $name);
            $test_store->save();

            $id2 = 2;
            $name2 = "The Blue Shoe";
            $test_store2 = new Store($id2, $name2);
            $test_store2->save();

            // Act
            $result = Store::find($test_store->getId());

            // Assert
            $this->assertEquals($test_store, $result);
        }

        function testUpdate()
        {
            // Arrange
            $id = 1;
            $name = "The Shoe Emporium";
            $test_store = new Store($id, $name);
            $test_store->save();

            $new_name = "Shoe Palace";

            // Act
            $test_store->update($new_name);

            // Assert
            $result = $test_store->getName();
            $this->assertEquals($new_name, $result);
        }

        function testDelete()
        {
            // Arrange
            $id = 1;
            $name = "The Shoe Emporium";
            $test_store = new Store($id, $name);
            $test_store->save();

            $id2 = 2;
            $name2 = "The Blue Shoe";
            $test_store2 = new Store($id2, $name2);
            $test_store2->save();

            // Act
            $test_store->delete();

            // Assert
            $result = Store::getAll();
            $this->assertEquals([$test_store2], $result);
        }
    }
?>
