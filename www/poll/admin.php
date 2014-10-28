<?php
session_start();
include "../settings.php";
$db=mysql_connect(HOST,DB_USER,DB_PASS) or die("<b>MySQL Error:</b> Unable to connect to database please check that you have provided the correct <li>Database Login username<li>Database Login Password");	//Connect to database or give error if failed
mysql_select_db(DATABASE,$db)or die("<b>MySQL Error:</b> Unable to select database please check that you have provided the correct <li>Database name");
foreach($_GET AS $key => $value) {
${$key} = $value;
} 
foreach($_POST AS $key => $value) {
${$key} = $value;
} 
$icheck=mysql_query("SELECT * FROM ".POLL_PREFIX."ad");
if($icheck){
if($action== "logout"){
session_destroy();
header("Location: admin.php");
}
if(!isset($_SESSION['ein'])){
if($admin_id!="" && $admin_pass!=""){
$search=mysql_query("SELECT * FROM ".POLL_PREFIX."ad WHERE admin_id='$admin_id' AND admin_pass='".md5($admin_pass)."'");
if(mysql_num_rows($search)==1){
$_SESSION['ein']=base64_encode($admin_id);
header("location: admin.php?action=dologin");
}
}
}
if(isset($_SESSION['ein'])){
$bchome="<table width=100% cellspacing=0><TD width=2%><a href=\"?action=dologin\"><img src=\"images/main_s.png\" border=\"0\"></a></Td><TD width=48%><a href=\"?action=dologin\"><B>Main Menu</b></a></TD> <TD width=2%><a href=\"?action=logout\"><img src=\"images/exit_s.png\" border=\"0\"></a></Td><TD width=48%><a href=\"?action=logout\"><B>Logout</B></a></TD></table>";
$text="<BR>";
$menu = "
<BR><BR><table width=75% align=\"center\" cellspacing=\"2\" cellpadding=\"2\" border=0>
<TR><TD width=5%><a href=\"?action=add_quiz\"><img src=\"images/new_ad.png\" border=\"0\"></a></td><td width=45%><a href=\"?action=add_quiz\"><B>Add a Poll</B></a><BR><font size=1>Add a Poll.</font></TD><TD width=5%><a href=\"?action=manage_quiz\"><img src=\"images/manage.png\" border=\"0\"></a></TD><td width=45%><a href=\"?action=manage_quiz\"><B>Manage Poll</B></a><BR><font size=1>Edit, Delete polls.</font></td></TR>

<TR><TD width=5%><a href=\"?action=poll_template\"><img src=\"images/template.gif\" border=\"0\"></a></td><td width=45%><a href=\"?action=poll_template\"><B>Change Poll Look</B></a><BR><font size=1>Change poll look.</font></TD><TD width=5%><a href=\"?action=change\"><img src=\"images/admin_info.png\" border=\"0\"></a></TD><td width=45%><a href=\"?action=change\"><B>Admin Info</B></a><BR><font size=1>Change ID and password for<BR> administration panel login.</font></td></TR>

<TR><TD width=5%><a href=\"?action=logout\"><img src=\"images/logout.png\" border=\"0\"></a></td><td width=45%><a href=\"?action=logout\"><B>Logout</B></a></TD><TD width=5% align=right>&nbsp;</td><td width=45%>&nbsp;</TD></TR>
</table>";
}
?>										
<HTML><HEAD><TITLE>APSIS SOLUTIONS LTD :: Poll - Administration Panel</TITLE>
<LINK 
href="style.css" 
type=text/css rel=stylesheet>
<SCRIPT LANGUAGE="JavaScript">
<!--
var confirmMsg  = 'Are you sure you want to ';
function confirmLink(theLink, theGroup)
{
    if (confirmMsg == '') {
        return true;
    }

    var is_confirmed = confirm(confirmMsg + theGroup);
    if (is_confirmed) {
        theLink.href += '&is_js_confirmed=1';
    }

    return is_confirmed;
}
//-->
</script>
<SCRIPT LANGUAGE="JavaScript" src="js/201a.js">
</SCRIPT>
</HEAD>
<BODY bgColor=#ffffff leftMargin=0 topMargin=0 rightmargin=0 bottommargin=0>
<TABLE height=50 cellSpacing=0 cellPadding=0 width="100%" 
border=0>
<TBODY>
<TR>
<TD colspan=0 cellpadding=0 width=2%><img src="images/space.gif" width=1 height=50></TD>
<TD width=75% style="padding-left:5px;BORDER-LEFT:#b6b6b6 1px solid;BACKGROUND-COLOR: #e3e3e3;"><font face=arial size=5 color=#330033><B><I>APSIS SOLUTIONS LTD :: Smart  Poll</I></B></font>
</TD><TD width=21% style="BORDER-RIGHT: #b6b6b6 1px solid;BACKGROUND-COLOR: #e3e3e3;">&nbsp;<?php echo "$bchome"; ?></TD><TD colspan=0 cellpadding=0 width=2%><img src="images/space.gif" width=1 height=50></TD>
</TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD colspan=0 cellpadding=0 width=2%><img src="images/space.gif" width=1 height=400></TD>
<TD style="BORDER-LEFT: #b6b6b6 1px solid;BORDER-RIGHT: #b6b6b6 1px solid;BORDER-TOP: #b6b6b6 2px solid" vAlign=top>
<TABLE cellSpacing=0 cellPadding=3 width="95%" align=center 
border=0>
<TBODY>
<TR>
<TD vAlign=top colSpan=1><BR>
<?php
if(isset($_SESSION['ein'])){
if($action=="dologin"){
echo "$text";
echo "$menu";
}
if($action=="poll_template"){
if($ser=="true"){
$bro=mysql_query("UPDATE ".POLL_PREFIX."cust SET pw='$pw',boc='$boc',bbc='$bbc',hlc='$hlc',hls='$hls',ttc='$ttc',bts='$bts',btc='$btc',buc='$buc'");
if($bro){
echo "<table width=40% align=center cellspacing=0><TR bgcolor=\"#E6e6e6\" height=\"26\"><TD align=center width=100% colspan=2><b>Confirmation</b></TD></TR><TR bgcolor=\"#F6f6f6\"><TD align=center style=\"BORDER-LEFT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><img src=\"images/banner_check.png\"></TD><TD align=center width=80% style=\"BORDER-RIGHT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\">Changes have been saved.</TD></TR></table><BR>";
}else{
echo "<table width=40% align=center cellspacing=0><TR bgcolor=\"#E6e6e6\" height=\"26\"><TD align=center width=100% colspan=2><b>Confirmation</b></TD></TR><TR bgcolor=\"#F6f6f6\"><TD align=center style=\"BORDER-LEFT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><img src=\"images/warning.png\"></TD><TD align=center width=80% style=\"BORDER-RIGHT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\">Changes could not be saved. Please make sure that setup is run correctly.</TD></TR></table><BR>";
}
}
$gett=mysql_query("SELECT * FROM ".POLL_PREFIX."cust");
$goi=mysql_fetch_array($gett);
?>
<script language=javascript>
<!--
function regen()
{
window.self.document.all.t0.innerHTML = "<table width="+window.self.document.all.pw.value+"  style='border:"+window.self.document.all.boc.value+" 1px solid;' cellpadding=0 cellspacing=0 bgcolor="+window.self.document.all.bbc.value+"><TR bgcolor="+window.self.document.all.hlc.value+" height=\"25\"><TD style='padding:4px;font-size:"+window.self.document.all.hls.value+"px;color:"+window.self.document.all.ttc.value+"' valign=middle><B>Poll Title</B></TD></TR><TR height=10><td><img src='images/space.gif' height=1 width=1></td></TR><TR height=\"25\"><td style='padding:2px;font:"+window.self.document.all.bts.value+"px verdana, tahoma; color:"+window.self.document.all.btc.value+"; text-align:left;' valign=top><input type=radio name=note> Option 1</TR><TR height=\"25\"><td style='padding:2px;font:"+window.self.document.all.bts.value+"px verdana, tahoma; color:"+window.self.document.all.btc.value+"; text-align:left;' valign=top><input type=radio name=note> Option 2</TR><TR height=\"25\"><td style='padding:2px;font:"+window.self.document.all.bts.value+"px verdana, tahoma; color:"+window.self.document.all.btc.value+"; text-align:left;' valign=top><input type=radio name=note> Option 3</TR><TR height=\"25\"><TD align=\"center\"><input type=\"button\" style='color:"+window.self.document.all.buc.value+"' value=\"Submit\"><BR><BR><a href=\"#\"><font size='1' color='"+window.self.document.all.btc.value+"'>See Results</a></font></TD></TR><TR height=10><td><img src='images/space.gif' height=1 width=1></td></TR></Table><BR><table border=0 cellspacing=0 width="+window.self.document.all.pw.value+"></table>";
}
//-->
</script>
<body onload="javascript:regen();">
<?php
echo "<form method=post action=\"?action=poll_template&ser=true\">";
echo "<div id=\"colorpicker201\" class=\"colorpicker201\"></div>";
echo "<Table width=100% align=center><TR><TD width=50%><table width=100%><tr bgcolor=\"#E6E6E6\" height=\"24\"><TD colspan=2><B>Customize Poll</B></TD></TR><TR style=\"background:#F6F6F6;\"><Td width=50%>Poll Border Color:</TD><TD><input type=text name=\"boc\" size=10 value=\"$goi[boc]\" onkeyup=\"javascript:regen();\" id=\"boc\"><input type=\"button\" value=\" ... \"  onclick=\"showColorGrid2('boc','none');\"></TD></TR><TR style=\"background:#F6F6F6;\"><Td>Poll Background Color:</TD><TD><input type=text name=bbc size=10 value=\"$goi[bbc]\" onkeyup=\"javascript:regen();\" id=\"bbc\"><input type=\"button\" value=\" ... \"  onclick=\"showColorGrid2('bbc','none');\"></TD></TR><TR style=\"background:#F6F6F6;\"><Td>Title Background Color:</TD><TD><input type=text name=hlc size=10 value=\"$goi[hlc]\" onkeyup=\"javascript:regen();\" id=\"hlc\"><input type=\"button\" value=\" ... \"  onclick=\"showColorGrid2('hlc','none');\"></TD></TR><TR style=\"background:#F6F6F6;\"><Td>Poll Title Size:</TD><TD><input type=text name=hls size=10 value=\"$goi[hls]\" onkeyup=\"javascript:regen();\">px</TD></TR>
<TR style=\"background:#F6F6F6;\"><Td>Title Text Color:</TD><TD><input type=text name=ttc size=10 value=\"$goi[ttc]\" onkeyup=\"javascript:regen();\" id=\"ttc\"><input type=\"button\" value=\" ... \"  onclick=\"showColorGrid2('ttc','none');\"></TD></TR>
<TR style=\"background:#F6F6F6;\"><Td>Option Text Color:</TD><TD><input type=text name=btc size=10 value=\"$goi[btc]\" onkeyup=\"javascript:regen();\" id=\"btc\"><input type=\"button\" value=\" ... \"  onclick=\"showColorGrid2('btc','none');\"></TD></TR><TR style=\"background:#F6F6F6;\"><Td>Option Text Size:</TD><TD><input type=text name=bts size=10 value=\"$goi[bts]\" onkeyup=\"javascript:regen();\" width=10%>px</TD></TR><TR style=\"background:#F6F6F6;\"><Td>Submit Text Color:</TD><TD><input type=text name=buc size=10 value=\"$goi[buc]\" onkeyup=\"javascript:regen();\" id=\"buc\"><input type=\"button\" value=\" ... \"  onclick=\"showColorGrid2('buc','none');\"><input type=hidden name=id value=\"$goi[op]\"></TD></TR><TR style=\"background:#F6F6F6;\"><Td>Poll Width:</TD><TD><input type=text name=pw size=10 value=\"$goi[pw]\" onkeyup=\"javascript:regen();\" width=10%>px</TD></TR><TR style=\"background:#F6F6F6;\"><TD><BR><BR></TD><TD><input type=submit value=' EDIT '><input type=button value=' RESET ' onclick='javascript: reset();regen();'></TD></TR></Table></TD><TD width=50% align=center valign=top><table width=100%><TR bgcolor=\"#E6E6E6\" height=\"24\"><TD><B>Preview</B></TD></TR><TR height=100><TD valign=center><span id=t0></span></TD></TR></table></TD></TR></Table></Form>";
}
elseif($action=="add_quiz"){
if($question==""){
echo "<form method=post action=\"?action=add_quiz\">";
echo "<table width=600 align=\"center\" cellspacing=\"0\" cellpadding=\"0\" style=\"BORDER:#E6e6e6 1px solid;\" bgcolor=\"#F6f6f6\">";
echo "<TR height=\"30\" bgcolor=\"#E6e6e6\"><TD colspan=2 align=\"center\"><B>Add a Poll</B></TD></TR>";
echo "<TR height=\"40\"><TD width=20% style=\"padding:4px;\">Title of Poll:</TD><TD width=50%>
<textarea rows=2 name=title cols=25></textarea>
</TD></TR>";
echo "<TR height=\"40\"><TD width=20% style=\"padding:4px;\">Number of Options:</TD><TD width=50%><input type=text name=no size=5></TD></TR>";
echo "<TR height=\"40\"><TD width=20% style=\"padding:4px;\"><input type=hidden name=question value=0></TD><TD width=50%><input type=submit value='Next'></TD></TR>";
echo "</Table>";
echo "</form>";
}
if($question!="" && $answer==""){
if(is_numeric($no)){
echo "<form method=post action=\"?action=add_quiz\">";
echo "<table width=600 align=\"center\" cellspacing=\"0\" cellpadding=\"0\" style=\"BORDER:#E6e6e6 1px solid;\" bgcolor=\"#F6f6f6\">";
echo "<TR height=\"30\" bgcolor=\"#E6e6e6\"><TD colspan=2 align=\"center\"><B>$title</B></TD></TR>";
for($i=1;$i<=$no;$i++){
echo "<TR height=\"40\"><TD width=50 style=\"padding:4px;\">Option $i:</TD><TD width=500><input type=text name=\"answer[$i]\" size=\"40\"></TD></TR>";
}
echo "<TR><TD width=100><input type=hidden name=question value=0><input type=hidden name=no value=\"$no\">

<input type=hidden name=title value=\"$title\"></TD><TD width=500><input type=submit value=' Finish '></TD></TR>";
echo "<TR height=\"20\"><TD width=100% colspan=2>&nbsp;</TD></TR>";
echo "</Table>";
echo "</form>";
}else{
echo "<table width=40% align=center cellspacing=0><TR bgcolor=\"#E6e6e6\" height=\"26\"><TD align=center width=100% colspan=2><b>ERROR</b></TD></TR><TR bgcolor=\"#F6f6f6\"><TD align=center style=\"BORDER-LEFT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><img src=\"images/warning.png\"></TD><TD align=center width=80% style=\"BORDER-RIGHT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\">Please go back and enter valid number of options for the poll. It can only be a number.</TD></TR></table><BR>";
}
}
if($question!="" && $answer!=""){
$tm=time();
$title=str_replace("'","&#39;",$title);
$title=str_replace("<","&lt;",$title);
$title=str_replace(">","&gt;",$title);
$title=stripslashes($title);
mysql_query('SET CHARACTER SET utf8');
mysql_query("SET SESSION collation_connection ='utf8_general_ci'"); 
$mfr=mysql_query("INSERT INTO ".POLL_PREFIX."quiz SET title='$title', tm='$tm'");
for($i=1;$i<=$no;$i++){
$k=$i;
$answer[$i]=stripslashes($answer[$i]);
$answer[$i]=str_replace("'","&#39;",$answer[$i]);
$answer[$i]=str_replace("<","&lt;",$answer[$i]);
$answer[$i]=str_replace(">","&gt;",$answer[$i]);
$mfr=mysql_query("INSERT INTO ".POLL_PREFIX."answer SET answer='$answer[$i]',qid='$i', tm='$tm'");
}
if($mfr){
echo "<table width=40% align=center cellspacing=0><TR bgcolor=\"#E6e6e6\" height=\"26\"><TD align=center width=100% colspan=2><b>Confirmation</b></TD></TR><TR bgcolor=\"#F6f6f6\"><TD align=center style=\"BORDER-LEFT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><img src=\"images/banner_check.png\"></TD><TD align=center width=80% style=\"BORDER-RIGHT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><b>Poll has been made successfully. The ID for this poll is: <font color=blue>$tm</font></b><BR>Please use this ID to display the poll.</TD></TR></table><BR>";
}else{
echo "<table width=40% align=center cellspacing=0><TR bgcolor=\"#E6e6e6\" height=\"26\"><TD align=center width=100% colspan=2><b>ERROR</b></TD></TR><TR bgcolor=\"#F6f6f6\"><TD align=center style=\"BORDER-LEFT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><img src=\"images/warning.png\"></TD><TD align=center width=80% style=\"BORDER-RIGHT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\">There has been an error in adding your poll to database, please go back and check your input.</TD></TR></table><BR>";
}
}
}
elseif($action=="view_quiz")
{
	
	if($do=="reset" && $confirm==""){
	echo "<table width=50% align=center cellpadding=2 cellspacing=0><TR height=20 bgcolor=\"#E6e6e6\"><TD width=100% align=center colspan=2><b>Are You sure you want to reset statistics of this poll?</b></TD></TR>";
	echo "<TR bgcolor=\"#F6f6f6\"><TD style=\"BORDER-BOTTOM:#E6e6e6 1px solid;BORDER-LEFT:#E6e6e6 1px solid;\" width=30% align=center><img src=\"images/warning.png\"></TD><TD align=center style=\"BORDER-BOTTOM:#E6e6e6 1px solid;BORDER-RIGHT:#E6e6e6 1px solid;\"><BR><form method=post action=\"?action=view_quiz&do=reset\"><input type=hidden name=\"id\" value=\"$id\"><input type=hidden name=\"confirm\" value=\"yes\"><input type=submit value=\" YES \"> &nbsp; <input type=button value=\" NO \" onclick=\"javascript: history.back();\"></form></TD></TR></table>";
	}elseif($do=="reset" && $confirm!=""){
	$mfr=mysql_query("DELETE FROM ".POLL_PREFIX."result WHERE tm='$id'");
	if($mfr){
	echo "<table width=40% align=center cellspacing=0><TR bgcolor=\"#E6e6e6\" height=\"26\"><TD align=center width=100% colspan=2><b>Confirmation</b></TD></TR><TR bgcolor=\"#F6f6f6\"><TD align=center style=\"BORDER-LEFT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><img src=\"images/banner_check.png\"></TD><TD align=center width=80% style=\"BORDER-RIGHT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\">Statistics of this poll has been reset.<BR><a href=\"?action=manage_quiz\"><B>Back to Manage Poll</B></a></TD></TR></table><BR>";
	}
	}
	$mit=mysql_query("SELECT * FROM ".POLL_PREFIX."quiz WHERE tm='$id'");
	$qz=mysql_fetch_array($mit);
	$tot=mysql_query("SELECT * FROM ".POLL_PREFIX."result WHERE tm='$id'");
	$total=mysql_num_rows($tot);
	echo "<center><h3>$qz[title]</h3></center>";
	echo "<table width=60% align=center cellspacing=1>";
	echo "<TR><TD align=center colspan=2><b>Poll Statistics</b></TD></TR>";
	echo "<TR height=30 bgcolor='#E8e8e8'><TD width=60%>Total Votes</TD><TD width=40%>$total</TD></TR>";
	$mil=mysql_query("SELECT * FROM ".POLL_PREFIX."answer WHERE tm='$id'");
	while($cow=@mysql_fetch_array($mil)){
	$nm=mysql_query("SELECT * FROM ".POLL_PREFIX."result WHERE point='$cow[qid]' AND tm='$id'");
	$thibs=mysql_num_rows($nm);
	if($total>0){
	$tp=round((($thibs/$total)*100),1);
	}else{
	$tp=0;
	}
	echo "<TR height=30 bgcolor='#E8E8E8'><TD>$cow[answer]</TD><TD>$tp% ($thibs votes)</TD></TR>";
	}
	echo "<TR height=60><TD colspan=2 align=center>[<a href=\"?action=view_quiz&do=reset&id=$id\"><b>RESET STATISTICS</b></a>]</TD></TR>";
	echo "</table>";
	

}
elseif($action=="edit_quiz"){
if($do=="true"){
$title=str_replace("'","&#39;",$title);
$title=str_replace("<","&lt;",$title);
$title=str_replace(">","&gt;",$title);
$title=stripslashes($title);
mysql_query('SET CHARACTER SET utf8');
mysql_query("SET SESSION collation_connection ='utf8_general_ci'"); 
$er=mysql_query("UPDATE ".POLL_PREFIX."quiz SET title='$title' WHERE tm='$id'");
$mit1=mysql_query("SELECT * FROM ".POLL_PREFIX."answer WHERE tm='$id'");
while($mow1=mysql_fetch_array($mit1)){
$ig=$mow1[op];
$answer[$ig]=stripslashes($answer[$ig]);
$answer[$ig]=str_replace("'","&#39;",$answer[$ig]);
$answer[$ig]=str_replace("<","&lt;",$answer[$ig]);
$answer[$ig]=str_replace(">","&gt;",$answer[$ig]);
mysql_query('SET CHARACTER SET utf8');
mysql_query("SET SESSION collation_connection ='utf8_general_ci'"); 
$mpb=mysql_query("UPDATE ".POLL_PREFIX."answer SET answer='$answer[$ig]' WHERE tm='$id' AND op='$ig'");
}
echo "<table width=40% align=center cellspacing=0><TR bgcolor=\"#E6e6e6\" height=\"26\"><TD align=center width=100% colspan=2><b>Confirmation</b></TD></TR><TR bgcolor=\"#F6f6f6\"><TD align=center style=\"BORDER-LEFT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><img src=\"images/banner_edit.png\"></TD><TD align=center width=80% style=\"BORDER-RIGHT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><b>Poll has been edited.<BR><a href=\"?action=manage_quiz\">Back to Manage Polls</a></TD></TR></table><BR>";
}
echo "<form method=post action=\"?action=edit_quiz\">";
echo "<table width=600 align=\"center\" cellspacing=\"0\" cellpadding=\"0\" style=\"BORDER:#E6e6e6 1px solid;\" bgcolor=\"#F6f6f6\">";
echo "<TR height=\"30\" bgcolor=\"#E6e6e6\"><TD colspan=2 align=\"center\"><B>Edit Poll</B></TD></TR>";
$mr=mysql_query("SELECT * FROM ".POLL_PREFIX."quiz WHERE tm='$id'");
$in=@mysql_fetch_array($mr);
echo "<TR height=\"10\"><TD colspan=2></TD></TR>";
echo "<TR height=\"35\"><TD width=100 style=\"padding:4px;\">Title of Poll:</TD><TD width=500>
<textarea rows=4 cols=45 name=title>$in[title]</textarea>
</TD></TR>";
echo "<TR><TD colspan=2><BR></TD></TR>";
$ques=mysql_query("SELECT * FROM ".POLL_PREFIX."answer WHERE tm='$id'");
$i=0;
while($row=mysql_fetch_array($ques)){
$ir=$row[op];
$i++;
echo "<TR height=\"35\"><TD width=100 style=\"padding:4px;\">Option $i:</TD><TD width=500><input type=text name=answer[$ir] size=50 value=\"$row[answer]\"></TD></TR>";
echo "<TR><TD colspan=2><BR></TD></TR>";
}
echo "<TR height=\"35\"><TD width=100 style=\"padding:4px;\"><input type=hidden name=do value=\"true\"><input type=hidden name=id value=\"$id\"></TD><TD width=500><input type=submit value=\"Edit\"></TD></TR>";
echo "<TR height=\"10\"><TD colspan=2></TD></TR>";
echo "</table></form>";
}
elseif($action=="delete_quiz"){
if($confirm==""){
echo "<table width=50% align=center cellpadding=2 cellspacing=0><TR height=20 bgcolor=\"#E6e6e6\"><TD width=100% align=center colspan=2><b>Are You sure you want to delete this poll from database?</b></TD></TR>";
echo "<TR bgcolor=\"#F6f6f6\"><TD style=\"BORDER-BOTTOM:#E6e6e6 1px solid;BORDER-LEFT:#E6e6e6 1px solid;\" width=30% align=center><img src=\"images/empty.png\"></TD><TD align=center style=\"BORDER-BOTTOM:#E6e6e6 1px solid;BORDER-RIGHT:#E6e6e6 1px solid;\"><BR><form method=post action=\"?action=delete_quiz\"><input type=hidden name=\"id\" value=\"$id\"><input type=hidden name=\"confirm\" value=\"yes\"><input type=submit value=\" YES \"> &nbsp; <input type=button value=\" NO \" onclick=\"javascript: history.back();\"></form></TD></TR></table>";
}elseif($confirm=="yes"){
$del=mysql_query("DELETE FROM ".POLL_PREFIX."quiz WHERE tm='$id'");
$del=mysql_query("DELETE FROM ".POLL_PREFIX."answer WHERE tm='$id'");
$del=mysql_query("DELETE FROM ".POLL_PREFIX."result WHERE tm='$id'");
if($del){
echo "<table width=40% align=center cellspacing=0><TR bgcolor=\"#E6e6e6\" height=\"26\"><TD align=center width=100% colspan=2><b>Confirmation</b></TD></TR><TR bgcolor=\"#F6f6f6\"><TD align=center style=\"BORDER-LEFT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><img src=\"images/banner_check.png\"></TD><TD align=center width=80% style=\"BORDER-RIGHT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\">Poll has been deleted from database.<BR><a href=\"?action=manage_quiz\"><B>Back to Manage Poll</B></a></TD></TR></table><BR>";
}
}
}
elseif($action=="manage_quiz"){
$selall=("SELECT * FROM ".POLL_PREFIX."quiz");
$row_num1=mysql_num_rows(mysql_query($selall));
if(mysql_num_rows(mysql_query($selall))==0){
echo "<BR><center><b>There is no Poll.</b></center><BR>";
}else{
$list_per_page=15;
if($start==""){
$start=1;
}
if($start==""||$start==1){
$sfrom=0;
}else{
$sfrom=(($start-1)*$list_per_page);
}
$end=$list_per_page;
if ($row_num1>$list_per_page){
$no_of_page=$row_num1/$list_per_page;
$no_page=explode(".",$no_of_page);
if($no_page[1]>0){
$no_of_page+=1;
}
echo "<center>";
echo "<table width=50% align=center border=0>";
if($start > 1){
$s=$start-1;
echo "<TD width=2%><a href='?action=manage_quiz&start=$s'><img src=\"images/previous.png\" border=0 alt=\"Previous\"></a></TD>";
}
echo "<td width=96% align=center>";
$last=round($no_of_page,0);
for($i=1;$i<=$no_of_page;$i++){
if($no_of_page<=20){
if($i!=$start){
echo " <a href='?action=manage_quiz&start=$i'><font size=2>$i</font></a> ";
}else{
echo "<font size=2> <b>$i</b> </font>";
}
}else{
if($i>$start+3){
if($once==""){
echo " ....... <a href='?action=manage_quiz&start=$last'><font size=4>$last</font></a>";
}
$once="yes";
}elseif($i<$start-3){
if($tonce=="" && ($start-3)>0){
echo "<a href='?action=manage_quiz&start=1'><font size=4>1</font></a> ....... ";
}
$tonce="yes";
}else{
if($i!=$start){
echo " <a href='?action=manage_quiz&start=$i'><font size=4>$i</font></a> ";
}else{
echo "<font size=2 color=\"#FFCC00\"> <b>$i</b> </font>";
}
}
}
}
echo "</TD>";
if($start < $i-1){
$n=$start+1;
$next = "<TD width=2%><a href='?action=manage_quiz&start=$n'><img src=\"images/next.png\" border=0 alt=\"Next\"></a></TD>";
}elseif($start>=$i){
$next =  "";
}
echo "$next</table></center><HR size=1px color=#E6E6E6>";
}
$gr=1;
$selall.=	(" LIMIT $sfrom,$end");
$blist=(mysql_query($selall));
echo"<Table width=100% border=0><TR bgcolor=\"#E6E6E6\" align=middle height=26><TD width=45%><B>Poll Title</B></TD><TD width=20%><b>ID</b></TD><TD width=20%><B>Action</B></TD></TR>";
$tm=time();
while($row=mysql_fetch_array($blist)){
echo "<TR height=50 bgcolor=\"#F5F5F5\">";
echo "<TD align=center>$row[title]</TD><TD width=10% align=center>$row[tm]</TD><TD width=10% align=center><a href=\"?action=view_quiz&id=$row[tm]\"><img src=\"images/view.png\" border=0 alt=\"View Results\"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"?action=edit_quiz&id=$row[tm]\"><img src=\"images/edit.png\" border=0 alt=\"Edit\"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"?action=delete_quiz&id=$row[tm]\"><img src=\"images/delete.png\" border=0 alt=\"Delete\"></a></TD></TR>";
}
echo "</Table>";
}
}elseif($action=="change"){
$exis=mysql_query("SELECT * FROM ".POLL_PREFIX."ad");
$einf=mysql_fetch_array($exis);
if($mode=="verify"){
if($admin_pass==$cpass && strlen($admin_pass)>=1){
$updf=mysql_query("UPDATE ".POLL_PREFIX."ad SET admin_id='$admin_id', admin_pass='".md5($admin_pass)."'");
echo "<table width=40% align=center cellspacing=0><TR bgcolor=\"#E6e6e6\" height=\"26\"><TD align=center width=100% colspan=2><b>Confirmation</b></TD></TR><TR bgcolor=\"#F6f6f6\"><TD align=center style=\"BORDER-LEFT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><img src=\"images/admin_info.png\"></TD><TD align=center width=80% style=\"BORDER-RIGHT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\">Admin login information has been changed.</TD></TR></table><BR>";
$done="true";
}else{
echo "<table width=40% align=center cellspacing=0><TR bgcolor=\"#E6e6e6\" height=\"26\"><TD align=center width=100% colspan=2><b>ERROR</b></TD></TR><TR bgcolor=\"#F6f6f6\"><TD align=center style=\"BORDER-LEFT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><img src=\"images/warning.png\"></TD><TD align=center width=80% style=\"BORDER-RIGHT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\">New password and confirm new password do not match.</TD></TR></table><BR>";
echo "<form method=post action=?action=change&mode=verify><table width=50% align=center><TR height=26 bgcolor=#E6E6E6><TD colspan=2 align=center><B>Change Admin Login Detail</B></TD></TR><TR height=26 bgcolor=#F6F6F6><TD width=20%>Admin ID</td><td width=80%><input type=text name=admin_id value=\"$einf[admin_id]\"></td></tr><TR height=26 bgcolor=#F6F6F6><TD width=20%>New Password</td><td><input type=password name=\"admin_pass\"></td></tr><TR height=26 bgcolor=#F6F6F6><TD width=20%>Confirm New Password</td><td><input type=password name=\"cpass\"></td></tr><TR height=26 bgcolor=#F6F6F6><TD width=20%><BR><BR><BR></td><td><input type=submit value=Change></td></tr></table></form>";
}
}else{
echo "<form method=post action=?action=change&mode=verify><table width=50% align=center><TR height=26 bgcolor=#E6E6E6><TD colspan=2 align=center><B>Change Admin Login Detail</B></TD></TR><TR height=26 bgcolor=#F6F6F6><TD width=20%>Admin ID</td><td width=80%><input type=text name=admin_id value=\"$einf[admin_id]\"></td></tr><TR height=26 bgcolor=#F6F6F6><TD width=20%>New Password</td><td><input type=password name=\"admin_pass\"></td></tr><TR height=26 bgcolor=#F6F6F6><TD width=20%>Confirm New Password</td><td><input type=password name=\"cpass\"></td></tr><TR height=26 bgcolor=#F6F6F6><TD width=20%><BR><BR><BR></td><td><input type=submit value=Change></td></tr></table></form>";
}
}
}else{
if(strlen($vpass)>=1){
$ltext="<CENTER><font color=red>Invalid password entered</font></CENTER>";
}else{
$ltext="";
}
if(!isset($_SESSION['ein'])){
echo "<form method=\"post\" action=\"admin.php\"><table width=50% align=center cellspacing=0 cellpadding=2><TR height=26 bgcolor=#E6E6E6><TD colspan=3 align=center><B>Please Login</B></TD></TR><TR height=26 bgcolor=#F6F6F6><TD width=15% align=center rowspan=\"2\" style=\"BORDER-LEFT:#E6E6E6 1px solid;\"><img src=\"images/admin_info.png\"></TD><TD width=20%>Admin ID</td><td width=65% style=\"BORDER-RIGHT:#E6E6E6 1px solid;\"><input type=text name=admin_id></td></tr><TR height=26 bgcolor=#F6F6F6><TD width=20%>Password</td><td style=\"BORDER-RIGHT:#E6E6E6 1px solid;\"><input type=password name=admin_pass></td></tr><TR height=26 bgcolor=#F6F6F6><TD width=\"35%\" colspan=\"2\" style=\"BORDER-LEFT:#E6E6E6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><BR><BR><BR></td><td style=\"BORDER-RIGHT:#E6E6E6 1px solid;BORDER-BOTTOM:#E6E6E6 1px solid;\"><input type=submit value=\"Login\"></td></tr></table></form>";
}
}
?><BR>
</TD>
<TD colspan="0" cellpadding="0" width=0><img src="images/space.gif" width=1 height=400></TD>
</TR></TBODY></TABLE>
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
<TBODY>
<TR>
<TD style="BORDER-TOP: #b6b6b6 1px solid; BACKGROUND-COLOR: #e3e3e3" 
height=40>
<TABLE cellPadding=2 width="100%" border=0>
<TBODY>
<TR>
<TD width=20></TD>
<TD>Copyright © <A HREF="http://www.madrasahedu.org">Madrasah Poll</A>. All Rights Reserved. </TD>
</TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD><TD colspan="0" cellpadding="0" width="2%"><img src="images/space.gif" width="1" height="400"></TD>
</TR></TBODY></TABLE></BODY></HTML>
<?php
}else{
echo "<table width=40% align=center cellspacing=0><TR bgcolor=\"#E6e6e6\" height=\"26\"><TD align=center width=100% colspan=2><b>ERROR</b></TD></TR><TR bgcolor=\"#F6f6f6\"><TD align=center style=\"BORDER-LEFT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\"><img src=\"images/warning.png\"></TD><TD align=center width=80% style=\"BORDER-RIGHT:#E6e6e6 1px solid;BORDER-BOTTOM:#E6e6e6 1px solid;\">Please cotact with support team</TD></TR></table><BR>";
}
echo $ltext;
?>