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
            <input type="text" id="person_contact_1_relationship" name="person_contact_1_relationship" class="regular-text" value="<?php echo $relationship; ?>">
        </td>
    </tr>

</table>
