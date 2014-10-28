<?php  require_once('../settings.php');
	$uId = $_GET['uId'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include(ROOT_DIR.'/'.INCLUDE_DIR.'/title-admin.inc.php'); ?>
<link href="form_msg.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td> <?php include('adminHead.php');?></td>
  </tr>
  <tr>
    <td height="328" valign="top" class="ad_color">
    
 <div class="title_nav_bar">
    <h1><?php echo USER_MANAGEMENT; ?></h1>
	 <h2><?php echo USER_LIST.'-'.EDIT; ?></h2>
	<h3> <a href="userView.php" class="link_button"><?php echo USER_LIST; ?></a></h3>
	 </div>
     
<form action="userEdit.php?uId=<?php echo $uId; ?>" enctype="multipart/form-data" method="post">
      <table border="0" cellpadding="1" cellspacing="1" width="100%"  class="dataAdd">
        <tr>
          <td colspan="3" class="msg">
<?php		  
try
{
	$Admin = new Admin();
	$result = $Admin -> getUser($uId);
	$show = $result -> fetch_array(MYSQL_ASSOC);
	if(isset($_POST['btnAdd'])) {
		$Admin -> editUser($uId);
		//Common::redirectuser('userView.php', 'updated' );
	}
}
catch(Exception $e)
{
	echo $e->getMessage();
}
?>		  </td>
          </tr>
      <tr><td colspan="3"><?php include('bangla_keyboard.php');?></td></tr>
        <tr>
          <td width="36%" align="right"><?php echo NAME; ?></td>
          <th width="4%" align="center">:</th>
          <td width="60%" align="left"><input type="text" id="name" name="name" value="<?php echo $show['name']; ?>" size="32" maxlength="30"  class="bng_text" /></td>
        </tr>
		<?php
		$field_nature = ($_SESSION['admintype']=='admin')?'':"readonly='readonly'";
		?>
        <tr>
          <td align="right"><?php echo EMAIL; ?></td>
          <th align="center">:</th>
          <td align="left"><input type="text" id="email" name="email" value="<?php echo $show['email']; ?>" size="32"  <?php echo $field_nature; ?> maxlength="30" /></td>
        </tr>
        <tr>
          <td align="right"><?php echo USER_PASSWORD; ?></td>
          <th align="center">:</th>
          <td align="left"><input type="password" id="password" name="password"value="<?php echo $show['password']; ?>" size="32" maxlength="30" /></td>
        </tr>	  
        <tr>
          <td align="right">&nbsp;</td>
          <th align="center"></th>
          <td align="left"><input type="submit" name="btnAdd" value="<?php echo SAVE; ?>" /></td>
        </tr>
        <tr>
            <td align="right">&nbsp;</td>
            <th align="center">&nbsp;</th>
            <td align="left">&nbsp;</td>
        </tr>
      </table>
	</form>
	
    </td>
  </tr>
</table>
<?php include('footer.php');?>
</body>
</html>