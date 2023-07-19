<main id="formulaire">
    <div>
        <h1>admin</h1>

        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="form_admin">

            <div>
                <label name="admin_requete">* requete :</label>
                <input type="text" name="admin_requete" required>
            </div>

            <div class="submit">
                <button type="submit">EXECUTER</button>
            </div>
        </form>
    </div>
        <h1>Table utilisateur</h1>
        <table>
            <tr>
                <th>id</th>
                <th>user_name</th>
                <th>user_first_name</th>
                <th>user_last_name</th>
                <th>user_mail</th>
                <th>user_password</th>
                <th>user_avatar</th>
                <th>user_kind</th>
                <th>date_inscription</th>
            </tr>
            <?php if ($liste_users) : ?>
                <?php foreach ($liste_users as $liste_user) : ?>
                    <tr>
                        <td><?= $liste_user->id ?></td>
                        <td><?= $liste_user->user_name ?></td>
                        <td><?= $liste_user->user_first_name ?></td>
                        <td><?= $liste_user->user_last_name ?></td>
                        <td><?= $liste_user->user_mail ?></td>
                        <td><?= $liste_user->user_password ?></td>
                        <td><?= $liste_user->user_avatar ?></td>
                        <td><?= $liste_user->user_kind ?></td>
                        <td><?= $liste_user->date_inscription ?></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </table>
        <h1>Table game</h1>
        <table>
            <tr>
                <th>game_id</th>
                <th>game_name</th>
                <th>game_description</th>
                <th>game_miniature</th>
                <th>game_lien</th>
            </tr>
            <?php if ($liste_games) : ?>
                <?php foreach ($liste_games as $liste_game) : ?>
                    <tr>
                        <td><?= $liste_game->game_id ?></td>
                        <td><?= $liste_game->game_name ?></td>
                        <td><?= $liste_game->game_description ?></td>
                        <td><?= $liste_game->game_miniature ?></td>
                        <td><?= $liste_game->game_lien ?></td>

                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </table>
        <h1>Table score</h1>
        <table>
            <tr>
                <th>score_id</th>
                <th>score_user_id</th>
                <th>score_game_id</th>
                <th>score_score</th>
                <th>score_date</th>
            </tr>
            <?php if ($liste_scores) : ?>
                <?php foreach ($liste_scores as $liste_score) : ?>
                    <tr>
                        <td><?= $liste_score->score_id ?></td>
                        <td><?= $liste_score->score_user_id ?></td>
                        <td><?= $liste_score->score_game_id ?></td>
                        <td><?= $liste_score->score_score ?></td>
                        <td><?= $liste_score->score_date ?></td>

                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </table>
    
</main>