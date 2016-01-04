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
	}

    private function register_person_post_type() {
//        register_taxonomy(
//            'as-group',
//            'as-person',
//            array(
//                'label' => __( 'Group' ),
//                'rewrite' => array( 'slug' => 'group' ),
//            )
//        );
//        //die('1');
//        $labels = array(
//            'name'               => __( 'Persons', 'as-attendance' ),
//            'singular_name'      => __( 'Person', 'as-attendance' ),
//            'menu_name'          => __( 'Persons', 'as-attendance' ),
//            'name_admin_bar'     => __( 'Person', 'as-attendance' ),
//            'add_new'            => __( 'Add New', 'as-attendance' ),
//            'add_new_item'       => __( 'Add New Person', 'as-attendance' ),
//            'new_item'           => __( 'New Person', 'as-attendance' ),
//            'edit_item'          => __( 'Edit Person', 'as-attendance' ),
//            'view_item'          => __( 'View Person', 'as-attendance' ),
//            'all_items'          => __( 'All Persons', 'as-attendance' ),
//            'search_items'       => __( 'Search Persons', 'as-attendance' ),
//            'parent_item_colon'  => __( 'Parent Persons:', 'as-attendance' ),
//            'not_found'          => __( 'No Persons found.', 'as-attendance' ),
//            'not_found_in_trash' => __( 'No Persons found in Trash.', 'as-attendance' )
//        );
//        $supports = array(
//            'title',
//            'thumbnail',
//            'custom-fields',
//        );
//        $args = array(
//            'labels' => $labels,
//            'public' => true,
//            'show_ui' => true,
//            'show_in_menu' => true,
//            //'show_in_menu' => 'as-attendance',
//            //'supports' => $supports,
//            //'register_meta_box_cb' => array($this, 'register_person_metaboxes'),
//            //'taxonomies' => array('as-group')
//        );
//        //var_dump(register_post_type( 'as-person', $args ));die;
//        register_post_type( 'as-person', $args );

    }

//    private function register_person_metaboxes() {
//        add_meta_box(
//            'as-person-info',
//            __('Person data', 'as-attendance'),
//            array($this, 'person_address_metabox_theme'),
//            'as-person',
//            'normal',
//            'default',
//            array('address')
//        );
//    }
//
//    private function person_address_metabox_theme() {
//
//    }

}
