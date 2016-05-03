    
				
				<ul class="nav navbar-nav side-nav">
				 <div class="collapse navbar-collapse navbar-ex1-collapse">
                <div class="menu">
				<ul style="
    margin-left: 0;
    list-style: none;
    display: initial;
    /* padding-bottom: 12px; */
">
 

 <?php
    if(isset($menu)) {
        foreach ($menu as $value) {
          ?>
           <li style="nmargin-bottom:10px; border-bottom:1px solid white;"> <?php echo $value['item']; ?></li>

            <?php
        }
    }
    ?>

</div></div>

                </ul>
            </div>

