<?php
//cd ~/sites/academyServer/html
require_once '../functions.php';

use PHPUnit\Framework\TestCase;

class Functions extends TestCase {
    public function testSuccessdisplayCharacters()
    {
        //expected result of the test
        $expected = "<section class='character_sheet'><p>Name: Lilen<br>Class: Sorcerer</p><p>Level: 6</p><p>Strength: 8<br>Dexterity: 12</p><p>Constitution: 14<br>Intelligence: 13</p><p>Wisdom: 12<br>Charisma: 18</p></section>";
        //input for the test to get the result
        $testInput1 = [['charname' => 'Lilen', 'class' => 'Sorcerer', 'level' => 6, 'strength' => 8, 'dexterity' => 12, 'constitution' => 14, 'intelligence' => 13, 'wisdom' => 12, 'charisma' => 18]];
        //run the real function with the input
        $case = displayCharacters($testInput1);
        //compare the expected result with the actual result
        $this->assertEquals($expected, $case);
    }

    public function testFailuredisplayCharacters()
    {
        //expected result of the test
        $expected = 'Data is not available';
        //input for the test to get the result
        $testInput1 = [];
        //run the real function with the input
        $case = displayCharacters($testInput1);
        //compare the expected result with the actual result
        $this->assertEquals($expected, $case);
    }

    public function testMalformeddisplayCharacters()
    {
        //input for the test to get the result
        $testInput1 = 1;
        // tell phpunit it should expect an error to be thrown
        $this->expectException(TypeError::class);
        //run the real function with the input
        $case = displayCharacters($testInput1);
        
    }
   
    public function testSuccevalidateFields()
    {
        //expected result of the test
        $expected = true;
        //input for the test to get the result
        $testInput1 = ['charname' => 'Lilen', 'class' => 'Sorcerer', 'level' => '6', 'strength' => 8, 'dexterity' => 12, 'constitution' => 14, 'intelligence' => 13, 'wisdom' => 12, 'charisma' => 18];
        //run the real function with the input
        $case = validateFields($testInput1);
        //compare the expected result with the actual result
        $this->assertEquals($expected, $case);
    }

    public function testFailurevalidateFields()
    {
        //expected result of the test
        $expected = false;
        //input for the test to get the result
        $testInput1 = ['charname' => 'Lilen', 'class' => 'Sorcerer', 'level' => '', 'strength' => 12, 'dexterity' => 12, 'constitution' => 14, 'intelligence' => 13, 'wisdom' => 12, 'charisma' => 18];
        //run the real function with the input
        $case = validateFields($testInput1);
        //compare the expected result with the actual result
        $this->assertEquals($expected, $case);
    }

    public function testMalformedvalidateFields()
    {
        //input for the test to get the result
        $testInput1 = 1;
        // tell phpunit it should expect an error to be thrown
        $this->expectException(TypeError::class);
        //run the real function with the input
        $case = validateFields($testInput1);
    } 
    
    public function testSuccevalidateStats()
    {
        //expected result of the test
        $expected = true;
        //input for the test to get the result
        $testInput1 = ['charname' => 'Lilen', 'class' => 'Sorcerer', 'level' => '6', 'strength' => 8, 'dexterity' => 12, 'constitution' => 14, 'intelligence' => 13, 'wisdom' => 12, 'charisma' => 18];
        //run the real function with the input
        $case = validateStats($testInput1);
        //compare the expected result with the actual result
        $this->assertEquals($expected, $case);
    }

    public function testFailurevalidateStats()
    {
        //expected result of the test
        $expected = false;
        //input for the test to get the result
        $testInput1 = ['charname' => 'Lilen', 'class' => 'Sorcerer', 'level' => '6', 'strength' => 22, 'dexterity' => 12, 'constitution' => 14, 'intelligence' => 13, 'wisdom' => 12, 'charisma' => 18];
        //run the real function with the input
        $case = validateStats($testInput1);
        //compare the expected result with the actual result
        $this->assertEquals($expected, $case);
    }

    public function testMalformedvalidateStats()
    {
        //input for the test to get the result
        $testInput1 = 1;
        // tell phpunit it should expect an error to be thrown
        $this->expectException(TypeError::class);
        //run the real function with the input
        $case = validateStats($testInput1);
    }  
}
   ?>
