<?php
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
  	<div class="seven columns" style="">
  		<?php while ( have_posts() ) : the_post(); ?>
  			<table><tr>
  				<td style="color:#333;"> 
				<span style="font-size:15pt"><?php the_title(); ?></span><br>
				<?php the_date(); ?><br><br>
				<div class="page_text"><?php the_content() ?></div>
				</td>
			</tr></table>
		<?php endwhile; ?>  
		<?php //require_once("_includes/_chirp_output_00.php"); ?>
	</div>
	<div class="one column">
	</div>
</div>

<?php //require_once("_includes/navigation.php"); ?>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>