<div>
<?php
	while (have_posts()) :
		the_post();
?>
	<div>
		<h1><?php the_title(); ?></h1>
		<p><?php the_content(); ?></p>
	</div>
<?php endwhile; ?>
</div>
