<?php
include '../model/database.php';
include '../model/score.php';

$id_user = $_POST['id_user'];
$game_id = $_POST['game_id'];
$game_score = $_POST['game_score'];
$date = new DateTime();
$date = $date->format('Y-m-d H:i:s');

$user_score = get_best_score($id_user, $game_id);

if(!$user_score || $user_score->score_score < $game_score ){
    if($user_score){
        del_score($id_user, $game_id);
    }
    set_score($id_user, $game_id, $game_score, $date);
}  


$bestscore = get_best_score($id_user,$game_id); 
$scores = get_top10($game_id);
?>


<div id="your_score">
    <h2>Your Score</h2>
    <p id="score">Score : 0</p>
    <p>Your best : 
        <?php if(empty($bestscore)) : ?>
            None
        <?php else : ?>
            <?= $bestscore->score_score ?>
        <?php endif ?>
    </p>
</div>
<div id="top10">
    <h2>Top 10</h2>
    <?php foreach($scores as $key => $score) : ?>
        <p class="rank_score"><span><?= $score->user_name ?> : <?= $score->score_score ?></span> <span><?php if($key<3) :?><i class="fas fa-medal medal<?= $key ?>"></i><?php endif ?></span></span></p>
    <?php endforeach ?>
</div>





