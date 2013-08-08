<?php
/* Template Name: User Profile Page */

//BitChirp.org and FightTheFuture Wordpress Theme with Responsive by "SRMojuze"
//Licensed under GNU GPL V3

//Document Header
get_header(); 

//Get The User For JQuery Command At Bottom
$the_user = substr(mysql_real_escape_string(stripslashes($_GET['u'])),0,100);
		
?>

<div class="row normal_row">
	<div class="one column">
	</div>
  	<div class="three columns sidebar_thingy" style=""> 
  	   	<?php require_once("_includes/_sidebar_00.php"); ?>
	</div>
  	<div class="seven columns" style="">
		<div id="ajax_space">
  			<?php require_once("_includes/_chirp_user_00.php"); ?>
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
			$('#ajax_space').load('https://bitchirp.org/ajax/?u=<?php echo $the_user?>&m=user');
			},180000);
		 });
		
</script>

<?php
//<script>
//$(window).load(function(){
//$("#featuredContent").orbit({fluid:'16x5'});
//});
//</script> 
?>

</body>
</html>