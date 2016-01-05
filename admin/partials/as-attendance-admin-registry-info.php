<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 21/12/2015
 * Time: 16:08
 */
?>

<table class="form-table">

    <tr>
        <td colspan="2">
            <label for="registry_info_date"><?php _e( 'Date', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <input type="text" id="registry_info_date" name="registry_info_date" class="regular-text" value="<?php echo $date; ?>" required />
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