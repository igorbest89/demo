<div class="content" xmlns="http://www.w3.org/1999/html">
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
            <div>
                <span>Имя проекта:</span>
                <input id="nameProject" name="nameProject" value="">
            </div>
            <div>
                <span>Описание проекта:</span>
                <input id="deskProject" name="deskProject" value="">
            </div>
            <div>
                <span>Статус проекта:</span>
                <select name="statusProject" id="statusProject">
                    <option value="открыт" selected>Открыт</option>
                    <option value="закрты">Закрыт</option>

                </select>
            </div>
        <div style="
    margin-top: 18px;
" class="btn btn-primary" onclick="addProject()">Сохранить</div>

        </form>
    </div>
    <div id="listProject">


    </div>

</div>
<script>
    $(document).ready(function(){

        refreshTable();

    });
    function refreshTable()
    {
        $.get('<?php echo site_url("project/getListProject")?>', function(data){
            $('#listProject').html(data);
        });
    }

    function addProject()
    {
        $.post($('form').attr('action'), $('form').serializeArray(), function (data) {
            console.log(data);
            location.reload();
        });

    }

</script>