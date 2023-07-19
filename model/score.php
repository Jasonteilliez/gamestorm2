<?php
function add_score($score_user_id, $score_game_id, $score_score, $score_date)
{
    global $pdo;
    $req = $pdo->prepare("INSERT INTO score (score_user_id, score_game_id, score_score, score_date) Values (:score_user_id, :score_game_id, :score_score, :score_date)");
    $req->execute([
        'score_user_id' => $score_user_id,
        'score_game_id' => $score_game_id,
        'score_score' => $score_score,
        'score_date' => $score_date
    ]);
}
function get_score()
{
    global $pdo;
    $req = $pdo->prepare("SELECT * FROM score");
    $req->execute();
    return $req->fetchAll();
}

function get_best_score($score_user_id, $score_game_id)
{
    global $pdo;
    $req = $pdo->prepare("SELECT * FROM score WHERE score_user_id = ? AND score_game_id = ?");
    $req->execute([$score_user_id, $score_game_id]);
    return $req->fetch();
}

function del_score($score_user_id, $score_game_id)
{
    global $pdo;
    $req = $pdo->prepare("DELETE FROM score WHERE score_user_id = ? AND score_game_id = ?");
    $req->execute([$score_user_id, $score_game_id]);
}

function set_score($score_user_id, $score_game_id, $score_score, $score_date)
{
    global $pdo;
    $req = $pdo->prepare("INSERT INTO score (score_user_id, score_game_id, score_score, score_date) Values (:score_user_id, :score_game_id, :score_score, :score_date)");
    $req->execute([
        'score_user_id' => $score_user_id,
        'score_game_id' => $score_game_id,
        'score_score' => $score_score,
        'score_date' => $score_date
    ]);
}

function get_top10($score_game_id)
{
    global $pdo;
    $req = $pdo->prepare("SELECT score.score_score, utilisateur.user_name FROM score INNER JOIN utilisateur ON score.score_user_id = utilisateur.id WHERE score_game_id = ? ORDER BY score_score DESC LIMIT 10");
    $req->execute([$score_game_id]);
    return $req->fetchAll();
}

function get_top3($score_game_id)
{
    global $pdo;
    $req = $pdo->prepare("SELECT score.score_score, utilisateur.user_name FROM score INNER JOIN utilisateur ON score.score_user_id = utilisateur.id WHERE score_game_id = ? ORDER BY score_score DESC LIMIT 3");
    $req->execute([$score_game_id]);
    return $req->fetchAll();
}

function get_all_score($score_user_id)
{
    global $pdo;
    $req = $pdo->prepare("SELECT * FROM score INNER JOIN game ON score.score_game_id = game.game_id WHERE score_user_id = ?");
    $req->execute([$score_user_id]);
    return $req->fetchAll();
}
