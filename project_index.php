<?php
require_once('functions.php');
$db = databaseConnect();
$characters = databaseFetchAll($db);

?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <link href="normalize.css" type="text/css" rel="stylesheet" />
	    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
	    <link href="style.css" type="text/css" rel="stylesheet" />
		    <title>Chris Walton</title>
    </head>
    <body>
        <nav>
            <div class='nav-links'>
                <a href='char_creation.php'>Create a new character</a>
                <a href="#contact-me">Contact</a>
            </div>
            <div class='nav-contact'>
                <a href="https://cr-walton.github.io/">Portfolio</a>
                <a href="crwaltoncv.docx" id="cv">Download CV</a>
            </div>
        </nav>
        <div class='project'>
            <div class='collection-cont'>
                <h1>D&D Character Collection</h1>
                <?=displayCharacters($characters);?>
            </div>
            <section class='contact-container' id='contact-me'>
            <div class='contact-links'>
                <a href='mailto:walton-cr@proton.me'><img src='images/email-logo.png' alt='email Link'></a>
                <a href='#'><img src='images/LinkedIn-logo.png' alt='LinkedIn Link'></a>
                <a href='https://github.com/cr-walton'><img src='images/GitHub-Mark-32px.png' alt='GitHub Link'></a>
            </div>
        </div>	
	</section>
	
	<footer>
		<div class='foot-cont'>
			<p>&#169; Copyright 2022</p>
		</div>
	</footer>
    </body>
</html>