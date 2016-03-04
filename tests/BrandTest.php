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
    }
?>
