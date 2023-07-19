<?php
function admin_req($statement){
    global $pdo;
    $req = $pdo->query($statement);
    $req->execute();
}
?>