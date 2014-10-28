
<div id="rigtSide">
<ul class="ul3rd">
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
</div>
<ul class="ul5">
<li>
	<h1><?php echo NEWS_HEADLINE; ?></h1>
    </li>
<?php require_once(INCLUDE_DIR.'/breakingNews.inc.php');?>
</ul>

