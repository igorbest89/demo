<div class="content">
    <?php
    /**
     * Created by PhpStorm.
     * User: igor
     * Date: 23.05.2016
     * Time: 16:52
     */ ?>

    <div id="addProject">
        <h1>Добавить проект</h1>

        <?php echo form_open('project'); ?>
        <input type="hidden" name="action" id="action" value="save">
        <input type="hidden" name="project_id" id="project_id" value="">
<div class="content2">
        <table 
" class="filtert"><tr>
            <td><span>Имя проекта:</span></td>
            <td><input id="nameProject" name="nameProject" value=""></td>
        </tr>
        <tr>
            <td><span>Описание проекта:</span></td>
            <td><input id="deskProject" name="deskProject" value=""></td>
        </tr>
        <tr>
            <td><span>Статус проекта:</span></td>
            <td><select name="statusProject" id="statusProject">
                <?php foreach ($status as $key => $value) { ?>
                    <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                <?php } ?>
            </select></td>
        </tr></table>
        <div style="
    margin-top: 18px;
    float: none;
    width: 100%;
    background: #337AB7;
" class="btn btn-primary" onclick="addProject()">Сохранить
        </div></div>

        </form>
		<br/>
    </div>
	<h3>Список всех проектов на предприятии</h3>
    <div id="listProject">


    </div>

</div>
<script>
    $(document).ready(function () {

        refreshTable();

    });
    function refreshTable() {
        $.get('<?php echo site_url("project/getListProject")?>', function (data) {
            $('#listProject').html(data);
        });
    }

    function addProject() {
        $.post($('form').attr('action'), $('form').serializeArray(), function (data) {
            console.log(data);
            location.reload();
        });

    }

</script>