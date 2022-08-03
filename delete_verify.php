<?php
require_once 'functions.php';
$db = databaseConnect();
$result = databaseDeleteChar($db, $_POST['character']);
if($result) {
    header('location: project_index.php?sucess=Deletion successful');
} else {
    header('location: char_creation.php?error=Deletion failed, please try again');
}
?>
