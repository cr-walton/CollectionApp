<?php
require_once 'functions.php';
$validateFields = validateFields($_POST);
$validateStats = validateStats($_POST);
if($validateFields === false){
    header('location: char_creation.php?error=All fields required');
}
if($validateStats === false){
    header('location: char_creation.php?error=Stats must be below 20');
}

$charname = filter_var($_POST['charname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$class = filter_var($_POST['class'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$db = databaseConnect();
$result = insertToDatabase($db, $charname, $class, $_POST['level'], $_POST['strength'], $_POST['dexterity'], $_POST['constitution'], $_POST['intelligence'], $_POST['wisdom'], $_POST['charisma']);
if($result) {
    header('location: project_index.php?success=Character added successfully');
} else {
    header('location: char_creation.php?error=insert failed, please try again');
}
?>
