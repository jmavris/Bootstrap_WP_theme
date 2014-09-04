<?php

	/* Template Name: Full Width Template */
?>

<?php get_header(); ?>

    <div class="container">
      <div class="row">
     
        <div class="col-md-12">
         <?php if ( have_posts() ) : while (have_posts() ) : the_post(); ?>
      		
     		<div class="page-header">
     			<h1><?php the_title(); ?></h1>
     		</div>
        <?php the_content(); ?>
        <?php endwhile; else: ?>
        
         <div class="page-header">
     			<h1>Oh No!</h1>
     		</div>
     		<p>No content to view!</p>
     	<?php endif; ?>
       </div>
    </div>

<?php get_footer(); ?>