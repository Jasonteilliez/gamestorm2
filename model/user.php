<?php
function add_user($user_name, $user_first_name, $user_last_name, $user_mail, $user_password, $date_inscription)
{
    global $pdo;
    $req = $pdo->prepare("INSERT INTO utilisateur (user_name, user_first_name, user_last_name, user_mail, user_password, date_inscription) VALUES (:user_name, :user_first_name, :user_last_name, :user_mail, :user_password, :date_inscription)");
    $req->execute([
        'user_name' => $user_name,
        'user_first_name' => $user_first_name,
        'user_last_name' => $user_last_name,
        'user_mail' => $user_mail,
        'user_password' => $user_password,
        'date_inscription' => $date_inscription
    ]);
}
function get_all_user()
{
    global $pdo;
    $req = $pdo->prepare("SELECT * FROM utilisateur");
    $req->execute();
    return $req->fetchAll();
}
function get_user($user_name)
{
    global $pdo;
    $req = $pdo->prepare("SELECT * FROM utilisateur WHERE user_name = ? ");
    $req->execute([$user_name]);
    $user = $req->fetch();
    return $user;
}
function get_usermail($user_mail)
{
    global $pdo;
    $req = $pdo->prepare("SELECT * FROM utilisateur WHERE user_mail = ? ");
    $req->execute([$user_mail]);
    $user = $req->fetch();
    return $user;
}
function modifier_user($id, $user_name, $user_first_name, $user_last_name, $user_mail)
{
    global $pdo;
    $req = $pdo->prepare("UPDATE utilisateur SET user_name = ?, user_first_name = ?, user_last_name = ?, user_mail = ? WHERE id = ?");
    $req->execute([$user_name, $user_first_name, $user_last_name, $user_mail, $id]);
}
function modifier_password($id, $user_password)
{
    global $pdo;
    $req = $pdo->prepare("UPDATE utilisateur SET user_password = ? WHERE id= ?");
    $req->execute([$user_password, $id]);
}
function modifier_avatar($id, $user_avatar)
{
    global $pdo;
    $req = $pdo->prepare("UPDATE utilisateur SET user_avatar = ? WHERE id= ?");
    $req->execute([$user_avatar, $id]);
}
function del_user($id)
{
    global $pdo;
    $req = $pdo->prepare("DELETE FROM utilisateur WHERE id = ?");
    $req->execute([$id]);
}
