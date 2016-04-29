<div class="content">
        <div id="addOrder">
            <h2>Добавить заказ в работу</h2>
            <form action="<?php echo site_url("order/addOrder")?>" enctype="multipart/form-data" id="formAddOrder" method="POST">
                <span>Имя заказа:</span>
                <input name="nameOrder" type="text" id="nameOrder"><br>
                <span>Артикул:</span>
                <input name="article" type="text" id="article"><br>
                <span>Тип работы:</span>

                <select name="type_work" id="type_work">
                    <?php foreach($type_works as $value){?>
                        <option value="<?php echo $value->id_type_work;?>"><?php echo $value->name_work;?></option>
                    <?php } ?>
                </select><br>
                <span>Исполнитель:</span><br>
                <select name="users" id="users">
                    <?php foreach($users as $value){?>
                        <option value="<?php echo $value->id_user;?>"><?php echo $value->username;?></option>
                    <?php } ?>
                </select><br>
                <span>Вес:</span><br>
                <input type="text" name="weight" id="weight">
                <span>Коменетарий к заказу:</span>
                <input type="text" name="comment" id="comment">
                <br>
                <span>Загрузить Изображения:</span>
                <input type="file" min="1" max="9999" name="file[]" multiple="true" />
                <input type="submit" name="load_files" value="Сохранить заказ" />
<!--                <div class="btn btn-primary" id="btnSaveOrder" onclick="addOrder()">Сохранить заказ</div>-->
            </form>
        </div>
        <div id="worksStack">
           <?php foreach($active_work as $value){?>
                <div class="workselement">
                    <div class="itemWork">
                        <span><?php echo $value->id_order;?></span>
                        <span><a href ="<?php echo site_url("order/doWork")?>?order_id=<?php echo $value->id_order;?>"> <?php echo $value->order_name;?></a></span>
                        <span><?php echo $value->artikle;?></span>
                        <span><?php echo $value->status;?></span>
                        <span><?php echo $value->name_work;?></span>
                        <span><?php echo $value->username;?></span>
                        <img src="/upload/<?php echo $value->path;?>" width="128" height="128"/>
                        <div><a href="<?php echo site_url("order/usedMaterial")?>?order_id=<?php echo $value->id_order;?>">Фрезеровка</a></div>
                    </div>
                </div>
           <?php }?>

<!--            <pre>-->
<!--                --><?php //print_r($active_work);?>
<!--            </pre>-->
        </div>



</div>



<script>
    function addOrder()
    {
        $.post($('#formAddOrder').attr('action'),$('#formAddOrder').serializeArray(),function(data){
            console.log(data);
            //location.reload();
        });

    }

</script>