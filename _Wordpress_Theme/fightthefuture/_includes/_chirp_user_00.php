<?php
//BitChirp.org and FightTheFuture Wordpress Theme with Responsive by "SRMojuze"
//Licensed under GNU GPL V3

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
mysql_select_db($database) or die( "Unable to select database");
//$thingy = "something";

//echo $_POST["action"];
//RESET

$query1 = "SELECT username from users where address = '".$the_user."'";
$query2 = "SELECT id, UNIX_TIMESTAMP(time) as time, from_address, to_address, subject, tweet, username FROM core_00 LEFT JOIN users ON core_00.from_address = users.address WHERE from_address = '".$the_user."' ORDER BY time DESC LIMIT 0,150";

//echo "query is".$query;

//echo '<font size="5"><b>"BitTweet"</b></font><br>';

$results1     = mysql_query($query1);
$results2     = mysql_query($query2);

//The Usernames (if it exists)
if (mysql_num_rows($results1) > 0)
{
$theusername = mysql_result($results1,0,'username');
}

// Test Address
        // 424d2d324441723173535a594d47594c5a625834796f70796551746e6e75586b4a79553677
          $colorString = bin2hex($the_user);
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
        $colors .= '<span style="font-size:22pt;color:#'.$color1.';">&#9632;</span>';
        $colors .= '<span style="font-size:22pt;color:#'.$color2.';">&#9632;</span>';
        $colors .= '<span style="font-size:22pt;color:#'.$color3.';">&#9632;</span><br>';
        $colors .= '<span style="font-size:22pt;color:#'.$color4.';">&#9632;</span>';
        $colors .= '<span style="font-size:22pt;color:#'.$color5.';">&#9632;</span>';
        $colors .= '<span style="font-size:22pt;color:#'.$color6.';">&#9632;</span><br>';
        $colors .= '<span style="font-size:22pt;color:#'.$color7.';">&#9632;</span>';
        $colors .= '<span style="font-size:22pt;color:#'.$color8.';">&#9632;</span>';
        $colors .= '<span style="font-size:22pt;color:#'.$color9.';">&#9632;</span><br>';
        $colors .= '<span style="font-size:22pt;color:#'.$color10.';">&#9632;</span>';
        $colors .= '<span style="font-size:22pt;color:#'.$color11.';">&#9632;</span>';
        $colors .= '<span style="font-size:22pt;color:#'.$color12.';">&#9632;</span>';
        // echo '<br>Experimental Color:'.bin2hex($from);

        $the_user_trimmed = $the_user;

        if ($the_user_trimmed == "BM-2D7yBNF87Msi8M3hZr3eop6Fd1ENPAzPoi")
            {
            $the_user_trimmed_desktop = '<span class="from_address">(⊙.⊙(☉_☉)⊙.⊙)</span><br>BM-2D7yBNF87Msi8M3hZr3eop6Fd1ENPAzPoi';
            $the_user_trimmed_mobile = '(⊙.⊙(☉_☉)⊙.⊙)';
            }
        else if ($theusername != "")
            {
            $the_user_trimmed_desktop = '<span class="from_address">'.$theusername.'</span><br>'.$the_user_trimmed;
            $the_user_trimmed_mobile = $theusername;
            }
        else
            {
            $the_user_trimmed_desktop .= $the_user_trimmed."";   
            $the_user_trimmed_mobile .= substr($the_user_trimmed,0,19)."...";
            }

        
        echo '<table><tr>';
        echo '<td style="width:5%;">'.$colors.'';

        //Desktop
        echo '<td class="hide-for-small" style="">
        <div style="letter-spacing:-0.02em;color:#F2B91D;font-size:13pt;margin-top:0.5em;">'.$the_user_trimmed_desktop.'
        </div></td>';
        //<span style="font-size:11pt;color:white;">BitChirper since...(coming soon)</span>

        //Mobile
       echo '<td class="show-for-small" style="">
       <div style="letter-spacing:-0.02em;color:#F2B91D;font-size:15pt;margin-top:0.25em;">'.$the_user_trimmed_mobile.'
       </div><div style="letter-spacing:-0.02em;color:#555;font-size:8pt;margin-top:0em;">'.$the_user_trimmed.'</div><!--<div style="margin-top:0.5em;font-size:11pt;color:white;">BitChirper since...(coming soon)</div>--></td>';
        //echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:11pt;">BitChirper since...(coming soon)</span>';
        //echo '<div style="margin-top:0em;margin-bottom:0.5em;">BitChirper since...(coming soon)</div>';

        //Close first table
        echo '</tr></table>';
        
    while($row = mysql_fetch_assoc($results2))

    {
        
        //Output Time
        $time = $row['time'];
        $time = strip_tags($time);
        //$time = strtotime($time);

        // $the_time_string1 = $time;
        //$the_time_string2 = time();
        //$time = $time - 36000; //Change to UTC

        $time = humanTiming($time).'';

        //Output From Address
        $from = $row['from_address'];
        $from = strip_tags($from);

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
        //echo '<td><div style="margin-top:0em;margin-bottom:-0.5em;">'.$colors.'</div></td>'; 
        echo '<td>
        <div class="chirp_time_user">'.str_replace(" ", "&nbsp;", $time).'&nbsp;</div></td>';
        echo '<td style="text-align:right;">'.$to_tag.'</td>';
        

        echo "</tr>\n";

        echo '<tr><td colspan="2">';

        //From Address
        //echo '<span style="font-size:11pt;color:#F2B91D;">@'.substr($from,0,12).'...</span><br>';


        //Output Subject
        $subject = $row['subject'];
        //$subject = base64_decode($subject);

        $subject = strip_tags($subject);
        $subject = htmlentities($subject,ENT_QUOTES,'UTF-8');

        $subject = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1<a class="hashtag_link" href="/search-hashtag/?h=%23\2">#\2</a>', $subject);

        if ($subject != "") 
            {
            echo '<span class="subject_text">'.$subject.':</span> ';
            }

        
        //Output Tweet
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

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'S':'');
    }

}

?>