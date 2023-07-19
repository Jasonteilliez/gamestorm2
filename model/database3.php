<?php
$pdo = new PDO("postgres://gamestormdb_user:TKORTfwfMUQlK5rwZWULE7UOhlLDcOOg@dpg-cis1ullgkuvgs6ur9l00-a.oregon-postgres.render.com/gamestormdb");

$pdo->setAttribute(PDO::ATTR_ERRMODE, pdo::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, pdo::FETCH_OBJ);
