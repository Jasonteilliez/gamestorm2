<input type="hidden" id="passid" name="passid" value=<?= $_SESSION['ID'] ?> />
<input type="hidden" id="passgameid" name="passgameid" value=<?= $game->game_id ?> />

<main>
    <h1><?= $game->game_name ?></h1>
    <div id="main_game">
        <?php include($link) ?>
        <div id="info_score">
            <div id="your_score">
                <h2>Your Score</h2>
                <p id="score">Score : 0</p>
                <p>Your best :
                    <?php if (empty($bestscore)) : ?>
                        None
                    <?php else : ?>
                        <?= $bestscore->score_score ?>
                    <?php endif ?>
                </p>
            </div>
            <div id="top10">
                <h2>Top 10</h2>
                <?php foreach ($scores as $key => $score) : ?>
                    <p class="rank_score"><span><?= $score->user_name ?> : <?= $score->score_score ?></span> <span><?php if ($key < 3) : ?><i class="fas fa-medal medal<?= $key ?>"></i><?php endif ?></span></span></p>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>