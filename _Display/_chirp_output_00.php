<?php
$username="USERNAME";
$password="PASSWORD";
$database="DATABASE";

mysql_connect(localhost,$username,$password);
mysql_select_db($database) or die( "Unable to select database");
//$thingy = "something";

//echo $_POST["action"];
//RESET
$query = "SELECT * FROM core_00 ORDER BY time DESC";
//echo "query is".$query;

//echo '<font size="5"><b>"BitTweet"</b></font><br>';

$results = mysql_query($query);

// Run loop until data exceeds

    while($row = mysql_fetch_assoc($results))

    {
        
        //Output Time
        $time = $row['time'];
        $time = strip_tags($time);
        $time = strtotime($time);
        $time = $time - 36000; //Change to UTC
       // echo htmlentities($time);
        echo '<span style="font-size:12pt;color:#F2B91D;">'.(date('M d H:i',$time)).' UTC</span>';
        echo "<br>\n";

        //Output Subject
        $subject = $row['subject'];
        $subject = strip_tags($subject);
        if ($subject != "") 
            {
            echo '<span class="subject_text">'.htmlentities(strip_tags(base64_decode($subject)),ENT_QUOTES,'UTF-8').'</span>: ';
            }

        echo '<span style="color:#DDD;">'.htmlentities(strip_tags(base64_decode($row['tweet'])),ENT_QUOTES,'UTF-8').'</span>';
        // Separate rows from each other
        echo "<br><br> \n";
    }
mysql_close();
?>