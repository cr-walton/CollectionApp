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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link href="normalize.css" type="text/css" rel="stylesheet" />
	    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
	    <link href="style.css" type="text/css" rel="stylesheet" />
		    <title>Edit Character</title>
    </head>
    <body>
        <nav>
            <div class='nav-links'>
                <a href="project_index.php">Home</a>
                <a href='char_creation.php'>Create a new character</a>
            </div>
            <div class='nav-contact'>
                <a href="https://cr-walton.github.io/">Portfolio</a>
                <a href="crwaltoncv.docx" id="cv">Download CV</a>
            </div>
        </nav>
        <h1>Edit Your Character</h1>
        <section class='form_container'>
            <form class='edit_create_form' action='edit_verify.php' method='POST'>
                <div>
                    <label>Character name:</label>
                    <input type='text' name='charname' id='charname' value='<?php echo $character['charname']?>' />
                </div>
                <div>
                    <label>Class:</label>
                    <input type='text' name='class' id='class' value='<?php echo $character['class']?>' />
                </div>
                <div>
                    <label>Level:</label>
                    <input type='number' min='1' max='20' name='level' id='level' value='<?php echo $character['level']?>' />
                </div>
                <div>
                    <label>Strength:</label>
                    <input type='number' min='1'max='20' name='strength' id='strength' value='<?php echo $character['strength']?>' />
                </div>
                <div>
                    <label>Dexterity:</label>
                    <input type='number' min='1' max='20' name='dexterity' id='dexterity' value='<?php echo $character['dexterity']?>' />
                </div>
                <div>
                    <label>Constitution:</label>
                    <input type='number' min='1' max='20' name='constitution' id='constitution' value='<?php echo $character['constitution']?>' />
                </div>
                <div>
                    <label>Intelligence:</label>
                    <input type='number' min='1' max='20' name='intelligence' id='intelligence' value='<?php echo $character['intelligence']?>' />
                </div>
                <div>
                    <label>Wisdom:</label>
                    <input type='number' min='1' max='20' name='wisdom' id='wisdom' value='<?php echo $character['wisdom']?>' />
                </div>
                <div>
                    <label>Charisma:</label>
                    <input type='number' min='1' max='20' name='charisma' id='charisma' value='<?php echo $character['charisma']?>' />
                    <input type='hidden' name='character' id='hidden_id' value='<?php echo $character['id']?>' />
                </div>
                <div>
                    <label>Image URL:</label>
                    <input type='text' name='image' id='image' value='<?php echo $character['link']?>' />
                </div>
                <div class='confirm_button'>
                    <button>Confirm Edits</button>
                </div>
            </form>
        </section>
        <div class='dnd-links'>
                <a href='https://www.dndbeyond.com'><img src='dnd-logo2.png' alt='D&D beyond link' /></a>
                <a href='http://dnd5e.wikidot.com'><img src='dnd-wiki-logo2.png' alt='D&D wiki link' /></a>
            </div>
        <section class='contact-container' id='contact-me'>
            <div class='contact-links'>
                <a href='mailto:walton-cr@proton.me'><img src='email-logo.png' alt='email Link'></a>
                <a href='#'><img src='LinkedIn-logo.png' alt='LinkedIn Link'></a>
                <a href='https://github.com/cr-walton'><img src='GitHub-Mark-32px.png' alt='GitHub Link'></a>
            </div>	
	    </section>
        <footer>
            <div class='foot-cont'>
                <p>&#169; Copyright 2022</p>
            </div>
        </footer>
    </body>
</html>

