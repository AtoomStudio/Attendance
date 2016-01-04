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
            <label for="registry_annotation"><?php _e( 'Annotation', 'as-attendance' ); ?>
            </label>
        </td>
        <td colspan="4">
            <textarea id="registry_annotation" name="registry_annotation" class="large-text" rows="7"><?php echo $annotation; ?></textarea>
        </td>
    </tr>

</table>