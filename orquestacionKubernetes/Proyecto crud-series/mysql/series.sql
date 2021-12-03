CREATE DATABASE IF NOT EXISTS crud_db;
USE crud_db;
CREATE TABLE IF NOT EXISTS series(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(255) NOT NULL,
	genero VARCHAR(255) NOT NULL,
	estreno INT(4) NOT NULL,
    pais VARCHAR(255) NOT NULL,
	PRIMARY KEY(id)
);