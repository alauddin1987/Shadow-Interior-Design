 <link rel="stylesheet" href="<?php echo CSS_DIR; ?>/css_menu.css" />
        <ul class="dropdown">
<?php
try
{
	$Content = new Content();
	$resultCon = $Content->gets(" AND id=1 ");
	while($showCon = $resultCon -> fetch_array(MYSQL_ASSOC))
	{
?>
<li><a href="home"><?php echo $showCon['name']; ?></a></li>
<?php 
	}
}
catch(Exception $e)
{
	echo $e->getMessage();
}
?>
<?php
      
	try

	{	
		
		$Module = new Module();
		$result = $Module->gets(" AND sort_level=1 AND status='active' AND position='top'");
		while($show = $result->fetch_array(MYSQL_ASSOC))
		{
		$Childresult = $Module->gets(" AND sort_level=2 AND status='active' AND main_catid=".$show['module_id']);
		$link_one = $show['proxy_url'].'/'.$show['module_id'];
?>
		
		 <li> <a href="<?php echo $link_one ?>" class="fNiv"><?php echo $show['name']; ?></a>
          
          <?php if($Childresult->num_rows >0)
		  {
			  
		?>
          <ul>
         <?php
         
		
		while($showChild = $Childresult->fetch_array(MYSQL_ASSOC))
	
		{
		$Childr2esult = $Module->gets(" AND sort_level=3 AND status='active' AND main_catid=".$showChild['module_id']);
		$link_two = $showChild['proxy_url'].'/'.$showChild['module_id'];
		 ?>
         
         
         <li><a href="<?php echo $link_two; ?>"><?php echo $showChild['name']; ?></a>
          <?php if($Childr2esult->num_rows >0)
		  {
			  
		?>
         <ul>
         
         <?php
         
		
		while($show2Child = $Childr2esult->fetch_array(MYSQL_ASSOC))
	
		{
		$Childr3esult = $Module->gets(" AND sort_level=4 AND status='active' AND main_catid=".$show2Child['module_id']);
		$link_three = $show2Child['proxy_url'].'/'.$show2Child['module_id'];
		 ?>
         	 <li><a href="<?php echo $link_three; ?>" ><?php echo $show2Child['name']; ?></a>
          <?php if($Childr3esult->num_rows >0)
		  {
			  
		?>
         <ul>
         
         <?php
         
		
		while($show3Child = $Childr3esult->fetch_array(MYSQL_ASSOC))
	
		{
		$link_four = $show3Child['proxy_url'].'/'.$show3Child['module_id'];
		 ?>
          <li><a href="<?php echo $link_four; ?>"><?php echo $show3Child['name']; ?></a></li>
         <?php } ?>
        </ul>  
        <?php } ?>           
             </li>
         <?php } ?>
         </ul>
         <?php } ?>
         
         </li>
         <?php } ?>
         </ul>
         <?php } ?>
         </li>
		
<?php
	}

	}

	catch(Exception $e)

	{

		echo $e->getMessage();

	}
	$selected_page_class = (CURRENT_FILE_NAME=="article_categories.php") ? 'page_selected' : '';
	  
?>
      <li ><a href="article_categories.php"  class="fNiv">PUBLICATION<?php //echo PUBLICATION; ?></a></li>
      <li ><a href="news"  class="fNiv"><?php //echo SONGBAD; ?>NEWS</a></li>
        <li><a href="gallery_categories.php" class="fNiv"><?php //echo EXCLUSIVE_PHOTOGALLERY; ?>GALLERY</a></li>
        <li><a href="contact" class="fNiv"><?php echo CONTACT_US; ?></a></li>
      </ul>

<!--        <link rel="stylesheet" href="<?php echo CSS_DIR; ?>/jMenu.jquery.css" />
        <script type="text/javascript" src="<?php echo JS_DIR; ?>/jMenu.jquery.js"></script>
<div align="left">
        <ul id="jMenu">
<?php
try
{
	$Content = new Content();
	$resultCon = $Content->gets(" AND id=1 ");
	while($showCon = $resultCon -> fetch_array(MYSQL_ASSOC))
	{
?>
<li><a href="index.php"  class="fNiv"><?php echo $showCon['name'];; ?></a></li>
<?php 
	}
}
catch(Exception $e)
{
	echo $e->getMessage();
}
?>
<?php
      
	try

	{	
		
		$Module = new Module();
		$result = $Module->gets(" AND sort_level=1 AND status='active' AND position='top'");
		while($show = $result->fetch_array(MYSQL_ASSOC))
		{
		$Childresult = $Module->gets(" AND sort_level=2 AND status='active' AND main_catid=".$show['module_id']);
?>
		
		 <li> <a href="pages.php?page_id=<?php echo $show['module_id']; ?>" class="fNiv"><?php echo $show['name']; ?></a>
          
          <?php if($Childresult->num_rows >0)
		  {
			  
		?>
          <ul>
		<li class="arrow"></li>
         <?php
         
		
		while($showChild = $Childresult->fetch_array(MYSQL_ASSOC))
	
		{
		$Childr2esult = $Module->gets(" AND sort_level=3 AND status='active' AND main_catid=".$showChild['module_id']);
		 
		 ?>
         
         
         <li><a href="pages.php?page_id=<?php echo $showChild['module_id']; ?>"><?php echo $showChild['name']; ?></a>
          <?php if($Childr2esult->num_rows >0)
		  {
			  
		?>
         <ul>
         
         <?php
         
		
		while($show2Child = $Childr2esult->fetch_array(MYSQL_ASSOC))
	
		{
		$Childr3esult = $Module->gets(" AND sort_level=4 AND status='active' AND main_catid=".$show2Child['module_id']);
		 ?>
         	 <li><a href="pages.php?page_id=<?php echo $show2Child['module_id']; ?>" ><?php echo $show2Child['name']; ?></a>
          <?php if($Childr3esult->num_rows >0)
		  {
			  
		?>
         <ul>
         
         <?php
         
		
		while($show3Child = $Childr3esult->fetch_array(MYSQL_ASSOC))
	
		{
		 
		 ?>
          <li><a href="pages.php?page_id=<?php echo $show3Child['module_id']; ?>"><?php echo $show3Child['name']; ?></a></li>
         <?php } ?>
        </ul>  
        <?php } ?>           
             </li>
         <?php } ?>
         </ul>
         <?php } ?>
         
         </li>
         <?php } ?>
         </ul>
         <?php } ?>
         </li>
		
<?php
	}

	}

	catch(Exception $e)

	{

		echo $e->getMessage();

	}
	$selected_page_class = (CURRENT_FILE_NAME=="article_categories.php") ? 'page_selected' : '';
	  
?>
      <li ><a href="article_categories.php"  class="fNiv"><?php echo PUBLICATION; ?></a></li>
      <li ><a href="news_categories.php"  class="fNiv"><?php echo SONGBAD; ?></a></li>
        <li><a href="gallery_categories.php" class="fNiv"><?php echo EXCLUSIVE_PHOTOGALLERY; ?></a></li>
        <li><a href="contact_us.php" class="fNiv"><?php echo CONTACT_US; ?></a></li>
      </ul>
</div>           
        <script type="text/javascript">
            $(document).ready(function() {
									   
$(function(){
    // this will get the full URL at the address bar
    var url = window.location.href; 

    // passes on every "a" tag 
    $("#jMenu a").each(function() {
            // checks if its the same on the address bar
        if(url == (this.href)) { 
            $(this).closest("li").addClass("activeLink");
        }
    });
});									   
									   
                $("#jMenu").jMenu();
            });
        </script>
-->