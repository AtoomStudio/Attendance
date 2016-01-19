<?php

/**
 * Fired during plugin activation
 *
 * @link       http://atoomstudio.com
 * @since      1.0.0
 *
 * @package    As_Attendance
 * @subpackage As_Attendance/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    As_Attendance
 * @subpackage As_Attendance/includes
 * @author     Atoom Studio <jcamps@atoomstudio.com>
 */
class As_Attendance_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		//self::create_roles();
	}

	private function create_roles() {
		$result = add_role(
			'attendance_admin',
			__( 'Attendance administrator' ),
			array(
				"activate_plugins" => false,
				"delete_others_pages" => false,
				"delete_others_posts" => false,
				"delete_pages" => false,
				"delete_posts" => false,
				"delete_as-persons" => true,
				"delete_as-person" => true,
				"delete_as-registries" => true,
				"delete_published_as-persons" => true,
				"delete_published_as-registries" => true,
				"delete_others_as-persons" => true,
				"delete_others_as-registries" => true,
				"delete_private_pages" => false,
				"delete_private_posts" => false,
				"delete_published_pages" => false,
				"delete_published_posts" => false,
				"edit_dashboard" => false,
				"edit_others_pages" => false,
				"edit_others_posts" => true,
				"edit_pages" => false,
				"edit_posts" => true,
				"edit_as-persons" => true,
				"edit_as-registries" => true,
				"edit_others_as-persons" => true,
				"edit_others_as-registries" => true,
				"edit_private_pages" => false,
				"edit_private_posts" => false,
				"edit_published_pages" => false,
				"edit_published_posts" => true,
				"edit_theme_options" => false,
				"export" => false,
				"import" => false,
				"list_users" => false,
				"manage_categories" => false,
				"manage_links" => false,
				"manage_options" => false,
				"moderate_comments" => false,
				"promote_users" => false,
				"publish_pages" => false,
				"publish_posts" => true,
				"publish_as-persons" => true,
				"publish_as-registries" => true,
				"read_private_pages" => false,
				"read_private_posts" => false,
				"read" => true,
				"remove_users" => false,
				"switch_themes" => false,
				"upload_files" => true,
			)
		);

		$result = add_role(
			'attendance_collaborator',
			__( 'Attendance collaborator' ),
			array(
				"activate_plugins" => false,
				"delete_others_pages" => false,
				"delete_others_posts" => false,
				"delete_pages" => false,
				"delete_posts" => false,
				"delete_as-persons" => false,
				"delete_as-person" => false,
				"delete_as-registries" => false,
				"delete_published_as-persons" => false,
				"delete_published_as-registries" => false,
				"delete_others_as-persons" => false,
				"delete_others_as-registries" => false,
				"delete_private_pages" => false,
				"delete_private_posts" => false,
				"delete_published_pages" => false,
				"delete_published_posts" => false,
				"edit_dashboard" => false,
				"edit_others_pages" => false,
				"edit_others_posts" => false,
				"edit_pages" => false,
				"edit_posts" => false,
				"edit_as-persons" => false,
				"edit_as-registries" => true,
				"edit_others_as-persons" => false,
				"edit_others_as-registries" => true,
				"edit_private_pages" => false,
				"edit_private_posts" => false,
				"edit_published_pages" => false,
				"edit_published_posts" => false,
				"edit_theme_options" => false,
				"export" => false,
				"import" => false,
				"list_users" => false,
				"manage_categories" => false,
				"manage_links" => false,
				"manage_options" => false,
				"moderate_comments" => false,
				"promote_users" => false,
				"publish_pages" => false,
				"publish_posts" => false,
				"publish_as-persons" => false,
				"publish_as-registries" => true,
				"read_private_pages" => false,
				"read_private_posts" => false,
				"read" => true,
				"remove_users" => false,
				"switch_themes" => false,
				"upload_files" => false,
			)
		);

	}

}
