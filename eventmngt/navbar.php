<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>PHP-Demo</title>
</head>

<body>
	<div class="navbar">
    	<img src="elogo.png" />
    	<div class="links">
    		<a href="index.php">Home</a>
			<a href="login.php">
            	<?php
                if(isset($_SESSION['user']))
                	echo "Profile";
				else if(isset($_SESSION['admin']))
                	echo "Admin"; 
                else
                	echo "Login";
                ?>
            </a>
        </div>
    </div>
