<?php

include 'model/database3.php';
include 'model/create_table.php';
include 'model/user.php';
include 'model/game.php';
include 'model/score.php';
include 'model/admin.php';
include 'function/validation.php';

/*************************************************************************************************** */

// drop_table();
create_table();

// $user_name = "aaa";
// $user_first_name = "bbb";
// $user_last_name = "ccc";
// $user_mail = "ddd";
// $user_password = "eee";
// $date_inscription = new DateTime();
// $date_inscription = $date_inscription->format('Y-m-d H:i:s');

// $game_name = "jeujue";
// $game_description = "jeud description";
// $game_miniature = "jeu mini";
// $game_lien = "jeu lien";

// $score_user_id = 1;
// $score_game_id = 1;
// $score_score = 10;
// $score_date = new DateTime();
// $score_date = $score_date->format('Y-m-d H:i:s');

// add_user($user_name, $user_first_name, $user_last_name, $user_mail, $user_password, $date_inscription);
// add_game($game_name, $game_description, $game_miniature, $game_lien);
// add_score($score_user_id, $score_game_id, $score_score, $score_date);
// $user = get_user($user_name);
// $game = get_game();
// $score = get_score();

/************************************************************************************************************************/

if (session_status() !== 2) {
    session_start();
}
$errors = [];
if (!empty($_SESSION['error'])) {
    $errors = $_SESSION['error'];
    $_SESSION['error'] = [];
}
$success = [];
if (!empty($_SESSION['success'])) {
    $success = $_SESSION['success'];
    $_SESSION['success'] = [];
}

$user_name = filter_input(INPUT_POST, 'user_name', FILTER_UNSAFE_RAW);
$user_name = htmlspecialchars($user_name, ENT_QUOTES);

$user_first_name = filter_input(INPUT_POST, 'user_first_name', FILTER_UNSAFE_RAW);
$user_first_name = htmlspecialchars($user_first_name, ENT_QUOTES);

$user_last_name = filter_input(INPUT_POST, 'user_last_name', FILTER_UNSAFE_RAW);
$user_last_name = htmlspecialchars($user_last_name, ENT_QUOTES);

$user_mail = filter_input(INPUT_POST, 'user_mail', FILTER_SANITIZE_EMAIL);


$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
$action = htmlspecialchars($action, ENT_QUOTES);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    $action = htmlspecialchars($action, ENT_QUOTES);
    if (!$action) {
        $action = "page_accueil";
    }
}

$jeu = filter_input(INPUT_GET, 'jeu', FILTER_UNSAFE_RAW);
$jeu = htmlspecialchars($jeu, ENT_QUOTES);


