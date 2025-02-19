<?php
define('DEV_MODE', true);

function catch_exceptions(PDOException $e): void
{
    if (defined('DEV_MODE') && DEV_MODE === true)
    {
        echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
    }
}

function connexion_db() : ?PDO {
    $server_name = "localhost";
    $admin_name = "root";
    $password = "3e615282";
    $database_name = "ifosupDB";
    try {
        $pdo = new PDO("mysql:host=$server_name;dbname=$database_name;charset=utf8", $admin_name, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch(PDOException $e) {
        catch_exceptions($e);
    }
}

function create_db() {
    $server_name = "localhost";
    $admin_name = "cede";
    $password = "3e615282";
    $database_name = "ifosupDB";
    try {
        $pdo = new PDO("mysql:host=$server_name", $admin_name, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $request = "CREATE DATABASE $database_name DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;";
        $pdo->exec($request);
    }
    catch(PDOException $e) {
        catch_exceptions($e);
    }
}

function create_table() {
    try {
        $pdo = connexion_db();
        $request = "CREATE TABLE t_users_info (
        user_id INT AUTO_INCREMENT PRIMARY KEY,
        user_pseudo VARCHAR(255) NOT NULL,
        user_password VARCHAR(255) NOT NULL,
        user_email VARCHAR(255) UNIQUE,
        user_active_account BOOLEAN,
        user_activation_code VARCHAR(5)
        ) ENGINE=InnoDB";
        $pdo->exec($request);
    }
    catch(PDOException $e) {
        catch_exceptions($e);
    }
}

function get_users() {
    try {
        $pdo = connexion_db();
        $request = "SELECT * FROM t_users_info";
        $result = $pdo->query($request);
        $users = $result->fetchAll(PDO::FETCH_ASSOC);
        return $users; // users [user{use_id=<values>;user_pseudo=<values>; user_email=<values>}]
    }
    catch(PDOException $e) {
        catch_exceptions($e);
    }
}

function get_user(int $id) {
    try {
        $pdo = connexion_db();
        $request = "SELECT * FROM t_users_info WHEN user_id = $id";
        $result = $pdo->query($request);
        $user = $result->fetch(PDO::FETCH_ASSOC);
        return $user; // user{use_id=<values>;user_pseudo=<values>; user_email=<values>}]
    }
    catch(PDOException $e) {
        catch_exceptions($e);
    }
}

function get_user_connect(string $user, string $password) {
    try {
        $pdo = connexion_db();
        $request = "SELECT * FROM t_users_info WHEN user_pseudo = :user_f AND user_password = :password_f";
        $result = $pdo->prepare($request);
        $result->bindValue(':user_f', $user, PDO::PARAM_STR);
        $result->bindValue(':password_f', $password, PDO::PARAM_STR);
        $is_good = $result->execute();
        if (isset($is_good) && $is_good !== false) {
            $user = $result->fetch(PDO::FETCH_ASSOC);
            return $user; // !! maybe users !! user{use_id=<values>;user_pseudo=<values>;user_email=<values>}]
        }
    }
    catch(PDOException $e) {
        catch_exceptions($e);
    }
}

function set_new_user(string $user, string $password, string $email) {
    try {
        $pdo = connexion_db();
        $request = "INSERT INTO t_users_info (user_pseudo, user_password, user_email, user_active_account) VALUES ( :user_f , :password_f , :email_f , TRUE )";
        $result = $pdo->prepare($request);
        $result->bindValue(':user_f', $user, PDO::PARAM_STR);
        $result->bindValue(':password_f', $password, PDO::PARAM_STR);
        $result->bindValue(':email_f', $email, PDO::PARAM_STR);
        $is_good = $result->execute();
        return $is_good;
    }
    catch(PDOException $e) {
        catch_exceptions($e);
    }
}

function change_user_name(string $user, string $user_id) {
    try {
        $pdo = connexion_db();
        $request = "UPDATE t_users_info SET user_pseudo = :user_f WHERE user_id = :user_id_f";
        $result = $pdo->prepare($request);
        $result->bindValue(':user_id_f', $user_id, PDO::PARAM_INT);
        $result->bindValue(':user_f', $user, PDO::PARAM_STR);
        $is_good = $result->execute();
        return $is_good;
    }
    catch(PDOException $e) {
        catch_exceptions($e);
    }
}

function change_user_password(string $password, string $user_id) {
    try {
        $pdo = connexion_db();
        $request = "UPDATE t_users_info SET user_password = :password_f WHERE user_id = :user_id_f";
        $result = $pdo->prepare($request);
        $result->bindValue(':user_id_f', $user_id, PDO::PARAM_INT);
        $result->bindValue(':password_f', $password, PDO::PARAM_STR);
        $is_good = $result->execute();
        return $is_good;
    }
    catch(PDOException $e) {
        catch_exceptions($e);
    }
}

function change_user_email(string $email, string $user_id) {
    try {
        $pdo = connexion_db();
        $request = "UPDATE t_users_info SET user_email = :email_f WHERE user_id = :user_id_f";
        $result = $pdo->prepare($request);
        $result->bindValue(':user_id_f', $user_id, PDO::PARAM_INT);
        $result->bindValue(':email_f', $email, PDO::PARAM_STR);
        $is_good = $result->execute();
        return $is_good;
    }
    catch(PDOException $e) {
        catch_exceptions($e);
    }
}

function delete_user_by_id(string $user_id) {
    try {
        $pdo = connexion_db();
        $request = "DELETE FROM t_users_info WHERE user_id = :user_id_f";
        $result = $pdo->prepare($request);
        $result->bindValue(':user_id_f', $user_id, PDO::PARAM_INT);
        $is_good = $result->execute();
        return $is_good;
    }
    catch(PDOException $e) {
        catch_exceptions($e);
    }
}
?>