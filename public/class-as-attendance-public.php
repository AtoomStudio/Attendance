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
		wp_register_style('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
		wp_enqueue_style( 'jquery-ui' );

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/as-attendance-public.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker' ), $this->version, false );

	}

	public function shortcode_persons() {

		$page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$args = array (
			'post_type'              => array( 'as-person' ),
			'post_status'            => array( 'publish' ),
			'posts_per_page'         => '20',
			'order'                  => 'ASC',
			'orderby'                => 'title',
			'cache_results'          => true,
			'paged'                  => $page
		);


		if(isset($_REQUEST['as-group'])&&!empty($_REQUEST['as-group'])) {
			$group_id = $_REQUEST['as-group'];
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'as-group',
					'terms'    => $group_id,
				),
			);
		}

		$dropdown_args = array(
			'orderby'                => 'name',
			'order'                  => 'ASC',
			'hide_empty'             => true,
			'hierarchical'           => true,
			'show_count'             => 1,
			'taxonomy'				=> 'as-group',
			'echo'					=> 0,
			'name'					=> 'as-group',
			'selected' 				=> $group_id,
			'show_option_all'   =>  __("Show All", "as-attendance"),
		);

		$group_select = wp_dropdown_categories( $dropdown_args );

		if(isset($_REQUEST['person_contact_name'])&&!empty($_REQUEST['person_contact_name'])) {
			$contact = sanitize_text_field($_REQUEST['person_contact_name']);
			$args['meta_query'] = array(
				'contact' => array(
					'relation' => 'OR',
					array(
						'key'     => 'person_contact_1_name',
						'value'   => $contact,
						'compare' => 'LIKE'
					),
					array(
						'key'     => 'person_contact_2_name',
						'value'   => $contact,
						'compare' => 'LIKE'
					)
				)
			);
		}

		$meta_q_name = array();
		if(isset($_REQUEST['person_info_name'])&&!empty($_REQUEST['person_info_name'])) {
			$name = sanitize_text_field($_REQUEST['person_info_name']);
			$meta_q_name[] = array(
				'key'     => 'person_info_name',
				'value'   => $name,
				'compare' => 'LIKE'
			);
		}
		if(isset($_REQUEST['person_info_surname'])&&!empty($_REQUEST['person_info_surname'])) {
			$surname = sanitize_text_field($_REQUEST['person_info_surname']);
			$meta_q_name[] = array(
				'key'     => 'person_info_surname',
				'value'   => $surname,
				'compare' => 'LIKE'
			);
		}
		if(!empty($meta_q_name)){
			$args['meta_query'] = array(
				'name' => array(
					'relation' => 'AND',
					$meta_q_name
				)
			);
		}



		$query = new WP_Query( $args );

		global $wp_query;
		$temp_query = $wp_query;
		$wp_query   = NULL;
		$wp_query   = $query;

		$persons = array();
		if ( $wp_query->have_posts() ) {
			$pagination = get_the_posts_pagination( array(
				'mid_size'  => 2,
				'prev_text' => __( 'Back', 'as-attendance' ),
				'next_text' => __( 'Onward', 'as-attendance' ),
			) );

			while ( $wp_query->have_posts() ) {
				$wp_query->the_post();

				$groups = wp_get_object_terms( get_the_ID(), 'as-group' );
				$meta = get_post_custom( get_the_ID() );

				$persons[] = array(
					'ID' => get_the_ID(),
					'title' => get_the_title(),
					'groups' => $groups,
					'meta' => $meta,
					'link' => get_the_permalink()
				);
			}

		}

		$wp_query = NULL;
		$wp_query = $temp_query;

		wp_reset_postdata();

        require plugin_dir_path( __FILE__ ) . '../templates/list-persons.php';

	}

	public function load_frontend_templates($template) {
		global $post;

		switch ($post->post_type) {
			case "as-person":
			case "as-registry":
				$template_name = 'templates/single-'.$post->post_type.'.php';
				if($template === get_stylesheet_directory() . $template_name
					|| !file_exists($this->plugin_path . $template_name)) {
					return $template;
				}
				return $this->plugin_path . $template_name;
				break;
			default:
				return $template;
				break;

		}



	}

	public function shortcode_registries() {

		$form_action = get_permalink();
		$page = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

		$args = array (
			'post_type'              => array( 'as-registry' ),
			'post_status'            => array( 'publish' ),
			'posts_per_page'         => '20',
			'order'                  => 'DESC',
			'orderby'                => 'date',
			'cache_results'          => true,
			'paged'                  => $page
		);

		if(isset($_REQUEST['as-group'])&&!empty($_REQUEST['as-group'])) {
			$group_id = $_REQUEST['as-group'];
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'as-group',
					'terms'    => $group_id,
				),
			);
		}

		$group_args = array(
			'orderby'                => 'name',
			'order'                  => 'ASC',
			'hide_empty'             => true,
			'hierarchical'           => true,
			'show_count'             => 1,
			'taxonomy'				=> 'as-group',
			'echo'					=> 0,
			'name'					=> 'as-group',
			'selected'				=> $group_id,
			'show_option_all'   =>  __("Show All", "as-attendance"),
		);

		$group_select = wp_dropdown_categories( $group_args );

		if(isset($_REQUEST['registry_info_date'])&&!empty($_REQUEST['registry_info_date'])) {
			$date = sanitize_text_field($_REQUEST['registry_info_date']);

			$args['meta_query'] = array(
				'date' => array(
					'relation' => 'AND',
					array(
						'key'     => 'registry_info_date',
						'value'   => $date,
						'compare' => '='
					),
				)
			);
		}
		if(isset($_REQUEST['registry_attendee'])&&!empty($_REQUEST['registry_attendee'])) {
			$person = get_page_by_title( $_REQUEST['registry_attendee'], 'OBJECT', 'as-person' );
			if(!is_null($person)) {
				$args['meta_query'] = array(
					'person' => array(
						'relation' => 'AND',
						array(
							'key' => 'registry_attendee_' . $person->ID
						),
					)
				);
			}
		}

		$query = new WP_Query( $args );

		global $wp_query;
		$temp_query = $wp_query;
		$wp_query   = NULL;
		$wp_query   = $query;

		$registries = array();
		if ( $wp_query->have_posts() ) {
			$pagination = get_the_posts_pagination( array(
				'mid_size'  => 2,
				'prev_text' => __( 'Back', 'as-attendance' ),
				'next_text' => __( 'Onward', 'as-attendance' ),
			) );

			while ( $wp_query->have_posts() ) {
				$wp_query->the_post();

				$groups = wp_get_object_terms( get_the_ID(), 'as-group' );


				if ( empty( $person ) ) {
					$attendees_ids = get_post_meta( get_the_ID(), 'registry_attendees_ids', true );
					if (empty($attendees_ids))
						echo '0/0';
					else {
						$attendees = 0;
						foreach ($attendees_ids as $id) {
							$attendee = get_post_meta(get_the_ID(), 'registry_attendee_' . $id, true);
							if (isset($attendee['present']) && $attendee['present'] == "1") {
								$attendees++;
							}
						}
						$percent = ($attendees * 100) / count($attendees_ids);
						$attendance = $attendees . '/' . count($attendees_ids) . ' (' . number_format($percent, 2) . '%)';
					}
					$annotation = get_post_meta(get_the_ID(), 'registry_info_annotation', true);
				} else {
					$attendee_meta = get_post_meta(get_the_ID(), 'registry_attendee_' . $person->ID, true);
					$present = ($attendee_meta['present']) ? __('Yes', 'at-attendance') : __('No', 'at-attendance');
					$annotation = $attendee_meta['annotation'];
				}


				$registries[] = array(
					'ID' => get_the_ID(),
					'title' => get_the_title(),
					'groups' => $groups,
					'annotation' => $annotation,
					'link' => get_the_permalink(),
					'attendance' => $attendance,
					'present' => $present
				);
			}
		}

		$wp_query = NULL;
		$wp_query = $temp_query;

		wp_reset_postdata();

        require plugin_dir_path( __FILE__ ) . '../templates/list-registries.php';

	}

    public function shortcode_new_registry() {

        if( !current_user_can( 'edit_as-registrys' ) ) {
            _e("Access denied");
            return false;
        }

        $step = "";
        $group_id = get_query_var( 'as-group', false );
        $submitted = isset($_REQUEST['submitted']);

        if(!$submitted) {

            if (!$group_id) {
                $step = "choose-group";
                $groups = get_terms('as-group', array('hide_empty' => false, 'parent' => 0));
                $output = $this->create_term_list($groups);
            } else {
                $step = "show-form";

                $group = get_term($group_id, 'as-group');
                $date = date('d/m/Y');

                // WP_Query arguments
                $args = array(
                    'post_type' => array('as-person'),
                    'post_status' => array('publish'),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'as-group',
                            'terms' => $group->term_id,
                        ),
                    ),
                    'nopaging' => true,
                    'order' => 'ASC',
                    'orderby' => 'title',
                );

                // The Query
                $attendees = new WP_Query($args);
                $attendees_fields = array();
                $attendees_ids = array();
                // The Loop
                if ($attendees->have_posts()) {
                    while ($attendees->have_posts()) {

                        $attendees->the_post();

                        $attendees_fields[] = array(
                            'field_name' => 'registry_attendee_' . get_the_ID(),
                            'name' => get_the_title(),
                            'photo' => get_the_post_thumbnail(get_the_ID(), array(90, 90)),
                            'present' => 0,
                            'annotation' => ''
                        );
                        $attendees_ids[] = get_the_ID();
                    }
                }

                wp_reset_postdata();
            }

            require plugin_dir_path( __FILE__ ) . '../templates/new-registry-form.php';

        } else {
            $group = get_term($group_id, 'as-group');
            $post_title = $_POST['registry_info_date'] . ' - ' . $group->name;

            $date = $_POST['registry_info_date'];
            $date_arr = explode('/', $date);
            $post_date = date('Y-m-d H:i:s', strtotime($date_arr[2] . '-' . $date_arr[1] . '-' . $date_arr[0]));

            $registry = array(
                'post_title' => $post_title,
                'post_name' => sanitize_title( $post_title ),
                'post_status' => 'publish',
                'post_date' => $post_date,
                'post_date_gmt' => $post_date,
                'tax_input' => array('as-group' => $group_id ),
                'post_type' => 'as-registry'
            );

            //var_dump($_POST);die;
            $post_id = wp_insert_post( $registry );

            $attendees_ids = explode(',',$_POST['registry_attendees_ids']);
            update_post_meta($post_id, 'registry_attendees_ids', $attendees_ids);
            update_post_meta($post_id, 'registry_info_date', $date);
            if(isset($_POST['registry_info_annotation'])&& !empty($_POST['registry_info_annotation'])) {
                update_post_meta($post_id, 'registry_info_annotation', $_POST['registry_info_annotation']);
            }
            foreach ($attendees_ids as $aid) {
                if ( isset( $_REQUEST['registry_attendee_'.$aid] ) ) {
                    update_post_meta( $post_id, 'registry_attendee_'.$aid, $_POST['registry_attendee_'.$aid] );
                }
            }

            wp_redirect( get_the_permalink($post_id) );
            exit;
        }
    }

    private function create_term_list($groups, $o = "") {



            $o .= "<ul class='as-attendance groups-list'>";
            foreach ($groups as $group) {

                $group_children = get_terms('as-group', array('hide_empty' => false, 'parent' => $group->term_id));
                $o .= "<li><a href='" . add_query_arg('as-group', $group->term_id, get_permalink()) . "'>" . $group->name . "</a></li>";
                if ($group_children == true) {
                    $o = $this->create_term_list($group_children, $o);
                }

            }
            $o .= "</ul>";

            return $o;

    }

}
