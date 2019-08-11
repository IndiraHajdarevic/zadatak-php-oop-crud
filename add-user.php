<html>
    <head>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
</html>

<?php

require 'db.php';
require 'user.php';
?>

<form action="" method="post">
        <div>
            <p>Add a new user<br></p>
            <strong>First Name: *</strong> <input type="text" name="firstname" value="" maxlength="20" ?> <br/>
            <strong>Last Name: *</strong> <input type="text" name="lastname" value="" maxlength="20"?><br/>
            <strong>Comment: *</strong> <input type="text" name="comment" value="" maxlength="20"?><br/>
            <p>* requirements<br></p>
            <input type="submit" name="dodaj" class="stylish-button" value="Submit">
        </div>
</form>

<?php
    


if(isset($_POST['dodaj']))
{
        $user= new User('1','admin','admin','neki admin');
        $user->save();	


}