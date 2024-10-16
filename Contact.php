<?php
$metaDescription = "Page de contact de mon site";
require_once __DIR__ . DIRECTORY_SEPARATOR . "structure.php";
echo $header;
$form_data_content = ["","","",""]
?>
<h1>Contact</h1>
<fieldset>
    <form method="post">
        <label for="user_name">Votre prénom</label>
        <input class="right-stink" type="text" name="user_name" id="user_name" text=<?=$form_data_content[0]?> required></input><br>
        <label for="user_surname">Votre nom</label>
        <input class="right-stink" type="text" name="user_surname" id="user_surname" text=<?=$form_data_content[1]?>></input><br>
        <label for="user_mail">Votre email</label>
        <input class="right-stink" type="email" name="user_mail" id="user_mail" text=<?=$form_data_content[2]?> required></input><br>
        <label for="message">Un message sur vos impressions</label><br>
        <input class="right-stink" type="textarea" name="message" id="message" text=<?=$form_data_content[3]?> required></input><br>
        <input type="submit" value="envoyer">
        <input class="right-stink" type="reset" value="annuler">
    </form>
</fieldset>
<?php
echo $explicate;
echo $footer;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_data_name = ["user_name", "user_surname", "user_mail", "message"];
    $not_required = false;
    $form_data = [];
    $flag_good_entry = true;
    foreach ($form_data_name as $index) {
        $not_required = ($index == "user_surname") ? true : false;
        [$min, $max] = ($index != "message") ? [2,255] : [10,3000] ;
        if (isset($_POST[$index]) && (!empty($_POST[$index]) || $not_required)) {
            if (good_lenght($_POST[$index], $min, $max)) {
                $form_data[] = $_POST[$index];
            }
            else {
                $form_data[] = "";
                $flag_good_entry = false;
            }
        }
        else {
            $flag_good_entry = false;
        }
    }
    if (!$flag_good_entry) {
        $form_data_content = $form_data;
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