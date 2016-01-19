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

			<div class="entry-content">
				<h2><?php _e('Attendance', 'as-attendance') ?></h2>
				<?php $annotation = get_post_meta($post->ID, 'registry_info_annotation', true); ?>
				<?php if($annotation): ?>
					<p><strong><?php _e('Annotation', 'as-attendance') ?></strong>: <?php echo $annotation ?></p>
				<?php endif ?>
				<table class="attendees">
					<tbody>
					<?php $person_ids = get_post_meta($post->ID, 'registry_attendees_ids', true); ?>

					<?php foreach($person_ids as $at_id): ?>
						<?php $person_attendance = get_post_meta($post->ID, 'registry_attendee_' . $at_id, true); ?>
						<?php $person = get_post($at_id); ?>
						<tr class="attendee attendee-<?php echo $at_id ?> attendee-<?php echo (!$person_attendance['present']) ? 'not-present' : 'present' ?>">
							<td>
								<?php echo get_the_post_thumbnail($person, 'thumbnail') ?>
							</td>
							<td>
								<a href="<?php echo get_the_permalink($person) ?>" title="<?php echo $person->post_title ?>">
									<?php echo $person->post_title ?>
								</a>
							</td>
							<td>
								<?php echo (!$person_attendance['present']) ? __('No', 'as-attendance') : __('Yes', 'as-attendance') ; ?>
								<?php if ($person_attendance['annotation']): ?>
									<br>
									<small>
										<?php echo (!$person_attendance['annotation']) ? '' : $person_attendance['annotation'] ; ?>
									</small>
								<?php endif ?>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>

				</table><!-- .attendees -->

			</div><!-- .entry-content -->

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
