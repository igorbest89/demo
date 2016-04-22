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
                <td><?php echo $value->username; ?></td>
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
         <div><input name="typeworkadd" id="typework" type="text" value=""></div><div class="btn btn-primary" onclick=""><i class="fa fa-plus"></i> </div>

     </div>






<script type="text/javascript">

    function addTypeWork()
    {
        
    }

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
</script>
</div>