<?php
require_once 'functions.php';
$validateFields = validateFields($_POST);
$validateStats = validateStats($_POST);
if($validateFields === false){
    header('location: char_edit.php?error=All fields required');
}
if($validateStats === false){
    header('location: char_edit.php?error=Stats must be below 20');
}
$filter = sanitizePost();
$db = databaseConnect();
$result = editCharDatabase($db, $filter['charname'], $filter['class'], $_POST['level'], $_POST['strength'], $_POST['dexterity'], $_POST['constitution'], $_POST['intelligence'], $_POST['wisdom'], $_POST['charisma'], $_POST['character'], $filter['image']);
if($result) {
    header('location: index.php?success=Changes have been applied');
} else {
    header('location: index.php?error=Edit failed, please try again');
}