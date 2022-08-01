<html>
    <head>
        <form action='project_index.php'>
            <button>Go back</button>
        </form>
    </head>
    <body>
        <form action='verify.php' method='POST'>
            <div>
                <?php   if(isset($_GET['error'])){
                        echo '<p>All fields are required</p>';
                } 
                ?>
                <label for='charname'>Character Name:</label>
                <input type='text' name='charname' />
            </div>
            <div>
                <label for='class'>Class:</label>
                <input type='text' name='class' />
            </div>
            <div>
                <label for='level'>Level:</label>
                <input type='number' min= 0 max= 20 name='level' />
            </div>
            <div>
                <label for='strength'>Strength:</label>
                <input type='number' min= 0 max= 20 name='strength' />
            </div>
            <div>
                <label for='dexterity'>Dexterity:</label>
                <input type='number' min= 0 max= 20 name='dexterity' />
            </div>
            <div>
                <label for='constitution'>Constitution:</label>
                <input type='number' min= 0 max= 20 name='constitution' />
            </div>
            <div>
                <label for='intelligence'>Intelligence:</label>
                <input type='number' min= 0 max= 20 name='intelligence' />
            </div>
            <div>
                <label for='wisdom'>Wisdom:</label>
                <input type='number' min= 0 max= 20 name='wisdom' />
            </div>
            <div>
                <label for='charisma'>Charisma:</label>
                <input type='number' min= 0 max= 20 name='charisma' />
            </div>
            <div>
                <button>Create Character</button>
            </div>
        </form>
    </body>
</html>