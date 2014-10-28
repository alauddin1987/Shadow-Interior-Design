<?php 
require_once('settings.php');
$key_list = split("/", $_REQUEST['news_info']);
$category_proxy = $key_list[key( array_slice( $key_list, -1, 1, TRUE ) )];
$NewsCategory = new NewsCategory();
$n_cid = $NewsCategory->getPrimeryKeyValue(" AND proxy_url='$category_proxy'");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once(INCLUDE_DIR.'/title.inc.php');?>
<base href="http://<?php echo SITE_URL; ?>/" />
<link href="/css/style.css" rel="stylesheet" type="text/css" />
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
			$Categoryname = $NewsCategory->getName($n_cid);

		 ?>
             <a href="news"><?php echo SONGBAD; ?></a> <?php echo $Categoryname; ?> </h1>
            <div class="pcaption"><?php echo $Categoryname; ?></div>
            <?php
			$sn = 0;
			$desiredWord = 70;
            $News = new News();
			$result  = $News->getnewses(" AND category=".$n_cid);
			while($showChild = $result -> fetch_array(MYSQL_ASSOC))
			{
				$sn++;
			?>
            <h3>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="24%" valign="top">
				<?php
			    $imagePath = ROOT_DIR.UPLOAD_DIR.'/newses/'.$showChild['photo'];
			    $linkPath = 'news_details.php?n_id='.$showChild['id'];
				$imageInfo = getimagesize($imagePath);		
				$width = $imageInfo[0];
				$width = ($imageInfo[0] < WIDTH_RANGE_SMALL) ? $imageInfo[0] : WIDTH_RANGE_SMALL;
				$height = ($imageInfo[1] < HEIGHT_RANGE_SMALL) ? $imageInfo[1] : HEIGHT_RANGE_SMALL;
			 
				echo $Uploader -> imageViewer($showChild['photo'], $width, $height, $linkPath, '', '', '', 'newses/', 2);

				?>
            <div class="date">
            <?php echo Common::convertToBanglaDate($showChild['news_date']); ?><br />
				<?php 
				$weeks_day = date('D', strtotime($showChild['news_date']));
				echo Common::banglaDay($weeks_day); 
				?>
                <br />
			</div>                </td>
                <td width="76%" valign="top">
            <div class="title"><?php echo $showChild['title']; ?></div>
            <div class="sub_title"><?php echo $showChild['sub_title']; ?></div>
            <br />
            <?php 
					$total_word_found = Common::str_word_count_utf8($showChild['description']);
					echo Common::getDesiredLengthString(strip_tags($showChild['description']), $desiredWord); 
					if($total_word_found > $desiredWord) 
					{
				?>
&nbsp;&nbsp;&nbsp;<a class="readmore_link" href="news_details.php?n_id=<?php echo $showChild['id']; ?>"> <?php echo DETAILS; ?></a>
				<?php } ?>
                </td>
              </tr>
            </table>
            </h3>
              <?php
			}
			?>            
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