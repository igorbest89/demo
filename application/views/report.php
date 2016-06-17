<div class="content">
    <div id="filter">
	<h2>Отчеты по приходу, расходу материалов на складе</h2><br/>
       <div style=" float:left;  width: 30%;border: 1px solid #CCCCCC;     margin-right: 20px;padding: 14px;border-radius: 6px;">
                <h3>Накладные за период:</h3>
               <form name="datefilter" id="datefilter">
<table class="filtert"><tr>
                <td ><label>От:</label></td><td><label>До:</label></td>
	</tr><tr>
				<td><input style="
    width: 99%;
" type="text" name="date_start" id="date_start"></td><td><input style="
    width: 99%;
" type="text" name="date_end" id="date_end"></td></tr></table>
                   <div style="
    margin-top: 10px;
" class="btn btn-primary" onclick="dateStorage()">ПОКАЗАТЬ</div>
               </form>
       </div>
       <div style=" margin-bottom: 44px; float:left; margin-right:20px;  width: 30%;border: 1px solid #CCCCCC;padding: 14px;border-radius: 6px;">
        <h3>Накладные по остатку материалов:</h3>
	 
       <div> <form name="matFilter" id="matFilter">
           <table class="filtert"><tr><td> <label>ДО:</label></td><td><label></label></td></tr>
		   <tr><td><input style="
    width: 99%;
" type="text" name="date_start" id="date_startm"></td><td> <!--<input style="
    width: 99%;
" type="text" name="date_end" id="date_endm">--></td></tr></table>
          

<!--            <label>Отчет по остатку мтериала:</label>-->
<!--            <select style="-->
<!--    width: 98%;-->
<!--    height: 39px;-->
<!--    background: #FBFBFB;-->
<!--    border: 1px solid #E0DEDE;-->
<!--    margin-bottom: 87px;-->
<!--" name="id_material" id="id_material">-->
<!--                --><?php //foreach($type_materials as $value){?>
<!--                    <option value="--><?php //echo $value->id_material;?><!--">--><?php //echo $value->name_material;?><!--</option>-->
<!--                --><?php //} ?>
<!--            </select><br>-->
            <div style="
    margin-top: 10px;
" class="btn btn-primary" onclick="materialStock()">ПОКАЗАТЬ</div>
        </form>
       </div></div>

        <div style=" margin-bottom: 44px; float:left; margin-right:20px;  width: 30%;border: 1px solid #CCCCCC;padding: 14px;border-radius: 6px;">
            <h3>Расход материала за период:</h3>
         
            <div>
                <form name="matRFilter" id="rashod">
				<table class="filtert"><tr>
                <td ><label>От:</label></td><td><label>До:</label></td></tr>
				<tr><td><input style="
    width: 99%;
" type="text" name="date_start" id="date_startm1"></td><td><input style="
    width: 99%;
" type="text" name="date_end" id="date_endm1"></td></tr></table>
				

                    <!--            <label>Отчет по остатку мтериала:</label>-->
                    <!--            <select style="-->
                    <!--    width: 98%;-->
                    <!--    height: 39px;-->
                    <!--    background: #FBFBFB;-->
                    <!--    border: 1px solid #E0DEDE;-->
                    <!--    margin-bottom: 87px;-->
                    <!--" name="id_material" id="id_material">-->
                    <!--                --><?php //foreach($type_materials as $value){?>
                    <!--                    <option value="--><?php //echo $value->id_material;?><!--">--><?php //echo $value->name_material;?><!--</option>-->
                    <!--                --><?php //} ?>
                    <!--            </select><br>-->
                    <div style="
    margin-top: 10px;
" class="btn btn-primary" onclick="materiaRashod()">ПОКАЗАТЬ</div>
                </form>
            </div></div>


    </div>
    <div id="data"></div>

</div>
<script>
    $('#id_material').chosen();
    $("#date_start").datepicker({ dateFormat: "yy-mm-dd" });
    $("#date_end").datepicker({ dateFormat: "yy-mm-dd" });
    $("#date_startm").datepicker({ dateFormat: "yy-mm-dd" });
    $("#date_endm").datepicker({ dateFormat: "yy-mm-dd" });
    $("#date_startm1").datepicker({ dateFormat: "yy-mm-dd" });
    $("#date_endm1").datepicker({ dateFormat: "yy-mm-dd" });
    function materialStock()
    {
        $.post('<?php echo site_url("report/showInStockStatus")?>',$('#matFilter').serializeArray(),function(data){
            console.log(data);
            $('#data').html(data);
        });
    }

    function materiaRashod()
    {
        $.post('<?php echo site_url("report/rashod")?>',$('#rashod').serializeArray(),function(data){
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