<?php
require_once('functions.php');
$db = databaseConnect();
$characters = databaseFetchAll($db);

?>

<html>
    <head>
        <!-- Create a navbar that will allow access to creation/editing/deleting -->
    </head>
    <body>
        <div>
            <?=displayCharacters($characters);?>
        </div>
        <a href='char_creation.php'>Create a new character</a>
    </body>
</html>