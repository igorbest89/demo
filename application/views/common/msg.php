<pre>
<?php
  //  print_r($_SESSION['login']);
?>
</pre>
<?php if(isset($errors)) {
    foreach($errors as $value) {?>
    <div class="errorMsg"><?php
            echo $value;
        ?></div>
<?php }
}?>
<?php if(isset($msgs)){
    foreach($msgs as $value){
        ?>
        <div class="msg">
            <?php echo $value;?>
        </div>
        <?php
    }
}?>
