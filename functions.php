<?php
/**
 * Takes the data from the database, separates the array into individual characters and then echos
 * out the information
 *
 * @param array $characters
 * @return echos out the details from the character 
 */
function displayCharacters(array $characters) {
    if(count($characters) === 0){
        return 'Data is not available';
    }else {
        $result = '';
        foreach($characters as $character){
            $result .= '<p>Name: ' . $character['charname'] . ' Class: ' . $character['class'] . '</p>';
            $result .= '<p>Level: ' . $character['level'] . '</p>';
            $result .= '<p>Strength: ' . $character['strength'] . '<br>' . 'Dexterity: ' . $character['dexterity'] . '</p>';
            $result .= '<p>Constitution: ' . $character['constitution'] . '<br>' . 'Intelligence: ' . $character['intelligence'] . '</p>';
            $result .= '<p>Wisdom: ' . $character['wisdom'] . '<br>' . 'Charisma: ' . $character['charisma'] . '</p>';
    }
    return $result;
    }
}










?>
