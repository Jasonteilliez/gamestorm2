<?php
function add_game($game_name, $game_description, $game_miniature, $game_lien)
{
    global $pdo;
    $req = $pdo->prepare("INSERT INTO game (game_name, game_description, game_miniature, game_lien) VALUES (:game_name, :game_description, :game_miniature, :game_lien)");
    $req->execute([
        'game_name' => $game_name,
        'game_description' => $game_description,
        'game_miniature' => $game_miniature,
        'game_lien' => $game_lien,
    ]);
}
function get_game()
{
    global $pdo;
    $req = $pdo->prepare("SELECT * FROM game");
    $req->execute();
    return $req->fetchAll();
}
function get_gameid_link($game_lien)
{
    global $pdo;
    $req = $pdo->prepare("SELECT * FROM game WHERE game_lien = ?");
    $req->execute([$game_lien]);
    return $req->fetch();
}
