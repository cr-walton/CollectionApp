<?php
/**
 * Database connection
 *
 * @return returns PDO from database connection
 */
function databaseConnect(): PDO {
    $db = new PDO('mysql:host=db; dbname=collection_project', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $db;
}

/**
 * Creates query fetching all data from the database
 *
 * @param PDO created by connection with database
 * @return array returns all of the data requested from the database
 */
function databaseFetchAll(PDO $db): array {
    $query = $db->prepare("SELECT `id`, `charname`, `class`, `level`, `strength`, `dexterity`, `constitution`, `intelligence`, `wisdom`, `charisma`, `link` FROM `characters` WHERE `deleted` = 0;");
    $query->execute();
    return $query->fetchAll();
}

/**
 * Fetch character data from database so that it can be edited
 *
 * @param PDO database PDO
 * @param string id of the character in the database
 * @return mixed Returns all the information of the character that is to be edited, if failed returns false
 */
function databaseFetchEditChar(PDO $db,string $id) {
    $query = $db->prepare("SELECT `id`, `charname`, `class`, `level`, `strength`, `dexterity`, `constitution`, `intelligence`, `wisdom`, `charisma`, `link` FROM `characters` WHERE `id` = :id ;");
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->fetch();
}

/**
 * Sets the character data on the database to be tagged as deleted
 *
 * @param PDO database PDO
 * @param string id of the character to be deleted
 * @return returns a boolean to see if the function has failed
 */
function databaseDeleteChar(PDO $db, string $id): bool {
    $query = $db->prepare("UPDATE `characters` SET `deleted` = 1 WHERE `id` = :id");
    $query->bindParam(':id', $id);
    $query->execute();
    return $query->rowcount() === 1;
}

/**
 * Inserts data from the form into the database
 *
 * @param PDO database connection PDO
 * @param string $charname from POST
 * @param string $class from POST
 * @param integer $level from POST
 * @param integer $strength from POST
 * @param integer $dexterity from POST
 * @param integer $constitution from POST
 * @param integer $intelligence from POST
 * @param integer $wisdom from POST
 * @param integer $charisma from POST
 * @return Inserts data to the database
 */
function insertToDatabase(PDO $db,
    string $charname,
    string $class,
    int $level,
    int $strength,
    int $dexterity,
    int $constitution,
    int $intelligence,
    int $wisdom,
    int $charisma,
    string $link
): bool {
    $query = $db->prepare("INSERT INTO `characters` (`charname`, `class`, `level`, `strength`, `dexterity`, `constitution`, `intelligence`, `wisdom`, `charisma`, `link`)
    VALUES (:charname, :class, :level, :strength, :dexterity, :constitution, :intelligence, :wisdom, :charisma, :link)");
    $query->bindParam(':charname', $charname);
    $query->bindPAram(':class', $class);
    $query->bindPAram(':level', $level);
    $query->bindPAram(':strength', $strength);
    $query->bindPAram(':dexterity', $dexterity);
    $query->bindPAram(':constitution', $constitution);
    $query->bindPAram(':intelligence', $intelligence);
    $query->bindPAram(':wisdom', $wisdom);
    $query->bindPAram(':charisma', $charisma);
    $query->bindParam(':link', $link);
    return $query->execute();
}

/**
 * Update the database with the data provided, in order to edit the character details
 *
 * @param PDO database PDO
 * @param string $charname
 * @param string $class
 * @param integer $level
 * @param integer $strength
 * @param integer $dexterity
 * @param integer $constitution
 * @param integer $intelligence
 * @param integer $wisdom
 * @param integer $charisma
 * @param integer $id
 * @return bool true if passed and false if failed
 */
function editCharDatabase(PDO $db, 
    string $charname, 
    string $class, 
    int $level, 
    int $strength, 
    int $dexterity, 
    int $constitution, 
    int $intelligence, 
    int $wisdom, 
    int $charisma, 
    int $id, 
    string $link
): bool {
    $query = $db->prepare("UPDATE `characters` SET `charname` = :charname, `class` = :class, `level` = :level1, `strength` = :strength, `dexterity` = :dexterity, `constitution` = :constitution, `intelligence` = :intelligence, `wisdom` = :wisdom, `charisma` = :charisma, `link` = :link WHERE `id` = :id");
    $query->bindParam(':charname', $charname);
    $query->bindParam(':class', $class);
    $query->bindParam(':level1', $level);
    $query->bindParam(':strength', $strength);
    $query->bindParam(':dexterity', $dexterity);
    $query->bindParam(':constitution', $constitution);
    $query->bindParam(':intelligence', $intelligence);
    $query->bindParam(':wisdom', $wisdom);
    $query->bindParam(':charisma', $charisma);
    $query->bindParam(':id', $id);
    $query->bindParam(':link', $link);
    return $query->execute();
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
        $result .= "<section class='character_sheet'><div class='image'><img src='" . $character['link'] . "' /></div>";
        $result .= "<div class='grid_contain'><div class='name_class'><p>Name: " . $character['charname'] . '</p><p>' . 'Class: ' . $character['class'] . '</p>';
        $result .= '<p>Level: ' . $character['level'] . '</p></div>';
        $result .= "<div class='stats'><div><p>Strength: " . $character['strength'] . '</p><p>' . 'Dexterity: ' . $character['dexterity'] . "</p>";
        $result .= '<p>Constitution: ' . $character['constitution'] . '</p></div>' . '<div><p>Intelligence: ' . $character['intelligence'] . '</p>';
        $result .= '<p>Wisdom: ' . $character['wisdom'] . '</p><p>' . 'Charisma: ' . $character['charisma'] . '</p></div>';
        $result .= "</div><div class='buttons'><form action='delete_verify.php' method='POST'><input type='hidden' name='character' value='" . $character['id'] . "'</input>";
        $result .= "<button>Delete this character</button></form>";
        $result .= "<form action='char_edit.php' method='POST'><input type='hidden' name='character' value='" . $character['id'] . "'></input>";
        $result .= "<button>Edit this character</button></form></div></div></section>";
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
    if(empty($post['charname']) ||
    empty($post['class']) ||
    empty($post['level']) ||
    empty($post['strength']) ||
    empty($post['dexterity']) || 
    empty($post['constitution']) ||
    empty($post['intelligence']) || 
    empty($post['wisdom']) || 
    empty($post['charisma']) ||
    empty($post['image'])) { 
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
    $image = filter_var($_POST['image'], FILTER_SANITIZE_URL);
    return ['charname' => $charname, 'class' => $class, 'image' => $image];
}

?>
