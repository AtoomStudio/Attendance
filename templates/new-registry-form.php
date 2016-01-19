<?php
/**
 * Created by PhpStorm.
 * User: Josep Camps
 * Date: 15/01/2016
 * Time: 12:24
 */

?>

<div class="as-attendance as-attendance-new-registry wrap">
    <?php if($step == "choose-group"): ?>
        <p><?php _e('Select the group you want to create the attendance registry', 'as-attendance') ?></p>
        <?php echo $output ?>
    <?php else: ?>
        <form action="<?php the_permalink() ?>" method="POST">
            <h2><strong><?php echo $group->name ?></strong></h2>
            <table class="form-table">
                <tr>
                    <td colspan="2">
                        <label for="registry_info_date"><?php _e( 'Date', 'as-attendance' ); ?>
                        </label>
                    </td>
                    <td colspan="4">
                        <input type="text" id="registry_info_date" name="registry_info_date" class="regular-text datepicker" value="<?php echo $date; ?>" required readonly />
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <label for="registry_info_annotation"><?php _e( 'Annotation', 'as-attendance' ); ?>
                        </label>
                    </td>
                    <td colspan="4">
                        <textarea id="registry_info_annotation" name="registry_info_annotation" class="large-text" rows="5"><?php echo $annotation; ?></textarea>
                    </td>
                </tr>
            </table>

            <input type="hidden" name="registry_attendees_ids" value="<?php echo implode(',', $attendees_ids) ?>" />
            <table class="form-table attendees-table">
                <?php foreach ($attendees_fields as $key => $field): ?>
                    <?php $alternate = ($key%2==0)? 'alternate' : ''; ?>
                    <tr class="<?php echo $alternate ?>">
                        <td width="110px"><?php echo $field['photo'] ?></td>
                        <td>
                            <?php echo $field['name'] ?><br>
                            <?php if(empty($field['annotation'])): ?>
                                <a class="add_annotation" data-target="#<?php echo $field['field_name'] ?>_annotation" href="#"><?php _e( '+ Add annotation', 'as-attendance' ); ?></a>
                            <?php endif ?>
                            <textarea id="<?php echo $field['field_name'] ?>_annotation"
                                      name="<?php echo $field['field_name'] ?>[annotation]"
                                      class="large-text attendee-annotation <?php echo (empty($field['annotation'])?'closed':'') ?>"
                                      rows="5"><?php echo $field['annotation'] ?></textarea>
                        </td>
                        <td>
                            <input type="checkbox" name="<?php echo $field['field_name'] ?>[present]" id="<?php echo $field['field_name'] ?>_present" value="1" <?php checked( $field['present'], "1" ); ?> >
                            <label for="<?php echo $field['field_name'] ?>_present"><?php _e( 'Present', 'as-attendance' ); ?></label>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </table>
            <input type="hidden" value="<?php echo $group->term_id ?>" name="as-group" />

            <input type="submit" name="submitted" value="<?php _e('Save', 'as-attendance') ?>" />
        </form>
    <?php endif; ?>
</div>