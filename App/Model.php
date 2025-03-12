<?php
define('DEV_MODE', true);

if (connexion_db() == null) {
    create_db();
    create_table();
}

function catch_exceptions(PDOException $e): void
{
    if (defined('DEV_MODE') && DEV_MODE === true)
    {
        echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
    }
}

function connexion_db(): ?PDO {
    $server_name = "localhost";
    $admin_name = "root";
    $password = "3e615282";
    $database_name = "bdd_projet_web";
    try {
        $pdo = new PDO("mysql:host=$server_name;dbname=$database_name;charset=utf8", $admin_name, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch(PDOException $e) {
        catch_exceptions($e);
        return null;
    }
}

function create_db() {
    $server_name = "localhost";
    $admin_name = "cede";
    $password = "3e615282";
    $database_name = "bdd_projet_web";
    try {
        $pdo = new PDO("mysql:host=$server_name", $admin_name, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $request = "CREATE DATABASE $database_name
                    DEFAULT CHARACTER SET utf8 
                    DEFAULT COLLATE utf8_general_ci;";
        $pdo->exec($request);
    }
    catch(PDOException $e) {
        catch_exceptions($e);
    }
}

function create_table() {
    try {
        $pdo = connexion_db();
        $request = "CREATE TABLE t_utilisateur_uti (
        uti_id  INT AUTO_INCREMENT PRIMARY KEY,
        uti_pseudo   VARCHAR(255) NOT NULL,
        uti_email  VARCHAR(255) NOT NULL,
        uti_motdepasse BINARY(255) UNIQUE,
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
        $request = "SELECT * FROM t_utilisateur_uti";
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
        $request = "SELECT * FROM t_utilisateur_uti WHEN uti_id = $id";
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
        $request = "SELECT * FROM t_utilisateur_uti WHEN uti_pseudo = :user_f AND uti_motdepasse = :password_f";
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
        $request = "INSERT INTO t_utilisateur_uti (uti_pseudo, uti_motdepasse, uti_email) VALUES ( :user_f , :password_f , :email_f)";
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
        $request = "UPDATE t_utilisateur_uti SET uti_pseudo = :user_f WHERE uti_id = :user_id_f";
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
        $request = "UPDATE t_utilisateur_uti SET uti_motdepasse = :password_f WHERE uti_id = :user_id_f";
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
        $request = "UPDATE t_utilisateur_uti SET uti_email = :email_f WHERE uti_id = :user_id_f";
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
        $request = "DELETE FROM t_utilisateur_uti WHERE uti_id = :user_id_f";
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