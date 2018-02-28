<?php
/*
Plugin Name: Happy CRM
Plugin URI: https://swapnil.blog/
Description: Simple non-bloated WordPress CRM
Version: 1.0
Author: Swapnil V. Patil
Author URI: http://swapnil.blog/
*/

// register post type for crm post type
if ( ! function_exists('crm_post_type_init') ) {

// Register Custom Post Type
function crm_post_type_init() {

	$labels = array(
		'name'                  => _x( 'Leads', 'Post Type General Name', 'crm' ),
		'singular_name'         => _x( 'Lead', 'Post Type Singular Name', 'crm' ),
		'menu_name'             => __( 'Leads', 'crm' ),
		'name_admin_bar'        => __( 'Lead', 'crm' ),
		'archives'              => __( 'Lead Archives', 'crm' ),
		'attributes'            => __( 'Lead Attributes', 'crm' ),
		'parent_item_colon'     => __( 'Parent Lead:', 'crm' ),
		'all_items'             => __( 'All Lead', 'crm' ),
		'add_new_item'          => __( 'Add New Lead', 'crm' ),
		'add_new'               => __( 'Add New', 'crm' ),
		'new_item'              => __( 'New Lead', 'crm' ),
		'edit_item'             => __( 'Edit Lead', 'crm' ),
		'update_item'           => __( 'UpdateLead', 'crm' ),
		'view_item'             => __( 'View Lead', 'crm' ),
		'view_items'            => __( 'View Lead', 'crm' ),
		'search_items'          => __( 'Search Lead', 'crm' ),
		'not_found'             => __( 'Not found', 'crm' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'crm' ),
		'featured_image'        => __( 'Featured Image', 'crm' ),
		'set_featured_image'    => __( 'Set featured image', 'crm' ),
		'remove_featured_image' => __( 'Remove featured image', 'crm' ),
		'use_featured_image'    => __( 'Use as featured image', 'crm' ),
		'insert_into_item'      => __( 'Insert into Lead', 'crm' ),
		'uploaded_to_this_item' => __( 'Uploaded to this lead', 'crm' ),
		'items_list'            => __( 'Lead list', 'crm' ),
		'items_list_navigation' => __( 'Lead list navigation', 'crm' ),
		'filter_items_list'     => __( 'Filter leads list', 'crm' ),
	);
	$args = array(
		'label'                 => __( 'Lead', 'crm' ),
		'description'           => __( 'Leads custom post type', 'crm' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'comments', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ,'phoneno', 'email'),
		'taxonomies'            => array( 'category', 'post_tag', 'status' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'lead', $args );

}
add_action( 'init', 'crm_post_type_init', 0 );

}
//if ( ! function_exists( 'status' ) ) {
//
//// Register Custom Taxonomy
//function status() {
//
//	$labels = array(
//		'name'                       => _x( 'Status', 'Taxonomy Status', 'crm' ),
//		'singular_name'              => _x( 'Status', 'Taxonomy Status', 'crm' ),
//		'menu_name'                  => __( 'Status', 'crm' ),
//		'all_items'                  => __( 'All Status', 'crm' ),
//		'parent_item'                => __( 'Parent status', 'crm' ),
//		'parent_item_colon'          => __( 'Parent Status:', 'crm' ),
//		'new_item_name'              => __( 'New status Name', 'crm' ),
//		'add_new_item'               => __( 'Add New Status', 'crm' ),
//		'edit_item'                  => __( 'Edit Status', 'crm' ),
//		'update_item'                => __( 'Update Status', 'crm' ),
//		'view_item'                  => __( 'View Status', 'crm' ),
//		'separate_items_with_commas' => __( 'Separate status with commas', 'crm' ),
//		'add_or_remove_items'        => __( 'Add or remove status', 'crm' ),
//		'choose_from_most_used'      => __( 'Choose from the most used', 'crm' ),
//		'popular_items'              => __( 'Popular status', 'crm' ),
//		'search_items'               => __( 'Search status', 'crm' ),
//		'not_found'                  => __( 'Not Found', 'crm' ),
//		'no_terms'                   => __( 'No status', 'crm' ),
//		'items_list'                 => __( 'Status list', 'crm' ),
//		'items_list_navigation'      => __( 'Status list navigation', 'crm' ),
//	);
//	$args = array(
//		'labels'                     => $labels,
//		'hierarchical'               => false,
//		'public'                     => true,
//		'show_ui'                    => true,
//		'show_admin_column'          => true,
//		'show_in_nav_menus'          => true,
//		'show_tagcloud'              => false,
//		'update_count_callback'      => 'update_status_count',
//		'show_in_rest'               => true,
//	);
//	register_taxonomy( 'lead-status', array( 'lead' ), $args );
//
//}
//add_action( 'init', 'status', 0 );
//
//}
function crm_front_end_form() {

	?>
	<form id="crm-front-end-form" name="crm-front-end-form" method="post" action="">

	<p><label for="title">Name</label><br />

	<input type="text" id="title" value="" tabindex="1" size="20" name="title" />

	</p>

	<p><label for="phoneno">Phone no.</label><br />

	<input type="tel" id="phoneno" value="" tabindex="1" size="20" name="phoneno" />

	</p>
	<p><label for="email">Email</label><br />

	<input type="email" id="email" value="" tabindex="1" size="20" name="email" />

	</p>
	<p><label for="description">Your Message</label><br />

	<textarea id="description" tabindex="3" name="description" cols="50" rows="6"></textarea>

	</p>

	<p><?php wp_dropdown_categories( 'show_option_none=Status&tab_index=4&taxonomy=lead-status' ); ?></p>

	<p><label for="post_tags">Post Tags</label>

	<input type="text" value="" tabindex="5" size="16" name="post-tags" id="post-tags" /></p>

	<p align="right"><input type="submit" value="Publish" tabindex="6" id="submit" name="submit" /></p>

	<input type="hidden" name="post-type" id="post-type" value="lead" />

	<input type="hidden" name="action" value="lead" />

	<?php wp_nonce_field( 'leads_action','leads_nonce_field' ); ?>

	</form>
	<?php

	if($_POST){
		crm_save_post_data();
	}

}

add_shortcode('crm','crm_front_end_form');

function crm_save_post_data() {

	if ( empty($_POST) || !wp_verify_nonce($_POST['leads_nonce_field'],'leads_action') )
	{
	   print 'Sorry, your nonce did not verify.';
	   exit;

	}else{

		// Do some minor form validation to make sure there is content
		if (isset ($_POST['title'])) {
			$title =  $_POST['title'];
		} else {
			echo 'Please enter a Name';
			exit;
		}
		if (isset ($_POST['description'])) {
			$description = $_POST['description'];
		} else {
			echo 'Please enter the message';
			exit;
		}

		if(isset($_POST['post_tags'])){
		$tags = $_POST['post_tags'];
		}else{
		$tags = "";
		}

		// Add the content of the form to $post as an array
		$post = array(
			'post_title' => wp_strip_all_tags( $title ),
			'phoneno'=> $phoneno,
			'email'=> $email,
			'post_content' => $description,
			//'post_category' => $_POST['cat'],  // Usable for custom taxonomies too
			//'tags_input' => $tags,
			'post_status' => 'publish',			// Choose: publish, preview, future, etc.
			'post_type' => $_POST['lead']  // Use a custom post type if you want to
		);
		wp_insert_post($post);  // http://codex.wordpress.org/Function_Reference/wp_insert_post

		$location = home_url(); // redirect location, should be login page

        echo "<meta http-equiv='refresh' content='0;url=$location' />"; exit;
        echo crm_save_post_data();
                }
}
?>
