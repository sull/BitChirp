<?php
/* Template Name: Bitmessage Address Shortening Page */

//BitChirp.org and FightTheFuture Wordpress Theme with Responsive by "SRMojuze"
//Licensed under GNU GPL V3

//Document Header
get_header(); 
?>

<div class="row normal_row">
	<div class="one column">
  </div>
  <div class="three columns sidebar_thingy" style=""> 
    <?php require_once("_includes/_sidebar_00.php"); ?>
  </div>
  <div class="seven columns">
    <table><tr>
  	<td>
  	   <strong><span class="caps_header">Bitmessage Address</span></strong>
		</td>
		</tr></table>

		<table><tr>
  		<td>
  			You can copy the Bitmessage Address here:<br>
  			<?php
  			$the_address = mysql_real_escape_string(stripslashes($_GET['a']));
  			$the_address = substr($the_address,0,50);
        if ($the_address == "addresses")
          {
          $the_address = "(The Bitmessage Address)"; 
          }
  			echo $the_address;
  			?>

		</td>
		</tr></table>
	</div>

  <div class="one column">
 	</div>

</div>

<?php //get_sidebar(); ?>
<?php require_once("footer2.php"); ?>