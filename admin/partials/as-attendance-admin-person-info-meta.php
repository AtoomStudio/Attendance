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
            <?php $birthdate_array = explode('/', $birthdate) ?>
            <?php $birthdate_array = (count($birthdate_array)<3) ? array('','','') : $birthdate_array; ?>
            <select name="person_info_birthdate[day]" id="person_info_birthdate_day">
                <option value=""><?php _e('Day', 'as-attendance') ?></option>
                <?php for($i=1;$i<=31;$i++): ?>
                    <option value="<?php echo $i ?>" <?php selected( $birthdate_array[0], $i ); ?>><?php echo $i ?></option>
                <?php endfor; ?>
            </select>
            <select name="person_info_birthdate[month]" id="person_info_birthdate_month">
                <option value=""><?php _e('Month', 'as-attendance') ?></option>
                <?php for($i=1;$i<=12;$i++): ?>
                    <option value="<?php echo $i ?>" <?php selected( $birthdate_array[1], $i ); ?>><?php echo $i ?></option>
                <?php endfor; ?>
            </select>
            <select name="person_info_birthdate[year]" id="person_info_birthdate_year">
                <option value=""><?php _e('Year', 'as-attendance') ?></option>
                <?php for($i=date('Y')-120;$i<=date('Y')-18;$i++): ?>
                    <option value="<?php echo $i ?>" <?php selected( $birthdate_array[2], $i ); ?>><?php echo $i ?></option>
                <?php endfor; ?>
            </select>
            <?php if(!empty($birthdate_array[0])): ?>
                <?php
                $then_ts = strtotime($birthdate_array[2].'-'.$birthdate_array[1].'-'.$birthdate_array[0]);
                $then_year = date('Y', $then_ts);
                $age = date('Y') - $then_year;
                if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
                ?>
                <p class="description"><?php printf(__( '%d years old.', 'as-attendance' ), $age); ?></p>
            <?php endif; ?>
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
            <select name="person_info_civilstate" id="person_info_civilstate">
                <option value=""><?php _e('Select one', 'as-attendance') ?></option>
                <option value="Single" <?php selected( $civilstate, 'Single' ); ?>><?php _e('Single', 'as-attendance') ?></option>
                <option value="Married" <?php selected( $civilstate, 'Married' ); ?>><?php _e('Married', 'as-attendance') ?></option>
                <option value="Divorced" <?php selected( $civilstate, 'Divorced' ); ?>><?php _e('Divorced', 'as-attendance') ?></option>
                <option value="Couple" <?php selected( $civilstate, 'Couple' ); ?>><?php _e('Couple', 'as-attendance') ?></option>
                <option value="Widower" <?php selected( $civilstate, 'Widower' ); ?>><?php _e('Widower', 'as-attendance') ?></option>
            </select>
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_info_observations"><?php _e( 'Observations', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <textarea id="person_info_observations" name="person_info_observations" class="large-text" rows="4"><?php echo $observations; ?></textarea>
<!--            <input type="text" id="person_info_observations" name="person_info_observations" class="regular-text" value="--><?php //echo $observations; ?><!--">-->
        </td>
    </tr>

</table>