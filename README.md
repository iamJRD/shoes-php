# _Shoe Brands and Stores that carry them --- PHP Database_

#### _Web app to add stores and shoe brands to each other, March 2016_

#### By: _**Jared Beckler**_

## Description

_This web app will give the user the ability to add shoe brands and shoe stores. The user will also be able to assign brands-to-store, and vice-a-versa, as well as display the relationships and update/delete certain properties._

## Setup/Installation Requirements

* _Clone the Repository_
* _In your terminal, navigate to the project's main folder and run `composer install` to get Silex, Twig, and PHPUnit installed._
* _Navigate to the project's web folder using terminal and enter `php -S localhost:8000`_
* _Open PHPMyAdmin by going to localhost:8080/phpmyadmin in your web browser_
* _In phpmyadmin choose the Import tab and choose your database file and click "Go"._
* _In your web browser enter localhost:8000 to view the web app._

**If you are not able to import the databases:**
* _Open MAMP and Start Servers_
* _In your terminal enter `/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot`_
* _Next, enter the following commands into your mySQL shell:_
1. `CREATE DATABASE shoes;`
2. `USE shoes;`
3. `CREATE TABLE brands (id serial PRIMARY KEY, name VARCHAR(255));`
4. `CREATE TABLE stores (id serial PRIMARY KEY, name VARCHAR(255));`
5. `CREATE TABLE brands_stores (id serial PRIMARY KEY, brand_id INT, store_id INT);`
6. `CREATE DATABASE shoes_test;`
7. `USE shoes_test;`
8. `CREATE TABLE brands (id serial PRIMARY KEY, name VARCHAR(255));`
9. `CREATE TABLE stores (id serial PRIMARY KEY, name VARCHAR(255));`
10. `CREATE TABLE brands_stores (id serial PRIMARY KEY, brand_id INT, store_id INT);`

## Known Bugs

* _There are currently no known bugs._

## Support and contact details

_Please contact me through GitHub with any questions, comments, or concerns._

## Technologies Used

* _Composer_
* _Twig_
* _Silex_
* _PHPUnit_
* _PHP_
* _mySQL_
* _Apache Server_
* _Materialize_

### License

**This software is licensed under the MIT license.**

Copyright (c) 2016 **_Jared Beckler_**
