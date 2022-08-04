<?php
require_once 'functions.php';
$db = databaseConnect();
$result = databaseDeleteChar($db, $_POST['character']);
if($result) {
    header('location: index.php?sucess=Deletion successful');
} else {
    header('location: index.php?error=Deletion failed, please try again');
}
?>
