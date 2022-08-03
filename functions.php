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
    }
    $result = '';
    foreach($characters as $character){
        $result .= '<section><p>Name: ' . $character['charname'] . '<br>' . 'Class: ' . $character['class'] . '</p>';
        $result .= '<p>Level: ' . $character['level'] . '</p>';
        $result .= '<p>Strength: ' . $character['strength'] . '<br>' . 'Dexterity: ' . $character['dexterity'] . '</p>';
        $result .= '<p>Constitution: ' . $character['constitution'] . '<br>' . 'Intelligence: ' . $character['intelligence'] . '</p>';
        $result .= '<p>Wisdom: ' . $character['wisdom'] . '<br>' . 'Charisma: ' . $character['charisma'] . '</p></section>';
    }

    return $result; 
}

/**
 * Validates the $_POST data to ensure that no fields are empty when inserting
 *
 * @param array Data from the form on previous page, stored in $_POST
 * @return bool returns false if not validated
 */
function validateFields(array $post): bool {
    if((!isset($post['charname']) || $post['charname'] === '') 
    || (!isset($post['class']) || $post['class'] === '')
    || (!isset($post['level']) || $post['level'] === '')
    || (!isset($post['strength']) || $post['strength'] === '')
    || (!isset($post['dexterity']) || $post['dexterity'] === '')
    || (!isset($post['constitution']) || $post['constitution'] === '')
    || (!isset($post['intelligence']) || $post['intelligence'] === '') 
    || (!isset($post['wisdom']) || $post['wisdom'] === '') 
    || (!isset($post['charisma']) || $post['charisma'] === '')) {
        return false;
    } return true;
}

/**
 * Validates the stats to ensure that they are not outside of acceptable range
 *
 * @param array data from the form on previous page with $_POST
 * @return bool returns false if stats are over 20
 */
function validateStats(array $post): bool {
    if($post['strength'] > 20 
    || $post['dexterity'] > 20 
    || $post['constitution'] > 20 
    || $post['intelligence'] > 20 
    || $post['wisdom'] > 20 
    || $post['charisma'] > 20) {
        return false;
    } return true;
}


/**
 * Fetches messages from $_GET 
 *
 * @return string returns a string from $_GET
 */
function getMessage(): string {
    if(isset($_GET['error'])) {
        $result = $_GET;
        return $result['error'];
    } return '';
}
/**
 * Sanitises any potentially malicious entries before inserting into db
 *
 * @return array returns an array containing the sanitised character name and class name
 */
function sanitizePost(): array {
    $charname = filter_var($_POST['charname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $class = filter_var($_POST['class'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    return [$charname, $class];
}

?>
