<?php if($type=="storage"){?>
    <table>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td>Материал</td>
            <td>Количество</td>
            <td>Вес</td>
            <td>Дата</td>
            <td>Коментарий</td>
            <td>Сумма</td>
        </tr>
        <?php foreach($info as $value){ ?>
            <td><?php echo $value->id_storage;?></td>
            <td><?php echo $value->name;?></td>
            <td><?php echo $value->name_material;?></td>
            <td><?php echo $value->counts;?></td>
            <td><?php echo $value->weight;?></td>
            <td><?php echo $value->date;?></td>
            <td><?php echo $value->coment;?></td>
            <td><?php echo $value->sum;?></td>
        <?php } ?>
    </table>
<?php } ?>
<?php if($type=="material"){?>
    <table>
        <tr>
            <td>Номер</td>
            <td>Название</td>
            <td>Материал</td>
            <td>Количество</td>
            <td>Вес</td>
            <td>Дата</td>
            <td>Коментарий</td>
            <td>Сумма</td>
        </tr>
        <?php foreach($info as $value){ ?>
            <td><?php echo $value->id_storage;?></td>
            <td><?php echo $value->name;?></td>
            <td><?php echo $value->name_material;?></td>
            <td><?php echo $value->counts;?></td>
            <td><?php echo $value->weight;?></td>
            <td><?php echo $value->date;?></td>
            <td><?php echo $value->coment;?></td>
            <td><?php echo $value->sum;?></td>
        <?php } ?>
    </table>
<?php } ?>
