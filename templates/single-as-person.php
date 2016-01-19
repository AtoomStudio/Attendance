<?php
/**
 * The template for displaying as-person custom post type
 *
 * @package AtoomStudio
 * @subpackage As_Attendance
 * @since 1.0.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			</header><!-- .entry-header -->
			<?php $meta = get_post_custom(); ?>

			<?php the_post_thumbnail('thumbnail'); ?>

			<div class="entry-content">
				<h2><?php _e('Information', 'as-attendance') ?></h2>
				<div class="person-info">

					<dl>
						<dt>
							<?php _e( 'Name', 'as-attendance' ); ?>
						</dt>
						<dd>
							<?php echo $meta['person_info_name'][0] ?> <?php echo $meta['person_info_surname'][0] ?>
						</dd>
					</dl>

					<dl>
						<dt>
							<?php _e( 'Birth date', 'as-attendance' ); ?>
						</dt>
						<dd>
							<?php echo $birthdate = $meta['person_info_birthdate'][0] ?>
							<?php $birthdate_array = explode('/', $birthdate) ?>
							<?php $birthdate_array = (count($birthdate_array)<3) ? array('','','') : $birthdate_array; ?>

							<?php if(!empty($birthdate_array[0])): ?>
								<?php
								$then_ts = strtotime($birthdate_array[2].'-'.$birthdate_array[1].'-'.$birthdate_array[0]);
								$then_year = date('Y', $then_ts);
								$age = date('Y') - $then_year;
								if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
								?>
								- <?php printf(__( '%d years old.', 'as-attendance' ), $age); ?>
							<?php endif; ?>
						</dd>
					</dl>

					<dl>
						<dt>
							<?php _e( 'Birthplace', 'as-attendance' ); ?>
						</dt>
						<dd>
							<?php echo $meta['person_info_birthplace'][0] ?>
						</dd>
					</dl>

					<dl>
						<dt>
							<?php _e( 'Civil State', 'as-attendance' ); ?>
						</dt>
						<dd>
							<?php _e($meta['person_info_civilstate'][0], 'as-attendance') ?>
						</dd>
					</dl>

					<dl>
						<dt>
							<?php _e( 'Observations', 'as-attendance' ); ?>
						</dt>
						<dd>
							<?php echo $meta['person_info_observations'][0] ?>
						</dd>
					</dl>

				</div><!-- .person-info -->

				<div class="person-address">

					<dl>
						<dt>
							<?php _e( 'Address', 'as-attendance' ); ?>

						</dt>
						<dd>
							<?php echo $meta['person_info_address'][0] ?><br>
							<?php echo $meta['person_info_state'][0] ?><br>
							<?php echo $meta['person_info_town'][0] ?><br>
							<?php echo $meta['person_info_zipcode'][0] ?>
						</dd>
					</dl>

					<dl>
						<dt>
							<?php _e( 'Telephone', 'as-attendance' ); ?>
						</dt>
						<dd>
							<?php echo $meta['person_info_telephone'][0] ?>
						</dd>
					</dl>

				</div><!-- .person-contact -->

			</div><!-- .entry-content -->

			<div class="person-contact">
				<h2><?php _e('Contact persons', 'as-attendance') ?></h2>
				<dl>
					<dt>
						<?php _e( 'Contact 1', 'as-attendance' ); ?>
					</dt>
					<dd>
						<?php echo $meta['person_contact_1_name'][0]  ?><br>
						<?php echo $meta['person_contact_1_telephone'][0]  ?><br>
						<?php echo $meta['person_contact_1_relationship'][0]  ?>
					</dd>
				</dl>

				<dl>
					<dt>
						<?php _e( 'Contact 2', 'as-attendance' ); ?>
					</dt>
					<dd>
						<?php echo $meta['person_contact_2_name'][0]  ?><br>
						<?php echo $meta['person_contact_2_telephone'][0]  ?><br>
						<?php echo $meta['person_contact_2_relationship'][0]  ?>
					</dd>
				</dl>
			</div>

			<div class="person-additional">
				<h2><?php _e('Additional', 'as-attendance') ?></h2>
				<dl>
					<dt>
						<?php _e( 'Education level', 'as-attendance' ); ?>
					</dt>
					<dd>
						<?php _e($meta['person_additional_education_level'][0], 'as-attendance')  ?>
					</dd>
				</dl>

				<dl>
					<dt>
						<?php _e( 'Profession', 'as-attendance' ); ?>
					</dt>
					<dd>
						<?php echo $meta['person_additional_profession'][0]  ?>
					</dd>
				</dl>

				<dl>
					<dt>
						<?php _e( 'Personal characteristics and hobbies', 'as-attendance' ); ?>
					</dt>
					<dd>
						<?php echo $meta['person_additional_hobbies'][0]  ?>
					</dd>
				</dl>

				<dl>
					<dt>
						<?php _e( 'Medical history of interest', 'as-attendance' ); ?>
					</dt>
					<dd>
						<?php echo $meta['person_additional_medical_history'][0]  ?>
					</dd>
				</dl>

				<dl>
					<dt>
						<?php _e( 'Mother tongue', 'as-attendance' ); ?>
					</dt>
					<dd>
						<?php _e($meta['person_additional_mother_tongue'][0], 'as-attendance')  ?>
					</dd>
				</dl>

				<dl>
					<dt>
						<?php _e( 'Has he/she participated in memory workshops before?', 'as-attendance' ); ?>
					</dt>
					<dd>
						<?php _e($meta['person_additional_workshop_before'][0], 'as-attendance')  ?>
					</dd>
				</dl>

				<dl>
					<dt>
						<?php _e( 'Why wants to participate in the memory workshops?', 'as-attendance' ); ?>
					</dt>
					<dd>
						<?php echo $meta['person_additional_why_workshop'][0]  ?>
					</dd>
				</dl>

				<dl>
					<dt>
						<?php _e( 'Preferred time', 'as-attendance' ); ?>
					</dt>
					<dd>
						<?php _e($meta['person_additional_time'][0], 'as-attendance')  ?>
					</dd>
				</dl>
			</div>

			<div class="person-files">
				<h2><?php _e('Files', 'as-attendance') ?></h2>

				<?php
				$files = array();
				for($i=1;$i<=5;$i++) {

					if(isset($meta['person_file_'.$i][0]) && !empty($meta['person_file_'.$i][0])) {
						$file_post = get_post($meta['person_file_'.$i][0]);
						$file_url = wp_get_attachment_url( $file_post->ID );

						$file = array(
							'id' => $file_post->ID,
							'title' => $file_post->post_title,
							'url' => $file_url
						);
						$files[$i] = $file;
					}


				}

				?>
				<?php foreach($files as $key => $file): ?>
					<?php if($file): ?>
						<dl>
							<dt>
								<?php printf(__( 'File %s', 'as-attendance' ), $key); ?>
							</dt>
							<dd>
								<div class="person-file-container">
									<a href="<?php echo $file['url'] ?>" title="<?php echo $file['title'] ?>" target="_blank"><?php echo $file['title'] ?></a>
								</div>
							</dd>
						</dl>
					<?php endif ?>
				<?php endforeach ?>

			</div>

			<footer class="entry-footer">
				<?php
				edit_post_link(
					sprintf(
					/* translators: %s: Name of current post */
						__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
						get_the_title()
					),
					'<span class="edit-link">',
					'</span>'
				);
				?>
			</footer><!-- .entry-footer -->
		</article><!-- #post-## -->
<?php
			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php //get_sidebar(); //Uncomment to show your sidebar! ?>
<?php get_footer(); ?>
