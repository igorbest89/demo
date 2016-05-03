<div class="content">
        <div id="addOrder">
            <h2>Добавить заказ в работу</h2>
			<p>В данном разделе Вы можете поставить новую задачу в работу</p>
            <form action="<?php echo site_url("order/addOrder")?>" enctype="multipart/form-data" id="formAddOrder" method="POST">
               <div style="width:49%; margin-bottom:20px; float:left"> <span>Имя заказа:</span>
                <input name="nameOrder" type="text" id="nameOrder"><br></div>
                <div style="width:49%; margin-bottom:20px; float:right"><span>Артикул:</span>
                <input name="article" type="text" id="article"><br></div>
                <div style="width:49%; margin-bottom:20px; float:left"><span>Тип работы:</span>

                <select class="tipmat" name="type_work" id="type_work">
                    <?php foreach($type_works as $value){?>
                        <option value="<?php echo $value->id_type_work;?>"><?php echo $value->name_work;?></option>
                    <?php } ?>
                </select></div>
                <div style="width:49%; margin-bottom:20px; float:right"><span>Исполнитель:</span><br>
                <select class="tipmat" name="users" id="users">
                    <?php foreach($users as $value){?>
                        <option value="<?php echo $value->id_user;?>"><?php echo $value->username;?></option>
                    <?php } ?>
                </select></div>
                <div style="margin-bottom:20px;"><span >Вес изделия (заполнять при необходимости):</span><br>
                <input type="text" name="weight" id="weight"></div>
                <div style="width:100%;"><span>Коменетарий к заказу:</span>
                <input style="height:100px;" type="text" name="comment" id="comment"></div>
                <br>
                <div style="float:left;"><span>Загрузить Изображения:</span>
                <input  type="file" min="1" max="9999" name="file[]" multiple="true" /></div>
                <div  style="float:right;"><input class="indown" type="submit" name="load_files" value="Сохранить заказ" /></div>
<!--                <div class="btn btn-primary" id="btnSaveOrder" onclick="addOrder()">Сохранить заказ</div>-->
            </form>
        </div>
        <div id="worksStack">
           <?php foreach($active_work as $value){?>
                <div class="workselement">
				<div class="itemWork">
                       <table style="width: 100%;"><tr> <td class="one">Номер задачи</td>
                        <td class="two">Ссылка на просмотр</td>
                        <td class="tri">Артикул</td>
                        <td class="four">Стутус задачи</td>
                        <td class="five">Тип работы</td>
                        <td class="six">Закреплена за</td>
                        <td class="seven">Изображение</td>
                        <td class="eight">Отчет по материалам</td></tr></table>
                    </div>
                    <div class="itemWork">
                       <table style="width: 100%;"><tr> <td class="one"><?php echo $value->id_order;?></td>
                       <td class="two"><a href ="<?php echo site_url("order/doWork")?>?order_id=<?php echo $value->id_order;?>"> <?php echo $value->order_name;?></a></td>
                       <td class="tri"><?php echo $value->artikle;?></td>
                         <td class="four"><?php echo $value->status;?></td>
                          <td class="five"><?php echo $value->name_work;?></td>
                       <td class="six"><?php echo $value->username;?></td>
                      <td class="seven"><img src="/upload/<?php echo $value->path;?>" width="128" height="128"/></span>
                       <td class="eight"><a href="<?php echo site_url("order/usedMaterial")?>?order_id=<?php echo $value->id_order;?>">Фрезеровка</a></td></tr></table>
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