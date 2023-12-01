
-- Création de de la base de données

CREATE DATABASE quizzes;
USE quizzes;

-- Création des tables

CREATE TABLE users (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(80) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    role ENUM('student', 'admin') NOT NULL
) ENGINE = InnoDB;

CREATE TABLE courses (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(120) NOT NULL,
    description VARCHAR(80),
    content TEXT,
    link VARCHAR(120)
) ENGINE = InnoDB;

CREATE TABLE user_courses (
    user_id SMALLINT UNSIGNED NOT NULL,
    course_id SMALLINT UNSIGNED NOT NULL,
    progress INTEGER NOT NULL,
    PRIMARY KEY (user_id, course_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
) ENGINE = InnoDB;

CREATE TABLE quizzes (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(120) NOT NULL,
    course_id SMALLINT UNSIGNED NOT NULL,
    score INTEGER NULL,
    dateHour DATETIME,
    FOREIGN KEY (course_id) REFERENCES courses(id)
) ENGINE = InnoDB;

CREATE TABLE questions (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    question_text VARCHAR(120) NOT NULL,
    quiz_id SMALLINT UNSIGNED NOT NULL,
    FOREIGN KEY (quiz_id) REFERENCES quizzes(id)
) ENGINE = InnoDB;

CREATE TABLE answers (
    id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    answer_text TEXT NOT NULL,
    is_correct BOOLEAN NOT NULL,
    question_id SMALLINT UNSIGNED NOT NULL,
    FOREIGN KEY (question_id) REFERENCES questions(id)
) ENGINE = InnoDB;


-- Remplir les tables avec des données


