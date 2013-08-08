<?php
//BitChirp.org and FightTheFuture Wordpress Theme with Responsive by "SRMojuze"
//Licensed under GNU GPL V3

//INCLUDE CREDENTIALS
require_once("/home/bitchirp/private/_credentials_process_00.php");

//$thingy = substr($thingy, 0, -2);
//echo $thingy;
//$thingy = $thingy."}";

//var_dump(json_decode($thingy));
//$data = json_decode($thingy);
//echo utf8_encode($thingy);

mysql_connect("127.0.0.1",$username,$password);

mysql_select_db($database) or die( "Unable to select database");
//$thingy = "something";

//Let's see if this is a new post
if ($_POST[$APIKEY_FROM] != "" && $_POST[$APIKEY_TO] != "")
	{
	$themessage1  = mysql_real_escape_string(stripslashes($_POST[$APIKEY_STRING]));
	$themessage1  = substr($themessage1,0,1000);  //Truncate for safety

	//base64 decode
	//$themessage1 = base64_decode($themessage1);
	//$themessage1 = htmlentities($themessage1,ENT_QUOTES,'UTF-8');
	
	$thetime1 = mysql_real_escape_string(stripslashes($_POST[$APIKEY_TIME]));
	$thetime1 = substr($thetime1,0,100); //Truncate for safety
	
	$thefrom1 = mysql_real_escape_string(stripslashes($_POST[$APIKEY_FROM]));
	$thefrom1 = substr($thefrom1,0,50); //Truncate for safety

	$theto1 = mysql_real_escape_string(stripslashes($_POST[$APIKEY_TO]));
	$theto1 = substr($theto1,0,50); //Truncate for safety

	$thesubject1 = mysql_real_escape_string(stripslashes($_POST[$APIKEY_SUBJECT]));
	$thesubject1 = substr($thesubject1,0,500); //Truncate for safety

	//base64 decode
	//$thesubject1 = base64_decode($thesubject1);
	//$thesubject1 = htmlentities($thesubject1,ENT_QUOTES,'UTF-8');

	$query1 = "SELECT * FROM core_00 WHERE time = FROM_UNIXTIME(".$thetime1.") AND from_address = '".$thefrom1."'";
	//run query
	$results1 = mysql_query($query1);
	
	if (mysql_num_rows($results1) == 0) // should be ZERO the post was not there before
		{
		//insert this post
		$query2 = "INSERT INTO core_00(time,from_address,to_address,subject,tweet) VALUES(FROM_UNIXTIME(".$thetime1."),'". $thefrom1 . "','". $theto1 . "','". $thesubject1 . "','"   . $themessage1."')";
		mysql_query($query2);
		}

	}

mysql_close();
?>
