<!-- Check this for image control -->

<div class="blog-post">
	<h2 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<p class="blog-post-meta blog-date"><?php the_date(); ?> / 
	<a href="#"><?php the_author(); ?></a>
	<a href="<?php comments_link(); ?>">
		<?php
		printf( _nx( '1 Kommentar', '%1$s Kommentarer', get_comments_number(), 'comments title', 'textdomain' ), number_format_i18n( 						get_comments_number() ) ); ?>
	</a>
	</p>


	<div class="blog-post-content">
		<?php the_content(); ?>
	</div>

</div><!-- /.blog-post -->