<?php require_once('settings.php');
$n_id = $_GET['n_id'];
?>
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
    <td valign="top" border="0" width="170px">&nbsp;</td>
    <td valign="top" border="0" width="1025px"><table width="100%" border="0" cellpadding="3" cellspacing="5">
      <tr>
        <td width="25%" bgcolor="#FFFFFF" valign="top" class="leftMenu">		
        <?php include_once(INCLUDE_DIR.'/newsCategories.inc.php'); ?>
</td>
        <td width="75%" valign="top" class="pageDetails">
        <div style="min-height:380px;">
        
            <h1>
            
     <?php 
		try
		{
			$Uploader = new Uploader();
			$News = new News();
			$NewsCategory = new NewsCategory();
			$result = $News->getnews($n_id);
			$show = $result -> fetch_array(MYSQL_ASSOC);

			$cat_result = $NewsCategory->getCategory($show['category']);
			$cat_show = $cat_result -> fetch_array(MYSQL_ASSOC);
			$link_url = 'news/'.$cat_show['proxy_url'];


		 ?>
           <a href="news"><?php echo SONGBAD; ?></a> <a href="<?php echo $link_url; ?>"><?php echo $cat_show['name']; ?></a> <?php echo DETAILS; ?></h1>
            <div class="pcaption"><div class="category"><?php echo $category_name; ?></div>
            <div class="date">
            <?php echo Common::convertToBanglaDate($show['news_date']); ?><br />
				<?php 
				$weeks_day = date('D', strtotime($show['news_date']));
				echo Common::banglaDay($weeks_day); 
				?>
                <br />
			</div></div>
            <h3>
            <div class="title_details"><?php echo $show['title']; ?></div>
            <div class="sub_title"><?php echo $show['sub_title']; ?></div>
		<div style="float:none; widht:200; padding:0px 5px 5px 0px;">
        
<?php 

		 if($show['photo']) {
			    $imagePath = ROOT_DIR.UPLOAD_DIR.'/newses/'.$show['photo'];
			    $linkPath = UPLOAD_DIR.'/newses/'.$show['photo'];
				$imageInfo = getimagesize($imagePath);		
				$width = $imageInfo[0];
				$width = ($imageInfo[0] < WIDTH_RANGE) ? $imageInfo[0] : WIDTH_RANGE;
				$height = ($imageInfo[1] < HEIGHT_RANGE) ? $imageInfo[1] : HEIGHT_RANGE;
			 
				echo $Uploader -> imageViewer($show['photo'], $width, $height, $linkPath, '', '', '', 'newses/', 2);
			}
			 ?>
			</div>
            <div class="writer"><?php echo $show['name']; ?></div>
			<?php 
			
			echo $show['description']; ?>            </h3>
            
       <?php
       	}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	   ?>
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