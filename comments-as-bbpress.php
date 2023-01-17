<?php
/*
Plugin Name: Comments as bbPress
Description: Replaces the comments section of a regular post with a bbPress subforum
*/

function bbp_subforum_replacer_custom_comments_template() {
	global $post;
	// Check if the current post has an associated bbPress subforum
	$subforum_id = get_post_meta( $post->ID, 'bbp_subforum_id', true );
	if ( empty( $subforum_id ) ) {
		$subforum_id = bbp_insert_forum( array(
			'post_title' => $post->post_title,
			'post_content' => $post->post_excerpt,
			'post_status' => 'publish',
		) );
		update_post_meta( $post->ID, 'bbp_subforum_id', $subforum_id );
	}
	add_filter( 'bbp_get_forum_id', function() use ( $subforum_id ) {
		return $subforum_id;
	} );
	$post = get_post( $subforum_id, OBJECT );
	setup_postdata( $post );
	bbp_set_query_name( 'bbp_single_forum' );
	return dirname(__FILE__) . '/templates/custom-comments.php';
}


add_filter( 'comments_template', 'bbp_subforum_replacer_custom_comments_template' );
