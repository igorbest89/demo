<div class="content">
    <div id="filter">
       <div style=" float:left;  width: 49%;border: 1px solid #CCCCCC;padding: 14px;border-radius: 6px;">
                <h2>Накладные по дате:</h2>
               <form name="datefilter" id="datefilter">
<br/>
                <label>От:</label>
				<br/>
				<input type="text" name="date_start" id="date_start">
				<br/>
                <label>До:</label>
				<br/><input type="text" name="date_end" id="date_end">
                   <div style="
    margin-top: 18px;
" class="btn btn-primary" onclick="dateStorage()">Фильровать</div>
               </form>
       </div>
       <div style=" margin-bottom: 44px; float:right; margin-right:20px;  width: 49%;border: 1px solid #CCCCCC;padding: 14px;border-radius: 6px;">
        <h2>Накладные по остатку материала:</h2>
	   <br/>
       <div> <form name="matFilter" id="matFilter">
<!--            От:<input type="text" name="date_start" id="date_startm">-->
<!--            до:<input type="text" name="date_end" id="date_endm">-->

            <label>Отчет по остатку мтериала:</label>
            <select style="
    width: 98%;
    height: 39px;
    background: #FBFBFB;
    border: 1px solid #E0DEDE;
    margin-bottom: 87px;
" name="id_material" id="id_material">
                <?php foreach($type_materials as $value){?>
                    <option value="<?php echo $value->id_material;?>"><?php echo $value->name_material;?></option>
                <?php } ?>
            </select><br>
            <div class="btn btn-primary" onclick="materialStock()">Фильровать</div>
        </form>
       </div></div>
    </div>
    <div id="data"></div>

</div>
<script>
    $("#date_start").datepicker({ dateFormat: "yy-mm-dd" });
    $("#date_end").datepicker({ dateFormat: "yy-mm-dd" });
    $("#date_startm").datepicker({ dateFormat: "yy-mm-dd" });
    $("#date_endm").datepicker({ dateFormat: "yy-mm-dd" });
    function materialStock()
    {
        $.post('<?php echo site_url("report/showMaterialStock")?>',$('#matFilter').serializeArray(),function(data){
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