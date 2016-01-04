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
            <label for="person_additional_education_level"><?php _e( 'Education level', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_additional_education_level" name="person_additional_education_level" class="regular-text" value="<?php echo $education_level; ?>">
            <!--                    <p class="description">--><?php //_e( 'E.g. CEO, Sales Lead, Designer', 'as-attendance' ); ?><!--</p>-->
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_profession"><?php _e( 'Profession', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_additional_profession" name="person_additional_profession" class="regular-text" value="<?php echo $profession; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_hobbies"><?php _e( 'Personal characteristics and hobbies', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_additional_hobbies" name="person_additional_hobbies" class="regular-text" value="<?php echo $hobbies; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_medical_history"><?php _e( 'Medical history of interest', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_additional_medical_history" name="person_additional_medical_history" class="regular-text" value="<?php echo $medical_history; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_mother_tongue"><?php _e( 'Mother tongue', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_additional_mother_tongue" name="person_additional_mother_tongue" class="regular-text" value="<?php echo $mother_tongue; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_memory_workshop"><?php _e( 'Memory workshop', 'as-attendance' ); ?>
            </label>
            <p class="description">REVISAR!!</p>
        </td>
        <td colspan="4">
            <input type="text" id="person_additional_memory_workshop" name="person_additional_memory_workshop" class="regular-text" value="<?php echo $memory_workshop; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_workshop_before"><?php _e( 'Has he/she participated in memory workshops before?', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_additional_workshop_before" name="person_additional_workshop_before" class="regular-text" value="<?php echo $workshop_before; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_why_workshop"><?php _e( 'Why wants to participate in the memory workshops?', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_additional_why_workshop" name="person_additional_why_workshop" class="regular-text" value="<?php echo $why_workshop; ?>">
        </td>
    </tr>

    <tr>
        <td colspan="2">
            <label for="person_additional_time"><?php _e( 'Preferred time', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="person_additional_time" name="person_additional_time" class="regular-text" value="<?php echo $time; ?>">
        </td>
    </tr>

</table>
