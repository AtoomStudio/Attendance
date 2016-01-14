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
     * Info metabox fields for Registry custom post type.
     *
     * @since    1.0.0
     * @access   private
     * @var      object    $version    Info metabox fields for Registry custom post type.
     */
    private $registry_info_fields;

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

        $this->person_info_fields = (object) array(
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
        );
        $this->person_contact_1_fields = (object) array(
            'name' => 'person_contact_1_name',
            'telephone' => 'person_contact_1_telephone',
            'relationship' => 'person_contact_1_relationship',
        );
        $this->person_contact_2_fields = (object) array(
            'name' => 'person_contact_2_name',
            'telephone' => 'person_contact_2_telephone',
            'relationship' => 'person_contact_2_relationship',
        );
        $this->person_additional_fields = (object) array(
            'education_level' => 'person_additional_education_level',
            'profession' => 'person_additional_profession',
            'hobbies' => 'person_additional_hobbies',
            'medical_history' => 'person_additional_medical_history',
            'mother_tongue' => 'person_additional_mother_tongue',
            'workshop_before' => 'person_additional_workshop_before',
            'why_workshop' => 'person_additional_why_workshop',
            'time' => 'person_additional_time',
        );

        $this->registry_info_fields = (object) array(
            'date' => 'registry_info_date',
            'annotation' => 'registry_info_annotation',
        );
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
        wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
        wp_enqueue_style( 'jquery-ui' );
        wp_enqueue_style( 'thickbox' );

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/as-attendance-admin.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker' ), $this->version, false );
        wp_enqueue_script( 'thickbox' );
        wp_enqueue_media();
        if ( in_array(get_post_type(), array('as-person', 'as-registry')) ) {
            wp_dequeue_script( 'autosave' );
        }

	}

    public function create_attendance_menu() {
//        add_menu_page (
//            __( 'Attendance', 'as-attendance' ),
//            __( 'Attendance', 'as-attendance' ),
//            'manage_options',
//            'as-attendance.php',
//            array($this, 'create_admin_page'),
//            'dashicons-id-alt'
//        );
//        add_submenu_page(
//            'as-attendance.php',
//            __('Registries', 'as-attendance'),
//            __('Registries', 'as-attendance'),
//            'manage_options',
//            'edit.php?post_type=as-registry'
//        );
        add_submenu_page(
            'edit.php?post_type=as-registry',
            __('Add registry', 'as-attendance'),
            __('Add registry', 'as-attendance'),
            'manage_options',
            'as-attendance/new-registry.php',
            array($this, 'new_registry_page')
        );
        remove_submenu_page( 'edit.php?post_type=as-registry', 'post-new.php?post_type=as-registry' );
//        add_submenu_page(
//            'as-attendance.php',
//            __('Persons', 'as-attendance'),
//            __('Persons', 'as-attendance'),
//            'manage_options',
//            'edit.php?post_type=as-person'
//        );
//        add_submenu_page(
//            'as-attendance.php',
//            __('Groups', 'as-attendance'),
//            __('Groups', 'as-attendance'),
//            'manage_options',
//            'edit-tags.php?taxonomy=as-group'
//        );

    }

    public function create_admin_page() {
        $groups = get_terms( 'as-group', array('hide_empty'=>false, 'parent' => 0) );
        $this->create_term_list($groups);
        include_once 'partials/as-attendance-admin-display.php';
    }

    public function new_registry_page() {
        $groups = get_terms( 'as-group', array('hide_empty'=>false, 'parent' => 0) );
        $output = $this->create_term_list($groups);
        include_once 'partials/as-attendance-admin-new-registry.php';
    }

    public function person_registries_page() {
        $groups = get_terms( 'as-group', array('hide_empty'=>false, 'parent' => 0) );
        $output = $this->create_term_list($groups);
        include_once 'partials/as-attendance-admin-new-registry.php';
    }

    private function create_term_list($groups, $o = "") {

        $o .= "<ul>";
        foreach($groups as $group) {

            $group_children = get_terms('as-group', array('hide_empty' => false, 'parent' => $group->term_id));
            $o .= "<li><a href='post-new.php?post_type=as-registry&as-group=".$group->term_id."'>" . $group->name . "</a></li>";
            if ($group_children == true) {
                $o = $this->create_term_list($group_children, $o);
            }

        }
        $o .= "</ul>";

        return $o;
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
            'taxonomies' => array('as-group'),
            'menu_icon' => 'dashicons-universal-access'
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
        add_meta_box(
            'as-person-files',
            __('Files', 'as-attendance'),
            array($this, 'person_files_metabox_theme'),
            'as-person',
            'normal',
            'default'
        );
        add_meta_box(
            'as-person-registries',
            __('Registries', 'as-attendance'),
            array($this, 'person_registries_metabox_theme'),
            'as-person',
            'side',
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

    public function person_files_metabox_theme($post) {
        $meta = get_post_custom( $post->ID );

        $files = array();
        for($i=1;$i<=5;$i++) {

            if(isset($meta['person_file_'.$i][0]) && !empty($meta['person_file_'.$i][0])) {
                $file_post = get_post($meta['person_file_'.$i][0]);
                $file_url = get_post_meta($meta['person_file_'.$i][0], '_wp_attached_file', true);

                $file = array(
                    'id' => $file_post->ID,
                    'title' => $file_post->post_title,
                    'url' => $file_url
                );
            } else {
                $file = false;
            }

            $files[$i] = $file;

        }

        include_once 'partials/as-attendance-admin-person-files-meta.php';

    }

    public function person_registries_metabox_theme($post) {

        $args = array(
            'meta_key' => 'registry_attendee_' . $post->ID,
            'post_type' => 'as-registry'
        );

        $registries = new WP_Query( $args );

        if ( $registries->have_posts() ) {
            echo "<ul>";
            foreach ( $registries->posts as $registry ) {

                $reg_meta = get_post_meta($registry->ID, 'registry_attendee_' . $post->ID, true);

                echo "<li>";
                if(isset($reg_meta['present'])&&$reg_meta['present']=="1"){
                    echo "<span class=\"dashicons dashicons-yes\"></span> ";
                } else {
                    echo "<span class=\"dashicons dashicons-no\"></span> ";
                }
                echo "<a href='".get_permalink($registry->ID)."'>".$registry->post_title."</a>";
                if(isset($reg_meta['annotation'])&&!empty($reg_meta['annotation'])): ?>
                    <abbr onclick="alert('<?php echo $reg_meta['annotation'] ?>')" title='<?php echo $reg_meta['annotation'] ?>'><span class="dashicons dashicons-testimonial"></span></abbr>
                    <?php
                endif;
                echo "</li>";

            }
            echo "</ul>";
            echo "<a class='button' href='edit.php?post_type=as-registry&registry_attendee=".$post->post_title."'>".__('See al registries', 'as-attendance')."</a>";
        } else {
            _e('No registries found', 'as-attendance');
        }

        //include_once 'partials/as-attendance-admin-person-additional-meta.php';

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

        //check_admin_referer( basename( __FILE__ ), 'as-person-info' );

        //perform authentication checks
        if (!current_user_can('edit_post', $post_id)) return false;

        //var_dump($_REQUEST);die;
        foreach($this->person_info_fields as $key => $field_name) {
            if ( isset( $_REQUEST[$field_name] ) ) {

                if($field_name == 'person_info_birthdate'){
                    $field_value = implode('/', $_REQUEST[$field_name]);
                } else {
                    $field_value = sanitize_text_field( $_REQUEST[$field_name] );
                }
                update_post_meta( $post_id, $field_name, $field_value );
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

        for($i=1;$i<=5;$i++) {
            if ( isset( $_REQUEST['person_file_'.$i] ) ) {
                update_post_meta( $post_id, 'person_file_'.$i, sanitize_text_field( $_REQUEST['person_file_'.$i] ) );
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

    public function person_filters( $post_type ) {

        if($post_type === "as-person") {

            $tax_slug = 'as-group';

            $tax_obj = get_taxonomy($tax_slug);

            $group = (isset($_REQUEST['as-group']) ? $_REQUEST['as-group'] : 0);
            $contact = (isset($_REQUEST['person_contact_name']) ? $_REQUEST['person_contact_name'] : '');
            $name = (isset($_REQUEST['person_info_name']) ? $_REQUEST['person_info_name'] : '');
            $surname = (isset($_REQUEST['person_info_surname']) ? $_REQUEST['person_info_surname'] : '');

            $groups_dropdown = wp_dropdown_categories(array(
                'show_option_all'   =>  sprintf(__("Show All %s", "as-attendance"), $tax_obj->label),
                'taxonomy'          =>  $tax_slug,
                'name'              =>  'as-group',
                'orderby'           =>  'name',
                'selected'          =>  $group,
                'hierarchical'      =>  true,
                'show_count'        =>  true,
                'hide_empty'        =>  true,
                'value_field'       =>  'slug',
                'echo'              =>  0
            ));

            include 'partials/as-attendance-admin-person-filters.php';
        }
    }

    public function registry_filters( $post_type ) {

        if($post_type === "as-registry") {

            $tax_slug = 'as-group';
            $tax_obj = get_taxonomy($tax_slug);

            $group = (isset($_REQUEST['as-group']) ? $_REQUEST['as-group'] : 0);
            $date = (isset($_REQUEST['registry_info_date']) ? $_REQUEST['registry_info_date'] : '');
            $person = (isset($_REQUEST['registry_attendee']) ? $_REQUEST['registry_attendee'] : '');

            $groups_dropdown = wp_dropdown_categories(array(
                'show_option_all'   =>  sprintf(__("Show All %s", "as-attendance"), $tax_obj->label),
                'taxonomy'          =>  $tax_slug,
                'name'              =>  'as-group',
                'orderby'           =>  'name',
                'selected'          =>  $group,
                'hierarchical'      =>  true,
                'show_count'        =>  true,
                'hide_empty'        =>  true,
                'value_field'       =>  'slug',
                'echo'              =>  0
            ));

            include 'partials/as-attendance-admin-registry-filters.php';

        }
    }

    public function person_columns( $columns ) {

        $columns = array(
            'cb' => '<input type="checkbox" />',
            'surname' => __( 'Surname', 'as-attendance' ),
            'name' => __( 'Name', 'as-attendance' ),
            'taxonomy-as-group' => __( 'Group', 'as-attendance' ),
            'person_contact_1_name' => __( 'Contact 1', 'as-attendance' ),
            'person_contact_2_name' => __( 'Contact 2', 'as-attendance' ),
            'actions' => __( 'Actions' )
        );
        return $columns;
    }

    public function registry_columns( $columns ) {

        $person = (isset($_REQUEST['registry_attendee']) ? $_REQUEST['registry_attendee'] : '');

        $columns = array(
            'cb' => '<input type="checkbox" />',
            'custom_date' => __( 'Date', 'as-attendance' ),
            'taxonomy-as-group' => __( 'Group', 'as-attendance' ),
        );

        if(!empty($person)) {
            $columns['present'] = __( 'Present', 'as-attendance' );
        } else {
            $columns['attendance'] = __( 'Attendance', 'as-attendance' );
        }
        $columns['annotation'] = __( 'Annotation', 'as-attendance' );
        $columns['actions'] = __( 'Actions', 'as-attendance' );
        //var_dump($columns);die;
        return $columns;
    }

    public function person_sortable_columns( $columns ) {
        $columns['surname'] = 'surname';
        $columns['name'] = 'name';
        $columns['taxonomy-as-group'] = 'as-group';

        return $columns;
    }

    public function registry_sortable_columns( $columns ) {

        $columns['name'] = 'name';
        $columns['custom_date'] = 'custom_date';
        $columns['taxonomy-as-group'] = 'as-group';

        return $columns;
    }

    public function person_columns_column( $column, $post_id ) {

        switch( $column ) {

            case 'surname' :

                $surname = get_post_meta( $post_id, 'person_info_surname', true );

                if ( empty( $surname ) )
                    echo '';
                else
                    echo $surname;

                break;

            case 'name' :

                $name = get_post_meta( $post_id, 'person_info_name', true );

                if ( empty( $name ) )
                    echo '';
                else
                    echo $name;

                break;

            case 'person_contact_1_name' :

                $contact = get_post_meta( $post_id, 'person_contact_1_name', true );

                if ( empty( $contact ) )
                    echo '';
                else
                    echo $contact;

                break;

            case 'person_contact_2_name' :

                $contact = get_post_meta( $post_id, 'person_contact_2_name', true );

                if ( empty( $contact ) )
                    echo '';
                else
                    echo $contact;

                break;

            case 'actions' :

                edit_post_link( __('Edit') );
                echo " - ";
                echo "<a href='edit.php?post_type=as-registry&registry_attendee=".get_the_title($post_id)."'>".__('Registries', 'as-attendance')."</a>";
                echo " - ";
                echo "<a href='".get_delete_post_link()."' class='delete'>".__('Delete')."</a>";

                break;

            default :
                break;
        }

    }

    public function registry_columns_column( $column, $post_id ) {

        switch( $column ) {

            case 'custom_date' :

                $date = get_post_meta( $post_id, 'registry_info_date', true );

                if ( empty( $date ) )
                    echo '';
                else {
                    echo $date;
                }
                break;

            case 'attendance' :

                $attendees_ids = get_post_meta( $post_id, 'registry_attendees_ids', true );
                //var_dump($attendees_ids);die;

                if ( empty( $attendees_ids ) )
                    echo '0/0';
                else {
                    $attendees = 0;
                    foreach ($attendees_ids as $id) {
                        $attendee = get_post_meta( $post_id, 'registry_attendee_'.$id, true );
                        if(isset($attendee['present'])&&$attendee['present']=="1"){
                            $attendees++;
                        }
                    }
                    $percent = ($attendees*100)/count($attendees_ids);
                    echo $attendees . '/' . count($attendees_ids) . ' (' . number_format($percent, 2) . '%)';
                }

                break;

            case 'present' :

                $person = get_page_by_title( $_REQUEST['registry_attendee'], 'OBJECT', 'as-person' );
                $meta = get_post_meta( $post_id, 'registry_attendee_'.$person->ID, true );
                //var_dump($meta);
                if ( !isset($meta['present']) && empty( $meta['present'] ) )
                    echo '<span class="dashicons dashicons-no"></span>';
                else {
                    echo '<span class="dashicons dashicons-yes"></span>';
                }

                break;

            case 'annotation' :
                $person = (isset($_REQUEST['registry_attendee']) ? $_REQUEST['registry_attendee'] : '');
                if(!empty($person)) {
                    $person = get_page_by_title( $_REQUEST['registry_attendee'], 'OBJECT', 'as-person' );
                    $meta = get_post_meta( $post_id, 'registry_attendee_'.$person->ID, true );
                    $annotation = (isset($meta['annotation']))?$meta['annotation']:'';
                } else {
                    $annotation = get_post_meta( $post_id, 'registry_info_annotation', true );
                }

                if ( empty( $annotation ) )
                    echo '';
                else
                    echo $annotation;

                break;

            case 'actions' :

                edit_post_link( __('Edit') );
                echo " - ";
                echo "<a href='".get_delete_post_link()."' class='delete'>".__('Delete')."</a>";

                break;

            default :
                break;
        }

    }

    public function as_filter_admin_results( $query ) {
        if(is_admin()) {

            switch ($query->query["post_type"]) {
                case 'as-person':
                    if(isset($_REQUEST['person_contact_name'])&&!empty($_REQUEST['person_contact_name'])) {
                        $query->set( 'meta_query', array(
                            'contact' => array(
                                'relation' => 'OR',
                                array(
                                    'key'     => 'person_contact_1_name',
                                    'value'   => sanitize_text_field($_REQUEST['person_contact_name']),
                                    'compare' => 'LIKE'
                                ),
                                array(
                                    'key'     => 'person_contact_2_name',
                                    'value'   => sanitize_text_field($_REQUEST['person_contact_name']),
                                    'compare' => 'LIKE'
                                )
                            )
                        ) );
                    }

                    $meta_q_name = array();
                    if(isset($_REQUEST['person_info_name'])&&!empty($_REQUEST['person_info_name'])) {
                        $meta_q_name[] = array(
                            'key'     => 'person_info_name',
                            'value'   => sanitize_text_field($_REQUEST['person_info_name']),
                            'compare' => 'LIKE'
                        );
                    }
                    if(isset($_REQUEST['person_info_surname'])&&!empty($_REQUEST['person_info_surname'])) {
                        $meta_q_name[] = array(
                            'key'     => 'person_info_surname',
                            'value'   => sanitize_text_field($_REQUEST['person_info_surname']),
                            'compare' => 'LIKE'
                        );
                    }
                    if(!empty($meta_q_name)){
                        $query->set( 'meta_query', array(
                            'name' => array(
                                'relation' => 'AND',
                                $meta_q_name
                            )
                        ) );
                    }
                    break;
                case 'as-registry':
                    if(isset($_REQUEST['registry_info_date'])&&!empty($_REQUEST['registry_info_date'])) {
                        $query->set( 'meta_query', array(
                            'date' => array(
                                'relation' => 'AND',
                                array(
                                    'key'     => 'registry_info_date',
                                    'value'   => sanitize_text_field($_REQUEST['registry_info_date']),
                                    'compare' => '='
                                ),
                            )
                        ) );
                    }
                    if(isset($_REQUEST['registry_attendee'])&&!empty($_REQUEST['registry_attendee'])) {
                        $person = get_page_by_title( $_REQUEST['registry_attendee'], 'OBJECT', 'as-person' );
                        $query->set( 'meta_query', array(
                            'person' => array(
                                'relation' => 'AND',
                                array(
                                    'key'     => 'registry_attendee_'.$person->ID
                                ),
                            )
                        ) );
                    }
                    break;

                default:
                    break;
            }

        }
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
            //'thumbnail',
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
            'taxonomies' => array('as-group'),
            'menu_icon' => 'dashicons-clipboard'
        );

        register_post_type( 'as-registry', $args );
    }

    public function register_registry_metaboxes() {

        add_meta_box(
            'as-registry-info',
            __('Date and annotations', 'as-attendance'),
            array($this, 'registry_info_metabox_theme'),
            'as-registry',
            'normal',
            'default'
        );

        add_meta_box(
            'as-registry-attendees',
            __('Attendees'),
            //$group->name,
            array($this, 'registry_attendees_metabox_theme'),
            'as-registry',
            'normal',
            'default'
        );

        add_meta_box(
            'as-registry-save',
            __('Save'),
            array($this, 'registry_save_metabox_theme'),
            'as-registry',
            'normal',
            'default'
        );
    }

    /**
     * Retrieve as-group id from URL. Sanitizes and throw error if isn't valid.
     *
     * @param bool $post
     * @return int
     */
    private function get_url_group($post = false) {
        $group_id = 0;

        if ( isset( $_REQUEST['as-group'] ) ) {
            $group_id = (int) sanitize_text_field($_REQUEST['as-group']);
//            if($group_id<1){
//                wp_die( 'Please, select a group before creating a registry.' );
//            }
            return $group_id;
        }

        if($post){
            $group = get_the_terms( $post->ID, 'as-group' );
            return $group[0]->term_id;
        }

        return $group_id;
    }

    /**
     * @param $post
     */
    public function registry_attendees_metabox_theme($post) {

        $attendees_ids = get_post_meta($post->ID, 'registry_attendees_ids', true);

        if(empty($attendees_ids)) {
            $groups = get_the_terms($post->ID, 'as-group');
            $group = $groups[0];
            // WP_Query arguments
            $args = array (
                'post_type'              => array( 'as-person' ),
                'post_status'            => array( 'publish' ),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'as-group',
                        'terms'    => $group->term_id,
                    ),
                ),
                'nopaging'               => true,
                'order'                  => 'ASC',
                'orderby'                => 'title',
            );
        } else {
            $args = array(
                'post_type' => 'as-person',
                'post__in' => $attendees_ids
            );
        }

        // The Query
        $attendees = new WP_Query( $args );
        $attendees_fields = array();
        $attendees_ids = array();
        // The Loop
        if ( $attendees->have_posts() ) {
            while ( $attendees->have_posts() ) {

                $attendees->the_post();
                $at_meta = get_post_meta($post->ID, 'registry_attendee_' . get_the_ID(), true);
                $present = ! isset( $at_meta['present'] ) ? "0" : $at_meta['present'];
                $annotation = ! isset( $at_meta['annotation'] ) ? "" : $at_meta['annotation'];

                $attendees_fields[] = array(
                    'field_name' => 'registry_attendee_' . get_the_ID(),
                    'name' => get_the_title(),
                    'photo' => get_the_post_thumbnail( get_the_ID(), array(90,90) ),
                    'present' => $present,
                    'annotation' => $annotation
                );
                $attendees_ids[] = get_the_ID();
            }
        }

        wp_reset_postdata();

        include_once 'partials/as-attendance-admin-registry-attendees.php';
    }

    public function registry_info_metabox_theme($post) {
        $meta = get_post_custom( $post->ID );
        $annotation = ! isset( $meta['registry_info_annotation'][0] ) ? '' : $meta['registry_info_annotation'][0];
        $date = ! isset( $meta['registry_info_date'][0] ) ? date('d/m/Y') : $meta['registry_info_date'][0];

        include_once 'partials/as-attendance-admin-registry-info.php';
    }

    public function registry_save_metabox_theme($post) {
        submit_button();
        echo "<div class='clear'></div>";
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
    public function as_save_registry($post_id, $post, $update) {

        //check_admin_referer( 'save-registry', 'as-registry-info' );

        //perform authentication checks
        if (!current_user_can('edit_post', $post_id)) return false;

        $group_id = $this->get_url_group($post);
        wp_set_object_terms( $post_id, $group_id, 'as-group' );
        $group = get_term($group_id, 'as-group');

        foreach($this->registry_info_fields as $key => $field_name) {
            if ( isset( $_REQUEST[$field_name] ) ) {
                update_post_meta( $post_id, $field_name, sanitize_text_field( $_REQUEST[$field_name] ) );
            }
        }

        $attendees_ids = array();
        if ( isset( $_REQUEST['registry_attendees_ids'] ) ) {
            $attendees_ids = explode(',', $_REQUEST['registry_attendees_ids']);
            update_post_meta( $post_id, 'registry_attendees_ids', $attendees_ids );
        }

        foreach ($attendees_ids as $aid) {
            if ( isset( $_REQUEST['registry_attendee_'.$aid] ) ) {
                update_post_meta( $post_id, 'registry_attendee_'.$aid, $_REQUEST['registry_attendee_'.$aid] );
            }
        }
        //var_dump($post);die;
        // unhook this function so it doesn't loop infinitely
        global $plugin_admin;
        remove_action('save_post_as-registry', array($plugin_admin, 'as_save_registry'));

        $date = $_REQUEST['registry_info_date'];
        $date_arr = explode('/', $date);
        $post_date = date('Y-m-d H:i:s', strtotime($date_arr[2] . '-' . $date_arr[1] . '-' . $date_arr[0]));

        //Set the post title in format: Date - Group
        $post_title = sanitize_text_field($date) . ' - ' . $group->name;

        $edited_post = array(
            'ID' => $post_id,
            'post_title' => $post_title,
            'post_date' => $post_date,
            'post_date_gmt' => $post_date,
            'post_modified' => $post_date,
            'post_modified_gmt' => $post_date,
            'post_status' => 'publish',
        );

        if ( !in_array( $post->post_status, array( 'draft', 'pending', 'auto-draft' ) ) ) {
            $edited_post['post_name'] = sanitize_title( $post_title );
        }
        wp_update_post( $edited_post );

    }

    public function as_remove_custom_fields() {
        remove_meta_box('postcustom', 'as-person', 'normal');
        remove_meta_box('postcustom', 'as-registry', 'normal');
        remove_meta_box('submitdiv', 'as-registry', 'normal');
        remove_meta_box('as-groupdiv', 'as-registry', 'normal');
    }

    public function as_remove_date_filter( $months, $post_type ) {
        switch ($post_type) {
            case 'as-person':
            case 'as-registry':
                return false;
                break;

            default:
                return $months;
            break;
        }
    }
}
