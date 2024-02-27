/*
TestDome - MySQL
Item Archive
https://www.testdome.com/tests/mysql-online-test/108


MySQL Triggers Reference: https://www.mysqltutorial.org/mysql-triggers/


Fill in the blanks so that the trigger item_delete inserts name from item table to the item_archive table, after a row from the table item is deleted.

CREATE TABLE item (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  quantity INT NOT NULL
);

CREATE TABLE item_archive (
  archive_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL
);

DELIMITER $$
CREATE <blank> item_delete <blank> ON item 
FOR EACH ROW
BEGIN
  INSERT INTO item_archive(name) VALUES ( <blank>);
END;
$$
DELIMITER ;
*/

DELIMITER $$
CREATE TRIGGER item_delete AFTER DELETE ON item 
FOR EACH ROW
BEGIN
  INSERT INTO item_archive(name) VALUES (OLD.name);
END;
$$
DELIMITER ;