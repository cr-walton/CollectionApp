<?php
require_once('functions.php');
$characters = databaseFetchAll();

echo displayCharacters($characters);



?>

<html>
    <head>
    </head>
    <body>
        <div>
            <!-- <p>Name: <?php echo $characters[1]['charname'];?></p> -->
        </div>
    </body>
</html>