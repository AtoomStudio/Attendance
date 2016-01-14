<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://atoomstudio.com
 * @since      1.0.0
 *
 * @package    As_Attendance
 * @subpackage As_Attendance/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-specific stylesheet and JavaScript.
 *
 * @package    As_Attendance
 * @subpackage As_Attendance/public
 * @author     Atoom Studio <jcamps@atoomstudio.com>
 */
class As_Attendance_Public {

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
	 * The path of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_path    The path of this plugin.
	 */
	private $plugin_path;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 * @param      string    $plugin_path       The path of the plugin.
	 */
	public function __construct( $plugin_name, $version, $plugin_path ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->plugin_path = $plugin_path;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/as-attendance-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/as-attendance-public.js', array( 'jquery' ), $this->version, false );

	}

	public function load_person_template($template) {
		global $post;

		if ($post->post_type == "as-person"){
			$template_name = 'templates/single-as-person.php';
			if($template === get_stylesheet_directory() . $template_name
				|| !file_exists($this->plugin_path . $template_name)) {
				return $template;
			}

			return $this->plugin_path . $template_name;
		}

	}
}
