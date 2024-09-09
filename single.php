<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TPG_theme
 */

get_header();
?>
<div class="main-container">
		<?php
		if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
			$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
			?>
			<div class="header-post" style="
				background-image:url(<?php echo $url ?>); background-size: cover; background-repeat: no-repeat; background-position: center;">
		<?php
		} 
		
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			
		<?php endif; ?>
</div>
<div class="container-post">
<div class="row-post">
	<div class="primary">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );


		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
		
		<?php 
		$orig_post = $post;
		global $post;
		$categories = get_the_category($post->ID);
		
		if ($categories) {
		$category_ids = array();
		foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
		$args=array(
			'category__in' => $category_ids,
			'post__not_in' => array($post->ID),
			'posts_per_page'=> 3, // Số bài viết bạn muốn hiển thị ra ngoài.
			'ignore_sticky_posts'=>1
		);
		$my_query = new wp_query( $args );
		
		if( $my_query->have_posts() ) {
			echo '<div id="related_posts"><h3>Bài viết liên quan</h3><ul>';
			while( $my_query->have_posts() ) {
			$my_query->the_post();?>
		
			<!-- 	Get link thumnails	 -->
			<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );?>
		
			
			<li>
				<a class="related-posts-container" href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>" style="
				background-image:url(<?php echo $url ?>); background-size: cover; background-repeat: no-repeat; background-position: center;">

					<div class="related-posts-title">
						<!-- 	Get title	 -->
						<?php the_title(); ?>

						<!-- 	Get category link	 -->
						<?php $category_detail=get_the_category($post->ID);//$post->ID
						foreach($category_detail as $cd){
						?>
						<p class="related-posts-category">
							<?php echo $cd->cat_name; ?>
						</p>
						<?php
						} 
						?>
					</div>
				</a>
			</li>
		<?php
		}
		echo '</ul></div>';}}
		$post = $orig_post;
		wp_reset_query(); ?>
	</div><!-- .primary -->

<?php
get_sidebar();
get_footer();
