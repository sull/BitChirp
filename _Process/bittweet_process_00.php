<?php

$username="USERNAME";
$password="PASSWORD";
$database="DATABASE";

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
if ($_POST["APIKEY_A"] != "" && $_POST["APIKEY_Q"] != "")
	{
	$themessage1  = mysql_real_escape_string(stripslashes($_POST["APIKEY_A"]));
	$thetime1 = mysql_real_escape_string(stripslashes($_POST["APIKEY_Q"]));
	$themessage1  = substr($themessage1,0,2000);  //Truncate for safety
	$thetime1 = substr($thetime1,0,100); //Truncate for safety
	$thesubject1 = mysql_real_escape_string(stripslashes($_POST["APIKEY_X"]));
	$thesubject1 = substr($thesubject1,0,1000); //Truncate for safety
	$query1 = "SELECT * FROM core_00 WHERE time = FROM_UNIXTIME(".$thetime1.") AND tweet = '".$themessage1."'";
	//run query
	$results1 = mysql_query($query1);
	if (mysql_num_rows($results1) == 0) // the post was not there before
		{
		//insert this post
		$query2 = "INSERT INTO core_00(time,subject,tweet) VALUES(FROM_UNIXTIME(".$thetime1."),'". $thesubject1 . "','"   . $themessage1."')";
		mysql_query($query2);
		}

	}

mysql_close();
?>
