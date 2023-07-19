<?php
function create_user_table()
{
    global $pdo;
    $statement = "CREATE TABLE IF NOT EXISTS utilisateur (
        id SERIAL PRIMARY KEY,
        user_name VARCHAR(20) NOT NULL,
        user_first_name VARCHAR(50) NULL ,
        user_last_name VARCHAR(50) NULL ,
        user_mail VARCHAR(100) NOT NULL ,
        user_password VARCHAR(60) NOT NULL ,
        user_avatar VARCHAR(120) NULL ,
        user_kind INT NOT NULL DEFAULT '2' ,
        date_inscription VARCHAR(20) NOT NULL
        );";
    $pdo->exec($statement);
}

function create_game_table()
{
    global $pdo;
    $statement = "CREATE TABLE IF NOT EXISTS game (
        game_id SERIAL PRIMARY KEY ,
        game_name VARCHAR(20) NOT NULL ,
        game_description TEXT NOT NULL ,
        game_miniature VARCHAR(100) NOT NULL ,
        game_lien VARCHAR(100) NOT NULL 
        );";
    $pdo->exec($statement);
}

function create_score_table()
{
    global $pdo;
    $statement = "CREATE TABLE IF NOT EXISTS score (
        score_id SERIAL PRIMARY KEY ,
        score_user_id INT NOT NULL ,
        score_game_id INT NOT NULL ,
        score_score INT NOT NULL ,
        score_date VARCHAR(20) NOT NULL ,
        CONSTRAINT userID FOREIGN KEY (score_user_id) REFERENCES utilisateur(id) ON DELETE CASCADE ON UPDATE CASCADE ,
        CONSTRAINT gameID FOREIGN KEY (score_game_id) REFERENCES game(game_id) ON DELETE CASCADE ON UPDATE CASCADE
        );";
    $pdo->exec($statement);
}

function drop_user_table()
{
    global $pdo;
    $statement = "DROP TABLE IF EXISTS utilisateur; ";
    $pdo->exec($statement);
}
function drop_game_table()
{
    global $pdo;
    $statement = "DROP TABLE IF EXISTS game; ";
    $pdo->exec($statement);
}
function drop_score_table()
{
    global $pdo;
    $statement = "DROP TABLE IF EXISTS score; ";
    $pdo->exec($statement);
}

function create_table()
{
    create_user_table();
    create_game_table();
    create_score_table();
}

function drop_table()
{
    drop_score_table();
    drop_user_table();
    drop_game_table();
}
