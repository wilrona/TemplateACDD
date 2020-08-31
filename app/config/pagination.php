<?php
/**
 * Created by IntelliJ IDEA.
 * User: NDI RONALD STEVE
 * Date: 07/03/2018
 * Time: 05:26
 */

function kriesi_pagination($pages = '', $range = 4)
{
	$showitems = ($range * 2) + 1;

	global $paged;
	if (empty($paged)) $paged = 1;

	if ($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if (!$pages) {
			$pages = 1;
		}
	}

	if (1 != $pages) {
		echo "<ul class=\"post-navigation\">";
		if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<li class='previous'><a href='" . get_pagenum_link(1) . "'><i class='ei ei-arrow_carrot-left'></i></a></li>";
		if ($paged > 1 && $showitems < $pages) echo "<li class='previous'><a href='" . get_pagenum_link($paged - 1) . "'><i class='ei ei-arrow_carrot-left'></i></a></li>";

		for ($i = 1; $i <= $pages; $i++) {
			if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
				echo ($paged == $i) ? "<li class=\"active\">" . $i . "</li>" : "<li><a href='" . get_pagenum_link($i) . "' >" . $i . "</a></li>";
			}
		}

		if ($paged < $pages && $showitems < $pages) echo "<li class='next'><a href='" . get_pagenum_link($paged + 1) . "'><i class='ei ei-arrow_carrot-right'></i></a></li>";
		if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo "<li class='next'><a href='" . get_pagenum_link($pages) . "'><i class='ei ei-arrow_carrot-right'></i></a></li>";
		echo "</ul>\n";
	}
}
