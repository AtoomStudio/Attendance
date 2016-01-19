<?php
/**
 * Created by PhpStorm.
 * User: Josep Camps
 * Date: 15/01/2016
 * Time: 12:24
 */

echo "<pre>"; print_r(get_userdata( 1 ));echo "</pre>";
?>
<fieldset>
    <legend><?php _e('Filters', 'as-attendance') ?></legend>
    <form action="<?php the_permalink() ?>" method="GET">
        <label for="person_info_name"><?php _e('Name', 'as-attendance') ?></label>
        <input type='text' placeholder='<?php _e('Name', 'as-attendance') ?>' id="person_info_name" name='person_info_name' value='<?php echo $name ?>' />

        <label for="person_info_surname"><?php _e('Surname', 'as-attendance') ?></label>
        <input type='text' placeholder='<?php _e('Surname', 'as-attendance') ?>' id="person_info_surname" name='person_info_surname' value='<?php echo $surname ?>' />

        <label for="person_contact_name"><?php _e('Contact person', 'as-attendance') ?></label>
        <input type='text' placeholder='<?php _e('Contact person', 'as-attendance') ?>' id="person_contact_name" name='person_contact_name' value='<?php echo $contact ?>' />

        <label for="as_group"><?php _e('Group', 'as-attendance') ?></label>
        <?php echo $group_select ?>

        <input type='hidden' name='page_id' value='<?php the_ID() ?>' />
        <input type='submit' value='<?php _e('Search', 'as-attendance') ?>'  />
    </form>
    <a href="<?php the_permalink() ?>" class="button" title="<?php _e('Clear Results') ?>"><?php _e('Clear') ?></a>
</fieldset>
<table>
    <thead>
    <tr>
        <th><?php _e('Name', 'as-attendance') ?></th>
        <th><?php _e('Group', 'as-attendance') ?></th>
        <th><?php _e('Contact 1', 'as-attendance') ?></th>
        <th><?php _e('Contact 2', 'as-attendance') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($persons as $person): ?>
    <tr class="as-person as-person-<?php echo $person["ID"] ?>">
        <td><a href="<?php echo $person["link"] ?>" title="<?php echo $person["title"] ?>"><?php echo $person["title"] ?></a></td>
        <td>
            <?php foreach($person["groups"] as $group): ?>
                <?php echo $group->name ?>
            <?php endforeach ?>
        </td>
        <td>
            <?php echo $person["meta"]["person_contact_1_name"][0] ?><br>
            <small><?php echo $person["meta"]["person_contact_1_telephone"][0] ?> - <?php _e($person["meta"]["person_contact_1_relationship"][0], 'as-attendance') ?></small>
        </td>
        <td>
            <?php echo $person["meta"]["person_contact_2_name"][0] ?><br>
            <small><?php echo $person["meta"]["person_contact_2_telephone"][0] ?> - <?php _e($person["meta"]["person_contact_2_relationship"][0], 'as-attendance') ?></small>
        </td>
    </tr>
    <?php endforeach ?>
    </tbody>
</table>

<?php
    echo $pagination;