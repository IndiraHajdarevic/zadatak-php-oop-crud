<html>
    <head>
        <link rel="stylesheet" type="text/css" href="main.css">            
    </head>
        <body>
            <div>
                <nav>
                     <a href="add-user.php? . '&dodaj=1" class="stylish-button">Add a new!</a>
                </nav>
            </div>
        </body>
</html>
<?php
error_reporting(E_ERROR);
require 'db.php';
require 'user.php';

$user =new User('1','admin','admin','neki admin');
$users=$user->getAllUsers();
$max = sizeof($users);
$result = mysql_query("SELECT * FROM user") 
or die(mysql_error());
        
echo "<table>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Comment</th>
    </tr>";

for($i=0;$i<$max;$i++){ 
        echo "<tr>";
        echo "<td>" . $users[$i]->getID(). "</td>";
        echo "<td>" . $users[$i]->getFirstName() . "</td>";
        echo "<td>" . $users[$i]->getLastName() . "</td>";
        echo "<td>" . $users[$i]->getComment() . "</td>";
        echo "<td>" . '<a href="update-user.php?id=' . $users[$i]->getID() . '&update=1" class="stylish-button2">Update User</a>'
        . "</td>";
        echo "<td>" . '<a href="list.php?id=' . $users[$i]->getID() . '&del=1" class="stylish-button2">Delete User</a>' . "</td>";         
        echo "</tr>";
}
echo "</table>";

if(isset($_GET['del']))
    if($_GET['del']=='1')
    {
        $user= new User('1','admin','admin','neki admin');
        $user->delete();
        header('location:list.php');	
    }
?>


