<?php

/**********************************
 *  Studios Constants
 **********************************/

// Max num of chars in tag list on summary pages
if ( ! defined("FL_MAX_CHARS_IN_TAGS_SUMMARY") ) define("FL_MAX_CHARS_IN_TAGS_SUMMARY", 50);

// The number of characters for content excerpt on the index page 
if ( ! defined("FL_MAX_WORDS_IN_EXCERPT") ) define("FL_MAX_WORDS_IN_EXCERPT", 20);

// The maximum number of characters in the "new post" page, "title" field
if ( ! defined("FL_MAX_CHARS_IN_TITLE") ) define("FL_MAX_CHARS_IN_TITLE", 80);

// The size of the featured image on the index page
if ( ! defined("FL_THUMBNAIL_WIDTH") ) define("FL_THUMBNAIL_WIDTH", 240);
if ( ! defined("FL_THUMBNAIL_HEIGHT") ) define("FL_THUMBNAIL_HEIGHT", 160);



/**********************************
 *  Configure thumbnails
 **********************************/
 
add_theme_support('post-thumbnails');
set_post_thumbnail_size( FL_THUMBNAIL_WIDTH, FL_THUMBNAIL_HEIGHT, true );



/**********************************
 *  Studios Functions
 ***********************************/

// Customize the excerpt length
function fl_excerpt_length($length) {
	return FL_MAX_WORDS_IN_EXCERPT;
}
add_filter('excerpt_length', 'fl_excerpt_length');

// Customized the excerpt "more" 
function fl_excerpt_more($more) {
	global $post;
	return '&nbsp;<a href="'. get_permalink($post->ID) . '" rel="bookmark" title="Continue reading ' . the_title('', '', false) . '">(...more)</a>';
}
add_filter('excerpt_more', 'fl_excerpt_more');

// TODO: the admin footer is being concatenated with the FSSFive admin footer. We might want to try to override it completely.
function fl_admin_footer() {
	echo 'Fluid Studios is a child theme of FSSFive.   ';
} 
add_filter('admin_footer_text', 'fl_admin_footer');

// Build an HTML link for a tag
function fl_tag_link($aTag) {
	$tag_link = get_tag_link($aTag->term_id);
	$html .= "<a rel='tag' href='{$tag_link}' title='{$aTag->name} Tag' class='{$aTag->slug}'>";
	$html .= "{$aTag->name}</a>";
	return $html;
}

// Build a list of post tags limited to a maximum character length.
// The Studios theme uses this instead of the_tags on pages that require
// a shortened list of tags
function fl_tags_summary($tagList) {
	$html = '';
	if ($tagList) {
		$html = '<div class="fls-tags post_tags">';
		// always display at least the first tag
		$firsttag = array_shift($tagList);
		$html .= fl_tag_link($firsttag);
		$display = "{$firsttag->name}";
		foreach($tagList as $tag) {
			$newlen = strlen($display) + strlen($tag->name);
			// only add next tag if it fits within the limit
			if ($newlen < FL_MAX_CHARS_IN_TAGS_SUMMARY) {
				$display .= ", {$tag->name}";
				$html .= ", ".fl_tag_link($tag);
			} else {
			// if there are undisplay tags, show ellipses
				$html .= "...";
				break;
			}
		}
		
		$html .= '</div>';
	}
	return $html;
}


?>