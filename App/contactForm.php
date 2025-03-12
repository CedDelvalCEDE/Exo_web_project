<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_data_name = ["nom", "prenom", "email", "message"];
    $not_required = false;
    $form_data = [];
    $flag_good_entry = true;
    foreach ($form_data_name as $index) {
        $not_required = ($index == "prenom") ? true : false;
        [$min, $max] = ($index != "message") ? [2,255] : [10,3000] ;
        if (isset($_POST[$index]) && (!empty($_POST[$index]) || $not_required)) {
            if (good_lenght($_POST[$index], $min, $max)) {
                $form_data[] = $_POST[$index];
            }
            else {
                $flag_good_entry = false;
            }
        }
        else {
            $flag_good_entry = false;
        }
    }
    if ($flag_good_entry) {
        $postAnswer = "Le formulaire a bien été envoyé !";
        // good
    }
    else {
        $postAnswer = "Le formulaire n'a pas été envoyé !";
        // bad
    }
}

function good_lenght($entry, $min, $max) {
    $entry_len = strlen($entry);
    if ($entry_len > $min && $entry_len < $max) {
        return true;
    }
    else {
        return false;
    }
}
?>
<!-- 
user_name required 2/255
user_surname not required 2/255
user_mail required 
message required 10/3000 
-->