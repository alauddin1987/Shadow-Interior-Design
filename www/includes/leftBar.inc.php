	<script type="text/javascript">
		$(document).ready(function() {
		
			// Store variables
			var accordion_head = $('.accordion > li > a'),
				accordion_body = $('.accordion li > .sub-menu');

			// Open the first tab on load

			//accordion_head.first().addClass('active').next().slideDown('normal');
			// Click function
			accordion_head.on('click', function(event) {

				// Disable header links
				
				//event.preventDefault();

				// Show and hide the tabs on click

				if ($(this).attr('class') != 'active'){
					accordion_body.slideUp('slow');
					$(this).next().stop(true,true).slideToggle('slow');
					accordion_head.removeClass('active');
					$(this).addClass('active');
				}

			});

		});

	</script>
<link rel="stylesheet" href="<?php echo CSS_DIR; ?>/accordionmenu.css" type="text/css" media="screen" />
<div id="leftside">
<ul class="navigation">Navigation Menu</ul>
		<ul class="accordion">
        
        
		<?php
              
            try
        
            {	
                
                $Module = new Module();
                $result = $Module->gets(" AND sort_level=1 AND status='active' AND position='left'");
				$count = 0; 
                while($show = $result->fetch_array(MYSQL_ASSOC))
                {
                $Childresult = $Module->gets(" AND sort_level=2 AND status='active' AND main_catid=".$show['module_id']);
        ?>
        
               <li id="<?php echo $count++; ?>"><a href="#1"><?php echo $show['name']; ?></a>
          <?php if($Childresult->num_rows >0)
		  {
			  
		?>
                <ul class="sub-menu">
         <?php
         
		
		while($showChild = $Childresult->fetch_array(MYSQL_ASSOC))
	
		{
		 
		 ?>
         
               
               
                <li><a href="#"><?php echo $showChild['name']; ?></a></li>
		<?php } ?>               
         </ul>
             </li>	
         <?php }
		 
		}

	}

	catch(Exception $e)

	{

		echo $e->getMessage();

	}
		 
		 ?>		
		</ul>
</div>