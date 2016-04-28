<div class="content">
<div class="storage-form">
        <?php echo form_open('storage'); ?>
            <input type="hidden" name="action" id="action" value="save">
            <input type="hidden" name="id_storage" id="id_storage" value="-1">
            <span>Номер накладной:</span>
            <input type="text" name="article" id="article">
            <span>тип сырья</span>
            <select name="type_material" id="type_material">
            <?php foreach($type_materials as $value){?>
                <option value="<?php echo $value->id_material;?>"><?php echo $value->name_material;?></option>
            <?php } ?>
            </select>
            <span>Количество:</span>
            <input type="text" name="count" id="count">
            <span>Вес:</span>
            <input type="text" name="weight" id="weight">
            <span>Производитель:</span>
            <select name="manufacturer" id="manufacturer">
                <?php foreach ($manufacturers as $value){?>
                    <option value="<?php echo $value->id_manufacturer;?>"><?php echo $value->name;?></option>
                <?php }?>

            </select>
            <span>Дата</span>
            <input name="input-date" id="input-data" type="text">
            <span>Коментарий к завозу:</span><br>
            <textarea name="comment" id="comment"></textarea><br>
            <span>Сумма:</span>
            <input type="text" name="sum" id="sum" value="0">
            <div class="btn btn-primary" onclick="addStrage()"><span>Сохранить</span></div>
    </form>
    </div>
<div class="info-table">
    <?php echo $storage_table;?>
</div>
    <div class="action">
        <?php foreach($storage as $value){?>
            <div class="btn btn-primary" onclick="getStorage('<?php echo $value['id_storage'];?>')"><i class="fa fa-pencil"></i> </div>
            <div class="btn btn-danger" onclick="deleteStorage('<?php echo $value['id_storage'];?>')"><i class="fa fa-trash"></i> </div>
        <?php }?>

    </div>
</div>
<script>


    function getStorage(id_sorage)
    {
        var send={
            'data': id_sorage
        }
        $.post('<?php echo site_url("storage/getUpdateData")?>',send,function(data){


            console.log(data);
            console.log($.parseJSON(data));
            var temp = $.parseJSON(data);
            console.log(temp['0']['date']);
            $('#action').val('update');
            $('#article').val(temp['0']['name']);
            $('#id_storage').val(temp['0']['id_storage']);
            $("#type_material [value="+temp['0']['id_material']+"]").attr("selected", "selected");
            $('#count').val(temp['0']['counts']);
            $('#weight').val(temp['0']['weight']);
            $("#manufacturer [value="+temp['0']['id_manufacturer']+"]").attr("selected", "selected");
            $('#input-data').val(temp['0']['date']);
            $('#comment').val(temp['0']['coment']);
            $('#sum').val(temp['0']['sum']);
            //$('#type_material').get(0).selectedIndex=temp['0']['id_manufacturer'];//val(temp['0']['id_manufacturer']);
           // location.reload();
        });
    }

    function addStrage()
        {
            $.post($('form').attr('action'),$('form').serializeArray(),function(data){
                console.log(data);
                location.reload();
            });
        }

        function deleteStorage(id_sorage)
        {
            var send={
                'data': id_sorage
            }
            $.post('<?php echo site_url("storage/deleteStorage")?>',send,function(data){
                console.log(data);
                location.reload();
            });
        }


        $("#input-data").datepicker({ dateFormat: "yy-mm-dd" });


</script>
