<main id="game_liste">
    <?php foreach ($games as $game) : ?>

        <div class="game_all">

            <div class="link_mini">
                <a href="<?= "Jeu/" . $game->game_lien ?>"><img class="game_miniature" src="static/img/Miniature/<?= $game->game_miniature ?>" alt="miniature <?= $game->game_name ?>"></a>
            </div>
            <div class="game_info">
                <div class="game_desc">
                    <h3><?= $game->game_name ?></h3>
                    <?php if (strlen($game->game_description) > 350) : ?>
                        <p><?= substr($game->game_description, 0, 350) . "..." ?></p>
                    <?php else : ?>
                        <p><?= $game->game_description ?></p>
                    <?php endif ?>
                </div>
                <div class="top3">
                    <h3 class="top_score">TOP SCORE</h3>
                    <?php foreach ($game->scores as $key => $score) : ?>
                        <p class="rank_score"><span class="top3_rank">Rank <?= $key + 1 ?></span> <span><?= $score->user_name ?> : <?= $score->score_score ?> <i class="fas fa-medal medal<?= $key ?>"></i></span></p>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</main>