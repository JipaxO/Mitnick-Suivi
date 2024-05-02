CREATE DATABASE Exos;

USE Exos;

CREATE TABLE persona ( 
    personID INT NOT NULL,
    name varchar(50) NOT NULL,
    age INT,
    artist INT,
    life VARCHAR(255),
    PRIMARY KEY (PersonID)
)

SELECT * from persona