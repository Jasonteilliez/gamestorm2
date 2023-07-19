<?php

function valid_inscription($user_name, $user_first_name, $user_last_name, $user_mail, $user_password, $conf_password)
{
    $errors = [];

    $error = valid_username($user_name);
    if (!empty($error)) {
        $errors['user_name'] = $error;
    }

    $error = valid_userfirstname($user_first_name);
    if (!empty($error)) {
        $errors['user_first_name'] = $error;
    }

    $error = valid_userlastname($user_last_name);
    if (!empty($error)) {
        $errors['user_last_name'] = $error;
    }

    $error = valid_usermail($user_mail);
    if (!empty($error)) {
        $errors['user_mail'] = $error;
    }

    $error = valid_userpassword($user_password);
    if (!empty($error)) {
        $errors['user_password'] = $error;
    }

    $error = valid_confpassword($user_password, $conf_password);
    if (!empty($error)) {
        $errors['conf_password'] = $error;
    }
    return $errors;
}

function valid_edition($user_name, $user_first_name, $user_last_name, $user_mail )
{
    $errors = [];

    $error = valid_username($user_name);
    if (!empty($error)) {
        $errors['user_name'] = $error;
    }

    $error = valid_userfirstname($user_first_name);
    if (!empty($error)) {
        $errors['user_first_name'] = $error;
    }

    $error = valid_userlastname($user_last_name);
    if (!empty($error)) {
        $errors['user_last_name'] = $error;
    }

    $error = valid_usermail($user_mail);
    if (!empty($error)) {
        $errors['user_mail'] = $error;
    }

    return $errors;
}

function valid_edition_password($user_password, $conf_password)
{
    $errors = [];
    
    $error = valid_userpassword($user_password);
    if (!empty($error)) {
        $errors['user_password'] = $error;
    }

    $error = valid_confpassword($user_password, $conf_password);
    if (!empty($error)) {
        $errors['conf_password'] = $error;
    }
    return $errors;
}


function valid_username($user_name)
{
    if (empty($user_name)) {
        return 'Ce champ doit être remplis';
    }
    if (strlen($user_name) < 3) {
        return 'Votre indentifiant est trop court (3 caractères minimum)';
    }
    if (strlen($user_name) > 20) {
        return 'Votre indentifiant est trop long (20 caractères maximum)';
    }
    return NULL;
}

function valid_userfirstname($user_first_name)
{
    if (strlen($user_first_name) > 50) {
        return 'Votre prénom est trop long (50 caractères maximum)';
    }
    return NULL;
}

function valid_userlastname($user_last_name)
{
    if (strlen($user_last_name) > 50) {
        return 'Votre nom est trop long (50 caractères maximum)';
    }
    return NULL;
}

function valid_usermail($user_mail)
{
    if (!filter_var($user_mail, FILTER_VALIDATE_EMAIL)) {
        return 'Adresse mail invalide';
    }
    return NULL;
}

function valid_userpassword($user_password)
{
    if (strlen($user_password) < 8) {
        return 'Mot de passe trop court (8 caractères minimum)';
    }
    return NULL;
}

function valid_confpassword($user_password, $conf_password)
{
    if ($user_password != $conf_password) {
        return 'Les mots de passe ne correspondent pas';
    }
    return NULL;
}

