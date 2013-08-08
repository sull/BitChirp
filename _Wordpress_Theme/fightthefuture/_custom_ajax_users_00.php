<?php
/* Template Name: Ajax Users 00 Page */

//BitChirp.org and FightTheFuture Wordpress Theme with Responsive by "SRMojuze"
//Licensed under GNU GPL V3

//Document Header
get_header(); 

//NEEDS TO GO SOMEWHERE BETTER
function alterBrightness($color, $amount) 
	{
    $rgb = hexdec($color); // convert color to decimal value

    //extract color values:
    $red = $rgb >> 16;
    $green = ($rgb >> 8) & 0xFF;
    $blue = $rgb & 0xFF;

    //manipulate and convert back to hexadecimal
    return dechex(($red + $amount) << 16 | ($green + $amount) << 8 | ($blue + $amount));
	}

$the_mode = substr(mysql_real_escape_string(stripslashes($_GET['m'])),0,30);

//Get The Mode
switch($the_mode)
	{
	case "all":
	require_once("_includes/_chirp_output_00.php"); 
	break;

	case "user":
	//Get The User
	$the_user = substr(mysql_real_escape_string(stripslashes($_GET['u'])),0,100);
	require_once("_includes/_chirp_user_00.php"); 
	break;

	case "hash":
	//Get The Hash
	$the_hashtag = substr(mysql_real_escape_string(stripslashes($_GET['h'])),0,100);
	require_once("_includes/_chirp_hashtag_00.php"); 
	break;
	}
?>