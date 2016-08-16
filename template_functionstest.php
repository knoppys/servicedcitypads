<?php 
/* 
Template Name: functions
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<section>
	
	<div class="container">
			
			<div class="row">
				
				<div class="col-md-12">
					

					<?php $upload_dir = wp_upload_dir(); ?>

					<?php
					
					$sName = get_site_url().'/wp-content/uploads';
					$oDir    = opendir($sName);
					$aDirList = array();

					while($sDir = readdir($oDir)) {
					    if($sDir != '.' && $sDir != '..') {
					        if(is_dir($sName.'/'.$sDir)) {
					            $aDirList[] = $sDir;
					        }
					    }
					}

					closedir($oDir);

					if(!empty($aDirList)) {
					    sort($aDirList);
					    echo "Folders list : <br>";
					    echo "<ul>";
					    foreach($aDirList as $sDir) {
					        echo "<li><a href=\"$sName/$sDir \">$sDir</a></li>";
					    }
					    echo "</ul>";
					}

					?>


				</div>

			</div>

	</div>

</section>


<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
<?php get_footer(); ?>