<?php
$featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail');
$gt3_theme_pagebuilder = gt3_get_theme_pagebuilder(get_the_ID());

if(get_the_category()) $categories = get_the_category();
$post_categ = '';
$separator = ', ';
if ($categories) {
    foreach($categories as $category) {
        $post_categ = $post_categ .'<a href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>'.$separator;
    }
}

if(get_the_tags() !== '') {
    $posttags = get_the_tags();

}
if ($posttags) {
    $post_tags = '';
    $post_tags_compile = '<span class="preview_meta_tags">tags:';
    foreach($posttags as $tag) {
        $post_tags = $post_tags . '<a href="?tag='.$tag->slug.'">'.$tag->name .'</a>'. ', ';
    }
    $post_tags_compile .= ' '.trim($post_tags, ', ').'</span>';
} else {
    $post_tags_compile = '';
}
	if (!isset($pf)) {
		$compile = '';
	}

	$compile .= '
	<div class="blog_post_preview">';
	if (strlen($featured_image[0]) > 0) {
		$compile .= '<div class="featured_image_full wrapped_img blog_post_image"><img src="'. aq_resize($featured_image[0], "1170", "445", true, true, true) .'" /></div>';
	}
	// Top Elements
	$compile .= '<div class="blog_content">
					<section class="box_date">
						<span class="box_month">'. get_the_time("M") .'</span>
						<span class="box_day">'. get_the_time("d") .'</span>
					</section>
					<h3 class="blogpost_title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>
					<section class="listing_meta">
						<span>'. __('by', 'theme_localization') .' <a href="'.get_author_posts_url( get_the_author_meta('ID')).'">'.get_the_author_meta('display_name').'</a></span>									
						<span>'. __('in', 'theme_localization') .' '.trim($post_categ, ', ').'</span>
						<span><a href="' . get_comments_link() . '">'. get_comments_number(get_the_ID()) .' '. __('comments', 'theme_localization') .'</a></span>
						'.$post_tags_compile.'
					</section >';		
		//Featured Image
		$compile .= '<article class="contentarea">
						' . ((strlen(get_the_excerpt()) > 0) ? get_the_excerpt() : get_the_content())   . '
					</article>
				</div>
	</div><!--.blog_post_preview -->';
	
	echo $compile;

?>