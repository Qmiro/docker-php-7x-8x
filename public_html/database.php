<?php
try {
    $db = new \PDO("pgsql:host=172.24.160.1;port=5432;dbname=development;user=postgres;password=postgres");
    echo 'Connection PostgreSQL Success!<br/>';
} catch (\Exception $e) {
    var_dump($e);
}

try {
    $db = new \PDO('mysql:host=172.24.160.1;dbname=development;charset=utf8mb4', 'mysql', 'mysql', array(
        \PDO::ATTR_EMULATE_PREPARES => false,
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    ));
    echo 'Connection MySQL Success!<br/>';
} catch (\Exception $e) {
    var_dump($e);
}
