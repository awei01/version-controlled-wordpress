<html>
	<head>
		<title>Version Controlled Wordpress</title>
	</head>
	<body>
	<?php
		while (have_posts()) :
			the_post();
	?>
		<div class="post">
			<h1 class="post-title"><?php the_title(); ?></h1>
			<p class="post-content">
				<?php the_content(); ?>
			</p>
		</div>
	<?php endwhile; ?>
	</body>
</html>
