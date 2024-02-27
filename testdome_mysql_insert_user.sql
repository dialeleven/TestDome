/*
TestDome - MySQL
https://www.testdome.com/tests/mysql-online-test/108

Example case
https://www.testdome.com/resources/media/0c956833-1783-4e0f-a853-a5a74c63fecb/example_case.txt

A company needs a stored procedure that will insert a new user with an appropriate type.

Consider the following tables:
TABLE userTypes

     id INTEGER NOT NULL PRIMARY KEY,
     type VARCHAR (50) NOT NULL    

TABLE users

     id INTEGER NOT NULL PRIMARY KEY AUTO INCREMENT,
     email VARCHAR (50) NOT NULL,
     userTypeId INTEGER NOT NULL,
     FOREIGN KEY (userTypeId) REFERENCES userTypes (id) 

Finish the insertUser procedure so that it inserts a user, with these requirements:
• id is auto incremented.
• email is equal to the email parameter.
• userTypeld is the id of the userTypes row whose type attribute is equal to the type parameter.


-- Suggested testing environment: 
-- https://www.db-fiddle.com/ with MySQL version set to 8

-- Example case create statement:
CREATE TABLE userTypes (
    id INTEGER NOT NULL PRIMARY KEY,
    type VARCHAR(50) NOT NULL
);

CREATE TABLE users (
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    userTypeId INTEGER NOT NULL,
    FOREIGN KEY (userTypeId) REFERENCES userTypes(id)
);
  
INSERT INTO userTypes (id, type) VALUES (0, 'free');
INSERT INTO userTypes (id, type) VALUES (1, 'paid');



-- Example case:
CALL insertUser('free', 'john.doe@company.com');
CALL insertUser('paid', 'jane.doe@company.com');
SELECT * FROM users;

-- Expected output (in any order):
-- id    email                   userTypeId
-- ------------------------------------------
-- 1     john.doe@company.com    0
-- 2     jane.doe@company.com    1
*/



DELIMITER //
CREATE PROCEDURE insertUser(
    IN type VARCHAR(50),
    IN email VARCHAR(50)
)
-- Write your code here    
sp: BEGIN
    -- This only passes test case 1 of three on TestDome
    DECLARE userTypeId INT;

    IF type = 'free' THEN
    	SET userTypeId = 0;
    ELSEIF type = 'paid' THEN
    	SET userTypeId = 1;
    ELSE
    	LEAVE sp;
    END IF;
    
    INSERT INTO users (email, userTypeId) VALUES (email, userTypeId);
    /*
    Originally the thought of using this code would be the solution, but it's not.
    It only passes the 2nd of 3 test cases.

    INSERT INTO users (email, userTypeId) 
		VALUES (type, (SELECT id FROM userTypes WHERE type = type LIMIT 1));
   
    Any ideas on how to pass all three test cases?
    */
END//
DELIMITER ;