<?php
//BitChirp.org and FightTheFuture Wordpress Theme with Responsive by "SRMojuze"
//Licensed under GNU GPL V3
?>
<!DOCTYPE html>

<?php 
//DISABLED FOR NOW
//<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
//<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]            -->
//<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]          -->

//This "boosts" the colour of the colour box "avatar"
function alterBrightness($color, $amount) 
	{
	// convert color to decimal value
    $rgb = hexdec($color); 
    //extract color values:
    $red = $rgb >> 16;
    $green = ($rgb >> 8) & 0xFF;
    $blue = $rgb & 0xFF;
    //manipulate and convert back to hexadecimal
    return dechex(($red + $amount) << 16 | ($green + $amount) << 8 | ($blue + $amount));
	}
?>

<!--START: Head Section-->
<head>
<meta charset="utf-8" />

<!--Set the refresh-->
<META HTTP-EQUIV="REFRESH" CONTENT="600">

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width" />

<title>BitChirp // Secure, Anonymous Social Media Based On BitMessage</title>

<!-- Included CSS Files (Uncompressed) -->
<link rel="stylesheet" href="/wp-content/themes/fightthefuture/_foundation_css/foundation.css">

<!-- Theme CSS -->
<link rel="stylesheet" href="/wp-content/themes/fightthefuture/style.css">

<!--MARK MIZU 00 :: THIS SHOULD BE CHANGED AS IT IS NOT "FOUNDATION" PER SE-->
<link rel="stylesheet" href="/wp-content/themes/fightthefuture/_foundation_css/app.css">

<script src="/wp-content/themes/fightthefuture/_foundation_js/modernizr.foundation.js"></script>

<!--JQUERY
<script src="/wp-content/themes/fightthefuture/_jquery_js/jquery-1.10.2.min.js"></script>
-->

<!-- Font CSS -->
<link rel="stylesheet" href="/wp-content/themes/fightthefuture/_fonts/open-sans-fontfacekit/stylesheet.css" type="text/css" charset="utf-8">
<link rel="stylesheet" href="/wp-content/themes/fightthefuture/_fonts/source-sans-pro-fontfacekit/stylesheet.css" type="text/css" charset="utf-8">

</head>
<!--END: Head Section-->

<!--START: Body Section-->
<body>

<div class="row header_bg">
	<div class="one column">
	</div>
	
	<div class="three columns hide-for-small" style="text-align:center;">
		<br><a href="/"><img style="max-width:100%; margin-left:0em;margin-top:1em;margin-bottom:1.5em;" src="/wp-content/themes/fightthefuture/_images/logo_01.png"></a>
	</div>
	
	<div class="three columns show-for-small" style="text-align:center;">
		<br><a href="/"><img style="max-width:100%; margin-left:-0.5em;margin-top:1em;margin-bottom:-6em;" src="/wp-content/themes/fightthefuture/_images/logo_00_mobile.png"></a>
	</div>

	<div class="seven columns" >
		<?php require_once("_includes/navigation.php"); ?>
	</div>

	<div class="one column">
	</div>
</div>