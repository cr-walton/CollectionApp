<?php
require_once('functions.php');
$db = databaseConnect();
$characters = databaseFetchAll($db);

?>

<html>
    <head>
    </head>
    <body>
        <div>
            <?=displayCharacters($characters);?>
        </div>
    </body>
</html>