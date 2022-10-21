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
-- INSERT INTO users (name, email, password) VALUES ("pepe", "jepc@test.com", "1234");
SELECT * FROM users;

-- Tabla contacts
CREATE TABLE
    contacts(
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        user_id INT NOT NULL,
        phone_number VARCHAR(255),

        FOREIGN KEY(user_id) REFERENCES users(id)
    );

-- INSERT INTO contacts (name, phone_number) VALUES ("pepe", "2312313");
SELECT * FROM contacts LIMIT 100;
SELECT * FROM users LIMIT 100;
