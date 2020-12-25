CREATE DATABASE IF NOT EXISTS test;
USE test;
SET @@sql_mode = "";
CREATE TABLE IF NOT EXISTS adverts (name varchar(30), secret char(64), descr varchar(250));
INSERT INTO adverts VALUES ("Picture with lenght 30 pixe", sha2("nksado8fw2", 256), "1"),("Garage", sha2("24rqwdsd24tad2342", 256), "2"), ("Old staff garage", sha2("dfwet234rsas", 256), "3"),  ("Flag", sha2("zxfsf132", 256), "flag{qv0U5aLWGRCA5eId}");