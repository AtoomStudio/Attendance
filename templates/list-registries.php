<?php
/**
 * Created by PhpStorm.
 * User: Josep Camps
 * Date: 15/01/2016
 * Time: 12:24
 */

?>
<fieldset>
    <legend><?php _e('Filters', 'as-attendance') ?></legend>
    <form action="<?php echo $form_action ?>" method="GET">
        <div class='form-control'>
            <label for="registry_info_date"><?php _e('Date', 'as-attendance') ?></label>
            <input type='text' placeholder='<?php _e('Date', 'as-attendance') ?>' class='datepicker' id="registry_info_date" name='registry_info_date' value='<?php echo $date ?>' readonly />
        </div>

        <div class='form-control'>
            <label for="registry_attendee"><?php _e('Person: Surname, Name', 'as-attendance') ?></label>
            <input type='text' placeholder='<?php _e('Person: Surname, Name', 'as-attendance') ?>' name='registry_attendee' id="registry_attendee" value='<?php echo $person->post_title ?>' />
        </div>

        <div class='form-control'>
            <label for="as_group"><?php _e('Group', 'as-attendance') ?></label>
            <?php echo $group_select; ?>
        </div>

        <div class='form-control'>
            <input type='hidden' name='page_id' value='<?php the_ID() ?>' />
            <input type='submit' value='<?php _e('Search', 'as-attendance') ?>'  />
        </div>
    </form>
    <a href="<?php the_permalink() ?>" class="button" title="<?php _e('Clear Results') ?>"><?php _e('Clear') ?></a>
</fieldset>
<table>
    <thead>
    <tr>
        <th><?php _e('Date', 'as-attendance') ?></th>
        <th><?php _e('Group', 'as-attendance') ?></th>
        <?php if(!empty($person)): ?>
            <?php echo $registry["present"] ?>
            <th><?php _e('Present', 'as-attendance') ?></th>
        <?php else: ?>
            <th><?php _e('Attendance', 'as-attendance') ?></th>
        <?php endif ?>
        <th><?php _e('Annotation', 'as-attendance') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($registries as $registry): ?>
    <?php //var_dump($registry) ?>
    <tr class="as-registry as-registry-<?php echo $registry["ID"] ?>">
        <td><a href="<?php echo $registry["link"] ?>" title="<?php echo $registry["title"] ?>"><?php echo $registry["title"] ?></a></td>
        <td>
            <?php foreach($registry["groups"] as $group): ?>
                <?php echo $group->name ?>
            <?php endforeach ?>
        </td>
        <td>
            <?php if(!empty($person)): ?>
                <?php echo $registry["present"] ?>
            <?php else: ?>
                <?php echo $registry["attendance"] ?>
            <?php endif ?>
        </td>
        <td>
            <?php echo $registry["annotation"] ?><br>
        </td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>

<?php
    echo $pagination;