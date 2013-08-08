<?php
//BitChirp.org and FightTheFuture Wordpress Theme with Responsive by "SRMojuze"
//Licensed under GNU GPL V3

get_header(); 
?>

<div class="row normal_row">
	<div class="one column">
	</div>
  	<div class="three columns sidebar_thingy" style=""> 
      <?php require_once("_includes/_sidebar_00.php"); ?>	
  	</div>
  	<div class="seven columns" style="">
  		<table><tr>
  		<td style="color:#333;">
  			<?php while ( have_posts() ) : the_post(); ?>  
			<strong><span class="caps_header"><?php the_title(); ?></span></strong><br><br>
			<div class="page_text"><?php the_content() ?></div>
			<?php endwhile; ?>  
		</td>
		</tr></table>
  		<?php //require_once("_includes/_chirp_output_00.php"); ?>
	</div>
	<div class="one column">
	</div>
</div>

<?php //require_once("_includes/navigation.php"); ?>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>