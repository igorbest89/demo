<div class="content">
    <div class="storage-form">
        <h2>ФОРМА УПРАВЛЕНИЯ СКЛАДОМ</h2>

        <p style="margin-bottom:20px;">Через данную форму Вы можете внести приходные накладные по сырью</p>
        <hr>
        <?php echo form_open('storage'); ?>
        <input type="hidden" name="action" id="action" value="save">
        <input type="hidden" name="id_storage" id="id_storage" value="-1">

        <div style="
    width: 49%;
    float: left;
	margin-bottom: 20px;

"><span>Номер накладной:</span>
            <input type="text" name="article" id="article"></div>
        <div style="
    width: 49%;
    float: right;
	margin-bottom: 20px;

"><span>Тип сырья (материал)</span>
            <select class="tipmat" name="type_material" id="type_material">
                <?php foreach ($type_materials as $value) { ?>
                    <option value="<?php echo $value->id_material; ?>"><?php echo $value->name_material; ?></option>
                <?php } ?>
            </select></div>
        <div style="
    width: 49%;
    float: left;
	margin-bottom: 20px;

"><span>Количество:</span>
            <input type="text" name="count" id="count"></div>
        <div style="
    width: 49%;
    float: right;
	margin-bottom: 20px;

"><span>Вес:</span>
            <input type="text" name="weight" id="weight"></div>
        <div style="
    width: 49%;
    float: left;
	margin-bottom: 20px;

"><span>Ширина:</span>
            <input type="text" name="width" id="width"></div>
        <div style="
    width: 49%;
    float: right;
	margin-bottom: 20px;

"><span>Высота:</span>
            <input type="text" name="height" id="height">
        </div>
        <div style="
    width: 49%;
    float: left;
	margin-bottom: 20px;

"><span>Длинна:</span>
            <input type="text" name="deep" id="deep">
        </div>






        <div style="
    width: 49%;
    float: left;
	margin-bottom: 20px;

"><span>Производитель:</span>
            <select class="tipmat" name="manufacturer" id="manufacturer">
                <?php foreach ($manufacturers as $value) { ?>
                    <option value="<?php echo $value->id_manufacturer; ?>"><?php echo $value->name; ?></option>
                <?php } ?>

            </select></div>
        <div style="
    width: 49%;
    float: right;
	margin-bottom: 20px;

"><span>Дата</span>
            <input name="input-date" id="input-data" type="text"></div>
        <span>Коментарий к завозу:</span><br>
        <textarea name="comment" id="comment"></textarea><br>
        <span>Сумма по накладной:</span>
        <input type="text" name="sum" id="sum" value="0">

        <div style="
    margin-top: 34px;
    width: 21%;
    /* float: left; */
" class="btn btn-primary" onclick="addStrage()"><span>Сохранить</span></div>
        </form>
        <h2>СПИСОК ВСЕХ НАКЛАДНЫХ ПО ПРЕДПРИЯТИЮ</h2>

        <p>При необходимости вы можете редактировать или удалять существующий накладные.</p>

        <div class="info-table">
            <?php echo $storage_table; ?>
        </div>

        <div class="action">


        </div>
    </div>
</div>
<script>


    function getStorage(id_sorage) {
        var send = {
            'data': id_sorage
        }
        $.post('<?php echo site_url("storage/getUpdateData")?>', send, function (data) {


            console.log(data);
            console.log($.parseJSON(data));
            var temp = $.parseJSON(data);
            console.log(temp['0']['date']);
            $('#action').val('update');
            $('#article').val(temp['0']['name']);
            $('#id_storage').val(temp['0']['id_storage']);
            $("#type_material [value=" + temp['0']['id_material'] + "]").attr("selected", "selected");
            $('#count').val(temp['0']['counts']);
            $('#weight').val(temp['0']['weight']);
            $("#manufacturer [value=" + temp['0']['id_manufacturer'] + "]").attr("selected", "selected");
            $('#input-data').val(temp['0']['date']);
            $('#comment').val(temp['0']['coment']);
            $('#sum').val(temp['0']['sum']);
            $('#width').val(temp['0']['width']);
            $('#height').val(temp['0']['height']);
            $('#deep').val(temp['0']['deep']);
            //$('#type_material').get(0).selectedIndex=temp['0']['id_manufacturer'];//val(temp['0']['id_manufacturer']);
            // location.reload();
        });
    }

    function addStrage() {
        $.post($('form').attr('action'), $('form').serializeArray(), function (data) {
            console.log(data);
            location.reload();
        });
    }

    function deleteStorage(id_sorage) {
        var send = {
            'data': id_sorage
        }
        $.post('<?php echo site_url("storage/deleteStorage")?>', send, function (data) {
            console.log(data);
            location.reload();
        });
    }


    $("#input-data").datepicker({dateFormat: "yy-mm-dd"});


</script>
