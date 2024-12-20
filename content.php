<?php
/**
 * @package Illustratr
 */

$format = get_post_format();
?>

<span>

	<?php if ( '' != get_the_post_thumbnail() && '' == $format ) : ?>

		<?php if ( ! is_single() ) : ?>
		<span class="photo-post" link="<?php the_permalink(); ?>" excerpt="<?php the_excerpt();?>" title="<?php the_title(); ?>"  image="<?php the_post_thumbnail_url(); ?>" ></span>		
		<?php endif; ?>
	<?php endif; ?>
	<?php if (is_single() ) : ?>
	<header class="entry-header">
	<?php endif; ?>
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} 
		?>
		<?php if ( is_single() ) : ?>
		<span class="entry-title-location">
		<?php the_excerpt(); ?>
		</span>
		<?php endif; ?>
		
		<!--<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'illustratr' ) );
			if ( 'post' == get_post_type() && $categories_list && illustratr_categorized_blog() ) :
		?>
			<span class="cat-links"><?php echo $categories_list; ?></span>
		<?php endif; ?>

		<?php
			if ( 'jetpack-portfolio' == get_post_type() ) {
				echo get_the_term_list( $post->ID, 'jetpack-portfolio-type', '<span class="portfolio-entry-meta">', _x(', ', 'Used between list items, there is a space after the comma.', 'illustratr' ), '</span>' );
			}
		?>-->
	
	
	<?php if (is_single() ) : ?>
	</header><!-- .entry-header -->
	<?php endif; ?>

	<?php if ( 'jetpack-portfolio' != get_post_type() ) : // Don't display Content for Portfolio ?>
		<?php if ( is_single() ) : // Only display Excerpts for Search ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'illustratr' ) ); ?>
			<?php
				wp_link_pages( array(
					'before'   => '<div class="page-links clear">',
					'after'    => '</div>',
					'pagelink' => '<span class="page-link">%</span>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>
	<?php endif; ?>

	<?php
		$comments_status = false;
		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
			$comments_status = true;
		}
	?>

	<?php if ( is_single() ) : // Don't display entry-meta for Portfolio ?>
		<footer class="entry-meta">
			<?php if ( 'post' == get_post_type() ) : // Hide post meta for pages on Search ?>

				<?php if( has_post_format() ) : ?>
					<span class="entry-format"><a href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'illustratr' ), get_post_format_string( $format ) ) ); ?>"><?php echo get_post_format_string( $format ); ?></a></span>
				<?php endif; ?>

				<?php
					/* translators: used between list items, there is a space after the comma */
					the_tags( sprintf( '<span class="tags-links">%s ', esc_html__( 'Tagged', 'illustratr' ) ), esc_html__( ', ', 'illustratr' ), '</span>' ); ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'illustratr' ), __( '1 Comment', 'illustratr' ), __( '% Comments', 'illustratr' ) ); ?></span>
			<?php endif; ?>

			
		</footer><!-- .entry-meta -->
	<?php endif; ?>
</span><!-- #post-## -->
