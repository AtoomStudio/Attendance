<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 21/12/2015
 * Time: 16:08
 */
?>
<h2><strong><?php echo $group->name ?></strong></h2>
<input type="hidden" name="registry_attendees_ids" value="<?php echo implode(',', $attendees_ids) ?>" />
<table class="form-table attendees-table">
    <?php foreach ($attendees_fields as $key => $field): ?>
        <?php $alternate = ($key%2==0)? 'alternate' : ''; ?>
        <tr class="<?php echo $alternate ?>">
            <td rowspan="2"><?php echo $field['photo'] ?></td>
            <td><?php echo $field['name'] ?></td>
            <td>
                <input type="checkbox" name="<?php echo $field['field_name'] ?>[present]" id="<?php echo $field['field_name'] ?>_present" value="1" <?php checked( $field['present'], "1" ); ?> >
                <label for="<?php echo $field['field_name'] ?>_present"><?php _e( 'Present', 'as-attendance' ); ?></label>
            </td>
        </tr>
        <tr class="<?php echo $alternate ?>">
            <td>
                <?php if(empty($field['annotation'])): ?>
                    <a class="add_annotation" data-target="#<?php echo $field['field_name'] ?>_annotation" href="#"><?php _e( '+ Add annotation', 'as-attendance' ); ?></a>
                <?php endif ?>
                <textarea id="<?php echo $field['field_name'] ?>_annotation"
                          name="<?php echo $field['field_name'] ?>[annotation]"
                          class="large-text attendee-annotation <?php echo (empty($field['annotation'])?'closed':'') ?>"
                          rows="5"><?php echo $field['annotation'] ?></textarea>
            </td>
            <td></td>
        </tr>
    <?php endforeach; ?>

</table>