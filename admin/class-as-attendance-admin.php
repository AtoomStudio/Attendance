<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://atoomstudio.com
 * @since      1.0.0
 *
 * @package    As_Attendance
 * @subpackage As_Attendance/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    As_Attendance
 * @subpackage As_Attendance/admin
 * @author     Atoom Studio <jcamps@atoomstudio.com>
 */
class As_Attendance_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Info metabox fields for Person custom post type.
     *
     * @since    1.0.0
     * @access   private
     * @var      object    $version    Info metabox fields for Person custom post type.
     */
    private $person_info_fields;

    /**
     * Contact 1 metabox fields for Person custom post type.
     *
     * @since    1.0.0
     * @access   private
     * @var      object    $version    Contact 1 metabox fields for Person custom post type.
     */
    private $person_contact_1_fields;

    /**
     * Contact 2 metabox fields for Person custom post type.
     *
     * @since    1.0.0
     * @access   private
     * @var      object    $version    Contact 2 metabox fields for Person custom post type.
     */
    private $person_contact_2_fields;


    /**
     * Additional metabox fields for Person custom post type.
     *
     * @since    1.0.0
     * @access   private
     * @var      object    $version    Additional metabox fields for Person custom post type.
     */
    private $person_additional_fields;


    /**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

        $this->person_info_fields = (object) [
            'name' => 'person_info_name',
            'surname' => 'person_info_surname',
            'birthdate' => 'person_info_birthdate',
            'birthplace' => 'person_info_birthplace',
            'address' => 'person_info_address',
            'state' => 'person_info_state',
            'town' => 'person_info_town',
            'zipcode' => 'person_info_zipcode',
            'telephone' => 'person_info_telephone',
            'civilstate' => 'person_info_civilstate',
            'observations' => 'person_info_observations',
        ];
        $this->person_contact_1_fields = (object) [
            'name' => 'person_contact_1_name',
            'telephone' => 'person_contact_1_telephone',
            'relationship' => 'person_contact_1_relationship',
        ];
        $this->person_contact_2_fields = (object) [
            'name' => 'person_contact_2_name',
            'telephone' => 'person_contact_2_telephone',
            'relationship' => 'person_contact_2_relationship',
        ];
        $this->person_additional_fields = (object) [
            'education_level' => 'person_additional_education_level',
            'profession' => 'person_additional_profession',
            'hobbies' => 'person_additional_hobbies',
            'medical_history' => 'person_additional_medical_history',
            'mother_tongue' => 'person_additional_mother_tongue',
            'memory_workshop' => 'person_additional_memory_workshop',
            'workshop_before' => 'person_additional_workshop_before',
            'why_workshop' => 'person_additional_why_workshop',
            'time' => 'person_additional_time',
        ];
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in As_Attendance_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The As_Attendance_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/as-attendance-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in As_Attendance_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The As_Attendance_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/as-attendance-admin.js', array( 'jquery' ), $this->version, false );

	}

    public function create_person_menu() {
        add_menu_page (
            __( 'Attendance', 'as-attendance' ),
            __( 'Attendance', 'as-attendance' ),
            'manage_options',
            'as-attendance/attendance.php',
            array($this, 'create_admin_page')
        );
        add_submenu_page(
            'as-attendance/attendance.php',
            __('Registries', 'as-attendance'),
            __('Registries', 'as-attendance'),
            'manage_options',
            'as-attendance/registries.php',
            array($this, 'create_admin_page')
        );
        add_submenu_page(
            'as-attendance/attendance.php',
            __('Add registry', 'as-attendance'),
            __('Add registry', 'as-attendance'),
            'manage_options',
            'as-attendance/new-registry.php',
            array($this, 'create_admin_page')
        );
        add_submenu_page(
            'as-attendance/attendance.php',
            __('Persons', 'as-attendance'),
            __('Persons', 'as-attendance'),
            'manage_options',
            'edit.php?post_type=as-person'
            //array($this, 'create_admin_page')
        );
        add_submenu_page(
            'as-attendance/attendance.php',
            __('Groups', 'as-attendance'),
            __('Groups', 'as-attendance'),
            'manage_options',
            'as-attendance/groups.php',
            array($this, 'create_admin_page')
        );
    }

    public function create_admin_page() {
        $groups = get_terms( 'as-group', array('hide_empty'=>false, 'parent' => 0) );
        $this->create_term_list($groups);
        include_once 'partials/as-attendance-admin-display.php';
    }

    private function create_term_list($groups) {
    ?>
        <ul>
            <?php foreach($groups as $group): ?>
                <?php $group_children = get_terms( 'as-group', array('hide_empty'=>false, 'parent' => $group->term_id) ); ?>
                <li><?php echo $group->name ?></li>
                <?php if($group_children==true): ?>
                    <?php $this->create_term_list($group_children) ?>
                <?php endif ?>

            <?php endforeach ?>
        </ul>
        <?php
    }

    public function register_group_taxonomy() {
        $labels = array(
            'name'              => __( 'Groups', 'as-attendance' ),
            'singular_name'     => __( 'Group', 'as-attendance' ),
            'search_items'      => __( 'Search Groups', 'as-attendance' ),
            'all_items'         => __( 'All Groups', 'as-attendance' ),
            'parent_item'       => __( 'Parent Group', 'as-attendance' ),
            'parent_item_colon' => __( 'Parent Group:', 'as-attendance' ),
            'edit_item'         => __( 'Edit Group', 'as-attendance' ),
            'update_item'       => __( 'Update Group', 'as-attendance' ),
            'add_new_item'      => __( 'Add New Group', 'as-attendance' ),
            'new_item_name'     => __( 'New Group Name', 'as-attendance' ),
            'menu_name'         => __( 'Group', 'as-attendance' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
        );

        register_taxonomy( 'as-group', array( 'as-person', 'as-registry' ), $args );

    }

    public function register_person_custom_post_type() {

        $labels = array(
            'name'               => __( 'Persons', 'as-attendance' ),
            'singular_name'      => __( 'Person', 'as-attendance' ),
            'menu_name'          => __( 'Persons', 'as-attendance' ),
            'name_admin_bar'     => __( 'Person', 'as-attendance' ),
            'add_new'            => __( 'Add New', 'as-attendance' ),
            'add_new_item'       => __( 'Add New Person', 'as-attendance' ),
            'new_item'           => __( 'New Person', 'as-attendance' ),
            'edit_item'          => __( 'Edit Person', 'as-attendance' ),
            'view_item'          => __( 'View Person', 'as-attendance' ),
            'all_items'          => __( 'All Persons', 'as-attendance' ),
            'search_items'       => __( 'Search Persons', 'as-attendance' ),
            'parent_item_colon'  => __( 'Parent Persons:', 'as-attendance' ),
            'not_found'          => __( 'No Persons found.', 'as-attendance' ),
            'not_found_in_trash' => __( 'No Persons found in Trash.', 'as-attendance' )
        );
        $supports = array(
            //'title',
            'thumbnail',
            'custom-fields',
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            //'show_in_menu' => 'attendance',
            'supports' => $supports,
            'register_meta_box_cb' => array($this, 'register_person_metaboxes'),
            'taxonomies' => array('as-group')
        );

        register_post_type( 'as-person', $args );
    }

    public function register_person_metaboxes() {
        add_meta_box(
            'as-person-info',
            __('Person data', 'as-attendance'),
            array($this, 'person_info_metabox_theme'),
            'as-person',
            'normal',
            'default'
        );
        add_meta_box(
            'as-person-contact-1',
            __('Contact 1', 'as-attendance'),
            array($this, 'person_contact_1_metabox_theme'),
            'as-person',
            'normal',
            'default'
        );
        add_meta_box(
            'as-person-contact-2',
            __('Contact 2', 'as-attendance'),
            array($this, 'person_contact_2_metabox_theme'),
            'as-person',
            'normal',
            'default'
        );
        add_meta_box(
            'as-person-additional',
            __('Additional info', 'as-attendance'),
            array($this, 'person_additional_metabox_theme'),
            'as-person',
            'normal',
            'default'
        );
    }

    public function person_info_metabox_theme($post) {
        $meta = get_post_custom( $post->ID );

        //Create a variable for each info metabox field and assign its value on it or leave it empty
        //Output example: $name = !isset( $meta[$this->person_info_fields->name][0] ) ? '' : $meta[$this->person_info_fields->name][0];
        foreach($this->person_info_fields as $key => $field) {
            ${$key} = !isset( $meta[$field][0] ) ? '' : $meta[$field][0];
        }

        wp_nonce_field( basename( __FILE__ ), 'as-person-info' );
        include_once 'partials/as-attendance-admin-person-info-meta.php';

    }

    public function person_contact_1_metabox_theme($post) {
        $meta = get_post_custom( $post->ID );

        //Create a variable for each contact 1 metabox field and assign its value on it or leave it empty
        //Output example: $name = ! isset( $meta['person_contact_1_name'][0] ) ? '' : $meta['person_contact_1_name'][0];
        foreach($this->person_contact_1_fields as $key => $field) {
            ${$key} = !isset( $meta[$field][0] ) ? '' : $meta[$field][0];
        }

        include_once 'partials/as-attendance-admin-person-contact-1-meta.php';

    }

    public function person_contact_2_metabox_theme($post) {
        $meta = get_post_custom( $post->ID );

        //Create a variable for each contact 2 metabox field and assign its value on it or leave it empty
        //Output example: $name = ! isset( $meta['person_contact_2_name'][0] ) ? '' : $meta['person_contact_2_name'][0];
        foreach($this->person_contact_2_fields as $key => $field) {
            ${$key} = !isset( $meta[$field][0] ) ? '' : $meta[$field][0];
        }

        include_once 'partials/as-attendance-admin-person-contact-2-meta.php';

    }

    public function person_additional_metabox_theme($post) {
        $meta = get_post_custom( $post->ID );

        //Create a variable for each additional metabox field and assign its value on it or leave it empty
        //Output example: $education_level = ! isset( $meta['person_additional_education_level'][0] ) ? '' : $meta['person_additional_education_level'][0];
        foreach($this->person_additional_fields as $key => $field) {
            ${$key} = !isset( $meta[$field][0] ) ? '' : $meta[$field][0];
        }

        include_once 'partials/as-attendance-admin-person-additional-meta.php';

    }

    /**
     * Save post metadata when a post is saved.
     *
     * @param int $post_id The post ID.
     * @param WP_Post $post The post object.
     * @param bool $update Whether this is an existing post being updated or not.
     *
     * @return boolean
     */
    public function as_save_person($post_id, $post, $update) {

        check_admin_referer( basename( __FILE__ ), 'as-person-info' );

        //perform authentication checks
        if (!current_user_can('edit_post', $post_id)) return false;

        foreach($this->person_info_fields as $key => $field_name) {
            if ( isset( $_REQUEST[$field_name] ) ) {
                update_post_meta( $post_id, $field_name, sanitize_text_field( $_REQUEST[$field_name] ) );
            }
        }

        foreach($this->person_contact_1_fields as $key => $field_name) {
            if ( isset( $_REQUEST[$field_name] ) ) {
                update_post_meta( $post_id, $field_name, sanitize_text_field( $_REQUEST[$field_name] ) );
            }
        }

        foreach($this->person_contact_2_fields as $key => $field_name) {
            if ( isset( $_REQUEST[$field_name] ) ) {
                update_post_meta( $post_id, $field_name, sanitize_text_field( $_REQUEST[$field_name] ) );
            }
        }

        foreach($this->person_additional_fields as $key => $field_name) {
            if ( isset( $_REQUEST[$field_name] ) ) {
                update_post_meta( $post_id, $field_name, sanitize_text_field( $_REQUEST[$field_name] ) );
            }
        }

        // unhook this function so it doesn't loop infinitely
        global $plugin_admin;
        remove_action('save_post_as-person', array($plugin_admin, 'as_save_person'));

        //Set the post title in format: Surname, Name
        $post_title = sanitize_text_field($_REQUEST[$this->person_info_fields->surname]) . ', ' . sanitize_text_field($_REQUEST[$this->person_info_fields->name]);

        $edited_post = array(
            'ID' => $post_id,
            'post_title' => $post_title,
        );
        if ( !in_array( $post->post_status, array( 'draft', 'pending', 'auto-draft' ) ) ) {
            $edited_post['post_name'] = sanitize_title( $post_title );
        }
        wp_update_post( $edited_post );

    }

    public function register_registry_custom_post_type() {

        $labels = array(
            'name'               => __( 'Registries', 'as-attendance' ),
            'singular_name'      => __( 'Registry', 'as-attendance' ),
            'menu_name'          => __( 'Registries', 'as-attendance' ),
            'name_admin_bar'     => __( 'Registry', 'as-attendance' ),
            'add_new'            => __( 'Add New', 'as-attendance' ),
            'add_new_item'       => __( 'Add New Registry', 'as-attendance' ),
            'new_item'           => __( 'New Registry', 'as-attendance' ),
            'edit_item'          => __( 'Edit Registry', 'as-attendance' ),
            'view_item'          => __( 'View Registry', 'as-attendance' ),
            'all_items'          => __( 'All Registries', 'as-attendance' ),
            'search_items'       => __( 'Search Registries', 'as-attendance' ),
            'parent_item_colon'  => __( 'Parent Registries:', 'as-attendance' ),
            'not_found'          => __( 'No Registries found.', 'as-attendance' ),
            'not_found_in_trash' => __( 'No Registries found in Trash.', 'as-attendance' )
        );
        $supports = array(
            //'title',
            'thumbnail',
            'custom-fields',
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            //'show_in_menu' => 'edit.php?post_type=as-person',
            'supports' => $supports,
            'register_meta_box_cb' => array($this, 'register_registry_metaboxes'),
            'taxonomies' => array('as-group')
        );

        register_post_type( 'as-registry', $args );
    }

    public function register_registry_metaboxes() {
        add_meta_box(
            'as-registry-annotation',
            __('Annotation', 'as-attendance'),
            array($this, 'registry_annotation_metabox_theme'),
            'as-registry',
            'normal',
            'default'
        );
    }

    public function registry_annotation_metabox_theme($post) {
        $meta = get_post_custom( $post->ID );
        $annotation = ! isset( $meta['registry_annotation'][0] ) ? '' : $meta['registry_annotation'][0];

        wp_nonce_field( basename( __FILE__ ), 'as-registry-annotation' );

        include_once 'partials/as-attendance-admin-registry-annotation.php';
    }

    public function as_remove_custom_fields() {
        remove_meta_box('postcustom', 'as-registry', 'normal');
        remove_meta_box('postcustom', 'as-person', 'normal');
    }
}
