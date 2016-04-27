<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 16.04.2016
 * Time: 12:56
 */?>
 <div class="content"><h2>Управление пользователями</h2>
 <p>В данном разделе Вы можете добавить нового пользователя в сиситему или изменить учетные данные существующего</p>
<form class="content1" name="user">
    <label>Имя пользователя:</label><input type="text" name="username" id="username"/>
    <label>Пароль пользователя:</label><input type="text" name="password" id="password"/>
    <label>Права пользователя:</label><select name="permission" id="permission">
        <option value="1">Бухгалтер</option>
        <option value="2">Дизайнер</option>

    </select>
    <div id="but" onclick="addUser()" class="button" style="cursor: pointer"><i class="fa fa-plus" aria-hidden="true"></i>Сохранить</div>
</form>
     <div id="userList">


     </div>
<div class="listuser">
    <table>

        <?php foreach($user_list as $value){?>
            <tr>
                <td>

                    <?php echo $value->id_user; ?></td>
                <td style = "margin-right: 10px;"><?php echo $value->username; ?></td>
                <td><div class="btn btn-danger" onclick="deleteUser('<?php echo $value->id_user;?>')"><i class="fa fa-trash"></i> </div> </td>
            </tr>



        <?php }?>
    </table>
</div>
     <div>
         <hr>
     </div>
     <div class="typeWork">
        <h2>Добавить Тип работы</h2>
         <div style="width: 120px; float:left;padding-right: 10px;">
             <input name="typeworkadd" id="typework" type="text" value="">
             <input name="idEditTypeWork" id="id_type_work" type="hidden" value="">
         </div>

         <div id="addWork">
            <div class="btn btn-primary" onclick="addTypeWork()"><i class="fa fa-plus"></i> </div>
         </div>
         <div id="updateWork" style="display: none;">
             <div class="btn btn-primary" onclick="updateTypeWork()"><i class="fa fa-save"></i> </div>
         </div>
         <table>
                <?php foreach($type_work as $value){?>
                <tr>
                    <td><?php echo $value->id_type_work;?></td>
                    <td><?php echo $value->name_work;?></td>
                    <td><div class="btn btn-danger" onclick="deleteTypeWork('<?php echo $value->id_type_work;?>')"><i class="fa fa-trash"></i> </div></td>
                    <td><div class="btn btn-primary" onclick="editType('<?php echo $value->id_type_work;?>','<?php echo $value->name_work;?>')"><i class="fa fa-pencil"></i> </div> </td>
                </tr>

                <?php }?>


         </table>
     </div>
<hr>
     <div class="type_material">
         <h2>Добавление Типов расходников</h2>
         <div style="width: 120px; float:left;padding-right: 10px;">
             <input name="name_material" id="type_name_mat" type="text" value="">
             <input name="idEditTypeMaterial" id="id_type_mat" type="hidden" value="">
         </div>
         <div id="addMat">
             <div class="btn btn-primary" onclick="addTypeMat()"><i class="fa fa-plus"></i> </div>
         </div>
         <div id="updateMat" style="display: none;">
             <div class="btn btn-primary" onclick="updateTypeMat()"><i class="fa fa-save"></i> </div>
         </div>

         <table>
             <?php foreach($type_materials as $value){?>
                 <tr>
                     <td><?php echo $value->id_material;?></td>
                     <td><?php echo $value->name_material;?></td>
                     <td><div class="btn btn-danger" onclick="deleteTypeMat('<?php echo $value->id_material;?>')"><i class="fa fa-trash"></i> </div></td>
                     <td><div class="btn btn-primary" onclick="editTypeMat('<?php echo $value->id_material;?>','<?php echo $value->name_material;?>')"><i class="fa fa-pencil"></i> </div> </td>
                 </tr>

             <?php }?>


         </table>

     </div>



     <script type="text/javascript">
         //типы материалов
         function editTypeMat(id,type_work)
         {
             $('#type_name_mat').val(type_work);
             $('#id_type_mat').val(id);
             $('#updateMat').css('display','block');
             $('#addMat').css('display','none');
         }
         function updateTypeMat()
         {
             var send ={
                 'data':{
                     'id_material':$('#id_type_mat').val(),
                     'name_material':$('#type_name_mat').val(),
                     'config':''
                 }
             }
             $.post('<?php echo site_url("usermanager/updateTypeMaterial")?>',send,function(data){
                 console.log(data);
                 location.reload();
             });

         }
         function deleteTypeMat(id_work)
         {
             var send={
                 'data': id_work
             }
             $.post('<?php echo site_url("usermanager/deleteTypeMaterial")?>',send,function(data){
                 console.log(data);
                 location.reload();
             });

         }
         function addTypeMat()
         {
             var send ={
                 'data':{
                     name_material:$('#type_name_mat').val(),
                     config:''
                 }
             }
             $.post('<?php echo site_url("usermanager/addTypeMaterial")?>', send, function(data){
                 location.reload();
             });
         }


     </script>

<script type="text/javascript">
//типы работ
    function editType(id,type_work)
    {
        $('#typework').val(type_work);
        $('#id_type_work').val(id);
        $('#updateWork').css('display','block');
        $('#addWork').css('display','none');
    }
        function updateTypeWork()
        {
            var send ={
                'data':{
                        'id_work':$('#id_type_work').val(),
                        'typeworkadd':$('#typework').val()
                }
            }
            $.post('<?php echo site_url("usermanager/updateTypeWork")?>',send,function(data){
                console.log(data);
                location.reload();
            });

        }
        function deleteTypeWork(id_work)
        {
            var send={
                'data': id_work
            }
            $.post('<?php echo site_url("usermanager/deleteTypeWork")?>',send,function(data){
                console.log(data);
                location.reload();
            });

        }
        function addTypeWork()
        {
            var send ={
                'data':{
                    typework:$('#typework').val()
                }
            }
            $.post('<?php echo site_url("usermanager/addTypeWork")?>', send, function(data){
                location.reload();
            });
        }


</script>


<script type="text/javascript">
//пользователи


    function deleteUser(id)
    {
        var send = {
                    'data':{
                            'id_user':id
                            }
                }
        $.post('<?php echo site_url("usermanager/deleteUser")?>', send, function(data){

            location.reload();

        });
    }

    function addUser()
    {
        var send ={
            'data':{
                'username':$('#username').val(),
                'password':$('#password').val(),
                'permission':$('#permission').val()
            }
        }
        console.log(send);
        $.post('<?php echo site_url("usermanager/addUser");?>',send, function(data){
            if(data=='-1')
            {
                alert("Такой пользователь уже сушествует");
            }
            location.reload();
            console.log(data);
        });
    }
//    конец пользователей
</script>
</div>