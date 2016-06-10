<div class="content">
    <?php if(isset($error)){
        echo $error;
    }else{
    ?>
        <div class="images">
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
        </div>
        <form name="material" id="material">
            <input type="hidden" name="order_id" value="<?php echo $order_id;?>">
        <?php foreach($type_materials as $value){?>
            <?php echo $value->name_material;?>
            <input name="id[<?php echo $value->id_material;?>]" value="0">
        <?php } ?>
            <div class="btn btn-primary" onclick="saveMaterial()">Сохранить</div>
        </form>
    <?php } ?>
</div>
<script>
    function saveMaterial(){
        $.post('<?php echo site_url("order/saveMaterialToOrder")?>',$('#material').serializeArray(),function(data){
            console.log(data);
        });
    }
</script>