<?php require_once('settings.php');
$key_list = split("/", $_REQUEST['page_id']);
$page_id = $key_list[key( array_slice( $key_list, -1, 1, TRUE ) )];
$Module = new Module();
$records = $Module->getNavMenu($page_id);
$next_childs = $Module->getNextMenus($page_id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once(INCLUDE_DIR.'/title.inc.php');?>
<base href="http://<?php echo SITE_URL; ?>" />
<link href="<?php echo CSS_DIR; ?>/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_DIR; ?>/jMenu.jquery.css" rel="stylesheet" type="text/css"  />
 <script type="text/javascript" src="<?php echo JS_DIR; ?>/jMenu.jquery.js"></script>
</head>

<body>
 <?php include_once(INCLUDE_DIR.'/topBar.inc.php');?>
<table width="100%" cellpadding="0" cellspacing="0" class="page_body_area">
  <tr>
    <td valign="top" border="0" width="170px">&nbsp;</td>
    <td valign="top" border="0" width="1025px">
    <table width="100%" border="0" cellpadding="3" cellspacing="5">
      <tr>
        <td width="22%" bgcolor="#FFFFFF" valign="top"  class="leftMenu">
		<li class="selected_page"><?php echo $Module -> getName($page_id); ?></li>
		<?php
        		$next_childs_list = array();
				while($mdata = $next_childs->fetch_array(MYSQL_ASSOC)):
				$next_childs_list[] = $mdata;
				$link_page = $mdata['proxy_url'].'/'.$mdata['module_id'];
				echo '<li><a href="'.$link_page.'" class="next">'.$mdata['name'].'</a></li>';
		endwhile;
		?></td>
        <td width="78%" valign="top" class="pageDetails">
        <div style="min-height:380px;">
            <h1>
            <?php
				$treeNumber = count($records);
				$x = 0;
				foreach($records as $data)
				{
					$x++;
				if($treeNumber > $x)
				{
				$tree_link_page = $data['proxy_url'].'/'.$data['module_id'];
					
			?>
            
            <a href="<?php echo $tree_link_page; ?>"><?php echo $data['name']; ?></a>
            <?php 
				}
				else
				{ 
					echo $data['name']; 
				}
			} ?></h1>
     <?php 
		try
		{
			$Uploader = new Uploader();
			$result = $Module -> get($page_id);
			$show = $result->fetch_array(MYSQL_ASSOC);

		 ?>
            <div class="pcaption"><?php echo $show['name']; ?></div>
            <h3>
<?php 			
		 if($show['photo']) {
			    $imagePath = ROOT_DIR.UPLOAD_DIR.'/modules/'.$show['photo'];
			    $linkPath = UPLOAD_DIR.'/modules/'.$show['photo'];
				$imageInfo = getimagesize($imagePath);		
				$width = $imageInfo[0];
				$width = ($imageInfo[0] < WIDTH_RANGE_LARGE) ? $imageInfo[0] : WIDTH_RANGE_LARGE;
				$height = ($imageInfo[1] < HEIGHT_RANGE_LARGE) ? $imageInfo[1] : HEIGHT_RANGE_LARGE;
			 
				echo '<div style="float:none; widht:200; padding:0px 5px 5px 0px;">'.
				$Uploader -> imageViewer($show['photo'], $width, $height, '', '', '', '', 'modules/', 2).'</div>';
			}
			echo $show['description']; ?>            
       <?php
       	}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
		
		foreach($next_childs_list as $child_data):
				$child_link_page = $child_data['proxy_url'].'/'.$child_data['module_id'];
			echo '<li><a href="'.$child_link_page.'" class="next">'.$child_data['name'].'</a></li>';
		endforeach;

		
	   ?>
            </h3>
       </div>
        </td>
      </tr>
    </table>
    </td>
    <td valign="top" border="0" width="170px">&nbsp;</td>
  </tr>
  <tr>
  <tr class="footer_bg">
    <td valign="top" >&nbsp;</td>
    <td valign="top" ><?php include_once(INCLUDE_DIR.'/footer.inc.php');?> </td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>