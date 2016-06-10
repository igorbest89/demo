<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 09.06.2016
 * Time: 13:37
 */?>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <td>ID Файла</td>
            <td>ID задачи</td>
            <td>Предпросмотр (если возможен)</td>
            <td>Скачать</td>
            <td>Удалить</td>
        </tr>
        </thead>
        <?php

        ?>
        <tbody>
        <?php foreach ($list_files as $value) { ?>
            <tr>
<!--                http://gold.loc/index.php/Taskmanager/downloadFiles?file_id=2-->
                <td><?php echo $value['id_files']; ?></td>
                <td><?php echo $value['id_task']; ?></td>
                <td class="text-center"><img src="/upload/<?php echo $value['path'] ?>"></td>
                <td class="text-center"><a class="btn btn-primary" href="<?php echo site_url("Taskmanager/downloadFiles/") ?>?file_id=<?php echo $value['id_files']; ?>"><i class="fa fa-download"></i> </a></td>
                <td class="text-center"><div class="btn btn-danger" onclick="deleteFile('<?php echo $value['id_files']; ?>')"><i class="fa fa-trash"></i> </div> </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<script>
   function deleteFile(file_id)
   {
       $.get('<?php echo site_url("Taskmanager/deleteFile")?>/?file_id='+file_id,function (data){
           refreshTable();
       });
   }
</script>
