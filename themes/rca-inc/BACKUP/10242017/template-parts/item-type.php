<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package RCA_Inc.
 */

global $post;

// Debuggin Post Data
// var_dump($post);
$terms = get_the_terms($post->id, 'expertise');

// Returns this term name
$termName = $terms[0]->name;

// Debugging Term Data
// var_dump($terms);

// Get Template based on the posts term.
switch($termName) {

	case 'White Papers':
		include 'white-paper.php';
	  break;

	case 'Webinars':
		include 'webinars.php';
	  break;

	case 'Published Articles':
	  include 'published-articles.php';
	  break;

	case 'Visual Resources':
	  include 'visual-resources.php';
	  break;

	case 'Case Studies':
	  include 'case-studies.php';
	  break;

	default:
	break;
}
?>
