<table width="100%" border="0" cellspacing="3" cellpadding="2">
<?php

try

{

	$News = new News();

	$result = $News -> getnewses(" AND n.status='active' ");
	$desiredWord = 10;
	while($show = $result->fetch_array(MYSQL_ASSOC))

	{
			    $linkPath = 'news_details.php?n_id='.$show['id'];
?>  


  <tr>
    <td width="18%" valign="top" style="border-bottom:1px solid #CCCCCC; padding-bottom:5px">
    <div class="imageBox"><?php echo $Uploader -> imageViewer($show['photo'], '85', '60', $linkPath, '', '', '', 'newses/', 2); ?></div>
    </td>
    <td width="82%" valign="top" style="border-bottom:1px solid #CCCCCC; padding-bottom:5px">
    <b class="newsTitle"><a href="#"><?php echo $show['title']; ?></a></b>
    <!--<br />
<?php //echo $show['title']; 
		$total_word = Common::str_word_count_utf8($show['description']);
		echo Common::getDesiredLengthString(strip_tags($show['description']), $desiredWord); 

?>--></td>
  </tr>
 <?php 
 
	 } 
}

catch(Exception $e)

{

	echo $e->getMessage();

}
 ?>  
  
</table>
