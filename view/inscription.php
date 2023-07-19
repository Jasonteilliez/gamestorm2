<main id="formulaire">
    <div>
        <h1>INSCRIPTION</h1>

        <form action="index.php" method="POST">
            <input type="hidden" name="action" value="form_inscription">

            <div>
                <label name="user_name">* Identifiant :</label>
                <input type="text" name="user_name" required>
                <?php if (isset($errors['user_name'])) : ?>
                    <p class="alert"><?= $errors['user_name'] ?></p>
                <?php endif ?>
            </div>
            <div id="flex_champ">
                <div>
                    <label name="user_first_name">Prénom :</label>
                    <input type="text" name="user_first_name">
                    <?php if (isset($errors['user_first_name'])) : ?>
                        <p class="alert"><?= $errors['user_first_name'] ?></p>
                    <?php endif ?>
                </div>
                <div>
                    <label name="user_last_name">Nom :</label>
                    <input type="text" name="user_last_name">
                    <?php if (isset($errors['user_last_name'])) : ?>
                        <p class="alert"><?= $errors['user_last_name'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div>
                <label name="user_mail">* Adresse mail :</label>
                <input type="text" name="user_mail" required>
                <?php if (isset($errors['user_mail'])) : ?>
                    <p class="alert"><?= $errors['user_mail'] ?></p>
                <?php endif ?>
            </div>
            <div>
                <label name="user_password">* Mot de passe :</label>
                <input type="password" name="user_password" required>
                <?php if (isset($errors['user_password'])) : ?>
                    <p class="alert"><?= $errors['user_password'] ?></p>
                <?php endif ?>
            </div>
            <div>
                <label name="conf_password">* Confirmation mot de passe :</label>
                <input type="password" name="conf_password" required>
                <?php if (isset($errors['conf_password'])) : ?>
                    <p class="alert"><?= $errors['conf_password'] ?></p>
                <?php endif ?>
            </div>
            <div id='checkboxrgpd'>
                <input type="checkbox" name="rgpd" required>
                <label name="rgpd">
                    * En cochant cette case, j'ai lu et j'accepte les conditions générales d'utilisation et la charte de confidentialité.
                </label>
                <?php if (isset($errors['rgpd'])) : ?>
                    <p class="alert"><?= $errors['rgpd'] ?></p>
                <?php endif ?>
            </div>
            <p id="information"> (*) champ obligatoire.</p>
            <div class="submit">
                <button type="submit">INSCRIPTION</button>
            </div>
            <hr>
            <div>
                <p>Déjà inscrit? <a href='Connexion'>Connectez-vous !</a>
            </div>
        </form>
    </div>
</main>