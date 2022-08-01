<?php
require_once('functions.php');
$characters = databaseFetchAll();

?>

<html>
    <head>
    </head>
    <body>
        <div>
            <?php echo displayCharacters($characters);?>
        </div>
    </body>
</html>