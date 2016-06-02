<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 23.05.2016
 * Time: 17:50
 */
//echo "<pre>";
//print_r($listProject);
//echo "</pre>";
?>
<table>
<tr>
    <td>id</td>
    <td>Название</td>
    <td>Описание</td>
    <td>Статус</td>
    <td>Действие</td>
</tr>
    <?php
    foreach ($listProject as $project) {
        ?>
        <tr>
            <td><?php echo $project->id_project;?></td>
            <td><?php echo $project->name_project;?></td>
            <td><?php echo $project->desk;?></td>
            <td><?php echo $project->status;?></td>

        </tr>

        <?php
    }
    ?>
</table>

