<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09.06.2016
 * Time: 17:13
 */

?>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>

            <td>Материал</td>
            <td>Количество</td>
            <td>Дата</td>
            <td>Действие</td>
        </tr>
        </thead>
        <?php

        ?>
        <tbody>

        <?php foreach ($list_material as $value) { ?>
            <tr>
                <!--                http://gold.loc/index.php/Taskmanager/downloadFiles?file_id=2-->
                <td><?php echo $value['name_material']; ?></td>
                <td><?php echo $value['count']; ?></td>
                <td class="text-center"><?php echo $value['date_used'] ?></td>
                <td class="text-center">

                </td>
                <td class="text-center">
                    <div class="btn btn-danger" onclick="deleteMaterialTask('<?php echo $value['id_used']; ?>')"><i class="fa fa-trash"></i> </div>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script>
    function deleteMaterialTask(idusedMat)
    {
        $.post('<?php echo site_url("Taskmanager/deleteMaterial")?>', {id_used_mat:idusedMat}, function(data){
            refreshWorkTaskP();
        });
    }
</script>