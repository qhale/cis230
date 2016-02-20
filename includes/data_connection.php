<?php

$status = '';

$db = new mysqli('mysql.qhale.com', 'quehal1', 'ydY7cUhE', 'cis230_db');

if ($db -> connect_error){
    $status = $db -> connect_error;
}
else{
    $status = 'db connected';
}

//You can also go to http://mysql.qhale.com/ to manage your MySQL database from the web.
//echo $status;
?>