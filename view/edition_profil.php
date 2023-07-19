
<main id="formulaire">
    <div>
        <h1>Edition du Profil</h1>

        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="form_edition">

            <div>
                <label name="user_name">Identifiant :</label>
                <input type="text" name="user_name" value="<?= $user->user_name ?>" required>
                <?php if (isset($errors['user_name'])) : ?>
                    <p class="alert"><?= $errors['user_name'] ?></p>
                <?php endif ?>
            </div>
            <div id="flex_champ">
                <div>
                    <label name="user_first_name">Prénom :</label>
                    <input type="text" name="user_first_name" value="<?= $user->user_first_name ?>">
                    <?php if (isset($errors['user_first_name'])) : ?>
                        <p class="alert"><?= $errors['user_first_name'] ?></p>
                    <?php endif ?>
                </div>
                <div>
                    <label name="user_last_name">Nom :</label>
                    <input type="text" name="user_last_name" value="<?= $user->user_last_name ?>">
                    <?php if (isset($errors['user_last_name'])) : ?>
                        <p class="alert"><?= $errors['user_last_name'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div>
                <label name="user_mail">Adresse mail :</label>
                <input type="text" name="user_mail" value="<?= $user->user_mail ?>" required>
                <?php if (isset($errors['user_mail'])) : ?>
                    <p class="alert"><?= $errors['user_mail'] ?></p>
                <?php endif ?>
            </div>
            <div class="submit">
                <button type="submit">Editer</button>
            </div>
        </form>

    </div>
</main>

