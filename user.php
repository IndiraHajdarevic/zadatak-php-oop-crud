<html>
    <head>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
        <body>
        
        </body>
</html>

<?php
Class User {
        public $id;

        public $first_name;
        public $last_name;
        public $comments;


public function __construct($Id,$name, $secondName, $comment)
{
        $this->id=$Id;
        $this->first_name=$name;
        $this->last_name=$secondName;
        $this->comments=$comment;
}

public function getID()
{
        return $this->id;
}

public function getFirstName()
{
        return $this->first_name;
}

public function getLastName()
{
        return $this->last_name;
}

public function getComment()
{
        return $this->comments;
}

public function save()
{
    if(is_numeric($_POST['id']))
        {
            
        $id = $_POST['id'];
        $firstname = mysql_real_escape_string(htmlspecialchars($_POST['firstname']));
        $lastname = mysql_real_escape_string(htmlspecialchars($_POST['lastname']));
        $comment = mysql_real_escape_string(htmlspecialchars($_POST['comment']));
        
        mysql_query("UPDATE user SET firstname='$firstname', lastname='$lastname', comment='$comment' WHERE id='$id'")
        or die(mysql_error());
        
        header('location:list.php');	
        }
        if(isset($_POST['dodaj']))
        {   
        $firstname = mysql_real_escape_string(htmlspecialchars($_POST['firstname']));
        $lastname = mysql_real_escape_string(htmlspecialchars($_POST['lastname']));
        $comment = mysql_real_escape_string(htmlspecialchars($_POST['comment']));
        if($firstname != '' && $lastname != '' && $comment != '')
            {
             mysql_query("INSERT INTO user SET firstname='$firstname', lastname='$lastname', comment='$comment'")
             or die(mysql_error());
            }
        header('location:list.php');
        }
       
}

public function get_user($id) 
{
        $id=mysql_real_escape_string($id);	
        $query="SELECT * FROM user WHERE id='$id'";	
        $result=mysql_query($query);
        $row=mysql_fetch_object($result);
        return $row;

}

public static function getAllUsers()
{
    $upit="SELECT * FROM user";
    if($querry_run=mysql_query($upit))
    {
            while($querry_row=mysql_fetch_assoc($querry_run))
            {  
            $niz[]= new User($querry_row['id'],$querry_row['FirstName'],$querry_row['LastName'],$querry_row['Comment']);
            }
    
        return $niz;
       
    }
}



public function delete()
{ 
        if (isset($_GET['id']) && is_numeric($_GET['id']))
        {
        $id = $_GET['id'];
        $result = mysql_query("DELETE FROM user WHERE id=$id")
        or die(mysql_error());
        }
}
} //Kraj klase 
        


        
?>