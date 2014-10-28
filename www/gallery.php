<?php require_once('settings.php');
	$category = $_REQUEST['category'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once(INCLUDE_DIR.'/title.inc.php');?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_DIR; ?>/pagination.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_DIR; ?>/pagination_grey.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fancybox/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

	<script type="text/javascript">
		$(document).ready(function() {

			$("a[rel=example_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

		});
	</script>
<body>
 <?php include_once(INCLUDE_DIR.'/topBar.inc.php');?>
<table width="100%" cellpadding="0" cellspacing="0" class="page_body_area">
  <tr>
    <td valign="top" border="0" width="170px">&nbsp;</td>
    <td valign="top" border="0" width="1025px"><table width="100%" border="0" cellpadding="3" cellspacing="5">
      <tr>
        <td width="25%" bgcolor="#FFFFFF" valign="top" class="leftMenu">		
        <?php include_once(INCLUDE_DIR.'/photoCategories.inc.php'); ?>
</td>
        <td width="75%" valign="top" class="pageDetailsGallery">
        <div style="min-height:380px;">
                 <h1>  <a href="gallery_categories.php"><?php echo EXCLUSIVE_PHOTOGALLERY; ?></a> <?php echo PHOTO_LIST; ?></h1>

         <?php
try

{
	$Category = new Category();
	$Category_name = $Category -> getName($category);
	$Uploader = new Uploader();
	$Photo = new Photo();
	//-----------------------
	$pagination_query = $Photo -> gets(" AND category=$category");
    $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    $limit = 9;
    $startpoint = ($page * $limit) - $limit;
	$table = "photo";
	$condition = " AND category=$category LIMIT {$startpoint} , {$limit}";
	$ViewStart = $startpoint+1;
	$checkPoint = $ViewStart+$limit;
	$ViewEnd = ($pagination_query->num_rows >=$checkPoint) ?$checkPoint-1 : $pagination_query->num_rows;
?>	           <div class="pcaption"><?php echo EXCLUSIVE_PHOTOGALLERY."&nbsp;".$Category_name.str_repeat("&nbsp;", 2);; ?></div>
            <h3><table width="100%" border="0">
	  <tr>
		  <td class="he_lin" colspan="3"><?php	echo Common::displayRecordStatus($pagination_query->num_rows, $ViewStart, $ViewEnd); ?></td>
		  </tr>

<?php

	$result = $Photo -> gets($condition);
		$sl = 0;
		while($show = $result->fetch_array(MYSQL_ASSOC))
		{
			$sl ++;
		if($sl==0)
		echo "<tr>";
		
			    $imagePath = ROOT_DIR.UPLOAD_DIR.'/photos/'.$show['photo_large'];
				if($show['photo_large']=='' || !is_file($imagePath)) {
					$photoPrint = 'images/noPhoto.jpg';
					$photoLink = 'images/noPhoto.jpg';
				}
				else if($show['photo_large']) {
						$photoPrint = UPLOAD_DIR.'/photos/'.$show['photo_thumb'];			 
						$photoLink = UPLOAD_DIR.'/photos/'.$show['photo_large'];			 
					}
		
?>    
		  <td class="img photo_box">
		  
		  <a rel="example_group" href="<?php echo $photoLink; ?>" title="<?php echo $show['title']; ?>">
<img src="<?php echo $photoPrint; ?>" width="<?php echo WIDTH_GALLERY_VIEW; ?>" height="<?php echo HEIGHT_GALLERY_VIEW; ?>" alt="nmbn"  />
  </a><br /><a href="photoDetails.php?p_id=<?php echo $show['id']; ?>" class="caption"><?php echo $show['title'];?></a></td>          
<?php 
				if($sl==3) {
					$sl = 0;
					echo '</tr>';
				}
			}
?>
<tr><td colspan="3" class="paiginationArea"><?php echo Common::pagination($table,$pagination_query->num_rows, $limit,$page, 'gallery.php?category='.$_REQUEST['category'].'&'); ?></td></tr>
<?php
		}
		catch(Exception $e)
		{
			echo " <div style='width:100%; padding:40px;'>".$e->getMessage()."</ div>";
		}
	 ?>		  
		  </table></h3></div>
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