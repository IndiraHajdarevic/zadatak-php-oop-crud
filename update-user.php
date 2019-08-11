<html>
    <head>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
        <body>
        
        </body>
</html>

<?php
   require 'db.php';   
   require 'user.php';
   
   
   if(isset($_GET['update']))
   {
    if($_GET['update']=='1')
    {
         $id=$_GET['id'];        
         $user= new User('1','admin','admin','neki admin');
         $row=$user->get_user($id);
?>

<form action="" method="post">
            <p>Update user<br></p>
        <div>
            <input name="id" type="hidden" value="<?php echo $row->id; ?>" />
            <strong>First Name: *</strong> <input type="text" name="firstname" value="" maxlength="20"<?php echo $row->FirstName; ?>" /><br/>
            <strong>Last Name: *</strong> <input type="text" name="lastname" value="" maxlength="20"<?php echo $row->LastName; ?>" /><br/>
            <strong>Comment: *</strong> <input type="text" name="comment" value="" maxlength="20"<?php echo $row->Comment; ?>" /><br/>
            <p>* requirements</p>
            <input type="submit" name="update" class="stylish-button" value="Update">
        </div>
</form>



<?php
    }
}

if(isset($_POST['update']))
   {
        $user= new User('1','admin','admin','neki admin');
        $user->save();	
   }
?>