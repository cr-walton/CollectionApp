<?php
require_once 'functions.php';
$db = databaseConnect();
$character = databaseFetchEditChar($db, $_POST['character']);
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
                <input type='number' name='level' value='<?= $character['level']?>' />
            </div>
            <div>
                <label>Strength:</label>
                <input type='text' name='strength' value='<?= $character['strength']?>' />
            </div>
            <div>
                <label>Dexterity:</label>
                <input type='text' name='dexterity' value='<?= $character['dexterity']?>' />
            </div>
            <div>
                <label>Constitution:</label>
                <input type='text' name='constitution' value='<?= $character['constitution']?>' />
            </div>
            <div>
                <label>Intelligence:</label>
                <input type='text' name='intelligence' value='<?= $character['intelligence']?>' />
            </div>
            <div>
                <label>Wisdom:</label>
                <input type='text' name='wisdom' value='<?= $character['wisdom']?>' />
            </div>
            <div>
                <label>Charisma:</label>
                <input type='text' name='charisma' value='<?= $character['charisma']?>' />
                <input type='hidden' name='character' value='<?= $character['id']?>' />
            </div>
            <button>Confirm Edits</button>
        </form>
    </body>
</html>

