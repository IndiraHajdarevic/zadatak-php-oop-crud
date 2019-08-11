<?php

$conn_error='Couldnt connect';

$mysql_host='localhost';
$mysql_root='root';
$mysql_password='';

$mysql_db='indira';

if(!@mysql_connect($mysql_host,$mysql_root,$mysql_password) || !@mysql_select_db($mysql_db)){
    die ($conn_error);
}

?>
