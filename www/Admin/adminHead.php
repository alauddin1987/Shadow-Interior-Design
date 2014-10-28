<?php
	Common::isLogedIn();
	Menu::checkAccess();
?>
<link href="style_admin.css" rel="stylesheet" type="text/css">
<link href="css/simple_menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../<?php echo JS_DIR; ?>/ajax.js"></script>
<script language="JavaScript" type="text/javascript" src="EditorEquipment/wysiwyg.js"></script>
<script language="JavaScript" src="../bangla/keyboard/essential_unicoder.js"></script>
<script src="../bangla/keyboard/common.js"></script>
<script src="../bangla/keyboard/layout.js"></script>
<script src="../bangla/keyboard/field_creator.js"></script>

<table width="980" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="112" class="main_head"> 
    <h2><?php echo COMPANY_NAME; ?></h2> 
    <span>
      
    <h3><a href="<?php echo SITE_URL; ?>" class="url" target="_blank"><?php echo SITE_VISITE; ?></a> &nbsp;|&nbsp; <a href="logout.php" class="url"><?php echo LOG_OUT; ?></a> </h3> 
    <h4><?php echo WELCOME; ?> : <?php echo $_SESSION['userName']; ?> </h4>  
    </span>   </td>
  </tr>
  <tr>
    <td width="16"  >
    
<ul class="menu">
 
           <!--- <li><a href="banglaKeyboard.php"><?php echo BANGLA_KEYBOARD; ?></a></li>--->
<?php

try

{

	$Menu = new Menu();
	

	$result = $Menu -> gets(" AND menu_parent_id IS NULL AND menu_view='yes' ORDER BY menu_sort ASC");
	
	while($show = $result->fetch_array(MYSQL_ASSOC))

		{
?>            
			<li><a href="#"><?php echo $show['menu_name']; ?></a>
					<ul>
                    <?php
						$resultChild = $Menu -> gets(" AND menu_parent_id=".$show['menu_id']." AND menu_view='yes'  ORDER BY menu_sort ASC");
						
						while($showChild = $resultChild->fetch_array(MYSQL_ASSOC))
					
							{
					?>
						<li><a href="<?php echo $showChild['menu_target']; ?>"><?php echo $showChild['menu_name']; ?></a></li>
                        <?php } ?>
					</ul>
				</li>
				
<?php
	}
		}
catch(Exception $e)

	{

		echo $e->getMessage();

	}


?>	                
    </ul>


    
           
            </td>
  </tr>
</table>
