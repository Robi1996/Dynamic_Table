<?php
try {
    define('DB_SERVER', 'localhost:3306');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'bimal_homeo');

    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if ($db->connect_error) {
        die("Connection failed:" . $db->connect_error);
    }
} catch (Exception $e) {
    echo 'Messgae:' . $e->getMessage();
}
?>