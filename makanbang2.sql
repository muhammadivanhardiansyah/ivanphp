

CREATE DATABASE fotodb;

USE fotodb;

CREATE TABLE fotos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    filepath VARCHAR(255) NOT NULL
);
