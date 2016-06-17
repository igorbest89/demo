<div style="
    width: 79%;
" class="content">
    <?php if(isset($error)){?>
  <div class="alert alert-danger">
         <strong>

            <?php      echo $error; ?>

     </strong>
  </div>
      <?php } ?>


    <div style="
    width: 96%;
" id="addOrder">
        <h1>Управление задачами: добавление, редактирование задачь в проекте</h1>

        <p>В данном разделе Вы можете поставить новую задачу в работу</p>

        <form action="<?php echo site_url("Taskmanager/addTask") ?>" enctype="multipart/form-data" id="formAddOrder"
              method="POST">

            <input type="hidden" name="project_id" value="<?php echo  $project_id;?>">
            <div style="width:49%; margin-bottom:20px; float:left"><span>Имя задачи:</span>
                <input name="task_name" type="text" id="nameTask"><br></div>
            <div style="width:49%; margin-bottom:20px; float:right"><span>Артикул:</span>
                <input name="article" type="text" id="article"><br></div>
            <div style="width:49%; margin-bottom:20px; float:left"><span>Тип работы:</span>

                <select class="tipmat" name="type_work" id="type_work">
                    <?php foreach ($type_works as $value) { ?>
                        <option value="<?php echo $value->id_type_work; ?>"><?php echo $value->name_work; ?></option>
                    <?php } ?>
                </select></div>
            <div style="width:49%; margin-bottom:20px; float:right"><span>Исполнитель:</span><br>
                <select class="tipmat" name="users" id="users">
                    <?php foreach ($users as $value) { ?>
                        <option value="<?php echo $value->id_user; ?>"><?php echo $value->username; ?></option>
                    <?php } ?>
                </select></div>
            <div style="width:49%; margin-bottom:20px; float:left;"><span>Вес изделия (заполнять при необходимости):</span><br>
                <input type="text" name="weight" id="weight"></div>
				<div style="width:49%; margin-bottom:20px; float:right;"><span>Статус задачи:</span><br>


                <select class="tipmat" name="status" id="status">
                    <?php foreach($status as $key=>$value){?>
                    <option value="<?php echo $key;?>"><?php echo $value;?></option>

                    <?php }?>
                </select>
            </div>
            <div style="width:100%;"><span>Коменетарий к задаче:</span>
                <input style="height:100px;" type="text" name="comment" id="comment"></div>
            <br>
            
            <div><span>Загрузить Файлы к задаче:</span>
                <input type="file" min="1" max="9999" name="file[]" multiple="true"/></div>
            <div style="float:right; margin-top: -21px;"><input class="indown" type="submit" name="load_files" value="Сохранить задачу"/>
                <br>

            </div>
            <!--                <div class="btn btn-primary" id="btnSaveOrder" onclick="addOrder()">Сохранить заказ</div>-->
        </form>
    </div>
	<hr>
    <div id="listTask">
        <h2>Список задач проекта</h2>
        <div id="listTaskTable"></div>
    </div>
	<hr>
    <div id="filesList">
        <h2>Список фалов в проекте</h2>
        <div id="listFilesTable"></div>
    </div>
    <div id="popUpTask" style="background-color: white;">

    </div>
</div>

<script>
    $(document).ready(function(){
        refreshTable();
    });

    function refreshTable()
    {
        updateListTask();
        updateListFiles();
    }

    function updateListTask()
    {
        $.get('<?php echo site_url("Taskmanager/getListTaskToProject")."/?project_id=".$project_id ?>',function (data){
            $('#listTaskTable').html(data);
        });
    }

    function updateListFiles()
    {
        $.get('<?php echo site_url("Taskmanager/getFilesForProject")."/?project_id=".$project_id ?>',function (data){
            $('#listFilesTable').html(data);
        });
    }
</script>