require 'view/elements/header.php';
switch ($action) {
    case "page_accueil":
        $games = get_game();
        foreach ($games as $key => $game) {
            $scores = get_top3($game->game_id);
            $games[$key]->scores = $scores;
        }
        include('view/accueil.php');
        break;

    case "page_jeu":
        include('view/jeux.php');
        break;

    case "page_inscription":
        include('view/inscription.php');
        break;

    case "page_connexion":
        include('view/connexion.php');
        break;

    case "page_profil":
        if (!isset($_SESSION['user_name'])) {
            $errors['flash_error'] = "Veuillez vous connecter.";
            $_SESSION['error'] = $errors;
            header('location: Connexion');
            exit;
        }
        $scores = get_all_score($_SESSION['ID']);
        $user = get_user($_SESSION['user_name']);
        include('view/profil.php');
        break;

    case "page_edition_profil":
        if (!isset($_SESSION['user_name'])) {
            $errors['flash_error'] = "Veuillez vous connecter.";
            $_SESSION['error'] = $errors;
            header('location: Connexion');
            exit;
        }

        $user = get_user($_SESSION['user_name']);
        include('view/edition_profil.php');
        break;

    case "page_edition_password":
        if (!isset($_SESSION['user_name'])) {
            $errors['flash_error'] = "Veuillez vous connecter.";
            $_SESSION['error'] = $errors;
            header('location: Connexion');
            exit;
        }
        include('view/edition_password.php');
        break;
    case "page_jeux":
        if (!isset($_SESSION['user_name'])) {
            $errors['flash_error'] = "Veuillez vous connecter.";
            $_SESSION['error'] = $errors;
            header('location: https://gamestormproject.herokuapp.com/Accueil');
            exit;
        }
        $game = get_gameid_link($jeu);
        $scores = get_top10($game->game_id);
        $bestscore = get_best_score($_SESSION['ID'], $game->game_id);
        $link = 'jeu/' . $jeu . "/index.php";
        include('view/jeux.php');
        break;
    case "deconnexion":
        $_SESSION = [];
        header('location: Accueil');
        exit;
        break;

    case "form_inscription":
        //Vérification Connexion
        $errors = valid_inscription($user_name, $user_first_name, $user_last_name, $user_mail, $_POST['user_password'], $_POST['conf_password']);

        if (!isset($_POST['rgpd'])) {
            $errors['rgpd'] = "Cette case doit être cochée";
        }

        if (!empty($errors)) {
            $_SESSION['error'] = $errors;
            header('location: Inscription');
            exit;
        }
        $user = get_user($user_name);
        if ($user) {
            $errors['user_name'] = "Le nom d'utilisateur existe déjà";
        }
        $user = get_usermail($user_mail);
        if ($user) {
            $errors['user_mail'] = "L'adresse mail est déjà utilisée";
        }
        if ($errors) {
            $_SESSION['error'] = $errors;
            header('location: Inscription');
            exit;
        }

        $user_password = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
        $date_inscription = new DateTime();
        $date_inscription = $date_inscription->format('Y-m-d H:i:s');
        add_user($user_name, $user_first_name, $user_last_name, $user_mail, $user_password, $date_inscription);
        $_SESSION['success'] = ["flash_success" => "Félicitation ! Vous vous êtes inscrit avec succès."];
        header('location: Connexion');
        exit;
        break;

    case "form_connexion":

        $user = get_user($user_name);
        if (!($user) or !(password_verify($_POST['user_password'], $user->user_password))) {
            $errors['flash_error'] = "Identifiant ou mot de passe incorrect.";
            $_SESSION['error'] = $errors;
            header('location: Connexion');
            exit;
        } else {
            if (session_status() !== 2) {
                session_start();
            }
            $_SESSION['user_name'] = $user_name;
            $_SESSION['ID'] = $user->id;
            $_SESSION['avatar'] = $user->user_avatar;
            $_SESSION['user_kind'] = $user->user_kind;
            $_SESSION['success'] = ["flash_success" => "Félicitation ! Vous vous êtes connecté avec succès."];
            header('location: Accueil');
            exit;
        };
        break;

    case "form_edition":
        $errors = valid_edition($user_name, $user_first_name, $user_last_name, $user_mail);
        if (!empty($errors)) {
            $_SESSION['error'] = $errors;
            header('location: Profil/Edition');
            exit;
        }
        $user = get_user($_SESSION['user_name']);
        $user2 = get_user($user_name);

        if ($user2 && $user2->user_name != $user->user_name) {
            $errors['user_name'] = "Le nom d'utilisateur existe déjà";
        }
        $user2 = get_usermail($user_mail);
        if ($user2 && $user2->user_mail != $user->user_mail) {
            $errors['user_mail'] = "L'adresse mail est déjà utilisée";
        }
        if ($errors) {
            $_SESSION['error'] = $errors;
            header('location: Profil/Edition');
            exit;
        }

        modifier_user($user->id, $user_name, $user_first_name, $user_last_name, $user_mail);
        $_SESSION['user_name'] = $user_name;
        $_SESSION['success'] = ["flash_success" => "Profil modifié avec succès."];
        header('location: Profil');
        exit;
        break;

    case "form_password":
        $user = get_user($_SESSION['user_name']);
        if (!password_verify($_POST['old_password'], $user->user_password)) {
            $errors['old_password'] = "Ancien mot de passe incorrect";
            $_SESSION['error'] = $errors;
            header('location: Profil/Password');
            exit;
        }
        $errors = valid_edition_password($_POST['user_password'], $_POST['conf_password']);
        if (!empty($errors)) {
            $_SESSION['error'] = $errors;
            header('location: Profil/Password');
            exit;
        }

        $user_password = password_hash($_POST['user_password'], PASSWORD_BCRYPT);
        modifier_password($user->id, $user_password);
        $_SESSION['success'] = ["flash_success" => "Mot de passe modifié avec succès."];
        header('location: Profil');
        exit;
        break;
    case "form_avatar":
        $user = get_user($_SESSION['user_name']);

        $uploadurl = './static/img/Avatar/';
        $uploadname = basename($_FILES['user_avatar']['name']);
        $uploadfile = $uploadurl . $uploadname;
        if (move_uploaded_file($_FILES['user_avatar']['tmp_name'], $uploadfile)) {
            if ($user->user_avatar) {
                unlink('./static/img/Avatar/' . $user->user_avatar);
            }
            modifier_avatar($user->id, $uploadname, $user->user_avatar);
            $_SESSION['avatar'] = $uploadname;
        }
        header('location: Profil');
        exit;
        break;
    case "form_supprimer_compte":
        del_user($_SESSION['ID']);
        $_SESSION = [];
        header('location: Accueil');
        exit;
        break;
    case "page_admin":
        if (!isset($_SESSION['user_kind']) or $_SESSION['user_kind'] != 1) {
            $errors['flash_error'] = "Acces refusé.";
            $_SESSION['error'] = $errors;
            header('location: Accueil');
            exit;
        }
        $liste_users = get_all_user();
        $liste_games = get_game();
        $liste_scores = get_score();
        include('view/admin.php');
        exit;
        break;
    case "form_admin":
        if (!isset($_SESSION['user_kind']) or $_SESSION['user_kind'] != 1) {
            $errors['flash_error'] = "Acces refusé.";
            $_SESSION['error'] = $errors;
            header('location: Accueil');
            exit;
        }
        admin_req($_POST['admin_requete']);
        header('location: index.php?action=page_admin');
        exit;
        break;
    default:
        include('view/404.php');
        break;
}

require 'view/elements/footer.php';
