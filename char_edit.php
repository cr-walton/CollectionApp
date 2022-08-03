<?php
require_once 'functions.php';
$db = databaseConnect();
$character = databaseFetchEditChar($db, $_POST['character']);
if(!$character) {
    header('location: project_index.php');
}
?>

<html>
    <head>

    </head>
    <body>
        <p>
        <form action='edit_verify.php' method='POST'>
            <div>
                <label>Character name:</label>
                <input type='text' name='charname' value='<?= $character['charname']?>' />
            </div>
            <div>
                <label>Class:</label>
                <input type='text' name='class' value='<?= $character['class']?>' />
            </div>
            <div>
                <label>Level:</label>
                <input type='number' min= '0' max= '20' name='level' value='<?= $character['level']?>' />
            </div>
            <div>
                <label>Strength:</label>
                <input type='number' min= '0'max= '20' name='strength' value='<?= $character['strength']?>' />
            </div>
            <div>
                <label>Dexterity:</label>
                <input type='number' min= '0' max= '20' name='dexterity' value='<?= $character['dexterity']?>' />
            </div>
            <div>
                <label>Constitution:</label>
                <input type='number' min= '0' max= '20' name='constitution' value='<?= $character['constitution']?>' />
            </div>
            <div>
                <label>Intelligence:</label>
                <input type='number' min= '0' max= '20' name='intelligence' value='<?= $character['intelligence']?>' />
            </div>
            <div>
                <label>Wisdom:</label>
                <input type='number' min= '0' max= '20' name='wisdom' value='<?= $character['wisdom']?>' />
            </div>
            <div>
                <label>Charisma:</label>
                <input type='number' min= '0' max= '20' name='charisma' value='<?= $character['charisma']?>' />
                <input type='hidden' name='character' value='<?= $character['id']?>' />
            </div>
            <button>Confirm Edits</button>
        </form>
    </body>
</html>

