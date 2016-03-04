<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Brand.php";

    $server = 'mysql:host=localhost:8889;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
        }

        function testGetName()
        {
            // Arrange
            $id = 1;
            $name = "Nike";
            $test_brand = new Brand($id, $name);

            // Act
            $result = $test_brand->getName();

            // Assert
            $this->assertEquals($name, $result);
        }

        function testGetId()
        {
            // Arrange
            $id = 1;
            $name = "Nike";
            $test_brand = new Brand($id, $name);

            // Act
            $result = $test_brand->getId();

            // Assert
            $this->assertEquals($id, $result);
        }

        function testSave()
        {
            // Arrange
            $id = 1;
            $name = "Nike";
            $test_brand = new Brand($id, $name);

            // Act
            $test_brand->save();

            // Assert
            $result = Brand::getAll();
            $this->assertEquals($test_brand, $result[0]);
        }

        function testGetAll()
        {
            // Arrange
            $id = 1;
            $name = "Nike";
            $test_brand = new Brand($id, $name);
            $test_brand->save();

            $id2 = 2;
            $name2 = "Adidas";
            $test_brand2 = new Brand($id2, $name2);
            $test_brand2->save();

            // Act
            $result = Brand::getAll();

            // Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function testDeleteAll()
        {
            // Arrange
            $id = 1;
            $name = "Nike";
            $test_brand = new Brand($id, $name);
            $test_brand->save();

            $id2 = 2;
            $name2 = "Adidas";
            $test_brand2 = new Brand($id2, $name2);
            $test_brand2->save();

            // Act
            Brand::deleteAll();

            // Assert
            $result = Brand::getAll();
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            // Arrange
            $id = 1;
            $name = "Nike";
            $test_brand = new Brand($id, $name);
            $test_brand->save();

            $id2 = 2;
            $name2 = "Adidas";
            $test_brand2 = new Brand($id2, $name2);
            $test_brand2->save();

            // Act
            $result = Brand::find($test_brand->getId());

            // Assert
            $this->assertEquals($test_brand, $result);
        }

        function testAddStore()
        {
            // Arrange
            $id = 1;
            $name = "Nike";
            $test_brand = new Brand($id, $name);
            $test_brand->save();

            $name2 = "The Shoe Emporium";
            $test_store = new Store($id, $name2);
            $test_store->save();

            // Act
            $test_brand->addStore($test_store);

            // Assert
            $result = $test_brand->getStores();
            $this->assertEquals([$test_store], $result);
        }

        function testGetStores()
        {
            // Arrange
            $id = 1;
            $name = "Nike";
            $test_brand = new Brand($id, $name);
            $test_brand->save();

            $name2 = "The Shoe Emporium";
            $test_store = new Store($id, $name2);
            $test_store->save();

            $id2 = 2;
            $name3 = "The Blue Shoe";
            $test_store2 = new Store($id2, $name3);
            $test_store2->save();

            // Act
            $test_brand->addStore($test_store);
            $test_brand->addStore($test_store2);
            $result = $test_brand->getStores();

            // Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }
    }
?>
