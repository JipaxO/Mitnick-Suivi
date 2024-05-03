CREATE DATABASE Exos;

USE Exos;

CREATE TABLE persona ( 
    id INT NOT NULL,
    name varchar(50) NOT NULL,
    age INT,
    artist INT,
    life VARCHAR(255),
    PRIMARY KEY (id)
)

SELECT * from persona