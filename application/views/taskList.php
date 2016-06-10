<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 10.06.2016
 * Time: 14:46
 */
?>

<div class="content">
    <form action="<?php echo site_url("OpenTask/search") ?>" id="searchform">
        <input type="text" name="search" id="search">
        <select name="status" id="status">
            <option value="0000-00-00">Не вработе</option>
            <?php foreach($status as $key=>$value){?>
                <option value="<?php echo $key;?>"><?php echo $value;?></option>

            <?php }?>
        </select>

        <div class="btn btn-success" onclick="search()"><i class="fa fa-search"></i> </div>

    </form>
    <div id="result">

    </div>
</div>
<script>
    $(document).ready(function(){
        search();

    });
    function search()
    {
        $.post($('#searchform').attr('action'),$('#searchform').serializeArray(),function(data){
            $('#result').html(data);
        });
    }
</script>
