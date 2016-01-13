<?php
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 21/12/2015
 * Time: 16:05
 */

?>

<table class="form-table">

    <?php foreach($files as $key => $file): ?>
        <?php $alternate = ($key%2==0)?'alternate':''; ?>
        <tr class="set-person-file-wrapper <?php echo $alternate ?>">
            <td>
                <label for="person_file_<?php echo $key; ?>"><?php printf(__( 'File %s', 'as-attendance' ), $key); ?></label>
            </td>
            <td>
                <div class="person-file-container">
                    <?php if($file): ?>
                        <a href="<?php echo $file['url'] ?>" title="<?php echo $file['title'] ?>" target="_blank"><?php echo $file['title'] ?></a>
                    <?php endif ?>
                </div>
                <input type="hidden" name="person_file_<?php echo $key; ?>" class="person-file-id" value="<?php echo (!$file)? '' : $file['id'] ?>">
            </td>
            <td>
                <a href="#" class="button-primary <?php echo (!$file)? '' : 'hidden' ?> add-person-file"><?php _e('Select File', 'as-attendance')?></a>
                <a href="#" class="button <?php echo (!$file)? 'hidden' : '' ?> delete-person-file"><?php _e('Delete File', 'as-attendance')?></a>
            </td>
        </tr>
    <?php endforeach ?>

</table>
