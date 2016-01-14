<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 21/12/2015
 * Time: 16:05
 */

?>

<table class="form-table">

    <tr>
        <td colspan="2">
            <label for="person_additional_education_level"><?php _e( 'Education level', 'as-attendance' ); ?></label>
        </td>
        <td colspan="4">
            <select name="person_additional_education_level" id="person_additional_education_level">
                <option value=""><?php _e('Select one', 'as-attendance') ?></option>
                <option value="First grade" <?php selected( $education_level, 'First grade' ); ?>><?php _e('First grade', 'as-attendance') ?></option>
                <option value="Second grade" <?php selected( $education_level, 'Second grade' ); ?>><?php _e('Second grade', 'as-attendance') ?></option>
                <option value="University education" <?php selected( $education_level, 'University education' ); ?>><?php _e('University education', 'as-attendance') ?></option>
            </select>
            <!--                    <p class="description">--><?php //_e( 'E.g. CEO, Sales Lead, Designer', 'as-attendance' ); ?><!--</p>-->
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_profession"><?php _e( 'Profession', 'as-attendance' ); ?></label>
        </td>
        <td colspan="4">
            <input type="text" id="person_additional_profession" name="person_additional_profession" class="regular-text" value="<?php echo $profession; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_hobbies"><?php _e( 'Personal characteristics and hobbies', 'as-attendance' ); ?></label>
        </td>
        <td colspan="4">
            <input type="text" id="person_additional_hobbies" name="person_additional_hobbies" class="regular-text" value="<?php echo $hobbies; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_medical_history"><?php _e( 'Medical history of interest', 'as-attendance' ); ?></label>
        </td>
        <td colspan="4">
            <input type="text" id="person_additional_medical_history" name="person_additional_medical_history" class="regular-text" value="<?php echo $medical_history; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_mother_tongue"><?php _e( 'Mother tongue', 'as-attendance' ); ?></label>
        </td>
        <td colspan="4">
            <select name="person_additional_mother_tongue" id="person_additional_mother_tongue">
                <option value=""><?php _e('Select one', 'as-attendance') ?></option>
                <option value="Catalan" <?php selected( $mother_tongue, 'Catalan' ); ?>><?php _e('Catalan', 'as-attendance') ?></option>
                <option value="Spanish" <?php selected( $mother_tongue, 'Spanish' ); ?>><?php _e('Spanish', 'as-attendance') ?></option>
                <option value="Others" <?php selected( $mother_tongue, 'Others' ); ?>><?php _e('Others', 'as-attendance') ?></option>
            </select>
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_workshop_before"><?php _e( 'Has he/she participated in memory workshops before?', 'as-attendance' ); ?></label>
        </td>
        <td colspan="4">
            <input type="radio" name="person_additional_workshop_before" value="Yes" <?php checked( $workshop_before, 'Yes' ); ?> ><?php _e('Yes', 'as-attendance') ?><br>
            <input type="radio" name="person_additional_workshop_before" value="No" <?php checked( $workshop_before, 'No' ); ?> ><?php _e('No', 'as-attendance') ?><br>
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_why_workshop"><?php _e( 'Why wants to participate in the memory workshops?', 'as-attendance' ); ?></label>
        </td>
        <td colspan="4">
            <input type="text" id="person_additional_why_workshop" name="person_additional_why_workshop" class="regular-text" value="<?php echo $why_workshop; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_time"><?php _e( 'Preferred time', 'as-attendance' ); ?></label>
        </td>
        <td colspan="4">
            <select name="person_additional_time" id="person_additional_time">
                <option value=""><?php _e('Select one', 'as-attendance') ?></option>
                <option value="Morning 1" <?php selected( $time, 'Morning 1' ); ?>><?php _e('Morning 1', 'as-attendance') ?></option>
                <option value="Morning 2" <?php selected( $time, 'Morning 2' ); ?>><?php _e('Morning 2', 'as-attendance') ?></option>
                <option value="Afternoon" <?php selected( $time, 'Afternoon' ); ?>><?php _e('Afternoon', 'as-attendance') ?></option>
                <option value="Indifferent" <?php selected( $time, 'Indifferent' ); ?>><?php _e('Indifferent', 'as-attendance') ?></option>
            </select>
        </td>
    </tr>

</table>
