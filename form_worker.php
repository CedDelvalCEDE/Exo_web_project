<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["user_name"]) && !empty($_POST["user_name"])) {
        $name = $_POST["user_name"];
    }
    if (isset($_POST["user_surname"]) && !empty($_POST["user_surname"])) {
        $surname = $_POST["user_surname"];
    }
    if (isset($_POST["user_mail"]) && !empty($_POST["user_mail"])) {
        $mail = $_POST["user_mail"];
    }
    if (isset($_POST["message"])) {
        $message = $_POST["message"];
    }
}

?>
user_name
user_surname
user_mail
message