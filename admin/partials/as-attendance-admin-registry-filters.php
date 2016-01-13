<hr>
<div class='postform'><input type='text' placeholder='<?php _e('Date', 'as-attendance') ?>' class='postform datepicker' name='registry_info_date' value='<?php echo $date ?>' readonly /></div>
<?php echo $groups_dropdown; ?>
<input type='text' placeholder='<?php _e('Person: Surname, Name', 'as-attendance') ?>' class='postform' name='registry_attendee' value='<?php echo $person ?>' />
<a href="edit.php?post_type=as-registry" class="button" title="<?php _e('Clear Results') ?>"><?php _e('Clear') ?></a>
