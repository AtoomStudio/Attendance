<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://atoomstudio.com
 * @since      1.0.0
 *
 * @package    As_Attendance
 * @subpackage As_Attendance/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    As_Attendance
 * @subpackage As_Attendance/includes
 * @author     Atoom Studio <jcamps@atoomstudio.com>
 */
class As_Attendance {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      As_Attendance_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The url path of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The url path of this plugin.
	 */
	protected $plugin_path;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'as-attendance';
		$this->version = '1.0.0';
		$this->plugin_path = plugin_dir_path( __DIR__ );

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - As_Attendance_Loader. Orchestrates the hooks of the plugin.
	 * - As_Attendance_i18n. Defines internationalization functionality.
	 * - As_Attendance_Admin. Defines all hooks for the admin area.
	 * - As_Attendance_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-as-attendance-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-as-attendance-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-as-attendance-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-as-attendance-public.php';

		$this->loader = new As_Attendance_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the As_Attendance_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new As_Attendance_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
		global $plugin_admin;
		$plugin_admin = new As_Attendance_Admin( $this->get_plugin_name(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
		$this->loader->add_action('admin_menu', $plugin_admin, 'create_attendance_menu');
		$this->loader->add_action('init', $plugin_admin, 'register_group_taxonomy');
		$this->loader->add_action('init', $plugin_admin, 'register_person_custom_post_type', 10);
		$this->loader->add_action('init', $plugin_admin, 'register_registry_custom_post_type', 11);
//		$this->loader->add_action('init', $plugin_admin, 'add_person_caps');
//		$this->loader->add_action('init', $plugin_admin, 'add_registry_caps');
        $this->loader->add_action('admin_menu', $plugin_admin, 'as_remove_custom_fields');
        $this->loader->add_action('months_dropdown_results', $plugin_admin, 'as_remove_date_filter', 10, 2);
		$this->loader->add_action('save_post_as-person', $plugin_admin, 'as_save_person', 10, 3);
		$this->loader->add_action('save_post_as-registry', $plugin_admin, 'as_save_registry', 10, 3);
		$this->loader->add_action('restrict_manage_posts', $plugin_admin, 'person_filters', 10, 1);
		$this->loader->add_action('manage_edit-as-person_columns', $plugin_admin, 'person_columns', 10, 1);
		$this->loader->add_action('manage_edit-as-person_sortable_columns', $plugin_admin, 'person_sortable_columns', 10, 1);
		$this->loader->add_action('manage_as-person_posts_custom_column', $plugin_admin, 'person_columns_column', 10, 2);
		$this->loader->add_action('restrict_manage_posts', $plugin_admin, 'registry_filters', 10, 1);
		$this->loader->add_action('manage_edit-as-registry_columns', $plugin_admin, 'registry_columns', 10, 1);
		$this->loader->add_action('manage_edit-as-registry_sortable_columns', $plugin_admin, 'registry_sortable_columns', 10, 1);
		$this->loader->add_action('manage_as-registry_posts_custom_column', $plugin_admin, 'registry_columns_column', 10, 2);
		$this->loader->add_action('parse_query', $plugin_admin, 'as_filter_admin_results', 10, 1);
//		$this->loader->add_action('map_meta_cap', $plugin_admin, 'person_meta_cap', 10, 4);
//		$this->loader->add_action('map_meta_cap', $plugin_admin, 'registry_meta_cap', 10, 4);

		//$this->loader->add_action('wp_insert_post_data', $plugin_admin, 'as_save_person', 10, 2);
        //$this->loader->add_action('publish_as-person', $plugin_admin, 'as_edit_title_person', 10, 3);

	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new As_Attendance_Public( $this->get_plugin_name(), $this->get_version(), $this->get_plugin_path() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_action( 'single_template', $plugin_public, 'load_frontend_templates' );
		$this->loader->add_shortcode( 'as_persons', $plugin_public, 'shortcode_persons' );
		$this->loader->add_shortcode( 'as_registries', $plugin_public, 'shortcode_registries' );
		$this->loader->add_shortcode( 'as_new_registry', $plugin_public, 'shortcode_new_registry' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieve the path url of the plugin
	 *
	 * @since     1.0.0
	 * @return    string    The path of the plugin.
	 */
	public function get_plugin_path() {
		return $this->plugin_path;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    As_Attendance_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
