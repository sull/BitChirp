<?php
/* Template Name: Super-Custom RSS Feeds */

//BitChirp.org and FightTheFuture Wordpress Theme with Responsive by "SRMojuze"
//Licensed under GNU GPL V3

//Not overriding the Wordpress feed system at this stage
//Hence calling it BitChirp.org/FeedX

//Set MIME-Type
header('Content-type: application/xml');

echo '<?xml version="1.0"?>';
echo '<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">';
echo '<channel>';
echo '<title>BitChirp FeedX</title>';
echo '<link>http://bitchirp.org</link>';
echo '<description>Secure, Anonymous Social Media Using Bitmessage</description>';

//INCLUDE CREDENTIALS
require_once("../private/_credentials_00.php");

mysql_connect(localhost,$username,$password);
mysql_select_db($database) or die( "Unable to select database");
//$thingy = "something";

//echo $_POST["action"];
//RESET
$query = "SELECT id, UNIX_TIMESTAMP(time) as time, from_address, to_address, subject, tweet, username FROM core_00 LEFT JOIN users ON core_00.from_address = users.address ORDER BY time DESC LIMIT 0,150";
$results1 = mysql_query($query);

while($row = mysql_fetch_assoc($results1))
    {
    echo "\n";
    echo '<item>';
    echo '<title>';
   	echo '<![CDATA[';
   	//Output Subject
    $subject = $row['subject'];
    $subject = strip_tags($subject);
    $subject = htmlentities($subject,ENT_QUOTES,'UTF-8');
    //$subject = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1<a class="hashtag_link" href="/search-hashtag/?h=%23\2">#\2</a>', $subject);
    if ($subject != "") 
        echo $subject;
    else
    	echo '(No Title)';
    echo ']]>';
    echo '</title>';

    //Output "Tweet"
  	echo '<description>';
  	echo '<![CDATA[';
    $tweet = $row['tweet'];
    //$tweet = base64_decode($tweet);
    $tweet = strip_tags($tweet);
    $tweet = str_replace("------------------------------------------------------", "~~~~~", $tweet);
    if (strlen($tweet) > 400)       
		{
       	$tweet_end = "...";
        }
  	else
    	{
  	    $tweet_end = "";
        }
	$tweet = substr($tweet,0,400).$tweet_end;
    $tweet = htmlentities($tweet,ENT_QUOTES,'UTF-8');
    echo $tweet;
   	echo ']]> ';
    echo '</description>';

    //Output Author
    echo '<dc:creator>';
    $from = $row['from_address'];
    $from = strip_tags($from);
    $from_userdetect = $from;
    if ($from_userdetect == "BM-2D7yBNF87Msi8M3hZr3eop6Fd1ENPAzPoi")
            $from_userdetect = "(⊙.⊙(☉_☉)⊙.⊙)";
        else if ($row['username'] != "")
            $from_userdetect = $row['username'];
        else
            $from_userdetect = substr($from_userdetect,0,15)."...";
    echo $from_userdetect;
    echo '</dc:creator>';

    //Output "Date"
    echo '<pubDate>';
    $time = $row['time'];
    $time = strip_tags($time);
    echo date("D, d M Y H:i:s O" ,$time);
    echo '</pubDate>';

    echo '</item>';
    }

echo '</channel>';
echo '</rss>';

?>