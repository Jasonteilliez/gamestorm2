<main id="profil">
    <h1>PROFIL</h1>

    <div id="profil_info">
        <div id="avatar">
            <form action="." method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="form_avatar">
                <input type="hidden" name="MAX_FILE_SIZE" value="200000" />
                <input id="img" type="file" name="user_avatar" required>
                <label for="img">
                    <?php if (empty($_SESSION['avatar'])) : ?>
                        <img class="header_avatar" src="./static/img/Avatar/Avatar.png" alt="Your Avatar">
                    <?php else : ?>
                        <img class="header_avatar" src="./static/img/Avatar/<?= $_SESSION['avatar'] ?>" alt="Your Avatar">
                    <?php endif ?>
                </label>
                <br>
                <button type="submit" disabled>EDITER MON AVATAR</button>
            </form>
        </div>
        <div id="information_personnelle">
            <h2>Bonjour <?= $user->user_name ?>,</h2>

            <p><span>Prénom</span> : <?= $user->user_first_name ?></p>
            <p><span>Nom</span> : <?= $user->user_last_name ?></p>
            <p><span>Adresse mail</span> :<?= $user->user_mail ?> </p>
            <div id="profil_lien">
                <a href="Profil/Edition">Editer mon profil</a><br>
                <a href="Profil/Password">Editer mon mot de passe</a>
            </div>
            <div class="del_user">
                <a href="index.php?action=form_supprimer_compte" onclick="return confirm('êtes vous sûr ?')">Supprimer mon compte</a>
            </div>
        </div>

    </div>
    <h1>SCOREBOARD</h1>
    <div id="profilScoreboard">
        <table>
            <tr>
                <th>GAME</th>
                <th>SCORE</th>
            </tr>
            <?php if ($scores) : ?>
                <?php foreach ($scores as $score) : ?>
                    <tr>
                        <td><?= $score->game_name ?> </td>
                        <td><?= $score->score_score ?></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </table>
    </div>
</main>