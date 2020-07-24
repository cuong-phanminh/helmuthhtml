<?php
session_start();
include("./includes/db.inc.php");

if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: database/dbconfig.php");
}
?>