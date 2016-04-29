    
				
				<ul class="nav navbar-nav side-nav">
				 <div class="collapse navbar-collapse navbar-ex1-collapse">
                <div class="menu">
 

 <?php
    if(isset($menu)) {
        foreach ($menu as $value) {
          ?>
            <?php echo $value['item']; ?>

            <?php
        }
    }
    ?>

</div></div>

                </ul>
            </div>

