<?php
require_once('functions.php');
$db = new PDO('mysql:host=db; dbname=collection_project', 'root', 'password');
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$query = $db->prepare("SELECT `charname`, `class`, `level` FROM `characters`;");
// $query->bindParam(':email', $email);
$query->execute();
$characters = $query->fetchAll();

echo $characters[0]['charname'];

echo '<pre>';
var_dump($characters);
echo '</pre>';


?>

<html>
    <head>
    </head>
    <body>

    </body>
</html>