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
  		<table><tr>
  		<td>
  		  <div style="font-size:14pt;color:#222;margin-bottom:0.2em;" class="caps_header">&ldquo;TWEET&rdquo; your Bitmessage to:</div>
        <div style="margin-bottom:0.25em;color:#222;font-size:10pt;font-family: SourceSansProSemiBold,Arial;">&nbsp;&nbsp;BM-2D7yBNF87Msi8M3hZr3eop6Fd1ENPAzPoi&nbsp;&nbsp;<a href="/chan" class="tiny button round">CHAN</a></div>
      	<div style="color:#555;font-size:10pt;font-family: SourceSansProRegular,Arial;">&nbsp;&nbsp;BM-2D8J9EHNhqnghxmtrXwSZecCJQGfaL7EdT&nbsp;&nbsp;&nbsp;<a href="/chan" class="tiny button secondary round disabled">OLD</a></div>
        <!--<br><span style="color:#222">Use the new address for "Chan" Support!</span>-->
      </td>
    	</tr></table>

      <div id="ajax_space">
        <?php require_once("_includes/_chirp_output_00.php"); ?>
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
      $('#ajax_space').load('https://bitchirp.org/ajax/?m=all');
      },180000);
     });
    
</script>

</body>
</html>