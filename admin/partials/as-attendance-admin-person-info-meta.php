<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 21/12/2015
 * Time: 16:00
 */
?>

<table class="form-table">

    <tr>
        <td colspan="2">
            <label for="person_info_name"><?php _e( 'Name', 'as-attendance' ); ?></label>
        </td>
        <td colspan="4">
            <input required type="text" id="person_info_name" name="person_info_name" class="regular-text" value="<?php echo $name; ?>">
            <!--                    <p class="description">--><?php //_e( 'E.g. CEO, Sales Lead, Designer', 'as-attendance' ); ?><!--</p>-->
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_info_surname"><?php _e( 'Surname', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input required type="text" id="person_info_surname" name="person_info_surname" class="regular-text" value="<?php echo $surname; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_info_birthdate"><?php _e( 'Birth date', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_info_birthdate" name="person_info_birthdate" class="regular-text" value="<?php echo $birthdate; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_info_birthplace"><?php _e( 'Birthplace', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_info_birthplace" name="person_info_birthplace" class="regular-text" value="<?php echo $birthplace; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_info_address"><?php _e( 'Address', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_info_address" name="person_info_address" class="regular-text" value="<?php echo $address; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_info_state"><?php _e( 'State', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_info_state" name="person_info_state" class="regular-text" value="<?php echo $state; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_info_town"><?php _e( 'Town', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_info_town" name="person_info_town" class="regular-text" value="<?php echo $town; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_info_zipcode"><?php _e( 'Zip code', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_info_zipcode" name="person_info_zipcode" class="regular-text" value="<?php echo $zipcode; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_info_telephone"><?php _e( 'Telephone', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_info_telephone" name="person_info_telephone" class="regular-text" value="<?php echo $telephone; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_info_civilstate"><?php _e( 'Civil State', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_info_civilstate" name="person_info_civilstate" class="regular-text" value="<?php echo $civilstate; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_info_observations"><?php _e( 'Observations', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_info_observations" name="person_info_observations" class="regular-text" value="<?php echo $observations; ?>">
        </td>
    </tr>

</table>