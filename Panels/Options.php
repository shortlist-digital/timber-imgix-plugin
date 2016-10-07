<?php namespace TimberImgixPlugin\Panels;

class Options {
	public function __construct() {
		// var_dump('varp'); exit;
		/** @var \Herbert\Framework\Panel $panel */
		$args = array(
		  /* (string) The title displayed on the options page. Required. */
		  'page_title' => 'Imgix Configuration',
		  'menu_title' => 'Imgix',
		  'menu_slug' => 'imgix-configuration',
		  'capability' => 'manage_options',
		  'position' => false,
		  'parent_slug' => '',
		  'icon_url' => 'dashicons-format-image',
		  'redirect' => true,
		  'post_id' => 'imgix-configuration',
		  'autoload' => false,
		);
		acf_add_options_page($args);
		if( function_exists('acf_add_local_field_group') ):
		acf_add_local_field_group(array (
			'key' => 'group_agreable_imgix_configuration',
			'title' => 'Imgix Configurations',
			'fields' => array (
				array (
					'key' => 'imgix_account_domain',
					'label' => 'Imgix domain',
					'name' => 'imgix_account_domain',
					'type' => 'text',
					'instructions' => 'The account domain',
					'placeholder' => 'e.g. stylist-files.imgix.net',
				),
				array (
					'key' => 'imgix_account_secret_key',
					'label' => 'Imgix secret key',
					'name' => 'imgix_account_secret_key',
					'type' => 'text',
					'instructions' => 'The secret key for signing',
					'placeholder' => 'e.g. y4as98d7fsd87f9s87f6',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'imgix-configuration',
					),
				),
			),
			'menu_order' => 11,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
		));
		endif;

	}
}
