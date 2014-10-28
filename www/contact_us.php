<?php require_once('settings.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include_once(INCLUDE_DIR.'/title.inc.php');?>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

 <?php include_once(INCLUDE_DIR.'/topBar.inc.php');?>
<table width="100%" cellpadding="0" cellspacing="0" class="page_body_area">
  <tr>
    <td valign="top" border="0" width="170px">&nbsp;</td>
    <td valign="top" border="0" width="1025px"><table width="100%" border="0" cellpadding="3" cellspacing="5">
      <tr>
        <td width="25%" bgcolor="#FFFFFF" valign="top" class="leftMenu">	
        
<!--....................... Facebook like menu...................................................       
-->
<div class="fb-like-box" data-href="https://www.facebook.com/9999999999" data-width="220" data-show-faces="true" data-stream="true" data-show-border="true" data-header="true"></div>
</td>
        <td width="75%" valign="top" class="pageDetails">
        <div style="min-height:380px;">
            <h1> <?php echo CONTACT_US; ?></h1>
            <h3>

            <table width="100%" border="0" cellspacing="3" cellpadding="5">
              <tr>
                <td width="38%" valign="top"><h2><?php echo OUR_ADDRESS; ?></h2></td>
                <td width="2%" valign="top">&nbsp;</td>
                <td width="60%" valign="top"><h2><?php echo GIVE_YOUR_OPINION; ?></h2></td>
                </tr>
                              <tr>
                <td width="38%" valign="top"><?php		  
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
?></td>
                <td width="2%" style="background-image:url(images/topnav10.gif); background-repeat:repeat-y">&nbsp;</td>
                <td width="60%"><form name="frmAdd" id="frmAdd" action="contact_us.php" method="post">
     <table width="100%" height="17" border="0" cellpadding="0" cellspacing="5">
        <tr>
		  <td colspan="2" class="msg">
		    
		    <?php
			if(isset($_POST['btnAdd']))
			{
				try
				{	$Feedback = new Feedback();
					$Feedback->add();
				}
				catch(Exception $e)
				{
					echo $e->getMessage();
				}
			}
			Common::displayMsg();
			?>		  </td>
		  <td width="47" align="left" valign="top">&nbsp;</td>
		  </tr>  <tr>
    <td width="118"><?php echo NAME; ?></td>
    <td width="300"><input type="text" name="name" id="name" size="32" maxlength="50" /></td>
  </tr>
  <tr>
    <td><?php echo EMAIL; ?></td>
    <td><input type="text" name="email" id="email" size="32" maxlength="50" /></td>
  </tr>
  <tr>
    <td><?php echo DETAILS; ?></td>
    <td><textarea name="message" id="message" cols="32" rows="4" ></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="btnAdd" id="btnAdd" value="Submit" /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    </table>
    </form></td>
              </tr>
            </table>      </h3></div>
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