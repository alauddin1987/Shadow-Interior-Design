<div id="footerArea">
    <div id="footerBoxOne">
             <div id="copyRight">    © <?php echo COMPANY_NAME.'&nbsp;2014'; ?></div>
				<?php		  
                    try
                    {
                        $Contact = new Contact();
                        $result = $Contact -> get();
                        $show = $result -> fetch_array(MYSQL_ASSOC);
                        echo str_replace("<br>", "<br />", $show['description']);
                    }
                    catch(Exception $e)
                    {
                        echo $e->getMessage();
                    }
              ?>
    </div>

	<div id="footer">
    <ul>
<?php
try
{
	$Content = new Content();
	$resultCon = $Content->gets(" AND id!=1 ");
	while($showCon = $resultCon -> fetch_array(MYSQL_ASSOC))
	{
?>
<li><a href="content_details.php?c_id=<?php echo $showCon['id']; ?>"><?php echo $showCon['name'];; ?></a></li>
<?php 
	}
}
catch(Exception $e)
{
	echo $e->getMessage();
}
?>
    </ul>
</div>

</div>