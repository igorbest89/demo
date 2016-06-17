<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09.06.2016
 * Time: 14:53
 */ ?>


<!--<pre>-->
<!--    --><?php //print_r($task_info); ?>
<!--</pre>-->
<div class="content">
    <?php if (isset($error)) { ?>
        <div class="alert alert-danger">
            <strong>

                <?php echo $error; ?>

            </strong>
        </div>
    <?php } ?>
<div style="
    margin-top: 44px;
    padding-top: 70px;
	width: 95%;
">
<h2>Управление задачей <?php echo $task_info['task_name']; ?></h2>
    <form action="<?php echo site_url("Taskmanager/updateTask") ?>" enctype="multipart/form-data" id="formUpdateTask"
          method="POST">

        <input type="hidden" name="task_id" value="<?php echo $task_info['id_task']; ?>">
        <input type="hidden" name="project_id" value="<?php echo $task_info['project_id']; ?>">

        <div style="width:49%; margin-bottom:20px; float:left"><span>Имя задачи:</span>
            <input name="task_name" type="text" id="task_name" value="<?php echo $task_info['task_name']; ?>"><br></div>
        <div style="width:49%; margin-bottom:20px; float:right"><span>Артикул: </span>
            <input name="article" type="text" id="article" value="<?php echo $task_info['artikle']; ?>"><br></div>
    
            <div style="width:49%; margin-bottom:20px; float:right"><span>Внутринний артикул: </span>
                <input name="in_artikle" type="text" id="in_artikle"
                       value="<?php echo $task_info['in_artikle']; ?>"><br></div>
            <div style="width:49%; margin-bottom:20px; float:left">

                <span>Тип работы:</span>

                <select class="tipmat" name="type_work" id="type_work">
                    <?php foreach ($type_works as $value) { ?>
                        <?php if ($value->id_type_work == $task_info['id_type_work']) { ?>
                            <option value="<?php echo $value->id_type_work; ?>"
                                    selected><?php echo $value->name_work; ?></option>
                        <?php } else { ?>
                            <option
                                value="<?php echo $value->id_type_work; ?>"><?php echo $value->name_work; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select></div>
            <div style="width:49%; margin-bottom:20px; float:right"><span>Исполнитель:</span><br>
                <select class="tipmat" name="users" id="users">
                    <?php foreach ($users as $value) { ?>
                        <?php if ($value->id_user == $task_info['id_user']) { ?>
                            <option value="<?php echo $value->id_user; ?>"
                                    selected><?php echo $value->username; ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $value->id_user; ?>"><?php echo $value->username; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select></div>
            <div style="width:49%; margin-bottom:20px; float:left;"><span>Вес изделия (заполнять при необходимости):</span><br>
                <input type="text" name="weight" id="weight" value="<?php echo $task_info['weight']; ?>"></div>
            <div style="width:100%;"><span>Коменетарий к задаче:</span>
                <input style="height:100px;" type="text" name="comment" id="comment"
                       value="<?php echo $task_info['comment']; ?>"></div>
            <br>

            <div style="margin-bottom:20px;"><span>Статус задачи:</span><br>


                <select class="tipmat" name="status" id="status">
                    <?php foreach ($status as $key => $value) { ?>
                        <?php if ($key == $task_info['status']) { ?>
                            <option value="<?php echo $key; ?>" selected><?php echo $value; ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div style="
    width: 49%;
    float: left;
	margin-bottom: 20px;

"><span>Дата начала</span>
                <input name="input_data_start" id="input-data-start" type="text"
                       value="<?php echo $task_info['date_start']; ?>">
            </div>
            <div style="
    width: 49%;
    float: right;
	margin-bottom: 20px;

"><span>Дата закрытия</span>
                <input name="input_data_end" id="input-data-end" type="text"
                       value="<?php echo $task_info['date_end']; ?>">
            </div>
            <div style="float:left;"><span>Загрузить Файлы к задаче:</span>
                <input type="file" min="1" max="9999" name="file[]" multiple="true"/></div>
            <div style="float:right;"><input class="indown" type="submit" name="load_files" value="Сохранить задачу"/>
                <br>

            </div>
            <!--                <div class="btn btn-primary" id="btnSaveOrder" onclick="addOrder()">Сохранить заказ</div>-->

    </form>
    </div>
    <div>
        <form id="materials" action="<?php echo site_url("Taskmanager/addUsedMaterial") ?>">
            <input type="hidden" name="task_id" value="<?php echo $task_info['id_task']; ?>">
            <input type="hidden" name="input_data_used" id="input-data" type="text">

            <div id="listUsedMaterial">

            </div>
            <div id="usedMaterial">

                <select name='material' id='material'><?php foreach ($type_materials as $value) { ?>
                        <option
                            value='<?php echo $value->id_material; ?>'><?php echo $value->name_material; ?></option> <?php } ?>
                </select>
                <input type='text' name='materialCount' value='0'>

                <div class="btn btn-primary" style="cursor: pointer" onclick="addUsedMaterial()"><i
                        class="fa fa-plus"></i></div>
            </div>
        </form>
    </div>
</div></div>
<script>

    $(document).ready(function () {
        $("#input-data-start").datepicker({dateFormat: "yy-mm-dd"});
        $("#input-data-end").datepicker({dateFormat: "yy-mm-dd"});
        refreshWorkTaskP();
        $('#material').chosen();
    });

    function refreshWorkTaskP() {
        updateListTask();
    }
    //
    function addUsedMaterial() {
        $('#input-data').val($('#input-data-start').val());
        $.post($('#materials').attr('action'), $('#materials').serializeArray(), function (data) {
            refreshWorkTaskP();
        });

    }

    function updateListTask() {
        $.get('<?php echo site_url("Taskmanager/getUsedMaterial")."/?task_id=".$task_info['id_task'] ?>', function (data) {
            $('#listUsedMaterial').html(data);
        });
    }
</script>