DROP DATABASE IF EXISTS contacts_app;

CREATE DATABASE contacts_app;

USE contacts_app;

-- tabla users
CREATE TABLE
    users(
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        email VARCHAR(255) UNIQUE,
        password VARCHAR(255)
    );
INSERT INTO users (name, email, password) VALUES ("pepe", "jepc@test.com", "1234");
SELECT * FROM users;

-- Tabla contacts
CREATE TABLE
    contacts(
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        phone_number VARCHAR(255)
    );

INSERT INTO contacts (name, phone_number) VALUES ("pepe", "2312313");
