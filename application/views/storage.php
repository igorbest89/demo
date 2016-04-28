<div class="storage-form" style="margin-left: 240px;">
        <?php echo form_open('storage'); ?>

            <span>Номер накладной:</span>
            <input type="text" name="article" id="article">
            <span>тип сырья</span>
            <select name="type_material" id="type_material">
            <?php foreach($type_materials as $value){?>
                <option value="<?php echo $value->id_material;?>"><?php echo $value->name_material;?></option>
            <?php } ?>
            </select>


        </form>
    </div>
