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
    <div id="but" class="button" style="cursor: pointer"><i class="fa fa-plus" aria-hidden="true"></i>Сохранить</div>
</form>
<pre>
<?php print_r($permission); ?>
    </pre>
<script type="text/javascript">



    function addUser()
    {
        var send ={
            'data':{
                'username':$('username').val(),
                'password':$('password').val(),
                'permission':$('permission').val()
            }
        }
        $.post('<?php echo site_url("usermanager/addUser");?>',send, function(data){
            if(data=='-1')
            {
                alert("Такой пользователь уже сушествует");
            }
            console.log(data);
        });
    }
</script>
</div>