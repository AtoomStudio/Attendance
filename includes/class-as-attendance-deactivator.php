<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://atoomstudio.com
 * @since      1.0.0
 *
 * @package    As_Attendance
 * @subpackage As_Attendance/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    As_Attendance
 * @subpackage As_Attendance/includes
 * @author     Atoom Studio <jcamps@atoomstudio.com>
 */
class As_Attendance_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		//self::remove_roles();
	}

	private static function remove_roles() {
		remove_role( 'attendance_admin' );
		remove_role( 'attendance_collaborator' );
	}

}
