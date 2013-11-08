<?php
/* Template Name: Hashtag Page */

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
    <div id="ajax_space">
    <?php 
    $the_search = mysql_real_escape_string(stripslashes($_GET['search']));
    //Remove hash sign itself
    $the_search = str_replace("#","",$the_search);
    if ($the_search != "")
      $the_hashtag = "#".$the_search;	
    else
     	$the_hashtag = mysql_real_escape_string(stripslashes($_GET['h']));
		  	
    //echo "<br>THEHASHTAG: " . $the_hashtag;
		require_once("_includes/_chirp_hashtag_00.php");
		?>
    </div>
  </div>
  <div class="one column">
  </div>
</div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>

<!--Refresh the page (TEST AJAX)-->

<script type="text/javascript">
    
  $(document).ready(function()
    {
    setInterval(function() 
      {
      //Target the div with id of result
      //and load the content from the specified url
      //and the specified div element into it:
      $('#ajax_space').load('https://bitchirp.org/ajax/?h=<?php echo urlencode($the_hashtag)?>&m=hash');
      },180000);
     });
    
</script>

</body>
</html>