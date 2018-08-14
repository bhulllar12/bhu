<?php
 /**
 * Template Name: Artical
 */
	get_header();
	
	$user = wp_get_current_user();
    echo $user->ID;
	$id = $_GET['id'];
    	
	
	$query = new WP_Query( array(
    'author'        => get_current_user_id(),
    'post_status'   => 'draft'
) );
	
	global $current_user;
	wp_get_current_user();
	$categories = get_terms( array( 'taxonomy' => 'listing-category' ) );
	$args = array( 
		   'post_type' => 'dealer-listing',
		   'posts_per_page' => '-1',
			'author' => $current_user->ID
			
		);
		$the_query = new WP_Query($args);
		if ( $the_query->have_posts() ) :
			while ( $the_query->have_posts() ) : $the_query->the_post();
			$imgLink = wp_get_attachment_url( get_post_thumbnail_id() );
			$category->term_id
?>
		<div class="container">
	<div class="row">
		<div class="col-md-12">
            <h3 class="text-center dealer"><li id="text-5" class="widget widget_text"><h2 class="widgettitle"></h2>
			</li></h3>				
		<div>
		<img class="articalimg" src="<?php echo $imgLink;?>">
		<h4 class="audi"><b><a href="<?php echo get_the_permalink();?>"><?php echo get_the_title()?></a></b></h4>
		<?php
				
		echo $category->name;
		?>
					
		</div>
		</div>
		</div>
		</div>
						


<?php	 				
	endwhile;
	wp_reset_postdata();
	endif;
	get_footer();
?>