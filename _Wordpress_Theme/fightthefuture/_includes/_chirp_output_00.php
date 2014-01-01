<?php
//BitChirp.org and FightTheFuture Wordpress Theme with Responsive by "SRMojuze"
//Licensed under GNU GPL V3

//Include files
//require_once("_libraries/twitter-text-php/Autolink.php"); 

//Thanks to http://stackoverflow.com/questions/2915864/php-how-to-find-the-time-elapsed-since-a-date-time
function humanTiming ($time)
    {
    $time = time() - $time; // to get the time since that moment

    $tokens = array (
        31536000 => 'YEAR',
        2592000 => 'MONTH',
        604800 => 'WEEK',
        86400 => 'DAY',
        3600 => 'HR',
        60 => 'MIN',
        1 => 'SEC'
    );

    foreach ($tokens as $unit => $text) 
        {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'S':'');
        }

    }

function link_callback($matches)
    {

    $theurl=$matches[3];
    if (strlen($theurl)>35)
        $theurl = substr($theurl,0,35)."...";

    return '<a class="parsed_links" href="'.$matches[1].'" target="_blank">'.$theurl.'</a>'.$matches[4];
    }

//INCLUDE CREDENTIALS
require_once("../private/_credentials_00.php");

mysql_connect(localhost,$username,$password);
//mysql_set_charset('UTF-8');
mysql_select_db($database) or die( "Unable to select database");

//$thingy = "something";

//echo $_POST["action"];
//RESET
$query = "SELECT id, UNIX_TIMESTAMP(time) as time, from_address, to_address, subject, tweet, username FROM core_00 LEFT JOIN users ON core_00.from_address = users.address ORDER BY time DESC LIMIT 0,150";
//echo "query is".$query;

//echo '<font size="5"><b>"BitTweet"</b></font><br>';

$results1 = mysql_query($query);
//$results2 = mysql_query($query);

