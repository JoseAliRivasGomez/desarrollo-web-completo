# AMP App Docker

## Levantar contenedores
docker-compose up

## Get the name of your MySQL container
docker ps --format '{{.Names}}'

## Connection to the MySQL container
docker exec -ti test-php-mysql-docker-mysql-1 bash

## Connect to MySQL server
mysql -uroot -pmyrootpassword

## We go to the database created when the container is launched
use mysqldb;

## Creation of a "Persons" Table, with a few columns
CREATE TABLE Persons (PersonID int, LastName varchar(255), FirstName varchar(255), Address varchar(255), City varchar(255));

## Insert some data into this table
INSERT INTO Persons VALUES (1, 'John', 'Doe', '51 Birchpond St.', 'New York');
INSERT INTO Persons VALUES (2, 'Jack', 'Smith', '24 Stuck St.', 'Los Angeles');
INSERT INTO Persons VALUES (3, 'Michele', 'Sparrow', '23 Lawyer St.', 'San Diego');

## See the results
http://localhost:8088