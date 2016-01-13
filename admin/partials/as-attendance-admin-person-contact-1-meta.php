<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 21/12/2015
 * Time: 16:04
 */
?>
<table class="form-table">

    <tr>
        <td colspan="2">
            <label for="person_contact_1_name"><?php _e( 'Name', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_contact_1_name" name="person_contact_1_name" class="regular-text" value="<?php echo $name; ?>">
            <!--                    <p class="description">--><?php //_e( 'E.g. CEO, Sales Lead, Designer', 'as-attendance' ); ?><!--</p>-->
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_contact_1_telephone"><?php _e( 'Telephone', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_contact_1_telephone" name="person_contact_1_telephone" class="regular-text" value="<?php echo $telephone; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_contact_1_relationship"><?php _e( 'Relationship', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <select name="person_contact_1_relationship" id="person_contact_1_relationship">
                <option value=""><?php _e('Select one', 'as-attendance') ?></option>
                <option value="Son / daughter" <?php selected( $relationship, 'Son / daughter' ); ?>><?php _e('Son / daughter', 'as-attendance') ?></option>
                <option value="Son / daughter-in-law" <?php selected( $relationship, 'Son / daughter-in-law' ); ?>><?php _e('Son / daughter-in-law', 'as-attendance') ?></option>
                <option value="Husband / spouse" <?php selected( $relationship, 'Husband / spouse' ); ?>><?php _e('Husband / spouse', 'as-attendance') ?></option>
                <option value="Nephew / niece" <?php selected( $relationship, 'Nephew / niece' ); ?>><?php _e('Nephew / niece', 'as-attendance') ?></option>
                <option value="Siblings" <?php selected( $relationship, 'Siblings' ); ?>><?php _e('Siblings', 'as-attendance') ?></option>
                <option value="Cousins" <?php selected( $relationship, 'Cousins' ); ?>><?php _e('Cousins', 'as-attendance') ?></option>
                <option value="Sibling-in-law" <?php selected( $relationship, 'Sibling-in-law' ); ?>><?php _e('Sibling-in-law', 'as-attendance') ?></option>
            </select>
        </td>
    </tr>

</table>
