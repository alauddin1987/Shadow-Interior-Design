<div id="rigtSide">
                <?php
				try
				{
					$ArticleCategory = new ArticleCategory();
					$Article = new Article();
					$Uploader = new Uploader();
					$result = $ArticleCategory -> getFeaturedsRight(" AND t.status='active' AND t.position='right'");
					$count = 0;
					$desiredWord = 18;
					while($showRight = $result->fetch_array(MYSQL_ASSOC))
					{
				?>
<div class="ulFirst">
	<div class="category"><?php echo $showRight['name']; ?></div>
     <?php
                   $showChild = $Article -> getLastByParent($showRight['id']);
	?>
	<div class="title"><?php echo $showChild['title']; ?></div>
	<div class="description">
        <?php 
		$total_word = Common::str_word_count_utf8($showChild['description']);
		echo Common::getDesiredLengthString(strip_tags($showChild['description']), $desiredWord); 
        if($total_word > $desiredWord) {
                    
        ?>
                    <a href="article_details.php?a_id=<?php echo $showChild['id']; ?>" class="readmore_link"> <?php echo DETAILS; ?></a>
                    <?php } ?>
    </div>
</div>
<?php 
			}
}
catch(Exception $e)
{
	echo $e->getMessage();
}

?>
</div>
<!---<ul class="ul5"><a href="#" style="text-decoration:none" ><img src="/images/right_ads.jpg" width="293" /></a></ul>-->
<ul class="ul5">
<li>
	<h1><?php echo NEWS_HEADLINE; ?></h1>
    </li>
<?php require_once(INCLUDE_DIR.'/breakingNews.inc.php');?>
</ul>
<ul class="ul5">
<li>
	<h1><?php echo POLL; ?></h1>
	<?php
	$sql = "SELECT * FROM ".POLL_PREFIX."quiz ORDER BY op DESC";
	$show = Database::query($sql, 1, __FILE__, __LINE__);
 ?>

<SCRIPT LANGUAGE="JavaScript" src="ajax.js">
</SCRIPT>
<div id="text"></div>
<SCRIPT LANGUAGE="JavaScript">
getpoll('<?php echo $show['tm']; ?>');
</SCRIPT>
</li>
</ul>