// Run loop until data exceeds
    
    echo '
    <!--
    <table><tr>
      <td>
        span class="caps_header">WHAT IS BITCHIRP?</span><br>
        <span style="color:#222;">BitChirp uses the Bitmessage API and updates this page every 5-10 minutes. Learn more and </span><a href="https://bitmessage.org" target="_blank">Download Bitmessage</a><span style="color:#CCC;">.</span> 
        Page Auto-Refreshes, Last: '.gmdate('h:i:s').' UTC'.'
      </td>
    </tr></table>-->

    <table><tr>
      <td>
        <span class="tweet" style="color:#222;">Currently ad free! If you liked what you have seen, donate any amount to: <br>BTC: 1BLAxN8GcC2RZQvEXhg2Ppi2PSiWnQm82r <br>LTC: LdqrKf4pWnbchxRvwreAzakWEE4DbLS7cf
        </span>
      </td>
    </tr></table>
    
    ';

    echo '
    ';


    while($row = mysql_fetch_assoc($results1))

    {
        
        //Output Time
        $time = $row['time'];
        $time = strip_tags($time);
       
        $time = humanTiming($time).'';

        //Output From Address
        $from = $row['from_address'];
        $from = strip_tags($from);

        // Test Address
        // 424d2d324441723173535a594d47594c5a625834796f70796551746e6e75586b4a79553677
        $colorString = bin2hex($from);
        $color1 = substr($colorString,0,6);
            $color1 = alterBrightness($color1,60);
        $color2 = substr($colorString,6,6);
             $color2 = alterBrightness($color2,60);
        $color3 = substr($colorString,12,6);
             $color3 = alterBrightness($color3,60);
        $color4 = substr($colorString,18,6);
             $color4 = alterBrightness($color4,60);
        $color5 = substr($colorString,24,6);
             $color5 = alterBrightness($color5,60);
        $color6 = substr($colorString,30,6);
             $color6 = alterBrightness($color6,60);
        $color7 = substr($colorString,36,6);
             $color7 = alterBrightness($color7,60);
        $color8 = substr($colorString,42,6);
             $color8 = alterBrightness($color8,60);
        $color9 = substr($colorString,48,6);
             $color9 = alterBrightness($color9,60);
        $color10 = substr($colorString,54,6);
             $color10 = alterBrightness($color10,60);
        $color11 = substr($colorString,60,6);
             $color11 = alterBrightness($color11,60);
        $color12 = substr($colorString,66,6);
             $color12 = alterBrightness($color12,60);
        // echo '<br>Experimental:';
        $colors = '';
        //$colors .= '<span style="font-size:11pt;color:#'.$color1.';">█</span>';
        $colors .= '<span style="font-size:16pt;color:#'.$color2.';">&#9632;</span>';
        $colors .= '<span style="font-size:16pt;color:#'.$color3.';">&#9632;</span>';
        $colors .= '<span style="font-size:16pt;color:#'.$color4.';">&#9632;</span>';
        $colors .= '<span style="font-size:16pt;color:#'.$color5.';">&#9632;</span>';
        $colors .= '<span style="font-size:16pt;color:#'.$color6.';">&#9632;</span>';
        $colors .= '<span style="font-size:16pt;color:#'.$color7.';">&#9632;</span>';
        $colors .= '<span style="font-size:16pt;color:#'.$color8.';">&#9632;</span>';
        $colors .= '<span style="font-size:16pt;color:#'.$color9.';">&#9632;</span>';
        $colors .= '<span style="font-size:16pt;color:#'.$color10.';">&#9632;</span>';
        $colors .= '<span style="font-size:16pt;color:#'.$color11.';">&#9632;</span>';
        $colors .= '<span style="font-size:16pt;color:#'.$color12.';">&#9632;</span>';
        // echo '<br>Experimental Color:'.bin2hex($from);

        //Output To Address
        $toaddress = $row['to_address'];
        $toaddress = strip_tags($toaddress);

        if ($toaddress == "BM-2D7yBNF87Msi8M3hZr3eop6Fd1ENPAzPoi")
            {
            $to_tag = '<a href="/chan" class="tiny button disabled round">CHAN</a>';
            }
        else
            {
            $to_tag = '<a href="/chan" class="tiny button secondary round disabled">OLD</a>';
            }


        echo '<table><tr>';
       // echo htmlentities($time);
        echo '<td><div style="margin-top:0em;margin-bottom:-0.5em;">'.$colors.'</div></td>'; 
        echo '<td style="text-align:right;">';
        //echo $to_tag;
        echo '<div style="margin-top:0em;margin-bottom:-0.5em;font-size:10pt;color:#777;">'.$time.'&nbsp;&nbsp;'.$to_tag.'</div></td>';
        

        echo "</tr>\n";

        echo '<tr><td colspan="2">';

        //From Address
        $from_userdetect = $from;
        if ($from_userdetect == "BM-2D7yBNF87Msi8M3hZr3eop6Fd1ENPAzPoi")
            $from_userdetect = "(⊙.⊙(☉_☉)⊙.⊙)";
        else if ($row['username'] != "")
            $from_userdetect = $row['username'];
        else
            $from_userdetect = substr($from_userdetect,0,15)."...";
  
        echo '<a class="from_address" href="/user/?u='.$from.'">'.$from_userdetect.'</a><br>';


        //Output Subject
        $subject = $row['subject'];
        //$subject = utf8_decode($subject);

        $subject = strip_tags($subject);
        $subject = htmlentities($subject,ENT_QUOTES,'UTF-8');

        $subject = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1<a class="hashtag_link" href="/search-hashtag/?h=%23\2">#\2</a>', $subject);

        if ($subject != "") 
            {
            echo '<span class="subject_text">'.$subject.':</span> ';
            }

        
        //Output Tweet
        $tweet = $row['tweet'];
        //$tweet = utf8_decode($tweet);
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

         //parse Bitmessage addresses
        $tweet = preg_replace('/(^|\s)BM-([a-zA-Z0-9]+\w*)/', '\1<a class="parsed_links" target="_blank" href="/bm/?a=BM-\2">BM-(click to show)</a>', $tweet);

        //parse links
        $tweet = preg_replace_callback("#((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#i",
                "link_callback",
                $tweet);

        //parse hashtags
        $tweet = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1<a href="/search-hashtag/?h=%23\2">#\2</a>', $tweet);



        // split the input string on spaces
        //$words = explode(' ', $tweet);
        //$output = array();
        // loop through the list of words, FORCE LINE BREAKS FOR LONG WORDS
        //foreach ($words as $word) 
        //    {
        //    if (strlen($word)>50) 
        //        { 
        //        $output[ ]=substr($word,0,50)."&#8203;".substr($word,50,200); 
        //        }
        //    else
        //        {
        //        $output[]=$word;    
        //        }
        //    }
        //$tweet = implode(' ', $output);


        if ($tweet != "") 
            {
            $tweet = str_replace("+","+<wbr>",$tweet);
            echo '<div class="tweet">'.$tweet.'</div> ';
            }



        
        echo '</td></tr></table>';


        // Separate rows from each other
        //echo "<br><br> \n";
       

    }
mysql_close();
?>