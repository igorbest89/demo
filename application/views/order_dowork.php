<div class="content">
    <?php if(isset($error)){
                echo $error;
            }else{
        ?>


<!--            <pre>-->
<!--                --><?php //print_r($order_info);?>
<!--            </pre>-->

        <div id="orderInfo">
            <form action="<?php echo site_url("order/updateOrderStart")?>" enctype="multipart/form-data" id="formAddOrder"  method="POST">
               <input type="hidden" value="<?php echo $order_id;?>" name="order_id">
                <span><?php echo $order_info['id_order'];?></span>
                <span>Название заказа:</span>
                <?php echo $order_info['order_name'];?>
<!--                <input type="text" name="order_name" id="order_name" value="--><?php //echo $order_info['order_name'];?><!--">-->
                <span> Авртикль:</span>
                <?php echo $order_info['artikle'];?>
<!--                <input type="text" name="artikle" id="artikle" value="--><?php //echo $order_info['artikle'];?><!--">-->
                <span>Тип работы:</span>
                <span><?php echo $order_info['type_work'];?></span>
                <span>Дата начало работы:</span>
                <input type="text" name="date_start" id="date_start" value="<?php echo isset($order_info['date_start'])?$order_info['date_start']:'';?>">
                <span>Дата конца работы:</span>
                <input type="text" name="date_end" id="date_end" value="<?php echo isset($order_info['date_end'])?$order_info['date_end']:'';?>">
                <span>Вес:</span>
                <?php echo isset($order_info['weight'])?$order_info['weight']:'';?>
<!--                <input type="text" name="weight" id="weight" value="--><?php //echo isset($order_info['weight'])?$order_info['weight']:'';?><!--">-->
                <span>Коментарий:</span>
                <input type="text" name="comment" id="comment" value="<?php echo isset($order_info['comment'])?$order_info['comment']:'';?>">

<!--                <input type="submit" name="load_files" value="начать работу" />-->
                <div class="btn btn-primary" onclick="startWork()">Начать работу</div>
                <div class="btn btn-primary" onclick="endWork()">Завершить работу</div>
            </form>
        </div>
        <div class="Renders">
            <?php foreach($order_info['images_render'] as $value){?>
                <div class="itemImage"><img src="/upload/<?php echo $value['path'];?>" width="120" height="120"/></div>
            <?php }?>
        </div>
        <div class="neworder">
            <?php foreach($order_info['images_new'] as $value){?>
                <div class="itemImage"><img src="/upload/<?php echo $value['path'];?>" width="120" height="120"/></div>
            <?php }?>
        </div>
        <div class="images_cart">
            <?php foreach($order_info['images_cart'] as $value){?>
                <div class="itemImage"><img src="/upload/<?php echo $value['path'];?>" width="120" height="120"/></div>
            <?php }?>
        </div>
        <div>
            <form name="addRender">
                <input type="file" min="1" max="9999" name="file[]" multiple="true" />

            </form>
            <div class="btn btn-primary" onclick="loadRender()">Загрузить Render</div>
        </div>

        <div>
            <form name="addCart">
                <input type="file" min="1" max="9999" name="file[]" multiple="true" />

            </form>
            <div class="btn btn-primary" onclick="loadCart()">Загрузить Карту</div>
        </div>

    <?php } ?>
</div>

<script>

    $("#date_start").datepicker({ dateFormat: "yy-mm-dd" });
    $("#date_end").datepicker({ dateFormat: "yy-mm-dd" });
    function endWork()
    {
        $.post('<?php echo site_url("order/updateOrderEnd")?>',$('#formAddOrder').serializeArray(),function(data){
            console.log(data);
        });
    }
    function startWork()
    {
        $.post('<?php echo site_url("order/updateOrderStart")?>',$('#formAddOrder').serializeArray(),function(data){
            console.log(data);
        });
    }

    function loadRender() {
        // создать объект для формы
        var formData = new FormData(document.forms.addRender);

        // добавить к пересылке ещё пару ключ - значение
        formData.append("order_id", "<?php echo $order_info['id_order'];?>");

        // отослать
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo site_url("order/addRenderToOrder")?>");
        xhr.send(formData);
    }
    function loadCart() {
        // создать объект для формы
        var formData = new FormData(document.forms.addRender);

        // добавить к пересылке ещё пару ключ - значение
        formData.append("order_id", "<?php echo $order_info['id_order'];?>");

        // отослать
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo site_url("order/addCartToOrder")?>");
        xhr.send(formData);
    }
</script>