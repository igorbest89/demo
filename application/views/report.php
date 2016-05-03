<div class="content">
    <div id="filter">
        <label>Накладные по дате:</label>
       <form name="datefilter" id="datefilter">

        От:<input type="text" name="date_start" id="date_start">
        до:<input type="text" name="date_end" id="date_end">
           <div class="btn btn-primary" onclick="dateStorage()">Фильровать</div>
       </form>
       <label>
           Остаток на складе материала:
       </label>
<!--        <form name="matFilter" id="matFilter">-->
<!--            <label>Остаток материала:</label>-->
<!--            <select name="type_work" id="type_work">-->
<!--                --><?php //foreach($type_materials as $value){?>
<!--                    <option value="--><?php //echo $value->id_material;?><!--">--><?php //echo $value->name_material;?><!--</option>-->
<!--                --><?php //} ?>
<!--            </select><br>-->
<!--            <div class="btn btn-primary" onclick="materialStock()">Фильровать</div>-->
<!--        </form>-->

    </div>
    <div id="data"></div>

</div>
<script>
    $("#date_start").datepicker({ dateFormat: "yy-mm-dd" });
    $("#date_end").datepicker({ dateFormat: "yy-mm-dd" });
    function materialStock()
    {
        $.post('<?php echo site_url("report/showMaterialStock")?>',$('#datefilter').serializeArray(),function(data){
            console.log(data);
            $('#data').html(data);
        });
    }

    function dateStorage()
        {
            $.post('<?php echo site_url("report/showStorage")?>',$('#datefilter').serializeArray(),function(data){
                console.log(data);
                $('#data').html(data);
            });
        }
</script>