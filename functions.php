<?php
/**
 * Database connection
 *
 * @return returns PDO from database connection
 */
function databaseConnect(): PDO {
    $db = new PDO('mysql:host=db; dbname=collection_project', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}
/**
 * Creates query fetching all data from the database
 *
 * @param PDO created by connection with database
 * @return array returns all of the data requested from the database
 */
function databaseFetchAll($db): array{
$query = $db->prepare("SELECT `charname`, `class`, `level`, `strength`, `dexterity`, `constitution`, `intelligence`, `wisdom`, `charisma` FROM `characters`;");
$query->execute();
return $query->fetchAll();
}

/**
 * Takes the data from the database, separates the array into individual characters and then echos
 * out the information
 *
 * @param array $characters
 * @return returns a string of the details from the characters
 */
function displayCharacters(array $characters): string {
    if(count($characters) === 0){
        return 'Data is not available';
    } else {
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
