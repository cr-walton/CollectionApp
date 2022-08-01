<?php
function displayCharacters(array $characters) {
    foreach($characters as $character){
        echo '<h5>Name:</h5> ' . $character['charname'] . '<h5>Class:</h5> ' . $character['class'] . '<br>';
        echo '<p>Level: ' . $character['level'] . '</p>';
        echo '<p>Strength: ' . $character['strength'] . '<br>' . 'Dextrerity: ' . $character['dexterity'] . '</p>';
        echo '<p>Constitution: ' . $character['constitution'] . '<br>' . 'Intelligence: ' . $character['intelligence'] . '</p>';
        echo '<p>Wisdom: ' . $character['wisdom'] . '<br>' . 'Charisma: ' . $character['charisma'] . '</p>';
    }
}










?>
