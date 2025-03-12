<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "App" . DIRECTORY_SEPARATOR . "Model.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_data_name = ["surnom", "motDePasse"];
    $form_data = [];
    $flag_good_entry = true;
    foreach ($form_data_name as $index) {
        [$min, $max] = ($index != "motDePasse") ? [2,255] : [8,72] ;
        if (isset($_POST[$index]) && (!empty($_POST[$index]))) {
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
        // good
    }
    else {
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
password required 8/72
-->