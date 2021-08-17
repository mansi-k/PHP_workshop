<?php
$bd=mysqli_connect("localhost","root","");
if(!$bd)
{
    die('oops connection problem ! --> '.mysqli_error());
}
if(!mysqli_select_db($bd,"practice"))
{
    die('oops database selection problem ! --> '.mysqli_error());
}
?>