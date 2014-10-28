<?php require_once('settings.php');
$a_cid = $_GET['a_cid'];
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
        <?php include_once(INCLUDE_DIR.'/articleCategories.inc.php'); ?>
</td>
        <td width="75%" valign="top" class="pageDetails">
        <div style="min-height:380px;">
          <h1>
            
            <?php echo PUBLICATION; ?></h1>
             <div class="pcaption"><?php echo ARTICLE_CATEGORY_LIST; ?></div>
            <h3>
     <?php 
		try
		{
			$sn = 0;
			$ArticleCategory = new ArticleCategory();
			$result = $ArticleCategory->gets(" AND status='active' ");
			while($show = $result -> fetch_array(MYSQL_ASSOC))
			{
				$sn++;
			?>
            	<li><!--<em><?php echo Common::convertToBanglaNumber($sn); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</em>-->
				<a href="articles.php?a_cid=<?php echo $show['id']; ?>" class="next"><?php echo $show['name']; ?></a></li>
            <?php
			}
			?>
            </h3>
            
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