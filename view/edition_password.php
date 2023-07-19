
<main id="formulaire">
    <div>
        <h1>Edition du mot de passe</h1>

        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="form_password">
            <div>
                <label name="old_password">Ancien mot de passe :</label>
                <input type="password" name="old_password" required>
                <?php if (isset($errors['old_password'])) : ?>
                    <p class="alert"><?= $errors['old_password'] ?></p>
                <?php endif ?>
            </div>
            <div>
                <label name="user_password">Nouveau mot de passe :</label>
                <input type="password" name="user_password" required>
                <?php if (isset($errors['user_password'])) : ?>
                    <p class="alert"><?= $errors['user_password'] ?></p>
                <?php endif ?>
            </div>
            <div>
                <label name="conf_password">Confirmation mot de passe :</label>
                <input type="password" name="conf_password" required>
                <?php if (isset($errors['conf_password'])) : ?>
                    <p class="alert"><?= $errors['conf_password'] ?></p>
                <?php endif ?>
            </div>
            <div class="submit">
                <button type="submit">Editer</button>
            </div>
        </form>

    </div>
</main>
