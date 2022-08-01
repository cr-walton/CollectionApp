<?php
require_once 'functions.php';
if((!isset($_POST['charname']) || $_POST['charname'] === '') 
    || (!isset($_POST['class']) || $_POST['class'] === '')
    || (!isset($_POST['level']) || $_POST['level'] === '')
    || (!isset($_POST['strength']) || $_POST['strength'] === '')
    || (!isset($_POST['dexterity']) || $_POST['dexterity'] === '')
    || (!isset($_POST['constitution']) || $_POST['constitution'] === '')
    || (!isset($_POST['intelligence']) || $_POST['intelligence'] === '') 
    || (!isset($_POST['wisdom']) || $_POST['wisdom'] === '') 
    || (!isset($_POST['charisma']) || $_POST['charisma'] === '')) {
        header('location: char_creation.php?error=All fields needed');
} elseif ($_POST['strength'] > 20 
    || $_POST['dexterity'] > 20 
    || $_POST['constitution'] > 20 
    || $_POST['intelligence'] > 20 
    || $_POST['wisdom'] > 20 
    || $_POST['charisma'] > 20) {
        header('location: char_creation.php');
}else {
    $charname = filter_var($_POST['charname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $class = filter_var($_POST['class'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $db = databaseConnect();
    insertToDatabase($db, $charname, $class, $_POST['level'], $_POST['strength'], $_POST['dexterity'], $_POST['constitution'], $_POST['intelligence'], $_POST['wisdom'], $_POST['charisma']);
    header('location: project_index.php');
}







?>
