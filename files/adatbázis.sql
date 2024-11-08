-- Ha létezik az adatbázis, töröljük
DROP DATABASE IF EXISTS fogadj_orokbe;
CREATE DATABASE fogadj_orokbe;
USE fogadj_orokbe;

-- Table: shelter
CREATE TABLE shelter (
    id INT(11) NOT NULL AUTO_INCREMENT,
    shelter_name VARCHAR(255),
    shelter_slug VARCHAR(255),
    city VARCHAR(255),
    img VARCHAR(255),
    description VARCHAR(255),
    PRIMARY KEY (id)
);

-- Table: users
CREATE TABLE users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    type ENUM('Developer', 'User', 'Shelter'),
    shelter_name VARCHAR(255),
    PRIMARY KEY (id)
);

-- Table: pet_posts
CREATE TABLE pet_posts (
    id INT(11) NOT NULL AUTO_INCREMENT,
    postname VARCHAR(255),
    slug VARCHAR(255),
    shelter_id INT(11),
    user_id INT(11),
    pet_name VARCHAR(255),
    pet_gender VARCHAR(255),
    pet_breed VARCHAR(255),
    pet_status TINYINT(1),
    pet_age INT(11),
    description VARCHAR(255),
    PRIMARY KEY (id),
    FOREIGN KEY (shelter_id) REFERENCES shelter(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table: comment
CREATE TABLE comment (
    id INT(11) NOT NULL AUTO_INCREMENT,
    comment VARCHAR(255),
    user_id INT(11),
    shelter_id INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (shelter_id) REFERENCES shelter(id) ON DELETE CASCADE
);

-- Table: form
CREATE TABLE form (
    id INT(11) NOT NULL AUTO_INCREMENT,
    fullname VARCHAR(255),
    email VARCHAR(50),
    message VARCHAR(255),
    pet_id INT(11),
    shelter_id INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (pet_id) REFERENCES pet_posts(id) ON DELETE SET NULL,
    FOREIGN KEY (shelter_id) REFERENCES shelter(id) ON DELETE CASCADE
);