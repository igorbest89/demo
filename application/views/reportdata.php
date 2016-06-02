<?php if($type=="storage"){?>
    <table>
        <tr class="titlet">
            <td>Номер</td>
            <td>Название</td>
            <td>Материал</td>
            <td>Количество</td>
            <td>Вес</td>
            <td>Дата поступления</td>
            <td>Коментарий</td>
            <td>Сумма (грн)</td>
        </tr>
        <?php foreach($info as $value){ ?>
         <tr>
            <td><?php echo $value->id_storage;?></td>
            <td><?php echo $value->name;?></td>
            <td><?php echo $value->name_material;?></td>
            <td><?php echo $value->counts;?></td>
            <td><?php echo $value->weight;?></td>
            <td><?php echo $value->date;?></td>
            <td><?php echo $value->coment;?></td>
            <td><?php echo $value->sum;?></td>
         </tr>
        <?php } ?>
    </table>
<?php } ?>
<?php if($type=="material"){?>
<!--    <pre>-->
<!--        --><?php //print_r($info);?>
<!--    </pre>-->
    <table>
        <tr class="titlet">
            <td>Номер</td>
            <td>Название материала</td>

            <td>Остаток на складе (грамм)</td>

        </tr>
        <?php foreach($info as $value){ ?>
        <tr>
            <td><?php echo $value['id_order'];?></td>
            <td><?php echo $value['name_material'];?></td>
            <td><?php echo $value['count'];?></td>
        </tr>
        <?php } ?>
    </table>
<?php } ?>
