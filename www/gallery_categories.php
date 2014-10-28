<?php require_once('settings.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once(INCLUDE_DIR.'/title.inc.php');?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
 <?php include_once(INCLUDE_DIR.'/topBar.inc.php');?>
<table width="100%" cellpadding="0" cellspacing="0" class="page_body_area">
  <tr>
    <td valign="top" border="0"  width="170px">&nbsp;</td>
    <td valign="top" border="0" width="1025px" ><table width="100%" border="0" cellpadding="3" cellspacing="5">
      <tr>
        <td width="25%" bgcolor="#FFFFFF" valign="top" class="leftMenu">		
        <?php include_once(INCLUDE_DIR.'/photoCategories.inc.php'); ?>
</td>
        <td width="72%" valign="top" class="pageDetailsGallery">
        <div style="min-height:380px;">
         <h1> <?php echo EXCLUSIVE_PHOTOGALLERY; ?></h1>
         <div class="pcaption"><?php echo EXCLUSIVE_PHOTOGALLERY_CATEGORY; ?></div>
            <h3>
	 <?php 
		try
		{
			$i = 0;
			$Uploader = new Uploader();
			$Category = new Category();
			$result = $Category -> gets('rank', 'visitor');
			while($show = $result -> fetch_array(MYSQL_ASSOC))
			{
				$i++;
		 ?>
    <div class="img photo_box">
	<a href="gallery.php?category=<?php echo $show['id']; ?>" >
<?php echo $Uploader -> imageViewer($show['photo'], WIDTH_GALLERY_VIEW, HEIGHT_GALLERY_VIEW, '', '', '', '', 'categories/', 2); ?>
  </a><br />
<a href="gallery.php?category=<?php echo $show['id']; ?>" class="caption"><?php echo $show['name']; echo ($show['num_rec'] > 0)?str_repeat("&nbsp;", 1).'<font class=wr>('.$show['num_rec'].')</font>':'';
?></a>
</div>
<?php 
				if($i==4) {
					$i = 0;
					echo '<div style="float:left; width:100%; padding:5px 0px 0px 0px;">&nbsp;</div>';
				}
			}
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	 ?>     </h3> </div>  </td>
      </tr>
    </table>
    </td>
    <td valign="top" border="0"  width="170px">&nbsp;</td>
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