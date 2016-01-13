<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://atoomstudio.com
 * @since      1.0.0
 *
 * @package    As_Attendance
 * @subpackage As_Attendance/admin/partials
 */
?>

<div class="as-attendance as-attendance-admin wrap">
    <h1><?php _e('Add registry', 'as-attendance') ?></h1>
    <p><?php _e('Select the group you want to create the attendance registry', 'as-attendance') ?></p>
    <?php echo $output ?>
</div>

