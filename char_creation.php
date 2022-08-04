<?php
require_once 'functions.php';
$error = getMessage($_GET);

?>


<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link href="normalize.css" type="text/css" rel="stylesheet" />
	    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
	    <link href="style.css" type="text/css" rel="stylesheet" />
		    <title>Create Character</title>
    </head>
    <body>
        <nav>
            <div class='nav-links'>
                <a href="index.php">Home</a>
            </div>
            <div class='nav-contact'>
                <a href="https://cr-walton.github.io/">Portfolio</a>
                <a href="crwaltoncv.docx" id="cv">Download CV</a>
            </div>
        </nav>
        <h1>Create Your Character</h1>
        <section class='form_container'>
            <form class='edit_create_form' action='verify.php' method='POST'>
                <div>
                   <?php echo $error ?>
                </div> 
                <div>
                    <label for='charname'>Character Name:</label>
                    <input type='text' name='charname' id='charname' />
                </div>
                <div>
                    <label for='class'>Class:</label>
                    <input type='text' name='class' id='class' />
                </div>
                <div>
                    <label for='level'>Level:</label>
                    <input type='number' min='1' max='20' name='level' id='level'/>
                </div>
                <div>
                    <label for='strength'>Strength:</label>
                    <input type='number' min='1' max='20' name='strength' id='strength'/>
                </div>
                <div>
                    <label for='dexterity'>Dexterity:</label>
                    <input type='number' min='1' max='20' name='dexterity' id='dexterity'/>
                </div>
                <div>
                    <label for='constitution'>Constitution:</label>
                    <input type='number' min='1' max='20' name='constitution' id='constitution'/>
                </div>
                <div>
                    <label for='intelligence'>Intelligence:</label>
                    <input type='number' min='1' max='20' name='intelligence' id='intelligence'/>
                </div>
                <div>
                    <label for='wisdom'>Wisdom:</label>
                    <input type='number' min='1' max='20' name='wisdom' id='wisdom' />
                </div>
                <div>
                    <label for='charisma'>Charisma:</label>
                    <input type='number' min='1' max='20' name='charisma' id='charisma'/>
                </div>
                <div>
                    <label for='image'>Image URL:</label>
                    <input type='text' name='image' id='image' value='https://i.imgur.com/9AeOMee.png' required />
                </div>
                <div class='confirm_button'>
                    <button>Create Character</button>
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