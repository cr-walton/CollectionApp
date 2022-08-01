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
        <form action='char_creation.php'>
            <button>Create a new character</button>
        </form>
    </body>
</html>