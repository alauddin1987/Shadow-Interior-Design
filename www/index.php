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
<table width="100%" class="page_body_area" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" border="0"  width="170px">&nbsp;</td>
    <td valign="top" border="0" width="1025px" >
    <table width="100%" border="0">
      <tr>
        <td width="72%" valign="top"  class="shadowBox">
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td align="center"><?php include_once(INCLUDE_DIR.'/rotateBanner.inc.php');?></td>
          </tr>
          <tr>
            <td align="justify">
             <div id="home_text" align="justify">
    <?php
    	$Content = new Content();
		
		$result = $Content -> get(1);
	
		$showHome = $result -> fetch_array(MYSQL_ASSOC);
	?>
    <div class="h_titel"><?php echo $showHome['title']; ?></div>
    <div class="h_span1">
        <?php 
		$home_total_word = Common::str_word_count_utf8($showHome['description']);
		$home_desiredWord = 80;
		echo Common::getDesiredLengthString(strip_tags($showHome['description']), $home_desiredWord); 
		?>
<?php
        if($home_total_word > $home_desiredWord) {

?>
&nbsp;&nbsp;<a class="readmore_link" href="content_details.php?c_id=<?php echo $showHome['id']; ?>"> <?php echo DETAILS; ?></a>
<?php } ?>
</div>
    </div></td>
          </tr>
          <tr>
            <td class="home" align="left">
            <table width="100%" border="0" class="featuredArea" cellspacing="3" cellpadding="0">
                <?php
				try
				{
					$ArticleCategory = new ArticleCategory();
					$Article = new Article();
					$Uploader = new Uploader();
					$result = $ArticleCategory -> getFeatureds(" AND t.status='active' AND t.position='middle'");
					$count = 0;
					$desiredWord = 25;
					while($show = $result->fetch_array(MYSQL_ASSOC))
					{
					   $showChildArticle = $Article -> getLastByParent($show['id']);
					   $total_word_found = Common::str_word_count_utf8($showChildArticle['description']);	
						if($count==0)
						{
				?>
              <tr>
              <?php } 
			  $count++;
			  ?>
                <td width="49%" valign="top" class="featuredBox">
                <table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr><td class="featuredBg" colspan="2" style="text-transform:uppercase"><?php echo $show['name']; ?></td></tr>
                    <tr>
                      <td colspan="2"><span class="featuredTitle"><?php echo $showChildArticle['title']; ?></span></td>
                      </tr>
                    <tr>
                      <td width="18%" valign="top" class="featured_margin">
                     
        <div class="imageBox"><?php echo $Uploader -> imageViewer($showChildArticle['photo'], '85', '60', '', '', '', '', 'article/', 2); ?></div>
        <div class="date">
		 <?php echo Common::convertToBanglaDate($showChildArticle['publish_date']); ?><br />
				<?php 
				$weeks_day = date('D', strtotime($showChildArticle['publish_date']));
				echo Common::banglaDay($weeks_day); 
				?>
		</div>
                    </div>                    
                    
                    
                      </td>
                      <td width="82%" valign="top" align="justify" class="featured_margin">
                      
					  <?php 
							echo Common::getDesiredLengthString(strip_tags($showChildArticle['description']), $desiredWord);
                            if($total_word_found > $desiredWord) {
                    ?>
                    <a class="readmore_link" href="article_details.php?a_id=<?php echo $showChildArticle['id']; ?>"><?php echo DETAILS; ?></a>
                    <?php } ?></td>
                    </tr>
                  </table></td>
                <?php if($count==1)
				{
				?>
                <td width="1%">&nbsp;</td>
                <?php } 
				else if($count==2)
				{
				?>
                </tr>
                <?php 
				$count=0;
				} 
			}
}
catch(Exception $e)
{
	echo $e->getMessage();
}

?>

            </table></td>
          </tr>
          
        </table></td>
        <td width="2%">&nbsp;</td>
        <td width="28%" bgcolor="#FFFFFF" valign="top" class="rightBar"><?php include_once(INCLUDE_DIR.'/rightBar.inc.php'); ?></td>
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