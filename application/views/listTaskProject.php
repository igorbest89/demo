<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09.06.2016
 * Time: 11:08
 */


?>
<!--<pre>-->
<!--    --><?php //print_r($list_task); ?>
<!--</pre>-->
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <td>ID задачи</td>
            <td>Имя задачи</td>
            <td>Артикул</td>
            <td>Внутринний артикул</td>
            <td>Тип работы</td>
            <td>Исполнитель</td>
            <td>Дата начала</td>
            <td>Дата конца</td>
            <td>Статус</td>
            <td>Вес</td>
            <td>Коментарий</td>
            <td>Действия</td>
        </tr>
        </thead>
        <?php

        ?>
        <tbody>
        <?php foreach ($list_task as $value) { ?>
            <tr>
                <td><?php echo $value['id_task']; ?></td>
                <td><?php echo $value['task_name']; ?></td>
                <td><?php echo $value['artikle']; ?></td>
                <td><?php echo $value['in_artikle']; ?></td>
                <td><?php echo $value['name_work']; ?></td>
                <td><?php echo $value['username']; ?></td>
                <td><?php echo $value['date_start']; ?></td>
                <td><?php echo $value['date_end']; ?></td>
                <td><?php echo $value['status']; ?></td>
                <td><?php echo $value['weight']; ?></td>
                <td><?php echo $value['comment']; ?></td>
                <td><a class="btn btn-success" href="<?php echo site_url("Taskmanager/workTask")."/?task_id="?><?php echo $value['id_task']; ?>&project_id=<?php echo $value['project_id'];?>"><i class="fa fa-pencil"></i> </a> </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script>
    function editTask(id_task)
    {
        //Taskmanager/workTask/?task_id=2
        $.get('<?php echo site_url("Taskmanager/workTask")."/?task_id="?>'+id_task,function(data){
            $('#popUpTask').html(data);
//            $('#popUpTask').bPopup({
//                follow: [false, false], //x, y
//            });
        });
    }
</script>