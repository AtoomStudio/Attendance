<hr>
<input type='text' placeholder='<?php _e('Surname', 'as-attendance') ?>' class='postform' name='person_info_surname' value='<?php echo $surname ?>' />
<input type='text' placeholder='<?php _e('Name', 'as-attendance') ?>' class='postform' name='person_info_name' value='<?php echo $name ?>' />
<?php echo $groups_dropdown; ?>
<input type='text' placeholder='<?php _e('Contact person', 'as-attendance') ?>' class='postform' name='person_contact_name' value='<?php echo $contact ?>' />
<a href="edit.php?post_type=as-person" class="button" title="<?php _e('Clear Results') ?>"><?php _e('Clear') ?></a>