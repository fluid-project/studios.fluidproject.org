<?php

/**********************************
 *  Wordpress Supports
 **********************************/

add_theme_support('post-thumbnails');


/**********************************
 *  Studios Constants
 **********************************/

// Max num of chars in tag list on summary pages
if ( ! defined("FL_MAX_CHARS_IN_TAGS_SUMMARY") ) define("FL_MAX_CHARS_IN_TAGS_SUMMARY", 50);


/**********************************
 *  Studios Functions
 ***********************************/

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
		$html = '<div class="fs-tags post_tags">';
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