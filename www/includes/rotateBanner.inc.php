<link rel="stylesheet" href="<?php echo CSS_DIR; ?>/nivo-slider.css" type="text/css" media="screen" />


            <div id="slider" class="nivoSlider">
			<?php
			try 
			{
				
				$Uploader = new Uploader();
				$Banner = new Banner();
				$result = $Banner -> gets(" AND status='active' ");
				while($show = $result->fetch_array(MYSQL_ASSOC))
				{
					$linkPath = 'banner_details.php?b_id='.$show['id'];
					echo $Uploader->imageViewer($show['photo'], BANNER_WIDTH, BANNER_HEIGHT, $linkPath, '', '',$show['title'], 'banners/', 2);
				}	
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
		?>
            </div>        
    <script type="text/javascript" src="<?php echo JS_DIR; ?>/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
	</div>
