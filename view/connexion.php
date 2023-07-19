<main id="formulaire">
    <div>
        <h1>CONNEXION</h1>

        <form action="." method="POST">
            <input type="hidden" name="action" value="form_connexion">

            <div>
                <label name="user_name">Identifiant :</label>
                <input type="text" name="user_name" required>
            </div>
            <div>
                <label name="user_password">Mot de passe :</label>
                <input type="password" name="user_password" required>
            </div>
            <div class="submit">
                <button type="submit">CONNEXION</button>
            </div>
        </form>
        <hr>
        <div>
            <p>Pas encore inscrit ? <a href='Inscription'>Inscrivez-vous !</a>
        </div>
    </div>
</main>